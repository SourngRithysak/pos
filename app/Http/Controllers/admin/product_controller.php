<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class product_controller extends Controller
{
    function product(){
        return view("admin.product.product");
    }

    function addProduct(){      
        return view("admin.product.addProduct");
    }

    function addProductSubmit(Request $data){
        
        return Auth::user()->username;
        $file = $data->file("image");
        if(empty($file)) $image = "assets/images/logo.png";
        else $image = $this->uploadImage($file);
        $barcode = $data->barcode;
        if($barcode == null)
            $barcode = rand(100000000000,999999999999);
        DB::table('tbl_product')->insert([
            'category_id'     => $data->category_id,
            'sale_unit_id'    => $data->sale_unit_id,
            'bulk_unit_id'    => $data->bulk_unit_id,
            'conversion_rate' => $data->conversion_rate,
            'user_id'         => Auth::id(),
            'product_name' => $data->product_name,
            'barcode' => $data->barcode,
            'product_image' => $data->product_image,
            'description' => $data->description,
            'is_kit' => $data->is_kit,
            'status' => $data->status,
            
        ]);
        return $data;   
    }

    function stock()
    {
        return view("admin.product.stock");
    }

    
    function printBarcode(){ 
        return view('admin.product.printBarcode');
    }
}
