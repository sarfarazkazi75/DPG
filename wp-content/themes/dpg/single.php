<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DPG
 */

get_header();
?>

	<main id="primary" class="site-main">


		<section class="inner-page-banner-section">
			<div class="banner-image">
				<?php dpg_post_thumbnail(); ?>
			</div>
			<div class="inner-banner-content text-center d-flex justify-content-center align-items-center">
				<div class="container">
					<h1>Mechanical Characteristics</h1>
				</div>
			</div>
		</section>

		<div class="main-blog-wrap">

			<div class="container">
			
				<div class="row">

					<div class="col-md-4">
						<div class="blog-sidebar">
							<div class="sidebar-title">
								<span>DPG formatting</span>
								<h4>DPG formatting News</h4>
							</div>

							<div class="sidebar-wrap">
								<div class="sidebar-wrap-inner">
									<h4>Categories</h4>
									<ul>
										<li><a href="#">Mechanical Characteristics</a></li>
									</ul>
								</div>

								<div class="sidebar-wrap-inner">
									<h4>Article Tags</h4>
									<ul>
										<li><a href="#">Power tower</a></li>
										<li><a href="#">Underground Utility Locating </a></li>
										<li><a href="#">Uncategorised </a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="blog-content-wrap">
							<?php
							while ( have_posts() ) :

								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Prev', 'dpg' ),
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'dpg' ),
									)
								);

								// If comments are open or we have at least one comment, load up the comment template.
								// if ( comments_open() || get_comments_number() ) :
								// 	comments_template();
								// endif;

							endwhile; // End of the loop.
							?>
						</div>
					</div>

				</div>

			</div>

		</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
