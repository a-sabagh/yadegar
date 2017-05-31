<?php
get_header();
global $user_ID;
global $msg;
echo $msg;
$user_status = get_user_meta($user_ID , 'status' , TRUE);
if ($user_ID == 0) {
    //userlogout
    ?>
    <div class="container">
        <div class="row text-center">
            <h2 class="heading-format2">فرم ورود و ثبت نام</h2>
        </div><!--.row-->
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
} elseif($user_ID != 0 && $user_status == '1' ) {
    //userlogin
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    $user_login = $current_user->user_login;
    $display_name = $current_user->display_name;
    $email = $current_user->user_email;
    $website = $current_user->user_url;
    $nicename = get_user_meta($user_id, 'nickname', TRUE);
    $lname = get_user_meta($user_id, 'last_name', TRUE);
    $fname = get_user_meta($user_id, 'first_name', TRUE);
    $job = get_user_meta($user_id, 'job', TRUE);
    $description = get_user_meta($user_id, 'description', TRUE);
    ?>
    <div class="container">
        <div class="row text-center">
            <h2 class="heading-format2"><?php echo $display_name; ?> عزیز خوش آمدید</h2>
        </div><!--.row-->
        <div class="row featured-tab">
            <div class="col-md-3 profile-tab">
                <ul class="featured-head">
                    <li><a href="#profile-info">اطلاعات حساب کاربری</a></li>
                    <li><a href="#reset-password">تغییر پسوورد</a></li>
                    <li><a href="#latest-blog">جدیدترین مطالب</a></li>
                </ul><!--.featured-head-->
                <br>
                <a class="profile-logout" href="<?php echo wp_logout_url(home_url()); ?>">خروج</a>
            </div><!--.profile-tab-->
            <div class="col-md-9 profile-content">

                <div class="featured-tab-container">
                    <div class="tab-menu-content" id="profile-info">
                        <form class="user-meta" method="post" action="">
                            <div class="row">
                                <div class="col-md-4"><label class="inline">نام: <input name="profile_fname" type="text" value="<?php echo $fname; ?>" ></label></div>
                                <div class="col-md-4"><label class="inline">نام خانوادگی: <input name="profile_lname" type="text" value="<?php echo $lname; ?>" ></label></div>
                                <div class="col-md-4"><label class="inline">لقب: <input type="text" name="profile_nicname" type="text" value="<?php echo $nicename; ?>" ></label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><label class="inline">ایمیل: <input name="profile_email" type="text" value="<?php echo $email; ?>" ></label></div>
                                <div class="col-md-4"><label class="inline">وب سایت: <input name="profile_website" type="text" value="<?php echo $website; ?>" ></label></div>
                                <div class="col-md-4"><label class="inline">شغل: <input type="text" name="profile_job" type="text" value="<?php echo $job; ?>" ></label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><label>توضیحات کوتاه درباره خودتان: <textarea name="profile_description"><?php echo $description; ?></textarea></label></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="update_user_meta" value="بروزرسانی پروفایل" >
                                    <input type="hidden" name="update_user_meta_hidden" value="update_true" >
                                    <?php wp_nonce_field('update_meta_nonce_true', 'update_meta_nonce'); ?>
                                </div>
                            </div>
                        </form>
                    </div><!--#featured-tab-menu-->
                    <div class="tab-menu-content" id="reset-password">
                        <form action="" method="post">
                            <p class="reset-pass">
                                <label for="old-password">پسوورد فعلی</label>
                                <input type="password" id="old-password" name="rng_old_password" >
                            </p>
                            <p class="new-password">
                                <label for="new-password">پسوورد جدید</label>
                                <input type="password" id="new-password" name="rng_new_password" >
                            </p>
                            <p class="new-repassword">
                                <label for="new-repassword">پسوورد جدید</label>
                                <input type="password" id="new-repassword" name="rng_new_repassword" >
                            </p>
                            <p class="login-submit">
                                <input type="submit" id="rng-change-pass" name="rng_change_pass" value="تغییر پسوورد" >
                                <input type="hidden" name="change_pass_hidden" value="change_pass_true">
                                <?php wp_nonce_field('nonce_change_pass_true', 'change_pass_nonce'); ?>
                            </p>
                        </form>
                    </div><!--.featured-tab-menu-->
                    <div class="tab-menu-content" id="latest-blog">
                        <p>یک متن نمونه برای تب دوم</p>
                    </div><!--.featured-tab-menu-->
                </div><!--.featured-tab-container-->
            </div><!--.profile-content-->
        </div><!--.row-->
    </div><!--.container-->
    <?php
    if (isset($_POST['update_user_meta']) && isset($_POST['update_user_meta_hidden']) && $_POST['update_user_meta_hidden'] == 'update_true') {
        $is_valid_nonce = (isset($_POST['update_meta_nonce']) && wp_verify_nonce($_POST['update_meta_nonce'], 'update_meta_nonce_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $firstname = sanitize_text_field($_POST['profile_fname']);
            $lname = sanitize_text_field($_POST['profile_lname']);
            $nicename = sanitize_text_field($_POST['profile_nicname']);
            $email = sanitize_text_field($_POST['profile_email']);
            $website = sanitize_text_field($_POST['profile_website']);
            $job = sanitize_text_field($_POST['profile_job']);
            $description = sanitize_text_field($_POST['profile_description']);
            update_user_meta($user_id, 'nickname', $nicename);
            update_user_meta($user_id, 'last_name', $lname);
            update_user_meta($user_id, 'first_name', $firstname);
            update_user_meta($user_id, 'job', $job);
            update_user_meta($user_id, 'description', $description);
        }
    }
}elseif($user_ID !== 0 && $user_status == '0'){
    ?>
    <div class="alt alert-warning">حساب کاربری شما غیر فعال است لطفا جهت فعال کردن آن به لینک ایمیل بروید.</div>
    <a class="profile-logout" href="<?php echo wp_logout_url(home_url()); ?>">خروج</a>
    <?php
}else{
    ?>
    <h1>شما به عنوان مدیر کل وارد شده اید.</h1>    
    <?php
}
?>

<div class="container">
    <?php get_footer(); ?>

