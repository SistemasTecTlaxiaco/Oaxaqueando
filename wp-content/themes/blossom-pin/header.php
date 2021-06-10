<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Pin
 */
    /**
     * Doctype Hook
     * 
     * @hooked blossom_pin_doctype
    */
    do_action( 'blossom_pin_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked blossom_pin_head
    */
    do_action( 'blossom_pin_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
    
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked blossom_pin_page_start - 20 
    */
    do_action( 'blossom_pin_before_header' );
    
    /**
     * Header  
     * @hooked blossom_pin_single_sticky_menu - 5
     * @hooked blossom_pin_mobile_menu - 10  
     * @hooked blossom_pin_header - 20     
    */
    do_action( 'blossom_pin_header' );
    
    /**
     * Before Content
     * 
     * @hooked blossom_pin_banner - 15
    */
    do_action( 'blossom_pin_after_header' );
    
    /**
     * Content
     * 
     * @hooked blossom_pin_content_start - 10
     * @hooked blossom_pin_content - 20
    */
    do_action( 'blossom_pin_content' );
    