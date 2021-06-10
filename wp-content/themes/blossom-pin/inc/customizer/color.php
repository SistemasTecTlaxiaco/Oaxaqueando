<?php
/**
 * Blossom Pin Color Setting
 *
 * @package Blossom_Pin
 */

function blossom_pin_customize_register_color( $wp_customize ) {
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', array(
            'default'           => '#ff91a4',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-pin' ),
                'description' => __( 'Primary color of the theme.', 'blossom-pin' ),
                'section'     => 'colors',
                'priority'    => 5,                
            )
        )
    );    
}
add_action( 'customize_register', 'blossom_pin_customize_register_color' );