<?php
/**
 * bunko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bunko
 */


function bunko_setup() {

	load_theme_textdomain( 'bunko', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'bunko' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}

add_action( 'after_setup_theme', 'bunko_setup' );

function bunko_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'build/style-index.css' );
}

add_action( 'after_setup_theme', 'bunko_editor_styles' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bunko_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bunko_content_width', 640 );
}

add_action( 'after_setup_theme', 'bunko_content_width', 0 );

add_action( 'wp_head', function () {
	?>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<?php
} );

/**
 * Enqueue scripts and styles.
 */
function bunko_scripts() {
	wp_enqueue_style( 'bunko-google-fonts', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap' );
	wp_enqueue_style( 'bunko-style', get_template_directory_uri() . '/build/style-index.css' );
	if ( file_exists( dirname( __FILE__ ) . '/build/index.asset.php' ) ) {
		$asset_file = include( dirname( __FILE__ ) . '/build/index.asset.php' );
		wp_enqueue_script(
			'bunko-script',
			get_template_directory_uri() . '/build/index.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);
	}
}

add_action( 'wp_enqueue_scripts', 'bunko_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


