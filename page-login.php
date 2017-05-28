<?php
get_header();
global $user_ID;
if ($user_ID == 0) {
    //userlogout
    ?>
    <div class="container">
        <div class="row text-center">
            <h2 class="heading-format2">فرم ورود و ثبت نام</h2>
        </div><!--.row-->
        <?php
        global $msg;
        echo $msg;
        ?>
        <div class="col-md-6">
            <div class=" rng-login-form">
                <form action="" method="post">
                    <p class="login-username">
                        <label for="rng-login-username">نام کاربری</label>
                        <input type="text" id="rng-login-username" name="rng_username" >
                    </p>
                    <p class="login-password">
                        <label for="rng-login-password">پسورد</label>
                        <input type="password" id="rng-login-password" name="rng_password" >
                    </p>
                    <p class="login-remember">
                        <label>
                            <input name="rng_remember" id="rng-remember" type="checkbox"> مرا به خاطر بسپار
                        </label>
                    </p>
                    <p class="login-submit">
                        <input type="submit" id="rng-login" name="rng_login" value="ورود" >
                        <input type="hidden" name="rng_hidden_login" value="login_true">
                        <?php wp_nonce_field('rng_login_true', 'rng_nonce_login'); ?>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="rng-register-form">
                <form action="" method="post" >
                    <p class="register-username">
                        <label for="rng-register-username">نام کاربری</label>
                        <input type="text" id="rng-register-username" name="rng_username" >
                    </p>
                    <p class="register-password">
                        <label for="rng-register-password">پسورد</label>
                        <input type="password" id="rng-register-password" name="rng_password" >
                    </p>
                    <p class="register-repassword">
                        <label for="rng-repassword">تکرار پسورد</label>
                        <input type="password" id="rng-repassword" name="rng_repassword" >
                    </p>
                    <p class="register-email">  
                        <label for="rng-email">ایمیل</label>
                        <input type="text" id="rng-email" name="rng_email" >
                    </p>
                    <p class="register-submit">
                        <input type="submit" id="rng-register" name="rng_register" value="ثبت نام" >
                        <input type="hidden" name="rng_hidden_register" value="register_true">
                        <?php wp_nonce_field('rng_register_true', 'rng_nonce_register'); ?>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <?php
} else {
    //userlogin
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    ?>


    <?php
}
?>

<div class="container">
    <?php get_footer(); ?>

