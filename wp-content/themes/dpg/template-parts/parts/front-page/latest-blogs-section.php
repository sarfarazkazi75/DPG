<?php
$per_page = get_query_var( 'per_page', 2 );
query_posts( [
	'posts_per_page' => $per_page,
] );
?>
<?php if ( have_posts() ): ?>
    <section class="latest-blog-section py-70">
        <div class="container">
            <div class="section-title text-center">
                <h2><?php echo get_field( 'latest_blogs_title' ) ?></h2>
            </div>
            <div class="blogs-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/latest', 'blogs' ) ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

