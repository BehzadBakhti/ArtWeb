<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Address;

class AddressesController extends Controller
{
    public function store(Request $request){

        $address=Address::create([
            'user_id'=>auth()->user()->id,
            'province'=>$request->province,
            'city'=>$request->city,
            'sub_address'=>$request->sub_address,
            'postal_code'=>$request->province,
        ]);

        return redirect()->back();

    }
}
