@extends('layouts.admin_shop')


@section ('content')

  @include('includes.error')


<div class="card p-3">
    <div class="card-header">
          Edit Category
    </div>
    <div class="card-block">
        <form action="{{ route('prod_cat.update', ['id'=>$toedit->id])}}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control" value="{{$toedit->name}}">
                </div>
               
                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">
                                No Parent
                            </option>
                        @foreach($categories as $category)

                            @if($category!=$toedit)
                                <option value="{{$category->id}}" 
                                        @if($category->id == $toedit->parent_id)
                                            selected
                                        @endif
                                    >
                                    {{$category->name}}
                                </option>

                            @endif
                            
                        @endforeach
                    </select>
                   
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Update Category</button>
                </div>


        </form>
    </div>
</div>
@include('admin.shop.categories.list')

@endSection 