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
class WP_Sports_Manager_Modify_Menu {

	/** 
	 * Declaration of all menu taxo : post type
	 *
	 */
	public static $wpsm_taxotype = array(
		'matchs' => array( 'place', 'competition', 'season' ),
		'trainings' => array( 'season', 'place' ), 
		'tournaments' => array( 'competition', 'season', 'place' ), 
		'opponents' => array( 'place', 'clubs' )
	);

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    		The version of this plugin.
	 */

	public function __construct() {

		add_action( 'admin_head-edit-tags.php', array( &$this, 'submenu_highlighting_correction' ), 10, 2 );

	}

	/**
	 * Correction for highlight submenu
	 *
	 */
	public static function submenu_highlighting_correction()
	{


		$corrections = self::$wpsm_taxotype;
		foreach ( $corrections as $type => $taxos ){

			// add wpsm to type
		    $type = 'wpsm_' . $type;

			foreach ( $taxos as $taxo ){

				// add wpsm to taxo
		    	$taxo = 'wpsm_' . $taxo;

			    if( $taxo == $_GET['taxonomy'] && $type == $_GET['post_type'] )
			    {       

			        ?>
			        <script type="text/javascript">
			            jQuery(document).ready( function($) 
			            {
			                $("#menu-posts, #menu-posts a")
			                    .removeClass('wp-has-current-submenu')
			                    .removeClass('wp-menu-open')
			                    .addClass('wp-not-current-submenu'); 
			                $("#toplevel_page_<?=str_replace('_','-',$type)?>")
			                    .addClass('wp-has-current-submenu wp-has-menu wp-menu-open');
			                $("#toplevel_page_<?=str_replace('_','-',$type)?> > a")
			                    .addClass('wp-has-current-submenu wp-has-menu wp-menu-open');
			                $('#toplevel_page_<?=str_replace('_','-',$type)?> ul li a[href$="taxonomy=<?=$taxo?>&post_type=<?=$type?>"]')
			                    .addClass('current').parent().addClass('current');
			            });     
			        </script>
			        <?php
			    }
			}
		}

	}
	

}
