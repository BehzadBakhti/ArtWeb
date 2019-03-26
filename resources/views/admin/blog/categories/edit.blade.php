@extends('layouts.admin_blog')


@section ('content')

  @include('includes.error')

<div class="panel panel-default">
    <div class="panel-heading">
         Edit Category 
    </div>
    <div class="panel-body">
        <form action="{{ route('category.update', ['id'=>$toedit->id]) }}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control" value="{{$toedit->name}}">
                </div>
               
               
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Update Category</button>
                </div>


        </form>
    </div>
</div>
@include('admin.blog.categories.list')

@endSection 