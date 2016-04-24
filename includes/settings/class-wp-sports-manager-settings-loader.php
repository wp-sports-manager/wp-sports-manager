<?php

/**
 * Register all settings
 *
 * @link       http://sportsmanager.club
 * @since      0.0.1
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 * @author     David Massiani <me@davidmassiani.com>
 */
class WP_Sports_Manager_Settings_Loader {

	/**
	 * All the roles
	 *
	 * @since    0.0.1
	 * @access   protected
	 */
	protected $roles;

	/**
	 * Initialize settings
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->load_settings_dependencies();
		$this->load_settings_roles();

	}

	/**
	 * Load all settings dependencies
	 *
	 * @since    0.0.1
	 */
	private function load_settings_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'settings/class-wp-sports-manager-settings-roles.php';

	}

	/**
	 *
	 * Set Roles
	 *
	 */
	private function load_settings_roles() {
		// return true or false
		$this->roles = new WP_Sports_Manager_Settings_Roles;
	}

}
