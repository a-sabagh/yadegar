<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <main class="category">
            <nav id="main-menu">
                <div id="nav-logo" class="sprite">
                    <img class="img-logo" src="<?php echo RNG_TDU; ?>/img/logo.png" alt=""><!--.img-logo-->
                    <div class="nav-btn-meta">
                        <div class="btn-menu"><a href="#">منو</a></div><!--.btn-menu-->
                        <div class="btn-search"><i class="icon-sprite s-search"></i></div><!--.btn-search-->
                        <div class="btn-login"><i class="icon-sprite w-icon-people"></i></div>    
                    </div><!--.nav-btn-meta-->
                </div><!--.nav-logo-->
                <div class="menu-all">
                    <div class="mobile-search-wrapper">
                        <form method="post" class="mobile-nav-search">
                            <input type="search" name="s" placeholder="جستجو">
                            <span class="cross-clean"></span>
                            <input type="submit" value="">
                        </form><!--.mobile-nav-search-->
                    </div><!--.mobile-search-wrapper-->
                    <div class="mobile-menu-toggler"><a href="#">منو سایدبار</a></div><!--.mobile-menu-toggler-->
                    <div id="nav-search">
                        <span class="icon-sprite s-search"></span>
                        <form method="post">
                            <input type="text" name="s" placeholder="جستجو">
                        </form>
                    </div><!--#nav-search-->
                    <div id="mobile-top-menu" class="hide">
                        <?php 
                        $top_menu_arg = array(
                            'theme_location' => "header_menu",
                            'container' => FALSE,
                            'depth' => 2
                        );
                        wp_nav_menu($top_menu_arg);
                        ?>
                    </div><!--#mobile-top-menu-->
                    <?php
                    $side_menu_args = array(
                        "menu_class" => "side-menu",
                        "theme_location" => "side_menu",
                        "container" => FALSE,
                        "depth" => 1,
                        "walker" => new rng_side_walker()
                    );
                    wp_nav_menu($side_menu_args);
                    ?>
                </div><!--.menu-all-->
            </nav><!--#main-nav-->
            <div id="content">
                <header>
                    <div id="top-menu">
                        <?php wp_nav_menu($top_menu_arg); ?>
                    </div><!--#top-menu-->
                    <div id="icon-button"> 
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="top-menu-text">Bussiness Link login</span>
                                    <i class="icon-sprite w-icon-people"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="top-menu-text">Retallers Nearby</span>
                                    <i class="icon-sprite w-icon-map"></i>
                                </a>
                            </li>
                        </ul>
                    </div><!--#icon-button-->
                </header>