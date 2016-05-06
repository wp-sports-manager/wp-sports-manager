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
class WP_Sports_Manager_Create_Roles {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct() {
	}
	
	public static function add_roles() {


		/**
		 * First role, enable for every member
		 * members_club
		 *
		 */
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

		/**
		 * Desk Officer
		 * desk_officer
		 *
		 */
		_x('Desk Officer', 'User role', 'wp-sports-manager' );

		add_role('desk_officer', 'Desk Officer');

		// Add caps for Contributor role
		$role = get_role('desk_officer');
		$role->add_cap('edit_posts');
		$role->add_cap('read');
		$role->add_cap('level_1');
		$role->add_cap('level_0');

		// Add caps for manager
		$role->add_cap('manage_wp_sports_manager');

		/**
		 * Coach
		 * coach
		 *
		 */
		_x('Coach', 'User role', 'wp-sports-manager' );

		add_role('coach', 'Coach');

		// Add caps for Contributor role
		$role = get_role('coach');
		$role->add_cap('edit_posts');
		$role->add_cap('read');
		$role->add_cap('level_1');
		$role->add_cap('level_0');

		// Add caps for manager
		$role->add_cap('manage_wp_sports_manager');

		/**
		 * Assistant
		 * assistant
		 *
		 */
		_x('Assistant', 'User role', 'wp-sports-manager' );

		add_role('assistant', 'Assistant');

		// Add caps for Contributor role
		$role = get_role('assistant');
		$role->add_cap('edit_posts');
		$role->add_cap('read');
		$role->add_cap('level_1');
		$role->add_cap('level_0');

		// Add caps for manager
		$role->add_cap('manage_wp_sports_manager');

		/**
		 * Player
		 * player
		 *
		 */
		_x('Player', 'User role', 'wp-sports-manager' );

		add_role('player', 'Player');

		// Add caps for Contributor role
		$role = get_role('player');
		$role->add_cap('edit_posts');
		$role->add_cap('read');
		$role->add_cap('level_1');
		$role->add_cap('level_0');

		// Add caps for manager
		$role->add_cap('manage_wp_sports_manager');

		/**
		 * Volunteer
		 * volunteer
		 *
		 */
		_x('Volunteer', 'User role', 'wp-sports-manager' );

		add_role('volunteer', 'Volunteer');

		// Add caps for Contributor role
		$role = get_role('volunteer');
		$role->add_cap('read');
		$role->add_cap('level_1');
		$role->add_cap('level_0');


	}

	public static function remove_roles() {
		remove_role( 'members_club' );
		remove_role( 'desk_officer' );
		remove_role( 'coach' );
		remove_role( 'assistant' );
		remove_role( 'player' );
		remove_role( 'volunteer' );
	}

}
