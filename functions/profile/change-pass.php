<?php
function rng_change_password(){
    if (isset($_POST['rng_change_pass']) && isset($_POST['change_pass_hidden']) && ($_POST['change_pass_hidden'] == 'change_pass_true')) {
        $is_valid_nonce = (isset($_POST['change_pass_nonce']) && wp_verify_nonce($_POST['change_pass_nonce'], 'nonce_change_pass_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $old_pass = sanitize_text_field($_POST['rng_old_password']);
            $new_pass = sanitize_text_field($_POST['rng_new_password']);
            $new_repass = sanitize_text_field($_POST['rng_new_repassword']);
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
            $user_pass = $current_user->user_pass;
            $change_pss_error = array();
            if(!wp_check_password($old_pass , $user_pass , $user_id)){
                global $msg;
                $msg = '<div class="alet alert-warning">پسوورد فعلی به اشتباه وارد شده است.</div>';
                $change_pss_error[0] = 'current password false';
            }
            if($new_pass !== $new_repass){
                global $msg;
                $msg = '<div class="alet alert-warning">پسورد ها یکسان نیستند.</div>';
                $change_pss_error[0] = 'passwords not equals';
            }
            if(empty($change_pss_error)){
                wp_set_password($new_pass , $user_id);
                wp_redirect(get_permalink(get_option('srng_profile_page')) . '?change_pass=true');
                exit();
            }
        }
    }
}
function rng_change_pass_result(){
    if(isset($_GET['change_pass']) && $_GET['change_pass'] == 'true'){
        global $msg;
        global $msg;
        $msg = '<div class="alet alert-success">تغییر پسوورد با موفقیت انجام شد لطفا مجددا با پسوورد جدید وارد شوید.</div>';
    }
}
add_action('template_redirect' , 'rng_change_pass_result' , 2);
add_action('template_redirect' , 'rng_change_password' , 1);