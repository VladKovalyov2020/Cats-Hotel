<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'custom-list-section',
            'title'             => __('Custom list section'),
            'description'       => __('Block with logos'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'editor-ul',
            'keywords'          => array( 'list','custom'),
        ));
    }
});
