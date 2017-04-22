<?php

function rng_category_metabox_input($post) {
    wp_nonce_field(basename(__FILE__) , 'rng_category_nonce');
    $scat_icon = get_post_meta($post->ID , 'rng_scat_icon' , TRUE);
    ?>
    <div class="scat-icon">
        <label for="c-deer" class="icon-animals c-deer"></label>
        <input type="radio" id="c-deer" name="rng_scat_icon" <?php if($scat_icon == 'deer') echo 'checked=""'; ?> value="deer" />    
    </div>
    <div class="scat-icon">
        <label for="c-pig" class="icon-animals c-pig"></label>
        <input type="radio" id="c-pig" name="rng_scat_icon" <?php if($scat_icon == 'pig') echo 'checked=""'; ?> value="pig" />   
    </div>
    <div class="scat-icon">
        <label for="c-mouse" class="icon-animals c-mouse"></label>
        <input type="radio" id="c-mouse" name="rng_scat_icon" <?php if($scat_icon == 'mouse') echo 'checked=""'; ?>  value="mouse" />    
    </div>
    <div class="scat-icon">
        <label for="c-certificate" class="icon-animals c-certificate"></label>
        <input type="radio" id="c-certificate" name="rng_scat_icon" <?php if($scat_icon == 'certificate') echo 'checked=""'; ?> value="certificate" />  
    </div>
    <div class="scat-icon">
        <label for="c-rabbit" class="icon-animals c-rabbit"></label>
        <input type="radio" id="c-rabbit" name="rng_scat_icon" <?php if($scat_icon == 'rabbit') echo 'checked=""'; ?> value="rabbit" />    
    </div>
    <div class="scat-icon">
        <label for="c-cock" class="icon-animals c-cock"></label>
        <input type="radio" id="c-cock" name="rng_scat_icon" <?php if($scat_icon == 'cock') echo 'checked=""'; ?> value="cock" />  
    </div>
    <div class="scat-icon">
        <label for="c-horse" class="icon-animals c-horse"></label>
        <input type="radio" id="c-horse" name="rng_scat_icon" <?php if($scat_icon == 'horse') echo 'checked=""'; ?> value="horse" />    
    </div>
    <div class="scat-icon">
        <label for="c-goat" class="icon-animals c-goat"></label>
        <input type="radio" id="c-goat" name="rng_scat_icon" <?php if($scat_icon == 'goat') echo 'checked=""'; ?> value="goat" />    
    </div>
    <div class="scat-icon">
        <label for="c-fish" class="icon-animals c-fish"></label>
        <input type="radio" id="c-fish" name="rng_scat_icon" <?php if($scat_icon == 'fish') echo 'checked=""'; ?> value="fish" />    
    </div>
    <div class="scat-icon">
        <label for="c-dairy" class="icon-animals c-dairy"></label>
        <input type="radio" id="c-dairy" name="rng_scat_icon" <?php if($scat_icon == 'dairy') echo 'checked=""'; ?> value="dairy" />  
    </div>
    <div class="scat-icon">
        <label for="c-cattle" class="icon-animals c-cattle"></label>
        <input type="radio" id="c-cattle" name="rng_scat_icon" <?php if($scat_icon == 'cattle') echo 'checked=""'; ?> value="cattle" />  
    </div>
    <div class="scat-icon">
        <label for="c-bird" class="icon-animals c-bird"></label>
        <input type="radio" id="c-bird" name="rng_scat_icon" <?php if($scat_icon == 'bird') echo 'checked=""'; ?> value="bird" />    
    </div>
    <?php
}

function rng_category_metabox_init() {
    add_meta_box('rng_category_icon', 'انتخاب آیکن دسته بندی', 'rng_category_metabox_input', 'scat', 'side', 'low');
}

add_action('add_meta_boxes', 'rng_category_metabox_init');

function rng_category_metaboxes_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_category_nonce']) && wp_verify_nonce($_POST['rng_category_nonce'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id , 'rng_scat_icon' , $_POST['rng_scat_icon']);
    }
}

add_action('save_post', 'rng_category_metaboxes_save');
