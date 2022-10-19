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
	$current_term_id = 0;
	$term            = [];
	$object          = get_queried_object();
	$args            = [
		'taxonomy'     => 'product_cat',
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
	$terms           = get_terms( $args );
	if ( isset( $object->term_id ) ) {
		$term            = $object;
		$current_term_id = $object->term_id;
	}
	$acf_key    = $term->taxonomy . '_' . $term->term_id;
	$term_image = get_field( 'term_image', $acf_key );
	$paged = isset($_REQUEST['paged'])?$_REQUEST['paged']:1;
	?>
    
    <section class="inner-page-banner-section">
        <div class="banner-image">
            <img src="<?php echo $term_image ?>" alt="<?php echo $term->name ?>">
        </div>
        <div class="inner-banner-content text-center d-flex justify-content-center align-items-center">
            <div class="container">
                <h1><?php echo $term->name ?></h1>
            </div>
        </div>
    </section>
    <section class="products-list py-80">
        <div class="container">
            <div class="product-info">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a> &nbsp;/&nbsp;&nbsp;</li>
                    <li><a href="#">Products</a> &nbsp;/&nbsp;&nbsp;</li>
                    <li><?php echo $term->name ?></li>
                </ul>
                <div class="content-bloc">
                    <p>
						<?php
						echo $term->description
						?>
                    </p>
                </div>
            </div>
            <div class="product-filter d-flex justify-content-end">
                <select class="filter" name="filter">
                    <option value="asc">Alphabate A-Z</option>
                    <option value="desc">Alphabate Z-A</option>
                </select>
            </div>
            
			<?php set_query_var('page',$paged); ?>
			<?php get_template_part( 'template-parts/content', 'product', [ 'term' => $object ] ) ?>
            
            <div class="load-more pt-70 text-center">
                <button type="button" class="btn">Load more</button>
            </div>
        </div>
    </section>
<?php
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
get_footer();
