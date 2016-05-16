<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Fired during plugin activation
 *
 * @link       http://sportsmanager.club
 * @since      0.0.1
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.0.1
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 * @author     David Massiani <me@davidmassiani.com>
 */
class WP_Sports_Manager_Activator {

	private $roles;

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.0.1
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wpsm-create-roles.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wpsm-welcome.php';
		/**
		 * Add Roles
		 * 
		 *
		 *
		 */
		WP_Sports_Manager_Create_Roles::add_roles();

		/**
		 * Add transient installation for welcome page
		 *
		 *
		 */
		WP_Sports_Manager_Welcome::install();

	}

}
