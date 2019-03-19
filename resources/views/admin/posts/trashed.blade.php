@extends('layouts.app')


@section ('content')

 @include('includes.error')




<div class="panel panel-default">
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
            </tbody>
            
        </table>
    </div>
</div>

@endSection 