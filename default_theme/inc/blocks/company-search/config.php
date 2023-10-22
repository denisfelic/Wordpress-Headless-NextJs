<?php

function cv_company_search_block() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-company-search',
            'title' => __('Correspondentes Formulário', 'default_theme'),
            'description' => __('Correspondentes Formulário', 'default_theme'),
            'render_template' => 'inc/blocks/company-search/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('correspondentes', 'listagem', 'formulário', 'seguradoras'),
        ));
    }
}

add_action('acf/init', 'cv_company_search_block');

