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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ktf2021' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$ktf2021_description = get_bloginfo( 'description', 'display' );
			if ( $ktf2021_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ktf2021_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<!-- Button to close the overlay navigation -->
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		
		<div class="menu-header d-flex flex-row">
			<div class="menu-header-logo p-2 m-auto">
				<img src="<?php echo get_template_directory_uri() . "/images/ktf2021-logo.svg" ?>" />
			</div>
			<div class="menu-header-control p-2">
				<button class="menu-search">Suche</button>
			</div>
			<div class="menu-header-control p-2">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onClick="openNav()"><?php esc_html_e( 'Primary Menu', 'ktf2021' ); ?></button>
			</div>
		</div>
		<script>
			/* Open */
			function openNav() {
				console.log("open Nav");
				
				document.getElementById("site-navigation").style.height = "100%";
			}

			/* Close */
			function closeNav() {
				document.getElementById("site-navigation").style.height = "0%";
			}
		</script>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
