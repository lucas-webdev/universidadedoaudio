<?php
/**
 * viaggio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package viaggio
 */

if ( ! function_exists( 'viaggio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function viaggio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on viaggio, use a find and replace
	 * to change 'viaggio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'viaggio', get_template_directory() . '/languages' );

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

	//POST TYPES
	add_theme_support( 'post-formats', array( 'image', 'audio' , 'gallery' , 'video' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'viaggio' ),
		'off_canvas_menu' => esc_html__( 'Off Canvas', 'viaggio' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'viaggio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'viaggio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viaggio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'viaggio_content_width', 640 );
}
add_action( 'after_setup_theme', 'viaggio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function viaggio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Default', 'viaggio' ),
		'id'            => 'sidebar-deafult',
		'description'   => esc_html__( 'It will show on homepage and all the pages if you do not have the blog sidebar active.', 'viaggio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span class="title_before_after">',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Blog', 'viaggio' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'It will show on homepage and all the pages and the post and if you do not have the sidebar active the deafult will run.', 'viaggio' ),
		'before_widget' => '<section id="%1$s" class="widget %footer$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title"><span class="title_before_after">',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Footer', 'viaggio' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'It will containt every footer widget.', 'viaggio' ),
		'before_widget' => '<div class="col-md-4 col-sm-4"><section id="%1$s" class="widget footer_widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h4 class="widget-title"><span class="title_before_after">',
		'after_title'   => '</span></h4>',
	) );
}
add_action( 'widgets_init', 'viaggio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function viaggio_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/assets/css/bootstrap-theme.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css' );
	wp_enqueue_style( 'fontawesome-theme', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'nivo', get_template_directory_uri() . '/assets/css/nivo-slider.css' );
	wp_enqueue_style( 'viaggio-style', get_stylesheet_uri() );
	wp_enqueue_style( 'viaggio-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

	
	wp_enqueue_script( 'viaggio-plugin', get_template_directory_uri(). '/assets/js/plugin-bundle.js', array('jquery'), "20124141" , true );
	wp_enqueue_script( 'viaggio-google-map', '//maps.googleapis.com/maps/api/js?key='. cs_get_option('contact-google-api'), array(), '1', true );
	wp_enqueue_script( 'viaggio-custom', get_template_directory_uri(). '/assets/js/custom.js', array('jquery'), "20124155" , true );
	wp_enqueue_script( 'viaggio-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'viaggio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'viaggio_scripts' );
if(! function_exists('cs_get_option')){
	function cs_get_option(){
		$text = "";
		return $text;	
	}
}

if ( ! function_exists( 'vaiggio_cs_override' ) ) {
  function vaiggio_cs_override() {
    return 'inc/admin';
  }
  add_filter( 'cs_framework_override', 'vaiggio_cs_override' );
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load Theme Functions compatibility file.
 */
require get_template_directory() . '/inc/templates/include.php';
/**
 * Load Theme Functions cs-framework compatibility file.
 */
require get_template_directory() . '/inc/theme-includes.php';
/**
* Load TGMPA
*/
require get_template_directory() . '/inc/plugins/example.php';



