<?php
/*This file is part of ShopperStore, shoper child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if( !function_exists('shopper_store_theme_setup') ):
	function shopper_store_theme_setup(){
		// Make theme available for translation.
		load_theme_textdomain( 'shopper-store', get_stylesheet_directory_uri() . '/languages' );
	}
	add_action( 'after_setup_theme', 'shopper_store_theme_setup' );
endif;

if ( ! function_exists( 'shopper_store_enqueue_child_styles' ) ) {
	function shopper_store_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'shoper-parent-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'shoper-parent-style' );
	    // loading child style
	    wp_register_style(
	      'shopper-store-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'shopper-store-style');
		
		wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/magnific-popup/magnific-popup.css' ), array(), '1.0.0' );
		wp_enqueue_script( 'magnific-popup-js', get_theme_file_uri( '/assets/magnific-popup/jquery.magnific-popup.js' ), 0, '', true );
		
		wp_enqueue_script( 'shopper-store-js', get_theme_file_uri( '/assets/shopper-store.js'), array('jquery','jquery-masonry'), '1.0.0', true);
		
	 }
}
add_action( 'wp_enqueue_scripts', 'shopper_store_enqueue_child_styles',999  );

/*Write here your own functions */

if( !function_exists('shopper_store_disable_from_parent') ):

	add_action('init','shopper_store_disable_from_parent',50);
	function shopper_store_disable_from_parent(){
		
		global $shoper_header_layout;
		remove_action('shoper_site_header', array( $shoper_header_layout, 'site_header_layout' ), 30 );
		remove_action('shoper_site_header', array( $shoper_header_layout, 'get_site_search_form' ), 20 );
		
		global $shoper_post_related;
		remove_action( 'shoper_site_content_type', array( $shoper_post_related,'site_loop_heading' ), 10 ); 
	}
	
endif;

if( !function_exists('shopper_store_posts_heading') ):

add_action( 'shoper_site_content_type','shopper_store_posts_heading', 10 ); 
 function shopper_store_posts_heading() {
		if( is_page() ) return;
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
		
		if( get_theme_mod( 'blog_loop_style', 'default' ) == 'grids' || get_theme_mod( 'blog_loop_style', 'default' ) == 'masonry_grid' ){
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >', '</a></h4>' );
		}else{
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >', '</a></h2>' );
		 }
			 
		endif;
		
		
	}
endif;

if( !function_exists('shopper_store_header_layout') ):

	add_action('shoper_site_header','shopper_store_header_layout', 30 );
	function shopper_store_header_layout(){
	?>
    	
        <div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-7 col-sm-7 col-12">
					<?php do_action('shoper_header_layout_1_branding');?>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 col-12 text-right search-box">
					<?php 
						if( class_exists('APSW_Product_Search_Finale_Class') && class_exists( 'WooCommerce' ) ){
							do_action('apsw_search_bar_preview');
						}else{
							get_search_form();
						}
					?>
				</div>
				
			</div>
		</div>
		<div id="nav_bar_wrap"> 
			<div class="navsticky"> 
			<div class="container"> 
				<div class="row align-items-center"> 
					<div class="col-lg-9 col-md-9 col-sm-12 col-12 ">
						<?php 
						do_action('shoper_header_layout_1_navigation');
						?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-12 text-right">
						<?php shopper_store_header_icon();?>
					</div>
				</div>
				</div>
		</div>
		</div>
    <?php	
	}
	
endif;

if( !function_exists('shopper_store_header_icon') ) :
function shopper_store_header_icon (){
 ?>
<ul class="header-icon">
  
  <?php if ( class_exists( 'WooCommerce' ) ) :?>
  <li><?php shoper_woocommerce_cart_link(); ?></li>
  <li><a href="javascript:void(0)"><i class="icofont-user-alt-4"></i></a>
  
	<ul>
	<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
		<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
		</li>
	<?php endforeach; ?>
	</ul>

  </li>
<?php endif;?>

</ul>

 <?php
}
endif;

if( !function_exists('shopper_store_more_customize_options') ) :

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shopper_store_more_customize_options( $wp_customize ) {
	
	$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Blog Management', 'shopper-store' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
	);
	/*Posts Layout*/
		$wp_customize->add_setting( 'blog_loop_style',
			array(
				'default'           => 'masonry_grid',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'shoper_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_loop_style',
			array(
				'label'    => esc_html__( 'Posts Loop Style', 'shopper-store' ),
				'description' => esc_html__( 'Choose between different Posts Loop options to be used as default', 'shopper-store' ),
				'section'  => 'theme_option_section_settings',
				'choices'   => array(
					'default'  => esc_html__( 'Default', 'shopper-store' ),
					'grids' => esc_html__( 'Grids', 'shopper-store' ),
					'masonry_grid' => esc_html__( 'Masonry grid', 'shopper-store' ),
					),
				'type'     => 'select',
				
			)
		);

}
add_action( 'customize_register', 'shopper_store_more_customize_options' );

endif;

if( !function_exists('shopper_store_get_option') ):
	function shopper_store_get_option( $value ){
		if( function_exists('shoper_get_option') ){
			return shoper_get_option( esc_attr( $value ) );
		}else{
			return get_theme_mod(esc_attr( $value ));
		}
	}
endif;


function shopper_store_default_options( $defaults ) {
	
   
		$defaults['__secondary_color']     		= '#734f96';
		
    return $defaults;
}
add_filter( 'shoper_filter_default_theme_options', 'shopper_store_default_options' );

