@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')

<div class="panel panel-default rtl">
    <div class="panel-heading">
         ایجاد مطلب جدید 
    </div>
    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    
                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="featured" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>
                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach($tags as $tag)
                    <div class="checkbox">
                            <label ><input class="px-2" type="checkbox" name="tags[]" value="{{ $tag->id}}">{{$tag->tag}}</label>
                        
                        </div>
                    @endforeach
                
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                   <textarea name="body" id="body" class="form-control"></textarea>
                </div>
                <div class="form-group">وضعیت پست
                    <select name="status" >
                        <option value="draft">پیش نویس</option>
                        <option value="published">منتشر شده</option>
                    </select>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm"> Save Post</button>
                   <a href="{{route('posts', ['status'=>'draft'])}}" class="btn btn-danger btn-sm"> Cancel</a> 
                </div>

        </form>
        
    </div>
</div>

@stop

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#body').summernote({
  
  popover: {
      image: [],
      link: [],
      air: []
      }
  });
});
</script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop