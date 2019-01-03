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
		<div class="ktf2021-content d-md-flex">
			<div class="flex-fill menu-list">
				<div class="d-flex justify-content-md-start justify-content-center">
					<?php
					wp_nav_menu( array(
						'menu' => 'menu-left'
					) );
					?>
				</div>
			</div>
			<div class="flex-fill menu-list">
				<div class="d-flex justify-content-center">
					<?php
					wp_nav_menu( array(
						'menu' => 'menu-middle'
					) );
					?>
				</div>
			</div>
			<div class="flex-fill menu-list">
				<div class="d-flex justify-content-md-end justify-content-center">
					<?php
					wp_nav_menu( array(
						'menu' => 'menu-right'
					) );
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="page" class="site">
	<!-- <header id="masthead" class="site-header">
		<div class="menu-header d-flex justify-content-between">
			<?php
				if ( is_front_page() ) {	
					echo '<div class="menu-header-palme d-none d-lg-block"><img id="header-palme" src="' . get_template_directory_uri() . '/images/palme.svg" /></div>';
				}
			?>
			<div class="menu-header-logo">
				<a href="<?php home_url(); ?>" >
					<img id="header-logo" src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo-slogan.svg" ?>" />
				</a>
			</div>
			<div class="menu-header-controls d-flex flex-row">
				<div class="menu-header-control align-self-center">
					<i id="search-icon" class="fas fa-search fa-2x fa-fw" onclick="toggleSearch()"></i>					
				</div>
				<div class="menu-header-control align-self-center">
					<button id="navigation-icon" class="hamburger hamburger--spin" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<script>
						// Look for .hamburger
						var hamburger = document.querySelector(".hamburger");
						// On click
						hamburger.addEventListener("click", function() {
							// Do something else, like open/close menu
							toggleNavigation();
						});
					</script>
				</div>
			</div>
		</div>
		<script>

			var body = document.body;
			var headerMenu = document.getElementById('masthead');

			var navigationIcon = document.getElementById('navigation-icon');
			var mainNavigation = document.querySelector('.main-navigation');

			var searchIcon = document.getElementById('search-icon');
			var mainSearch = document.querySelector('.main-search');

			var navigationOpen = false;
			var searchOpen = false;

			function toggleNavigation() {
				
				hamburger.classList.toggle("is-active");

				/* Detect the button class name */
				navigationOpen = !navigationOpen;
				searchIcon.style.opacity = navigationOpen ? "0" : "1";
				searchIcon.style.visibility = navigationOpen ? "hidden" : "visible";

				/* Toggle the aria-hidden state on the overlay and the 
					no-scroll class on the body */
				mainNavigation.setAttribute('aria-hidden', !navigationOpen);
				body.classList.toggle('noscroll', navigationOpen);
				var scrollbarPixel = getScrollbarWidth();
				body.style.marginRight = navigationOpen ? scrollbarPixel + "px" : 0;
				var scrollbarInPercentage = 100 / $(window).width() * scrollbarPixel;
				headerMenu.style.width = navigationOpen ? 100 - scrollbarInPercentage + "%" : "100%";

				/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't 
					reset its scrollTop property */
				setTimeout(function() {
					mainNavigation.scrollTop = 0;
				}, 750);
			}
			
			function toggleSearch() {

				/* Detect the button class name */
				searchOpen = !searchOpen;

				navigationIcon.style.opacity = searchOpen ? "0" : "1";
				navigationIcon.style.visibility = searchOpen ? "hidden" : "visible";

				/* Toggle the aria-hidden state on the overlay and the 
					no-scroll class on the body */
				mainSearch.setAttribute('aria-hidden', !searchOpen);
				body.classList.toggle('noscroll', searchOpen);
				var scrollbarPixel = getScrollbarWidth();			
				body.style.marginRight = searchOpen ? scrollbarPixel + "px" : 0;
				var scrollbarInPercentage = 100 / $(window).width() * scrollbarPixel;
				headerMenu.style.width = searchOpen ? 100 - scrollbarInPercentage + "%" : "100%";

				/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't 
					reset its scrollTop property */
				setTimeout(function() {
					mainSearch.scrollTop = 0;
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
	</header>#masthead -->

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
		<span>Desktop</span>
	</header>

	<script>

			var body = document.body;
			var headerMenu = document.querySelector('.site-header');

			var navigationIcon = document.querySelector('.navigation-icon');
			var mainNavigation = document.querySelector('.main-navigation');

			var searchIcon = document.querySelector('.search-icon');
			var mainSearch = document.querySelector('.main-search');

			var navigationOpen = false;
			var searchOpen = false;

			function toggleNavigation() {
				
				navigationIcon.classList.toggle("is-active");

				/* Detect the button class name */
				navigationOpen = !navigationOpen;
				searchIcon.style.opacity = navigationOpen ? "0" : "1";
				searchIcon.style.visibility = navigationOpen ? "hidden" : "visible";

				/* Toggle the aria-hidden state on the overlay and the 
					no-scroll class on the body */
				mainNavigation.setAttribute('aria-hidden', !navigationOpen);
				body.classList.toggle('noscroll', navigationOpen);
				var scrollbarPixel = getScrollbarWidth();
				body.style.marginRight = navigationOpen ? scrollbarPixel + "px" : 0;
				var scrollbarInPercentage = 100 / $(window).width() * scrollbarPixel;
				headerMenu.style.width = navigationOpen ? 100 - scrollbarInPercentage + "%" : "100%";

				/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't 
					reset its scrollTop property */
				setTimeout(function() {
					mainNavigation.scrollTop = 0;
				}, 750);
			}
			
			function toggleSearch() {

				/* Detect the button class name */
				searchOpen = !searchOpen;

				navigationIcon.style.opacity = searchOpen ? "0" : "1";
				navigationIcon.style.visibility = searchOpen ? "hidden" : "visible";

				/* Toggle the aria-hidden state on the overlay and the 
					no-scroll class on the body */
				mainSearch.setAttribute('aria-hidden', !searchOpen);
				body.classList.toggle('noscroll', searchOpen);
				var scrollbarPixel = getScrollbarWidth();			
				body.style.marginRight = searchOpen ? scrollbarPixel + "px" : 0;
				var scrollbarInPercentage = 100 / $(window).width() * scrollbarPixel;
				headerMenu.style.width = searchOpen ? 100 - scrollbarInPercentage + "%" : "100%";

				/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't 
					reset its scrollTop property */
				setTimeout(function() {
					mainSearch.scrollTop = 0;
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

	<!-- <script>
		window.onscroll = function() {scrollFunction()};

		var header = document.getElementById("masthead");
		var headerPalme = document.getElementById("header-palme");
		var headerLogo = document.getElementById('header-logo');

		$(document).ready(function() {
			scrollFunction();
		});

		function scrollFunction() {
			if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
				header.style.height = "130px";
				if (headerPalme) {
					headerPalme.style.height = "120px";
				}
				headerLogo.style.height = "100px";
			} else {
				header.style.height = "175px";
				if (headerPalme) {
					headerPalme.style.height = "220px";
				}
				headerLogo.style.height = "200px";
			}
		}
	</script> -->

	<div id="content" class="site-content">