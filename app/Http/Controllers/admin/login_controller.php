<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class login_controller extends Controller
{
    // show login page 
    public function index(){
        return view('admin.login');
    }

    // Authenticate user
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()){

            if(Auth::guard('admin')->attempt(['username' => $request->username, 'password'=> $request->password])){
                if(Auth::guard('admin')->user()-> role_name != "admin" || Auth::guard('admin')->user()->status != "active"){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized  to access this page.');
                }
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error','Either Username or Password is incorrect.');
            }
            
        }else{
            return redirect()->route('admin.login')
                             ->withInput()
                             ->withErrors($validator);
        }
    }

    // Show Logout
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function register(){
        return view ('register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->passes()){
            $user = new User();
            $user -> employee_id = $request->employee_id;
            $user -> branches_id = $request->branches_id;
            $user -> role_name = $request->role_name;
            $user -> status = $request->status;
            $user -> username = $request->username;
            $user -> password = Hash::make($request->password);
            $user -> save();
            

            return redirect()->route('admin.login')->with('success','Nice');
        }else{
            return redirect()->route('register')
                             ->withInput()
                             ->withErrors($validator);
        }
    }
}


