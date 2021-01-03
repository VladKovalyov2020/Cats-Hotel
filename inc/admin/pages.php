<?php

function fn_360px_cleanup_header_comment( $str ) {
    return trim( preg_replace( '/\s*(?:\*\/|\?>).*/', '', $str ) );
}
