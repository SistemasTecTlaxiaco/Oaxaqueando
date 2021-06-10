<?php
/**
 * Blossom Pin Custom Control
 * 
 * @package Blossom_Pin
*/

if( ! function_exists( 'blossom_pin_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function blossom_pin_register_custom_controls( $wp_customize ){    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_template_directory() . '/inc/custom-controls/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/typography/class-fonts.php';
    require_once get_template_directory() . '/inc/custom-controls/typography/class-typography-control.php';
            
    // Register the control type.
    $wp_customize->register_control_type( 'Blossom_Pin_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Blossom_Pin_Select_Control' );
    $wp_customize->register_control_type( 'Blossom_Pin_Slider_Control' );
    $wp_customize->register_control_type( 'Blossom_Pin_Toggle_Control' );
    $wp_customize->register_control_type( 'Blossom_Pin_Typography_Control' );
}
endif;
add_action( 'customize_register', 'blossom_pin_register_custom_controls' );