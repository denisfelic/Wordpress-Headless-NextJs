<?php

function cv_associates(): void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-associates',
            'title' => __('Associados'),
            'description' => __('Bloco associados'),
            'render_template' => 'inc/blocks/associates/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('associados', 'organizações'),
        ));
    }
}

add_action('acf/init', 'cv_associates');
