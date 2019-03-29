@extends('layouts.admin_blog')


@section ('content')

 @include('includes.error')

<div class="panel panel-default">
    <div class="panel-heading">
         Create a New Post 
    </div>
    <div class="panel-body">
        <form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
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
                    <select name="category_id" id="category" class="form-control" >
                        @foreach($categories as $category)

                            <option value="{{$category->id}}"  
                            
                                @if($category->id == $post->category->id)

                                        selected
                                @endif
                                
                                >{{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>

                <div class="form-group">
                <label for="tags">Select Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label ><input class="px-2" type="checkbox" name="tags[]" value="{{ $tag->id}}"

                            @foreach($post->tags as $t)
                                @if($tag->id==$t->id))

                                    checked

                                @endif
                            @endforeach

                            >{{$tag->tag}}</label>
                        
                        </div>
                    @endforeach
                
                </div>


                <div class="form-group">
                    <label for="body">Body</label>
                   <textarea name="body" class="form-control" >{{$post->body}}</textarea>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Save Post</button>
                </div>



        </form>
    </div>
</div>

@endSection 

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