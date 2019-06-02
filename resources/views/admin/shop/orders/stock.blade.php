@extends('layouts.dashboard')


@section ('dashboadr_subpage')

@include('includes.error')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default rtl text-right">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">موجودی کالا</h3>
                    <a href="#" class='btn btn-success btn-sm'>گزارش موجودی </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="stockTable" class="table table-bordered table-hover table-striped">
                        <thead >
                            <tr>
                                <th>عنوان</th>
                                <th>تامین کننده </th>
                                <th>برند  </th>
                                <th> دسته بندی  </th>
                                <th> تعداد سفارش </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stockProducts as $product)
                                <tr>
                                    <td> {{$product->name}}</td>
                                    <td> {{$product->brand->user->vendor->name}} </td>
                                    <td> {{$product->brand->name}}    </td>
                                    <td> {{$product->product_category->name}} </td>
                                    <td> {{$product->stock}} </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

<script>
  $(function() {

    $('#stockTable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
  </script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop

