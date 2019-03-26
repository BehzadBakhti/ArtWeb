<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tag;
use Session;

class TagsController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
 
        return view('admin.blog.tags.create')->with('tags',$this->index());
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

        $tag= new Tag;
        $tag->tag=$request->tag;
        $tag->save();

        Session::flash('success', 'Tag created successfully');

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
        return view('admin.blog.tags.edit')->with(['tags'=>$this->index(), 'toedit'=> Tag::find($id)]);
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

        $tag= Tag::find($id);
        $tag->tag=$request->tag;
        $tag->save();

        Session::flash('success', 'Tag updated successfully');
        return redirect()->route('tag.create');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $tag= Tag::find($id);
 
        $tag->delete();
        Session::flash('success', 'Tag deleted successfully');
        return redirect()->route('tag.create');
    }
}
