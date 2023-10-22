<?php

function cv_document_list() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'document-list',
            'title' => __('Listagem de Documentos'),
            'description' => __('Lista de documentos'),
            'render_template' => 'inc/blocks/document-list/render.php',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('Documentação', 'documento', 'documentação', 'lista', 'documentos'),
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview', // Important!

                ),
            )
        ));
    }
}

add_action('acf/init', 'cv_document_list');

