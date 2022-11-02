<?php

function dpg_scripts() {
	wp_enqueue_style( 'dpg-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dpg-style', 'rtl', 'replace' );
	
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), time() );
	wp_enqueue_style( 'custom.css', get_template_directory_uri() . '/assets/css/custom.css', array(), time() );
	
	wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/jquery-3.6.1.min.js', array(), time() );
	wp_enqueue_script( 'dpg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), time() );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), time() );
	
	wp_localize_script('custom-js','siteConfig',array(
		'ajaxURL'=>admin_url('admin-ajax.php'),
		'ajax_nonce'=>wp_create_nonce('loadmore_post_nonce'),
	));
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dpg_scripts' );
