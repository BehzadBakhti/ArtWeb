@extends('layouts.dashboard')


@section ('dashboadr_subpage')

@include('includes.error')

<div class="card card-default p-3 rtl">
    <div class="card-header">
         ایجاد محصول جدید
    </div>
    <div class="card-block">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
                <div class="form-group">
                <label for="name">عنوان محصول</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dimension">ابعاد</label>
                    <input type="text" name="dimension" class="form-control">
                </div>
                <div class="form-group">
                    <label for="material">جنس</label>
                    <input type="text" name="material" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">قیمت</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="discount">تخفیف (%)</label>
                    <input type="text" name="discount" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stock">موجودی</label>
                    <input type="text" name="stock" class="form-control">
                </div>
            <label for="featured">تصاویر</label>
                <div class="form-group" >
                   
                <label id="image-wraper" >   
                    <label class="image-container">
                                <button type="button" class= "x text-center">
                                    x
                                </button>
                                <label for="">
                                    <a href="#"  class="image_link" id="image_link_1" >
                                    <img id="btn_image_1" src="{{asset('images/default.png')}}" width="100px" height="100px" >
                                    </a>
                                    <input type="file" class="my_file" id="my_file_1" name="images[]" style="display: none;" />  

                                </label>
                            
                    </label>
            
            
                 </label> 

                    

                    <button type="button" width="100px" id="addImageBtn"> <img src="{{asset('images/add.png')}}" alt="add image"></button>

                

                </div>
 <hr/>
                <div class="form-group">
                    <label for="category">دسته بندی</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>
<hr/>            
                <label for="tags ">انتخاب برچسب</label>
                <div class="form-group row">
                    
                    @foreach($tags as $tag)
                    <div class="checkbox col-md-2">
                            <label ><input class="px-2" type="checkbox" name="tags[]" value="{{ $tag->id}}">{{$tag->tag}}</label>
                        
                        </div>
                    @endforeach
                
                </div>

<hr/>

               

                <div class="form-group  ">
                    <label >ویژه‌گی های دیگر</label>
                        <div id="specs-wrapper" >
                            <div class="spec-container row">
                                <div class=" col-md-3 pr-1">
                                    <div>عنوان ویژه‌گی</div>
                                    <input class="form-control" type="text" name="spec_key[]">
                                </div>
                                <div class="col-md-7 px-1">
                                        <div> مقدار</div>
                                        <input class="form-control" type="text" name="spec_value[]">     
                                </div>
                                <div class="col-md-2 pl-1">
                                        <div >&nbsp</div>
                                        <button  class="removeSpecBtn btn btn-danger">حذف ویژه‌گی</button>     
                                </div>
                            </div>
            
                    </div>
                   
                </div> 
                <button class="btn btn-primary" type="button" id="addSpecsBtn">افزودن ویژه‌گی جدید</button>

<hr/>
                <div class="form-group">
                    <label for="detail">خلاصه جزئیات</label>
                   <textarea name="detail" id="detail" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">شرح جزئیات</label>
                   <textarea name="description" id="description" class="form-control"></textarea>
                </div>
<hr/>                
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm"> ذخیره </button>
                   <a href="{{route('admin.products')}}" class="btn btn-danger btn-sm"> انصراف</a> 
                </div>



        </form>
    </div>
</div>

@stop

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>


<script src="{{asset('js/create_products.js')}}"></script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop