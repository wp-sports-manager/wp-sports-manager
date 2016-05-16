<?php

if ( ! defined( 'ABSPATH' ) ){
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
class WP_Sports_Manager_Admin_Members {

	public static $prefix;
	
	/**
	 * Add box to Matchs CPT
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		self::$prefix =  WPSM_PREFIX . 'members_';

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

		$private_profil = new_cmb2_box( array(
			'id'            => self::$prefix . 'private_profil',
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
			'id'   => self::$prefix . 'firstname',
			'desc' => __( 'used for login : firstname.lastname', 'wp-sports-manager' ),
			'type' => 'text'
		) );

		$private_profil->add_field( array(
			'name' => __( 'Last Name', 'wp-sports-manager' ),
			'desc' => __( 'used for login : firstname.lastname', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'lastname',
			'type' => 'text'
		) );

		$private_profil->add_field( array(
			'name'       => __( 'Nickname', 'wp-sports-manager' ),
			'id'         => self::$prefix . 'nickname',
			'type'       => 'text'
		) );

		$private_profil->add_field( array(
			'name' => __( 'Phone', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'phone',
			'type' => 'text'
		) );

		$private_profil->add_field( array(
			'name' => __( 'Email', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'email',
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
			'id'            => self::$prefix . 'player_profil',
			'title'         => __( 'Player profil', 'wp-sports-manager' ),
			'object_types'  => array( 'wpsm_members', ), // Post type
			'priority'   => 'high'
		) );

		$player_profil->add_field( array(
			'name'     => __( 'Role', 'wp-sports-manager' ),
			'id'       => self::$prefix . 'role',
			'type'     => 'taxonomy_multicheck_inline',
			'taxonomy' => 'wpsm_members_typology', // Taxonomy Slug
		    'text'      => array(
		        'no_terms_text' => __('Sorry, no terms could be found.', 'wp-sports-manager') // Change default text. Default: "No terms"
		    )
		) );

		$player_profil->add_field( array(
			'name' => __( 'Birthday', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'birthday',
			'type' => 'text_date',
			'desc' => str_replace('-','/',$date_format),
			'date_format' => $date_format,
			'attributes' => array(
			    'data-datepicker' => json_encode( array(
			        'yearRange' => '1950:'. date( 'Y' ),
			    ) ),
			),
		) );

		$player_profil->add_field( array(
			'name' => __( 'Arrival date', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'arrivalday',
			'type' => 'text_date',
			'desc' => str_replace('-','/',$date_format),
			'date_format' => $date_format,
			'attributes' => array(
			    'data-datepicker' => json_encode( array(
			        'yearRange' => '1950:'. date( 'Y' ),
			    ) ),
			),
		) );

		$player_profil->add_field( array(
			'name' => __( 'License Number', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'licensenumber',
			'type' => 'text'
		) );

		$player_profil->add_field( array(
			'name' => __( 'License validity', 'wp-sports-manager' ),
			'id'   => self::$prefix . 'licensevalidity',
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
			'id'   => self::$prefix . 'photo',
			'type' => 'file',
		) );

		/**
		 * Typologic fields
		 *
		 *
		 */
		if( get_option( '_wpsm_installed' ) ){
			$fields = WP_Sports_Typologic::add_profil_fields();
			if( count( $fields ) > 0 ){
				foreach ($fields as $field => $value) {
					$player_profil->add_field( $value );
				}
			}
		}

	}

	/** 
	 * remove metabox members : typologie
	 *
	 *
	 */
	public static function remove_metabox_members () {

		remove_meta_box('tagsdiv-wpsm_members_typology', 'wpsm_members', 'side' );
	        
	}


	/** 
	 * remove wpsm members columns
	 *
	 *
	 */
	public static function wpsm_members_remove_cpt_columns ( $columns ) {

		unset($columns['title']);
		unset($columns['author']);
		unset($columns['categories']);
		unset($columns['tags']);
		unset($columns['comments']);

		$new_columns = array(
			self::$prefix . 'firstname' => __('First name', 'wp-sports-manager'),
			self::$prefix . 'lastname' => __('Last name', 'wp-sports-manager'),
			self::$prefix . 'nickname' => __('Nickname', 'wp-sports-manager'),
			self::$prefix . 'phone' => __('Phone', 'wp-sports-manager'),
		);

    	return array_merge($columns, $new_columns);

	}


	/** 
	 * add custom columns for wpsm members
	 *
	 *
	 */
	public static function wpsm_members_content_columns($column_name) {
		//http://sports-manager.dev/wp-admin/post.php?post=289&amp;action=edit" aria-label="«&nbsp;veve&nbsp;» (Modifier)">veve</a>
		$text = get_post_meta( get_the_ID(), $column_name, true );
		// var_dump($text);
		echo '<a class="row-title" href="' . admin_url( 'post.php?post=' . get_the_ID() . '&amp;action=edit' ) . '" aria-label="«&nbsp;veve&nbsp;» (Modifier)">' . esc_html( $text ) . '</a>';
	}

	/** 
	 * add sortable columns
	 *
	 *
	 */
	public static function wpsm_members_column_register_sortable() {
		$columns[ self::$prefix . 'firstname' ] = self::$prefix . 'firstname';
		$columns[ self::$prefix . 'nickname' ] = self::$prefix . 'nickname';
		return $columns;
	}

	/**
	 * Teach Firstname order
	 *
	 *
	 */
	public static function wpsm_members_column_orderby( $vars ) {
		if ( isset( $vars['orderby'] ) && self::$prefix . 'firstname' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => self::$prefix . 'firstname'
			) );
		}
		if ( isset( $vars['orderby'] ) && self::$prefix . 'nickname' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => self::$prefix . 'nickname'
			) );
		}

		return $vars;
	}

}