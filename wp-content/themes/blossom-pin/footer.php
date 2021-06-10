<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Pin
 */
    
    /**
     * After Content
     * 
     * @hooked blossom_pin_content_end - 20
    */
    do_action( 'blossom_pin_before_footer' );

    /**
     * Before footer
     * 
     * @hooked blossom_pin_instagram - 10
     * @hooked blossom_pin_newsletter - 20
    */
    do_action( 'blossom_pin_before_footer_start' );
    
    /**
     * Footer
     * 
     * @hooked blossom_pin_footer_start  - 20
     * @hooked blossom_pin_footer_top    - 30
     * @hooked blossom_pin_footer_bottom - 40
     * @hooked blossom_pin_back_to_top   - 50
     * @hooked blossom_pin_footer_end    - 60
    */
    do_action( 'blossom_pin_footer' );
    
    /**
     * After Footer
     * 
     * @hooked blossom_pin_page_end - 20
     * @hooked blossom_pin_after_page_end - 30
    */
    do_action( 'blossom_pin_after_footer' );

    wp_footer(); ?>

</body>
</html>
