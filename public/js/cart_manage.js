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
        var urls=$(this).attr('value')
      
         console.log($('meta[name="csrf-token"]').attr('content'))

         
        $.ajax({
            type:"POST",
            url: urls,
            data:"idToRemove="+ idToRemove ,
            
            success: function(result){

             },

        });
    })


    function loadCartContent(){
        $.ajax({
            type:"Get",
            url: urls,
            data:"idToRemove="+ idToRemove ,
            
            success: function(result){

             },

        });

    }

}); 
