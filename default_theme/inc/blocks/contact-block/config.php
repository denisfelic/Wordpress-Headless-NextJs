<?php

function cv_contact_block() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'cv-contact-block',
            'title' => __('Formulário de Contacto'),
            'description' => __(''),
            'render_template' => 'inc/blocks/contact-block/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('formulário', 'contacto', 'bloco', 'contato'),
        ));
    }
}

add_action('acf/init', 'cv_contact_block');

