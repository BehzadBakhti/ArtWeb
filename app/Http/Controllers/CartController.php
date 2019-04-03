<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{

    public function index(){

        return view('frontEnd.cart');
    }


    public function addToCart(Request $request){

        Cart::add($request->id, $request->item, $request->price, 1, array());

        return ["output"=> Cart::getContent()];
    }

    public function removeFromCart(Request $request){

        Cart::remove($request->idToRemove);

        return response()->json(['success'=>'Successful']);
    }


    public function getContent(){

        

        return ["output"=> Cart::getContent()];
    }

}
