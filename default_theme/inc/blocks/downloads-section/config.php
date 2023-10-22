<?php

function downloads_section() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'downloads-section',
            'title' => __('Secção de Downloads'),
            'description' => __('Secção de Downloads'),
            'render_template' => 'inc/blocks/downloads-section/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Secção de Downloads', 'Study and Publications', 'Lista de downloads'),
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview', // Important!

                ),
            )
        ));
    }
}

add_action('acf/init', 'downloads_section');

