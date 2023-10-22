<?php


/**
 * Filter to change breadcrumb settings.
 *
 * @param  array $settings Breadcrumb Settings.
 * @return array $setting.
 */
add_filter('rank_math/frontend/breadcrumb/settings', function ($settings) {
    $settings = array(
        'home'           => true,
        'separator'      => '',
        'remove_title'   => '',
        'hide_tax_name'  => '',
        'show_ancestors' => '',
    );
    return $settings;
});



/**
 * Call the custom breadcrumbs function
 */
if (!function_exists('custom_bread_crumbs_rank_seo')) {

    /**
     * Custom breadcrumbs
     * Rank seo need to be installed
     * Category need to be setting up in Rank seo breadcrumbs settings
     *
     * @return void
     */
    function custom_bread_crumbs_rank_seo()
    {
        echo '<div class="custom-bread-crumbs-link">';
        if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
        echo '</div>';
    }
}
add_action('custom_bread_crumbs_rank_seo', 'custom_bread_crumbs_rank_seo');
