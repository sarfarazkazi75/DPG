<section class="our-features d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="wrapper d-flex justify-content-between">
			<?php if ( have_rows( 'services','option' ) ) {
				while ( have_rows( 'services','option' ) ) {
					the_row();
					?>
                    <div class="feature-item">
                        <div class="icon-block d-flex justify-content-center align-items-center">
                            <img src="<?php echo get_sub_field( 'service_image','option' ) ? : '#' ?>" alt="<?php echo get_sub_field('service_title','option') ?>">
                        </div>
                        <div class="content-block text-center">
							<?php
							if ( $service_title = get_sub_field( 'service_title','option' ) ) {
								?>
                                <h5><?php echo $service_title ?></h5>
								<?php
							}
							if ( $service_link = get_sub_field( 'service_link' ,'option') ) {
								?>
                                <a href="<?php echo isset( $service_link['url'] ) ? $service_link['url'] : '#' ?>" class="popup-open">
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