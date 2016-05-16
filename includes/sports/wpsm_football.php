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
class WP_Sports_Typologic {


	/**
	 * The name of typology
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	public static $name = 'Football';

	/**
	 * The name of taxonomy
	 *
	 */
	public static $taxo = 'wpsm_position';

	/**
	 * List of positions
	 *
	 *
	 */
	// public static $positions = array(
	// 	'pitcher' 		=> __( 'Pitcher', 'wp-sports-manager' ),
	// 	'catcher' 		=> __( 'Catcher', 'wp-sports-manager' ),
	// 	'firstbase'		=> __( 'First base', 'wp-sports-manager' ),
	// 	'secondbase'	=> __( 'Second base', 'wp-sports-manager' ),
	// 	'shortstop'		=> __( 'Short stop', 'wp-sports-manager' ),
	// 	'thirdbase'		=> __( 'Third base', 'wp-sports-manager' ),
	// 	'rightfield'	=> __( 'Right field', 'wp-sports-manager' ),
	// 	'centerfield'	=> __( 'Center field', 'wp-sports-manager' ),
	// 	'leftfield'		=> __( 'Left field', 'wp-sports-manager' )
	// );

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {
		add_action( 'init', array( &$this, 'create_position_taxonomy' ), 10, 2 );
		if ( is_admin() ) {
			add_action( 'admin_init', array( $this, 'add_positions_terms' ), 10, 2 );
			add_action( 'admin_init', array( $this, 'remove_taxo_widget' ), 10, 2 );
		}
	}	

	public static function get_name() {
		return self::$name;
	}

	/**
	 * Add competition Taxonomy
	 *
	 *
	 */
	public static function create_position_taxonomy() {

		$labels = array(
			'name'              => _x( 'Positions', 'taxonomy general name', 'wp-sports-manager' ),
			'singular_name'     => _x( 'Position', 'taxonomy singular name', 'wp-sports-manager' ),
			'search_items'      => __( 'Search Positions', 'wp-sports-manager' ),
			'all_items'         => __( 'All Positions', 'wp-sports-manager' ),
			'parent_item'       => __( 'Parent Position', 'wp-sports-manager' ),
			'parent_item_colon' => __( 'Parent Position:', 'wp-sports-manager' ),
			'edit_item'         => __( 'Edit Position', 'wp-sports-manager' ),
			'update_item'       => __( 'Update Position', 'wp-sports-manager' ),
			'add_new_item'      => __( 'Add New Position', 'wp-sports-manager' ),
			'new_item_name'     => __( 'New Position Name', 'wp-sports-manager' ),
			'menu_name'         => __( 'Position', 'wp-sports-manager' ),
		);

		$args = array(
			'labels'            => $labels,
			'rewrite'           => array( 'slug' => self::$taxo ),
		);

		register_taxonomy( self::$taxo , array( 'wpsm_members' ), $args );

	}

	/**
	 * Add terms taxo
	 *
	 *
	 */
	public static function add_positions_terms() {
		// $terms = self::$positions;

		$terms = array(
			'pitcher' 		=> __( 'Pitcher', 'wp-sports-manager' ),
			'catcher' 		=> __( 'Catcher', 'wp-sports-manager' ),
			'firstbase'		=> __( 'First base', 'wp-sports-manager' ),
			'secondbase'	=> __( 'Second base', 'wp-sports-manager' ),
			'shortstop'		=> __( 'Short stop', 'wp-sports-manager' ),
			'thirdbase'		=> __( 'Third base', 'wp-sports-manager' ),
			'rightfield'	=> __( 'Right field', 'wp-sports-manager' ),
			'centerfield'	=> __( 'Center field', 'wp-sports-manager' ),
			'leftfield'		=> __( 'Left field', 'wp-sports-manager' ),
			'attaquant'		=> __( 'Attaquant', 'wp-sports-manager' ),
		);

		if( ! get_option( '_wpsm_typology_populated' ) ){		
			foreach ($terms as $key => $value) {

				$term = term_exists( $value , self::$taxo );
				if ( $term === null ) {
					wp_insert_term(
						$value, // the term 
						self::$taxo // the taxonomy
					);
				}
				
			}
			add_option( '_wpsm_typology_populated', 'false' );
		}
		
	}

	/**
	 * Remove taxo widget
	 *
	 *
	 */
	public static function remove_taxo_widget() {
		remove_meta_box('tagsdiv-' . self::$taxo, 'wpsm_members', 'side' );
	}

	/** 
	 * Add fields profil
	 * 
	 *
	 */
	public static function add_profil_fields() {
		$prefix = WPSM_PREFIX . 'members_profil_';
		$fields = array(
			array(
				'name' => __( 'Size', 'wp-sports-manager' ),
				'id'   => $prefix . 'size',
				'type' => 'text_small'
			),
			array(
				'name' => __( 'Jersey Number', 'wp-sports-manager' ),
				'id'   => $prefix . 'jerseynumber',
				'type' => 'text_small'
			),
			array(
				'name'     => __( 'Position', 'wp-sports-manager' ),
				'id'       => $prefix . 'position',
				'type'     => 'taxonomy_multicheck',
				'taxonomy' => self::$taxo, // Taxonomy Slug
			    'text'      => array(
			        'no_terms_text' => __('Sorry, no terms could be found.', 'wp-sports-manager') // Change default text. Default: "No terms"
			    )
			)
		);

		return $fields;
	}

	/** 
	 * Add teams profil
	 * 
	 *
	 */
	public static function add_teams_fields() {
		$prefix = WPSM_PREFIX . 'members_teams_';
		$fields = array(
			array(
				'name' => __( 'Size', 'wp-sports-manager' ),
				'id'   => $prefix . 'size',
				'type' => 'text_small'
			),
		);

		return $fields;
	}


}

// new WP_Sports_Football();