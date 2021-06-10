<?php
/**
 * Blossom Pin Customizer Partials
 *
 * @package Blossom_Pin
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_pin_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_pin_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_pin_get_banner_title' ) ) :
/**
 * Get Banner Title
*/
function blossom_pin_get_banner_title(){
    return esc_html( get_theme_mod( 'banner_title', __( 'Wondering how your peers are using social media?', 'blossom-pin' ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_get_banner_sub_title' ) ) :
/**
 * Get Banner Sub Title
*/
function blossom_pin_get_banner_sub_title(){
    return wpautop( wp_kses_post( get_theme_mod( 'banner_subtitle', __( 'Discover how people in the community create pins to get their attention.', 'blossom-pin' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_get_banner_label' ) ) :
/**
 * Get Banner Label
*/
function blossom_pin_get_banner_label(){
    return esc_html( get_theme_mod( 'banner_label', __( 'Discover More', 'blossom-pin' ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_pin_get_read_more(){
    return esc_html( get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-pin' ) ) );    
}
endif;

if( ! function_exists( 'blossom_pin_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_pin_get_related_title(){
    return esc_html( get_theme_mod( 'related_post_title', __( 'Recommended Articles', 'blossom-pin' ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function blossom_pin_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( $copyright );
    }else{
        esc_html_e( '&copy; Copyright ', 'blossom-pin' );
        echo date_i18n( esc_html__( 'Y', 'blossom-pin' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'blossom-pin' );
    }
    echo '</span>'; 
}
endif;

if( ! function_exists( 'blossom_pin_get_social_title' ) ) :
function blossom_pin_get_social_title(){
    return esc_html( get_theme_mod( 'social_title', __( 'Follow Blossom Pin', 'blossom-pin' ) ) );
}
endif;