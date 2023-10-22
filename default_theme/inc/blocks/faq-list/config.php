<?php

function cv_faq_list() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'FAQ',
            'title' => __('Listagem de Perguntas Frequentes'),
            'render_template' => 'inc/blocks/faq-list/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('faq', 'faqs'),
        ));
    }
}

add_action('acf/init', 'cv_faq_list');

