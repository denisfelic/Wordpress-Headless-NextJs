<?php

function cv_cta_two_columns() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-cta-two-columns',
            'title' => __('Texto com botão com imagem lateral'),
            'description' => __(''),
            'render_template' => 'inc/blocks/cta-two-columns/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('texto', 'botão', 'imagem lateral', 'colunas'),
        ));
    }
}

add_action('acf/init', 'cv_cta_two_columns');

