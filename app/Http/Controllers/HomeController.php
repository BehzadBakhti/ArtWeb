<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        return view('admin.index');
    }


    public function blog()
    {
        return view('admin.blog.blog');
    }

    public function shop()
    {
        return view('admin.shop.shop');
    }
}
