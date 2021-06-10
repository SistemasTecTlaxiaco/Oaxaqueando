<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Pin
 */

get_header(); ?>

		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
        
        <?php
        /**
         * @hooked blossom_pin_navigation 
        */
        do_action( 'blossom_pin_after_post_content' );
        ?>
        
	</div><!-- #primary -->

    <?php get_sidebar(); 

    /**
     * 
     * @hooked blossom_pin_content_end - 20
     * @hooked blossom_pin_related_posts -30
     * @hooked blossom_pin_comment - 40
    */
    do_action( 'blossom_pin_before_single_footer' );
    ?>

<?php 
get_footer();
