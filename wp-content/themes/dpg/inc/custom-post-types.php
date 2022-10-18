<?php

/**
 * Register a custom post type
 */
function custom_post_type_init() {
	$faq_post = [
		"label"               => __( "Faq", "dpg" ),
		"labels"              => [
			"name"                  => __( "Faq", "dpg" ),
			"singular_name"         => __( "Faq", "dpg" ),
			"featured_image"        => __( "Faq", "dpg" ),
			"set_featured_image"    => __( "Set Faq Poster", "dpg" ),
			"remove_featured_image" => __( "Remove Faq Poster", "dpg" ),
			"use_featured_image"    => __( "Use Faq Poster", "dpg" ),
		],
		"public"              => true,
		"publicly_queryable"  => true,
		"show_ui"             => true,
		"show_in_rest"        => false,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"exclude_from_search" => false,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"menu_icon"           => "dashicons-media-document",
		"rewrite"             => [ "slug" => "faq", "with_front" => true ],
		"query_var"           => true,
		"supports"            => [ "title", "editor", "thumbnail", "excerpt" ],
		'taxonomies'          => [ 'faq_cat' ],
	];
	register_post_type( "faq", $faq_post );
	
	$labels = [
		'name'              => _x( 'Faq Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Faq Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Faq Categories', "dpg" ),
		'all_items'         => __( 'All Faq Categories', "dpg" ),
		'parent_item'       => __( 'Parent Faq Categories', "dpg" ),
		'parent_item_colon' => __( 'Parent Faq Categories:', "dpg" ),
		'edit_item'         => __( 'Edit Faq Categories', "dpg" ),
		'update_item'       => __( 'Update Faq Categories', "dpg" ),
		'add_new_item'      => __( 'Add Faq Category', "dpg" ),
		'new_item_name'     => __( 'New Category Name', "dpg" ),
		'menu_name'         => __( 'Faq Category', "dpg" ),
	];
	
	$args = [
		"public"             => true,
		"publicly_queryable" => false,
		'hierarchical'       => true,
		'labels'             => $labels,
		'show_ui'            => true,
		'show_admin_column'  => true,
		'query_var'          => true,
		'rewrite'            => [ 'slug' => 'faq_cat' ],
	];
	register_taxonomy( 'faq_cat', [ 'faq' ], $args );
	
	
	$products_post = [
		"label"               => __( "Products", "dpg" ),
		"labels"              => [
			"name"                  => __( "Product", "dpg" ),
			"singular_name"         => __( "Product", "dpg" ),
			"featured_image"        => __( "Product", "dpg" ),
			"set_featured_image"    => __( "Set Product Poster", "dpg" ),
			"remove_featured_image" => __( "Remove Product Poster", "dpg" ),
			"use_featured_image"    => __( "Use Product Poster", "dpg" ),
		],
		"public"              => true,
		"publicly_queryable"  => true,
		"show_ui"             => true,
		"show_in_rest"        => false,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"exclude_from_search" => false,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"menu_icon"           => "dashicons-media-document",
		"rewrite"             => [ "slug" => "product", "with_front" => true ],
		"query_var"           => true,
		"supports"            => [ "title", "editor", "thumbnail", "excerpt" ],
		'taxonomies'          => [ 'product_cat' ],
	];
	register_post_type( "product", $products_post );
	
	$labels = [
		'name'              => _x( 'Product Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories', "dpg" ),
		'all_items'         => __( 'All Product Categories', "dpg" ),
		'parent_item'       => __( 'Parent Product Categories', "dpg" ),
		'parent_item_colon' => __( 'Parent Product Categories:', "dpg" ),
		'edit_item'         => __( 'Edit Product Categories', "dpg" ),
		'update_item'       => __( 'Update Product Categories', "dpg" ),
		'add_new_item'      => __( 'Add Product Category', "dpg" ),
		'new_item_name'     => __( 'New Category Name', "dpg" ),
		'menu_name'         => __( 'Product Category', "dpg" ),
	];
	
	$args = [
		"public"             => true,
		"publicly_queryable" => false,
		'hierarchical'       => true,
		'labels'             => $labels,
		'show_ui'            => true,
		'show_admin_column'  => true,
		'query_var'          => true,
		'rewrite'            => [ 'slug' => 'product_cat' ],
	];
	register_taxonomy( 'product_cat', [ 'product' ], $args );
	
}

add_action( 'after_setup_theme', 'custom_post_type_init' );


