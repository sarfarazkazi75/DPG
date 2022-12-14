<?php
/**
 * DPG functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DPG
 */
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

define( "DPG_THEME_URL", trailingslashit( get_template_directory() ) );
define( "DPG_THEME_URI", trailingslashit( get_template_directory_uri() ) );

/**
 * Implement the Custom Header feature.
 */
require DPG_THEME_URL . 'inc/custom-header.php';

/**
 * Implement the Custom Header feature.
 */
require DPG_THEME_URL . 'inc/custom-post-types.php';

/**
 * Customizer additions.
 */
require DPG_THEME_URL . 'inc/customizer.php';

/**
 * Customizer additions.
 */
require DPG_THEME_URL . 'inc/dd-functions.php';

/**
 * Enqueue scripts and styles.
 */
require DPG_THEME_URL . 'inc/enqueue.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require DPG_THEME_URL . 'inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require DPG_THEME_URL . 'inc/template-tags.php';


function wpcf7_do_something ($WPCF7_ContactForm) {

//	dd($WPCF7_ContactForm);
	
}

//add_action("wpcf7_posted_data", "wpcf7_do_something");

include_once get_template_directory().'/inc/infinity-load-more.php';
$GLOBALS['Loadmore_Posts'] = new Loadmore_Posts();