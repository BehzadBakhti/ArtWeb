@extends('layouts.admin_shop')


@section ('content')

  @include('includes.error')

<div class="panel panel-default">
    <div class="panel-heading">
         Edit Tag 
    </div>
    <div class="panel-body">
        <form action="{{ route('tag.update', ['id'=>$toedit->id]) }}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="tag">Title</label>
                    <input type="text" name="tag" class="form-control" value="{{$toedit->tag}}">
                </div>
               
               
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Update Tag</button>
                </div>


        </form>
    </div>
</div>
@include('admin.shop.tags.list')

@endSection 