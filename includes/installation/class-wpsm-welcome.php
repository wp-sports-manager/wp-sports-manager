<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://sportsmanager.club
 * @since      0.0.1
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 * @author     David Massiani <me@davidmassiani.com>
 */
class WP_Sports_Manager_Welcome {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wpsm_welcome_screen_pages' ) );
		add_action( 'admin_head', array( $this, 'wpsm_welcome_screen_remove_menus' ) );
		add_action( 'admin_init', array( $this, 'wpsm_welcome_screen_do_activation_redirect') );
	}

	public function install() {

		set_transient( '_welcome_screen_activation_redirect', true, 30 );

	}

	public function wpsm_welcome_screen_do_activation_redirect() {
		// Bail if no activation redirect
		if ( ! get_transient( '_welcome_screen_activation_redirect' ) ) {
			return;
		}

		// Delete the redirect transient
		delete_transient( '_welcome_screen_activation_redirect' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) || defined( 'IFRAME_REQUEST' ) )
			return;

		// Redirect to bbPress about page
		wp_safe_redirect( add_query_arg( array( 'page' => 'sports-manager-welcome' ), admin_url( 'index.php' ) ) );

	}

	public function wpsm_welcome_screen_pages() {
		// error_log('wpsm add welcome dashboard page');

		add_dashboard_page(
			__( 'Welcome to WP Sports Manager', 'wp-sports-manager' ),
			__('Welcome to WP Sports Manager', 'wp-sports-manager' ),
			'manage_options',
			'sports-manager-welcome',
			array( $this, 'wpsm_welcome_screen_content' )
		);
	}

	public function wpsm_welcome_screen_content() {
		include plugin_dir_path( dirname( WPSM_PLUGIN_FILE ) ) . 'admin/views/wpsm-welcome.php';
	}

	public function wpsm_welcome_screen_remove_menus() {
		remove_submenu_page( 'index.php', 'sports-manager-welcome' );
	}


}
