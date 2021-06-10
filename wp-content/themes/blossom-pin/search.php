<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blossom_Pin
 */

get_header(); ?>
        
        <main id="main" class="site-main">

		<?php

		if ( have_posts() ) : 
        
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
	    ?>

		</main><!-- #main -->
        
        <?php        
        /**
         * After Posts hook
         * @hooked blossom_pin_navigation - 15
        */
        	do_action( 'blossom_pin_after_posts_content' );
        ?>
        
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
