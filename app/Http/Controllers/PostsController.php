<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        if(auth()->user()->user_role=='admin'){
            $posts=Post::where('posts.status',$status)->get()->paginate(20);
        }else{
            $posts=Post::where('user_id', auth()->user()->id)->where('posts.status',$status)->get()->paginate(20);
        }
    //    dd($posts);
        return view('admin.blog.posts.index')->with( 'posts',$posts);
    }


    public function trashed()
    {
        //dd(null);
        if(auth()->user()->user_role=='admin'){
            $posts= Post::onlyTrashed()->get();
        }else{
            $posts= Post::onlyTrashed()->where('user_id', auth()->user()->id)->get();
        }
      
        return view('admin.blog.posts.trashed')->with( 'posts',$posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        if($categories->count()==0){

            Session::flash('info', "You Need to Define a Category Before Saving Posts");
            return redirect()->back();
        }
       
        return view('admin.blog.posts.create')->with(['categories'=>$categories, 'posts'=>Post::all(),'tags'=>Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request,[
            'title'=>'required|max:255',
            'featured'=>'required|image',
            'body'=>'required' 
        ]); 
        $status=auth()->user()->user_role=='admin'?$request->status:'draft';
         $featuredImage=$request->featured; 
         $featuredNewName=time().$featuredImage->getClientOriginalName();
         $featuredImage->move('uploads/posts', $featuredNewName);

         $post= Post::create([
             'title'=>$request->title,
             'body'=>$request->body,
             'user_id'=>auth()->user()->id,
             'featured'=>'uploads/posts/'.$featuredNewName,
             'category_id'=>$request->category_id,
             'slug'=>str_slug($request->title),
             'status'=> $status,


         ]);

         $post->tags()->attach($request->tags);
            Session::flash('success',"Post Saved Successfully");
        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->user_role!='admin'){
            if(auth()->user()->id!=Post::find($id)->user_id){
                Session::flash('info',"You only can edit your own posts");
                return redirect()->back();
            }
        }   
        
        $categories=Category::all();
        return view('admin.blog.posts.edit')->with(['categories'=>$categories, 'post'=> $this->show($id),'tags'=>Tag::all()]);
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
        $this->validate($request,[
            'title'=>'required|max:255',
            
            'body'=>'required' 
        ]); 
        $status=auth()->user()->user_role=='admin'?$request->status:'draft';
        $post= Post::find($id);
        if($request->hasFile('featured')){

            $featuredImage=$request->featured; 
            $featuredNewName=time().$featuredImage->getClientOriginalName();
            $featuredImage->move('uploads/posts', $featuredNewName);
            $post->featured='uploads/posts/'.$featuredNewName;

        }


       $post->title=$request->title;
       $post->body=$request->body;
       $post->category_id=$request->category_id;
       $post->slug=str_slug($request->title);
       $post->status= $request->status;

        
         
         $post->save();
         $post->tags()->sync($request->tags);
            Session::flash('success',"Post Updated Successfully");
        return redirect()->route('posts', ['status'=>'draft']);//<a href="{{route('posts', ['status'=>'draft'])}}" class="btn btn-danger btn-sm"> Cancel</a> 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $post=Post::find($id);
        if(auth()->user()->user_role!='admin'){
            if(auth()->user()->id!=$post->user_id){
                Session::flash('info',"You only can delete your own posts");
                return redirect()->back();
            }
        }
        $post->delete();

        Session::flash('success', "The Post Successfully Trashed");

        return redirect()->route('posts', ['status'=>'draft']);
    }



    public function kill($id)
    {
       $post= Post::withTrashed()->where('id', $id)->first();
       
        $post->forceDelete();
        Session::flash('success', "The Post Deleted Permanently");

        return redirect()->route('posts.trashed');
    }


    public function restore($id)
    {
       $post= Post::withTrashed()->where('id', $id)->first();
       
        $post->restore();
        Session::flash('success', "The Post Restored Successfully");

        return redirect()->route('posts', ['status'=>'draft']);
    }
}
