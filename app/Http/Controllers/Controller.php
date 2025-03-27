<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function uploadImage($file){
        $image = date("d-m-Y")."-".$file->getClientOriginalName();
        $file->move('productImages',$image);
        return $image;
    }

}
