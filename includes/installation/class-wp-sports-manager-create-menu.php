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
class WP_Sports_Manager_Create_Menu {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    		The version of this plugin.
	 */

	/**
	 * Ordering menu
	 *
	 */
	protected $order = [
		"dashboard" 		=> 30,
		"matchs" 			=> 31,
		"trainings" 		=> 32,
		"tournaments" 		=> 33,
		"teams" 			=> 34,
		"members" 			=> 35,
		"opponents" 		=> 36,
	];

	public function __construct() {
	}

	/**
	 * Add menu item
	 */
	public function admin_menu() {
		global $menu;

		if ( current_user_can( 'manage_wp_sports_manager' ) )
			$menu[] = array( '', 'read', 'separator-wpsportsmanager', '', 'wp-menu-separator wpsportsmanager' );



		$main_page = add_menu_page( 
			__( 'Sports Manager', 'wp-sports-manager' ), 	// page title
				'Sports Manager', 							// menu title
				'manage_options', 							// capability
				'wp-sports-manager', 						// menu slug
				array( &$this, 'dashboard' ), 				// callback function
				null, 										// icon url
				$this->order['dashboard']					// position in the menu
		);

		/**
		 * Dashboard menu
		 * 
		 */
				$dashboard_page = add_submenu_page( 

					'wp-sports-manager', 							// parent slug
					__('Dashboard',' wp-sports-manager'), 			// page title
					__('Dashboard', 'wp-sports-manager'), 			// menu title
						'manage_options', 							// capability
						'wp-sports-manager',						// menu slug (same slug for erase duplicate 'WP Sports Manager' item menu)
						array( &$this, 'dashboard' )	 			// callback function

				); 

		/**
		 * Settings menu
		 *
		 */
				$settings_page = add_submenu_page( 

					'wp-sports-manager',
					__('Settings',' wp-sports-manager'), 
					__('Settings', 'wp-sports-manager'), 
						'manage_options', 
						'wpsm-settings',
						array( &$this, 'settings' )	

				); 


		/**
		 * Matchs menu
		 *
		 */
		$matchs_page = add_menu_page( 
			__('Matchs',' wp-sports-manager'), 
			__('Matchs', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-matchs',
				array( &$this, 'matchs' ),
				null,
				$this->order['matchs']	
		); 

				/**
				 * Add Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-matchs',
					__('Add'), 
					__('Add'), 
						'edit_posts', 
						'post-new.php?post_type=wpsm_matchs'

				); 

				/**
				 * Add Competitions
				 *
				 */
				add_submenu_page( 

					'wpsm-matchs',
					__('Competitions', 'wp-sports-manager'), 
					__('Competitions', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_competition&post_type=wpsm_matchs'

				); 

				/**
				 * Add seasons
				 *
				 */
				add_submenu_page( 

					'wpsm-matchs',
					__('Seasons', 'wp-sports-manager'), 
					__('Seasons', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_season&post_type=wpsm_matchs'

				); 

				/**
				 * Add places
				 *
				 */
				add_submenu_page( 

					'wpsm-matchs',
					__('Places', 'wp-sports-manager'), 
					__('Places', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_place&post_type=wpsm_matchs'

				); 

				/**
				 * Settings Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-matchs',
					__('Settings',' wp-sports-manager'), 
					__('Settings', 'wp-sports-manager'), 
						'manage_options', 
						'wpsm-settings-matchs',
						array( &$this, 'settingsMatchs' )

				); 

		/**
		 * Teams menu
		 *
		 */
		$teams_page = add_menu_page( 

			__('Teams',' wp-sports-manager'), 
			__('Teams', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-teams',
				array( &$this, 'teams' ),	
				'dashicons-groups',
				$this->order['teams']	
		); 
				/**
				 * Add Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-teams',
					__('Add'), 
					__('Add'), 
						'edit_posts', 
						'post-new.php?post_type=wpsm_teams'

				); 
				/**
				 * Settings Teams
				 *
				 */
				add_submenu_page( 

					'wpsm-teams',
					__('Settings',' wp-sports-manager'), 
					__('Settings', 'wp-sports-manager'), 
						'manage_options', 
						'wpsm-settings',
						array( &$this, 'settingsTeams' )

				); 
		/**
		 * Trainings menu
		 *
		 */
		$trainings_page = add_menu_page( 

			__('Trainings',' wp-sports-manager'), 
			__('Trainings', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-trainings',
				array( &$this, 'trainings' ),	
				null,
				$this->order['trainings']	
		); 

				/**
				 * Add Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-trainings',
					__('Add'), 
					__('Add'), 
						'edit_posts', 
						'post-new.php?post_type=wpsm_trainings'

				); 

				/**
				 * Add seasons
				 *
				 */
				add_submenu_page( 

					'wpsm-trainings',
					__('Seasons', 'wp-sports-manager'), 
					__('Seasons', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_season&post_type=wpsm_trainings'

				); 

				/**
				 * Add places
				 *
				 */
				add_submenu_page( 

					'wpsm-trainings',
					__('Places', 'wp-sports-manager'), 
					__('Places', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_place&post_type=wpsm_trainings'

				); 

				/**
				 * Settings Trainings
				 *
				 */
				add_submenu_page( 

					'wpsm-trainings',
					__('Settings',' wp-sports-manager'), 
					__('Settings', 'wp-sports-manager'), 
						'manage_options', 
						'wpsm-settings',
						array( &$this, 'settingsTrainings' )

				); 

		/**
		 * Tournaments menu
		 *
		 */
		$tournaments_page = add_menu_page( 

			__('Tournaments',' wp-sports-manager'), 
			__('Tournaments', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-tournaments',
				array( &$this, 'tournaments' ),
				'dashicons-networking',
				$this->order['tournaments']	
		); 

				/**
				 * Add Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-tournaments',
					__('Add'), 
					__('Add'), 
						'edit_posts', 
						'post-new.php?post_type=wpsm_tournaments'

				); 

				/**
				 * Add Competitions
				 *
				 */
				add_submenu_page( 

					'wpsm-tournaments',
					__('Competitions', 'wp-sports-manager'), 
					__('Competitions', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_competition&post_type=wpsm_tournaments'

				); 

				/**
				 * Add seasons
				 *
				 */
				add_submenu_page( 

					'wpsm-tournaments',
					__('Seasons', 'wp-sports-manager'), 
					__('Seasons', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_season&post_type=wpsm_tournaments'

				); 

				/**
				 * Add places
				 *
				 */
				add_submenu_page( 

					'wpsm-tournaments',
					__('Places', 'wp-sports-manager'), 
					__('Places', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_place&post_type=wpsm_tournaments'

				); 

				/**
				 * Settings Tournaments
				 *
				 */
				add_submenu_page( 

					'wpsm-tournaments',
					__('Settings',' wp-sports-manager'), 
					__('Settings', 'wp-sports-manager'), 
						'manage_options', 
						'wpsm-settings',
						array( &$this, 'settingsTournaments' )

				); 

		/**
		 * Opponents menu
		 *
		 */
		$opponents_page = add_menu_page( 

			__('Opponents',' wp-sports-manager'), 
			__('Opponents', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-opponents',
				array( &$this, 'opponents' ),	
				'dashicons-shield-alt',
				$this->order['opponents']	
		); 

				/**
				 * Add Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-opponents',
					__('Add'), 
					__('Add'), 
						'edit_posts', 
						'post-new.php?post_type=wpsm_opponents'

				); 

				/**
				 * Add places
				 *
				 */
				add_submenu_page( 

					'wpsm-opponents',
					__('Places', 'wp-sports-manager'), 
					__('Places', 'wp-sports-manager'),
						'edit_posts', 
						'edit-tags.php?taxonomy=wpsm_place&post_type=wpsm_opponents'

				); 

		/**
		 * Members menu
		 *
		 */
		$members_page = add_menu_page( 

			__('Club Members',' wp-sports-manager'), 
			__('Club Members', 'wp-sports-manager'), 
				'manage_options', 
				'wpsm-members',
				array( &$this, 'members' ),	
				'dashicons-id-alt',
				$this->order['members']	
		); 
				/**
				 * Add Matchs
				 *
				 */
				add_submenu_page( 

					'wpsm-members',
					__('Add'), 
					__('Add'), 
						'edit_posts', 
						'post-new.php?post_type=wpsm_members'

				); 
				/**
				 * Settings Teams
				 *
				 */
				add_submenu_page( 

					'wpsm-members',
					__('Settings',' wp-sports-manager'), 
					__('Settings', 'wp-sports-manager'), 
						'manage_options', 
						'wpsm-members',
						array( &$this, 'settingsMembers' )

				); 

	}

	/**
	 * Add Admin Homepage
	 */
	public function dashboard() {
		WP_Sports_Manager_Admin::dashboard();
	}

		/**
		 * View Admin Settings
		 */
		public function settings() {
			WP_Sports_Manager_Admin::settings();
		}

	/**
	 * View Admin Matchs
	 */
	public function matchs() {
		WP_Sports_Manager_Admin::matchs();
	}

		/**
		 * View Admin Settings
		 */
		public function settingsMatchs() {
			WP_Sports_Manager_Admin::settings();
		}

	/**
	 * View Admin Matchs
	 */
	public function teams() {
		WP_Sports_Manager_Admin::teams();
	}

		/**
		 * View Admin Settings
		 */
		public function settingsTeams() {
			WP_Sports_Manager_Admin::settings();
		}
	
	/**
	 * View Admin Matchs
	 */
	public function trainings() {
		WP_Sports_Manager_Admin::trainings();
	}

		/**
		 * View Admin Settings
		 */
		public function settingsTrainings() {
			WP_Sports_Manager_Admin::settings();
		}
	
	/**
	 * View Admin Tournaments
	 */
	public function tournaments() {
		WP_Sports_Manager_Admin::tournaments();
	}

		/**
		 * View Admin Settings
		 */
		public function settingsTournaments() {
			WP_Sports_Manager_Admin::settings();
		}

	/**
	 * View Admin Opponents
	 */
	public function opponents() {
		WP_Sports_Manager_Admin::opponents();
	}

		/**
		 * View Admin Settings
		 */
		public function settingsOpponents() {
			WP_Sports_Manager_Admin::settings();
		}

	/**
	 * View Admin Members
	 */
	public function members() {
		WP_Sports_Manager_Admin::members();
	}

		/**
		 * View Admin Members Settings
		 */
		public function settingsMembers() {
			WP_Sports_Manager_Admin::settings();
		}
	

}
