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

	/**
	 * Team Custom Post Type
	 *
	 *
	 */

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
					'public' 				=> true,
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
					'show_in_menu' 			=> false
				)
			)
		);

		do_action( 'wpsm_after_team_register_custom_post_type' );

	}

	/**
	 * Match Custom Post Type
	 *
	 *
	 */

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
					'public' 				=> true,
					'show_ui' 				=> true,
					'capability_type' 		=> 'post',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
					'taxonomies'			=> array(
						'wpsm_competition', 'wpsm_place', 'wpsm_season'
					)
				)
			)
		);

		do_action( 'wpsm_after_match_register_custom_post_type' );

	}

	/**
	 * Opponent Custom Post Type
	 *
	 *
	 */

	public static function add_opponent_cpt() {

		do_action( 'wpsm_opponent_register_custom_post_type' );

		register_post_type( 'wpsm_opponents',
			apply_filters( 'wpsm_register_post_type_opponents',
				array(
					'labels' => array(
						'name' 					=> __( 'Opponent', 'wp-sports-manager' ),
						'singular_name' 		=> __( 'Opponent', 'wp-sports-manager' ),
						'add_new_item' 			=> __( 'Add New Opponent', 'wp-sports-manager' ),
						'edit_item' 			=> __( 'Edit Opponent', 'wp-sports-manager' ),
						'new_item' 				=> __( 'New', 'wp-sports-manager' ),
						'view_item' 			=> __( 'View', 'wp-sports-manager' ),
						'search_items' 			=> __( 'Search', 'wp-sports-manager' ),
						'not_found' 			=> __( 'No results found.', 'wp-sports-manager' ),
						'not_found_in_trash' 	=> __( 'No results found.', 'wp-sports-manager' ),
					),
					'public' 				=> true,
					'show_ui' 				=> true,
					'capability_type' 		=> 'post',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
					'taxonomies'			=> array(
						'wpsm_place'
					)
				)
			)
		);

		do_action( 'wpsm_after_opponent_register_custom_post_type' );

	}

	/**
	 * Trainings Custom Post Type
	 *
	 *
	 */

	public static function add_training_cpt() {

		do_action( 'wpsm_training_register_custom_post_type' );

		register_post_type( 'wpsm_trainings',
			apply_filters( 'wpsm_register_post_type_trainings',
				array(
					'labels' => array(
						'name' 					=> __( 'Trainings', 'wp-sports-manager' ),
						'singular_name' 		=> __( 'Training', 'wp-sports-manager' ),
						'add_new_item' 			=> __( 'Add New Training', 'wp-sports-manager' ),
						'edit_item' 			=> __( 'Edit Training', 'wp-sports-manager' ),
						'new_item' 				=> __( 'New', 'wp-sports-manager' ),
						'view_item' 			=> __( 'View', 'wp-sports-manager' ),
						'search_items' 			=> __( 'Search', 'wp-sports-manager' ),
						'not_found' 			=> __( 'No results found.', 'wp-sports-manager' ),
						'not_found_in_trash' 	=> __( 'No results found.', 'wp-sports-manager' ),
					),
					'public' 				=> true,
					'show_ui' 				=> true,
					'capability_type' 		=> 'post',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
					'taxonomies'			=> array(
						'wpsm_place', 'wpsm_season'
					)
				)
			)
		);

		do_action( 'wpsm_after_training_register_custom_post_type' );

	}

	/**
	 * Tournaments Custom Post Type
	 *
	 *
	 */

	public static function add_tournaments_cpt() {

		do_action( 'wpsm_tournament_register_custom_post_type' );

		register_post_type( 'wpsm_tournaments',
			apply_filters( 'wpsm_register_post_type_tournaments',
				array(
					'labels' => array(
						'name' 					=> __( 'Tournaments', 'wp-sports-manager' ),
						'singular_name' 		=> __( 'Tournament', 'wp-sports-manager' ),
						'add_new_item' 			=> __( 'Add New Tournament', 'wp-sports-manager' ),
						'edit_item' 			=> __( 'Edit Tournament', 'wp-sports-manager' ),
						'new_item' 				=> __( 'New', 'wp-sports-manager' ),
						'view_item' 			=> __( 'View', 'wp-sports-manager' ),
						'search_items' 			=> __( 'Search', 'wp-sports-manager' ),
						'not_found' 			=> __( 'No results found.', 'wp-sports-manager' ),
						'not_found_in_trash' 	=> __( 'No results found.', 'wp-sports-manager' ),
					),
					'public' 				=> true,
					'show_ui' 				=> true,
					'capability_type' 		=> 'post',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
					'taxonomies'			=> array(
						'wpsm_competition', 'wpsm_place', 'wpsm_season'
					)
				)
			)
		);

		do_action( 'wpsm_after_tournament_register_custom_post_type' );

	}

	/**
	 * Members Custom Post Type
	 *
	 *
	 */

	public static function add_members_cpt() {

		do_action( 'wpsm_member_register_custom_post_type' );

		register_post_type( 'wpsm_members',
			apply_filters( 'wpsm_register_post_type_members',
				array(
					'labels' => array(
						'name' 					=> __( 'Members', 'wp-sports-manager' ),
						'singular_name' 		=> __( 'Member', 'wp-sports-manager' ),
						'add_new_item' 			=> __( 'Add New Member', 'wp-sports-manager' ),
						'edit_item' 			=> __( 'Edit Member', 'wp-sports-manager' ),
						'new_item' 				=> __( 'New', 'wp-sports-manager' ),
						'view_item' 			=> __( 'View', 'wp-sports-manager' ),
						'search_items' 			=> __( 'Search', 'wp-sports-manager' ),
						'not_found' 			=> __( 'No results found.', 'wp-sports-manager' ),
						'not_found_in_trash' 	=> __( 'No results found.', 'wp-sports-manager' ),
					),
					'public' 				=> true,
					'show_ui' 				=> true,
					'capability_type' 		=> 'post',
					'map_meta_cap' 			=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'page-attributes', 'excerpt' ),
					'has_archive' 			=> false,
					'show_in_nav_menus' 	=> false,
					'can_export' 			=> false,
					'show_in_menu' 			=> false,
					'taxonomies'			=> array(
						'wpsm_members_typology'
					)
				)
			)
		);

		do_action( 'wpsm_after_member_register_custom_post_type' );

	}

	public static function remove_cpt() {
		// remove ctp on unactivate
	}

}
