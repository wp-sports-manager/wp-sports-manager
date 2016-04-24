<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      0.0.1
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/public
 * @author     Your Name <email@example.com>
 */
class WP_Sports_Manager_Settings_Roles {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public static function add_roles() {
		$result = add_role(
			'members_club',
			__( 'Club Member', 'wp-sports-manager' ),
			array(
				'read'         => true,  // true allows this capability
				'edit_posts'   => true,
				'delete_posts' => false, // Use false to explicitly deny
			)
		);

	}

	public static function remove_roles() {
		remove_role( 'members_club' );
	}

}
