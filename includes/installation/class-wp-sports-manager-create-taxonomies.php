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

		$pluriel = "Typologies";
		$single = "Typologie";

		$labels = array(
			'name'              => _x( $pluriel , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( $single, 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . $pluriel, 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . $pluriel, 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . $single, 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . $single . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . $single, 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . $single, 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . $single, 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . $single .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( $single, 'wp-sports-manager' ),
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

		$pluriel = "Seasons";
		$single = "Season";

		$labels = array(
			'name'              => _x( $pluriel , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( $single, 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . $pluriel, 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . $pluriel, 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . $single, 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . $single . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . $single, 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . $single, 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . $single, 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . $single .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( $single, 'wp-sports-manager' ),
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

		$pluriel = "Members typologies";
		$single = "Members typology";

		$labels = array(
			'name'              => _x( $pluriel , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( $single, 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . $pluriel, 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . $pluriel, 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . $single, 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . $single . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . $single, 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . $single, 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . $single, 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . $single .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( $single, 'wp-sports-manager' ),
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

		$pluriel = "Places";
		$single = "Place";

		$labels = array(
			'name'              => _x( $pluriel , 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( $single, 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search ' . $pluriel, 'wp-sports-manager' ),
			'all_items'         => __( 'All ' . $pluriel, 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent ' . $single, 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent ' . $single . ' :', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit ' . $single, 'wp-sports-manager' ),
			'update_item'       => __( 'Update ' . $single, 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New ' . $single, 'wp-sports-manager' ),
			'new_item_name'     => __( 'New ' . $single .' Name', 'wp-sports-manager' ),
			'menu_name'         => __( $single, 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => 'wpsm_place' ),
		);

		register_taxonomy( 'wpsm_place', array( 'wpsm_opponents', 'wpsm_tournaments', 'wpsm_matchs', 'wpms_trainings' ), $args );

	}

	public static function remove_taxonomies() {

	}

}
