<?php

function rng_metabox_scat_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_scat_nonce');
    $categories = get_posts('post_type=scat');
    $category_id = $course_name = array();
    $select_category = get_post_meta($post->ID, 'rng_scat', TRUE);
    ?>
    <p>لطفا یک دسته بندی را برای مطلب خود انتخاب کنید  :</p>
    <select data-placeholder="انتخاب دسته بندی" name="rng_scat" class="chosen chosen-rtl rng-admin-checkbox">
        <option value="">انتخاب دسته بندی</option>
        <?php
        $selected = '';
        foreach ($categories as $category) {
            $selected = ($category->ID == $select_category) ? 'selected' : '';
            echo '<option value="' . $category->ID . '" ' . $selected . '>' . $category->post_title . '</option>';
        }
        ?>
    </select>
    <?php
}

function rng_metabox_scat_init() {
    add_meta_box('rng_scat_meta', 'دسته بندی مطالب', 'rng_metabox_scat_input', array('qa', 'product', 'post'), 'side', 'low');
}

add_action('add_meta_boxes', 'rng_metabox_scat_init');

function rng_metabox_scat_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_scat_nonce']) && wp_verify_nonce($_POST['rng_scat_nonce'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id, 'rng_scat', $_POST['rng_scat']);
    }
}

add_action('save_post', 'rng_metabox_scat_save');
