<?php
/*
|--------------------------------------------------------------------------
| Helper functions
|--------------------------------------------------------------------------
*/
require get_template_directory() . '/inc/helpers/custom_crumbs_rank_seo.php';
if ( ! function_exists('dd') ) {

    function dd() {
        echo "<pre style='background: black; color: white'>";
        print_r(func_get_args());
        echo "</pre>";die;
        call_user_func_array( 'dump' , func_get_args() );
        die();
    }
}

if ( ! function_exists('ddd') ) {

    function ddd() {
        echo "<pre style='background: black; color: white'>";
        print_r(func_get_args());
        echo "</pre>";die;
        call_user_func_array( 'dump' , func_get_args() );
        die();
    }
}


/* Development ACF Blocks */

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
    // update path
    $path = get_template_directory() . '/inc/development/acf-json';

    // return
    return $path;
}


add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_template_directory() . '/inc/development/acf-json';


    // return
    return $paths;

}

/**
 * Display current page in debug mode
 */
add_action('wp_head', 'show_template');
function show_template()
{
    if (WP_DEBUG_DISPLAY) {
        global $template;
        print_r($template);
    }
}

show_template();
