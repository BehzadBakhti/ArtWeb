$(document).ready(function() {
    $('#description').summernote({
    
      popover: {
          image: [],
          link: [],
          air: []
          }
      });
  
          //=== Handling image uploads
  
          var max_fields = 10;
          var wrapper = $("#image-wraper");
          var add_button = $("#addImageBtn");
       
  
          var x = 1;
          $(add_button).click(function(e) {
              e.preventDefault();
              if (x < max_fields) {
              x++;
              console.log(x)
              $(wrapper).append('<label class="image-container"><button type="button" class= "x text-center"> x </button> <label> <a class="image_link" id="image_link_'+x+'" href="#"  > <img id="btn_image_'+x+'" src="{{asset("images/default.png")}}" width="100px" height="100px" > </a> <input type="file" name="images[]" class="my_file" id="my_file_'+x+'" style="display: none;" /> </label>    </label> <input id="image_name_'+x+'" type="text" name="image_names[]" hidden>');
              }
          });
  
          $(wrapper).on("click", ".x", function(e) {
              e.preventDefault();
              $(this).parent('.image-container').remove();
              x--;
          })
  
          $(wrapper).on('input change', '.my_file' ,function(){
                  var input = this;
                  var url = $(this).val();
                  var id= $(this).attr('id');
                  num=id.split('_')[2];
                  var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                  var fileName= input.files[0].name;
                  if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
                  {
                      var fileName= input.files[0].name;
                      var reader = new FileReader();
  
                      reader.onload = function (e) {
                      $('#btn_image_'+num).attr('src', e.target.result);
                      $('#image_name_'+num).attr('value', fileName);
                      }
                  reader.readAsDataURL(input.files[0]);
                  }
                  else
                  {
                  $('#btn_image_'+num).attr('src', '{{asset("images/default.png")}}');
                  }
  
          });
  
         
          $(wrapper).on( 'click', '.image_link', function(e){
              e.preventDefault();
              var id= $(this).attr('id');
                  num=id.split('_')[2];
  
                      $('#my_file_'+num).trigger("click"); 
                     
          });
  
  
  
      // Handeling additional Specifications
  
   
   var spx = 0;
      $('#addSpecsBtn').click(function(e) {
          e.preventDefault();
          spx++;
          
          $('#specs-wrapper').append('<div class="spec-container row"><div class=" col-md-3 pr-1"> <div>Spec Name</div> <input class="form-control" type="text" name="spec_key[]"> </div> <div class="col-md-7 px-1"> <div> Spec Value</div> <input class="form-control" type="text" name="spec_value[]">  </div> <div class="col-md-2 pl-1"> <div >&nbsp</div>  <button type="button" class="removeSpecBtn btn btn-danger">Remove</button>   </div></div>');
          
      });
  
  
      $('#specs-wrapper').on("click", ".removeSpecBtn", function(e) {
          
          e.preventDefault();
          $(this).closest('.spec-container').remove();
          spx--;
      })
  
  
  });