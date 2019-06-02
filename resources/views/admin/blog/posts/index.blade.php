@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')




<div class="panel panel-default rtl">

<div class="panel-heading">
Posts <a href="{{route('post.create')}}" class="btn btn-primary btn-sm my-2 mx-auto align-center">Add+</a>

<select name="postStatus" id="postStatus" onchange="loadPostsByStatus()">
                    <option value="draft"  {{strpos(Request::url(), "draft")>0 ? 'selected' : ''}} >پیشنویس</option>
                    <option value="published" {{strpos(Request::url(), "published")>0 ? 'selected' : ''}}>منتشر شده</option>
                </select>
</div>

    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>عنوان  </th>
                <th>تصویر  </th>
                <th>نویسنده</th>
                <th>وضعیت </th>
                <th>عملیات </th>
            </thead>
            <tbody>
            @foreach($posts as $post)
            
                <tr>
                    <td> {{$post->title}} </td>
                    <td> <img src="{{$post->featured}}"  height="40px" > </td>
                    <th>{{$post->user->name}}</th>
                    <td> {{$post->status}}  </td>
                    <td>
                    <a href="{{route('post.edit', ['id'=>$post->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                    <a href="{{route('post.delete', ['id'=>$post->id]) }}" class="btn btn-danger btn-sm">
                            Trash
                         </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
</div>

@endSection 

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script>
  
        function loadPostsByStatus(){
            
            var status= $('#postStatus').val()
            console.log(status)
           switch (status) {
                case 'draft':
                window.location.href = "{{route('posts', ['status'=>'draft'])}}";
                   break;
                case 'published':
                window.location.href = "{{route('posts', ['status'=>'published'])}}";
                break;
               }
                
            }
    
</script>
@stop