<script>
        
    $(document).ready(function() {
        var shopRoot="{{route('shop')}}/product/"

        
        $('.quickViewBtn').on('click', function(){
          //  console.log($(this).siblings('.productDetail'))
            $('#modal_productName').html($(this).attr('item'))
            $('#modal_productPrice').html($(this).attr('price'))
            $('#modal_productDetail').html($(this).siblings('.productDetail').html())
            $('#modal_productLink').attr('href', shopRoot+$(this).attr('product_id'))
            $('#modal_productImageLink').attr('src', $(this).attr('imgSrc'))
            
            $('#modal_productAddToCartBtn').attr({
                product_id:$(this).attr('product_id'),
                item: $(this).attr('item'),
                price: $(this).attr('price'),
                })

        })

             


    }); 

        
        </script>