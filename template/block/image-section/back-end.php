<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'image-section',
            'title'             => __('Image section'),
            'description'       => __('Block with image'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'format-image',
            'keywords'          => array( 'image'),
        ));
    }
});
