<?php

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
class WP_Sports_Manager_Create_Menu {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct() {
	}

	/**
	 * Add menu item
	 */
	public function admin_menu() {
		global $menu;

		if ( current_user_can( 'manage_wp_sports_manager' ) )
			$menu[] = array( '', 'read', 'separator-wpsportsmanager', '', 'wp-menu-separator wpsportsmanager' );

		$main_page = add_menu_page( __( 'Sports Manager', 'wp-sports-manager' ), 'Sports Manager', 'manage_options', 'wp-sports-manager', array( &$this, 'homepage' ), null, 30);
	}

	/**
	 * Init the settings page
	 */
	public function homepage() {
		WP_Sports_Manager_Admin::homepage();
	}

}
