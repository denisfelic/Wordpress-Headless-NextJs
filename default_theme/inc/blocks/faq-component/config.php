<?php

function cv_faq_component() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-faq-component',
            'title' => __('Banner Perguntas Frequentes'),
            'description' => __('Bloco de FAQs'),
            'render_template' => 'inc/blocks/faq-component/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('faq', 'bloco', 'componente', 'faqs'),
        ));
    }
}

add_action('acf/init', 'cv_faq_component');

