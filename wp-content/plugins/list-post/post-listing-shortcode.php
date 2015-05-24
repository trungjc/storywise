<?php
/*
Plugin Name: WPTutsPlus Post-listing shortcode
Plugin URI: http://rachelmccollin.co.uk
Description: This plugin provides a shortcode to list posts, with parameters. It also registers a couple of post types and tacxonomies to work with.
Version: 1.0
Author: Rachel McCollin
Author URI: http://rachelmccollin.co.uk
License: GPLv2
*/
// register custom post type to work with
add_action( 'init', 'rmcc_create_post_type' );
function rmcc_create_post_type() {  // clothes custom post type
    // set up labels
    $labels = array(
        'name' =--> 'Clothes',
        'singular_name' => 'Clothing Item',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Clothing Item',
        'edit_item' => 'Edit Clothing Item',
        'new_item' => 'New Clothing Item',
        'all_items' => 'All Clothes',
        'view_item' => 'View Clothing Item',
        'search_items' => 'Search Clothes',
        'not_found' =>  'No Clothes Found',
        'not_found_in_trash' => 'No Clothes found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Clothes',
    );
    register_post_type(
        'clothes',
        array(
            'labels' => $labels,
            'has_archive' => true,
            'public' => true,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
            'taxonomies' => array( 'post_tag', 'category' ),
            'exclude_from_search' => true,
            'capability_type' => 'post',
        )
    );
}
 
// register two taxonomies to go with the post type
add_action( 'init', 'rmcc_create_taxonomies', 0 );
function rmcc_create_taxonomies() {
    // color taxonomy
    $labels = array(
        'name'              => _x( 'Colors', 'taxonomy general name' ),
        'singular_name'     => _x( 'Color', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Colors' ),
        'all_items'         => __( 'All Colors' ),
        'parent_item'       => __( 'Parent Color' ),
        'parent_item_colon' => __( 'Parent Color:' ),
        'edit_item'         => __( 'Edit Color' ),
        'update_item'       => __( 'Update Color' ),
        'add_new_item'      => __( 'Add New Color' ),
        'new_item_name'     => __( 'New Color' ),
        'menu_name'         => __( 'Colors' ),
    );
    register_taxonomy(
        'color',
        'clothes',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => true,
            'show_admin_column' => true
        )
    );
    // fabric taxonomy
    $labels = array(
        'name'              => _x( 'Fabrics', 'taxonomy general name' ),
        'singular_name'     => _x( 'Fabric', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Fabrics' ),
        'all_items'         => __( 'All Fabric' ),
        'parent_item'       => __( 'Parent Fabric' ),
        'parent_item_colon' => __( 'Parent Fabric:' ),
        'edit_item'         => __( 'Edit Fabric' ),
        'update_item'       => __( 'Update Fabric' ),
        'add_new_item'      => __( 'Add New Fabric' ),
        'new_item_name'     => __( 'New Fabric' ),
        'menu_name'         => __( 'Fabrics' ),
    );
    register_taxonomy(
        'fabric',
        'clothes',
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'query_var' => true,
            'rewrite' => true,
            'show_admin_column' => true
        )
    );
}
?>