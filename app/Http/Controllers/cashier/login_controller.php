<?php

namespace App\Http\Controllers\cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class login_controller extends Controller
{
    // show login page 
    public function index(){
        return view('cashier.login');
    }

    // Authenticate user
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()){

            if(Auth::guard('cashier')->attempt(['username' => $request->username, 'password'=> $request->password])){
                if(Auth::guard('cashier')->user()-> role_name != "cashier" || Auth::guard('cashier')->user()->status != "active"){
                    Auth::guard('cashier')->logout();
                    return redirect()->route('cashier.login')->with('error','You are not authorized  to access this page.');
                }
                return redirect()->route('cashier.dashboard');
            }else{
                return redirect()->route('cashier.login')->with('error','Either Username or Password is incorrect.');
            }
            
        }else{
            return redirect()->route('cashier.login')
                             ->withInput()
                             ->withErrors($validator);
        }
    }

    // Show Logout
    public function logout(){
        Auth::guard('cashier')->logout();
        return redirect()->route('cashier.login');
    }
}
