<?php
function dd( $data = false, $flag = false, $display = false ) {
	if ( empty( $display ) ) {
		echo "<pre class='direct_display'>";
		if ( $flag == 1 ) {
			print_r( $data );
			die;
		} else {
			print_r( $data );
		}
		echo "</pre>";
	} else {
		echo "<div style='display:none' class='direct_display'><pre>";
		print_r( $data );
		echo "</pre></div>";
	}
}
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title'    => 'General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}

add_action( 'acf/include_field_types', 'dd_register_field_for_nav_menu' );
function dd_register_field_for_nav_menu() {
	include_once DPG_THEME_URL.'inc/nav-menu.php';
}

function func_current_year()
{
	ob_start();
	echo date('Y');
	return ob_get_clean();
}

add_shortcode('current-year', 'func_current_year');
