<script>
        
        $(document).ready(function() {

            loadCartContent()

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var idToRemove=0;
                $('#cartArea').on('click','.removeItemFromCart', function(){   
                    idToRemove=$(this).attr('id')
                })


                $('#confirmDelectFromCart').on('click', function(){
                    $.ajax({
                        type:"POST",
                        url: '{{route("cart.removeFromCart")}}',
                        data:"idToRemove="+ idToRemove ,
                        success: function(result){
                            loadCartContent()
                        },
                    });
                })

                $(".addItemToCart").on('click', function(){
              
                    $.ajax({
                        type:"POST",
                        url: '{{route("cart.addToCart")}}',
                        data: {id:$(this).attr('product_id'), item:$(this).attr('item'), price:$(this).attr('price'), qty:$(this).siblings('div').find('.qty').val()},
                               
                        success: function(result){
                            loadCartContent();
                        },
                    });
                })
                function loadCartContent(){
                    $.ajax({
                        type:"Get",
                        url: '{{route("cart.getContent")}}',
                                               
                        success: function(result){
                            /// console.log('heyyy')
                      //    imgArr= (result.imgAddress).map();
                             cartArray=   Object.keys(result.output).map(function(key) {
                                   return  result.output[key] ;
                                  });
                                    if(cartArray.length>0){

                                         $('#cartIcon').html('<span class="badge">'+cartArray.length+'</span>')
                                    }else{
                                        $('#cartIcon').html('')
                                    }  
                                 var htmlContent=""
                                 var idx=0;
                                 cartArray.forEach(function(element) {

                                        var imgLink
                                        result.imgAddress.forEach(pic => {
                                            if(pic[0]==element.id){
                                            imgLink="{{route('index')}}/"+pic[1]
                                            }
                                        });
                                        var productRoute="{{route('shop')}}/product/"+element.id;
                                        htmlContent+= '<div class="cart-list"><div class="cart-list-item"><div class="cart-list-img"><a href="'+productRoute+'"><img src="'+imgLink+'" width="60px" alt="cart" /></a></div><div class="cart-content"><a href="'+productRoute+'">'+element.name+'</a><p>'+element.quantity+' x <span>'+element.price+'</span></p></div><div class="cart-button"><a href="#" id="'+element.id+'" class="removeItemFromCart" data-toggle="modal" data-target="#removeFromCartModal"><i class="fa fa-times"></i></a></div></div></div>'
                                     });
                                         htmlContent+= '<div class="col-md-12 cart-subtotal"><p>Total: <span>'+ result.total+'</span></p></div> <div class="cart-action"><button type="button" class="btn"><span>checkout</span> <i class="fa fa-long-arrow-right"></i></button> </div>'
                                                                    
                                     $('#cartArea').html(htmlContent)
                        },
                        error: function(e){
                            console.log(e)
                        }
                    });
                }
            }); 

        </script>