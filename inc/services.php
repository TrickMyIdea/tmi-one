<?php
add_action( 'init', 'tmiCreateServicesPost' );
/**
 * Register a Service post type.
 */
function tmiCreateServicesPost() {
	$labels = array(
		'name'               => _x( 'Services', 'post type general name', 'tmi' ),
		'singular_name'      => _x( 'Service', 'post type singular name', 'tmi' ),
		'menu_name'          => _x( 'Services', 'admin menu', 'tmi' ),
		'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'tmi' ),
		'add_new'            => _x( 'Add New', 'Service', 'tmi' ),
		'add_new_item'       => __( 'Add New Service', 'tmi' ),
		'new_item'           => __( 'New Service', 'tmi' ),
		'edit_item'          => __( 'Edit Service', 'tmi' ),
		'view_item'          => __( 'View Service', 'tmi' ),
		'all_items'          => __( 'All Services', 'tmi' ),
		'search_items'       => __( 'Search Services', 'tmi' ),
		'parent_item_colon'  => __( 'Parent Services:', 'tmi' ),
		'not_found'          => __( 'No Services found.', 'tmi' ),
		'not_found_in_trash' => __( 'No Services found in Trash.', 'tmi' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'tmi' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes')
	);
	register_post_type( 'tmi-service', $args );
}
