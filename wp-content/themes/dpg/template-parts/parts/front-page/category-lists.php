<section class="home-products-section py-70">
    <div class="container">
        <div class="section-title text-center">
            <h2><?php echo get_field('category_list_title') ?></h2>
        </div>
        <div class="products-wrapper d-flex flex-wrap">
			<?php
			$args = [
				'taxonomy'     => 'product-category',
				'orderby'      => 'meta_value_num',
				'order'        => 'ASC',
				'hide_empty'   => false,
				'hierarchical' => false,
				'parent'       => 0,
				'meta_query'   => [
					[
						'key'  => 'term_order',
						'type' => 'NUMERIC',
					],
				],
			];
			
			$terms = get_terms( $args );
			if ( $terms ) {
				foreach ( $terms as $term ) {
					get_template_part( 'template-parts/parts/category', 'block', [ 'term_id' => $term->term_id, 'taxonomy' => 'product-category', 'term' => $term ] );
				}
			}
			?>
        </div>
    </div>
</section>