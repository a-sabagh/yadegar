<?php get_header(); ?>
<div class="container">
    <div class="row text-center">
        <h2 class="heading-format2">فرم ورود و ثبت نام</h2>
    </div><!--.row-->
    <div class="col-md-6">
        <div class=" rng-login-form">
            <?php wp_login_form(); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="rng-register-form">
            <form action="" method="post" >
                <p class="register-username">
                    <label for="rng-username">نام کاربری</label>
                    <input type="text" id="rng-username" name="rng_username" >
                </p>
                <p class="register-password">
                    <label for="rng-password">پسورد</label>
                    <input type="password" id="rng-password" name="rng_password" >
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
                    <input type="submit" id="rng-register" name="rng-register" value="ثبت نام" >
                </p>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <?php get_footer(); ?>

