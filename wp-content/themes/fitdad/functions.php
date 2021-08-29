<?php

function load_loadstylesheets()
{
	wp_register_style('stylesheet', get_template_directory_uri() . '/css/stylesheet.css', '', 1, 'all');
	wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_loadstylesheets');

function load_javascript()
{
	wp_register_script('custom', get_template_directory_uri() . '/js/app.js', 'jquery', 1, true);
	wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'load_javascript');

// Add Support
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Register menus
register_nav_menus(
	array (
		'top-menu' => __('Top Menu', 'fitdad')
	)
);

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the top-menu menu
    if( $args->theme_location == 'top-menu' ) {
      // add the desired attributes:
      $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

// Add images sizes
add_image_size('post_image', 1200, 628, false);

// Add a widget
register_sidebar(
    array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'class' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    )
);

register_sidebar(
    array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'class' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    )
);

function theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

// WooCommerce Support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Functions for the archive to split the categories by the top-level
function get_top_level_category( $catid ) {
    $category = get_category( $catid );

    while ( $category -> category_parent > 0 ) {
        $category = get_category( $category -> category_parent );        
    }

    return $category;
}

function get_category_subcat_list( $category ) {
    // Create an array to hold the categories
    $categorylist = array();

    // Add the passed category to the array
    get_category_subcat_list_add( $category, $categorylist );

    // Get the sub categories for the current category 
    $categories = get_categories('child_of=' . $category -> term_id . '&hide_empty=1');
    
    // Loop through the sub categories and add them to the array 
    foreach ( $categories as $subcategory ) {
        // Add the passed category to the array
        get_category_subcat_list_add( $subcategory, $categorylist );
    }
    
    // Return the array
    return $categorylist;
}

function get_category_subcat_list_add( $category, &$categorylist ) {
    $categorylist[] = array (
        "category_name" => $category -> name,
        "category_url" => get_category_link( $category ),
        "category_count" => $category -> category_count
    );
}

// Paginate links
function get_paginate_links_as_array( $html, $firstElement = '', $lastElement = '' ) {
    // Check the $html value passed is not zero length - if it is return empty array 
    if ( strlen( $html ) == 0 ) {
        return array();
    }

    //Instantiate the DOMDocument class.
    $htmlDom = new DOMDocument;

    //Parse the HTML of the page using DOMDocument::loadHTML
    @$htmlDom->loadHTML($html);

    //Extract the list items from the HTML.
    $listItems = $htmlDom->getElementsByTagName('li');

    //Array that will contain our extracted elements.
    $extractedElements = array();

    // Declare arrays to hold the first and last elements temporarily before adding to 
    // the $extractedElements array 
    $startElement = array();
    $endElement = array();

    // Loop though the list items
    foreach ( $listItems as $listItem ) {
 
        // Loop through the childNodes
        foreach ( $listItem->childNodes as $childNode ) {

            // Create an element array
            $element = array();

            switch ( $childNode->tagName ) {
                case 'a':
                    //Get the link text.
                    $elementText = $childNode->nodeValue;
                     //Get the link in the href attribute.
                    $elementHref = $childNode->getAttribute('href');
                    
                    //If the link is empty, skip it and don't
                    //add it to our $extractedElements array
                    if ( strlen ( trim ( $elementHref ) ) == 0 ){
                        break;
                    }
                    
                    //Skip if it is a hashtag / anchor link.
                    if ( $elementHref[0] == '#' ) {
                        break;
                    }
                    
                    // Set the values for the $element array
                    $element = array (
                        'type' => 'a',
                        'text' => $elementText,
                        'href' => $elementHref,
                        'sect' => 'mid'
                    );
                    
                    break;
                case 'span':
                    //Get the link text.
                    $elementText = $childNode->nodeValue;

                    //If the span is empty, skip it don't
                    //add it to our $extractedElements array
                    if ( strlen ( trim ( $elementText ) ) == 0 ){
                        break;
                    }

                    // Set the values for the $element array
                    $element = array (
                        'type' => 'span',
                        'text' => $elementText,
                        'href' => '',
                        'sect' => 'mid'
                    );
                    break;
            }
            
            // Check if the element is not empty 
            if ( empty($element) == false ) {

                // Determine if the element is the first/last or should just be added to the arry
                switch ( $element['text'] ) {
                    case $firstElement:
                        $element['sect'] = 'first';
                        $startElement = $element;
                        break;
                    case $lastElement:
                        $element['sect'] = 'last';
                        $endElement = $element;
                        break;
                    default:
                        $extractedElements[] = $element;
                }
            }
        }
    }

    // Check if the firstElement array is empty. If not add it to the beginning of extractedElements
    if ( empty( $startElement ) == false ) {
        array_unshift( $extractedElements, $startElement );
    }

    // Check if the lastElement array is empty. If not add it to the end of extractedElements
    if ( empty( $endElement ) == false ) {
        $extractedElements[] = $endElement;
    }

    return $extractedElements;
}

