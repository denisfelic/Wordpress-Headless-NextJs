<?php

function example_block_2(): void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'My second block',
            'title' => __('My second block'),
            'description' => __('just a text'),
            'render_template' => 'inc/blocks/example-block-2/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('react', 'component', 'example'),
        ));
    }
}

add_action('acf/init', 'example_block_2');
