(function($){
	
	
	function initialize_field( $el, field_name ) {
	
		$(':text:visible',$el).autocomplete({
			source: function( request, response  ){
				
				if(!request.term.trim().length)
					response( [] );
				
				$.getJSON( ajaxurl, { 
						'action' : 'autocomplete_ajax',
						'field_key' : field_name,
						'request' : request.term.trim()
					}, function( data ){
					
					response( data );
					
				});
			}
		});
	}
	
	if( typeof acf.add_action !== 'undefined' ) {
	
		/*
		*  ready append (ACF5)
		*/
		
		acf.add_action('ready append', function( $el ){
			
			// search $el for fields of type 'autocomplete'
			acf.get_fields({ type : 'autocomplete'}, $el).each(function(){
				
				initialize_field( $(this), $(this).data('name') );
				
			});
			
		});
		
		
	} else {
		
		
		/*
		*  acf/setup_fields (ACF4)
		*/
		
		$(document).on('acf/setup_fields', function(e, postbox){
			
			$(postbox).find('.field[data-field_type="autocomplete"]').each(function(){
				
				initialize_field( $(this), $(this).data('field_name') );
				
			});
		
		});
	
	
	}


})(jQuery);