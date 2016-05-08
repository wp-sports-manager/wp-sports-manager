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
class WP_Sports_Manager_Admin_Opponents_Fields {

	/**
	 * Add box to Opponents CPT
	 *
	 * @since    0.0.2
	 */
	public function __construct() {
		add_action( 'cmb2_admin_init', array( &$this,'add_meta_boxs_opponents') );
		add_filter( 'enter_title_here', array( &$this,'change_title')  );
	}

	/**
	 * Add fields using CMB2
	 *
	 *
	 */
	public static function add_meta_boxs_opponents() {

			$prefix = 'wpsm_opponent_metabox';

			$opponents_fields = new_cmb2_box( array(
				'id'            => $prefix,
				'title'         => __( 'Opponents informations', 'wp-sports-manager' ),
				'object_types'  => array( 'wpsm_opponents', ),
				'priority'   	=> 'high',
			) );

			$opponents_fields->add_field( array(
				'name' => __( 'Logo', 'wp-sports-manager' ),
				'desc' => __( 'Upload an image or enter a URL.', 'wp-sports-manager' ),
				'id'   => $prefix . '_logo',
				'type' => 'file',
			) );

			$opponents_fields->add_field(array(
				'name'      => __( 'City', 'wp-sports-manager' ),
				'desc' 		=> __( 'Drag the marker to set the exact location', 'wp-sports-manager'),
				'id' 		=> $prefix . '_location',
				'type' 		=> 'pw_map',
				'split_values' => false, // Save latitude and longitude as two separate fields
			));
		
	}

	function change_title( $title ){
		$screen = get_current_screen();
		if ( 'wpsm_opponents' == $screen->post_type ){
			$title = __( 'Name of your opponent', 'wp-sports-manager' );
		}
		return $title;
	}

}