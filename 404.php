<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ktf2021
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="ktf2021-container-green">
					<div class="ktf2021-content ktf2021-reveal">
						<h1 class="page-title text-center" style="margin-bottom: 0"><?php esc_html_e( 'Hoppla! Die Site gits leider nid oder nümi.', 'ktf2021' ); ?></h1>
					</div>
				</div><!-- .page-header -->

				<div class="ktf2021-container-white">
					<div class="ktf2021-content ktf2021-reveal">
						<h2 class="text-center"><?php esc_html_e( 'Vielleicht kann Dir die Suche weiterhelfen:', 'ktf2021' ); ?></h2>
						<div class="d-flex justify-content-center">
							<div class="search-container">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
