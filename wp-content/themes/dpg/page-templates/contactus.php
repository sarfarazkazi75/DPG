<?php
/* Template Name: Contact Us */
get_header(); ?>

<?php get_template_part( 'template-parts/parts/banner', '', [ 'wrapper_class' => 'inner-page-banner-section', 'image_class' => 'banner-image', 'content_class' => 'inner-banner-content' ] ) ?>
    
    <section class="contact-form-section py-80">
        <div class="container">
            <div class="section-title text-center">
                <p><?php echo get_field( 'contact_us_description' ) ?></p>
            </div>
            <div class="form-block">
				<?php echo do_shortcode( '[contact-form-7 id="78" title="Contact Us"]' ); ?>
            </div>
        </div>
    </section>
    
    <section class="contact-map-section pb-80">
        <div class="container">
            <div class="wrapper d-flex flex-wrap align-items-center">
                <div class="col-6">
                    <div class="content-block">
						<?php echo get_field( 'contact_us_left_description' ) ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="map-block">
						<?php echo get_field( 'contact_us_map_code' ) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="addresses-section pb-80">
        <div class="container">
            <div class="wrapper d-flex flex-wrap">
				<?php if ( have_rows( 'contact_us_bottom_addresses' ) ) {
					while ( have_rows( 'contact_us_bottom_addresses' ) ) {
						the_row();
						$address_title = get_sub_field( 'address_title' );
						$address_description = get_sub_field( 'address_description' );
						?>
                        <div class="add-item">
                            <div class="add-block">
                                <h5><?php echo $address_title ?></h5>
                                <?php
                                echo $address_description;
                                ?>
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