<?php

add_action(
	'init',
	function () {
        if (file_exists(__DIR__ . '/post-types')) {
            $di = new DirectoryIterator(__DIR__ . '/post-types');
            foreach ($di as $file) {
                if (!$file->isDot() && !$file->isDir()) {
                    include_once $file->getRealPath();
                }
            }
        }
        require_once __DIR__ . '/post-types-per-page.php';

	}
);





// Register Post Type rooms
function it4_post_type_rooms() {
    $it4_post_type_rooms_labels = array(
        'name'               => _x( 'Room', 'post type general name' ),
        'singular_name'      => _x( 'Room', 'post type singular name' ),
        'add_new'            => _x( 'Add New Room', 'Service' ),
        'add_new_item'       => __( 'Add New Room' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a rooms' ),
        'not_found'          => __( 'No rooms found' ),
        'not_found_in_trash' => __( 'No rooms found in the Trash' ),
        'parent_item_colon'  => 'Parent room',
        'menu_name'          => 'Rooms'
    );
    $it4_post_type_rooms_args   = array(
        'labels'        => $it4_post_type_rooms_labels,
        'description'   => 'Display rooms',
        'public'        => true,
        'menu_icon'     => 'dashicons-admin-multisite',
        'menu_position' => 20,
        // 'rewrite'        => array('slug' => 'rooms'),
        'show_in_rest'  => true,
        'supports'      => array(
            'title',
            'thumbnail',
            'page-attributes',
            'editor',
            'excerpt'
        ),
        'has_archive'   => true,
        'hierarchical'  => true,
        // 'taxonomies' => array('post_tag')
    );
    register_post_type( 'rooms', $it4_post_type_rooms_args );
}

add_action( 'init', 'it4_post_type_rooms' );