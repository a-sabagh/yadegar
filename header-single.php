<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1" />
        <?php wp_head(); ?>
    </head>
    <body class="category">
        <main>
            <nav id="main-menu">
                <div id="nav-logo" class="sprite">
                    <img class="img-logo" src="<?php echo RNG_TDU; ?>/img/logo.png" alt=""><!--.img-logo-->
                    <div class="nav-btn-meta">
                        <div class="btn-menu"><a href="#">MENU</a></div><!--.btn-menu-->
                        <div class="btn-search"><i class="icon-sprite s-search"></i></div><!--.btn-search-->
                        <div class="btn-login"><i class="icon-sprite w-icon-people"></i></div>    
                    </div><!--.nav-btn-meta-->
                </div><!--.nav-logo-->
                <div class="menu-all">
                    <div class="mobile-search-wrapper">
                        <form method="GET" action="#" class="mobile-nav-search">
                            <input type="search" name="s" placeholder="Search">
                            <span class="cross-clean"></span>
                            <input type="submit" value="">
                        </form><!--.mobile-nav-search-->
                    </div><!--.mobile-search-wrapper-->
                    <div class="mobile-menu-toggler"><a href="#">side menu</a></div><!--.mobile-menu-toggler-->
                    <div id="nav-search">
                        <span class="icon-sprite s-search"></span>
                        <form action="index.html" method="GET">
                            <input type="text" name="s" placeholder="Search">
                        </form>
                    </div><!--#nav-search-->
                    <div id="mobile-top-menu" class="hide">
                        <ul>
                            <li>
                                <a href="#">behind the checkerboard</a>
                                <ul>
                                    <li><a href="#">Our Farm</a></li>
                                    <li><a href="#">Our Expert</a></li>
                                    <li><a href="#">Our Quality</a></li>
                                </ul>
                            </li>
                            <li><a href="#">find answers</a></li>
                            <li><a href="#">purina merchandlise</a></li>
                        </ul>
                    </div><!--#mobile-top-menu-->
                    <ul class="side-menu">
                        <li><a href="#"><i class="icon-animals w-deer"></i><span class="menu-name">deer</span></a></li>
                        <li><a href="#"><i class="icon-animals w-goat"></i><span class="menu-name">Goat</span></a></li>
                        <li><a href="#"><i class="icon-animals w-pig"></i><span class="menu-name">Pig</span></a></li>
                        <li><a href="#"><i class="icon-animals w-deer"></i><span class="menu-name">deer</span></a></li>
                        <li><a href="#"><i class="icon-animals w-deer"></i><span class="menu-name">Deer</span></a></li>
                        <li><a href="#"><i class="icon-animals w-goat"></i><span class="menu-name">Goat</span></a></li>
                        <li><a href="#"><i class="icon-animals w-horse"></i><span class="menu-name">Horse</span></a></li>
                        <li><a href="#"><i class="icon-animals w-pig"></i><span class="menu-name">Pig</span></a></li>
                    </ul>
                </div><!--.menu-all-->
            </nav><!--#main-nav-->
            <div id="content">
                <header>
                    <div id="top-menu">
                        <ul>
                            <li>
                                <a href="#">behind the checkerboard</a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img class="sub-menu-img" src="<?php echo RNG_TDU; ?>/img/navIcon1.png" alt="">
                                            <span class="sub-menu-text">Our Farm</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="sub-menu-img" src="<?php echo RNG_TDU; ?>/img/navIcon2.png" alt="">
                                            <span class="sub-menu-text">Our Expert</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="sub-menu-img" src="<?php echo RNG_TDU; ?>/img/navIcon4.png" alt="">
                                            <span class="sub-menu-text">Our Quality</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">find answers</a></li>
                            <li><a href="#">purina merchandlise</a></li>
                        </ul>
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