<?php

define("RNG_TDU", get_template_directory_uri());
define("RNG_ADMIN", get_template_directory_uri() . "/admin");

function rng_initilize_theme() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('video', 'gallery'));
    add_theme_support('custom-header');
    add_theme_support("menus");
    add_image_size('large-blog', 475, 475, TRUE);
    add_image_size('small-blog', 250, 250, TRUE);
}

require_once 'functions/functions.php';
require_once 'functions/shortcodes/init.php';
require_once 'functions/metaboxes/init.php';
require_once 'functions/post-type.php';
require_once 'functions/scripts.php';
require_once 'functions/menus/init.php';
require_once 'functions/profile/init.php';
if (is_admin()) {
    require_once 'admin/srng-option2.php';
}

function rng_admin_media() {
    wp_enqueue_media();
}

add_action('srng2_option', 'rng_admin_media');
add_action('after_setup_theme', 'rng_initilize_theme');
$menu_position = array(
    "header_menu" => "فهرست بالا",
    "footer_menu" => "فهرست پایین",
    "side_menu" => "فهرست ساید بار"
);
register_nav_menus($menu_position);
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);

function posts_columns_id($defaults) {
    $defaults['wps_post_id'] = 'شناسه';
    $defaults['rng_post_scat'] = 'آیکن دسته بندی';
    return $defaults;
}

function posts_custom_id_columns($column_name, $id) {
    if ($column_name === 'wps_post_id') {
        echo $id;
    }
    if ($column_name === 'rng_post_scat') {
        $post = get_post($id);
        $post_type = get_post_type($post);
        if (!($post_type == 'scat')) {
            $scat_id = get_post_meta($id, 'rng_scat', TRUE);
            $scat_icon = get_post_meta($scat_id, 'rng_scat_icon', TRUE);
            echo '<label class="icon-animals c-' . $scat_icon . '"></label>';
        } else {
            $icon = get_post_meta($id, 'rng_scat_icon', TRUE);
            echo '<label class="icon-animals c-' . $icon . '"></label>';
        }
    }
}
