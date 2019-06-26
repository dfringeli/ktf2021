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
					the_title( '<h1 class="entry-title text-center">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title text-center"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
				endif;
				?>
			</div>
			<div class="d-flex justify-content-between justify-content-md-center my-2">
				<div class="mx-md-5">
					<?php
						ktf2021_posted_by();
					?>
				</div>
				<div class="mx-md-5">
					<?php
						ktf2021_posted_on();
					?>
				</div>
			</div>
			<div class="d-flex flex-wrap flex-md-nowrap my-2">
				<div class="post-thumbnail my-2 my-md-2 mr-md-2 w-100">
					<?php the_post_thumbnail(array('500', '300')); ?>
					<div class="text-center">
						<p class="ktf2021-message-image-caption"><?php echo get_the_post_thumbnail_caption(); ?></p>
					</div>
				</div><!-- .post-thumbnail -->
				<div class="ktf2021-message my-2 my-md-2 ml-md-2 w-100">
					<?php
						the_content();
					?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="entry-content">
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ktf2021_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
