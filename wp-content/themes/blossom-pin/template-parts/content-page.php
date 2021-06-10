<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php


        /**
         * Post Thumbnail
         * @hooked blossom_pin_single_page_header - 15
         * @hooked blossom_pin_post_thumbnail -20
        */
        do_action( 'blossom_pin_before_page_entry_content' );
    
        /**
         * Entry Content
         * 
         * @hooked blossom_pin_entry_content - 15
         * @hooked blossom_pin_entry_footer  - 20
        */
        do_action( 'blossom_pin_page_entry_content' );    
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
