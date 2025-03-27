<?php

namespace App\Http\Controllers\cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cashier_controller extends Controller
{
    function dashboard(){
        return view("cashier.dashboard",["page"=>"dashboard"]);
    }
    function sales(){
        return view("cashier.sales");
    }
    function return(){
        return view("cashier.return",["page"=>"return"]);
    }

    public function senddata(Request $data){
        $val = "null";
        if($data->barcode != "404"){
            if($data->barcode == "1")
                $val = "1//Coca//Drink//coke.png//1";
            else if($data->barcode == "2")
                $val = "2//Potato-Chip//Snack//chips.png//1.5";
            else
                $val = "3//laptop//device//laptop.png//500";
        }else{
            $val = "error";
        }
        return $val;
    }




}
