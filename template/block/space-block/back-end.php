<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'space-block',
            'title'             => __('Space block'),
            'description'       => __('Block with spacee.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'image-flip-vertical',
            'keywords'          => array( 'space', 'spacer'),
        ));
    }
});

