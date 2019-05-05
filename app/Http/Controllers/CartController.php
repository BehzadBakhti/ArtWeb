<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{

    public function index(){

       
    }


    public function addToCart(Request $request){

       

        Cart::add(array(
            'id' => $request->id,
            'name' => $request->item,
            'price' => $request->price,
            'quantity' => $request->qty,
            'discount'=>Product::find($request->id)->discount,
            'attributes' => array(
                'discount'=>Product::find($request->id)->discount
            )
        ));




        return ["output"=> Cart::getContent()];
    }

    public function removeFromCart(Request $request){

        Cart::remove($request->idToRemove);

        return redirect()->back();
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
