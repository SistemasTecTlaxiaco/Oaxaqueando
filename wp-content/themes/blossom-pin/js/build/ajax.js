/*! .isOnScreen() returns bool */
jQuery.fn.isOnScreen = function(){
    
    var win = jQuery(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
};

jQuery(document).ready(function($) {
    
    if (typeof blossom_pin_ajax !== 'undefined') {
        
        //Start Ajax Pagination
        
        var pageNum = parseInt(blossom_pin_ajax.startPage) + 1;
        var max = parseInt(blossom_pin_ajax.maxPages);
        var nextLink = blossom_pin_ajax.nextLink;
        var autoLoad = blossom_pin_ajax.autoLoad;
        
        if( autoLoad == 'infinite_scroll' ) {
            // autoload
            
            // Placeholder
            $('.pagination').before('<div class="pagination_holder" style="display: none;"></div><div class="ajax-loader"></div>');
                
            var loading_posts = false;
            var last_post = false;
            
            if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
            
            $(window).on( 'scroll', function() {
                if (!loading_posts && !last_post) {
                    var lastPostVisible = $('.latest_post').last().isOnScreen();
                    if (lastPostVisible) {
                        if(pageNum <= max) {
                            loading_posts = true;
                            $('.ajax-loader').addClass('loader');
                            $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                                // Update page number and nextLink.
                                pageNum++;
                                var new_url = nextLink;
                                
                                loading_posts = false;
                                nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum); 
                                
                                //Temporary hold the post from pagination and append it to #main
                                var load_html = $('.pagination_holder').html(); 
                                $('.pagination_holder').html('');                                 
                                
                                if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                                    // Make jQuery object from HTML string
                                    var $moreBlocks = $( load_html ).filter('article.latest_post');                        
                                    // Append new blocks to container
                                    $('.site-main').append( $moreBlocks ).imagesLoaded(function(){
                                        // Have Masonry position new blocks
                                        $('.site-main').masonry( 'appended', $moreBlocks );
                                    });
                                }else{
                                    $('.site-main article:last').after(load_html); // just simply append content without massonry
                                }                                
                            });
                            
                        } else {
                            // no more posts
                            last_post = true;
                            $('.ajax-loader').removeClass('loader');
                        }
                    }
                }
            });
            
            }
            
        $('.pagination').remove();    
        } 
        // End Ajax Pagination      
    }    
});