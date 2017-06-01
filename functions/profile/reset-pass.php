<?php

function rng_reset_password_first() {
    if (isset($_POST['reset_password']) && isset($_POST['reset_password_hidden']) && ($_POST['reset_password_hidden'] == 'reset_password_hidden_true')) {
        if(isset($_GET)){
            $_GET['registration'] = '';
            $_GET['reset_pwd'] = '';
        }
        $is_valid_nonce = (isset($_POST['reset_password_nonce']) && wp_verify_nonce($_POST['reset_password_nonce'], 'reset_password_nonce_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $username = $_POST['rng_username'];
            $user = get_user_by('login', $username);
            if ($user) {
                $user_id = $user->ID;
                $user_email = $user->user_email;
                $user_login = $user->user_login;
                $old_activation_key = $user->user_activation_key;
                $new_activation_key = wp_generate_password(10,false,false);
                $activation_key = (empty($old_activation_key)) ? $new_activation_key : $old_activation_key;
                global $wpdb;
		$wpdb->update($wpdb->users,array('user_activation_key' => $activation_key),array('ID' => $user_id),array('%s'),array( '%d' ) );
                $to = $user_email;
                $subject = 'بازیابی رمز عبور حساب کاربری';
                $message = "از حساب کاربری شما در وبسایت تولیدی یادگار تقاضای بازیابی رمز عبور داده شده است\n.";
                $message .= "اگر شما تقاضای تغییر رمز عبور را داده اید <a href=\"" . home_url() . "/reset-password?reset_pwd=true&login=" . rawurldecode($user_login) . "&key=" . rawurldecode($activation_key) . "  \">اینجا</a> کلیک کنید در غیر این صورت این ایمیل را نادیده بگیرید.";
                $email = wp_mail($to, $subject, $message);
                if($email){
                    global $msg;
                    $msg .= '<div class="alet alert-success">ایمیل تایید برای بازیابی پسوورد به شما ارسال شد . جهت تایید ایمیل خود را چک کنید.</div>';
                }else{
                    global $msg;
                    $msg .= '<div class="alet alert-warning">ارسال ایمیل با مشکل مواجه شد. لطفا مجددا تلاش کنید.</div>';
                }
            } else {
                global $msg;
                $msg = '<div class="alet alert-warning">نام کاربری که وارد کرده اید وجود ندارد</div>';
            }
        }
    }
}

function rng_reset_password_second() {
    if (isset($_GET['reset_pwd']) && $_GET['reset_pwd'] == 'true' && isset($_GET['key'])) {
        $reset_pass = FALSE;
        $login = $_GET['login'];
        $activation_key = $_GET['key'];
        $user = get_user_by('login', $login);
        $user_id = $user->ID;
        $user_email = $user->user_email;
        $user_activation_key = $user->user_activation_key;
        if ($user_activation_key == $activation_key) {
            $new_password = wp_generate_password();
            wp_set_password($new_password, $user_id);
            $to = $user_email;
            $subject = 'پسوورد جدید حساب کاربری';
            $message = 'پسوورد جدید حساب کاربری شما در تولیدی یادگار : ' . $new_password . '';
            $email = wp_mail($to, $subject, $message);
            global $front_user_id;
            $front_user_id= $user_id;
            global $msg;
            $msg = '<div class="alet alert-success">پسوورد جدید به ایمیل شما ارسال شد.</div>';
           
        } else {
            global $msg;
            $msg = '<div class="alet alert-warning">لینک تغییر پسوورد نامعتبر است لطفا مجددا تقاضای تغییر پسوورد کنید.</div>';
        }
    }
}

add_action('template_redirect', 'rng_reset_password_first');
add_action('template_redirect', 'rng_reset_password_second');
