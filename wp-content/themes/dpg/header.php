<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DPG
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="header-top d-flex flex-wrap align-items-center">
			<div class="left-block"></div>
			<div class="right-block">
				<div class="wrapper d-flex justify-content-between">
					<div class="shipping-info d-flex align-items-center">
						<svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16 1.78217H1V14.6473H16V1.78217Z" stroke="#EE8320" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M16 6.73032H20L23 9.6992V14.6473H16V6.73032Z" stroke="#EE8320" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M5.5 19.5955C6.88071 19.5955 8 18.4878 8 17.1214C8 15.755 6.88071 14.6473 5.5 14.6473C4.11929 14.6473 3 15.755 3 17.1214C3 18.4878 4.11929 19.5955 5.5 19.5955Z" stroke="#EE8320" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M18.5 19.5955C19.8807 19.5955 21 18.4878 21 17.1214C21 15.755 19.8807 14.6473 18.5 14.6473C17.1193 14.6473 16 15.755 16 17.1214C16 18.4878 17.1193 19.5955 18.5 19.5955Z" stroke="#EE8320" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						<span><?php echo get_field('shipping_text','option') ?></span>
					</div>
					<div class="contact-info d-flex align-items-center">
						<ul class="contact-block d-flex align-items-center">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.1279 4.44035C12.968 4.60425 13.74 5.01511 14.3453 5.62033C14.9505 6.22556 15.3613 6.99761 15.5252 7.83769M12.1279 1C13.8733 1.19389 15.5008 1.97549 16.7433 3.21645C17.9859 4.45741 18.7695 6.08398 18.9656 7.82909M18.1055 14.6926V17.2728C18.1065 17.5124 18.0574 17.7495 17.9615 17.969C17.8655 18.1884 17.7247 18.3854 17.5482 18.5474C17.3717 18.7093 17.1633 18.8326 16.9364 18.9093C16.7095 18.9861 16.4691 19.0146 16.2305 18.993C13.5839 18.7054 11.0416 17.8011 8.80797 16.3526C6.72985 15.032 4.96797 13.2701 3.64745 11.192C2.19388 8.94824 1.2893 6.3936 1.00698 3.73508C0.985488 3.49723 1.01375 3.25752 1.08998 3.0312C1.16621 2.80488 1.28872 2.59691 1.44972 2.42054C1.61073 2.24416 1.80669 2.10324 2.02514 2.00675C2.24359 1.91026 2.47974 1.86031 2.71855 1.86009H5.29881C5.71622 1.85598 6.12088 2.00379 6.43736 2.27597C6.75385 2.54815 6.96057 2.92612 7.01899 3.33944C7.12789 4.16518 7.32987 4.97595 7.62105 5.75628C7.73677 6.06413 7.76181 6.39869 7.69322 6.72034C7.62462 7.04198 7.46526 7.33722 7.23401 7.57106L6.1417 8.66337C7.36608 10.8166 9.14895 12.5995 11.3022 13.8239L12.3945 12.7316C12.6284 12.5003 12.9236 12.341 13.2453 12.2724C13.5669 12.2038 13.9015 12.2288 14.2093 12.3445C14.9896 12.6357 15.8004 12.8377 16.6262 12.9466C17.044 13.0055 17.4255 13.216 17.6983 13.5379C17.971 13.8598 18.116 14.2708 18.1055 14.6926Z" stroke="#EE8320" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<a href="tel:<?php echo get_field('contact_number','option') ?>"><?php echo get_field('contact_number','option') ?></a> <span>|</span> <a href="tel:<?php echo get_field('additional_number','option') ?>"><?php echo get_field('additional_number','option') ?></a>
						</ul>
						<ul class="social-block d-flex">
							<li>
								<a href="<?php echo get_field('facebook_link','option')?:'#' ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li>
								<a href="<?php echo get_field('instagram_link','option')?:'#' ?>" target="_blank"><i class="fab fa-instagram"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="header-bottom d-flex flex-wrap">
			<div class="left-block">
				<div class="site-branding">
                    <a href="<?php echo home_url() ?>" class="custom-logo-link" rel="home" aria-current="page">
                        <img width="238" height="64" src="<?php echo get_field('site_logo','option') ?>" class="custom-logo" alt="DPG">
                    </a>
				</div>
			</div>
			<div class="right-block d-flex justify-content-between align-items-center">
				<div class="nav-block">
					<nav id="site-navigation" class="main-navigation">
						<?php
                        $menu_id = get_field('header_menu','option');
						wp_nav_menu(
							array(
								'menu_id'        => $menu_id,
							)
						);
						?>
					</nav>
				</div>
				<div class="action-block d-flex align-items-center">
					<button type="button" class="search-button">
						<i class="fal fa-search"></i>
					</button>
                    <?php
                    $request_quote = get_field('request_quote','option');
                    ?>
					<a href="<?php echo $request_quote['url']?:'#' ?>" class="btn"><?php echo $request_quote['title']?:'Request Quote' ?></a>
				</div>
				<div class="menu-icon">
					<span></span>
				</div>
			</div>
		</div>
		<div class="header-search">
			<div class="container">
				<form method="post">
					<input type="search" name="search" placeholder="Search" autocomplete="off">
					<button type="submit"><i class="fal fa-search"></i></button>
				</form>
			</div>
		</div>
	</header>
