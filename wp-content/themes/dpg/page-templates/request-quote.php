<?php
/* Template Name: Request Quote */
get_header(); ?>

<?php get_template_part( 'template-parts/parts/banner', '', [ 'wrapper_class' => 'inner-page-banner-section', 'image_class' => 'banner-image', 'content_class' => 'inner-banner-content' ] ) ?>
    
    <section class="contact-form-section py-80">
        <div class="container">
            <div class="section-title text-center">
                <p><?php echo get_field( 'contact_us_description' ) ?></p>
            </div>
            <div class="form-block">
				<?php echo do_shortcode( '[contact-form-7 id="14702" title="Create Request a Quote"]' ); ?>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>