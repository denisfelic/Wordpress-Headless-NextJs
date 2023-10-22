<?php

function cv_manager_body_block() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-manager-body-block',
            'title' => __('Bloco Membro Corpo Gerente'),
            'description' => __(''),
            'render_template' => 'inc/blocks/manager-body-block/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('manager', 'corpo', 'gerente','membro', 'block', 'bloco'),
        ));
    }
}

add_action('acf/init', 'cv_manager_body_block');

