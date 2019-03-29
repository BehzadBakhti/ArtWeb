<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductTag;
use Session;

class ProductTagsController extends Controller
{
    public function index()
    {
        return ProductTag::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
 
        return view('admin.shop.tags.create')->with('tags',$this->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tag'=>'required'
        ]);

        $tag= new ProductTag;
        $tag->tag=$request->tag;
        $tag->save();

        Session::flash('success', 'Product Tag created successfully');

        return redirect()->back();
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd(Category::find($id)->name);
        return view('admin.shop.tags.edit')->with(['tags'=>$this->index(), 'toedit'=> ProductTag::find($id)]);
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
        
        $this->validate($request, [
            'tag'=>'required'
        ]);

        $tag= ProductTag::find($id);
        $tag->tag=$request->tag;
        $tag->save();

        Session::flash('success', 'Tag updated successfully');
        return redirect()->route('prod_tag.create');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $tag= ProductTag::find($id);
 
        $tag->delete();
        Session::flash('success', 'Tag deleted successfully');
        return redirect()->route('prod_tag.create');
    }
}
