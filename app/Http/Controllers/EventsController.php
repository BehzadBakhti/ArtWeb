<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Illuminate\Http\Request;
use Session;

class EventsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  view('admin.shop.events.index')->with('events', Event::all()) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.shop.events.create');
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
                'event_title'=>'required|max:255',
                'featured_image'=>'required|max:255',
                'link'=>'required|max:255',
                'detail'=>'required' 
            ]); 

            $featuredImage=$request->featured_image; 
            $featuredNewName=time().$featuredImage->getClientOriginalName();
            $featuredImage->move('uploads/events', $featuredNewName);


            $event= Event::create([
                'event_title'=>$request->event_title,
                'featured_image'=>'uploads/events/'.$featuredNewName,
                'link'=>$request->link,
                'detail'=>$request->detail,
                'active'=> $request->active==1?1:0,
 
            ]);
           


            Session::flash('success',"Event Saved Successfully");
            return redirect()->route('admin.events');
         

  
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {

       $event=Event::find($id);

      // dd($event);
        return view('admin.shop.events.edit')->with('event',$event);
    }

  

    public function update(Request $request, $id)
    {
    //     dd($request->images);
    //    dd($request->image_names);
        $this->validate($request,[
            'event_title'=>'required|max:255',
         
            'link'=>'required|max:255',
            'detail'=>'required' 
        ]); 



        $event= Event::find($id);

        if($request->hasFile('featured_image')){

            $featuredImage=$request->featured_image; 
            $featuredNewName=time().$featuredImage->getClientOriginalName();
            $featuredImage->move('uploads/events', $featuredNewName);
            $event->featured_image='uploads/events/'.$featuredNewName;

        }

        $event->update([
            'event_title'=>$request->event_title,
            'link'=>$request->link,
            'detail'=>$request->detail,
            'active'=> $request->active==1?1:0,

        ]);


        Session::flash('success',"Event Updated Successfully");
    
        return redirect()->route('admin.events');     
        
    }

  
    public function destroy( $id)
    {
        Event::find($id)->delete();

        Session::flash('success', "The Event Deleted Successfully");

        return redirect()->back();
    }
}
