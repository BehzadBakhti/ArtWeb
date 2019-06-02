@extends('layouts.dashboard')


@section ('dashboadr_subpage')

@include('includes.error')

<div class="card card-default p-3">
    <div class="card-header">
         Edit Event 
    </div>
    <div class="card-block">
        <form action="{{ route('event.update',['id'=>$event->id]) }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
                <div class="form-group">
                    <label for="event_title">Event Title</label>
                    <input type="text" name="event_title" class="form-control" value="{{$event->event_title}}">
                </div>

                <div class="form-group">
                    <label for="featured_image" >Featured Image</label>
                    
                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="featured_image" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>

                </div>
                

<hr/> 
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control" >
                        @foreach($categories as $category)

                            <option value="{{$category->id}}"  
                            
                                @if( $category->id == $event->category_id)

                                        selected
                                @endif
                                
                                >{{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>
<hr/>                 
                <div class="form-group ">
                    <label for="active ">Activity</label>
                    <div class="checkbox col-md-2">
                            <label ><input class="px-2" type="checkbox" name="active" value="1"  
                            @if($event->active==1))
                                checked
                             @endif
                            >&nbsp Is Active?</label>
                     </div>

                    <label for="mainEvent ">Activity</label>
                    <div class="checkbox col-md-2">
                            <label ><input class="px-2" type="checkbox" name="mainEvent" value="1"  
                            @if($event->is_main==1))
                                checked
                             @endif
                            >&nbsp Is Main?</label>
                     </div>
<hr/>
                <div class="form-group">
                    <label for="detail">Detail</label>
                   <textarea name="detail" id="detail" class="form-control">{{$event->detail}}</textarea>
                </div>



                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm"> Save Event</button>
                   <a href="{{route('admin.events')}}" class="btn btn-danger btn-sm"> Cancel</a> 
                </div>



        </form>
    </div>
</div>

@stop

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop