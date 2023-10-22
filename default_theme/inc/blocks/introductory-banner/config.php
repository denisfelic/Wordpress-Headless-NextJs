<?php

function cv_introductory_banner() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-introductory-banner',
            'title' => __('Banner introdutório'),
            'description' => __(''),
            'render_template' => 'inc/blocks/introductory-banner/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Banner', 'introdutório'),
        ));
    }
}

add_action('acf/init', 'cv_introductory_banner');

