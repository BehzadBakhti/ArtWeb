@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')

<div class="panel panel-default rtl">
    <div class="panel-heading">
         محموله جدید
    </div>
    
    <form action="{{route('cargo.store')}}" method="post">
    <div class="panel-body">
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">تاریخ تحویل </label>
                    <input type="text" name="deliveryDate" id="deliveryTime" class="form-control" value="">
                    <span id='span1'></span>
                </div>

                <div class="form-group">
                    <label for="address">آدرس انبار</label>
                    <input type="text" name="address" class="form-control" value="">
                </div>
               
    </div>

 



<div class="panel-body">
    
        <label for="">نام محصول</label>
        <input class='form-control' type="text"  id="newProduct">
        <div id="searchedProducts">
            <div class="searchItems" id="searchItems">

            </div>
            
        </div>

        <h4>لیست اقلام محموله</h4>
            <table class="table table-hover">

                <thead calss='text-right'>
                    <th>
                    حذف
                    </th>
                    <th>
                    تصویر                
                    </th>
                    <th>
                    عنوان
                    </th>
                    
                    <th>
                    برند
                    </th>
                    <th>
                    دسته بندی                
                    </th>
                    <th>
                     تعداد در محموله
                    </th>             
                    
                </thead>
                <tbody id='tableBody'>
               
                </tbody>
                
            </table>
        </div>

        <hr>
        <div class="form-group">وضعیت محموله
            <select name="status" >
                <option value="draft">پیش نویس</option>
                <option value="shipped">ارسال شده</option>
                <option value="delivered">دریافت شده</option>
            </select>
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm"> ذخیره</button>
                <a href="{{route('cargoes')}}" class="btn btn-danger btn-sm"> انصراف</a> 
            </div>

        </form>
</div>

@endSection 

@Section('scripts')

<script>

      $(function() {
        $("#deliveryTime, #span1").persianDatepicker();       
        });
</script>


<script>
 $(document).ready(function() {
    $("#newProduct").val("")
   var vendorProducts={!!$vendorProducts!!}
   var itemsHtml=''
   var newRow=''
  // console.log(vendorProducts)
   var activeList=[];
    

    $('#searchItems').on('click', '.searchResultItem', function(){
        
        id= $(this).attr('id').split('_')[1]
        if( lookup(activeList, 'id', id)){
            console.log('already has')
            return;
        }
        prod= lookup(vendorProducts, 'id', id);
        $("#newProduct").val("")
        $('#searchItems').empty();
        newRow='<tr>'+
                   '<td> <a class="btn btn-danger removeItemFromList">X</a><input type="hidden" name="products_id[]" value="'+prod.id+'"></td>'+
                   '<td> <img src="'+'{{route("index")}}'+'/'+prod.images[0].image_name+'" width="50px"> </td>'+
                   '<td>'+prod.name+'</td>'+
                   '<td>'+prod.brand.name+'</td>'+
                   '<td>'+prod.product_category.name +'</td>'+
                   '<td><input type="text" class="productQty" name="product_qty[]" value="0"></td>'+
               '</tr>'
        $('#tableBody').append(newRow)
        activeList.push({"id":prod.id})
        //console.log(activeList)
        newRow='';
    });

    $('#tableBody').on('click', '.removeItemFromList', function(){
        $(this).closest('tr').remove();
        removeByProp(activeList, 'id', $(this).siblings('input').val())
        $("#newProduct").val("")
        $('#searchItems').empty();
    })


    $('#newProduct').keyup(function(){
        itemsHtml=''
        if($("#newProduct").val()!=''){
                loadItems( $("#newProduct").val())
        }else{
            $('#searchItems').empty();
        }
   
            
    });


   
   //console.log(itemsHtml)
    function loadItems(phrase){
         $('#searchItems').empty();
        vendorProducts.forEach(element => {
            if(element.name.includes(phrase)){
               // console.log(element.images[0].image_name)
                itemsHtml+=" <a id='item_"+element.id+"' class='searchResultItem'> <img src='"+"{{route('index')}}"+'/'+element.images[0].image_name+"' alt='' width='50px'  ><span>"+element.name+"</span></a>"
            }
        });

       
        //console.log(itemsHtml)
        $('#searchItems').html(itemsHtml)

    }



    function lookup(array, prop, value) {
         
            for (var i = 0, len = array.length; i < len; i++)
            if (array[i] && array[i][prop] == value) return array[i];

        }



        function removeByProp(array, prop, value) {
         
         for (var i = 0, len = array.length; i < len; i++)
         if (array[i] && array[i][prop] == value) return array.splice(i, 1);;

     }
 });



</script>
@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop