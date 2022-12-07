<?php
$term          = isset( $args['term'] ) ? $args['term'] : [];
$post_per_page = get_option('posts_per_page');
$paged = get_query_var('page',1);
$orderby = 'title';
$order = isset($_REQUEST['order'])?$_REQUEST['order']:'ASC';
$qry_options = [
	'post_type' => 'product',
	'posts_per_page' => $post_per_page,
	'paged' => $paged,
	'orderby'   => $orderby,
	'order'     => $order,
] ;

if ( $term ) {
	$qry_options['tax_query'] = [
		[
			'taxonomy' => 'product-category',
			'terms'    => $term->term_id,
			'field'    => 'term_id',
		],
	];
	$qry_options['orderby'] = $orderby;
}
query_posts($qry_options );
if ( have_posts() ):
	
	?>
    <div class="products-content">
        <div class="products-wrapper d-flex flex-wrap">
			<?php while ( have_posts() ) : the_post(); ?>
                <?php
				if ( empty( $term ) ) {
					$terms = wp_get_post_terms( get_the_ID(),'product-category');
					if ( $terms ) {
						$term = reset( $terms );
					}
				}
                ?>
                <div class="product-item">
                    <div class="product-block">
                        <div class="image-block">
                            <div class="image">
								<a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>"></a>
                            </div>
                            <div class="hover-block d-flex flex-wrap justify-content-center align-items-center align-content-center">
								<a href="<?php echo get_the_permalink() ?>" class="hover-block-link"></a>
                                <h6><?php echo $term->name ?></h6>
                                <p><?php the_excerpt(); ?> </p>
                            </div>
                        </div>
                        <div class="product-name-block">
                            <h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h4>
                        </div>
                    </div>
                </div>
			<?php endwhile; ?>
        
        </div>
    </div>
<?php
else:
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
