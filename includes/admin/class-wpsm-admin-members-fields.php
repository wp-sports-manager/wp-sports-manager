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
class WP_Sports_Manager_Admin_Members_Fields {

	/**
	 * Add box to Matchs CPT
	 *
	 * @since    0.0.1
	 */
	public function __construct() {
		add_action( 'cmb2_admin_init', array( &$this,'add_meta_boxs') );
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'sports/wpsm_' . $this->typology() . '.php';
	}

	/**
	 * Return the typology of sports
	 *
	 * @since    0.0.1
	 */
	public function typology() {
		// define selected sport :
		$this->typology = 'baseball';
		return $this->typology;
	}

	public static function add_meta_boxs() {

			$prefix = PREFIX;

			$private_profil = new_cmb2_box( array(
				'id'            => $prefix . 'private_profil',
				'title'         => __( 'Personal profil', 'wp-sports-manager' ),
				'object_types'  => array( 'wpsm_members', ), // Post type
				'priority'   => 'high'
			) );


			/**
			 * Personnal Profil
			 * - first name
			 * - last name
			 * - nickname
			 * - phone
			 * - email
			 */


			$private_profil->add_field( array(
				'name' => __( 'First Name', 'wp-sports-manager' ),
				'id'   => $prefix . 'firstname',
				'desc' => __( 'used for login : firstname.lastname', 'wp-sports-manager' ),
				'type' => 'text'
			) );

			$private_profil->add_field( array(
				'name' => __( 'Last Name', 'wp-sports-manager' ),
				'desc' => __( 'used for login : firstname.lastname', 'wp-sports-manager' ),
				'id'   => $prefix . 'lastname',
				'type' => 'text'
			) );

			$private_profil->add_field( array(
				'name'       => __( 'Nickname', 'wp-sports-manager' ),
				'id'         => $prefix . 'nickname',
				'type'       => 'text'
			) );

			$private_profil->add_field( array(
				'name' => __( 'Phone', 'wp-sports-manager' ),
				'id'   => $prefix . 'phone',
				'type' => 'text'
			) );

			$private_profil->add_field( array(
				'name' => __( 'Email', 'wp-sports-manager' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email'
			) );



			/**
			 * Player Profil
			 * - role
			 * - poste ( lié à la typologie du sport )
			 * - date de naissance
			 * - date d'arrivée dans le club
			 * - taille
			 * - poids ( non obligatoire )
			 * - Numéro de maillot
			 * - N° de licence
			 * - Photo de profil
			 * - Role admin
			 */
			$player_profil = new_cmb2_box( array(
				'id'            => $prefix . 'player_profil',
				'title'         => __( 'Player profil', 'wp-sports-manager' ),
				'object_types'  => array( 'wpsm_members', ), // Post type
				'priority'   => 'high'
			) );

			$player_profil->add_field( array(
				'name'     => __( 'Role', 'wp-sports-manager' ),
				'id'       => $prefix . 'role',
				'type'     => 'taxonomy_multicheck_inline',
				'taxonomy' => 'wpsm_members_typology', // Taxonomy Slug
			    'text'      => array(
			        'no_terms_text' => __('Sorry, no terms could be found.', 'wp-sports-manager') // Change default text. Default: "No terms"
			    )
			) );

			$player_profil->add_field( array(
				'name' => __( 'Birthday', 'wp-sports-manager' ),
				'id'   => $prefix . 'birthday',
				'type' => 'text_date',
				// 'date_format' => 'Y-m-d',
				'attributes' => array(
				    'data-datepicker' => json_encode( array(
				        'yearRange' => '1950:'. date( 'Y' ),
				    ) ),
				),
			) );

			$player_profil->add_field( array(
				'name' => __( 'Arrival date', 'wp-sports-manager' ),
				'id'   => $prefix . 'arrivalday',
				'type' => 'text_date',
				// 'date_format' => 'Y-m-d',
				'attributes' => array(
				    'data-datepicker' => json_encode( array(
				        'yearRange' => '1950:'. date( 'Y' ),
				    ) ),
				),
			) );

			$player_profil->add_field( array(
				'name' => __( 'License Number', 'wp-sports-manager' ),
				'id'   => $prefix . 'licensenumber',
				'type' => 'text'
			) );

			$player_profil->add_field( array(
				'name' => __( 'License validity', 'wp-sports-manager' ),
				'id'   => $prefix . 'licensevalidity',
				'desc' => __('until', 'wp-sports-manager'),
				'type' => 'text_date',
				'attributes' => array(
				    'data-datepicker' => json_encode( array(
				        'yearRange' => ( date( 'Y' ) - 2 ) . ':' . ( date( 'Y' ) + 10 ),
				    ) ),
				),
			) );

			$player_profil->add_field( array(
				'name' => __( 'Photo' ),
				'desc' => __( 'Upload an image or enter a URL.', 'wp-sports-manager' ),
				'id'   => $prefix . 'photo',
				'type' => 'file',
			) );

			/**
			 * Typologic fields
			 *
			 *
			 */
			$fields = WP_Sports_Typologic::add_profil_fields();
			if( count( $fields ) > 0 ){
				foreach ($fields as $field => $value) {
					$player_profil->add_field( $value );
				}
			}
	}

}