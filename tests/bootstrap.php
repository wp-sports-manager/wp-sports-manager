<?php

/**
 * Server path to WordPress
 *
 *
 */
$wpPath = '/srv/www/sports-manager/htdocs/';
$path = $wpPath . 'wp-content/plugins/wp-sports-manager';



/**
 * The path to the WordPress tests checkout.
 */
define( 'WP_TESTS_DIR', $path . '/tests' );
 
/**
 * The path to the main file of the plugin to test.
 */
define( 'TEST_PLUGIN_FILE', $path . '/wpsportsmanager.php' );

/**
 *
 * Load WordPress
 *
 */
require_once WP_TESTS_DIR . '/includes/functions.php';


function _manually_load_plugin() {
	/**
	 *
	 * Load Sports Manager
	 *
	 */
	require TEST_PLUGIN_FILE;

	/**
	 *
	 * Activate Sports Manager
	 *
	 */
	$plugins_to_active = array(
		'wp-sports-manager/wpsportsmanager.php'
	);
	update_option( 'active_plugins', $plugins_to_active );

}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require WP_TESTS_DIR . '/includes/bootstrap.php';
