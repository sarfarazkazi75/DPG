<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DPG
 */

get_header();
$object     = get_queried_object();
$categories = get_the_category();
$category   = reset( $categories );

?>
    
    <section class="single-product py-80">
        <div class="container">
            <div class="title-block">
                <h2><?php the_title() ?></h2>
            </div>
            <div class="single-product-wrapper d-flex flex-wrap">
                <div class="product-media-wrapper">
                    <div class="product-main-images">
						<?php
						$gallery = get_field( '_product_image_gallery' );
						$size    = 'full';
						if ( is_string( $gallery ) ) {
							$gallery_explode = explode( ',', $gallery );
							if ( $gallery_explode ) {
								$gallery = [];
								$i       = 0;
								foreach ( $gallery_explode as $single_int ) {
									$gallery[ $i ]['url']                = wp_get_attachment_image_url( $single_int, 'full' );
									$gallery[ $i ]['sizes']['thumbnail'] = wp_get_attachment_image_url( $single_int );
									$i ++;
								}
							}
						}
						
						?>
						<?php if ( $gallery ): ?>
							<?php foreach ( $gallery as $image ): ?>
                                <div class="image-item">
                                    <div class="image-block">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
                                    </div>
                                </div>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                    <div class="product-thumbnails-image">
						<?php if ( $gallery ): ?>
							<?php foreach ( $gallery as $image ): ?>
                                <div class="image-item">
                                    <div class="image-block">
                                        <img src="<?php echo esc_url( $image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
                                    </div>
                                </div>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
                <div class="product-info-wrapper">
					<?php
					the_content();
					?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="product-desc-tabs pb-70">
        <div class="container">
            <div class="pdt-block">
                <ul class="tabs">
                    <li class="tab-item" data-tab-index="technical">
                        <a href="javascript:void(0)" class="tab-link active">Technical</a>
                    </li>
                    <li class="tab-item" data-tab-index="options">
                        <a href="javascript:void(0)" class="tab-link">Options</a>
                    </li>
                    <li class="tab-item" data-tab-index="code">
                        <a href="javascript:void(0)" class="tab-link">Code</a>
                    </li>
                    <li class="tab-item" data-tab-index="pdf">
                        <a href="javascript:void(0)" class="tab-link">PDF</a>
                    </li>
                </ul>
                <div class="tabs-content">
                    <div class="content-block">
                        <div class="tabs-content-item" id="technical" style="display: block">
                            <div class="content">
								<?php echo get_field( 'technical_information' ) ? : __( 'Details not available...' ); ?>
                            </div>
                        </div>
                        <div class="tabs-content-item" id="options">
                            <div class="content">
								<?php echo get_field( 'options_informations' ) ? : __( 'Details not available...' ); ?>
                            </div>
                        </div>
                        <div class="tabs-content-item" id="code">
                            <div class="content">
								<?php echo get_field( 'code_informations' ) ? : __( 'Details not available...' ); ?>
                            </div>
                        </div>
                        <div class="tabs-content-item" id="pdf">
                            <div class="content">
								<?php echo get_field( 'pdf_information' ) ? : __( 'Details not available...' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
// get_sidebar();
get_footer();
