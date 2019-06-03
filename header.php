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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
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
<div id="site-search" class="main-search" aria-hidden="true">
	<div class="header-overlay">
		<div class="d-flex justify-content-center">
			<div class="search-container">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<div id="site-navigation" class="main-navigation" aria-hidden="true">
	<div class="header-overlay">
		<div class="ktf2021-content-margin">
			<div class="menu-list d-md-flex  justify-content-md-between">
				<?php wp_nav_menu( array( 'theme_location' => 'Header-Left', 'container' => false ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'Header-Middle', 'container' => false ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'Header-Right', 'container' => false ) ); ?>
			</div>
		</div>
	</div>
</div>
<div id="page" class="site">
	<header class="site-header mobile d-lg-none fixed-top">
		<div class="ktf2021-content d-flex justify-content-between">
			<a href="<?php echo get_site_url(); ?>" >
				<img class="position-absolute" src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo-slogan.svg" ?>" />
			</a>
			<div class="d-flex">
				<button class="search-icon" onclick="toggleSearch()" type="button">
					<i class="fas fa-search fa-2x fa-fw"></i>
				</button>
				<button class="hamburger hamburger--spin navigation-icon" onclick="toggleNavigation()" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</header>
	<header class="site-header desktop d-none d-lg-block fixed-top">
		<div class="ktf2021-content header-content d-flex justify-content-between">
			<?php
				if ( is_front_page() ) {	
					echo '<div class="menu-header-palme d-none d-lg-block">' . file_get_contents( get_template_directory_uri() . '/images/palme_400px.svg' ) . '</div>';
				}
			?>
			<a href="<?php echo get_site_url(); ?>" >
				<img class="header-logo position-absolute" src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo-slogan.svg" ?>" />
			</a>
			<div class="d-flex">
				<button class="search-icon" onclick="toggleSearch()" type="button">
					<i class="fas fa-search fa-2x fa-fw"></i>
				</button>
				<button class="hamburger hamburger--spin navigation-icon" onclick="toggleNavigation()" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</header>

	<script>

		var body = document.body;
		var headerMenus = document.querySelectorAll('.site-header');

		var navigationIcons = document.querySelectorAll('.navigation-icon');
		var mainNavigations = document.querySelectorAll('.main-navigation');
		var headerPalmes = document.querySelectorAll('.header-palme');

		var searchIcons = document.querySelectorAll('.search-icon');
		var mainSearchs = document.querySelectorAll('.main-search');

		var navigationOpen = false;
		var searchOpen = false;

		function toggleNavigation() {
			
			[...navigationIcons].forEach((icon) => {
				icon.classList.toggle("is-active");
			});

			/* Detect the button class name */
			navigationOpen = !navigationOpen;
			[...searchIcons].forEach((icon) => {
				icon.style.opacity = navigationOpen ? "0" : "1";
				icon.style.visibility = navigationOpen ? "hidden" : "visible";
			});

			[...headerPalmes].forEach((palme) => {
				palme.style.height = navigationOpen ? '245px' : '400px';
			});

			/* Toggle the aria-hidden state on the overlay and the 
				no-scroll class on the body */
			[...mainNavigations].forEach((nav) => {
				nav.setAttribute('aria-hidden', !navigationOpen);
			});
			body.classList.toggle('noscroll', navigationOpen);
			var scrollbarPixel = getScrollbarWidth();
			body.style.marginRight = navigationOpen ? scrollbarPixel + "px" : 0;
			var scrollbarInPercentage = 100 / window.innerWidth * scrollbarPixel;
			[...headerMenus].forEach((menu) => {
				menu.style.width = navigationOpen ? 100 - scrollbarInPercentage + "%" : "100%";
			});

			/* On some mobile browser when the overlay was previously
				opened and scrolled, if you open it again it doesn't 
				reset its scrollTop property */
			setTimeout(function() {
				[...mainNavigations].forEach((nav) => {
					nav.scrollTop = 0;
				});
			}, 750);
		}
		
		function toggleSearch() {

			searchOpen = !searchOpen;

			[...navigationIcons].forEach((icon) => {
				icon.style.opacity = searchOpen ? "0" : "1";
				icon.style.visibility = searchOpen ? "hidden" : "visible";
			});

			/* Toggle the aria-hidden state on the overlay and the 
				no-scroll class on the body */
			[...mainSearchs].forEach((search) => {
				search.setAttribute('aria-hidden', !searchOpen);
			});
			body.classList.toggle('noscroll', searchOpen);
			var scrollbarPixel = getScrollbarWidth();			
			body.style.marginRight = searchOpen ? scrollbarPixel + "px" : 0;
			var scrollbarInPercentage = 100 / window.innerWidth * scrollbarPixel;
			[...headerMenus].forEach((menu) => {
				menu.style.width = searchOpen ? 100 - scrollbarInPercentage + "%" : "100%";
			});

			[...headerPalmes].forEach((palme) => {
				palme.style.height = searchOpen ? '245px' : '400px';
			});

			/* On some mobile browser when the overlay was previously
				opened and scrolled, if you open it again it doesn't 
				reset its scrollTop property */
			setTimeout(function() {
				[...mainSearchs].forEach((search) => {
					search.scrollTop = 0;
				});
			}, 750);
		}

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