<?php

function rng_shortcode_profile_reset_password() {
    ob_start();
    global $msg;
    echo $msg;
    global $front_user_id;
    if(!empty($front_user_id)){
        global $wpdb;
        $wpdb->update($wpdb->users, array('user_activation_key' => ''), array('ID' => $front_user_id));
    }
    ?>
    <div class="container">
        <div class="row text-center">
            <h2 class="heading-format2">بازیابی رمز عبور</h2>
        </div><!--.row-->
        <form method="post" action="">
            <p class="reset-username">
                <label for="rng-reset-username">نام کاربری</label>
                <input type="text" id="rng-reset-username" name="rng_username" >
            </p>
            <p class="reset-username">
                <input type="submit" name="reset_password" value="بازیابی پسوورد" >
                <input type="hidden" name="reset_password_hidden" value="reset_password_hidden_true" >
                <?php wp_nonce_field('reset_password_nonce_true', 'reset_password_nonce'); ?>
            </p>
        </form>
    </div><!--.container-->
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode('profile_reset_password', 'rng_shortcode_profile_reset_password');
