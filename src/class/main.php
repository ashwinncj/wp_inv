<?php
/**
 * Main class which initializes the activation and other functions.
 */

class SukeInv {

    public function __construct() {
        add_action( 'init', array( $this, 'create_inv_type' ) );
    }

    public static function activate() {

    }

    public function create_inv_type() {
        $labels = array(
			'name'               => self::PULURAL_NAME,
			'singular_name'      => self::SINGULAR_NAME,
			'menu_name'          => self::PULURAL_NAME,
			'name_admin_bar'     => self::SINGULAR_NAME,
			'archives'           => self::SINGULAR_NAME . ' Archives',
			'attributes'         => self::SINGULAR_NAME . ' Attributes',
			'parent_item_colon'  => 'Parent Item:',
			'all_items'          => 'All ' . self::PULURAL_NAME,
			'add_new_item'       => 'Add New ' . self::SINGULAR_NAME,
			'add_new'            => 'Add New',
			'new_item'           => 'New ' . self::SINGULAR_NAME,
			'edit_item'          => 'Edit ' . self::SINGULAR_NAME,
			'update_item'        => 'Update ' . self::SINGULAR_NAME,
			'view_item'          => 'View ' . self::SINGULAR_NAME,
			'view_items'         => 'View ' . self::PULURAL_NAME,
			'search_items'       => 'Search ' . self::SINGULAR_NAME,
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
			'slug'       => 'videos',
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