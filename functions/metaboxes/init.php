<?php

/* 
 * change fetured image meta title
 */

function rng_replace_feature_title() {
    remove_meta_box('postimagediv', array('qa' , 'page'), 'side');
    add_meta_box('postimagediv', 'تصویر سربرگ را انتخاب کنید: ' , 'post_thumbnail_meta_box', array('page' , 'qa'), 'side', 'low');
}

add_action('do_meta_boxes', 'rng_replace_feature_title');

/* 
 * remove default category and tag 
 */

function my_remove_sub_menus() {
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}
function rng_remove_metaboxes() {
    remove_meta_box( 'categorydiv' , 'post' , 'normal' ); 
    remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'normal' ); 
}
add_action('admin_menu', 'my_remove_sub_menus');
add_action( 'admin_menu' , 'rng_remove_metaboxes' );

/* 
 * new metaboxes
 */

require_once 'qa-metaboxe.php';
require_once 'scat-icon-metabox.php';
require_once 'scat-metabox.php';
require_once 'product.php';
require_once 'page.php';