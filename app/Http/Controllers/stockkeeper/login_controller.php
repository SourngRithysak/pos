<?php

namespace App\Http\Controllers\stockkeeper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class login_controller extends Controller
{
    // show login page 
    public function index(){
        return view('stockkeeper.login');
    }

    // Authenticate user
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()){

            if(Auth::guard('stockkeeper')->attempt(['username' => $request->username, 'password'=> $request->password])){
                if(Auth::guard('stockkeeper')->user()-> role_name != "stockkeeper" || Auth::guard('stockkeeper')->user()->status != "active"){
                    Auth::guard('stockkeeper')->logout();
                    return redirect()->route('stockkeeper.login')->with('error','You are not authorized  to access this page.');
                }
                return redirect()->route('stockkeeper.dashboard');
            }else{
                return redirect()->route('stockkeeper.login')->with('error','Either Username or Password is incorrect.');
            }
            
        }else{
            return redirect()->route('stockkeeper.login')
                             ->withInput()
                             ->withErrors($validator);
        }
    }

    // Show Logout
    public function logout(){
        Auth::guard('stockkeeper')->logout();
        return redirect()->route('stockkeeper.login');
    }
}
