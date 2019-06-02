@extends('layouts.dashboard')


@section ('dashboadr_subpage')


 @include('includes.error')




<div class="panel panel-default rtl">
<div class="panel-heading">
پست های حذف شده 
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
@if($posts->count()>0)
    @foreach($posts as $post)
            
            <tr>
            <tr>
                    <td> {{$post->title}} </td>
                    <td> <img src="{{$post->featured}}"  height="40px" > </td>
                    <th>{{$post->user->name}}</th>
                    <td> {{$post->status}}  </td>
                    <td>
                    <a href="{{route('posts.trashed.restore', ['id'=>$post->id]) }}" class="btn btn-success btn-sm">
                            Restore
                        </a>
                    </td>
                    <td>
                    <a href="{{route('posts.trashed.delete', ['id'=>$post->id]) }}" class="btn btn-danger btn-sm">
                            Delete
                        </a>
                    </td>
                </tr>
     
                
            </tr>

        @endforeach
@else

<tr>
    <th colspan="5" class='text-center'> No Trashed Post</th>
</tr>

@endIf

           
            </tbody>
            
        </table>
    </div>
</div>

@endSection 