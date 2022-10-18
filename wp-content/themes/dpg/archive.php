<?php
/**
 * The template for displaying archive pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DPG
 */

get_header();
?>
<?php if ( have_posts() ) : ?>
	<?php
	$object = get_queried_object();
	?>
    <section class="inner-page-banner-section">
        <div class="banner-image">
            <img src="<?php echo site_url(); ?>/wp-content/uploads/2022/10/aboutus-banner.jpg" alt="">
        </div>
        <div class="inner-banner-content text-center d-flex justify-content-center align-items-center">
            <div class="container">
                <h1><?php echo $object->name ?></h1>
            </div>
        </div>
    </section>
    <section class="latest-blog-section py-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>The Latest Updates from DPG</h2>
            </div>
            <div class="blogs-wrapper">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/latest', 'blogs' );
				endwhile;
				?>
            </div>
        </div>
    </section>
<?php
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
get_footer();
