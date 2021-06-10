<?php
/**
 * Blossom Pin Appearance Settings
 *
 * @package Blossom_Pin
 */

function blossom_pin_customize_register_appearance( $wp_customize ) {
    
    /** Appearance Settings */
    $wp_customize->add_panel( 
        'appearance_settings',
         array(
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Appearance Settings', 'blossom-pin' ),
            'description' => __( 'Customize Typography & Background Image', 'blossom-pin' ),
        ) 
    );
    
    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'blossom-pin' ),
            'priority' => 15,
            'panel'    => 'appearance_settings',
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Nunito',
			'sanitize_callback' => 'blossom_pin_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-pin' ),
                'description' => __( 'Primary font of the site.', 'blossom-pin' ),
    			'section'     => 'typography_settings',
    			'choices'     => blossom_pin_get_all_fonts(),	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Cormorant Garamond',
			'sanitize_callback' => 'blossom_pin_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-pin' ),
                'description' => __( 'Secondary font of the site.', 'blossom-pin' ),
    			'section'     => 'typography_settings',
    			'choices'     => blossom_pin_get_all_fonts(),	
     		)
		)
	);
    
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_pin_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'typography_settings',
				'label'		  => __( 'Font Size', 'blossom-pin' ),
				'description' => __( 'Change the font size of your site.', 'blossom-pin' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 10;
}
add_action( 'customize_register', 'blossom_pin_customize_register_appearance' );