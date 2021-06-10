;(function($) {
'use strict'
// Dom Ready

	$(function() {
		
		if( $('.image-popup').length ){
			$('.image-popup').magnificPopup({type:'image'});
		}
		
		if( jQuery(".masonry_grid").length){
			jQuery('.masonry_grid').masonry({
			  // set itemSelector so .grid-sizer is not used in layout
			  itemSelector: '.grid-item',
			  // use element for option
			  columnWidth: '.grid-sizer',
			  percentPosition: true
			});
		}
		
		$(".shoper-rd-navbar-toggle").on('keydown', function(e){
			 if ((e.which === 9 && !e.shiftKey)) {
			
			 $('#nav_bar_wrap').find('.shoper-navbar-close').focus();
			}
	    });
		$(".shoper-navbar-close").on('keydown', function(e){
			 if ((e.which === 9 && !e.shiftKey)) {
			 $(".shoper-rd-navbar-toggle").focus();
			}
	    });
		
		
	});
})(jQuery);

