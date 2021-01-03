<?php

if (!defined('vCache')) { define('vCache', '1.0.0'); }

function fn_360px_head_default() {
    ?>
    <script type="text/javascript">
        var $g = {};
        var height_next_box = false;
        var WP = {
            homeURL: '<?php echo get_home_url(); ?>/',
            templateURL: '<?php echo get_template_directory_uri(); ?>/',
            cf7ThankYou: '<?php echo get_the_permalink(get_field('page_contact', 'option')); ?>',
            currentLang: '<?php echo get_locale(); ?>',
        };
    </script>
    <?php
}

add_action('wp_head', 'fn_360px_head_default');
add_action('admin_head', 'fn_360px_head_default');

add_action(
    'wp_enqueue_scripts',
    function () {
       // wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.min.css', array(), 'all' );
//        wp_enqueue_style( 'style2', get_template_directory_uri() . '/css/style2.min.css', array(), 'all' );
    }
);

add_action(
    'wp_enqueue_scripts',
    function () {
       /* $keyMap = get_field("option-cmc__google-map-key", "option");
        wp_enqueue_script('map-google', 'https://maps.googleapis.com/maps/api/js?key=' . $keyMap . '&v=3.exp&libraries=geometry,places', array('jquery'), null, true);
        wp_enqueue_script('map-acf', get_template_directory_uri() . '/js/acf-map.min.js', array('jquery'), vCache, true);*/

        // wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/plugins/masonry.pkgd.min.js', array('jquery'), vCache, true );
        // wp_enqueue_script( 'jquery.cookie', get_template_directory_uri() . '/js/plugins/jquery.cookie.js', array('jquery'), vCache, true );
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), vCache, true );

        // $php_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
        // wp_localize_script( 'scripts', 'php_array', $php_array );
        wp_localize_script( 'scripts', 'the_ajax_script', array( 'ajaxurl' => admin_url('admin-ajax.php')) );
    }
);


add_action(
    'admin_head',
    function () {
        wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/css/style-admin.min.css', array(), '1', 'all');

        // wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/plugins/masonry.pkgd.min.js', array('jquery'), vCache, true );
        // wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), vCache, true );
        wp_enqueue_script( 'scripts-admin', get_template_directory_uri() . '/js/scripts-admin.min.js', array('jquery'), vCache, true );

        $php_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
        wp_localize_script( 'scripts-admin', 'php_array', $php_array );
        wp_localize_script( 'scripts', 'php_array', $php_array );

    }
);


// function remove_jquery_migrate( $scripts ) {
//     if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
//         $script = $scripts->registered['jquery'];
//         if ( $script->deps ) {
//             $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
//         }
//     }
// }
// add_action( 'wp_default_scripts', 'remove_jquery_migrate' );