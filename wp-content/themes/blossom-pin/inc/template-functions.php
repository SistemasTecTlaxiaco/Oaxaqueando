<?php
/**
 * Blossom Pin Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Pin
 */

if( ! function_exists( 'blossom_pin_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_pin_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_pin_doctype', 'blossom_pin_doctype' );

if( ! function_exists( 'blossom_pin_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_pin_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_pin_before_wp_head', 'blossom_pin_head' );

if( ! function_exists( 'blossom_pin_page_start' ) ) :
/**
 * Page Start
*/
function blossom_pin_page_start(){ ?>
    <div id="page" class="site"><a aria-label="<?php esc_attr_e( 'skip to content', 'blossom-pin' ); ?>" class="skip-link" href="#content"><?php esc_html_e( 'Skip to Content','blossom-pin' ); ?></a>
    <?php
}
endif;
add_action( 'blossom_pin_before_header', 'blossom_pin_page_start', 20 );

if( ! function_exists( 'blossom_pin_single_sticky_menu' ) ) :
/**
 * Page Start
*/
function blossom_pin_single_sticky_menu(){
    if( is_single() ) : ?>
        <div class="single-header">
            <?php blossom_pin_site_branding(false); ?>
            <div class="title-holder">
                <span><?php esc_html_e( 'You are reading','blossom-pin' ); ?></span>
                <h2 class="post-title"><?php the_title(); ?></h2>
            </div>
            <?php if( blossom_pin_social_links( false, false ) ){
                blossom_pin_social_links( true, false );
            } ?>
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
        </div>
        <?php
    endif;
}
endif;
add_action( 'blossom_pin_before_header', 'blossom_pin_single_sticky_menu', 5 );

if( ! function_exists( 'blossom_pin_mobile_menu' ) ) :
/**
 * Page Start
*/
function blossom_pin_mobile_menu(){ 
    $ed_header_search    = get_theme_mod( 'ed_header_search', true );
    ?>
    <div class="mobile-header">
        <div class="mobile-site-header">
            <button aria-label="<?php esc_attr_e( 'primary menu toggle', 'blossom-pin' ); ?>" id="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="mobile-menu-wrap">
                <nav id="mobile-site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                        <button class="btn-close-menu close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"><span></span></button>
                        <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'blossom-pin' ); ?>">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'mobile-primary-menu',
                                'menu_class'     => 'menu main-menu-modal',
                                'fallback_cb'    => 'blossom_pin_primary_menu_fallback',
                            ) ); ?>
                        </div>
                    </div>
                </nav> 
                
                <?php if( blossom_pin_social_links( false, false ) ){
                    echo '<span class="separator"></span>';
                    blossom_pin_social_links( true, false );
                } ?>
            </div>
            <?php blossom_pin_site_branding(true); ?>
            <div class="tools">
                <?php if( $ed_header_search ) : ?>
                    <div class=header-search>
                        <button aria-label="<?php esc_attr_e( 'search form toggle', 'blossom-pin' ); ?>" class="search-icon search-toggle" data-toggle-target=".mob-search-modal" data-toggle-body-class="showing-mob-search-modal" data-set-focus=".mob-search-modal .search-field" aria-expanded="false">
                            <svg class="open-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-18214 -12091 18 18"><path id="Path_99" data-name="Path 99" d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-18214 -12091)"/></svg>
                        </button>
                        <div class="search-form-holder mob-search-modal cover-modal" data-modal-target-string=".mob-search-modal">
                            <div class="header-search-inner-wrap">
                                <?php get_search_form();?> 
                                <button aria-label="<?php esc_attr_e( 'search form toggle', 'blossom-pin' ); ?>" class="search-icon close" data-toggle-target=".mob-search-modal" data-toggle-body-class="showing-mob-search-modal" data-set-focus=".mob-search-modal .search-field" aria-expanded="false">
                                    <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="10906 13031 18 18"><path id="Close" d="M23,6.813,21.187,5,14,12.187,6.813,5,5,6.813,12.187,14,5,21.187,6.813,23,14,15.813,21.187,23,23,21.187,15.813,14Z" transform="translate(10901 13026)"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="overlay"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}
endif;
add_action( 'blossom_pin_header', 'blossom_pin_mobile_menu', 10 );

if( ! function_exists( 'blossom_pin_header' ) ) :
/**
 * Header Start
*/
function blossom_pin_header(){ 
    $ed_header_search    = get_theme_mod( 'ed_header_search', true ); ?>
    <header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
		<?php blossom_pin_site_branding(false); ?>
        <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => 'blossom_pin_primary_menu_fallback',
                ) );
            ?>
        </nav><!-- #site-navigation -->						
		<div class="tools">
            <?php if( $ed_header_search ) : ?>
                <div class=header-search>
                    <button aria-label="<?php esc_attr_e( 'search form toggle', 'blossom-pin' ); ?>" class="search-icon search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                        <svg class="open-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-18214 -12091 18 18"><path id="Path_99" data-name="Path 99" d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-18214 -12091)"/></svg>
                    </button>
                    <div class="search-form-holder search-modal cover-modal" data-modal-target-string=".search-modal">
                        <div class="header-search-inner-wrap">
                            <?php get_search_form();?> 
                            <button aria-label="<?php esc_attr_e( 'search form toggle', 'blossom-pin' ); ?>" class="search-icon close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="10906 13031 18 18"><path id="Close" d="M23,6.813,21.187,5,14,12.187,6.813,5,5,6.813,12.187,14,5,21.187,6.813,23,14,15.813,21.187,23,23,21.187,15.813,14Z" transform="translate(10901 13026)"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
			<?php endif;

            if( blossom_pin_social_links( false, false ) ){
                echo '<span class="separator"></span>';
                blossom_pin_social_links( true, false );
            } ?>
		</div>
	</header>
    <?php 
}
endif;
add_action( 'blossom_pin_header', 'blossom_pin_header', 20 );

if( ! function_exists( 'blossom_pin_banner' ) ) :
/**
 * Banner Section 
*/
function blossom_pin_banner(){
    $ed_banner      = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' ); 
    $slider_cat     = get_theme_mod( 'slider_cat' );
    $posts_per_page = get_theme_mod( 'no_of_slides', 7 );
    $banner_title      = get_theme_mod( 'banner_title', __( 'Wondering how your peers are using social media?', 'blossom-pin' ) );
    $banner_subtitle   = get_theme_mod( 'banner_subtitle', __( 'Discover how people in the community create pins to get their attention.', 'blossom-pin' ) );
    $banner_label      = get_theme_mod( 'banner_label', __( 'Discover More', 'blossom-pin' ) );
    $banner_link       = get_theme_mod( 'banner_link', '#' );    
    
    if( is_front_page() || is_home() ){ 
        
        if( $ed_banner == 'static_banner' && has_custom_header() ){ ?>
            <div class="banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
                <?php the_custom_header_markup();
                if( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || ( $banner_label && $banner_link ) ) ){
                    echo '<div class="banner-caption"><div class="wrapper"><div class="banner-wrap">';
                    if( $banner_title ) echo '<h2 class="banner-title">' . esc_html( $banner_title ) . '</h2>';
                    if( $banner_subtitle ) echo '<div class="banner-content b-content">' . wpautop( wp_kses_post( $banner_subtitle ) ) . '</div>';
                    if( $banner_label && $banner_link ) echo '<a href="' . esc_url( $banner_link ) . '" class="banner-link">' . esc_html( $banner_label ) . '</a>';
                    echo '</div></div></div>';
                } ?>
            </div>
            <?php
        }elseif( $ed_banner == 'slider_banner' ){
            $args = array(
                'post_type'           => 'post',
                'post_status'         => 'publish',            
                'ignore_sticky_posts' => true
            );
            
            if( $slider_type === 'cat' && $slider_cat ){
                $args['cat']            = $slider_cat; 
                $args['posts_per_page'] = -1;  
            }else{
                $args['posts_per_page'] = $posts_per_page;
            }
                
            $qry = new WP_Query( $args );
            
            if( $qry->have_posts() ){ ?>
            <div class="banner">
        		<div class="banner-slider owl-carousel">
        			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <div class="item">
        				<?php 
                        if( has_post_thumbnail() ){
        				    the_post_thumbnail( 'blossom-pin-slider', array( 'itemprop' => 'image' ) );    
        				}
                        ?>                        
						<div class="text-holder">
							<?php
                                blossom_pin_category();
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            ?>
						</div>
        			</div>
        			<?php } ?>
                    
        		</div>
        	</div>
            <?php
            }
            wp_reset_postdata();
        } 
    }    
}
endif;
add_action( 'blossom_pin_after_header', 'blossom_pin_banner', 15 );

if( ! function_exists( 'blossom_pin_content_start' ) ) :
/**
 * Content Start
*/
function blossom_pin_content_start(){
    
    if ( ! is_home() && ! is_front_page() ) blossom_pin_breadcrumb(); 

    if( !is_404() ){ ?>
        <div id="content" class="site-content">   
            <div class="container">
                <div id="primary" class="content-area">
    <?php }  
}
endif;
add_action( 'blossom_pin_content', 'blossom_pin_content_start', 10 );

if( ! function_exists( 'blossom_pin_content' ) ) :
/**
 * Content Start
*/
function blossom_pin_content(){

    $add_class = is_search() ? 'search-result-' : '';
    global $wp_query;
    if( !is_404() ){ ?>
        <?php if( is_single() ) { ?>
            <header class="post-entry-header">
                <?php blossom_pin_category(); ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>                
            </header>
        <?php }
        elseif( is_archive() || is_search() ) { ?>
            <div class="<?php echo esc_attr( $add_class ); ?>page-header">
                <?php        
                if( is_archive() ){ 
                    if( is_author() ){ 
                        blossom_pin_author();
                    }else{ 
                        the_archive_title();
                        the_archive_description( '<div class="archive-description">', '</div>' );
                    }          
                } 
                if( is_search() && ( $wp_query->found_posts > 0 ) ){ ?>
                    <span class="label"><?php esc_html_e('SEARCH RESULT FOR:', 'blossom-pin'); ?></span>
                    <?php get_search_form(); ?>
                <?php } ?>
            </div>
            <?php   
        }
        /**
        * @hooked blossom_pin_search_per_page_count  - 15
        */
        do_action( 'blossom_pin_before_posts_content' );
    } 

}
endif;
add_action( 'blossom_pin_content', 'blossom_pin_content', 20 );

if( ! function_exists( 'blossom_pin_search_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function blossom_pin_search_per_page_count(){
    $pagination = get_theme_mod( 'pagination_type','default' );
    global $wp_query;
    if( ( is_archive() || is_search() ) && $wp_query->found_posts !== 0 && !( blossom_pin_is_woocommerce_activated() && is_shop() )) {
        if( $pagination == 'default' ) :
            $posts_per_page = get_option( 'posts_per_page' );
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $start_post_number = 0;
            $end_post_number   = 0;

            if( $wp_query->found_posts > 0  ):
                
                $start_post_number = 1;
                if( $wp_query->found_posts < $posts_per_page  ) {
                    $end_post_number = $wp_query->found_posts;
                }else{
                    $end_post_number = $posts_per_page;
                }

                if( $paged > 1 ){
                    $start_post_number = $posts_per_page * ( $paged - 1 ) + 1;
                    if( $wp_query->found_posts < ( $posts_per_page * $paged )  ) {
                        $end_post_number = $wp_query->found_posts;
                    }else{
                        $end_post_number = $paged * $posts_per_page;
                    }
                }

                printf( esc_html__( '%1$s Showing:  %2$s - %3$s of %4$s RESULTS %5$s', 'blossom-pin' ), '<span class="search-per-page-count">', absint( $start_post_number ), absint( $end_post_number ), esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
            endif;
        else :
            printf( esc_html__( '%1$s Showing: %2$s RESULTS %3$s', 'blossom-pin' ), '<span class="search-per-page-count">', esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
        endif;
    }
}
endif; 
add_action( 'blossom_pin_before_posts_content' , 'blossom_pin_search_per_page_count', 15 );

if( ! function_exists( 'blossom_pin_single_page_header' ) ):
/**
 * Displays a header on Single Page
 *
 */
function blossom_pin_single_page_header(){
    global $post;
    
    $page_on_front = get_option( 'page_on_front' );
    if( ! ( $post->ID == $page_on_front ) ){
    ?>
    <div class="single-page-header">
        <h1 class="single-page-title"><?php the_title(); ?></h1>
    </div>
    <?php
    }
}
endif;
add_action( 'blossom_pin_before_page_entry_content', 'blossom_pin_single_page_header', 15 );

if( ! function_exists( 'blossom_pin_meta_info' ) ):
/**
 * Single Post Meta Information
 *
 */
function blossom_pin_meta_info(){
    ?>
        <div class="meta-info">
            <div class="entry-meta">               
                <?php 
                blossom_pin_posted_by();
                if( is_single() ){
                    blossom_pin_posted_on();
                } 
                blossom_pin_comment_count(); ?>
            </div>
        </div>
<?php
}
endif;
add_action( 'blossom_pin_before_single_post_entry_content', 'blossom_pin_meta_info' );

if ( ! function_exists( 'blossom_pin_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_pin_post_thumbnail() {
	global $wp_query;
    $image_size  = 'thumbnail';
    $ed_featured = get_theme_mod( 'ed_featured_image', true );
    
    if( !( is_archive() || is_search() )  && !is_singular() ) : ?>
        <div class="holder">
            <div class="top">
    <?php endif;

    if( is_home() ){        
        if( has_post_thumbnail() ){                        
            echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
            the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );    
            echo '</a>';
        }       
    }elseif( is_archive() || is_search() ){
        if( has_post_thumbnail() ){
            echo '<div class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
            the_post_thumbnail( 'blossom-pin-archive', array( 'itemprop' => 'image' ) );    
            echo '</a></div>';
        }
    }elseif( is_singular() ){
        if( is_single() ){
            if( $ed_featured ) {
                echo '<div class="post-thumbnail">';
                the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
                echo '</div>';
            }
        }else{
            echo '<div class="post-thumbnail">';
            the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
            echo '</div>';
        }
    }
}
endif;
add_action( 'blossom_pin_before_page_entry_content', 'blossom_pin_post_thumbnail', 20 );
add_action( 'blossom_pin_before_post_entry_content', 'blossom_pin_post_thumbnail', 10 );
add_action( 'blossom_pin_single_post_entry_content', 'blossom_pin_post_thumbnail', 15 );

if( ! function_exists( 'blossom_pin_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_pin_entry_header(){ ?>
    <?php if( is_archive() || is_search() ){
        echo '<div class="text-holder">';
    } ?>
    <header class="entry-header">
        <?php 
            blossom_pin_category();

            if( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;       
        ?>
    </header>    
<?php
}
endif;
add_action( 'blossom_pin_before_post_entry_content', 'blossom_pin_entry_header', 20 );

if( ! function_exists( 'blossom_pin_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_pin_entry_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
                the_content();    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-pin' ),
    				'after'  => '</div>',
    			) );
            }else{
                the_excerpt();
            }
		?>
	</div><!-- .entry-content -->
    <?php
}
endif;
add_action( 'blossom_pin_page_entry_content', 'blossom_pin_entry_content', 15 );
add_action( 'blossom_pin_post_entry_content', 'blossom_pin_entry_content', 15 );
add_action( 'blossom_pin_single_post_entry_content', 'blossom_pin_entry_content', 20 );

if( ! function_exists( 'blossom_pin_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_pin_entry_footer(){ 
    $readmore = get_theme_mod( 'read_more_text', __( 'Read more', 'blossom-pin' ) ); ?>
	<footer class="entry-footer">
		<?php
			if( is_single() ){
			    blossom_pin_tag();
			}
            
            if( is_home() ){
                echo '<a href="' . esc_url( get_the_permalink() ) . '" class="read-more">' . esc_html( $readmore ) . '</a>';    
            }            
            
            if( is_archive() || is_search() ) blossom_pin_posted_on();
            
            if( get_edit_post_link() ){
                edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-pin' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
            }
		?>
	</footer><!-- .entry-footer -->

    <?php if( is_archive() || is_search() ){
        echo '</div><!-- .text-holder -->';
    }
    
    if( !( is_archive() || is_search() ) && ! is_singular() ) : ?>
        </div><!-- .top -->
        <div class="bottom">
            <?php blossom_pin_posted_on(); ?>
        </div><!-- .bottom -->
    </div> <!-- .holder -->
    <?php endif;
}
endif;
add_action( 'blossom_pin_post_entry_content', 'blossom_pin_entry_footer', 20 );
add_action( 'blossom_pin_page_entry_content', 'blossom_pin_entry_footer', 20 );
add_action( 'blossom_pin_single_post_entry_content', 'blossom_pin_entry_footer', 25 );

if( ! function_exists( 'blossom_pin_navigation' ) ) :
/**
 * Navigation
*/
function blossom_pin_navigation(){
    if( is_single() ){
        $previous = get_previous_post_link(
    		'<div class="nav-previous nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Previous Article', 'blossom-pin' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	);
    
    	$next = get_next_post_link(
    		'<div class="nav-next nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Next Article', 'blossom-pin' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	); 
        
        if( $previous || $next ){?>            
            <nav class="navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-pin' ); ?></h2>
    			<div class="nav-links">
    				<?php
                        if( $previous ) echo $previous;
                        if( $next ) echo $next;
                    ?>
    			</div>
    		</nav>        
            <?php
        }
    }else{
        $pagination = get_theme_mod( 'pagination_type','default' );
            
        switch( $pagination ){
            case 'default': // Default Pagination
                the_posts_navigation();
            break;

            case 'infinite_scroll': // Auto Infinite Scroll
                echo '<div class="pagination"></div>';
            break;
            
            default:
                the_posts_navigation();
            break;
        }
    }
}
endif;
add_action( 'blossom_pin_after_post_content', 'blossom_pin_navigation' );
add_action( 'blossom_pin_after_posts_content', 'blossom_pin_navigation' );

if( ! function_exists( 'blossom_pin_author' ) ) :
/**
 * Author Section
*/
function blossom_pin_author(){ 
    $ed_author    = get_theme_mod( 'ed_post_author', false );
    $author_title = get_the_author_meta( 'display_name' );
    $author_decription = get_the_author_meta( 'description' );
    $add_author_class = is_single() ? 'section' : 'info';
    if( ( is_single() && ! $ed_author && $author_title && $author_decription ) || is_author() ){ ?>
    <div class="author-<?php echo esc_attr( $add_author_class ); ?>">
		<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?></div>
		<div class="text-holder">
			<?php 
                echo '<h3>' . esc_html__( 'Written by','blossom-pin' ) . '</h3>';
                echo '<h2 class="author-name">' . esc_html( $author_title ) . '</h2>';
                if( !empty( $author_decription ) ) echo '<div class="author-info-content">' . wpautop( wp_kses_post( $author_decription ) ) . '</div>';
            ?>		
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_pin_single_post_entry_content', 'blossom_pin_author', 30 );

if( ! function_exists( 'blossom_pin_related_posts' ) ) :
/**
 * Related Posts 
*/
function blossom_pin_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );
    if( $ed_related_post ){
        blossom_pin_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'blossom_pin_before_single_footer', 'blossom_pin_related_posts', 30 );

if( ! function_exists( 'blossom_pin_latest_posts' ) ) :
/**
 * Latest Posts
*/
function blossom_pin_latest_posts(){ 
    blossom_pin_get_posts_list( 'latest' );
}
endif;
add_action( 'blossom_pin_latest_posts', 'blossom_pin_latest_posts' );

if( ! function_exists( 'blossom_pin_comment' ) ) :
/**
 * Comments Template 
*/
function blossom_pin_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_pin_before_single_footer', 'blossom_pin_comment', 40 );
add_action( 'blossom_pin_after_page_content', 'blossom_pin_comment' );

if( ! function_exists( 'blossom_pin_content_end' ) ) :
/**
 * Content End
*/
function blossom_pin_content_end(){
    if( !is_404() ) { ?>            
            </div><!-- .container -->        
        </div><!-- .site-content -->
    <?php
    }
}
endif;
add_action( 'blossom_pin_before_footer', 'blossom_pin_content_end', 20 );
add_action( 'blossom_pin_before_single_footer', 'blossom_pin_content_end', 15 );


if( ! function_exists( 'blossom_pin_instagram' ) ) :
/**
 * Before Footer
*/
function blossom_pin_instagram(){
    if( blossom_pin_is_btif_activated() ){
        $ed_instagram = get_theme_mod( 'ed_instagram', false );
        if( $ed_instagram ){
            echo '<div class="instagram-section">';
            echo do_shortcode( '[blossomthemes_instagram_feed]' );
            echo '</div>';    
        }
    }
}
endif;
add_action( 'blossom_pin_before_footer_start', 'blossom_pin_instagram', 10 );

if( ! function_exists( 'blossom_pin_newsletter' ) ) :
/**
 * Blossom Newsletter
*/
function blossom_pin_newsletter(){
    $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
    $newsletter = get_theme_mod( 'newsletter_shortcode' );
    if( blossom_pin_is_btnw_activated() && $ed_newsletter && !empty( $newsletter ) ){
        echo '<div class="newsletter-section"><div class="container">';
        echo do_shortcode( $newsletter );
        blossom_pin_social_links( true, true );   
        echo '</div></div>';            
    }
}
endif;
add_action( 'blossom_pin_before_footer_start', 'blossom_pin_newsletter', 20 );

if( ! function_exists( 'blossom_pin_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_pin_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_pin_footer', 'blossom_pin_footer_start', 20 );

if( ! function_exists( 'blossom_pin_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_pin_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three' );
    $active_sidebars = array();
    $sidebar_count   = 0;

    foreach ( $footer_sidebars as $footer_sidebar ) {
        if( is_active_sidebar( $footer_sidebar ) ){
            array_push( $active_sidebars, $footer_sidebar );
            $sidebar_count++ ;
        }
    }

    if( ! empty( $active_sidebars ) ){ ?>

        <div class="footer-t">
            <div class="container">
                <div class="col-<?php echo esc_attr( $sidebar_count ); ?> grid">
                    <?php 
                    foreach( $active_sidebars as $active_footer_sidebar ){
                        if( is_active_sidebar( $active_footer_sidebar ) ){
                            echo '<div class="col">';
                            dynamic_sidebar( $active_footer_sidebar );
                            echo '</div>';
                        }
                    } 
                    ?>
                </div>
            </div><!-- .container -->
        </div><!-- .footer-t -->
    <?php }
}
endif;
add_action( 'blossom_pin_footer', 'blossom_pin_footer_top', 30 );

if( ! function_exists( 'blossom_pin_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_pin_footer_bottom(){ ?>
    <div class="footer-b">
		<div class="container">
			<div class="site-info">            
            <?php
                blossom_pin_get_footer_copyright();
                esc_html_e( 'Blossom Pin | Developed By ', 'blossom-pin' );
                echo '<a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">'. esc_html__( 'Blossom Themes', 'blossom-pin' ) . '</a>.';
                
                printf( esc_html__( ' Powered by %s', 'blossom-pin' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-pin' ) ) .'" target="_blank">WordPress</a>. ' );
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
            <?php blossom_pin_secondary_navigation(); ?>
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_pin_footer', 'blossom_pin_footer_bottom', 40 );

if( ! function_exists( 'blossom_pin_back_to_top' ) ):
/**
* Back to Top 
*/
function blossom_pin_back_to_top() { ?>
    <button aria-label="<?php esc_attr_e( 'go to top', 'blossom-pin' ); ?>" class="back-to-top">
        <span><i class="fas fa-long-arrow-alt-up"></i></span>
    </button>
    <?php
}
endif;
add_action( 'blossom_pin_footer', 'blossom_pin_back_to_top', 50);

if( ! function_exists( 'blossom_pin_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_pin_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_pin_footer', 'blossom_pin_footer_end', 60 );

if( ! function_exists( 'blossom_pin_page_end' ) ) :
/**
 * Page End
*/
function blossom_pin_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_pin_after_footer', 'blossom_pin_page_end', 20 );
