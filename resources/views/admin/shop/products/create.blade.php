@extends('layouts.admin_shop')


@section ('content')

@include('includes.error')

<div class="card card-default p-3">
    <div class="card-header">
         Create a New Poroduct 
    </div>
    <div class="card-block">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dimension">Dimensions</label>
                    <input type="text" name="dimension" class="form-control">
                </div>
                <div class="form-group">
                    <label for="material">Material</label>
                    <input type="text" name="material" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Image 1</label>
                    
                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image_1" size="40"  onchange='$("#upload-file-info_1").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info_1"></span>
                    </div>

                    <label for="featured">Image 2</label>
                    
                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image_2" size="40"  onchange='$("#upload-file-info_2").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info_2"></span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>
                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach($tags as $tag)
                    <div class="checkbox">
                            <label ><input class="px-2" type="checkbox" name="tags[]" value="{{ $tag->id}}">{{$tag->tag}}</label>
                        
                        </div>
                    @endforeach
                
                </div>
                <div class="form-group">
                    <label for="detail">ِDescription</label>
                   <textarea name="detail" id="detail" class="form-control"></textarea>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm"> Save Product</button>
                   <a href="{{route('products')}}" class="btn btn-danger btn-sm"> Cancel</a> 
                </div>



        </form>
    </div>
</div>

@stop

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#detail').summernote({
  
    popover: {
        image: [],
        link: [],
        air: []
        }
    });
});
</script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop