<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'tour-info-block',
            'title'             => __('Tour Information Block'),
            'description'       => __('Block with all the information and slider about certain tour'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'index-card',
            'keywords'          => array( 'tour', 'text', 'content', 'slider', 'carousel' ),
        ));
    }
});
