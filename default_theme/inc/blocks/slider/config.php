<?php

function slider() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'slider',
            'title' => __('slider'),
            'description' => __('slider'),
            'render_template' => 'inc/blocks/slider/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('slider', 'quote'),
        ));
    }
}

add_action('acf/init', 'slider');

