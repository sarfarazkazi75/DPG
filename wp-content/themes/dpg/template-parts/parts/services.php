<?php
 
 ?>
<section class="our-features d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="wrapper d-flex justify-content-between">
			<?php if ( have_rows( 'services', 'option' ) ) {
				while ( have_rows( 'services', 'option' ) ) {
					the_row();
					?>
                    <div class="feature-item">
                        <div class="icon-block d-flex justify-content-center align-items-center">
                            <img src="<?php echo get_sub_field( 'service_image', 'option' ) ? : '#' ?>" alt="<?php echo get_sub_field( 'service_title', 'option' ) ?>">
                        </div>
                        <div class="content-block text-center">
							<?php
							$service_link = get_sub_field( 'service_link', 'option' );
							
							if ($service_link) {
								?>
                                <a href="<?php echo isset( $service_link['url'] ) ? $service_link['url'] : '#' ?>" class="<?php echo $service_link['url'] == '#' ? 'popup-open' : '' ?>">
                                    <?php
                                    if ( $service_title = get_sub_field( 'service_title', 'option' ) ) {
	                                    ?>
                                        <h5 class="service-content-title"><?php echo $service_title ?></h5>
	                                    <?php
                                    }
                                    ?>
									<?php echo isset( $service_link['title'] ) ? $service_link['title'] : '' ?>
                                </a>
								<?php
							}
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