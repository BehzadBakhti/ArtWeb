@extends('layouts.admin_shop')


@section ('content')

 @include('includes.error')




<div class="panel panel-default">

<div class="panel-heading">
Product <a href="{{route('product.create')}}" class="btn btn-primary btn-sm my-2 mx-auto align-center">Add+</a>
</div>

    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>
                Title
                </th>
                <th>
                Category                
                </th>
                <th>
                Editing
                </th>
                <th>
                Deleting
                </th>
            </thead>
            <tbody>
            @foreach($products as $product)
            
                <tr>
                    <td>
                    {{$product->name}}
                    </td>
                    <td>
                        {{$product->product_category->name}}
                         
                    </td>
                    <td>
                         <a href="{{route('product.edit', ['id'=>$product->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                         
                    </td>
                    <td>
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