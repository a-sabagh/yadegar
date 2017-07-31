<?php

function rng_metabox_product_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_product_nonce');
    $new = get_post_meta($post->ID , 'rng_new_product' , TRUE);
    $new_on = ($new == TRUE)? 'checked' : '';
    $best_seller = get_post_meta($post->ID , 'rng_best_seller' , TRUE);
    $best_seller_on = ($best_seller == TRUE) ? 'checked' : '';
    $product_desc = get_post_meta($post->ID , 'rng_product_desc' , TRUE);
    ?>
    <label for="new-product">محصول جدید</label>
    <input type="checkbox" id="new-product" <?php echo $new_on; ?> name="rng_new_product" />
    <hr>
    <label for="best-seller">پرفروش ترین محصول</label>
    <input type="checkbox" id="best-seller" <?php echo $best_seller_on; ?> name="rng_best_seller" />
    <hr>
    <label for="product-desc">توضیحات محصول</label>
    <textarea id="product-desc" name="rng_product_desc" ><?php echo $product_desc; ?></textarea>
    <?php
}

function rng_metabx_product_init() {
    add_meta_box('rng_product_meta', 'جزئیات محصول', 'rng_metabox_product_input', 'product', 'side', 'low');
}

add_action('add_meta_boxes', 'rng_metabx_product_init');

function rng_metabox_product_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_product_nonce']) && wp_verify_nonce($_POST['rng_product_nonce'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id, 'rng_new_product', $_POST['rng_new_product']);
        update_post_meta($post_id, 'rng_best_seller', $_POST['rng_best_seller']);
        update_post_meta($post_id, 'rng_product_desc', $_POST['rng_product_desc']);
    }
}

add_action('save_post', 'rng_metabox_product_save');
