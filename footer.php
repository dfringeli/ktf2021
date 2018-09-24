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
			<div class="footer-navigation-content d-flex flex-row">

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
		</div>
		<div class="site-info sticky-bottom">
			<div class="site-info-content">
				<span class="ktf2021-content">
					© Copyright KTF2021, <?php echo date("Y"); ?>
				</span>
			</div><!-- .site-info-content -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
