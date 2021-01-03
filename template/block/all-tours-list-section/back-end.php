<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'all-tours-list-section',
            'title'             => __('All tours list section'),
            'description'       => __('Block with tours list and filter'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'grid-view',
            'keywords'          => array( 'tours', 'list','filter' ),
        ));
    }
});
