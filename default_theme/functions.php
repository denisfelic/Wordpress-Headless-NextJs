<?php

/**
 * Default_Theme functions and definitions
 *  
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Default_Theme
 */


/** Remove meta generator **/
remove_action('wp_head', 'wp_generator');


if (!defined('_Default_Theme_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_Default_Theme_VERSION', '1.0.0');
}

if (!function_exists('Default_Theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function Default_Theme_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Default_Theme, use a find and replace
		 * to change 'default_theme' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('default_theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'header_menu' => esc_html__('Primary', 'default_theme'),
                'footer_menu' => esc_html__('Footer', 'default_theme'),
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
                'Default_Theme_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'Default_Theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Default_Theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('Default_Theme_content_width', 640);
}
add_action('after_setup_theme', 'Default_Theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Default_Theme_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'default_theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'default_theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'Default_Theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function Default_Theme_scripts()
{
    wp_enqueue_style('default_theme-style', get_stylesheet_uri(), array(), _Default_Theme_VERSION);
    wp_style_add_data('default_theme-style', 'rtl', 'replace');
    wp_enqueue_script('default_theme-js', get_template_directory_uri() . '/main.js', array(), _Default_Theme_VERSION, true);

    //  wp_enqueue_script('viplant-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _Default_Theme_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'Default_Theme_scripts');



/**
 * Disable click in editor (gutenberg) and allow preview
 *
 * @param [type] $hook
 * @return void
 */
function my_enqueue($hook)
{
    if ('edit.php' == $hook || $hook != 'post.php') {
        return;
    }

    wp_enqueue_script('testJs',  get_template_directory_uri() . '/src/js/internal/gutenberg.js', array());
    wp_enqueue_style('testCss',  get_template_directory_uri() . '/style.css', array());
}
add_action('admin_enqueue_scripts', 'my_enqueue');

//require_once get_template_directory() . "/vendor/autoload.php";
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
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/theme.php';
