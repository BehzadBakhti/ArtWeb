<script>
        
        $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                var idToRemove=0;
                $('.removeItemFromCart').on('click', function(){
                
                    idToRemove=$(this).attr('id')
                    //console.log(idToRemove)
                })


                $('#confirmDelectFromCart').on('click', function(){
                   
                
                    console.log('{{route("cart.removeFromCart")}}',)

                    
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
                        data: {id:$(this).attr('id')}
                                               
                        success: function(result){
                                    if(sizeof($cartContent)>0){

                                        $('#cartIcon').html('<span class="badge">{{sizeof($cartContent)}}</span>')
                                    }
                        },

                    });

                })


                function loadCartContent(){
                    $.ajax({
                        type:"Get",
                        url: '{{route("cart.getContent")}}',
                                               
                        success: function(result){
                                    if(sizeof($cartContent)>0){

                                    
                                        $('#cartIcon').html('<span class="badge">{{sizeof($cartContent)}}</span>')
                                    }
                        },

                    });

                }




                }); 

        
        </script>