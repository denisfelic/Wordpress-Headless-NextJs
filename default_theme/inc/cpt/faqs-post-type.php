<?php
/*Custom Post type start*/
function cw_post_type_faqs() {
    $supports = array(
        'title', // post title
        'revisions', // post revisions
        'post-formats', // post formats
        'editor'
    );
    $labels = array(
        'name' => _x('FAQs', 'plural'),
        'singular_name' => _x('FAQ', 'singular'),
        'menu_name' => _x('FAQs', 'admin menu'),
        'name_admin_bar' => _x('FAQs', 'admin bar'),
        'add_new' => _x('Nova FAQ', 'add new'),
        'add_new_item' => __('Nova FAQ'),
        'new_item' => __('Novo item'),
        'edit_item' => __('Editar'),
        'view_item' => __('Ver'),
        'all_items' => __('Todos'),
        'search_items' => __('Pesquisar'),
        'not_found' => __('Sem publicações.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => true,
        'query_var' => false,
        'rewrite' => array('slug' => 'faqs'),
        'has_archive' => true,
        'hierarchical' => true,
        'has_archive' => false,
        'publicly_queryable' => false

    );

    register_post_type('faqs', $args);

    register_taxonomy(
        'topic',
        'faqs',
         array(
            'label' => 'Topics',
            'hierarchical' => true,
            'has_archive'  => false
        )
    );

 
}
add_action('init', 'cw_post_type_faqs');
/*Custom Post type end*/
