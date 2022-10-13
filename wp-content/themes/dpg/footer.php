<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DPG
 */

?> 
	<footer id="colophon" class="site-footer">
		<div class="footer-top">
			<div class="container">
				<div class="footer-row d-flex justify-content-around">
					<div class="footer-col footer-col-1">
						<?php if ( is_active_sidebar( 'footer-col-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-col-1' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-col footer-col-2">
						<?php if ( is_active_sidebar( 'footer-col-2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-col-2' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-col footer-col-3">
						<?php if ( is_active_sidebar( 'footer-col-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-col-3' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="wrapper">
					<div class="footer-copyright">
						<p>© 2022 dpg-formfittings - All rights reserved.</p>
					</div>
					<div class="footer-credit">
						<p>Australian Website Development</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
