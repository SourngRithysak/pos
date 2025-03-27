<?php

namespace App\Http\Controllers\stockkeeper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class stock_controller extends Controller
{
    function dashboard(){
        return view("stockkeeper.dashboard");
    }
}
