<?php

function slider() : void
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'Denis Theme Slider',
            'title' => __('slider'),
            'description' => __('slider'),
          //  'render_template' => 'inc/blocks/slider/render.php',
          'render_callback' => 'renderizar_meu_bloco',
            'category' => 'default_theme',
            'icon' => 'admin-comments',
            'keywords' => array('slider', 'quote'),
        ));
    }
}

add_action('acf/init', 'slider');


function renderizar_meu_bloco($block) {
    // Obtenha os dados do campo ACF necessário
    $titulo = "Welcome to Denis React Wordpress Developer. XYZ  "; //get_field('titulo_acf', $block['id']);

    // Carregue os scripts React e seu componente React
    wp_enqueue_script('react', 'https://unpkg.com/react@16/umd/react.production.min.js', array(), '16.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@16/umd/react-dom.production.min.js', array(), '16.0', true);

    // Carregue seu componente React (não use .mjs)
   // wp_enqueue_script('meu-componente-react', get_template_directory_uri() . '/inc/blocks/slider/MeuComponenteReact.js', array('react', 'react-dom'), '1.0', true);

    // Renderize o bloco e passe os dados para o componente React
    echo '<div id="meu-componente-react-root"></div>';
    echo "<script>
    
    window.addEventListener('DOMContentLoaded', () => {
        var titulo = '" . esc_html($titulo) . "';
        var elemento = document.getElementById('meu-componente-react-root');
        ReactDOM.render(React.createElement(MeuComponentReact, { titulo: titulo }), elemento);
    })
       
    </script>";
}
