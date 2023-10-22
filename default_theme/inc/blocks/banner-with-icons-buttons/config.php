<?php

function cv_banner_with_icons_buttons() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-banner-with-icons-buttons',
            'title' => __('Banner com ícones e botões'),
            'description' => __(''),
            'render_template' => 'inc/blocks/banner-with-icons-buttons/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Banner', 'ícones', 'ícone', 'icon', 'icone', 'buttons', 'botão', 'botões'),
        ));
    }
}

add_action('acf/init', 'cv_banner_with_icons_buttons');

