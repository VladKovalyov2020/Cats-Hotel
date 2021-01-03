<?php

function the_section($name, $path = false) {
    $url = get_template_directory() . '/template/section/' . $name . '.php';
    if (file_exists($url)) {
        include $url;
    } else {
        echo '<br>Section "' . $name . '" not exists<br>';
    }
}