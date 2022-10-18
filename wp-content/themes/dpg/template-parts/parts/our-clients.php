<section class="our-clients-section py-60">
    <div class="container">
        <div class="section-title text-center">
            <h2><?php echo get_field( 'our_client_section_title','option' ) ?></h2>
        </div>
        <div class="our-clients-wrapper d-flex justify-content-between">
			<?php
			if ( have_rows( 'our_clients','option'  ) ) {
				while ( have_rows( 'our_clients' ,'option' ) ) {
					the_row();
					$client_image = get_sub_field( 'client_image','option'  );
					?>
                    <div class="oc-item">
                        <img src="<?php echo ! empty( $client_image ) ? $client_image : '' ?>"/>
                    </div>
					<?php
				}
			}
			?>
        </div>
    </div>
</section>