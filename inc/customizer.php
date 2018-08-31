<?php
/**
 * ktf2021 Theme Customizer
 *
 * @package ktf2021
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ktf2021_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section('chrome_options', array(
        'title'    => __('Google Chrome', 'ktf2021'),
        'description' => 'Set Settings for Google Chrome',
        'priority' => 120,
	));

	//  =============================
    //  = Google Chrome Theme       =
    //  =============================
    $wp_customize->add_setting('google_chrome_theme', array(
        'default'           => '#000000',
        'transport'         => 'refresh' 
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'google_chrome_theme_control', array(
        'label'    => __('Google Chrome Theme Color', 'ktf2021'),
        'description' => 'The color of the tab in Google Chrome',
        'section'  => 'chrome_options',
        'settings' => 'google_chrome_theme',
    )));
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ktf2021_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ktf2021_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'ktf2021_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ktf2021_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ktf2021_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ktf2021_customize_preview_js() {
	wp_enqueue_script( 'ktf2021-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ktf2021_customize_preview_js' );
