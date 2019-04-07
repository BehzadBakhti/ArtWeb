<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Post;
use App\Model\Event;
use App\Model\ProductCategory;
use Cart;



class FrontEndController extends Controller
{
    public function index(){

        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $postChunks=Post::all()->chunk(4);
        $events=Event::all();
        $promotedProducts=Product::all();
        $newProducts=$promotedProducts;
        $bestSeller=$promotedProducts;
         //dd($promotedProducts);
        return view('frontEnd.index')->with('categoryTree', $categoryTree)
                                     ->with('cartContent', $cartContent)
                                     ->with('events', $events)
                                     ->with('postChunks', $postChunks)
                                     ->with(['bestSeller'=>$bestSeller, 'newProducts'=>$newProducts, 'promotedProducts'=> $promotedProducts]);
        
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



    public function singleProduct($id){
        return view('frontEnd.singleProduct');
        
    }



    public function category($id){
        return view('frontEnd.category')->with('id',$id);
        
    }


    public function aboutUs(){
        return view('frontEnd.aboutUs');
        
    }

    public function contactUs(){
        return view('frontEnd.contactUs');
        
    }

}
