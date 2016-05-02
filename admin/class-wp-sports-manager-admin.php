<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sportsmanager.club
 * @since      0.0.1
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/admin
 * @author     David Massiani davidmassianirennes@gmail.com
 */
class WP_Sports_Manager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-sports-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-sports-manager-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Homepage view
	 * @since 0.0.1
	 *
	 */
	public static function dashboard() {
		include 'views/wpsm-dashboard.php';
	}

	/**
	 * Matchs view
	 * @since 0.0.1
	 *
	 */
	public static function matchs() {
		include 'views/wpsm-matchs.php';
	}

	/**
	 * Matchs view
	 * @since 0.0.1
	 *
	 */
	public static function teams() {
		include 'views/wpsm-teams.php';
	}

	/**
	 * Trainings view
	 * @since 0.0.1
	 *
	 */
	public static function trainings() {
		include 'views/wpsm-trainings.php';
	}

	/**
	 * Tournaments view
	 * @since 0.0.1
	 *
	 */
	public static function tournaments() {
		include 'views/wpsm-tournaments.php';
	}

	/**
	 * Tournaments view
	 * @since 0.0.1
	 *
	 */
	public static function settings() {
		include 'views/wpsm-settings.php';
	}

}
