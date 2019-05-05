<script>
        
    $(document).ready(function() {

             

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


            
            var urlSplit=window.location.href.split('/')
            productId=urlSplit[urlSplit.length-1].split('?')[0]
            var baseUrl="{{route('shop')}}/ajax/product/"+productId
                



                $("#reviewPaginationLinks").on('click', 'a', function(e){
                    console.log(baseUrl)
                    e.preventDefault();
                    
                    page=$(this).attr('href').split('=')[1]
                   href=baseUrl+'?page='+page
                       $.ajax({
                            type:"GET",
                            url: href, 
                                                
                            success: function(result){
                                console.log(result)
                                $('#reviewsContent').html(result.productReviewsHTML);
                                $('#reviewPaginationLinks').html(result.links);
                            },
                            error: function(e){
                                console.log(e)
                            }

                        });             

                })

    }); 

    
    </script>