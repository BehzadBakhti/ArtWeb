@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')

<div class="panel panel-default rtl">
    <div class="panel-heading">
        سفارش شماره
        {{$orderData->id}}
    </div>
    
 
    <div class="panel-body">
       
              <div class="form-group">
                    <label for="name">تاریخ ثبت سفارش </label>
                    <div class="form-control" ></div>
                    <span id='span1'></span>
                </div>

                <div class="form-group">
                    <label for="address">آدرس گیرنده</label>
                    <div  class="form-control"><div>
                </div> 
    </div>

    <div class="panel-body">

        <h4>لیست اقلام سفارش</h4>
        <table class="table table-hover">

            <thead calss='text-right'>
                <th> تصویر    </th>
                <th> عنوان</th>
                <th>  برند </th>
                <th>  دسته بندی </th>
                <th>  تعداد درخواستی</th>             
            </thead>
            <tbody id='tableBody'>
            @foreach($orderData->products as $product)
                <tr>
                    <td>
                    <img src="{!!asset($product->images[0]->image_name)!!}" alt="" width="50px">  
                    </td>
                    <td>{{$product->name}} </td>
                    <td>{{$product->brand->name}}  </td>
                    <td>{{$product->product_category->name}} </td>
                    <td>{{$product->pivot->quantity}}</td>
                </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>
    <hr>
    <form action="{{route('order.update', ['id'=>$orderData->id])}}" method="POST">
        <div class="form-group">وضعیت سفارش
            <select name="status" >
                <option value="draft"  {{$orderData->status=='new' ? 'selected' : ''}}  >جدید</option>
                <option value="shipped"  {{$orderData->status=='ongoing' ? 'selected' : ''}} >ارسال شده</option>
                <option value="delivered"  {{$orderData->status=='shipped'? 'selected' : ''}} >دریافت شده</option>
            </select>
        </div>

        <div class="form-group">
        
            <button type="submit" class="btn btn-success btn-sm"> ذخیره</button>
            <a href="{{route('orders', ['status'=>'new'])}}" class="btn btn-danger btn-sm"> انصراف</a> 
        </div>
    </form>
    
</div>

@endSection 

@Section('scripts')


@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop