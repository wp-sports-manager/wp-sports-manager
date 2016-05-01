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
	 * @param      string    $version    		The version of this plugin.
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

		$main_page = add_menu_page( 
			__( 'Sports Manager', 'wp-sports-manager' ), 	// page title
				'Sports Manager', 							// menu title
				'manage_options', 							// capability
				'wp-sports-manager', 						// menu slug
				array( &$this, 'homepage' ), 				// callback function
				null, 										// icon url
				30											// position in the menu
		);

		/**
		 * Dashboard menu
		 *
		 */
		$dashboard_page = add_submenu_page( 

			'wp-sports-manager', 							// parent slug
			__('Dashboard',' wp-sports-manager'), 			// page title
			__('Dashboard', 'wp-sports-manager'), 			// menu title
				'manage_options', 							// capability
				'wp-sports-manager',						// menu slug (same slug for erase duplicate 'WP Sports Manager' item menu)
				array( &$this, 'homepage' )	 				// callback function

		); 

		/**
		 * Matchs menu
		 *
		 */
		$matchs_page = add_submenu_page( 

			'wp-sports-manager', 
			__('Matchs',' wp-sports-manager'), 
			__('Matchs', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-matchs',
				array( &$this, 'matchs' )	

		); 

		/**
		 * Teams menu
		 *
		 */
		$teams_page = add_submenu_page( 

			'wp-sports-manager', 
			__('Teams',' wp-sports-manager'), 
			__('Teams', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-teams',
				array( &$this, 'teams' )	

		); 

		/**
		 * Trainings menu
		 *
		 */
		$trainings_page = add_submenu_page( 

			'wp-sports-manager', 
			__('Trainings',' wp-sports-manager'), 
			__('Trainings', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-trainings',
				array( &$this, 'trainings' )	

		); 

		/**
		 * Tournaments menu
		 *
		 */
		$tournaments_page = add_submenu_page( 

			'wp-sports-manager', 
			__('Tournaments',' wp-sports-manager'), 
			__('Tournaments', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-tournaments',
				array( &$this, 'tournaments' )	

		); 

	}

	/**
	 * Add Admin Homepage
	 */
	public function homepage() {
		WP_Sports_Manager_Admin::homepage();
	}

	/**
	 * View Admin Matchs
	 */
	public function matchs() {
		WP_Sports_Manager_Admin::matchs();
	}

	/**
	 * View Admin Matchs
	 */
	public function teams() {
		WP_Sports_Manager_Admin::teams();
	}

	/**
	 * View Admin Matchs
	 */
	public function trainings() {
		WP_Sports_Manager_Admin::trainings();
	}

	/**
	 * View Admin Matchs
	 */
	public function tournaments() {
		WP_Sports_Manager_Admin::tournaments();
	}

}
