<?php
/* Template Name: News */
get_header(); ?>

<?php get_template_part( 'template-parts/parts/banner', '', [ 'wrapper_class' => 'inner-page-banner-section', 'image_class' => 'banner-image', 'content_class' => 'inner-banner-content' ] ) ?>
    
    <section class="latest-blog-section py-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>The Latest Updates from DPG</h2>
            </div>
            <div class="blogs-wrapper">
				<?php
				set_query_var( 'per_page', 4 );
				get_template_part( 'template-parts/parts/front-page/latest', 'blogs-section' )
				?>
            </div>
            <div class="load-more pt-70 text-center">
                <button type="button" class="btn">Load more</button>
            </div>
        </div>
    </section>

<?php get_footer(); ?>