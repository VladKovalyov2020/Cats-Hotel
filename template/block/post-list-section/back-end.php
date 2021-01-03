<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'post-list-section',
            'title'             => __('Post list'),
            'description'       => __('Block with post list'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'grid-view',
            'keywords'          => array( 'posts', 'list' ),
        ));
    }
});
