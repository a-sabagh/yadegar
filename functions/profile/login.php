<?php

function rng_login_user() {
    if (isset($_POST['rng_login']) && isset($_POST['rng_hidden_login']) && ($_POST['rng_hidden_login'] == 'login_true')) {
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
                global $user_ID;
                $user_ID = $user->ID;
            }
        }//is_valid_nonce
    }//isset rng_login
}

add_action('template_redirect', 'rng_login_user');

