<?php
/**
 * Blossom Pin Customizer
 *
 * @package Blossom_Pin
 */

function blossom_pin_customize_register( $wp_customize ) {
	
    /** Add postMessage support for site title and description */
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'refresh';
    $wp_customize->get_setting( 'background_image' )->transport = 'refresh';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blossom_pin_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blossom_pin_customize_partial_blogdescription',
		) );
	}
    
    /** Site Title Font */
    $wp_customize->add_setting( 
        'site_title_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Cormorant Garamond',
                'variant'     => 'regular',
            ),
            'sanitize_callback' => array( 'Blossom_Pin_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Blossom_Pin_Typography_Control( 
            $wp_customize, 
            'site_title_font', 
            array(
                'label'       => __( 'Site Title Font', 'blossom-pin' ),
                'description' => __( 'Site title and tagline font.', 'blossom-pin' ),
                'section'     => 'title_tagline',
                'priority'    => 60, 
            ) 
        ) 
    );
    
}
add_action( 'customize_register', 'blossom_pin_customize_register' );