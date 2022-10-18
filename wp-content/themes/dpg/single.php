<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DPG
 */

get_header();
$object     = get_queried_object();
$categories = get_the_category();
$category   = reset( $categories );

?>
    
    <main id="primary" class="site-main">
        
        <section class="inner-page-banner-section">
            <div class="banner-image">
				<?php dpg_post_thumbnail(); ?>
            </div>
            <div class="inner-banner-content text-center d-flex justify-content-center align-items-center">
                <div class="container">
                    <h1><?php echo $category->name ?></h1>
                </div>
            </div>
        </section>
        
        <div class="main-blog-wrap">
            
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="blog-sidebar">
                            <div class="sidebar-title">
                                <span>DPG formatting</span>
                                <h4>DPG formatting News</h4>
                            </div>
                            
                            <div class="sidebar-wrap">
								<?php
								
								if ( $categories ) {
									
									?>
                                    <div class="sidebar-wrap-inner">
                                        <h4>Categories</h4>
                                        <ul>
											<?php
											foreach ( $categories as $single_category ) {
												?>
                                                <li><a href="<?php echo get_term_link( $single_category->term_id ) ?>"><?php echo $single_category->name ?></a></li>
												<?php
											}
											?>
                                        </ul>
                                    </div>
									
									<?php
								}
								$post_tags = get_the_tags();
								if ( $post_tags ) {
									?>
                                    <div class="sidebar-wrap-inner">
                                        <h4>Article Tags</h4>
                                        <ul>
											<?php
											foreach ( $post_tags as $post_tag ) {
												?>
                                                <li><a href="<?php echo get_term_link( $post_tag->term_id ) ?>"><?php echo $post_tag->name ?></a></li>
												<?php
											}
											?>
                                        </ul>
                                    </div>
									<?php
								}
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="blog-content-wrap">
							<?php
							while ( have_posts() ) :
								
								the_post();
								
								get_template_part( 'template-parts/content', get_post_type() );
								
								the_post_navigation( [
									'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Prev', 'dpg' ),
									'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'dpg' ),
								] );
								
								// If comments are open or we have at least one comment, load up the comment template.
								// if ( comments_open() || get_comments_number() ) :
								// 	comments_template();
								// endif;
							
							endwhile; // End of the loop.
							?>
                        </div>
                    </div>
                
                </div>
            
            </div>
        
        </div>
    
    </main><!-- #main -->

<?php
// get_sidebar();
get_footer();
