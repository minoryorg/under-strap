<?php
/**
 * under-strap functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package under-strap
 */

if ( ! function_exists( 'under_strap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function under_strap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on under-strap, use a find and replace
	 * to change 'under-strap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'under-strap', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'under-strap' ),
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
	add_theme_support( 'custom-background', apply_filters( 'under_strap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'under_strap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function under_strap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'under_strap_content_width', 640 );
}
add_action( 'after_setup_theme', 'under_strap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function under_strap_widgets_init() {
    global $wp_widget_factory;  
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'under-strap' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'under-strap' ),
		'before_widget' => '<section id="%1$s" class="panel panel-default widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title panel-heading">',
		'after_title'   => '</div>',
	) );
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}
add_action( 'widgets_init', 'under_strap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function under_strap_scripts() {
    wp_enqueue_style( 'under-strap-style', get_stylesheet_uri() );
    wp_enqueue_style( 'under-strap-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style( 'under-strap-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    if ( get_option('color') && get_option('color') != 'default' ):
        wp_enqueue_style( 'under-strap-bootswatch', '//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/' . get_option('color') . '/bootstrap.min.css' );
    endif;
    wp_enqueue_script( 'under-strap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'under-strap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'under-strap-jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '20151215', true );
    wp_enqueue_script( 'under-strap-bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js', array(), '20151215', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'under_strap_scripts' );

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
 * Add theme options.
 */
function under_strap_bootswatch() {
    add_option('color');
    add_action('admin_menu', 'option_menu_create');
    function option_menu_create() {
        add_theme_page(esc_attr__( 'Theme Options' ), esc_attr__( 'Theme Options' ), 'edit_themes', basename(__FILE__), 'option_page_create');
    }
    function option_page_create() {
        $saved = under_strap_save_option();
        require TEMPLATEPATH.'/admin-option.php';
    }
}
function under_strap_save_option() {
    if (empty($_REQUEST['color'])) return;
    $save = update_option('color', $_REQUEST['color']);
    return $save;
}
add_action('init', 'under_strap_bootswatch');
 
