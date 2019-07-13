<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;

class CommentsController extends Controller
{

    public function store(Request $request , $id){
        $this->validate($request,[
            'user_name'=>'required|max:255',
            'comment_body'=>'required',
            'user_email'=>'required|email' 
        ]); 

        $comment=Comment::create([
            'post_id'=>$id,   
            'user_name'=>$request->user_name,
            'email'=>$request->user_email,
            'body'=>$request->comment_body,
        ]);
    }

    public function accept($id){
        $comment= Comment::find($id)->update(['qualified'=> 1]);
        return redirect()->back();
    }

    public function reject($id){
        $comment= Comment::find($id)->update(['qualified'=> 2]);
        return redirect()->back();
    }

}
