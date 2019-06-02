@extends('layouts.dashboard')


@section ('dashboadr_subpage')


 @include('includes.error')


{{dd($products)}}

<div class="panel panel-default">
<div class="panel-heading">
Trashed Posts
</div>
    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>
                Title
                </th>
                <th>
                Imdage                
                </th>
                <th>
                Editing
                </th>
                <th>
                Restoring
                </th>
            </thead>
            <tbody>
@if($posts->count()>0)
    @foreach($posts as $post)
            
            <tr>
                <td>
                {{$post->title}}
                </td>
                <td>
                     <img src="{{$post->featured}}"  width="50px" height="50px">
                     
                </td>
                <td>
                     <a href="{{route('post.edit', ['id'=>$post->id]) }}" class="btn btn-primary btn-sm">
                        Edit
                     </a>
                     
                </td>
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