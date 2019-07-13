@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')

<div class="panel panel-default rtl">
    <div class="panel-heading">
        ویرایش مطلب 
    </div>
    <div class="panel-body">
        <form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="featured">تصویر</label>
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
                    <label for="category">دسته بندی</label>
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
                    <label for="tags">انتخاب تگ ها</label>
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
                    <label for="body">متن</label>
                   <textarea name="body" id="body" class="form-control" >{{$post->body}}</textarea>
                </div>

                <div class="form-group">وضعیت پست
                    <select name="status" >
                        <option value="draft"  {{$post->status=='draft' ? 'selected' : ''}}  >پیش نویس</option>
                        <option value="published"  {{$post->status=='published' ? 'selected' : ''}} >منتشر شده</option>
                    </select>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm"> ذخیره مطلب</button>
                   <a href="{{route('posts', ['status'=>'draft'])}}" class="btn btn-danger btn-sm"> بازگشت</a> 
                </div>



        </form>
        <hr>
        <div>
            نظرات کاربران:
            <div>
            <table class="table table-hover">

                <thead>
                    <th>کاربر  </th>
                    <th>متن نظر  </th>
                    <th>وضعیت</th>
                    <th>عملیات </th>
                </thead>
                <tbody>
                @foreach($post->comments as $comment)

                    <tr>
                        <td> {{$comment->user_name}} </td>
                        
                        <th>{{$comment->body}}</th>

                    @if($comment->qualified==1 )
                        <td>
                            <span>تایید شده</span>
                        </td>
                        <td>
                        <a  disabled class="btn btn-primary btn-sm">
                                تایید
                            </a>
                        <a href="{{route('blog.post.rejectComment', ['id'=>$comment->id]) }}" class="btn btn-danger btn-sm">
                                ریجکت
                            </a>
                        </td>
                        
                    @elseif($comment->qualified==2 )
                        <td>
                            <span>رد شده</span>
                        </td>
                        <td>
                        <a href="{{route('blog.post.acceptComment', ['id'=>$comment->id]) }}" class="btn btn-primary btn-sm">
                                تایید
                            </a>
                        <a disabled  class="btn btn-danger btn-sm">
                                ریجکت
                            </a>
                        </td>

                    @else
                        <td>
                            <span>جدید</span>
                        </td>

                        <td>
                        <a href="{{route('blog.post.acceptComment', ['id'=>$comment->id]) }}" class="btn btn-primary btn-sm">
                                تایید
                            </a>
                        <a href="{{route('blog.post.rejectComment', ['id'=>$comment->id]) }}" class="btn btn-danger btn-sm">
                                ریجکت
                            </a>
                        </td>

                    @endif
                       
                        
                    </tr>

                @endforeach
                </tbody>

                </table>
            </div>
        </div>
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