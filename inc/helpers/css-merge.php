<?php

$CSSMerge = false;
$userID = get_current_user_id();
$autoMergeCSS = ($a = get_user_meta($userID, 'auto_merge_css', true)) ? $a : 0;
$autoMergeCSS2 = ($a = get_user_meta($userID, 'auto_merge_css2', true)) ? $a : 0;

if ($autoMergeCSS == 1 || $autoMergeCSS2 == 1) {
    $CSSMerge = true;
}

$templateDir = get_template_directory();
if (!is_admin() && current_user_can('administrator') && $CSSMerge) {

    $dirStyles = $templateDir . '/css/';
    $fileCSSPage = $dirStyles . 'style-c.min.css';
    $fileCSSAdmin = $dirStyles . 'style-admin-c.min.css';

    $cssPage = [];
    $cssAdmin = [];

    $di = new DirectoryIterator($dirStyles);
    foreach ($di as $file) {
        if (!$file->isDot() && !$file->isDir()) {
            $path = $file->getPathname();
            $name = $file->getFilename();

            if ($name != 'style-admin-c.min.css' && $name != 'style-c.min.css' && substr_count(mb_strtolower($name), '.css')) {
                if (!substr_count($name, 'admin')) {
                    $cssPage[] = $path;
                } else if (substr_count($name, 'admin')) {
                    $cssAdmin[] = $path;
                }
            }
        }
    }

    file_put_contents($fileCSSPage, '');
    file_put_contents($fileCSSAdmin, '');

    if (!function_exists('file_put_contents_new_line')) {
        function file_put_contents_new_line($file, $content) {
            file_put_contents($file, $content . PHP_EOL, FILE_APPEND);
        }
    }

    if ($cssPage && count($cssPage)) {
        foreach ($cssPage as $css) {
            $name = basename($css);
            file_put_contents_new_line($fileCSSPage, '/*** css/' . $name . ' - START ***/');
            file_put_contents_new_line($fileCSSPage, file_get_contents($css));
            file_put_contents_new_line($fileCSSPage, '/*** css/' . $name . ' - END ***/');
        }
    }

    if ($cssAdmin && count($cssAdmin)) {
        foreach ($cssAdmin as $css) {
            $name = basename($css);
            file_put_contents_new_line($fileCSSAdmin, '/*** css/' . $name . ' - START ***/');
            file_put_contents_new_line($fileCSSAdmin, file_get_contents($css));
            file_put_contents_new_line($fileCSSAdmin, '/*** css/' . $name . ' - END ***/');
        }
    }

    if ($autoMergeCSS2 == 1) {
        update_user_meta($userID, 'auto_merge_css2', '0');
    }
}

?>