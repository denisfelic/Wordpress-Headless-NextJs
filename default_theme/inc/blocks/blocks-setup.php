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


// Here you can configure all blocks that you need for the project
require_once ('company-search/config.php'); 
require_once ('banner-and-button/config.php'); 
require_once ('max-width-block/config.php');
require_once ('slider/config.php');
require_once ('banner-cards/config.php');
require_once ('cta-two-columns/config.php');
require_once ('text-banner/config.php');
require_once ('faq-component/config.php');
require_once ('title-two-columns-texts/config.php');
require_once ('banner-documents/config.php');
require_once ('introductory-banner/config.php');
require_once ('banner-with-icons/config.php');
require_once ('banner-with-icons-buttons/config.php');
require_once ('manager-body-block/config.php');
require_once ('associates/config.php');
require_once ('document-list/config.php');
require_once ('faq-list/config.php');
require_once ('contact-block/config.php');