<?php

function react_component_example(): void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'React component example',
            'title' => __('React Component example'),
            'description' => __('just a text'),
            'render_template' => 'inc/blocks/react-component-example/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('react', 'component', 'example'),
        ));
    }
}

add_action('acf/init', 'react_component_example');
