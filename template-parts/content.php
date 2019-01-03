<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ktf2021
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="ktf2021-container-white">
		<div class="ktf2021-content">
			<div class="d-flex justify-content-center my-2">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
				endif;
				?>
			</div>
			<div class="d-flex justify-content-around my-2">
				<?php
					ktf2021_posted_on();
					ktf2021_posted_by();
				?>
			</div>
			<div class="d-flex justify-content-center my-2">
				<?php
					ktf2021_post_thumbnail();	
				?>		
			</div>
		</div>
	</div>
	
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ktf2021' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ktf2021_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
