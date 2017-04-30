<?php

define("RNG_TDU", get_template_directory_uri());
define("RNG_ADMIN", get_template_directory_uri() . "/admin");

function rng_initilize_theme() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('video', 'gallery'));
    add_theme_support('custom-header');
    add_theme_support("menus");
    add_image_size('large-blog' , 475 , 475 , TRUE);
    add_image_size('small-blog' , 250 , 250 , TRUE);
}

require_once 'functions/custom-excerpt.php';
require_once 'functions/shortcodes/init.php';
require_once 'functions/metaboxes/init.php';
require_once 'functions/post-type.php';
require_once 'functions/scripts.php';
require_once 'functions/menus/init.php';
add_action('after_setup_theme', 'rng_initilize_theme');
$menu_position = array(
    "header_menu" => "فهرست بالا",
    "footer_menu" => "فهرست پایین",
    "side_menu" => "فهرست ساید بار"
);
register_nav_menus($menu_position);