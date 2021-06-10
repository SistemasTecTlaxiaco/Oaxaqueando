<?php
/**
 * Blossom Pin Theme Customizer
 *
 * @package Blossom_Pin
 */

/**
 * Requiring customizer panels & sections
*/
$blossom_pin_panels = array( 'info', 'site', 'color', 'appearance', 'layout', 'general', 'footer' );

foreach( $blossom_pin_panels as $p ){
    require get_template_directory() . '/inc/customizer/' . $p . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blossom_pin_customize_preview_js() {
	wp_enqueue_script( 'blossom-pin-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), BLOSSOM_PIN_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'blossom_pin_customize_preview_js' );

function blossom_pin_customize_script(){
    wp_enqueue_style( 'blossom-pin-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), BLOSSOM_PIN_THEME_VERSION );
    wp_enqueue_script( 'blossom-pin-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery' ), '20170404', true );

    wp_localize_script( 'blossom-pin-repeater', 'blossom_pin_customize',
		array(
			'nonce' => wp_create_nonce( 'blossom_pin_customize_nonce' )
		)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_pin_customize_script' );