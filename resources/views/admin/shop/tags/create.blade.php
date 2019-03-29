@extends('layouts.admin_shop')


@section ('content')

  @include('includes.error')

<div class="panel panel-default">
    <div class="panel-heading">
         Create a New Tag 
    </div>
    <div class="panel-body">
        <form action="{{ route('prod_tag.store') }}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="tag">Title</label>
                    <input type="text" name="tag" class="form-control">
                </div>
               
               
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Save Tag</button>
                </div>


        </form>
    </div>
</div>
@include('admin.shop.tags.list')

@endSection 