<?php
//add_filter('cron_schedules','dd_add_cron_schedules', 9999, 1);
function dd_add_cron_schedules($schedules){
	if (!isset($schedules['dd_every_25_minute'])) {
		$schedules['dd_every_25_minute'] = array(
			'interval' => 25 * 60,
			'display' => __('Every 25 Minute Sync')
		);
	}
	if (!isset($schedules['dd_every_30_minute'])) {
		$schedules['dd_every_30_minute'] = array(
			'interval' => 30 * 60,
			'display' => __('Every 30 Minute Sync')
		);
	}
	return $schedules;
}

//add_action('wp','dd_import_setup_schedule');
function dd_import_setup_schedule(){
	
	if (!wp_next_scheduled('cron_for_import_news_from_live_site_dd')) {
		wp_schedule_event(time(), 'dd_every_25_minute', 'cron_for_import_news_from_live_site_dd');
	}
	if (!wp_next_scheduled('cron_for_import_news_from_db_site_dd')) {
		wp_schedule_event(time(), 'dd_every_30_minute', 'cron_for_import_news_from_db_site_dd');
	}
}
/*
add_action('cron_for_import_news_from_live_site_dd','import_news_from_live_site_dd');
add_action('cron_for_import_news_from_db_site_dd','import_news_from_db_site_dd');
*/
add_action( 'init', 'import_posts_from_live' );
function import_posts_from_live() {
	if ( isset( $_REQUEST['import_news'] ) ) {
		import_news_from_live_site_dd();
		wp_redirect(admin_url('edit.php?page=dd-import-news&dd-msg=Data imported from live site'));
		die;
	}
	
	if ( isset( $_REQUEST['import_news_from_db'] ) ) {
		import_news_from_db_site_dd();
		wp_redirect(admin_url('edit.php?page=dd-import-news&dd-msg=Posts imported'));
		die;
	}
}

function import_news_from_live_site_dd(){
	$per_page    = 50;
	$no_of_pages = 6;
	for ( $i = 1; $i <= $no_of_pages; $i ++ ) {
		$url                  = 'https://thepark.se/wp-json/wp/v2/posts/?per_page=' . $per_page . '&page=' . $i;
		$news_result          = wp_remote_get( $url );
		$news_result_response = json_decode( wp_remote_retrieve_body( $news_result ), true );
		$final_post_array     = array();
		foreach ( $news_result_response as $single_post_array ) {
			foreach ( $single_post_array as $key => $single_val ) {
				if ( is_array( $single_val ) && isset( $single_val['rendered'] ) ) {
					$single_post_array[ $key ] = $single_val['rendered'];
				}
			}
			$final_post_array[] = $single_post_array;
		}
		update_option( 'import_post_array_' . $i, $final_post_array );
		
	}
	update_option( 'posts_import_counter', $no_of_pages );
}

function import_news_from_db_site_dd(){
	$no_of_pages = get_option( 'posts_import_counter', 6 );
	
	for ( $i = 1; $i <= $no_of_pages; $i ++ ) {
		$all_articles         = array();
		$news_result_response = get_option( 'import_post_array_' . $i, 6 );
		foreach ( $news_result_response as $single_post_array ) {
			$prev_post_id   = $single_post_array['id'];
			$post_title       = $single_post_array['title'];
			$post_description = $single_post_array['content'];
			$cover_image      = isset( $single_post_array['yoast_head_json']['og_image'][0]['url'] ) ? $single_post_array['yoast_head_json']['og_image'][0]['url'] : '';
			
			$posts_with_meta  = get_posts( array(
				'posts_per_page' => 1,
				'post_type'      => 'post',
				'post_status'    => array( 'publish', 'preview', 'draft' ),
				'meta_query'     => array(
					array(
						'key'   => 'prev_post_id',
						'value' => $prev_post_id,
					)
				),
				'fields'         => 'ids',
			) );
			$my_post = array(
				'post_title'     => $post_title,
				'post_content'   => $post_description,
				'post_type'      => $single_post_array['type'],
				'post_author'    => 1,
				'post_excerpt'   => $single_post_array['excerpt'],
				'post_status'    => $single_post_array['status'],
				'comment_status' => $single_post_array['comment_status'],
				'ping_status'    => $single_post_array['ping_status'],
				'post_date'      => $single_post_array['date'],
				'post_date_gmt'  => $single_post_array['date_gmt'],
			);
			
			if ( ! empty( $posts_with_meta ) && count( $posts_with_meta ) ) {
				$pid           = $posts_with_meta[0];
				$my_post['ID'] = $pid;
				wp_update_post( $my_post );
				$log_title = "News updated : ";
				
			} else {
				$pid       = wp_insert_post( $my_post );
				$log_title = "News Created : ";
			}
			if ( $cover_image ) {
				assign_featured_image_to_post( $cover_image, $pid );
			}
			unset($single_post_array['ping_status']);
			unset($single_post_array['comment_status']);
			unset($single_post_array['status']);
			unset($single_post_array['excerpt']);
			unset($single_post_array['content']);
			unset($single_post_array['title']);
			unset($single_post_array['ID']);
			unset($single_post_array['type']);
			
			foreach ( $single_post_array as $meta_key=>$meta_value){
				update_post_meta($pid,$meta_key,$meta_value);
			}
			
			update_post_meta( $pid, 'prev_post_id', $single_post_array['id'] );
			$all_articles[] = $pid;
			wp_set_post_terms( $pid, ['news'], 'category', true );
			
			$log = $log_title . $post_title . PHP_EOL;
			set_latest_log( $log_title, $log, 'article_import_latest_log' );
			$file_name = 'news_import_import_on_' . date( "d-m-Y" ) . '_log.txt';
			dd_import_file_contents_log( $file_name, $log, 'Manually Import' );
		}
		update_option( 'import_post_ids_' . $i, $all_articles );
	}
	
}


function assign_post_to_group( $pid, $group_id ) {
	$post_groups = get_user_meta( $pid, 'groups_ids', true );
	if ( ! is_array( $post_groups ) ) {
		$post_groups = [];
	}
	$post_groups [] = $group_id;
	$post_groups    = array_unique( $post_groups );
	update_post_meta( $pid, 'group_ids', $post_groups );
	
	$groups_post = groups_get_groupmeta( $group_id, 'post_ids' );
	if ( ! is_array( $groups_post ) ) {
		$groups_post = [];
	}
	$groups_post[] = $pid;
	groups_update_groupmeta( $group_id, 'post_ids', $groups_post );
	
}


function assign_featured_image_to_post( $cover_image, $pid ) {
	$pathInfo         = pathinfo( $cover_image );
	$image_url        = $cover_image; // Define the image URL here
	$image_name       = $pathInfo['basename'];
	$upload_dir       = wp_upload_dir(); // Set upload folder
	$image_data       = file_get_contents( $image_url ); // Get image data
	$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
	$filename         = basename( $unique_file_name ); // Create image file name
	if ( wp_mkdir_p( $upload_dir['path'] ) ) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}
	file_put_contents( $file, $image_data );
	$wp_filetype = wp_check_filetype( $filename );
	$attachment  = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => sanitize_file_name( $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);
	$attach_id   = wp_insert_attachment( $attachment, $file, $pid );
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	wp_update_attachment_metadata( $attach_id, $attach_data );
	set_post_thumbnail( $pid, $attach_id );
}


function dd_import_file_contents_log( $file_name, $contents, $sort_text = '=' ) {
	$log = '======================================' . $sort_text . ' ON ( ' . date( "d-m-Y, g:i a" ) . ' )==============================================' . PHP_EOL;
	$log .= $contents;
	$log .= '===============================================================================================================================' . PHP_EOL;
	$dir = ABSPATH . 'wp-content/uploads/cron_logs/';
	if ( ! file_exists( $dir ) ) {
		mkdir( $dir, 0777, true );
		chmod( $dir, 0777 );
	}
	$dir .= $file_name;
	$fp  = fopen( $dir, 'w' );
	fwrite( $fp, $log );
	fclose( $fp );
	chmod( $dir, 0777 );
}

function set_latest_log( $log_title, $log, $log_key ) {
	$save_Log = get_option( $log_key );
	if ( ! is_array( $save_Log ) ) {
		$save_Log = array();
	}
	$save_Log[] = '==================================<strong>' . $log_title . ' ON ( ' . date( "d-m-Y, g:i a" ) . ' ) </strong>============================================';
	$save_Log[] = '<strong style="color: green">' . $log . '</strong>';
	update_option( $log_key, $save_Log );
}

function get_latest_log( $log_key ) {
	$logs = get_option( $log_key, true );
	if ( is_array( $logs ) ) {
		?>
        <div class="dd-log">
			<?php
			echo implode( '<br><br>', $logs );
			delete_option( $log_key );
			?>
        </div>
		<?php
	}
}