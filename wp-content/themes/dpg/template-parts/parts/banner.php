<?php
$array_defaults = [
    'wrapper_class' => 'hero-section',
	'image_class' => 'hero-image',
    'content_class' => 'hero-content',
];

$args       = wp_parse_args( $args, $array_defaults );

?>
<section class="<?php echo $args['wrapper_class'] ?>">
    <div class="<?php echo $args['image_class'] ?>">
        <img src="<?php echo get_field( 'banner_image' ) ? : '#' ?>" alt="banner-<?php echo get_the_title() ?>">
    </div>
    <div class="<?php echo $args['content_class'] ?> text-center d-flex justify-content-center align-items-center">
        <div class="container">
			<?php
			if ( $banner_main_title = get_field( 'banner_main_title' ) ) {
				?>
                <h1><?php echo $banner_main_title ?></h1>
				<?php
			}
			if ( $banner_description = get_field( 'banner_description' ) ) {
				?>
                <p><?php echo $banner_description ?></p>
				<?php
			}
			if ( $banner_button = get_field( 'banner_button' ) ) {
				?>
                <a href="<?php echo isset( $banner_button['url'] ) ? $banner_button['url'] : '#' ?>" class="btn"
                   target="<?php echo isset( $banner_button['target'] ) ? $banner_button['target'] : '_self' ?>"><?php echo isset( $banner_button['title'] ) ? $banner_button['title'] : '' ?></a>
				<?php
			}
			?>
        </div>
    </div>
</section>
