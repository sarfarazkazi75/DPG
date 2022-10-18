<?php
/* Template Name: FAQs */
get_header(); ?>

<?php get_template_part( 'template-parts/parts/banner', '', [ 'wrapper_class' => 'inner-page-banner-section', 'image_class' => 'banner-image', 'content_class' => 'inner-banner-content' ] ) ?>
    
    <section class="faqs-section py-70">
        <div class="container">
            <div class="section-title text-center">
                <h2><?php echo get_the_title() ?></h2>
            </div>
            <div class="faqs-wrapper">
				
				<?php
				$faqs = get_posts( [
					'post_type'   => 'faq',
					'numberposts' => - 1,
					'post_status' => 'any',
					'orderby'     => 'date',
					'order'       => 'ASC',
				] );
				if ( $faqs ) {
					foreach ( $faqs as $faq ) {
						?>
                        <div class="faq-item">
                            <div class="faq-title d-flex flex-wrap align-items-center">
                                <h4><?php echo $faq->post_title ?></h4>
                                <span class="icon"></span>
                            </div>
                            <div class="faq-content">
                                <div class="content">
									<?php echo $faq->post_content ?>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>