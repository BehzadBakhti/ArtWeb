<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductCategory;
use Session;
class ProductCategoriesController extends Controller
{


    private $childList=  Array();
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCategory::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
       // dd(ProductCategory::find(6)->products);
 
        return view('admin.shop.categories.create')->with('categories',$this->index());
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

        $category= new ProductCategory;
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->save();

        Session::flash('success', 'Category created successfully');

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
        return view('admin.shop.categories.edit')->with(['categories'=>$this->index(), 'toedit'=> ProductCategory::find($id)]);
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

        $category= ProductCategory::find($id);
        $category->name=$request->name;

        $childeren=$category->childeren;
       $this-> GetChilderenList($childeren);
            if(in_array( $request->parent_id, $this->childList)){
               
                Session::flash('error', 'The selected Parent can not be assigned');
                return redirect()->back();


            };
      
        $category->parent_id=$request->parent_id;
        $category->save();

        Session::flash('success', 'Category updated successfully');
        return redirect()->route('prod_cat.create');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category= ProductCategory::find($id);
 
        $category->delete();
        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('prod_cat.create');
    }



    private function GetChilderenList($childs){
       

            foreach ($childs as $child) {
                // dump($child->id);
                array_push($this->childList, $child->id);
    
                    if($child->childeren->count()>0){ 
                        
                        
                        $this-> GetChilderenList($child->childeren);
                        
                    }
         
                
            }

    }
}
