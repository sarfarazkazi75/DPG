<?php
/**
 * LoadmorePosts
 *
 */

class Loadmore_Posts {
	
	public function __construct() {
		
		$this->setup_hooks();
	}
	
	public function setup_hooks() {
		add_action( 'wp_ajax_nopriv_load_more', [ $this, 'ajax_script_post_load_more' ] );
		add_action( 'wp_ajax_load_more', [ $this, 'ajax_script_post_load_more' ] );
		add_shortcode( 'post_listings', [ $this, 'post_script_load_more' ] );
	}
	
	public function post_script_load_more() {
		?>
        <div class="news-posts" id="news-posts">
			<?php
			$this->ajax_script_post_load_more( true );
			?>
        </div>
        <div class="load-more pt-70 text-center">
            <button id="load-more" data-page="1" class="load-more-btn btn">Load more</button>
        </div>
		<?php
	}
	
	public function ajax_script_post_load_more( bool $initial_request = false ) {
		if ( ! $initial_request && ! check_ajax_referer( 'loadmore_post_nonce', 'ajax_nonce', false ) ) {
			wp_send_json_error( __( 'Invalid security token sent.', 'text-domain' ) );
			wp_die( '0', 400 );
		}
		$is_ajax_request = ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest';
		
		$page_no         = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		
		$page_no         = ! empty( $_POST['page'] ) ? filter_var( $_POST['page'], FILTER_VALIDATE_INT ) + 1 : $page_no;
		
		$args            = [
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 4,
			'paged'          => $page_no,
		];
		
		$query           = new WP_Query( $args );
		
		if ( $query->have_posts() ):
			while ( $query->have_posts() ): $query->the_post();
				get_template_part( 'template-parts/latest', 'blogs' );
			endwhile;
			if ( ! $is_ajax_request ) :
				$total_pages = $query->max_num_pages;
				get_template_part( 'template-parts/pagination', NULL, [
					'total_pages'  => $total_pages,
					'current_page' => $page_no,
				] );
			endif;
		else:
			wp_die( '0' );
		endif;
		
		wp_reset_postdata();
		if ( $is_ajax_request && ! $initial_request ) {
			wp_die();
		}
	}
	
}