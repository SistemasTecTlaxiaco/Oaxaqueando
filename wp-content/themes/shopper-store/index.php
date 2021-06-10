<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoper
 */

get_header();

$layout = shopper_store_get_option('blog_layout');

/**
* Hook - shoper_container_wrap_start 	
*
* @hooked shoper_container_wrap_start	- 5
*/
 do_action( 'shoper_container_wrap_start',  esc_attr( $layout ) );

	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;
		if( get_theme_mod( 'blog_loop_style', 'default' ) == 'grids' ){
			echo '<div class="row">';	
			
		}else if( get_theme_mod( 'blog_loop_style', 'default' ) == 'masonry_grid' ){
			echo '<div class="masonry_grid row">
			       <div class="grid-sizer col-md-6 col-sm-6 col-12 grid_layout"></div>';
		}
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
		if( get_theme_mod( 'blog_loop_style', 'default' ) == 'grids' || get_theme_mod( 'blog_loop_style', 'default' ) == 'masonry_grid'  ){
			echo '</div>';	
		}
		/**
		* Hook - shoper_loop_navigation 	
		*
		* @hooked site_loop_navigation	- 10
		*/
		 do_action( 'shoper_loop_navigation');

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
		
/**
* Hook - shoper_container_wrap_end	
*
* @hooked container_wrap_end - 999
*/
 do_action( 'shoper_container_wrap_end',  esc_attr( $layout ) );
 
get_footer();
