<?php
/**
 * Plugin main file.
 *
 * @package   WordPress\Debugging
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Debugging
 * Plugin URI:  https://hiliam.dev
 * Description: WordPress Debugging is a one-stop solution for WordPress users to use everything Google has to offer to make them successful on the web.
 * Version:     1.0.0
 * Author:      Liam
 * Author URI:  https://hiliam.dev
 * License:     Apache License 2.0
 * License URI: https://www.apache.org/licenses/LICENSE-2.0
 * Text Domain: wordpress-debugging
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define most essential constants.
define( 'WORDPRESSDEBUGGING_VERSION', '1.0.1' );
define( 'WORDPRESSDEBUGGING_PLUGIN_MAIN_FILE', __FILE__ );


/**
 * Handles plugin activation.
 *
 * Throws an error if the plugin is activated on an older version than PHP 5.4.
 *
 * @access private
 *
 * @param bool $network_wide Whether to activate network-wide.
 */
function wordpressdebugging_activate_plugin( $network_wide ) {
	if ( version_compare( PHP_VERSION, '5.4.0', '<' ) ) {
		wp_die(
			esc_html__( 'WordPress Debugging requires PHP version 5.4.', 'wordpress-debugging' ),
			esc_html__( 'Error Activating', 'wordpress-debugging' )
		);
	}

	if ( $network_wide ) {
		return;
	}

	do_action( 'wordpressdebugging_activation', $network_wide );
}

register_activation_hook( __FILE__, 'wordpressdebugging_activate_plugin' );

/**
 * Handles plugin deactivation.
 *
 * @access private
 *
 * @param bool $network_wide Whether to deactivate network-wide.
 */
function wordpressdebugging_deactivate_plugin( $network_wide ) {
	if ( version_compare( PHP_VERSION, '5.4.0', '<' ) ) {
		return;
	}

	if ( $network_wide ) {
		return;
	}

	do_action( 'wordpressdebugging_deactivation', $network_wide );
}

register_deactivation_hook( __FILE__, 'wordpressdebugging_deactivate_plugin' );

/**
 * Handles plugin uninstall.
 *
 * @access private
 */
function wordpressdebugging_uninstall_plugin() {
	if ( version_compare( PHP_VERSION, '5.4.0', '<' ) ) {
		return;
	}

	do_action( 'wordpressdebugging_uninstall' );
}
register_uninstall_hook( __FILE__, 'wordpressdebugging_uninstall_plugin' );


if ( version_compare( PHP_VERSION, '5.4.0', '>=' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'src/Loader.php';
}
