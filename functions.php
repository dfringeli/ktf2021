<?php
/**
 * ktf2021 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ktf2021
 */


add_action( 'wp', 'francais_language_redirect' );

function francais_language_redirect(){
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if( $lang == "fr" ) {
        if( is_front_page() ) {
			print($lang);
			$url = get_home_url()."/francais/";
             wp_redirect( $url );
         }
    }
}

if ( ! function_exists( 'ktf2021_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ktf2021_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ktf2021, use a find and replace
		 * to change 'ktf2021' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ktf2021', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'Header' => esc_html__( 'Header', 'ktf2021' ),
			
			'Footer-Left' => esc_html__( 'Footer-Left', 'ktf2021' ),
			'Footer-Middle' => esc_html__( 'Footer-Middle', 'ktf2021' ),
			'Footer-Right' => esc_html__( 'Footer-Right', 'ktf2021' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'ktf2021_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ktf2021_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ktf2021_content_width', 640 );
}
add_action( 'after_setup_theme', 'ktf2021_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function ktf2021_scripts() {
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');

	wp_enqueue_style( 'ktf2021-style', get_template_directory_uri() . '/sass/style.css' );

	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css');

	wp_enqueue_style('hamburgers', get_template_directory_uri() . '/sass/hamburgers.css');

	wp_enqueue_script( 'ktf2021-navigation', get_template_directory_uri() . '/js/navigation.js');

	wp_enqueue_script( 'ktf2021-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), '20180820', true);

	wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), '20180820', true);
	
	wp_enqueue_script( 'scrollreveal', 'https://unpkg.com/scrollreveal');

	wp_enqueue_script( 'ktf2021-reveal', get_template_directory_uri() . '/js/ktf2021-reveal.js', array(), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ktf2021_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Nav Walker Mobile
 */
require get_template_directory() . '/nav-walker-mobile.php';

/**
 * Nav Walker Desktop
 */
require get_template_directory() . '/nav-walker-desktop.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function create_message_type() {
	register_post_type( 'message',
	  array(
		'labels' => array(
		  'name' => __( 'Messages' ),
		  'singular_name' => __( 'Message' ),
		  'add_new' => __('Neue Message erstellen'),
		  'add_new_item' => __('Erstelle eine neue Message'),
		  'edit_item' => __('Message bearbeiten'),
		  'new_item' => __('Neue Message'),
		  'view_item' => __('Message ansehen'),
		  'view_items' => __('Alle Messages ansehen'),
		  'search_items' => __('Messages suchen'),
		  'not_found' => __('Keine Messages gefunden'),
		  'not_found_in_trash' => __('Keine Messages im Papierkorb gefunden'),
		  'all_items' => __('Alle Messages'),
		  'archives' => __('Message-Archiv'),
		  'attributes' => __('Message Attribute'),
		  'insert_into_item' => __('In Message einfügen'),
		  'uploaded_to_this_item' => __('Hochladen'),
		  'featured_image' => __('Message-Bild'),
		  'set_featured_image' => __('Message-Bild setzen'),
		  'remove_featured_image' => __('Message-Bild entfernen'),
		  'use_featured_image' => __('Message-Bild verwenden'),
		  'filter_items_list' => __('Filtere Messages'),
		),
		'menu_icon' => 'dashicons-format-status',
		'public' => true,
		'rewrite' => array( 'slug' => 'message' ),
		'has_archive' => true,
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail'
		)
	  )
	);
	flush_rewrite_rules( false );
  }
add_action( 'init', 'create_message_type' );
