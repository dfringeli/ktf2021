<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ktf2021
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			if ( have_posts() ) :
		?>

		<header class="ktf2021-container-white">
			<div class="ktf2021-content">
				<h1 class="page-title text-center">
					Alli News fo A bis Z
				</h1>
			</div>
		</header><!-- .page-header -->
		
		<div class="ktf2021-container-black">
			<div class="ktf2021-content">
				<div class="d-flex justify-content-center flex-wrap">
			
					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', 'news-post' );

						endwhile;
					?>
				</div>
			</div>
		</div>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
