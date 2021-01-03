<?php
//
//$eventType = function () {
//    $labels = array(
//        'name'               => _x( 'Sections', 'post type general name', 'wf' ),
//        'singular_name'      => _x( 'Section', 'post type singular name', 'wf' ),
//        'menu_name'          => _x( 'Sections', 'admin menu', 'wf' ),
//        'name_admin_bar'     => _x( 'Sections', 'add new on admin bar', 'wf' ),
//        'add_new'            => _x( 'Add new', 'nowe', 'wf' ),
//        'add_new_item'       => __( 'Add new Section', 'wf' ),
//        'new_item'           => __( 'New Section', 'wf' ),
//        'edit_item'          => __( 'Edit Section', 'wf' ),
//        'view_item'          => __( 'View Section', 'wf' ),
//        'all_items'          => __( 'All Sections', 'wf' ),
//        'search_items'       => __( 'Search Section', 'wf' ),
//        'parent_item_colon'  => __( 'Parent:', 'wf' ),
//        'not_found'          => __( 'Not found.', 'wf' ),
//        'not_found_in_trash' => __( 'Not found in trash.', 'wf' ),
//    );
//
//    $args = array(
//        'labels'             => $labels,
//        'menu_icon'          => 'dashicons-welcome-widgets-menus',
//        'public'             => true,
//        'publicly_queryable' => false,
//        'show_ui'            => true,
//        'show_in_menu'       => true,
//        'query_var'          => true,
//        /*'rewrite'            => array('slug' => 'produkt'),*/
//        'rewrite'            => false,
//        'capability_type'    => 'post',
//        'has_archive'        => false,
//        'hierarchical'       => false,
//        'menu_position'      => 21,
//        'show_in_rest'       => true,
//        'supports'           => array( 'title' ),
//    );
//
//    return $args;
//};
//
//register_post_type( 'sections', $eventType() );
//
//function loadSections() {
//    require_once get_template_directory() . '/inc/front/sections.php';
//}