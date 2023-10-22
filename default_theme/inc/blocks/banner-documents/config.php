<?php

function cv_banner_documents() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-banner-documents',
            'title' => __('Banner Documentos'),
            'description' => __('Banner de documentos'),
            'render_template' => 'inc/blocks/banner-documents/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Banner', 'documento', 'documentos'),
        ));
    }
}

add_action('acf/init', 'cv_banner_documents');

