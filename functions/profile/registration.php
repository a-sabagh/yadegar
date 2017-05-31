<?php

function rng_register_user_first() {
    if (isset($_POST['rng_register']) && isset($_POST['rng_hidden_register']) && ($_POST['rng_hidden_register'] == 'register_true')) {
        $is_valid_nonce = (isset($_POST['rng_nonce_register']) && wp_verify_nonce($_POST['rng_nonce_register'], 'rng_register_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $username = sanitize_text_field($_POST['rng_username']);
            $password = sanitize_text_field($_POST['rng_password']);
            $repassword = sanitize_text_field($_POST['rng_repassword']);
            $email = $_POST['rng_email'];
            $register_error = array();
            if ($password !== $repassword) {
                global $msg;
                $msg = '<div class="alet alert-warning">پسورد ها یکسان نیستند.</div>';
                $register_error[0] = 'passwords not equals';
            }
            if (!is_email($email)) {
                global $msg;
                $msg .= '<div class="alet alert-warning">لطفا ایمیل معتبر ارائه دهید.</div>';
                $register_error[1] = 'email not valid';
            }
            if (username_exists($username)) {
                global $msg;
                $msg .= '<div class="alet alert-warning">این نام کاربری قبلا ثبت شده است.</div>';
                $register_error[2] = 'username exist';
            }
            if (empty($username) && empty($password) && empty($repassword) && empty($email)) {
                global $msg;
                $msg .= '<div class="alet alert-warning">تمامی فیلدها الزامی است.</div>';
                $register_error[3] = 'required field';
            }
            if (empty($register_error)) {
                $user = wp_create_user($username, $password, $email);
                if (is_wp_error($user)) {
                    global $msg;
                    $msg = '<div class="alet alert-warning">ثبت نام با شکست مواجه شد.</div>';
                } else {
                    global $msg;
                    $msg = '<div class="alet alert-success">ثبت نام با موفقیت انجام شد لطفا برای تایید ثبت نام ایمیل خود را چک کنید.</div>';
                    global $wpdb;
                    $user_data = $wpdb->get_row("SELECT ID,user_login,user_activation_key FROM {$wpdb->users} WHERE user_login ='{$username}'");
                    $user_id = $user_data->ID;
                    add_user_meta($user_id, 'status', '0');
                    $user_activation_key = $user_data->user_activation_key;
                    $user_login = $username;
                    if (empty($user_activation_key)) {
                        $user_activation_key = wp_generate_password(10, false, false);
                    }
                    global $wpdb;
                    $wpdb->update(
                            $wpdb->users, array('user_activation_key' => $user_activation_key), array('user_login' => $user_login)
                    );
                    $to = $email;
                    $subject = "ثبت نام در وبسایت یادگار";
                    $messages = 'برای تایید ثبت نام خود <a href="' . home_url() . '/login?registration=true&user_login=' . $user_login . '&activation_key=' . $user_activation_key . '" >اینجا</a> کلیک کنید.';
//                    wp_mail($to, $subject, $messages);
                }//is_wp_error
            }//empty register_error
        }//is_valid_nonce
    }//isset rng_register
}

//function rng_register_user

function rng_register_user_second() {
    if (isset($_GET['registration']) && $_GET['registration'] == 'true') {
        $user_login = $_GET['user_login'];
        $activation_key = $_GET['activation_key'];
        global $wpdb;
        $user = $wpdb->get_row("SELECT ID,user_login,user_activation_key FROM {$wpdb->users} WHERE user_login='{$user_login}'");
        $user_id = $user->ID;
        if ($activation_key == $user->user_activation_key) {
            update_user_meta($user_id, 'status', '1');
            $wpdb->update($wpdb->users, array('user_activation_key' => ''), array('user_login' => $user_login));
            global $msg;
            $msg = '<div class="alet alert-success">حساب کاربری شما با موفقیت فعال شد.</div>';
        } else {
            global $msg;
            $msg = '<div class="alet alert-warning">لینک فعال سازی غیر معتبر است</div>';
        }
    }
}

add_action('template_redirect', 'rng_register_user_first', 1);
add_action('template_redirect', 'rng_register_user_second', 2);

