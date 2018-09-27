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
	<div id="site-search" class="main-search d-flex flex-column">
		<i class="far fa-times-circle fa-3x fa-fw algin-self-end ml-auto mr-4 my-4" onclick="closeSearch()"></i>
		<?php get_search_form(); ?>
	</div>
	<nav id="site-navigation" class="main-navigation d-flex flex-column">
	<i class="far fa-times-circle fa-3x fa-fw algin-self-end ml-auto mr-4 my-4" onclick="closeNav()"></i>
		<div class="d-flex flex-row">

			<?php
			wp_nav_menu( array(
				'menu' => 'menu-left',
				'container_class' => 'flex-fill'
			) );
			?>

			<?php
			wp_nav_menu( array(
				'menu' => 'menu-middle',
				'container_class' => 'flex-fill'
			) );
			?>

			<?php
			wp_nav_menu( array(
				'menu' => 'menu-right',
				'container_class' => 'flex-fill'
			) );
			?>

		</div>
	</nav><!-- #site-navigation -->
	<header id="masthead" class="site-header">
		<div class="menu-header d-flex flex-row">
			<?php
				if ( is_front_page() ) {	
					echo '<div class="menu-header-palme d-none d-lg-block"><img class="img-fluid" src="' . get_template_directory_uri() . '/images/palme.svg" width="290px" /></div>';
				}
			?>
			<div class="menu-header-logo m-auto">
				<a href="<?php home_url(); ?>" >
					<img src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo.svg" ?>" />
				</a>
			</div>
			<div class="menu-header-controls p-2 d-flex flex-row">
				<div class="menu-header-control p-2 align-self-center">
					<i class="fas fa-search fa-3x fa-fw menu-search" onClick="openSearch()"></i>					
				</div>
				<div class="menu-header-control p-2 align-self-center">
					<i class="fas fa-bars fa-3x fa-fw" onClick="openNav()"></i>
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