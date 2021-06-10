<?php 

/** Plugin API **/
function blossom_pin_call_plugin_api( $plugin ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

	$call_api = plugins_api( 'plugin_information', array(
		'slug'   => $plugin,
		'fields' => array(
			'downloaded'        => false,
			'rating'            => false,
			'description'       => false,
			'short_description' => true,
			'donate_link'       => false,
			'tags'              => false,
			'sections'          => true,
			'homepage'          => true,
			'added'             => false,
			'last_updated'      => false,
			'compatibility'     => false,
			'tested'            => false,
			'requires'          => false,
			'downloadlink'      => false,
			'icons'             => true
		)
	) );

	return $call_api;
}

/** Check For Icon **/
function blossom_pin_check_for_icon( $arr ) {
	if ( ! empty( $arr['svg'] ) ) {
		$plugin_icon_url = $arr['svg'];
	} elseif ( ! empty( $arr['2x'] ) ) {
		$plugin_icon_url = $arr['2x'];
	} elseif ( ! empty( $arr['1x'] ) ) {
		$plugin_icon_url = $arr['1x'];
	} else {
		$plugin_icon_url = $arr['default'];
	}

	return $plugin_icon_url;
}

function enqueue() {
	
	Blossom_Pin_Getting_Start_Page_Plugin_Helper::instance()->enqueue_scripts();
}
add_action( 'init', 'enqueue' );