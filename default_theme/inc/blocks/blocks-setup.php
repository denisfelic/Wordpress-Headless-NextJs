<?php

add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'default_theme',
		'title' => __('default_theme', 'default_theme'),
        'keywords' => array( 'default_theme', 'default_theme'),
        
	);

	return $categories;
}, 8,2 );


 require_once ('react-component-example/config.php');
