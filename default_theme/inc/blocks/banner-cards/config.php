<?php

function cv_banner_cards() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-banner-cards',
            'title' => __('Banner Cartões'),
            'description' => __('Banner com título, paragrafo e cartões.'),
            'render_template' => 'inc/blocks/banner-cards/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Banner', 'cartões'),
        ));
    }
}

add_action('acf/init', 'cv_banner_cards');

