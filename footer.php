<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ktf2021
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="footer-navigation sticky-bottom">
		<div class="footer-navigation-content ktf2021-reveal">
			<div class="menu-list d-flex flex-wrap align-items-center d-md-flex justify-content-md-between">
				<?php wp_nav_menu(array('theme_location' => 'Footer-Left', 'container' => false)); ?>
				<?php wp_nav_menu(array('theme_location' => 'Footer-Middle', 'container' => false)); ?>
				<?php wp_nav_menu(array('theme_location' => 'Footer-Right', 'container' => false)); ?>
			</div>
		</div>
	</div>
	<div class="site-info sticky-bottom">
		<div class="site-info-background">
			<div class="d-flex justify-content-end site-info-content">
				<span class="ktf2021-content">© Copyright KTF21, <?php echo date("Y"); ?></span>
			</div><!-- .site-info-content -->
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>