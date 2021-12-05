<?php

/**
 * The admin-specific functionality of the plugin.
 */
class Slgf_Admin {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		
	}

	public function enqueue_scripts() {
		
	}

	public function register_post_type(){

		$labels = array(
			'name'               => __( 'Customers', 'slgf' ),
			'singular_name'      => __( 'Customer', 'slgf' ),
			'add_new'            => _x( 'Add New Customer', 'slgf', 'slgf' ),
			'add_new_item'       => __( 'Add New Customer', 'slgf' ),
			'edit_item'          => __( 'Edit Customer', 'slgf' ),
			'new_item'           => __( 'New Customer', 'slgf' ),
			'view_item'          => __( 'View Customer', 'slgf' ),
			'search_items'       => __( 'Search Customers', 'slgf' ),
			'not_found'          => __( 'No Customers found', 'slgf' ),
			'not_found_in_trash' => __( 'No Customers found in Trash', 'slgf' ),
			'parent_item_colon'  => __( 'Parent Customer:', 'slgf' ),
			'menu_name'          => __( 'Customers', 'slgf' ),
		);
	
		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'description',
			'taxonomies'          => array('category', 'post_tag'),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => null,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
				'page-attributes',
			)
		);
	
		register_post_type( 'customer', $args );

	}

}
