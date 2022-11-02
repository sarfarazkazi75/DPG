<?php
/* Template Name: News */
get_header(); ?>
<?php
include_once get_template_directory().'/inc/infinity-load-more.php';
$loadmore_posts = new Loadmore_Posts();
?>
<?php get_template_part( 'template-parts/parts/banner', '', [ 'wrapper_class' => 'inner-page-banner-section', 'image_class' => 'banner-image', 'content_class' => 'inner-banner-content' ] ) ?>
    
    <section class="latest-blog-section py-70">
        <div class="container">
            <div class="section-title text-center">
                <h2><?php _e('The Latest Updates from DPG','dpg') ?></h2>
            </div>
            <div class="blogs-wrapper">
				<?php
				$loadmore_posts->post_script_load_more();
				?>
            </div>
            
        </div>
    </section>

<?php get_footer(); ?>