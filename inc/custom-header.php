<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package ktf2021
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ktf2021_header_style()
 */
function ktf2021_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ktf2021_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'ktf2021_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'ktf2021_custom_header_setup' );

if ( ! function_exists( 'ktf2021_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see ktf2021_custom_header_setup().
	 */
	function ktf2021_header_style() {
		$header_text_color = get_header_textcolor();

		?>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_site_url(); ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_site_url(); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_site_url(); ?>/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_site_url(); ?>/site.webmanifest">
<link rel="mask-icon" href="<?php echo get_site_url(); ?>/safari-pinned-tab.svg" color="#a3d01e">
<meta name="msapplication-TileColor" content="#2d89ef">
		<?php
		
		/**
		 * Google Chrome Theme
		 */
		?>
		<meta name="theme-color" content="<?php echo get_theme_mod('google_chrome_theme'); ?>">
		<?php

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
