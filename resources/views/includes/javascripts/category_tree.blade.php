<script>
$('.treeItemHandle').on('click', function(e){
e.preventDefault()
	$(this).closest('li').find('a').first().siblings('ul.nested').toggleClass('active'); 
    //console.log($(this).next('i.fa'))
    $(this).toggleClass('fa-plus-square').toggleClass('fa-minus-square')
	

})


</script>