<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'two-columns-text',
            'title'             => __('Two Columns Text'),
            'description'       => __('Block with custom text and button in two columns'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'editor-table',
            'keywords'          => array( 'text', 'columns', 'button' ),
        ));
    }
});
