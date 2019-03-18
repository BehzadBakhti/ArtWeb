@extends('layouts.app')


@section ('content')

    @if(count(@errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <i class="list-group-item text-danger">
                {{$error}}
                </i>
            @endforeach
        </ul>
    @endif

<div class="panel panel-default">
    <div class="panel-heading">
         Create a New Post 
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
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                   <textarea name="body" class="form-control"></textarea>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Save Post</button>
                </div>



        </form>
    </div>
</div>

@endSection 