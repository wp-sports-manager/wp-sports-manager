<?php

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

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-create-custom-post-type.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-create-roles.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-create-taxonomies.php';

		// new WP_Sports_Manager_Create_Custom_Post_Type();

		WP_Sports_Manager_Create_Custom_Post_Type::add_team_cpt();
		WP_Sports_Manager_Create_Custom_Post_Type::add_match_cpt();

		new WP_Sports_Manager_Create_Roles();
		new WP_Sports_Manager_Create_Taxonomies();

	}

}
