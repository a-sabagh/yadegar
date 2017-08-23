<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <main>
            <nav id="main-menu">
                <div id="nav-logo" class="sprite">
                    <h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo('blogname'); ?>"><img class="img-logo" src="<?php echo get_option('srng_logo'); ?>" alt="<?php bloginfo('description') ?>"></a></h1><!--.img-logo-->
                    <div class="nav-btn-meta">
                        <div class="btn-menu"><a href="#">منو</a></div><!--.btn-menu-->
                        <div class="btn-search"><i class="icon-sprite s-search"></i></div><!--.btn-search-->
                        <div class="btn-login"><i class="icon-sprite w-icon-people"></i></div>    
                    </div><!--.nav-btn-meta-->
                </div><!--.nav-logo-->
                <div class="menu-all">

                    <div class="mobile-search-wrapper">
                        <form method="get" action="<?php echo home_url(); ?>" class="mobile-nav-search">
                            <input type="search" name="s" placeholder="جستجو">
                            <span class="cross-clean"></span>
                            <input type="submit" value="">
                        </form><!--.mobile-nav-search-->
                    </div><!--.mobile-search-wrapper-->


                    <div class="mobile-menu-toggler"><a href="#">منوی سایدبار</a></div><!--.mobile-menu-toggler-->
                    <?php /*  ?><div id="nav-search">
                      <span class="icon-sprite s-search"></span>
                      <form method="get" action="<?php echo home_url(); ?>">
                      <input type="text" name="s" placeholder="جستجو">
                      </form>
                      </div><!--#nav-search-->  <?php */ ?>
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
                </div>
                <!--.menu-all-->
            </nav><!--#main-nav-->
            <div id="content">
                <header>
                    <?php
                    global $post;
                    $post_id = $post->ID;
                    $header_text = get_post_meta($post_id, 'rng_header_text', TRUE);
                    if (is_page()):
                        $post_thumbnail_id = get_post_thumbnail_id($post_id);
                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                        if (!empty($thumbnail_url)) {
                            $product_img_src = $thumbnail_url[0];
                            $product_img_alt = $thumbnail_alt;
                        } else {
                            $product_img_src = get_option('srng_default_page_thumbnail');
                            $product_img_alt = get_the_excerpt();
                        }
                    endif;
                    if (is_front_page()) {
                        $product_img_src = get_option('srng_default_page_thumbnail');
                        $product_img_alt = get_the_excerpt();
                    }
                    ?>
                    <img src="<?php echo $product_img_src ?>" class="img-responsive-header" alt="<?php echo $product_img_alt; ?>">
                    <div id="top-menu">
                        <?php
                        wp_nav_menu($top_menu_arg);
                        ?>
                    </div><!--#top-menu-->
                    <div id="icon-button"> 
                        <ul><?php /*
                            <li><a href="" title="تلگرام"><img src="<?php echo RNG_TDU; ?>/img/telegram.png" alt="yadegar.co-telegram"></a></li>
                            <li><a href="" title="اینستاگرام"><img src="<?php echo RNG_TDU; ?>/img/instagram.png" alt="yadegar.co-instagram"></a></li>
                             */  ?>
                            <li>
                                <a href="<?php echo get_permalink(get_option('srng_profile_page')); ?>">
                                    <span class="top-menu-text">حساب کاربری</span>
                                    <i class="icon-sprite w-icon-people"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/place/36%C2%B021'50.5%22N+59%C2%B032'21.1%22E/@36.3640415,59.5370122,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d36.3640372!4d59.5392009" target="_blank">
                                    <span class="top-menu-text">مکان ما روی نقشه</span>
                                    <i class="icon-sprite w-icon-map"></i>
                                </a>
                            </li>
                                 
                        </ul>
                    </div><!--#icon-button-->
                    <?php
                    if (!empty($header_text)):
                        ?>
                        <div class="header-scream">
                            <h3><?php echo $header_text; ?></h3>
                        </div>                        
                        <?php
                    endif;
                    ?>
                </header>
                <!--#############################################################################################-->