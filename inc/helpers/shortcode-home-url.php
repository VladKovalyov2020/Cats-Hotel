<?php

function fn_360px_get_home_url() {
    return get_home_url();
}

add_shortcode( 'home_url', 'fn_360px_get_home_url' );