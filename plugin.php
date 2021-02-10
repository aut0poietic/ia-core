<?php
/**
 * Plugin Name:       IA Core
 * Description:       A set of Irresponsible features required for your site.
 * Version:           1.0.0
 * Author:            Jer @ Irresponsible Art
 * Author URI:        https://irresponsibleart.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ia-core
 * Requires at least: 5.6
 * Requires PHP:      7.2
 */

// exit if accessed directly...
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'IA_CORE_DIR', plugin_dir_path( __FILE__ ) );

require_once IA_CORE_DIR . 'inc/general.php';
require_once IA_CORE_DIR . 'inc/trackbacks.php';