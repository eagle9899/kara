(function($){
    
        
    $('.select2').select2({
        theme: 'bootstrap-5',
        containerCssClass: 'select2--small', 
    });
    $(document).ready(function(){
        $('.form-tabledata').DataTable();
    });

    $$('.magnific').magnificPopup({
	  	type: 'image',
		gallery:{
			enabled:true
		}
	});
})(jQuery);