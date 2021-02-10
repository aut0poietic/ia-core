<?php
/**
 * Remove Trackbacks
 *
 * Original Plugin *Kill Trackbacks* by *Christopher Davis*.
 * Found in *EA-Core-Functionality* by Bill Erickson
 * https://github.com/billerickson/EA-Core-Functionality
 *
 **/

// exit if accessed directly...
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'wp_headers', function ( $headers ) {
	if ( isset( $headers['X-Pingback'] ) ) {
		unset( $headers['X-Pingback'] );
	}

	return $headers;
}, 10, 1 );


add_filter( 'rewrite_rules_array', function ( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( preg_match( '/trackback\/\?\$$/i', $rule ) ) {
			unset( $rules[ $rule ] );
		}
	}

	return $rules;
} );


add_filter( 'bloginfo_url', function ( $output, $show ) {
	if ( $show == 'pingback_url' ) {
		$output = '';
	}

	return $output;
}, 10, 2 );

add_action( 'xmlrpc_call', function ( $action ) {
	if ( 'pingback.ping' === $action ) {
		wp_die(
			'Pingbacks are not supported',
			'Not Allowed!',
			array( 'response' => 403 )
		);
	}
} );

remove_action( 'wp_head', 'rsd_link' );
add_filter( 'pre_update_option_enable_xmlrpc', '__return_false' );
add_filter( 'pre_option_enable_xmlrpc', '__return_zero' );
