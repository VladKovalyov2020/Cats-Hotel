<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'history-section',
            'title'             => __('History Section'),
            'description'       => __('Block with history'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'chart-area',
            'keywords'          => array( 'history' ),
        ));
    }
});
