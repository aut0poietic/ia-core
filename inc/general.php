<?php
/**
 * General stuff
 */

// exit if accessed directly...
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove random comment styles
 */
add_filter( 'show_recent_comments_widget_style', '__return_false', 99 );

/**
 * Ensure that all script tags use defer
 */
add_filter( 'script_loader_tag', function ( $tag ) {
	if ( is_admin() ) {
		return $tag;
	}

	return preg_replace( '/(<script\b[^><]*)/i', '$1 defer', $tag );
} );

/**
 * Ensure that all style tags use defer
 */
add_filter( 'style_loader_tag', function ( $tag ) {
	if ( is_admin() ) {
		return $tag;
	}

	return preg_replace( '/(<link\b[^><]*)/i', '$1 defer', $tag );
} );


/**
 * Remove emojis
 */

add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
		if ( 'dns-prefetch' == $relation_type ) {
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

			$urls = array_diff( $urls, array( $emoji_svg_url ) );
		}

		return $urls;
	}, 10, 2 );
} );


/**
 * Disable Author Pages
 * Technique found in 10-up Experience
 * https://github.com/10up/10up-experience
 */

add_action( 'wp', function () {
	if ( is_author() & ! is_admin() ) {
		wp_safe_redirect( home_url(), 301 );
		exit();
	}
} );

/**
 * Prevent clickjacking and make sure IE renders using latest renderer
 * ClickJacking technique found  in 10-up Experience
 * https://github.com/10up/10up-experience
 */
add_action( 'wp_headers', function ( $headers ) {
	$headers['X-Frame-Options'] = 'SAMEORIGIN';
	$headers['X-UA-Compatible'] = 'IE=edge';

	return $headers;
} );


/**
 * Add domain to Gravity Forms admin email notifications
 *
 * Technique found in *EA-Core-Functionality* by Bill Erickson
 * https://github.com/billerickson/EA-Core-Functionality
 */

add_filter( 'gform_notification', function ( $notification, $form, $entry ) {

	if ( $notification['name'] == 'Admin Notification' ) {
		$notification['message'] .= 'Sent from ' . home_url();
	}

	return $notification;
}, 10, 3 );


/**
 * Default Image Link is None
 *
 * Technique found in *EA-Core-Functionality* by Bill Erickson
 * https://github.com/billerickson/EA-Core-Functionality
 */

add_action( 'init', function () {
	$link = get_option( 'image_default_link_type' );
	if ( 'none' !== $link ) {
		update_option( 'image_default_link_type', 'none' );
	}
} );

/**
 * Remove Custom Fields Metabox.
 *
 * Technique found in *EA-Core-Functionality* by Bill Erickson
 * https://github.com/billerickson/EA-Core-Functionality
 */

add_action( 'admin_menu', function () {
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		remove_meta_box( 'postcustom', $post_type, 'normal' );
	}
} );