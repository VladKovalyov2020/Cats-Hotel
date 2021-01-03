<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
    <html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient {
        filter: none;
    }
</style>
<![endif]-->

<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div class="body-cover"></div>
    <div class="preloader">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    <!-- BEGIN of header -->
    <header class="header">
        <div class="row header-row">


            <div class="columns header-logo-column">
                <?php $header_mobile_logo = get_field('header_mobile_logo','options') ?>
                <div class="logo <?php echo $header_mobile_logo ? 'has-mobile-logo' : '' ?>">
                    
                    <?php //show_custom_logo(); ?>
                    <?php if($header_mobile_logo = get_field('header_mobile_logo','options')): ?>
                        <a class="mobile-logo show-for-small" href="<?php bloginfo('url') ?>"><img src="<?php echo $header_mobile_logo['sizes']['max_400'] ?>" alt=""></a>
                    <?php endif; ?> 
                    <?php if($header_mobile_logo_white = get_field('header_mobile_logo_white','options')): ?>
                        <a class="mobile-logo show-for-small mobile-logo-white" href="<?php bloginfo('url') ?>"><img src="<?php echo $header_mobile_logo_white['sizes']['max_400'] ?>" alt=""></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="columns header-menu-column">
                <nav class="top-bar" id="main-menu">
                    <?php
                    if (has_nav_menu('header-menu')) {
                        wp_nav_menu(array('theme_location' => 'header-menu',
                            'menu_class' => 'menu header-menu dropdown',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-close-on-click-inside="false">%3$s</ul>',
                            'walker' => new pl360_Navigation()));
                    }
                    ?>
                    <div class="header-mobile-info show-for-small">
                        <div class="header-contacts">
                            <?php if($say_hello = get_field('say_hello','options')): ?>
                                <span class="hello"><?php echo $say_hello ; ?></span>
                            <?php endif; ?>
                            <div class="header-contacts-phone">
                                <?php if($email = get_field('email','options')): ?>
                                    <span class="header-email header-info" ><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span>
                                <?php endif; ?>
                                 <?php if($phone = get_field('phone','options')): ?>
                                    <span class="header-phone header-info" ><a href="tel:<?php echo preparePhone($phone) ?>"><?php echo $phone ?></a></span>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                        
                    </div>
                </nav>
            </div>
            <div class="columns header-buttons-column">
                <div class="header-buttons-column-container">
                    <?php do_action('wpml_add_language_selector'); ?>
                    <div id="nav-icon2">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <?php if($header_button = get_field('header_button','options')): ?>
                        <a class="custom-button hide-for-small" href="<?php echo $header_button['url'] ?>" <?php echo $header_button['target'] ? 'target="'.$header_button['target'].'"' :'' ?> ><?php echo $header_button['title'] ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <!-- END of header -->