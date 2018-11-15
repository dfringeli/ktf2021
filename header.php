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
<div id="site-search" class="main-search"  aria-hidden="true">
	<div class="container-fluid">
		<div class="row my-3">
			<div class="col">
				<i class="far fa-times-circle fa-3x fa-fw float-right" onclick="toggleSearch(this)"></i>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div> <!-- #site-search -->
<div id="site-navigation" class="main-navigation" aria-hidden="true">
	<div class="container-fluid">
		<div class="row mt-3">
			<div class="col">
				<i class="far fa-times-circle fa-3x fa-fw float-right close-navigation" onclick="toggleNavigation(this)"></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm menu-list">
				<?php
				wp_nav_menu( array(
					'menu' => 'menu-left'
				) );
				?>
			</div>
			<div class="col-sm menu-list">
				<?php
				wp_nav_menu( array(
					'menu' => 'menu-middle'
				) );
				?>
			</div>
			<div class="col-sm menu-list">
				<?php
				wp_nav_menu( array(
					'menu' => 'menu-right'
				) );
				?>
			</div>
		</div>
	</div>
</div><!-- #site-navigation -->
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="menu-header d-flex flex-row pb-2 pb-3">
			<?php
				if ( is_front_page() ) {	
					echo '<div class="menu-header-palme d-none d-lg-block"><img class="img-fluid" src="' . get_template_directory_uri() . '/images/palme.svg" width="290px" /></div>';
				}
			?>
			<div class="menu-header-logo m-auto">
				<a href="<?php home_url(); ?>" >
					<img src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo-slogan.svg" ?>" />
				</a>
			</div>
			<div class="menu-header-controls pr-3 d-flex flex-row">
				<div class="menu-header-control p-2 align-self-center">
					<i class="fas fa-search fa-2x fa-fw open-search" onclick="toggleSearch(this)"></i>					
				</div>
				<div class="menu-header-control p-2 align-self-center">
					<i class="fas fa-bars fa-2x fa-fw open-navigation" onclick="toggleNavigation(this)"></i>
				</div>
			</div>
		</div>
		<script>

			var body = document.body;
			var mainNavigation = document.querySelector('.main-navigation');
			var mainSearch = document.querySelector('.main-search');

			function toggleNavigation(btn) {
				/* Detect the button class name */
				var overlayNavigationOpen = btn.classList.contains('open-navigation');

				/* Toggle the aria-hidden state on the overlay and the 
					no-scroll class on the body */
				mainNavigation.setAttribute('aria-hidden', !overlayNavigationOpen);
				body.classList.toggle('noscroll', overlayNavigationOpen);
				body.style.marginRight = overlayNavigationOpen ? getScrollbarWidth() + "px" : 0;

				/* On some mobile browser when the overlay was previously
					opened and scrolled, if you open it again it doesn't 
					reset its scrollTop property */
				setTimeout(function() {
					mainNavigation.scrollTop = 0;
				}, 750);
			}
			
			function toggleSearch(btn) {
				/* Detect the button class name */
				var overlaySearchOpen = btn.classList.contains('open-search');

				/* Toggle the aria-hidden state on the overlay and the 
					no-scroll class on the body */
				mainSearch.setAttribute('aria-hidden', !overlaySearchOpen);
				body.classList.toggle('noscroll', overlaySearchOpen);				
				body.style.marginRight = overlaySearchOpen ? getScrollbarWidth() + "px" : 0;

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
	</header><!-- #masthead -->

	<div id="content" class="site-content">