@extends('layouts.app')


@section ('content')

 @include('includes.error')




<div class="panel panel-default">

<div class="panel-heading">
Posts <a href="{{route('post.create')}}" class="btn btn-primary btn-sm my-2 mx-auto align-center">Add+</a>
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
                Deleting
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