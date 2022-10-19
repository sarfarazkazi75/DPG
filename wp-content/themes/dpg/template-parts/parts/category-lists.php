<ul>
	<?php
	$terms           = isset($args['terms'])?$args['terms']:array();
	$current_term_id = isset($args['current_term_id'])?$args['current_term_id']:0;
	if ( $terms ) {
		foreach ( $terms as $term ) {
			?>
            <li><a class="<?php echo ( $term->term_id == $current_term_id ) ? 'active' : '' ?>" href="<?php echo get_term_link( $term->term_id ) ?>"><?php echo ucwords( $term->name ) ?></a></li>
			<?php
		}
	}
	?>
</ul>

