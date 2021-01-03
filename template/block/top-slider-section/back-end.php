<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'top-slider-section',
            'title'             => __('Top slider section'),
            'description'       => __('Block with slider'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'editor-kitchensink',
            'keywords'          => array( 'top', 'slider'),
        ));
    }
});
