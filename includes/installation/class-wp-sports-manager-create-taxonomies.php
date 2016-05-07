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
class WP_Sports_Manager_Create_Taxonomies {

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
	 * Add competition Taxonomy
	 *
	 *
	 */
	public static function add_competitions() {

		$labels = array(
			'name'              => _x( 'Competitions', 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( 'Competition', 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search Competitions', 'wp-sports-manager' ),
			'all_items'         => __( 'All Competitions', 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent Competition', 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent Competition:', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit Competition', 'wp-sports-manager' ),
			'update_item'       => __( 'Update Competition', 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New Competition', 'wp-sports-manager' ),
			'new_item_name'     => __( 'New Competition Name', 'wp-sports-manager' ),
			'menu_name'         => __( 'Competition', 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_competition' ),
		);

		register_taxonomy( 'wpsm_competition', array( 'wpsm_tournaments', 'wpsm_matchs' ), $args );

	}

	/**
	 * Add team typologies Taxonomy
	 * it's for sport who have multiple team inside like Baseball / Softball
	 *
	 */
	public static function add_typologies() {

		$labels = array(
			'name'              => _x( "Typologies" , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( "Typologie", 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . "Typologies", 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . "Typologies", 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . "Typologie", 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . "Typologie" . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . "Typologie", 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . "Typologie", 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . "Typologie", 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . "Typologie" .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( "Typologie", 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_typology' ),
		);

		register_taxonomy( 'wpsm_typology', array( 'wpsm_teams' ), $args );

	}

	/**
	 * Add team Seasons Taxonomy
	 * it's for sport who have multiple team inside like Baseball / Softball
	 *
	 */
	public static function add_seasons() {

		$labels = array(
			'name'              => _x( "Seasons" , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( "Season", 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . "Seasons", 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . "Seasons", 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . "Season", 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . "Season" . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . "Season", 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . "Season", 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . "Season", 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . "Season" .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( "Season", 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_season' ),
		);

		register_taxonomy( 'wpsm_season', array( 'wpsm_matchs' ), $args );

	}

	/**
	 * Add team Seasons Taxonomy
	 * it's for sport who have multiple team inside like Baseball / Softball
	 *
	 */
	public static function add_members_typology() {

		$labels = array(
			'name'              => _x( "Members typologies" , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( "Members typology", 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . "Members typologies", 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . "Members typologies", 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . "Members typology", 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . "Members typology" . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . "Members typology", 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . "Members typology", 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . "Members typology", 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . "Members typology" .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( "Members typology", 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_members_typology' ),
		);

		register_taxonomy( 'wpsm_members_typology', array( 'wpsm_members' ), $args );

	}

	/**
	 * Add places Taxonomy
	 * it's for sport who have multiple team inside like Baseball / Softball
	 *
	 */
	public static function add_places() {

		$labels = array(
			'name'              => _x( "Places" , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( "Place", 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . "Places", 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . "Places", 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . "Place", 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . "Place" . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . "Place", 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . "Place", 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . "Place", 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . "Place" .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( "Place", 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_place' ),
		);

		register_taxonomy( 'wpsm_place', array( 'wpsm_opponents', 'wpsm_tournaments', 'wpsm_matchs', 'wpms_trainings' ), $args );

	}

	/**
	 * Add opponents Club Taxonomy
	 * it's for sport who have multiple team inside like Baseball / Softball
	 *
	 */
	public static function add_clubs() {

		$labels = array(
			'name'              => _x( "Club" , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( "Club", 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search Club', 'wp-sports-manager' ),
			'all_items'         => __( 'All Club', 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent Club', 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent Club :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit Club', 'wp-sports-manager' ),
			'update_item'       => __( 'Update Club', 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New Club', 'wp-sports-manager' ),
			'new_item_name'     => __( 'New Club Name', 'wp-sports-manager' ),
			'menu_name'         => __( "Club", 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_clubs' ),
		);

		register_taxonomy( 'wpsm_clubs', array( 'wpsm_opponents' ), $args );

	}

	public static function remove_taxonomies() {

	}

}
