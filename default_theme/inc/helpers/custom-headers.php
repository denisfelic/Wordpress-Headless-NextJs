<?php

if (!function_exists('get_custom_headers')) {

    if (!function_exists('get_field')) {
        return;
    }

    /**
     * Define the header of the page based on ACF custom field option in the page.
     *
     * @param [type] $post_id
     * @return void
     */
    function get_custom_headers($post_id)
    {

        $heroType = get_field("hero_option", $post_id);
        if ($heroType == 'slider') {
            $carouselData = get_field('carousel_items', $post_id);
            get_template_part('template-parts/hero/hero', 'carousel', array('carrousel_data' => $carouselData));
        } else {
            $default_hero_data = get_field('default_hero_data', $post_id);
            get_template_part('template-parts/hero/hero', 'default', array('hero' => $default_hero_data));
        }
    }
}
add_action('get_custom_headers', 'get_custom_headers');
