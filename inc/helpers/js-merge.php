<?php

$JSMerge = false;
$userID = get_current_user_id();
$autoMergeJS = ($a = get_user_meta($userID, 'auto_merge_js', true)) ? $a : 0;
$autoMergeJS2 = ($a = get_user_meta($userID, 'auto_merge_js2', true)) ? $a : 0;

if ($autoMergeJS == 1 || $autoMergeJS2 == 1) {
    $JSMerge = true;
}

$templateDir = get_template_directory();
if (!is_admin() && current_user_can('administrator') && $JSMerge) {

    $dirScripts = $templateDir . '/js/';
    $dirBlockScripts = $templateDir . '/template/block/';
    $fileJSPage = $dirScripts . 'scripts-c.min.js';
    $fileJSAdmin = $dirScripts . 'scripts-admin-c.min.js';

    $jsPage = [];
    $jsAdmin = [];

    $di = new DirectoryIterator($dirScripts);
    foreach ($di as $file) {
        if (!$file->isDot() && !$file->isDir()) {
            $path = $file->getPathname();
            $name = $file->getFilename();

            if ($name != 'scripts-admin-c.min.js' && $name != 'scripts-c.min.js' && substr_count(mb_strtolower($name), '.js')) {
                if (!substr_count($name, 'admin')) {
                    $jsPage[] = $path;
                } else if (substr_count($name, 'admin')) {
                    $jsAdmin[] = $path;
                }
            }
        }
    }

    file_put_contents($fileJSPage, ";
(function ($) {" . PHP_EOL . PHP_EOL);

    file_put_contents($fileJSAdmin, ";
(function ($) {" . PHP_EOL . PHP_EOL);

    if (!function_exists('file_put_contents_new_line')) {
        function file_put_contents_new_line($file, $content) {
            file_put_contents($file, $content . PHP_EOL, FILE_APPEND);
        }
    }

    if ($jsPage && count($jsPage)) {
        foreach ($jsPage as $js) {
            $name = basename($js);
            file_put_contents_new_line($fileJSPage, '/*** ' . $name . ' - START ***/');
            file_put_contents_new_line($fileJSPage, file_get_contents($js));
            file_put_contents_new_line($fileJSPage, '/*** ' . $name . ' - END ***/');
        }
    }

    if ($jsAdmin && count($jsAdmin)) {
        foreach ($jsAdmin as $js) {
            $name = basename($js);
            file_put_contents_new_line($fileJSAdmin, '/*** ' . $name . ' - START ***/');
            file_put_contents_new_line($fileJSAdmin, file_get_contents($js));
            file_put_contents_new_line($fileJSAdmin, '/*** ' . $name . ' - END ***/');
        }
    }

    if (file_exists($dirBlockScripts)) {
        $di = new DirectoryIterator($dirBlockScripts);
        foreach ($di as $file) {
            if (!$file->isDot() && $file->isDir()) {
                $js = $file->getPathname() . '/scripts.js';
                if (file_exists($js)) {
                    $name = str_replace($templateDir . '/', '', $js);
                    file_put_contents_new_line($fileJSPage, '/*** ' . $name . ' - START ***/');
                    file_put_contents_new_line($fileJSPage, file_get_contents($js));
                    file_put_contents_new_line($fileJSPage, '/*** ' . $name . ' - END ***/');
                }

                $js = $file->getPathname() . '/scripts-admin.js';
                if (file_exists($js)) {
                    $name = str_replace($templateDir . '/', '', $js);
                    file_put_contents_new_line($fileJSAdmin, '/*** ' . $name . ' - START ***/');
                    file_put_contents_new_line($fileJSAdmin, file_get_contents($js));
                    file_put_contents_new_line($fileJSAdmin, '/*** ' . $name . ' - END ***/');
                }
            }
        }
    }

    file_put_contents_new_line($fileJSPage,  PHP_EOL . PHP_EOL . "}(jQuery));");
    file_put_contents_new_line($fileJSAdmin,  PHP_EOL . PHP_EOL . "}(jQuery));");

    if ($autoMergeJS2 == 1) {
        update_user_meta($userID, 'auto_merge_js2', '0');
    }
}

?>