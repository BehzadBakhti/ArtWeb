<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductImage;
use App\Model\ProductTag;
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
        //
        return  view('admin.shop.products.index')->with('products', Product::all()) ;
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
        
        $this->validate($request,[
                'name'=>'required|max:255',
                'image_1'=>'required|image',
                'image_2'=>'required|image',
                'dimension'=>'required|max:255',
                'material'=>'required|max:255',
                'price'=>'required|numeric',
                'stock'=>'required|numeric',
                'detail'=>'required' 
            ]); 

            $image1=$request->image_1; 
            $image1NewName=time().$image1->getClientOriginalName();
            $image1->move('uploads/products', $image1NewName);

            $image2=$request->image_2; 
            $image2NewName=time().$image2->getClientOriginalName();
            $image2->move('uploads/products', $image2NewName);

            $product= Product::create([
                'name'=>$request->name,
                'detail'=>$request->detail,
                'product_category_id'=>$request->category_id,
                'dimension'=>$request->dimension,
                'material'=> $request->material,
                'price'=>$request->price,
                'stock'=> $request->stock,

            ]);

            ProductImage::create([
                'image_name'=>'uploads/products/'.$image1NewName,
                'product_id'=>$product->id

            ]);
            ProductImage::create([
                'image_name'=>'uploads/products/'.$image2NewName,
                'product_id'=>$product->id

            ]);
          

            $product->tags()->attach($request->tags);
                Session::flash('success',"Product Saved Successfully");
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

       
        return view('admin.shop.products.edit')->with('categories',ProductCategory::all())
        ->with('tags',ProductTag::all())
        ->with('product',Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>'required|max:255',

            'dimension'=>'required|max:255',
            'material'=>'required|max:255',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'detail'=>'required' 
        ]); 

        $image1=$request->image_1; 
        $image1NewName=time().$image1->getClientOriginalName();
        $image1->move('uploads/products', $image1NewName);

        $image2=$request->image_2; 
        $image2NewName=time().$image2->getClientOriginalName();
        $image2->move('uploads/products', $image2NewName);

        $product= Product::create([
            'name'=>$request->name,
            'detail'=>$request->detail,
            'product_category_id'=>$request->category_id,
            'dimension'=>$request->dimension,
            'material'=> $request->material,
            'price'=>$request->price,
            'stock'=> $request->stock,

        ]);

        ProductImage::create([
            'image_name'=>'uploads/products/'.$image1NewName,
            'product_id'=>$product->id

        ]);
        ProductImage::create([
            'image_name'=>'uploads/products/'.$image2NewName,
            'product_id'=>$product->id

        ]);
      

        $product->tags()->attach($request->tags);
            Session::flash('success',"Product Saved Successfully");
        return redirect()->route('product.create');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
