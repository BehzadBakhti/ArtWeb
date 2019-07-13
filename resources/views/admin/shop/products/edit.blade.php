@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')

<div class="panel panel-default rtl">
    <div class="panel-heading">
         ویرایش محصول
    </div>
    <div class="panel-body">
        <form action="{{ route('product.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">عنوان محصول</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>

                <div class="form-group">
                    <label for="dimension">ابعاد</label>
                    <input type="text" name="dimension" class="form-control" value="{{$product->dimension}}">
                </div>
                <div class="form-group">
                    <label for="material">جنس</label>
                    <input type="text" name="material" class="form-control" value="{{$product->material}}">
                </div>
                <div class="form-group">
                    <label for="price">قیمت</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="discount">درصد تخفیف (%)</label>
                    <input type="text" name="discount" class="form-control" value="{{$product->discount}}">
                </div>
                <div class="form-group">
                    <label for="stock">موجودی</label>
                    <input type="text" name="stock" class="form-control" value="{{$product->stock}}">
                </div>

  <hr/>
                <label for="featured">تصاویر</label>
                <div class="form-group" >
                   
                    <label id="image-wraper" >  
                        
                        @foreach($images as $image)
                            <label class="image-container">
                                        <button type="button" class= "x text-center">
                                            x
                                        </button>
                                        <label for="">
                                            <a href="#"  class="image_link" id="image_link_1" >
                                            <img id="btn_image_1" src="{{asset($image->image_name)}}" width="100px" height="100px" >
                                            </a>
                                            <input type="file" class="my_file" id="my_file_1" name="images[]" style="display: none;" />  

                                        </label>
                            <input type="text" name='image_names[]' value="{{$image->image_name}}" hidden>        
                            </label>
                            

                        @endforeach
                
                
                    </label> 

                        

                        <button type="button" width="100px" id="addImageBtn"> <img src="{{asset('images/add.png')}}" alt="add image"></button>

                    

                </div>
 <hr/> 
                <div class="form-group">
                    <label for="category">دسته بندی</label>
                    <select name="category_id" id="category" class="form-control" >
                        @foreach($categories as $category)

                            <option value="{{$category->id}}"  
                            
                                @if( $category->id == $product->product_category_id)

                                        selected
                                @endif
                                
                                >{{$category->name}}
                            </option>
                        @endforeach
                    </select>
                   
                </div>

    <hr/>

                <div class="form-group  ">
                    <label >ویژه‌گی های دیگر</label>
                        <div id="specs-wrapper" >
                @foreach($specs as $spec)
                            <div class="spec-container row">
                                <div class=" col-md-3 pr-1">
                                    <div>عنوان ویژه‌گی</div>
                                    <input class="form-control" type="text" name="spec_key[]" value="{{$spec->key}}">
                                </div>
                                <div class="col-md-7 px-1">
                                        <div> مقدار</div>
                                        <input class="form-control" type="text" name="spec_value[]" value="{{$spec->value}}">     
                                </div>
                                <div class="col-md-2 pl-1">
                                        <div >&nbsp</div>
                                        <button  class="removeSpecBtn btn btn-danger">حذف ویژه‌گی</button>     
                                </div>
                            </div>

                @endforeach



                            

                    </div>
                
                </div> 
                <button class="btn btn-primary" type="button" id="addSpecsBtn">افزودن ویژه‌گی جدید</button>

    <hr/>

                <div class="form-group">
                <label for="tags">انتخاب برچسب</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label ><input class="px-2" type="checkbox" name="tags[]" value="{{ $tag->id}}"

                            @foreach($product->tags as $t)
                                @if($tag->id==$t->id))

                                    checked

                                @endif
                            @endforeach

                            >{{$tag->tag}}</label>
                        
                        </div>
                    @endforeach
                
                </div>
<hr/>

                <div class="form-group">
                    <label for="detail">خللاصه جرئیات</label>
                   <textarea name="detail" id="detail" class="form-control">{{$product->detail}}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">شرح جزئیات</label>
                   <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                </div>
<hr/>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm"> ذخیره</button>
                   <a href="{{route('admin.products')}}" class="btn btn-danger btn-sm"> انصراف</a> 
                </div>



        </form>

        <hr>
        <div>
            نظرات کاربران:
            <div>
            <table class="table table-hover">

                <thead>
                    <th>عنوان  </th>
                    <th>کاربر  </th>
                    <th>متن نظر  </th>
                    <th>وضعیت</th>
                    <th>عملیات </th>
                </thead>
                <tbody>
                @foreach($product->reviews as $review)

                    <tr>
                        <td> {{$review->title}} </td>
                        <td> {{$review->user->name}} </td>
                        
                        <th style='width: 50%'>{{$review->review}}</th>

                    @if($review->qualified==1 )
                        <td>
                            <span>تایید شده</span>
                        </td>
                        <td>
                        <a  disabled class="btn btn-primary btn-sm">
                                تایید
                            </a>
                        <a href="{{route('shop.product.rejectReview', ['id'=>$review->id]) }}" class="btn btn-danger btn-sm">
                                ریجکت
                            </a>
                        </td>
                        
                    @elseif($review->qualified==2 )
                        <td>
                            <span>رد شده</span>
                        </td>
                        <td>
                        <a href="{{route('shop.product.acceptReview', ['id'=>$review->id]) }}" class="btn btn-primary btn-sm">
                                تایید
                            </a>
                        <a disabled  class="btn btn-danger btn-sm">
                                ریجکت
                            </a>
                        </td>

                    @else
                        <td>
                            <span>جدید</span>
                        </td>

                        <td>
                        <a href="{{route('shop.product.acceptReview', ['id'=>$review->id]) }}" class="btn btn-primary btn-sm">
                                تایید
                            </a>
                        <a href="{{route('shop.product.rejectReview', ['id'=>$review->id]) }}" class="btn btn-danger btn-sm">
                                ریجکت
                            </a>
                        </td>

                    @endif
                       
                        
                    </tr>

                @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endSection 

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script src='{{asset("js/edit_products.js")}}'></script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop