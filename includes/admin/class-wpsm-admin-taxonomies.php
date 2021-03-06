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
class WP_Sports_Manager_Admin_Taxonomies {


	/**
	 * Default values
	 *
	 *
	 */
	protected $latitude = '40';
	protected $longitude = "-70";
	protected $address = "";

	/**
	 * Default option name prefix
	 *
	 *
	 *
	 */
	protected $option_prefix = 'wpsm_options_';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    	0.0.1
	 * @param      string    $plugin_name The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {
		add_action( 'wpsm_place_add_form_fields', array( &$this, 'add_wpsm_place_fields' ) );
		add_action( 'wpsm_place_edit_form_fields', array( $this, 'edit_wpsm_place_fields' ), 10, 1 );
		add_action( 'edited_wpsm_place', array( $this, 'save_fields' ), 10, 1 );
		add_action( 'create_wpsm_place', array( $this, 'save_fields' ), 10, 1 );

		// add_action('category_edit_form_fields','category_edit_form_fields');
		// add_action('category_edit_form', 'category_edit_form');
		// add_action('category_add_form_fields','category_edit_form_fields');
		// add_action('category_add_form','category_edit_form');
	}

	/**
	 * Add wpsm place fields.
	 *
	 * @access public
	 * @return void
	 */
	public function add_wpsm_place_fields() {

		$args = array(
			'orderby' 		=> 'id',
			'order' 		=> 'DESC',
			'hide_empty' 	=> false,
			'number' 		=> 1,
		);

		// Get latitude and longitude from the last added venue
		$terms = get_terms( 'wpsm_place', $args );
		if ( $terms && array_key_exists( 0, $terms) && is_object( reset( $terms ) ) ){

			$term = reset( $terms );
	 		$t_id = $term->term_id;
			$term_meta = get_option( "taxonomy_$t_id" );

			/**
			 * Assign values 
			 *
			 *
			 */

			$address = wpsm_array_to_value( $term_meta, $this->option_prefix . 'address', $this->address );
			$latitude = wpsm_array_to_value( $term_meta, $this->option_prefix . 'latitude', $this->latitude );
			$longitude = wpsm_array_to_value( $term_meta, $this->option_prefix . 'longitude', $this->longitude );

		}else{

			$address = $this->address;
			$latitude = $this->latitude;
			$longitude = $this->longitude;

		};
		?>

		<div class="form-field">
			<label for="term_meta[<?=$this->option_prefix?>address]"><?php _e( 'Address', 'wp-sports-manager' ); ?></label>
			<input type="text" class="wpsm_itext wpsm_itext-admin" name="term_meta[<?=$this->option_prefix?>address]" id="term_meta[<?=$this->option_prefix?>address]" value="<?php echo esc_attr( $address ); ?>">
			<p><?php _e( "Address is used by your public or opponent to found you. Be most precise.", 'wp-sports-manager' ); ?></p>
		</div>
		<div class="form-field">
			<label for="term_meta[<?=$this->option_prefix?>latitude]"><?php _e( 'Latitude', 'wp-sports-manager' ); ?></label>
			<input type="text" class="wpsm_itext wpsm_itext-admin" name="term_meta[<?=$this->option_prefix?>latitude]" id="term_meta[<?=$this->option_prefix?>latitude]" value="<?php echo esc_attr( $latitude ); ?>">
		</div>
		<div class="form-field">
			<label for="term_meta[<?=$this->option_prefix?>longitude]"><?php _e( 'Longitude', 'wp-sports-manager' ); ?></label>
			<input type="text" class="wpsm_itext wpsm_itext-admin" name="term_meta[<?=$this->option_prefix?>longitude]" id="term_meta[<?=$this->option_prefix?>longitude]" value="<?php echo esc_attr( $longitude ); ?>">
		</div>
	<?php
	}


	/**
	 * Edit wpsm place fields.
	 *
	 * @access public
	 * @param mixed $term Term (category) being edited
	 */
	public function edit_wpsm_place_fields( $term ) {

	 	$t_id = $term->term_id;
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?=$this->option_prefix?>address]"><?php _e( 'Address', 'wp-sports-manager' ); ?></label></th>
			<td>
				<input type="text" class="wpsm_itext wpsm_itext-admin" name="term_meta[<?=$this->option_prefix?>address]" id="term_meta[<?=$this->option_prefix?>address]" value="<?php echo esc_attr( $term_meta[ $this->option_prefix . 'address'] ) ? esc_attr( $term_meta[ $this->option_prefix . 'address'] ) : ''; ?>">
				<p><?php _e( "Address is used by your public or opponent to found you. Be most precise.", 'wp-sports-manager' ); ?></p>
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?=$this->option_prefix?>latitude]"><?php _e( 'Latitude', 'wp-sports-manager' ); ?></label></th>
			<td>
				<input type="text" class="wpsm_itext wpsm_itext-admin" name="term_meta[<?=$this->option_prefix?>latitude]" id="term_meta[<?=$this->option_prefix?>latitude]" value="<?php echo esc_attr( $term_meta[ $this->option_prefix . 'latitude'] ) ? esc_attr( $term_meta[ $this->option_prefix . 'latitude'] ) : ''; ?>">
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="term_meta[<?=$this->option_prefix?>longitude]"><?php _e( 'Longitude', 'wp-sports-manager' ); ?></label></th>
			<td>
				<input type="text" class="wpsm_itext wpsm_itext-admin" name="term_meta[<?=$this->option_prefix?>longitude]" id="term_meta[<?=$this->option_prefix?>longitude]" value="<?php echo esc_attr( $term_meta[ $this->option_prefix . 'longitude'] ) ? esc_attr( $term_meta[ $this->option_prefix . 'longitude'] ) : ''; ?>">
			</td>
		</tr>
	<?php

	}


	/**
	 * Save fields.
	 *
	 * @access public
	 * @param mixed $term_id Term ID being saved
	 * @return void
	 */
	public function save_fields( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][ $key ] ) ) {
					$term_meta[$key] = $_POST['term_meta'][ $key ];
				}
			}
			update_option( "taxonomy_$t_id", $term_meta );
		}
	}

}