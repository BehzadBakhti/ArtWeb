@extends('layouts.admin_shop')


@section ('content')

  @include('includes.error')

<div class="panel panel-default">
    <div class="panel-heading">
         Create a New Category 
    </div>
    <div class="panel-body">
        <form action="{{ route('category.store') }}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control">
                </div>
               
               
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Save Category</button>
                </div>


        </form>
    </div>
</div>
@include('admin.shop.categories.list')

@endSection 