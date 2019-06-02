@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')




<div class="panel panel-default rtl text-right">

<div class="panel-heading">
محصولات <a href="{{route('product.create')}}" class="btn btn-primary btn-sm my-2 mx-auto align-center">افزودن محصول جدید +</a>
</div>

    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>
                عنوان
                </th>
                <th>
                تامین کننده
                </th>
                <th>
                برند
                </th>
                <th>
                دسته بندی                
                </th>
                <th>
                وضعیت                
                </th>
                <th>
                عملیات
                </th>
                
            </thead>
            <tbody>
            @foreach($products as $product)
            
                <tr>
                    <td>
                    {{$product->name}}
                    </td>
                    
                    <td>

                        {{$product->brand->user->vendor->name}}
                         
                    </td>
                    <td>

                        {{$product->brand->name}}
                         
                    </td>
                    <td>
                        {{$product->product_category->name}}
                         
                    </td>
                    <td>

                        نامشخص
                         
                    </td>
                    <td>
                         <a href="{{route('product.edit', ['id'=>$product->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                         <a href="{{route('product.delete', ['id'=>$product->id]) }}" class="btn btn-danger btn-sm">
                            Delete
                         </a>
                         
                    </td>
                    
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
    
</div>

<div id="paginationLinks">
    {{$products->links()}}
</div>
@endSection 