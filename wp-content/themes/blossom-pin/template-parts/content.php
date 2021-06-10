<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
    <?php  
        /**
         * @hooked blossom_pin_post_thumbnail - 10
         * @hooked blossom_pin_entry_header - 20
        */
        do_action( 'blossom_pin_before_post_entry_content' );
        
        /**
         * @hooked blossom_pin_entry_content - 15
         * @hooked blossom_pin_entry_footer  - 20
        */
        do_action( 'blossom_pin_post_entry_content' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
