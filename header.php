<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ktf2021
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_site_url(); ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_site_url(); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_site_url(); ?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_site_url(); ?>/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_site_url(); ?>/safari-pinned-tab.svg" color="#a3d01e">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="theme-color" content="<?php echo get_theme_mod('google_chrome_theme'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="site-search" class="main-search">
		<div class="header-overlay">
			<div class="d-flex justify-content-center">
				<div class="search-container">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
	<div id="site-navigation" class="main-navigation">
		<div class="header-overlay">
			<div class="ktf2021-content-margin">
				<div class="menu-list d-md-none">
					<?php wp_nav_menu(array(
						'theme_location' => 'Header',
						'container' => false,
						'menu_class' => 'menu d-flex flex-wrap',
						'walker' => new Nav_Walker_Mobile
					)); ?>
				</div>
				<div class="menu-list d-none d-md-block">
					<?php wp_nav_menu(array(
						'theme_location' => 'Header',
						'container' => false,
						'menu_class' => 'menu d-flex flex-wrap justify-content-around',
						'walker' => new Nav_Walker_Desktop
					)); ?>
				</div>
			</div>
		</div>
	</div>
	<div id="page" class="site">
		<header class="site-header fixed-top">
			<div class="header-content ktf2021-content d-flex justify-content-between">
				<?php
				if (is_front_page()) {
					echo '<div class="menu-header-palme d-none d-lg-block">' . file_get_contents(get_template_directory_uri() . '/images/palme_400px.svg') . '</div>';
				}
				?>
				<a href="<?php echo get_site_url(); ?>">
					<img class="header-logo position-absolute" src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo-slogan.svg" ?>" />
				</a>
				<div class="d-flex">
					<button id="search-toggle" class="search-icon" type="button">
						<i class="fas fa-search fa-2x fa-fw"></i>
					</button>
					<button id="navigation-toggle" class="hamburger hamburger--spin navigation-icon" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
		</header>

		<script>
			jQuery(document).ready(function() {
				var scrollbarPixel = getScrollbarWidth();
				jQuery("head").append("<style type='text/css'> .scrollbar-width{ width: calc(100% - " + scrollbarPixel + "px); } .scrollbar-margin-right { margin-right: " + scrollbarPixel + "px; } </style>");
			});

			jQuery('#site-navigation .dropdown-toggle').click(function() {
				jQuery(this).toggleClass('open');
				jQuery(this).siblings('ul').toggleClass('open');
			});

			jQuery('#navigation-toggle').click(function() {
				jQuery('.site-header').toggleClass('scrollbar-width');
				jQuery(this).toggleClass('is-active');
				jQuery('body').toggleClass('noscroll scrollbar-margin-right');
				jQuery('.header-palme').toggleClass('open');
				jQuery('#site-navigation').toggleClass('open');
				jQuery('#search-toggle').toggleClass('hidden');
				if (jQuery('#site-navigation').hasClass('open')) {
					/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't
					reset its scrollTop property after the fadeout */
					jQuery('#site-navigation').scrollTop(0);
				}
			});

			jQuery('#search-toggle').click(function() {
				jQuery('.site-header').toggleClass('scrollbar-width');
				jQuery('body').toggleClass('noscroll scrollbar-margin-right');
				jQuery('.header-palme').toggleClass('open');
				jQuery('#site-search').toggleClass('open');
				jQuery('#navigation-toggle').toggleClass('hidden');
				if (jQuery('#site-search').hasClass('open')) {
					/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't
					reset its scrollTop property after the fadeout */
					jQuery('#site-search').scrollTop(0);
				}
			});

			function getScrollbarWidth() {
				var outer = document.createElement("div");
				outer.style.visibility = "hidden";
				outer.style.width = "100px";
				outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps

				document.body.appendChild(outer);

				var widthNoScroll = outer.offsetWidth;
				// force scrollbars
				outer.style.overflow = "scroll";

				// add innerdiv
				var inner = document.createElement("div");
				inner.style.width = "100%";
				outer.appendChild(inner);

				var widthWithScroll = inner.offsetWidth;

				// remove divs
				outer.parentNode.removeChild(outer);

				return widthNoScroll - widthWithScroll;
			}
		</script>

		<div id="content" class="site-content">