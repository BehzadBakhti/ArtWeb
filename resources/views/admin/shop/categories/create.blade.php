@extends('layouts.dashboard')


@section ('dashboadr_subpage')

  @include('includes.error')

<div class="card p-3 rtl">
    <div class="card-header">
         Create a New Category 
    </div>
    <div class="card-block">
        <form action="{{ route('prod_cat.store') }}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control">
                </div>
               
                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">
                                No Parent
                            </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Save Category</button>
                </div>


        </form>
    </div>
</div>
@include('admin.shop.categories.list')

@endSection 