<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'contact-emails-list',
            'title'             => __('List of emails'),
            'description'       => __('Block with list of emails'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'editor-ul',
            'keywords'          => array( 'list', 'columns', 'emails' ),
        ));
    }
});
