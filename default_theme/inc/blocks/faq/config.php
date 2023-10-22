<?php

function faq() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'FAQ',
            'title' => __('FAQ'),
            'description' => __('bloco de FAQs'),
            'render_template' => 'inc/blocks/faq/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('faq', 'faqs'),
        ));
    }
}

add_action('acf/init', 'faq');

