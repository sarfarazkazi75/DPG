<?php
$array_defaults = [
    'term_id' => get_queried_object_id(),
	'taxonomy' => 'product_cat',
    'term' => get_queried_object(),
];
$term = $args['term'];
$args       = wp_parse_args( $args, $array_defaults );
$term_id    = $args['term_id'];
$acf_key    =  $term->taxonomy . '_' . $term->term_id;
$term_image = get_field( 'term_image',$acf_key );
$sub_title  = get_field( 'term_sub_title', $acf_key );
$term       = $args['term'];

?>
<div class="product-item">
    <div class="product-block">
        <div class="image-block">
            <div class="image">
                <img src="<?php echo ! empty( $term_image ) ? $term_image : '#' ?>" alt="<?php echo $term->term_name ?>">
            </div>
            <div class="hover-block d-flex flex-wrap justify-content-center align-items-center align-content-center">
                <h6>
					<?php echo $term->name ?>
					<?php
					if ( $sub_title ) {
						echo '(' . $sub_title . ')';
					}
					?>
                </h6>
				<?php
				if ( $term->description ) {
					echo '<p>' . $term->description . '</p>';
				}
				?>
            </div>
        </div>
        <div class="product-name-block">
            <h6>
                <a href="<?php echo get_term_link( $term ) ?>"><?php echo $term->name ?></a>
            </h6>
        </div>
    </div>
</div>