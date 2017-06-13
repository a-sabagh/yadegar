<?php

function rng_update_user() {
    if (isset($_POST['update_user_meta']) && isset($_POST['update_user_meta_hidden']) && $_POST['update_user_meta_hidden'] == 'update_true') {
        $is_valid_nonce = (isset($_POST['update_meta_nonce']) && wp_verify_nonce($_POST['update_meta_nonce'], 'update_meta_nonce_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
            $firstname = sanitize_text_field($_POST['profile_fname']);
            $lname = sanitize_text_field($_POST['profile_lname']);
            $nicename = sanitize_text_field($_POST['profile_nicname']);
            $email = sanitize_text_field($_POST['profile_email']);
            $website = sanitize_text_field($_POST['profile_website']);
            $job = sanitize_text_field($_POST['profile_job']);
            $description = sanitize_text_field($_POST['profile_description']);
            global $wpdb;
            $wpdb->update($wpdb->users, array('user_url' => $website), array('ID' => $user_id));
            if (is_email($email))
                $wpdb->update($wpdb->users, array('user_email' => $email), array('ID' => $user_id));
            update_user_meta($user_id, 'nickname', $nicename);
            update_user_meta($user_id, 'last_name', $lname);
            update_user_meta($user_id, 'first_name', $firstname);
            update_user_meta($user_id, 'job', $job);
            update_user_meta($user_id, 'description', $description);
        }
    }
}

function rng_profile_field($user) {
    $user_id = $user->ID;
    $user_activation_key = get_user_meta($user_id, 'status', TRUE);
    switch ($user_activation_key):
        case '1':
            $user_activation = 'فعال';
            break;
        case '0':
            $user_activation = 'غیرفعال';
            break;
        default :
            $user_activation = 'شما به عنوان مدیر کل وارد شده اید';
    endswitch;
    ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th><label for="user_activation">وضعیت کاربری: </label></th>
                <td><?php echo $user_activation; ?></td>
            </tr>
            <tr>
                <th>شغل</th>
                <td><input type="text" name="profile_job" value="<?php echo $job; ?>" ></td>
            </tr>
        </tbody>
    </table>
    <?php
}

function rng_save_profile_field($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return FALSE;
    } else {
        $job = get_post_meta($post_id, 'status', TRUE);
        if (!empty($job)) {
            update_user_meta($user_id, 'job', $_POST['profile_job']);
        } else {
            add_post_meta($post_id, 'job', $_POST['profile_job']);
        }
    }
}

add_action('template_redirect', 'rng_update_user');
add_action('show_user_profile', 'rng_profile_field');
add_action('edit_user_profile', 'rng_profile_field');
add_action('personal_options_update', 'rng_save_profile_field');
add_action('edit_user_profile_update', 'rng_save_profile_field');
