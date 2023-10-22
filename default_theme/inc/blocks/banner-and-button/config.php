<?php

function cv_banner_and_button_block() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'banner-button',
            'title' => __('Banner com botão', 'default_theme'),
            'description' => __('Banner com botão'),
            'render_template' => 'inc/blocks/banner-and-button/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('banner', 'botão'),
        ));
    }
}

add_action('acf/init', 'cv_banner_and_button_block');

