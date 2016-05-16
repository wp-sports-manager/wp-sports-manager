<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
class WP_Sports_Manager_Admin_Matchs_Fields {

	/**
	 * Add box to Matchs CPT
	 *
	 * @since    0.0.1
	 */
	public function __construct() {
		add_action( 'cmb2_admin_init', array( &$this,'add_meta_boxs') );
		// self::add_meta_boxs();
	}

	public static function add_meta_boxs() {

			$prefix = WPSM_PREFIX . 'matchs_';

			/**
			 * Sample metabox to demonstrate each field type included
			 */
			$cmb_demo = new_cmb2_box( array(
				'id'            => $prefix . 'metabox',
				'title'         => __( 'Test Metabox', 'cmb2' ),
				'object_types'  => array( 'wpsm_matchs', ), // Post type
				// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
				// 'context'    => 'normal',
				'priority'   => 'high',
				// 'show_names' => true, // Show field names on the left
				// 'cmb_styles' => false, // false to disable the CMB stylesheet
				// 'closed'     => true, // true to keep the metabox closed by default
			) );

			// This field depend of typology
			$cmb_demo->add_field( array(
				'name'    => __( 'Team', 'cmb2' ),
				'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
				'id'      => 'attached_cmb2_attached_posts_team',
				'type'    => 'custom_teams_match',
				'options' => array(
					'show_thumbnails' => true, // Show thumbnails on the left
					'filter_boxes'    => true, // Show a text box for filtering the results
					'query_args'      => array( 'post_type' => 'wpsm_teams' ), // override the get_posts args
				)
			) );

			// This field depend of typology
			$cmb_demo->add_field( array(
				'name'    => __( 'Opponents', 'cmb2' ),
				'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
				'id'      => 'attached_cmb2_attached_teams_match',
				'type'    => 'custom_teams_match',
				'options' => array(
					'show_thumbnails' => true, // Show thumbnails on the left
					'filter_boxes'    => true, // Show a text box for filtering the results
					'query_args'      => array( 'post_type' => array('wpsm_teams','wpsm_opponents') ), // override the get_posts args
				)
			) );

		
	}

}