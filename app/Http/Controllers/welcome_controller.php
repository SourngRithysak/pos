<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcome_controller extends Controller
{
    public function index(){
        return view('welcome');
    }
}
