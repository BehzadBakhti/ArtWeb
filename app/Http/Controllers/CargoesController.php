<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cargo;
use App\Model\Product;
use Session;

class CargoesController extends Controller
{
    public function index(){
    $cargoes=Cargo::all();
    //dd($cargoes);
        return view('admin.shop.cargoes.index')->with('cargoes', $cargoes);
    }

    public function create(){
        
        $vendorProducts=$this->vendorProducts(auth()->user());

        return view('admin.shop.cargoes.create')->with('vendorProducts', $vendorProducts);
    }

    public function store(Request $request){
       
        for($i=0;$i<sizeof($request->products_id);$i++){
               $cargo_prod[$request->products_id[$i]]=['quantity'=>$request->product_qty[$i]];
            }

          //  dd($cargo_prod);
        $cargo=Cargo::create([
            'user_id'=>auth()->user()->id,
            'delivery_date'=>$request->deliveryDate,
            'status'=>$request->status, 
            'address'=>$request->address
        ]);
    
   
    
        $cargo->products()->sync($cargo_prod);
        Session::flash('success',"محموله جدید ثبت گردید");
        return redirect()->back();
        

    }

    public function edit($id){
        $cargo=Cargo::find($id);
        $cargoProducts=$cargo->products()->get();
        $vendorProducts=$this->vendorProducts($cargo->user);

        return view('admin.shop.cargoes.edit')->with('cargo',$cargo)
                                            ->with('cargoProducts', $cargoProducts)
                                            ->with('vendorProducts', $vendorProducts);
    }

    public function update(Request $request){
       
        for($i=0;$i<sizeof($request->products_id);$i++){
               $cargo_prod[$request->products_id[$i]]=['quantity'=>$request->product_qty[$i]];
            }

          //  dd($cargo_prod);
        $cargo=Cargo::find($request->cargo_id);
        $prevState=$cargo->status;
        $cargo->update([
            'delivery_date'=>$request->deliveryDate,
            'status'=>$request->status, 
            'address'=>$request->address
        ]);
    
   
    
        $cargo->products()->sync($cargo_prod);
        Session::flash('success',"محموله ویرایش شد");
        $products = Product::find($request->products_id);
        if($cargo->status=='delivered'){
            
                if($prevState!='delivered'){
                        foreach ($products as $key => $value) {
                            # code...dum
                            $products[$key]->stock+=$request->product_qty[$key];
                            $products[$key]->save();
                        }
                }
        }else{

                if($prevState=='delivered'){
                        foreach ($products as $key => $value) {
                            # code...dum
                            $products[$key]->stock-=$request->product_qty[$key];
                            $products[$key]->save();
                        }
                }
        }
        return redirect()->back();
        

    }


    public function vendorProducts($user){
        $products=$user->products()
                                ->with(['images','brand', 'product_category'])->get()->toArray();

                                   // dd($products);
                    return json_encode($products);
    }
}
