<?php
/**
 * Help Panel.
 *
 * @package Blossom Pin
 */

?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'blossom-pin' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'blossom-pin' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://docs.blossomthemes.com/' . BLOSSOM_PIN_THEME_TEXTDOMAIN . '/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'blossom-pin' ); ?>" target="_blank"><?php esc_html_e( 'View Documentation', 'blossom-pin' ); ?></a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'blossom-pin' ); ?></h4>
        <p><?php printf( __( 'It\'s always a good idea to visit our %1$sKnowledge Base%2$s before you send us a support ticket.', 'blossom-pin' ), '<a href="'. esc_url( 'https://docs.blossomthemes.com/' . BLOSSOM_PIN_THEME_TEXTDOMAIN . '/' ) .'" target="_blank">', '</a>' ); ?></p>
        <p><?php esc_html_e( 'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends.', 'blossom-pin' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/support-ticket/' ); ?>" title="<?php esc_attr_e( 'Contact Support Team', 'blossom-pin' ); ?>" target="_blank"><?php esc_html_e( 'Contact Support', 'blossom-pin' ); ?></a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Demo', 'blossom-pin' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'blossom-pin' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/theme-demo/?theme=' . BLOSSOM_PIN_THEME_TEXTDOMAIN ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'blossom-pin' ); ?>" target="_blank"><?php esc_html_e( 'View Demo', 'blossom-pin' ); ?></a>
    </div><!-- .panel-aside -->
</div>
