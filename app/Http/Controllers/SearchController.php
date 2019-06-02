<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Post;
use Cart;
use App\Model\ProductCategory;

class SearchController extends Controller
{
    public function ajaxVendorSearch($phrase){
        //dd($phrase);
        $products=auth()->user()->products()
                                
                                // 
                                ->where('products.name','like' ,'%'.$phrase.'%')
                                // ->join('product_images','product_images.product_id', 'products.id')
                                // ->get()
                                // -> groupBy('products.id')
                                // ->select(' product_images.image_name')
                                // ->get();
                             
                                ->with(['images' => function ($query) {
                                                $query->take(1)->first();
                                            }])->get();
                              ;
                                return($products);
    }



    

    public function search(Request $request){ 
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $products=Product::search($request->phrase)->get();
        $posts=Post::search($request->phrase)->get();
        
           return view('frontEnd.searchResults')->with('phrase', $request->phrase)
                                                ->with('resultProducts', $products)
                                                ->with('resultPosts', $posts)
                                                ->with('categoryTree', $categoryTree)
                                                ->with('cartContent', $cartContent);

        
    }
}
