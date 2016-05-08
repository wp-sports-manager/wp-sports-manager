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
class WP_Sports_Manager_Admin_Matchs_Fields {

	/**
	 * Add box to Matchs CPT
	 *
	 * @since    0.0.1
	 */
	public function __construct() {
		add_action( 'cmb2_admin_init', array( &$this,'add_meta_boxs') );
		// self::add_meta_boxs();
	}

	public static function add_meta_boxs() {

			$prefix = 'wpsm_';

			/**
			 * Sample metabox to demonstrate each field type included
			 */
			$cmb_demo = new_cmb2_box( array(
				'id'            => $prefix . 'metabox',
				'title'         => __( 'Test Metabox', 'cmb2' ),
				'object_types'  => array( 'wpsm_matchs', ), // Post type
				// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
				// 'context'    => 'normal',
				'priority'   => 'high',
				// 'show_names' => true, // Show field names on the left
				// 'cmb_styles' => false, // false to disable the CMB stylesheet
				// 'closed'     => true, // true to keep the metabox closed by default
			) );

			// This field depend of typology
			$cmb_demo->add_field( array(
				'name'    => __( 'Team', 'cmb2' ),
				'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
				'id'      => 'attached_cmb2_attached_posts_team',
				'type'    => 'custom_teams_match',
				'options' => array(
					'show_thumbnails' => true, // Show thumbnails on the left
					'filter_boxes'    => true, // Show a text box for filtering the results
					'query_args'      => array( 'post_type' => 'wpsm_teams' ), // override the get_posts args
				)
			) );

			// This field depend of typology
			$cmb_demo->add_field( array(
				'name'    => __( 'Opponents', 'cmb2' ),
				'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
				'id'      => 'attached_cmb2_attached_teams_match',
				'type'    => 'custom_teams_match',
				'options' => array(
					'show_thumbnails' => true, // Show thumbnails on the left
					'filter_boxes'    => true, // Show a text box for filtering the results
					'query_args'      => array( 'post_type' => array('wpsm_teams','wpsm_opponents') ), // override the get_posts args
				)
			) );

			// // This field depend of typology
			// $cmb_demo->add_field( array(
			// 	'name'    => __( 'Opponent', 'cmb2' ),
			// 	'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
			// 	'id'      => 'attached_cmb2_attached_posts_opponent',
			// 	'type'    => 'custom_attached_posts',
			// 	'options' => array(
			// 		'show_thumbnails' => true, // Show thumbnails on the left
			// 		'filter_boxes'    => true, // Show a text box for filtering the results
			// 		'query_args'      => array( 'post_type' => 'wpsm_opponents' ), // override the get_posts args
			// 	)
			// ) );

			$cmb_demo->add_field( array(
				'name'       => __( 'Test Text', 'cmb2' ),
				'desc'       => __( 'field description (optional)', 'cmb2' ),
				'id'         => $prefix . 'text',
				'type'       => 'text',
				// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
				// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
				// 'on_front'        => false, // Optionally designate a field to wp-admin only
				// 'repeatable'      => true,
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Text Small', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textsmall',
				'type' => 'text_small',
				// 'repeatable' => true,
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Text Medium', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textmedium',
				'type' => 'text_medium',
				// 'repeatable' => true,
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Website URL', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Text Email', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
				// 'repeatable' => true,
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Time', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'time',
				'type' => 'text_time',
				// 'time_format' => 'H:i', // Set to 24hr format
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Time zone', 'cmb2' ),
				'desc' => __( 'Time zone', 'cmb2' ),
				'id'   => $prefix . 'timezone',
				'type' => 'select_timezone',
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Date Picker', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textdate',
				'type' => 'text_date',
				// 'date_format' => 'Y-m-d',
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Date Picker (UNIX timestamp)', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textdate_timestamp',
				'type' => 'text_date_timestamp',
				// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'datetime_timestamp',
				'type' => 'text_datetime_timestamp',
			) );

			// This text_datetime_timestamp_timezone field type
			// is only compatible with PHP versions 5.3 or above.
			// Feel free to uncomment and use if your server meets the requirement
			// $cmb_demo->add_field( array(
			// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'cmb2' ),
			// 	'desc' => __( 'field description (optional)', 'cmb2' ),
			// 	'id'   => $prefix . 'datetime_timestamp_timezone',
			// 	'type' => 'text_datetime_timestamp_timezone',
			// ) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Money', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textmoney',
				'type' => 'text_money',
				// 'before_field' => '£', // override '$' symbol if needed
				// 'repeatable' => true,
			) );

			$cmb_demo->add_field( array(
				'name'    => __( 'Test Color Picker', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'colorpicker',
				'type'    => 'colorpicker',
				'default' => '#ffffff',
				// 'attributes' => array(
				// 	'data-colorpicker' => json_encode( array(
				// 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
				// 	) ),
				// ),
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Text Area', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textarea',
				'type' => 'textarea',
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Text Area Small', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textareasmall',
				'type' => 'textarea_small',
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Text Area for Code', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'textarea_code',
				'type' => 'textarea_code',
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Title Weeeee', 'cmb2' ),
				'desc' => __( 'This is a title description', 'cmb2' ),
				'id'   => $prefix . 'title',
				'type' => 'title',
			) );

			$cmb_demo->add_field( array(
				'name'             => __( 'Test Select', 'cmb2' ),
				'desc'             => __( 'field description (optional)', 'cmb2' ),
				'id'               => $prefix . 'select',
				'type'             => 'select',
				'show_option_none' => true,
				'options'          => array(
					'standard' => __( 'Option One', 'cmb2' ),
					'custom'   => __( 'Option Two', 'cmb2' ),
					'none'     => __( 'Option Three', 'cmb2' ),
				),
			) );

			$cmb_demo->add_field( array(
				'name'             => __( 'Test Radio inline', 'cmb2' ),
				'desc'             => __( 'field description (optional)', 'cmb2' ),
				'id'               => $prefix . 'radio_inline',
				'type'             => 'radio_inline',
				'show_option_none' => 'No Selection',
				'options'          => array(
					'standard' => __( 'Option One', 'cmb2' ),
					'custom'   => __( 'Option Two', 'cmb2' ),
					'none'     => __( 'Option Three', 'cmb2' ),
				),
			) );

			$cmb_demo->add_field( array(
				'name'    => __( 'Test Radio', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'radio',
				'type'    => 'radio',
				'options' => array(
					'option1' => __( 'Option One', 'cmb2' ),
					'option2' => __( 'Option Two', 'cmb2' ),
					'option3' => __( 'Option Three', 'cmb2' ),
				),
			) );

			$cmb_demo->add_field( array(
				'name'     => __( 'Test Taxonomy Radio', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'text_taxonomy_radio',
				'type'     => 'taxonomy_radio',
				'taxonomy' => 'category', // Taxonomy Slug
				// 'inline'  => true, // Toggles display to inline
			) );

			$cmb_demo->add_field( array(
				'name'     => __( 'Test Taxonomy Select', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'taxonomy_select',
				'type'     => 'taxonomy_select',
				'taxonomy' => 'category', // Taxonomy Slug
			) );

			$cmb_demo->add_field( array(
				'name'     => __( 'Test Taxonomy Multi Checkbox', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'multitaxonomy',
				'type'     => 'taxonomy_multicheck',
				'taxonomy' => 'post_tag', // Taxonomy Slug
				// 'inline'  => true, // Toggles display to inline
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Checkbox', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'checkbox',
				'type' => 'checkbox',
			) );

			$cmb_demo->add_field( array(
				'name'    => __( 'Test Multi Checkbox', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'multicheckbox',
				'type'    => 'multicheck',
				// 'multiple' => true, // Store values in individual rows
				'options' => array(
					'check1' => __( 'Check One', 'cmb2' ),
					'check2' => __( 'Check Two', 'cmb2' ),
					'check3' => __( 'Check Three', 'cmb2' ),
				),
				// 'inline'  => true, // Toggles display to inline
			) );

			$cmb_demo->add_field( array(
				'name'    => __( 'Test wysiwyg', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'Test Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'image',
				'type' => 'file',
			) );

			$cmb_demo->add_field( array(
				'name'         => __( 'Multiple Files', 'cmb2' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'cmb2' ),
				'id'           => $prefix . 'file_list',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			) );

			$cmb_demo->add_field( array(
				'name' => __( 'oEmbed', 'cmb2' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
				'id'   => $prefix . 'embed',
				'type' => 'oembed',
			) );

			$cmb_demo->add_field( array(
				'name'         => 'Testing Field Parameters',
				'id'           => $prefix . 'parameters',
				'type'         => 'text',
				'before_row'   => 'yourprefix_before_row_if_2', // callback
				'before'       => '<p>Testing <b>"before"</b> parameter</p>',
				'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
				'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
				'after'        => '<p>Testing <b>"after"</b> parameter</p>',
				'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
			) );

			/**
			 * Repeatable Field Groups
			 */
			$cmb_group = new_cmb2_box( array(
				'id'           => $prefix . 'metabox',
				'title'        => __( 'Repeating Field Group', 'cmb2' ),
				'object_types' => array( 'wpsm_matchs', ),
			) );

			// $group_field_id is the field id string, so in this case: $prefix . 'demo'
			$group_field_id = $cmb_group->add_field( array(
				'id'          => $prefix . 'demo',
				'type'        => 'group',
				'description' => __( 'Generates reusable form entries', 'cmb2' ),
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Entry', 'cmb2' ),
					'remove_button' => __( 'Remove Entry', 'cmb2' ),
					'sortable'      => true, // beta
					// 'closed'     => true, // true to have the groups closed by default
				),
			) );

			/**
			 * Group fields works the same, except ids only need
			 * to be unique to the group. Prefix is not needed.
			 *
			 * The parent field's id needs to be passed as the first argument.
			 */
			$cmb_group->add_group_field( $group_field_id, array(
				'name'       => __( 'Entry Title', 'cmb2' ),
				'id'         => 'title',
				'type'       => 'text',
				// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
			) );

			$cmb_group->add_group_field( $group_field_id, array(
				'name'        => __( 'Description', 'cmb2' ),
				'description' => __( 'Write a short description for this entry', 'cmb2' ),
				'id'          => 'description',
				'type'        => 'textarea_small',
			) );

			$cmb_group->add_group_field( $group_field_id, array(
				'name' => __( 'Entry Image', 'cmb2' ),
				'id'   => 'image',
				'type' => 'file',
			) );

			$cmb_group->add_group_field( $group_field_id, array(
				'name' => __( 'Image Caption', 'cmb2' ),
				'id'   => 'image_caption',
				'type' => 'text',
			) );

		
	}

}