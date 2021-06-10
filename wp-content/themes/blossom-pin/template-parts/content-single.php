<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="holder">

        <?php
            /**
            * @hooked blossom_pin_meta_info
            */
            do_action( 'blossom_pin_before_single_post_entry_content' );
        ?>
        

        <div class="post-content">
        <?php  
            /**
            * @hooked blossom_pin_post_thumbnail - 15
            * @hooked blossom_pin_entry_content - 20
            * @hooked blossom_pin_entry_footer  - 25
            * @hooked blossom_pin_author        - 30
            */
            do_action( 'blossom_pin_single_post_entry_content' );
        ?> 
        </div> <!-- .post-content -->          
    </div> <!-- .holder -->
</article><!-- #post-<?php the_ID(); ?> -->