<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DPG
 */

?>
<section class="about-us-content pt-70">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            
            <header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
            <div class="entry-content pb-70 pt-70" >
				<?php
				the_content();
				
				wp_link_pages( [
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dpg' ),
						'after'  => '</div>',
					] );
				?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
    
    </div>
</section>