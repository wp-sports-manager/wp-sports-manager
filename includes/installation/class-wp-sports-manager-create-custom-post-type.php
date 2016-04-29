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
class WP_Sports_Manager_Create_Custom_Post_type {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct() {
	}

	public static function add_team_cpt() {

		do_action( 'wpsm_team_register_custom_post_type' );

		register_post_type( 'wpsm_teams',
			apply_filters( 'wpsm_register_post_type_teams',
				array(
					'labels' => array(
						'name' 					=> __( 'Team', 'wp-sports-manager' ),
						'singular_name' 		=> __( 'Team', 'wp-sports-manager' ),
						'add_new_item' 			=> __( 'Add New Team', 'wp-sports-manager' ),
						'edit_item' 			=> __( 'Edit Team', 'wp-sports-manager' ),
						'new_item' 				=> __( 'New', 'wp-sports-manager' ),
						'view_item' 			=> __( 'View', 'wp-sports-manager' ),
						'search_items' 			=> __( 'Search', 'wp-sports-manager' ),
						'not_found' 			=> __( 'No results found.', 'wp-sports-manager' ),
						'not_found_in_trash' 	=> __( 'No results found.', 'wp-sports-manager' ),
					),
					'public' 				=> false,
					'show_ui' 				=> true,
					'capability_type' 		=> 'edit_posts',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
				)
			)
		);

		do_action( 'wpsm_after_team_register_custom_post_type' );

	}

	public static function add_match_cpt() {

		do_action( 'wpsm_match_register_custom_post_type' );

		register_post_type( 'wpsm_matchs',
			apply_filters( 'wpsm_register_post_type_matchs',
				array(
					'labels' => array(
						'name' 					=> __( 'Match', 'wp-sports-manager' ),
						'singular_name' 		=> __( 'Match', 'wp-sports-manager' ),
						'add_new_item' 			=> __( 'Add New Match', 'wp-sports-manager' ),
						'edit_item' 			=> __( 'Edit Match', 'wp-sports-manager' ),
						'new_item' 				=> __( 'New', 'wp-sports-manager' ),
						'view_item' 			=> __( 'View', 'wp-sports-manager' ),
						'search_items' 			=> __( 'Search', 'wp-sports-manager' ),
						'not_found' 			=> __( 'No results found.', 'wp-sports-manager' ),
						'not_found_in_trash' 	=> __( 'No results found.', 'wp-sports-manager' ),
					),
					'public' 				=> false,
					'show_ui' 				=> true,
					'capability_type' 		=> 'edit_posts',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
				)
			)
		);

		do_action( 'wpsm_after_match_register_custom_post_type' );

	}

	private function add_cpt() {

	}

	public static function remove_cpt() {

	}

}
