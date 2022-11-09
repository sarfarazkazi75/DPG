<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DPG
 */

?>
<footer id="colophon" class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-row d-flex justify-content-around">
                <div class="footer-col footer-col-1">
                    <div id="block-10">
                        <figure class="wp-block-image size-large">
                            <img loading="lazy" width="202" height="56" src="<?php echo get_field( 'footer_logo', 'option' ) ? : '#' ?>" alt="" class="wp-image-37">
                        </figure>
                    </div>
                    <div id="block-8">
                        <ul class="d-flex flex-wrap footer-social">
                            <li>
                                <a href="<?php echo get_field( 'facebook_link', 'option' ) ? : '#' ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo get_field( 'instagram_link', 'option' ) ? : '#' ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-col footer-col-2">
                    <div id="nav_menu-2">
                        <h6><?php echo get_field( 'secound_column_title', 'option' ) ? : 'Links' ?> </h6>
                        <div class="menu-quick-links-container">
							<?php
							$menu_id = get_field( 'secound_column_menus', 'option' );
							wp_nav_menu( [
								'menu' => $menu_id,
							] );
							?>
                        </div>
                    </div>
                </div>
                <div class="footer-col footer-col-3">
                    <div id="block-9"><h6><?php echo get_field( 'third_column_title', 'option' ) ? : 'Where to find us?' ?></h6>
                        <ul class="footer-contact-info">
                            <li class="d-flex flex-wrap">
                                <span class="icon"><i class="fal fa-map-marker-alt"></i></span> <span class="content"><?php echo nl2br( get_field( 'third_column_address', 'option' ) ) ?></span>
                            </li>
                            
                            <li class="d-flex flex-wrap"><span class="icon"><i class="fal fa-phone-alt"></i></span><span class="content"><a
                                        href="tel:<?php echo get_field( 'contact_number', 'option' ) ?>"><?php echo get_field( 'contact_number', 'option' ) ?></a><a
                                        href="tel:<?php echo get_field( 'additional_number', 'option' ) ?>"><?php echo get_field( 'additional_number', 'option' ) ?></a></span></li>

                            <li class="d-flex flex-wrap"><span class="icon"><i class="fal fa-envelope"></i></span><span class="content"><a
                                        href="mailto:<?php echo get_field( 'third_column_email', 'option' ) ?>"><?php echo get_field( 'third_column_email', 'option' ) ?></a></span></li>
                            
                            <li class="d-flex flex-wrap"><span class="icon"><img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/ABN.svg" alt="ABN Icon"></span><span
                                    class="content"><a href="tel:<?php echo get_field( 'third_column_number', 'option' ) ?>"><?php echo get_field( 'third_column_number', 'option' ) ?></a></span></li>
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="wrapper">
                <div class="footer-copyright">
                    <?php echo get_field( 'copyright_text', 'option' ) ?>
                </div>
                <div class="footer-credit">
                    <p><?php echo get_field( 'footer_right_text', 'option' ) ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
