<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'people-list-section',
            'title'             => __('People list section'),
            'description'       => __('Block with people list. To edit content of this block go to "Theme Settings" -> "People list" tab'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'format-chat',
            'keywords'          => array( 'people', 'list' ,'contact'),
        ));
    }
});
