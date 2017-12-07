<?php

function srng_theme_option_init() {
    add_menu_page('theme_option', 'تنظیمات قالب', 'administrator', 'yadegar-theme-options', 'srng_theme_option', '');
}

function srng_theme_option() {
    $is_valid_nonce = (isset($_POST['srng2_nonce']) && wp_verify_nonce($_POST['srng2_nonce'], basename(__FILE__))) ? TRUE : FALSE;
    if (isset($_POST['srng2_submit']) && $is_valid_nonce) {
        update_option('srng_default_post_thumbnail', $_POST['srng_default_post_thumbnail']);
        update_option('srng_default_qa_thumbnail', $_POST['srng_default_qa_thumbnail']);
        update_option('srng_default_page_thumbnail', $_POST['srng_default_page_thumbnail']);
        update_option('srng_profile_page', $_POST['srng_profile_page']);
        update_option('srng_qa_page', $_POST['srng_qa_page']);
        update_option('srng_logo', $_POST['srng_logo']);
        update_option('srng_default_product_img', $_POST['srng_default_product_img']);
        update_option('srng_reset_password_page', $_POST['srng_reset_password_page']);
        update_option('srng_instagram', $_POST['srng_instagram']);
        update_option('srng_telegram', $_POST['srng_telegram']);
//        update_option('srng_map_link', $_POST['srng_map_link']);
    }
    do_action('srng2_option');
    $default_post_thumbnail = get_option('srng_default_post_thumbnail');
    $default_qa_thumbnail = get_option('srng_default_qa_thumbnail');
    $default_page_thumbnails = get_option('srng_default_page_thumbnail');
    $profile_page = get_option('srng_profile_page');
    $reset_password_page = get_option('srng_reset_password_page');
    $qa_page = get_option('srng_qa_page');
    $logo = get_option('srng_logo');
    $default_product_img = get_option('srng_default_product_img');
    $instagram = get_option('srng_instagram');
    $telegram = get_option('srng_telegram');
//    $map_link = get_option('srng_map_link');
    ?>
    <div class="srng2-container">
        <div class="srng2-header">

        </div>
        <form action="" method="post" class="srng2">
            <fieldset>
                <h2 class="srng2-title">تنظیمات تصاویر</h2>
                <p>لوگوی منو را انتخاب کنید: </p>
                <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>
                <input type="text" class="rng-link-banner rng-poster-holder" name="srng_logo" value="<?php echo $logo; ?>" />
                <p>تصویر پیش فرض برای محصولات را انتخاب کنید: </p>
                <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>
                <input type="text" class="rng-link-banner rng-poster-holder" name="srng_default_product_img" value="<?php echo $default_product_img; ?>" />
                <p>تصویر پیش فرض برای نوشته ها را انتخاب کنید:</p>
                <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>
                <input type="text" class="rng-link-banner rng-poster-holder" name="srng_default_post_thumbnail" value="<?php echo $default_post_thumbnail; ?>" />
                <p>تصویر پیش فرض برای پرسش و پاسخ را انتخاب کنید:</p>
                <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>
                <input type="text" class="rng-link-banner rng-poster-holder" name="srng_default_qa_thumbnail" value="<?php echo $default_qa_thumbnail; ?>" />
                <p>تصویر پیش فرض برای سربرگ را انتخاب کنید:</p>
                <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>
                <input type="text" class="rng-link-banner rng-poster-holder" name="srng_default_page_thumbnail" value="<?php echo $default_page_thumbnails; ?>" />
            </fieldset>
            <fieldset>
                <h2 class="srng2-title">تنظیمات برگه ها</h2>
                <?php
                $param = array(
                    'post_type' => 'page',
                    'posts_per_page' => -1
                );
                $pages = get_posts($param);
                ?>
                <p>برگه پروفایل کاربری را انتخاب کنید</p>
                <select name="srng_profile_page" class="select2dropdown">
                    <?php
                    foreach ($pages as $page):
                        $selected = ($profile_page == $page->ID) ? 'selected' : '';
                        echo '<option value="' . $page->ID . '" ' . $selected . ' >' . $page->post_title . '</option>';
                    endforeach;
                    ?>
                </select>
                <p>برگه بازیابی رمزعبور را انتخاب کنید</p>
                <select name="srng_reset_password_page" class="select2dropdown">
                    <?php
                    foreach ($pages as $page):
                        $selected = ($reset_password_page == $page->ID) ? 'selected' : '';
                        echo '<option value="' . $page->ID . '" ' . $selected . ' >' . $page->post_title . '</option>';
                    endforeach;
                    ?>
                </select>
                <p>برگه فرم پرسش و پاسخ را انتخاب کنید</p>
                <select name="srng_qa_page" class="select2dropdown" role="listbox">
                    <?php
                    foreach ($pages as $page):
                        $selected = ($qa_page == $page->ID) ? 'selected' : '';
                        echo '<option value="' . $page->ID . '" ' . $selected . '>' . $page->post_title . '</option>';
                    endforeach;
                    ?>
                </select>                
            </fieldset>
            <fieldset>
                <h2 class="srng2-title">تنظیمات شبکه های اجتماعی</h2>
                <table>
                    <tr>
                        <td>اینستاگرام</td>
                        <td><input type="text" style="width: 400px; text-align: left; direction: ltr;" name="srng_instagram" value="<?php echo $instagram; ?>" ></td>
                    </tr>
                    <tr>
                        <td>تلگرام</td>
                        <td><input type="text" style="width: 400px; text-align: left;direction: ltr;" name="srng_telegram" value="<?php echo $telegram; ?>" ></td>
                    </tr>
                </table>
            </fieldset>
            <?php /* ?>
            <fieldset>
                <h2 class="srng2-title">نقشه گوگل</h2>
                <table>
                    <tr>
                        <td>لینک نقشه</td>
                        <td><input type="text" style="width: 400px; text-align: left; direction: ltr;" name="srng_map_link" value="<?php echo $map_link; ?>" ></td>
                    </tr>
                </table>
            </fieldset>
            <?php */ ?>
            <br>
            <fieldset>
                <input type="submit" class="button button-primary button-large" name="srng2_submit" value="ذخیره تنظیمات" />
                <?php wp_nonce_field(basename(__FILE__), 'srng2_nonce'); ?>
            </fieldset>
        </form>    
    </div><!--.srng2-container-->

    <?php
}

add_action('admin_menu', 'srng_theme_option_init', 11);
