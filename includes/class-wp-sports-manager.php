<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://sportsmanager.club
 * @since      0.0.2
 *
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.0.2
 * @package    WP_Sports_Manager
 * @subpackage WP_Sports_Manager/includes
 * @author     David Massiani <me@davidmassiani.com>
 */
class WP_Sports_Manager {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      WP_Sports_Manager_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The settings.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      string    $settings    The settings.
	 */
	protected $settings;

	/**
	 * The typology.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      string    $typology    The typology.
	 */
	protected $typology;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function __construct() {

		$this->plugin_name = 'wp-sports-manager';
		$this->version = '0.0.2';

		// add_action( 'init', array( $this, 'load_dependencies' ) );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->create_custom_post_type();
		$this->create_custom_taxonomies();

		if ( is_admin() ) {
			$this->create_admin_menu();
			$this->admin_taxonomies_fields();
		}

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP_Sports_Manager_Loader. Orchestrates the hooks of the plugin.
	 * - WP_Sports_Manager_i18n. Defines internationalization functionality.
	 * - WP_Sports_Manager_Admin. Defines all hooks for the admin area.
	 * - WP_Sports_Manager_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-sports-manager-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-sports-manager-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-sports-manager-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-sports-manager-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-create-menu.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-modify-menu.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-create-custom-post-type.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/installation/class-wp-sports-manager-create-taxonomies.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions-wpsm.php';

		if ( is_admin() ) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin/class-wp-sports-manager-admin-taxonomies.php';
		}

		// if ( defined( 'DOING_AJAX' ) ) {
		// 	$this->ajax_includes();
		// }

		// if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {
		// 	$this->frontend_includes();
		// }

		$this->loader = new WP_Sports_Manager_Loader();

	}


	/**
	 * Create CPT
	 *
	 * Uses the WP_Sports_Manager_Create_Menu class in order to set the menu
	 * with WordPress.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function create_custom_post_type() {

		$createCustomPostType = new WP_Sports_Manager_Create_Custom_Post_Type();

		$this->loader->add_action( 'init', $createCustomPostType, 'add_team_cpt' );
		$this->loader->add_action( 'init', $createCustomPostType, 'add_match_cpt' );
		$this->loader->add_action( 'init', $createCustomPostType, 'add_opponent_cpt' );
		$this->loader->add_action( 'init', $createCustomPostType, 'add_training_cpt' );
		$this->loader->add_action( 'init', $createCustomPostType, 'add_tournaments_cpt' );
		$this->loader->add_action( 'init', $createCustomPostType, 'add_members_cpt' );

	}

	/**
	 * Create Taxonomies
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function create_custom_taxonomies() {

		$createCustomTaxonomies = new WP_Sports_Manager_Create_Taxonomies();

		$this->loader->add_action( 'init', $createCustomTaxonomies, 'add_competitions' );
		$this->loader->add_action( 'init', $createCustomTaxonomies, 'add_typologies' );
		$this->loader->add_action( 'init', $createCustomTaxonomies, 'add_seasons' );
		$this->loader->add_action( 'init', $createCustomTaxonomies, 'add_members_typology' );
		$this->loader->add_action( 'init', $createCustomTaxonomies, 'add_places' );
		$this->loader->add_action( 'init', $createCustomTaxonomies, 'add_clubs' );

	}	

	/**
	 * Create menu
	 *
	 * Uses the WP_Sports_Manager_Create_Menu class in order to set the menu
	 * with WordPress.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function create_admin_menu() {

		$create_menu = new WP_Sports_Manager_Create_Menu();
		$this->loader->add_action( 'admin_menu', $create_menu, 'admin_menu' );
		$menu_correction = new WP_Sports_Manager_Modify_Menu();

	}	


	/**
	 * Add WPSM Place fields
	 *
	 * @since 	0.0.1
	 * @access 	private
	 */
	private function admin_taxonomies_fields() {

		$admin_taxonomies = new WP_Sports_Manager_Admin_Taxonomies();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WP_Sports_Manager_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WP_Sports_Manager_i18n();
		$this->loader->add_action( 'init', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WP_Sports_Manager_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WP_Sports_Manager_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Return the typology of sports
	 *
	 * @since    0.0.1
	 */
	public function typology() {
		$this->typology = 'baseball';
		return $this->typology;
	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.0.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.0.1
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.0.1
	 * @return    WP_Sports_Manager_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.0.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
