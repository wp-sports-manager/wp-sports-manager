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
class WP_Sports_Manager_Create_Roles {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct() {
		$this->add_roles();
	}
	
	private function add_roles() {

		_x('Club Members', 'User role', 'wp-sports-manager' );

		add_role('members_club', 'Club Members');

		// Add caps for Contributor role
		$role = get_role('members_club');
		$role->add_cap('edit_posts');
		$role->add_cap('read');
		$role->add_cap('level_1');
		$role->add_cap('level_0');

		// Add caps for manager
		$role->add_cap('manage_wp_sports_manager');

		// $add_roles = add_role(
		// 	'members_club',
		// 	__( 'Club Member', 'wp-sports-manager' ),
		// 	array(
		// 		'read'         => true,  // true allows this capability
		// 		'edit_posts'   => true,
		// 		'delete_posts' => false, // Use false to explicitly deny
		// 	)
		// );

	}

	public static function remove_roles() {
		remove_role( 'members_club' );
	}

}
