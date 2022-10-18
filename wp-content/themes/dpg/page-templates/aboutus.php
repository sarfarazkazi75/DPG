<?php
/* Template Name: About Us */
get_header(); ?>

<?php get_template_part( 'template-parts/parts/banner', '', [ 'wrapper_class' => 'inner-page-banner-section', 'image_class' => 'banner-image', 'content_class' => 'inner-banner-content' ] ) ?>
    
    <section class="about-us-content pt-70">
        <div class="container">
            <div class="who-we-are">
                <h5><?php echo get_field( 'content_title' ) ?></h5>
				<?php echo get_field( 'content_description' ) ?>
            </div>
            <div class="about-icons-section wrapper d-flex justify-content-between">
				<?php if ( have_rows( 'about_services' ) ) {
					while ( have_rows( 'about_services' ) ) {
						the_row();
						$service_image = get_sub_field( 'service_image' );
						$service_title = get_sub_field( 'service_title' );
						?>
                        <div class="about-icons-item">
                            <div class="icon-block d-flex justify-content-center align-items-center">
                                <img src="<?php echo $service_image ?>" alt="<?php echo $service_title ?>">
                            </div>
                            <div class="content-block text-center">
                                <span><?php echo $service_title ?></span>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            
            </div>
            <div class="products-we-offer">
                <h5><?php echo get_field( 'product_we_offer_title' ) ?></h5>
				<?php echo get_field( 'products_we_offer_description' ) ?>
                <div class="product-images d-flex flex-wrap">
                    <div class="image-item d-flex">
                        <img src="<?php echo get_field( 'products_we_offer_images_left' ) ? : '#' ?>">
                    </div>
                    <div class="image-item d-flex">
                        <img src="<?php echo get_field( 'products_we_offer_images_right' ) ? : '#' ?>">
                    </div>
                </div>
            </div>
            <div class="intresting-facts">
                <h5><?php echo get_field( 'interesting_facts_title' ) ?></h5>
                <ul>
					<?php echo get_field( 'interesting_facts_desctiption' ) ?>
                </ul>
            </div>
        </div>
    </section>

<?php get_template_part( 'template-parts/parts/our', 'clients' ) ?>

<?php get_footer(); ?>