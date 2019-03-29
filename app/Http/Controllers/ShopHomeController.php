<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopHomeController extends Controller
{
    public function index(){
        return view('admin.shop.shop');
    }
}
