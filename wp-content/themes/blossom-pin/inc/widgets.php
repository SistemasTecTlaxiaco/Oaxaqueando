<?php
/**
 * Blossom Pin Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Blossom_Pin
 */

function blossom_pin_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'blossom-pin' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'blossom-pin' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'blossom-pin' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'blossom-pin' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'blossom-pin' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'blossom-pin' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'blossom-pin' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'blossom-pin' ),
        ),
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name">',
    		'after_title'   => '</h2>',
    	) );
    }
}
add_action( 'widgets_init', 'blossom_pin_widgets_init' );