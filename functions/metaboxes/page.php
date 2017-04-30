<?php

function rng_metabox_page_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_page_nonce');
    $header_text = get_post_meta($post->ID , 'rng_header_text' , TRUE);
    ?>
    <p>متن هدر را وارد کنید</p>
    <textarea class="input-full" name="rng_header_text"><?php echo $header_text; ?></textarea>
    <?php
}

function rng_metabx_page_init() {
    add_meta_box('rng_page_meta', 'متن هدر', 'rng_metabox_page_input', 'page', 'side', 'low');
}

add_action('add_meta_boxes', 'rng_metabx_page_init');

function rng_metabox_page_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_page_nonce']) && wp_verify_nonce($_POST['rng_page_nonce'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id , 'rng_header_text' , $_POST['rng_header_text']);
    }
}

add_action('save_post', 'rng_metabox_page_save');