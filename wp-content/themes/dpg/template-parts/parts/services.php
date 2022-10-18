<section class="our-features d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="wrapper d-flex justify-content-between">
			<?php if ( have_rows( 'services' ) ) {
				while ( have_rows( 'services' ) ) {
					the_row();
					?>
                    <div class="feature-item">
                        <div class="icon-block d-flex justify-content-center align-items-center">
                            <img src="<?php echo get_sub_field( 'service_image' ) ? : '#' ?>" alt="<?php echo get_sub_field('service_title') ?>">
                        </div>
                        <div class="content-block text-center">
							<?php
							if ( $service_title = get_sub_field( 'service_title' ) ) {
								?>
                                <h5><?php echo $service_title ?></h5>
								<?php
							}
							if ( $service_link = get_sub_field( 'service_link' ) ) {
								?>
                                <a href="<?php echo isset( $service_link['url'] ) ? $service_link['url'] : '#' ?>" target="<?php echo isset( $service_link['target'] ) ? $service_link['target'] : '_self' ?>">
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