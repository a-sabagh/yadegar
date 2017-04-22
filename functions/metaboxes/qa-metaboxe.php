<?php

function rng_metabox_qa_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_qa_nonce');
    $editor_setting = array(
        'teeny' => true,
        'textarea_rows' => 15,
        'tabindex' => 1
    );
    $question = get_post_meta($post->ID, 'rng_question', TRUE);
    $answer = get_post_meta($post->ID, 'rng_answer', TRUE);
    ?>
    <p>پرسش مطرح شده توسط مشتری: </p>
    <div class="rng_course_metatax" >
        <?php wp_editor($question, 'rng_question', $editor_setting); ?>
    </div>
    <p>پاسخ مطرح شده توسط شما :</p>
    <div class="rng_course_metatax" >
        <?php wp_editor($answer, 'rng_answer', $editor_setting); ?>
    </div>
    <?php
}

function rng_metabox_qa_init() {
    add_meta_box('rng_question_answer', 'پرسش ها و پاسخ ها', 'rng_metabox_qa_input', 'qa', 'normal', 'high');
}

add_action('add_meta_boxes', 'rng_metabox_qa_init');

function rng_metabox_qa_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_qa_nonce']) && wp_verify_nonce($_POST['rng_qa_nonce'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id, 'rng_question', $_POST['rng_question']);
        update_post_meta($post_id, 'rng_answer', $_POST['rng_answer']);
    }
}

add_action('save_post', 'rng_metabox_qa_save');
