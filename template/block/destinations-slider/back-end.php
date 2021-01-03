<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'destinations-slider',
            'title'             => __('Destinations slider'),
            'description'       => __('Block with destinations slider'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'images-alt',
            'keywords'          => array( 'image', 'slider', 'carousel', 'destination'),
        ));
    }
});
