<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductImage;
use App\Model\ProductTag;
use App\Model\Spec;
use Illuminate\Http\Request;
use Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->user_role=='admin'){
            $products=Product::all();
        }else{

            $products=auth()->user()->products;
        }
        
        return  view('admin.shop.products.index')->with('products', $products->paginate(10)) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories=ProductCategory::all();

        if($categories->count()==0){

            Session::flash('info', "You Need to Define a Category Before Creating Products");
            return redirect()->back();
        }


        return view('admin.shop.products.create')->with('categories',$categories)
                                                 ->with('tags',ProductTag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){       
     //dd($request-> spec_key);   
        $this->validate($request,[
                'name'=>'required|max:255',
                'dimension'=>'required|max:255',
                'material'=>'required|max:255',
                'price'=>'required|numeric',
                'stock'=>'required|numeric',
                'discount'=>'required|numeric|min:0|max:100',
                'images' => 'required|array|min:2',
                'detail'=>'required|max:255',
                'description'=>'required' 
            ]); 

            $product= Product::create([
                'name'=>$request->name,
                'detail'=>$request->detail,
                'description'=>$request->description,
                'product_category_id'=>$request->category_id,
                'dimension'=>$request->dimension,
                'material'=> $request->material,
                'price'=>$request->price,
                'discount'=>$request->discount,
                'stock'=> $request->stock,

            ]);
           
            $specKyes=$request->spec_key ;
            $specValues=$request->spec_value;
            $specIssue=0;
            for ($i=0; $i <sizeof($specKyes); $i++) { 
                if($specKyes[$i]!=null && $specValues[$i]!=null){
                    Spec::create([
                        'key'=>$specKyes[$i],
                        'value'=>$specValues[$i],
                        'product_id'=>$product->id,
                    ]);
                }else{
                    $specIssue++;
                }
            }



            $images=$request->images; 
            for ($i=0; $i < sizeof($images) ; $i++) { 
                    $imageNewName=time()."_".$images[$i]->getClientOriginalName();
                        $images[$i]->move('uploads/products', $imageNewName);

                        ProductImage::create([
                            'image_name'=>'uploads/products/'.$imageNewName,
                            'product_id'=>$product->id

                        ]);
            }
         

            $product->tags()->attach($request->tags);
                if($specIssue>0){
                    Session::flash('info',$specIssue." Nomber of Spec(s) are not well defined");
                
                }else{
                    Session::flash('success',"Product Saved Successfully");
                    
                }
         return redirect()->route('admin.products');//  
            return redirect()->route('product.create');//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
        //
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $product=Product::find($id);
       // dd($product->brand()->first()->user()->first());
        if(auth()->user()->user_role!='admin'){
            if(auth()->user()!=$product->brand->user){
                Session::flash('info',"You only can edit your own Products");
                return redirect()->back();
            }
        } 

       $images=$product->images;
       $specs=$product->specs;
        return view('admin.shop.products.edit')->with('categories',ProductCategory::all())
        ->with('tags',ProductTag::all())
        ->with('product', $product)
        ->with('images', $images)
        ->with('specs', $specs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     dd($request->images);
    //    dd($request->image_names);
        $this->validate($request,[
            'name'=>'required|max:255',

            'dimension'=>'required|max:255',
            'material'=>'required|max:255',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'discount'=>'required|numeric|min:0|max:100',
            
            'detail'=>'required|max:255',
            'description'=>'required' 
        ]); 



        $product= Product::find($id);
        $product->update([
            'name'=>$request->name,
            'detail'=>$request->detail,
            'description'=>$request->description,
            'product_category_id'=>$request->category_id,
            'dimension'=>$request->dimension,
            'material'=> $request->material,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'stock'=> $request->stock,

        ]);
        $oldSpecs= $product->specs;
        $specKyes=$request->spec_key ;
        $specValues=$request->spec_value;
        $specIssue=0;
        $oldSpecKeys=Array();

        foreach ($oldSpecs as $oldSpec) {
                $oldSpec->delete();
        }



        for ($i=0; $i <sizeof($specKyes); $i++) { 
            if($specKyes[$i]!=null && $specValues[$i]!=null){

                        Spec::create([
                            'key'=>$specKyes[$i],
                            'value'=>$specValues[$i],
                            'product_id'=>$product->id,
                        ]);

            }else{
                $specIssue++;
            }
        }



            foreach ($product->images as $oldImg) {

                if(!in_array($oldImg->image_name, $request->image_names)){
                
                    $oldImg->delete();
                }
            }
        $images=$request->images; 
        for ($i=0; $i < sizeof($images) ; $i++) { 
                $imageNewName=time()."_".$images[$i]->getClientOriginalName();
                    $images[$i]->move('uploads/products', $imageNewName);

                    ProductImage::create([
                        'image_name'=>'uploads/products/'.$imageNewName,
                        'product_id'=>$product->id

                    ]);
             }
      

        $product->tags()->attach($request->tags);
        if($specIssue>0){
            Session::flash('info',$specIssue." Nomber of Spec(s) are not well defined");
           
        }else{
             Session::flash('success',"Product Saved Successfully");
            
        }
     return redirect()->route('admin.products');//       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product=Product::find($id);
        // dd($product->brand()->first()->user()->first());
        if(auth()->user()->user_role!='admin'){
            if(auth()->user()!=$product->brand->user){
                Session::flash('info',"You only can Delete your own Products");
                return redirect()->back();
            }
        } 
 
         $product->delete();

        Session::flash('success', "The Product Deleted Successfully");

        return redirect()->back();
    }



    public function getStock(){
	   
        $stockProducts=auth()->user()->products()->get();
        //
        if(auth()->user()->user_role=='admin'){
            $stockProducts=Product::all();
        }
        return view('admin.shop.orders.stock')->with('stockProducts', $stockProducts);
    
    
    }

}
