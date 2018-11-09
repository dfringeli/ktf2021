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
<div id="page" class="site">
	<div id="site-search" class="main-search">
		<i class="far fa-times-circle fa-3x fa-fw algin-self-end" onclick="closeSearch()"></i>
		<?php get_search_form(); ?>
	</div>
	<nav id="site-navigation" class="main-navigation">
		<div class="container-fluid">
			<div class="row">
				<div class="col">			
					<i class="far fa-times-circle fa-3x fa-fw algin-self-end" onclick="closeNav()"></i>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<?php
					wp_nav_menu( array(
						'menu' => 'menu-left'
					) );
					?>
				</div>
				<div class="col-lg">
					<?php
					wp_nav_menu( array(
						'menu' => 'menu-middle'
					) );
					?>
				</div>
				<div class="col-lg">
					<?php
					wp_nav_menu( array(
						'menu' => 'menu-right'
					) );
					?>
				</div>
			</div>
		</div>
	</nav><!-- #site-navigation -->
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
					<i class="fas fa-search fa-2x fa-fw menu-search" onClick="openSearch()"></i>					
				</div>
				<div class="menu-header-control p-2 align-self-center">
					<i class="fas fa-bars fa-2x fa-fw" onClick="openNav()"></i>
				</div>
			</div>
		</div>
		<script>
			/* Open Search */
			function openSearch() {					
				document.getElementById("site-search").style.height = "100%";
			}

			/* Close Search */
			function closeSearch() {
				document.getElementById("site-search").style.height = "0%";
			}

			/* Open Navigation */
			function openNav() {
				document.getElementById("site-navigation").style.height = "100%";
			}

			/* Close Navigation */
			function closeNav() {
				document.getElementById("site-navigation").style.height = "0%";
			}
		</script>
	</header><!-- #masthead -->

	<div id="content" class="site-content">