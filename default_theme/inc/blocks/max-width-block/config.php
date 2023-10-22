<?php

function max_width_block(): void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(

            'name'            => 'acf-max-width-block',
            'title'            => __('Max-Width Block'),
            'description'        => __('A block to wrap any content in a max-width container with alignment options.'),
            'category'        => 'default_theme',
            'icon'            => [
                'background' => '#fff',
                'foreground' => '#b5267b',
                'src'        => 'editor-expand'
            ],
            'mode'              => 'preview',
            'keywords'        => ['max-width', 'wd', 'acf'],
            'post_type'         => ['post', 'page'],
            'render_template' => 'inc/blocks/container-block/render.php',
            'render_callback' => 'block_render_max_width',
            'supports'          => [
                'align'      => false,
                'align_text' => true,
                'jsx'        => true
            ]

        ));
    }
}

add_action('acf/init', 'max_width_block');

/**
 * Callback block render,
 * return preview image
 */
function block_render_max_width($block, $content = '', $is_preview = false)
{
    /**
     * Back-end preview
     */
    if ($is_preview) {
?>
        <div style="border: 1px solid; padding: 25px;">
            <InnerBlocks />
        </div>
<?php
        return;
    } else {
        if ($block) :
            require('render.php');
        endif;
    }
}
