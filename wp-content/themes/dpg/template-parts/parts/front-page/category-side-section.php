<section class="image-text-section">
	<?php if ( have_rows( 'category_section' ) ) {
		while ( have_rows( 'category_section' ) ) {
			the_row();
			$row_index = get_row_index();
			$position  = 'top';
			if ( $row_index % 2 == 0 ) {
				$position = 'bottom';
			}
			
			?>
            <div class="image-text-item d-flex flex-wrap">
                <div class="text-block d-flex flex-wrap align-content-center col-6">
                    <h2><?php echo get_sub_field( 'category_section_title' ) ?></h2>
                    <p><?php echo get_sub_field( 'category_section_description' ) ?></p>
                    
                    <div class="text-right">
						<?php
						if ( $category_section_image = get_field( 'category_section_image' ) ) {
							?>
                            <a href="<?php echo isset( $category_section_image['url'] ) ? $category_section_image['url'] : '#' ?>" class="btn"
                               target="<?php echo isset( $category_section_image['target'] ) ? $category_section_image['target'] : '_self' ?>"><?php echo isset( $category_section_image['title'] ) ? $category_section_image['title']
									: '' ?>
                            </a>
							<?php
						}
						?>
                    </div>
                </div>
                <div class="image-block col-6">
                    <div class="image d-flex">
                        <img src="<?php echo get_sub_field( 'category_section_image' ) ? : '#' ?>" alt="<?php echo get_sub_field( 'category_section_title' ) ?>">
                    </div>
                </div>
            </div>
			<?php
			
		}
	}
	?>
</section>
