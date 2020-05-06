<?php
/**
 * law_test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package law_test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'law_test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function law_test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on law_test, use a find and replace
		 * to change 'law_test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'law_test', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
		register_nav_menus(
			array(
				'header-menu' => esc_html__( 'Header menu', 'law_test' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'law_test_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'law_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function law_test_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'law_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'law_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function law_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'law_test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'law_test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Widjet Footer1', 'law_test' ),
			'id'            => 'widjet_footer1',
			'description'   => esc_html__( 'Add widgets here.', 'law_test' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3 col-md-push-1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widjet Icons', 'law_test' ),
			'id'            => 'widjet_icons',
			'before_widget' => '<div id="%1$s" class="widget %2$s col-md-12 text-center">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'law_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function law_test_scripts() {
	wp_enqueue_style( 'law_test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'law_test-fonts-google', 'https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800');
	wp_enqueue_style( 'law_test-animate', get_template_directory_uri() . '/law/css/animate.css');
	wp_enqueue_style( 'law_test-icomoon', get_template_directory_uri() . '/law/css/icomoon.css');
	wp_enqueue_style( 'law_test-bootstrap', get_template_directory_uri() . '/law/css/bootstrap.css');
	wp_enqueue_style( 'law_test-magnific-popup', get_template_directory_uri() . '/law/css/magnific-popup.css');
	wp_enqueue_style( 'law_test-owl-carousel', get_template_directory_uri() . '/law/css/owl.carousel.min.css');
	wp_enqueue_style( 'law_test-owl-theme', get_template_directory_uri() . '/law/css/owl.theme.default.min.css');
	wp_enqueue_style( 'law_test-flexslider', get_template_directory_uri() . '/law/css/flexslider.css');
	wp_enqueue_style( 'law_test-styleMain', get_template_directory_uri() . '/law/css/style.css');
	
	wp_enqueue_script( 'law_test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'law_test-modernizr', get_template_directory_uri() . '/law/js/modernizr-2.6.2.min.js', array(), _S_VERSION, FALSE );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery',  get_template_directory_uri() . '/law/js/jquery.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'law_test-jquery-easing', get_template_directory_uri() . '/law/js/jquery.easing.1.3.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-bootstrap', get_template_directory_uri() . '/law/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-jquery-waypoints', get_template_directory_uri() . '/law/js/jquery.waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-jquery-stellar', get_template_directory_uri() . '/law/js/jquery.stellar.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-owl-carousel', get_template_directory_uri() . '/law/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-jquery-flexslider', get_template_directory_uri() . '/law/js/jquery.flexslider-min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-jquery-countTo', get_template_directory_uri() . '/law/js/jquery.countTo.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-jquery-magnific-popup', get_template_directory_uri() . '/law/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-magnific-popup-options', get_template_directory_uri() . '/law/js/magnific-popup-options.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law_test-main', get_template_directory_uri() . '/law/js/main.js', array(), _S_VERSION, true );

	


}
add_action( 'wp_enqueue_scripts', 'law_test_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/Law_Header_Menu.php';