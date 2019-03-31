<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ProductCategory;



class FrontEndController extends Controller
{
    public function index(){

        return view('frontEnd.index');
        
    }



    public function blog(){
        return view('frontEnd.blog');

    }

    public function shop(){
        return view('frontEnd.shop');
        
    }


    public function singlePost($slug){
        return view('frontEnd.singlePost');
        
    }



    public function singleProduct(){
        return view('frontEnd.singleProduct');
        
    }

}
