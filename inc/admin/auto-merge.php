<?php

function fn_360px_auto_merge_menu() {
    if (current_user_can('administrator')) {
        add_submenu_page(
            'options-page',
            'Auto Merge JS & CSS',
            'Auto Merge JS & CSS',
            'manage_options',
            'position',
            'options-auto-merge',
            'fn_360px_edit_options_auto_merge',
            '',
            9999
        );
    }
}
add_action( 'admin_menu', 'fn_360px_auto_merge_menu', 999 );

function add_book_menu_item ($wp_admin_bar) {
    if (current_user_can('administrator')) {
        $args = array(
            'id' => 'auto-merge',
            'title' => 'Auto Merge JS & CSS',
            'href' => admin_url('admin.php?page=options-auto-merge'),
        );

        $wp_admin_bar->add_node($args);
    }
}

add_action('admin_bar_menu', 'add_book_menu_item', 99);

function fn_360px_edit_options_auto_merge () {
    $userID = get_current_user_id();

    if (!empty($_POST)) {
        update_user_meta($userID, 'auto_merge_js', $_POST['autojs']);
        update_user_meta($userID, 'auto_merge_css', $_POST['autocss']);
        ?>
        <div class="notice notice-success is-dismissible" style="margin-left: 0;">
            <p>Changes saved</p>
        </div>
        <?php
    }

    if (empty($_POST) && !empty($_GET) && !empty($_GET['now']) && $_GET['now'] == 'js') {
        update_user_meta($userID, 'auto_merge_js2', 1);
        ?>
        <div class="notice notice-success is-dismissible" style="margin-left: 0;">
            <p>Merge JavaScript is complete</p>
        </div>
        <?php
    }

    if (empty($_POST) && !empty($_GET) && !empty($_GET['now']) && $_GET['now'] == 'css') {
        update_user_meta($userID, 'auto_merge_css2', 1);
        ?>
        <div class="notice notice-success is-dismissible" style="margin-left: 0;">
            <p>Merge CSS is complete</p>
        </div>
        <?php
    }

    $autoMergeJS = ($a = get_user_meta($userID, 'auto_merge_js', true)) ? $a : 0;
    $autoMergeCSS = ($a = get_user_meta($userID, 'auto_merge_css', true)) ? $a : 0;

    ?>
    <h1>Auto Merge JS & CSS</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><strong>Auto Merge JavaScript: </strong></td>
                <td>
                    <label for="autojs1">
                        <input type="radio" name="autojs" value="0" id="autojs1" <?php echo ($autoMergeJS == 0) ? 'checked="checked"' : ''; ?> autocomplete="off">
                        <span>False</span>
                    </label>
                    <label for="autojs2">
                        <input type="radio" name="autojs" value="1" id="autojs2" <?php echo ($autoMergeJS == 1) ? 'checked="checked"' : ''; ?> autocomplete="off">
                        <span>True</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td><strong>Auto Merge CSS: </strong></td>
                <td>
                    <label for="autocss1">
                        <input type="radio" name="autocss" value="0" id="autojcss1" <?php echo ($autoMergeCSS == 0) ? 'checked="checked"' : ''; ?> autocomplete="off">
                        <span>False</span>
                    </label>
                    <label for="autocss2">
                        <input type="radio" name="autocss" value="1" id="autojcss2" <?php echo ($autoMergeCSS == 1) ? 'checked="checked"' : ''; ?> autocomplete="off">
                        <span>True</span>
                    </label>
                </td>
            </tr>
        </table>
        <div style="margin-top: 10px;">
            <input type="submit" name="send" class="button" value="Save" />
        </div>
    </form>
    <h1>Merge now</h1>
    <div>
        <a href="<?php echo admin_url('admin.php?page=options-auto-merge&now=js'); ?>" class="button" >Merge JavaScript</a>
        <a href="<?php echo admin_url('admin.php?page=options-auto-merge&now=css'); ?>" class="button" >Merge CSS</a>
    </div>
    <?php
}