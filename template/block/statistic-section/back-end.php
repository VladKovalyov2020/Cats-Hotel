<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'statistic-section',
            'title'             => __('Statistic Section'),
            'description'       => __('Block with statistic data about tour'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'hs',
            'icon'              => 'chart-line',
            'keywords'          => array( 'tour', 'statistic' ),
        ));
    }
});
