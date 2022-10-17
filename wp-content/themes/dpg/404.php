<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package DPG
 */

get_header();
?>

	<section class="error-404 py-70">
		<div class="container">
			<div class="not-found-block text-center" style="background-image: url(https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/comming-soon-bg.jpg);">
				<h3>Something Went Wrong</h3>
				<h1><?php esc_html_e( '404', 'dpg' ); ?></h1>
				<a href="<?php echo get_site_url(); ?>" class="btn">Back to Home</a>
			</div>
		</div>
	</section>

<?php
get_footer();
