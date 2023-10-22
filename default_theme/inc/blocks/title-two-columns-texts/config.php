<?php

function cv_title_two_columns_texts() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-title-two-columns-texts',
            'title' => __('Banner duas Colunas'),
            'description' => __(''),
            'render_template' => 'inc/blocks/title-two-columns-texts/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Banner', 'duas', 'colunas'),
        ));
    }
}

add_action('acf/init', 'cv_title_two_columns_texts');

