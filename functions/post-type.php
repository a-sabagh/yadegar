<?php

function register_scat_post_type() {

    /*
     * product 
     */

    $product_labels = array(
        'name' => 'محصول',
        'singular_name' => 'محصول',
        'menu_name' => 'محصولات',
        'name_admin_bar' => 'محصولات',
        'add_new' => 'افزودن محصول جدید',
        'add_new_item' => 'افزودن محصول جدید',
        'new_item' => 'محصول جدید',
        'edit_item' => 'ویرایش محصول',
        'view_item' => 'مشاهده محصول',
        'all_items' => 'تمامی محصولات',
        'search_items' => 'جستجو در میان دروس',
        'parent_item_colon' => '',
        'not_found' => 'محصول یافت نشد',
        'not_found_in_trash' => 'محصول در سطل بازیافت نیست'
    );

    $product_args = array(
        'labels' => $product_labels,
        'description' => 'دسته بندی محتوای وبسایت',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor' , 'thumbnail' , 'excerpt'),
    );

    register_post_type('product', $product_args);
    

    /*
     * qa 
     */

    $qa_labels = array(
        'name' => 'پرسش و پاسخ',
        'singular_name' => 'پرسش و پاسخ',
        'menu_name' => 'پرسش و پاسخ',
        'name_admin_bar' => 'پرسش و پاسخ',
        'add_new' => 'افزودن پرسش و پاسخ جدید',
        'add_new_item' => 'افزودن پرسش و پاسخ جدید',
        'new_item' => 'پرسش و پاسخ جدید',
        'edit_item' => 'ویرایش پرسش و پاسخ',
        'view_item' => 'مشاهده پرسش و پاسخ',
        'all_items' => 'تمامی پرسش و پاسخ',
        'search_items' => 'جستجو در میان دروس',
        'parent_item_colon' => '',
        'not_found' => 'پرسش و پاسخ یافت نشد',
        'not_found_in_trash' => 'پرسش و پاسخ در سطل بازیافت نیست'
    );

    $qa_args = array(
        'labels' => $qa_labels,
        'description' => 'دسته بندی محتوای وبسایت',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'qa'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => array('title' , 'thumbnail'),
    );

    register_post_type('qa', $qa_args);
    

    /*
     * scat 
     */

    $labels = array(
        'name' => 'دسته بندی',
        'singular_name' => 'دسته بندی',
        'menu_name' => 'دسته بندی',
        'name_admin_bar' => 'دسته بندی',
        'add_new' => 'افزودن دسته بندی جدید',
        'add_new_item' => 'افزودن دسته بندی جدید',
        'new_item' => 'دسته بندی جدید',
        'edit_item' => 'ویرایش دسته بندی',
        'view_item' => 'مشاهده دسته بندی',
        'all_items' => 'تمامی دسته بندی ها',
        'search_items' => 'جستجو در میان دروس',
        'parent_item_colon' => '',
        'not_found' => 'دسته بندی یافت نشد',
        'not_found_in_trash' => 'دسته بندی در سطل بازیافت نیست'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'دسته بندی محتوای وبسایت',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'scat'),
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-category',
        'supports' => array('title', 'editor' , 'page-attributes'),
    );

    register_post_type('scat', $args);

}

add_action('init', 'register_scat_post_type');
