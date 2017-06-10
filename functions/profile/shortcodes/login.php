<?php

function rng_shortcode_profile_login() {
    ob_start();
    global $user_ID;
    global $msg;
    echo $msg;
    $user_status = get_user_meta($user_ID, 'status', TRUE);
    global $current_user_id;
    if (!empty($current_user_id)) {
        global $wpdb;
        $wpdb->update($wpdb->users, array('user_activation_key' => ''), array('ID' => $current_user_id));
    }
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
                        <p>اگر رمز عبور خود را فراموش کرده اید <a title="بازیابی پسوورد" target="_blank" href="<?php echo get_permalink(get_option('srng_reset_password_page')); ?>">اینجا</a> کلیک کنید.</p>
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
    } elseif ($user_ID != 0 && $user_status == '1') {
        //userlogin
        global $wpdb;
        $user = wp_get_current_user();
        $user_id = $user->ID;
        $current_user = $wpdb->get_row("SELECT user_login,ID,display_name,user_email,user_url FROM {$wpdb->users} WHERE ID='{$user_id}'");
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
                        <li><a href="#tickets">تیکت</a></li>
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
                        <div class="tab-menu-content" id="tickets">
                            <div class="row ticket-header">
                                <div class="col-md-2 ticket-header-subject">موضوع</div>
                                <div class="col-md-2 ticket-header-date">تاریخ</div>
                                <div class="col-md-2 ticket-header-department">دپارتمان</div>
                                <div class="col-md-6 ticket-header-content">متن تیکت</div>
                            </div><!--.ticket-header-->
                            <div class="row ticket-body">
                                <div class="col-md-2 ticket-body-subject">خوراک های جانداران</div>
                                <div class="col-md-2 ticket-body-date">۱۳۹۳-۰۱-۲۳</div>
                                <div class="col-md-2 ticket-body-department">پشتیبانی</div>
                                <div class="col-md-6 ticket-header-content">متن تیکت این است که لورم ایپسوم متن ساختگی با مفهوم نامشخص که است   </div>
                            </div><!--.ticket-body-->
                            <div class="row ticket-body">
                                <div class="col-md-2 ticket-body-subject">خوراک های جانداران</div>
                                <div class="col-md-2 ticket-body-date">۱۳۹۳-۰۱-۲۳</div>
                                <div class="col-md-2 ticket-body-department">پشتیبانی</div>
                                <div class="col-md-6 ticket-header-content">متن تیکت این است که لورم ایپسوم متن ساختگی با مفهوم نامشخص که است   </div>
                            </div><!--.ticket-body-->
                            <div class="row ticket-body">
                                <div class="col-md-2 ticket-body-subject">خوراک های جانداران</div>
                                <div class="col-md-2 ticket-body-date">۱۳۹۳-۰۱-۲۳</div>
                                <div class="col-md-2 ticket-body-department">پشتیبانی</div>
                                <div class="col-md-6 ticket-header-content">متن تیکت این است که لورم ایپسوم متن ساختگی با مفهوم نامشخص که است   </div>
                            </div><!--.ticket-body-->
                            <br><hr><br>
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-6"><input type="text" name="ticket_subject" placeholder="موضوع" ></div>
                                    <div class="col-md-6">
                                        <select>
                                            <option name="" value="" >امور مالی</option>
                                            <option name="" value="" >پشتیبانی</option>
                                            <option name="" value="" >فروش آنلاین مرغ</option>
                                        </select>
                                    </div>
                                </div><!--.row-->
                                <div class="row" >
                                    <div class="col-md-12">
                                        <textarea name="ticket-text" placeholder="متن تیکت"></textarea>
                                    </div>
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-12"><input type="submit" name="ticket_send" value="ارسال" ></div>
                                </div>
                            </form>
                        </div><!--#tickets-->
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>جدیدترین مقالات</h3>
                                    <div class="profile-latest-blog">
                                        <ul>
                                            <?php
                                            $posts_args = array(
                                                'post_type' => 'post',
                                                'posts_per_page' => 5,
                                            );
                                            $posts = new WP_Query($posts_args);
                                            if ($posts->have_posts()) {
                                                while ($posts->have_posts()) {
                                                    $posts->the_post();
                                                    echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '" >' . get_the_title() . '</a></li>';
                                                }
                                            }
                                            wp_reset_postdata();
                                            ?>
                                        </ul>

                                    </div><!--.profile-latest-blog-->
                                </div>
                                <div class="col-md-6">
                                    <h3>جدیدترین پرسش و پاسخ</h3>
                                    <div class="profile-qa">
                                        <ul>
                                            <?php
                                            $posts_args = array(
                                                'post_type' => 'qa',
                                                'posts_per_page' => 5,
                                            );
                                            $posts = new WP_Query($posts_args);
                                            if ($posts->have_posts()) {
                                                while ($posts->have_posts()) {
                                                    $posts->the_post();
                                                    echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '" >' . get_the_title() . '</a></li>';
                                                }
                                            }
                                            wp_reset_postdata();
                                            ?>
                                        </ul>
                                    </div><!--.profile-qa-->
                                </div>
                            </div>
                        </div><!--.featured-tab-menu-->
                    </div><!--.featured-tab-container-->
                </div><!--.profile-content-->
            </div><!--.row-->
        </div><!--.container-->
        <?php
    } elseif ($user_ID !== 0 && $user_status == '0') {
        ?>
        <div class="alet alert-warning">حساب کاربری شما غیر فعال است لطفا جهت فعال کردن آن به لینک ایمیل بروید.</div>
        <div class="container"><a class="profile-logout" href="<?php echo wp_logout_url(home_url()); ?>">خروج</a></div>
        <?php
    } else {
        ?>
        <h1 class="container">شما به عنوان مدیر کل وارد شده اید.</h1>    
        <?php
    }
    $output = ob_get_clean();
    return $output;
}

add_shortcode('profile_login', 'rng_shortcode_profile_login');
