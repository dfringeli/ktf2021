<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ktf2021
 */

?>

<article class="ktf2021-post post-max-width d-flex flex-column" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Get the post thumbnail
		$post_thumb_id = get_post_thumbnail_id( $post );
		if ($post_thumb_id) {
			echo sprintf(
				'<a class="ktf2021-post-image-link" href="%1$s"><div class="ktf2021-post-image" style="background-image: url(%2$s)"></div></a>',
				esc_url( get_permalink( $post ) ),
				wp_get_attachment_url( $post_thumb_id, array( '', '200' ) )
			);
		}
	?>
	<div class="ktf2021-post-title">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</div>
	<div class="ktf2021-post-byline d-flex justify-content-between">
		<?php
			ktf2021_posted_by();
			ktf2021_posted_on();
		?>
	</div>
	<div class="ktf2021-post-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<div class="flex-fill d-flex justify-content-end">
		<?php echo sprintf( '<span class="ktf2021-post-link align-self-end"><a href="%s">> mehr</a></span>', esc_url( get_permalink())); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
