@extends('layouts.dashboard')


@section ('dashboadr_subpage')

@include('includes.error')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default rtl text-right">

            <div class="panel-heading">  
                <span>لیست سفارشات</span>
                <select name="orderStatus" id="orderStatus" onchange="loadOrderByStatus()">
                    <option value="new"  {{strpos(Request::url(), "new")>0 ? 'selected' : ''}} >جدید</option>
                    <option value="ongoing" {{strpos(Request::url(), "ongoing")>0 ? 'selected' : ''}}>در حال انجام</option>
                    <option value="shipped" {{strpos(Request::url(), "shipped")>0 ? 'selected' : ''}}>ارسال شده</option>
                </select>
            </div>
            
            <div class="panel-body">
                <table class="table table-hover">

                    <thead >
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
                        تعداد سفارش               
                        </th>
                    </thead>
                    <tbody>
                    @foreach($orderedProducts as $product)
                    
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
                                {{$product->qty}} 
                            </td> 
                        </tr>

                    @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script>
  
        function loadOrderByStatus(){
            
            var status= $('#orderStatus').val()
            
           switch (status) {
                case 'new':
                window.location.href = "{{route('orders', ['status'=>'new'])}}";
                   break;
                case 'ongoing':
                window.location.href = "{{route('orders', ['status'=>'ongoing'])}}";
                break;
                case 'shipped':
                window.location.href = "{{route('orders', ['status'=>'shipped'])}}";
                break;
                      }
                
            }
    
</script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop

