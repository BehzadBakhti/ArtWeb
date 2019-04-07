<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{

    public function index(){

        return view('frontEnd.cart');
    }


    public function addToCart(Request $request){

        Cart::add($request->id, $request->item, $request->price, $request->qty);

        return ["output"=> Cart::getContent()];
    }

    public function removeFromCart(Request $request){

        Cart::remove($request->idToRemove);

        return response()->json(['success'=>'Successful']);
    }


    public function getContent(){
        $cartContent=Cart::getContent();
        $imgAddress=Array();
        foreach ($cartContent as $key => $value) {
            $name=Product::find($key)->images[0]->image_name;
           array_push($imgAddress,[$key,$name]);
        }
        
       

        return ["output"=> $cartContent, "total"=>Cart::getTotal(), "imgAddress"=>$imgAddress ];
    }

}
