<?php

function cv_text_banner() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-text-banner',
            'title' => __('Bloco Entretítulo e texto'),
            'description' => __(''),
            'render_template' => 'inc/blocks/text-banner/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Bloco', 'entretítulo', 'texto'),
        ));
    }
}

add_action('acf/init', 'cv_text_banner');

