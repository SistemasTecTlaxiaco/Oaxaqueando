<?php
/**
 * Blossom Pin General Settings
 *
 * @package Blossom_Pin
 */

function blossom_pin_customize_register_general( $wp_customize ) {
	
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 85,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-pin' ),
            'description' => __( 'Customize Banner, Featured, Social, SEO, Post/Page, Newsletter, Instagram & Shop settings.', 'blossom-pin' ),
        ) 
    );
    
    $wp_customize->get_section( 'header_image' )->panel    = 'general_settings';
    $wp_customize->get_section( 'header_image' )->title    = __( 'Banner Section', 'blossom-pin' );
    $wp_customize->get_section( 'header_image' )->priority = 10;
    $wp_customize->get_control( 'header_image' )->active_callback = 'blossom_pin_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback = 'blossom_pin_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'blossom_pin_banner_ac';
    $wp_customize->get_section( 'header_image' )->description = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'blossom_pin_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'blossom-pin' ),
                'description' => __( 'Choose banner as static image/video or as a slider.', 'blossom-pin' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'     => __( 'Disable Banner Section', 'blossom-pin' ),
                    'static_banner' => __( 'Static/Video Banner', 'blossom-pin' ),
                    'slider_banner' => __( 'Banner as Slider', 'blossom-pin' ),
                ),
                'priority' => 5	
     		)            
		)
	);

    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default' => __( 'Wondering how your peers are using social media?', 'blossom-pin' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'banner_title',
        array(
            'label' => __( 'Title', 'blossom-pin' ),
            'section' => 'header_image',
            'type' => 'text',
            'active_callback' => 'blossom_pin_banner_ac',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.banner .banner-caption .banner-wrap .banner-title',
        'render_callback' => 'blossom_pin_get_banner_title',
    ));

    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default' => __( 'Discover how people in the community create pins to get their attention.', 'blossom-pin' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label' => __( 'Sub Title', 'blossom-pin' ),
            'section' => 'header_image',
            'type' => 'textarea',
            'active_callback' => 'blossom_pin_banner_ac',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector' => '.banner .banner-caption .banner-wrap .b-content',
        'render_callback' => 'blossom_pin_get_banner_sub_title',
    ));

    /** Banner Label */
    $wp_customize->add_setting(
        'banner_label',
        array(
            'default' => __( 'Discover More', 'blossom-pin' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'banner_label',
        array(
            'label' => __( 'Banner Label', 'blossom-pin' ),
            'section' => 'header_image',
            'type' => 'text',
            'active_callback' => 'blossom_pin_banner_ac',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_label', array(
        'selector' => '.banner .banner-caption .banner-wrap .banner-link',
        'render_callback' => 'blossom_pin_get_banner_label',
    ));

    /** Banner Link */
    $wp_customize->add_setting(
        'banner_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'banner_link',
        array(
            'label' => __( 'Banner Link', 'blossom-pin' ),
            'section' => 'header_image',
            'type' => 'text',
            'active_callback' => 'blossom_pin_banner_ac',
        )
    );
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'blossom_pin_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-pin' ),
    			'section' => 'header_image',
    			'choices' => array(
                    'latest_posts' => __( 'Latest Posts', 'blossom-pin' ),
                    'cat'          => __( 'Category', 'blossom-pin' )
                ),
                'active_callback' => 'blossom_pin_banner_ac'	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_pin_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-pin' ),
    			'section'         => 'header_image',
    			'choices'         => blossom_pin_get_categories(),
                'active_callback' => 'blossom_pin_banner_ac'	
     		)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 7,
            'sanitize_callback' => 'blossom_pin_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
		new blossom_pin_Slider_Control( 
			$wp_customize,
			'no_of_slides',
			array(
				'section'     => 'header_image',
                'label'       => __( 'Number of Slides', 'blossom-pin' ),
                'description' => __( 'Choose the number of slides you want to display', 'blossom-pin' ),
                'choices'	  => array(
					'min' 	=> 5,
					'max' 	=> 20,
					'step'	=> 1,
				),
                'active_callback' => 'blossom_pin_banner_ac'                 
			)
		)
	);

    /** Slider Settings Ends */
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'blossom-pin' ),
            'priority' => 30,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_social_links',
            array(
                'section'     => 'social_media_settings',
                'label'       => __( 'Enable Social Links', 'blossom-pin' ),
                'description' => __( 'Enable to show social links at header also on newsletter section.', 'blossom-pin' ),
            )
        )
    );

    /** Enable Social Links */
    $wp_customize->add_setting( 
        'social_title', 
        array(
            'default'           => esc_html__( 'Follow Blossom Pin','blossom-pin'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
		'social_title',
		array(
			'section'     => 'social_media_settings',
			'label'	      => __( 'Social Title', 'blossom-pin' ),
            'description' => __( 'Title for social links on newsletter section.', 'blossom-pin' ),
		)
	);

    $wp_customize->selective_refresh->add_partial( 'social_title', array(
        'selector' => '.social-networks .title',
        'render_callback' => 'blossom_pin_get_social_title',
    ) );
    
    $wp_customize->add_setting( 
        new Blossom_Pin_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => '',
                'sanitize_callback' => array( 'Blossom_Pin_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'social_media_settings',				
				'label'	  => __( 'Social Links', 'blossom-pin' ),
				'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'blossom-pin' ),
                        'description' => __( 'Example: fab fa-facebook-f', 'blossom-pin' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'blossom-pin' ),
                        'description' => __( 'Example: https://facebook.com', 'blossom-pin' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'blossom-pin' ),
                    'field' => 'link'
                ),
                'choices'   => array(
                    'limit' => 10
                )                        
			)
		)
	);
    /** Social Media Settings Ends */
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'blossom-pin' ),
            'priority' => 40,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Toggle_Control( 
			$wp_customize,
			'ed_post_update_date',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Last Update Post Date', 'blossom-pin' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'blossom-pin' ),
			)
		)
	);

    /** Enable Breadcrumbs */
    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_breadcrumb',
            array(
                'section'     => 'seo_settings',
                'label'       => __( 'Enable Breadcrumb', 'blossom-pin' ),
                'description' => __( 'Enable to show breadcrumb in inner pages.', 'blossom-pin' ),
            )
        )
    );

    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => __( 'Home', 'blossom-pin' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Home Text', 'blossom-pin' ),
            'active_callback' => 'blossom_pin_breadcrumbs'
        )
    );  
        
    /** SEO Settings Ends */
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-pin' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'blossom-pin' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-pin' ),
			)
		)
	);
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'blossom-pin' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-pin' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'blossom_pin_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'blossom-pin' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-pin' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 100,
					'step'	=> 5,
				)                 
			)
		)
	);
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'blossom-pin' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-pin' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .read-more',
        'render_callback' => 'blossom_pin_get_read_more',
    ) );
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
				'description' => __( '<hr/>These options affect your individual posts.', 'blossom-pin' ),
			)
		)
    );

    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_featured_image',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Featured Image', 'blossom-pin' ),
                'description' => __( 'Enable to show featured image in post detail (single post).', 'blossom-pin' ),
            )
        )
    );

    /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Post Author', 'blossom-pin' ),
                'description' => __( 'Enable to hide the post author.', 'blossom-pin' ),
            )
        )
    );
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_category',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Category', 'blossom-pin' ),
                'description' => __( 'Enable to hide category.', 'blossom-pin' ),
            )
        )
    );    
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Posted Date', 'blossom-pin' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-pin' ),
            )
        )
    );    
    
    /** Show Recommended Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Recommended Articles', 'blossom-pin' ),
                'description' => __( 'Enable to show recommended articles in single post.', 'blossom-pin' ),
			)
		)
	);
    
    /** Recommended Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'Recommended Articles', 'blossom-pin' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Recommended Articles Section Title', 'blossom-pin' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.recommended-post .section-title',
        'render_callback' => 'blossom_pin_get_related_title',
    ) );     
    /** Posts(Blog) & Pages Settings Ends */
    
    /** Newsletter Settings */
    $wp_customize->add_section(
        'newsletter_settings',
        array(
            'title'    => __( 'Newsletter Settings', 'blossom-pin' ),
            'priority' => 60,
            'panel'    => 'general_settings',
        )
    );
    
    if( blossom_pin_is_btnw_activated() ){
        /** Enable Newsletter Section */
        $wp_customize->add_setting( 
            'ed_newsletter', 
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
    		new Blossom_Pin_Toggle_Control( 
    			$wp_customize,
    			'ed_newsletter',
    			array(
    				'section'     => 'newsletter_settings',
    				'label'	      => __( 'Newsletter Section', 'blossom-pin' ),
                    'description' => __( 'Enable to show Newsletter Section', 'blossom-pin' ),
    			)
    		)
    	);
        
        /** Newsletter Shortcode */
        $wp_customize->add_setting(
            'newsletter_shortcode',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'newsletter_shortcode',
            array(
                'type'        => 'text',
                'section'     => 'newsletter_settings',
                'label'       => __( 'Newsletter Shortcode', 'blossom-pin' ),
                'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-pin' ),
            )
        );
                
    }else{
        /** Note */
        $wp_customize->add_setting(
            'newsletter_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Pin_Note_Control( 
    			$wp_customize,
    			'newsletter_text',
    			array(
    				'section'	  => 'newsletter_settings',
    				'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s. After that option related with this section will be visible.', 'blossom-pin' ), '<a href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '" target="_blank">', '</a>' )
    			)
    		)
        );
    }
    
    /** Instagram Settings */
    $wp_customize->add_section(
        'instagram_settings',
        array(
            'title'    => __( 'Instagram Settings', 'blossom-pin' ),
            'priority' => 70,
            'panel'    => 'general_settings',
        )
    );
    
    if( blossom_pin_is_btif_activated() ){
        /** Enable Instagram Section */
        $wp_customize->add_setting( 
            'ed_instagram', 
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
    		new Blossom_Pin_Toggle_Control( 
    			$wp_customize,
    			'ed_instagram',
    			array(
    				'section'     => 'instagram_settings',
    				'label'	      => __( 'Instagram Section', 'blossom-pin' ),
                    'description' => __( 'Enable to show Instagram Section', 'blossom-pin' ),
    			)
    		)
    	);
        
        /** Note */
        $wp_customize->add_setting(
            'instagram_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Pin_Note_Control( 
    			$wp_customize,
    			'instagram_text',
    			array(
    				'section'	  => 'instagram_settings',
    				'description' => sprintf( __( 'You can change the setting of BlossomThemes Social Feed %1$sfrom here%2$s.', 'blossom-pin' ), '<a href="' . esc_url( admin_url( 'admin.php?page=class-blossomthemes-instagram-feed-admin.php' ) ) . '" target="_blank">', '</a>' )
    			)
    		)
        );        
    }else{
        /** Note */
        $wp_customize->add_setting(
            'instagram_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Pin_Note_Control( 
    			$wp_customize,
    			'instagram_text',
    			array(
    				'section'	  => 'instagram_settings',
    				'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Social Feed%2$s. After that option related with this section will be visible.', 'blossom-pin' ), '<a href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '" target="_blank">', '</a>' )
    			)
    		)
        );
    }

    /** Misc Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-pin' ),
            'priority' => 80,
            'panel'    => 'general_settings',
        )
    );
    
    $wp_customize->add_setting( 
        'ed_header_search', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_header_search',
            array(
                'section'     => 'misc_settings',
                'label'       => __( 'Enable Header Search', 'blossom-pin' ),
                'description' => __( 'Enable to show search in header.', 'blossom-pin' ),
            )
        )
    );

    /** Shop Settings */
    $wp_customize->add_section(
        'shop_settings',
        array(
            'title'    => __( 'Shop Settings', 'blossom-pin' ),
            'priority' => 80,
            'panel'    => 'general_settings',
        )
    );

    /** Shop Page Description */
    $wp_customize->add_setting( 
        'ed_shop_archive_description', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Toggle_Control( 
            $wp_customize,
            'ed_shop_archive_description',
            array(
                'section'         => 'shop_settings',
                'label'           => __( 'Shop Page Description', 'blossom-pin' ),
                'description'     => __( 'Enable to show Shop Page Description.', 'blossom-pin' ),
                'active_callback' => 'blossom_pin_is_woocommerce_activated'
            )
        )
    );    
}
add_action( 'customize_register', 'blossom_pin_customize_register_general' );