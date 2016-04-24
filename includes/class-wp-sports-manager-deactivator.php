<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 * @author     Your Name <email@example.com>
 */
class WP_Sports_Manager_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/settings/class-wp-sports-manager-settings-roles.php';
		WP_Sports_Manager_Settings_Roles::remove_roles();

	}

}
