@extends('layouts.admin_shop')


@section ('content')

@include('includes.error')

<div class="card card-default p-3">
    <div class="card-header">
         Create a New Event 
    </div>
    <div class="card-block">
        <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
                <div class="form-group">
                    <label for="event_title">Event Title</label>
                    <input type="text" name="event_title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    
                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="featured_image" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>

                </div>
                

                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" class="form-control">
                </div>
<hr/>                
                
                <div class="form-group ">
                    <label for="active ">Activity</label>
                    <div class="checkbox col-md-2">
                            <label ><input class="px-2" type="checkbox" name="active" value="1">&nbsp Is Active?</label>
                        
                  </div>

<hr/>
                <div class="form-group">
                    <label for="detail">Detail</label>
                   <textarea name="detail" id="detail" class="form-control"></textarea>
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