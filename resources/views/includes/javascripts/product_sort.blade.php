<script>
        
    $(document).ready(function() {

             

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


            var sortRule
            var categoryId=window.location.href.split('category-')[1]
            var baseUrl

                if (categoryId===undefined) {
                    baseUrl="{{route('shop')}}/ajax/"
                }else{
                    baseUrl="{{route('shop')}}/ajax/category-"+categoryId+"/"
                }

                $(".sortBtn").on('click', function(){
                sortRule=$(this).val();
                $(".sortBtn.active").removeClass('active')
                $(this).addClass('active')
                $(this).blur();
                //  console.log(sortRule)
                 sortProducts(sortRule, baseUrl+sortRule)

                })


                $("#paginationLinks").on('click', 'a', function(e){
                    e.preventDefault();
                    if(sortRule===undefined){
                        sortRule='mostSeen'
                        page=$(this).attr('href').split('=')[1]
                    sortProducts(sortRule, baseUrl+sortRule+'?page='+page)
                    }else{
                        sortProducts(sortRule, $(this).attr('href'))
                    }
                   

                })


                function sortProducts(sortRule, href) {
                   // console.log(href)
                    $.ajax({
                            type:"GET",
                            url: href, 
                                                
                            success: function(result){
                                
                                $('#shop-product').html(result.productsGrid);
                                $('#shop-list').html(result.productsRow);
                                $('#paginationLinks').html(result.links);
                            },
                            error: function(e){
                                console.log(e)
                            }

                        });

                }

    }); 

    
    </script>