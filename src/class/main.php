<?php
/**
 * Main class which initializes the activation and other functions.
 */

class SukeInv {

    public function __construct() {
        add_action( 'init', array( $this, 'create_inv_type' ) );
    }

    public static function activate() {
        /**
         * Activation functions for the plugin. 
         * */
    }

    public function create_inv_type() {
        /**
         * Function to Register a custom post type 'Invoice' 
         * */
        $labels = array(
			'name'               => 'Invoice',
			'singular_name'      => 'Invoice',
			'menu_name'          => 'Invoice',
			'name_admin_bar'     => 'Invoice',
			'archives'           => 'Invoice' . ' Archives',
			'attributes'         => 'Invoice' . ' Attributes',
			'parent_item_colon'  => 'Parent Item:',
			'all_items'          => 'All ' . 'Invoice',
			'add_new_item'       => 'Add New ' . 'Invoice',
			'add_new'            => 'Add New',
			'new_item'           => 'New ' . 'Invoice',
			'edit_item'          => 'Edit ' . 'Invoice',
			'update_item'        => 'Update ' . 'Invoice',
			'view_item'          => 'View ' . 'Invoice',
			'view_items'         => 'View ' . 'Invoice',
			'search_items'       => 'Search ' . 'Invoice',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in Trash',
		);

		/**
		 * Supported CMS fields
		 */
		$supports = array(
			'title',
			'author',
			'thumbnail',
			'editor',
			'excerpt',
		);

		/**
		 * Supported taxonomies
		 */
		$taxonomies = array(
			'category',
			'post_tag',
		);

		/**
		 * Rewrite base
		 */
		$rewrite = array(
			'slug'       => 'invoices',
			'with_front' => false,
			'feeds'      => true,
		);

        $args = array(
			'label'               => 'Invoice',
			'description'         => 'Invoice' . ' post type',
			'labels'              => $labels,
			'supports'            => $supports,
			'taxonomies'          => $taxonomies,
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-video',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
			'rest_base'           => 'invoice',
		);

        register_post_type( 'invoice', $args );
    }
}