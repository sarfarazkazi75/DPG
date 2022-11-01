<?php
/**
 * The template for displaying archive pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DPG
 */

get_header();
?>
<?php if ( have_posts() ) : ?>
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
	?>
    
    <section class="inner-page-banner-section">
        <div class="banner-image">
            <img src="<?php echo home_url() ?>/wp-content/uploads/2022/10/soft-wiring-banner.jpg" alt="">
        </div>
        <div class="inner-banner-content text-center d-flex justify-content-center align-items-center">
            <div class="container">
                <h1>Products</h1>
            </div>
        </div>
    </section>
	
	
	<?php get_template_part( 'template-parts/parts/services' ) ?>
    
    <section class="all-products-section">
        <div class="container">
            <div class="text-center">
                <h2>Soft Wiring & Ergonomic Solutions</h2>
            </div>
        </div>
        <div class="categories-list-wrap">
	        <?php get_template_part( 'template-parts/parts/category', 'lists', [ 'terms' => $terms ] ) ?>
        </div>
        
        <div class="products-list-wrap">
            <div class="container">
                <div class="products-list-wrap-inner">
                    <div class="products-row">
                        <div class="products-sidebar">
                            <div class="product-sidebar-title d-flex justify-content-between align-items-center">
                                <h5>Products</h5>
                                <i class="fal fa-angle-down"></i>
                            </div>
	                        <?php get_template_part( 'template-parts/parts/category', 'lists', [ 'terms' => $terms ] ) ?>
                        </div>
	                    <?php get_template_part( 'template-parts/content', 'product' ) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
get_footer();
