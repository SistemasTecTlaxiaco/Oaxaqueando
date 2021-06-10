<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoper
 */

get_header();
$layout = shopper_store_get_option('blog_layout');
/**
* Hook - container_wrap_start 		- 5
*
* @hooked shoper_container_wrap_start
*/
 do_action( 'shoper_container_wrap_start',esc_attr( $layout ));

		if( get_theme_mod( 'blog_loop_style', 'default' ) == 'grids' ){
			echo '<div class="row">';	
			
		}else if( get_theme_mod( 'blog_loop_style', 'default' ) == 'masonry_grid' ){
			echo '<div class="masonry_grid row">
			       <div class="grid-sizer col-md-6 col-sm-6 col-12 grid_layout"></div>';
		}
			if ( have_posts() ) : 
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				if( get_theme_mod( 'blog_loop_style', 'default' ) == 'grids' || get_theme_mod( 'blog_loop_style', 'default' ) == 'masonry_grid' ){
				get_template_part( 'template-parts/content-grid', get_post_type() );
			}else{
				get_template_part( 'template-parts/content', get_post_type() );
			}

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		
		if( get_theme_mod( 'blog_loop_style', 'default' ) == 'grids' || get_theme_mod( 'blog_loop_style', 'default' ) == 'masonry_grid'  ){
			echo '</div>';	
		}
		
/**
* Hook - container_wrap_end 		- 999
*
* @hooked shoper_container_wrap_end
*/
 do_action( 'shoper_container_wrap_end',esc_attr( $layout ));
get_footer();
