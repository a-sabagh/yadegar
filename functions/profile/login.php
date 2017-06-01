<?php

function rng_login_user() {
    if (isset($_POST['rng_login']) && isset($_POST['rng_hidden_login']) && ($_POST['rng_hidden_login'] == 'login_true')) {
        if(isset($_GET)){
            $_GET['registration'] = '';
            $_GET['reset_pwd'] = '';
        }
        $is_valid_nonce = (isset($_POST['rng_nonce_login']) && wp_verify_nonce($_POST['rng_nonce_login'], 'rng_login_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $username = $_POST['rng_username'];
            $password = $_POST['rng_password'];
            $remember = $_POST['rng_remember'];
            $creds = array(
                'user_login' => $username,
                'user_password' => $password,
                'rmemeber' => $remember
            );
            $user = wp_signon($creds);
            if(is_wp_error($user)){
                global $msg;
                $msg = '<div class="alet alert-warning">نام کاربری یا پسورد اشتباه است</div>';
            }else{
                global $msg;
                $msg = '<div class="alet alert-success">شما با موفقیت وارد شدید.</div>';
                global $current_user_id;
                $current_user_id = $user->ID;
                wp_redirect(home_url() . '/login');
            }
        }//is_valid_nonce
    }//isset rng_login
}

add_action('template_redirect', 'rng_login_user');

