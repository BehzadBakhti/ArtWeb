<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
 
        return view('admin.categories.create')->with('categories',$this->index());
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
            'name'=>'required'
        ]);

        $category= new Category;
        $category->name=$request->name;
        $category->save();

        Session::flash('success', 'Category created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.categories.edit')->with(['categories'=>$this->index(), 'toedit'=> Category::find($id)]);
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
            'name'=>'required'
        ]);

        $category= Category::find($id);
        $category->name=$request->name;
        $category->save();

        Session::flash('success', 'Category updated successfully');
        return redirect()->route('category.create');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category= Category::find($id);
 
        $category->delete();
        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('category.create');
    }
}
