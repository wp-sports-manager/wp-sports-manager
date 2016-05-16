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
class WP_Sports_Manager_Admin_Teams {

	public static $prefix;

	/**
	 * Add box to Matchs CPT
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		self::$prefix = WPSM_PREFIX . 'teams_';

		add_action( 'cmb2_admin_init', array( &$this,'add_meta_boxs_fields') );
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'sports/wpsm_' . $this->typology() . '.php';
	}

	/**
	 * Return the typology of sports
	 * // CURRENT FAKE
	 * @since    0.0.1
	 */
	public function typology() {
		// define selected sport :
		$this->typology = 'baseball';
		return $this->typology;
	}

	public static function add_meta_boxs_fields() {

		// $date_format = get_option( 'date_format', 'm-d-Y' );
		$date_format = 'm/d/Y';

		$team_profil = new_cmb2_box( array(
			'id'            => self::$prefix . 'team_profil',
			'title'         => __( 'Team profil', 'wp-sports-manager' ),
			'object_types'  => array( 'wpsm_teams', ), // Post type
			'priority'   => 'high'
		) );


		/**
		 * Typologic fields
		 *
		 *
		 */
		if( get_option( '_wpsm_installed' ) ){
			$fields = WP_Sports_Typologic::add_teams_fields();
			if( count( $fields ) > 0 ){
				foreach ($fields as $field => $value) {
					$team_profil->add_field( $value );
				}
			}
		}

	}

	/** 
	 * remove metabox members : typologie
	 *
	 *
	 */
	public static function remove_metabox_teams () {

		remove_meta_box('tagsdiv-wpsm_typology', 'wpsm_teams', 'side' );
	        
	}


	/** 
	 * remove wpsm members columns
	 *
	 *
	 */
	public static function wpsm_teams_remove_cpt_columns ( $columns ) {


		// unset($columns['title']);
		// unset($columns['author']);
		// unset($columns['categories']);
		// unset($columns['tags']);
		// unset($columns['comments']);

		$new_columns = array(
			// $prefix . 'firstname' => __('First name', 'wp-sports-manager'),
			// $prefix . 'lastname' => __('Last name', 'wp-sports-manager'),
			// $prefix . 'nickname' => __('Nickname', 'wp-sports-manager'),
			// $prefix . 'phone' => __('Phone', 'wp-sports-manager'),
		);

    	return array_merge($columns, $new_columns);

	}


	/** 
	 * add custom columns for wpsm members
	 *
	 *
	 */
	public static function wpsm_teams_content_columns($column_name) {
		//http://sports-manager.dev/wp-admin/post.php?post=289&amp;action=edit" aria-label="«&nbsp;veve&nbsp;» (Modifier)">veve</a>
		$text = get_post_meta( get_the_ID(), $column_name, true );
		echo '<a class="row-title" href="' . admin_url( 'post.php?post=' . get_the_ID() . '&amp;action=edit' ) . '" aria-label="«&nbsp;veve&nbsp;» (Modifier)">' . esc_html( $text ) . '</a>';
	}

	/** 
	 * add sortable columns
	 *
	 *
	 */
	public static function wpsm_teams_column_register_sortable() {
		$columns[ self::$prefix . 'firstname' ] = self::$prefix . 'firstname';
		// $columns[ PREFIX . 'nickname' ] = PREFIX . 'nickname';
		return $columns;
	}

	/**
	 * Teach Firstname order
	 *
	 *
	 */
	public static function wpsm_teams_column_orderby( $vars ) {
		// if ( isset( $vars['orderby'] ) && PREFIX . 'firstname' == $vars['orderby'] ) {
		// 	$vars = array_merge( $vars, array(
		// 		'meta_key' => PREFIX . 'firstname'
		// 	) );
		// }
		// if ( isset( $vars['orderby'] ) && PREFIX . 'nickname' == $vars['orderby'] ) {
		// 	$vars = array_merge( $vars, array(
		// 		'meta_key' => PREFIX . 'nickname'
		// 	) );
		// }

		return $vars;
	}

}