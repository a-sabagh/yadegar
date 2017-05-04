<?php

function srng_theme_option_init() {
    add_menu_page('theme_option', 'تنظیمات قالب', 'administrator', 'yadegar-theme-options', 'srng_theme_option', '');
}
function srng_theme_option() {
    $is_valid_nonce = (isset($_POST['srng2_nonce']) && wp_verify_nonce($_POST['srng2_nonce'] , basename(__FILE__)))? TRUE : FALSE;
    if(isset($_POST['srng2_submit']) && $is_valid_nonce){
        update_option('srng_default_post_thumbnail', $_POST['srng_default_post_thumbnail']);
        update_option('srng_default_qa_thumbnail', $_POST['srng_default_qa_thumbnail']);
        update_option('srng_default_page_thumbnail', $_POST['srng_default_page_thumbnail']);
        update_option('srng_profile_page', $_POST['srng_profile_page']);
        update_option('srng_qa_page', $_POST['srng_qa_page']);
    }
    do_action('srng2_option');
    $default_post_thumbnail = get_option('srng_default_post_thumbnail');
    $default_qa_thumbnail = get_option('srng_default_qa_thumbnail');
    $default_page_thumbnails = get_option('srng_default_page_thumbnail');
    $profile_page = get_option('srng_profile_page');
    $qa_page = get_option('srng_qa_page');
    ?>
    <div class="srng2-container">
        <div class="srng2-header">
            
        </div>
        <form action="" method="post" class="srng2">
            <fieldset>
                <h2 class="srng2-title">تنظیمات تصاویر</h2>
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
                <?php $pages = get_posts('post_type=>page', 'post_per_pages=>-1'); ?>
                <p>برگه پروفایل کاربری را انتخاب کنید</p>
                <select name="srng_profile_page" class="select2dropdown">
                    <?php
                    foreach ($pages as $page):
                        $selected = ($profile_page == $page->ID)? 'selected' : '';
                        echo '<option value="' . $page->ID . '" ' . $selected . ' >' . $page->post_title . '</option>';
                    endforeach;
                    ?>
                </select>
                <p>برگه فرم پرسش و پاسخ را انتخاب کنید</p>
                <select name="srng_qa_page" class="select2dropdown" role="listbox">
                    <?php
                    foreach ($pages as $page):
                        $selected = ($qa_page == $page->ID)? 'selected' : '';
                        echo '<option value="' . $page->ID . '" ' . $selected . '>' . $page->post_title . '</option>';
                    endforeach;
                    ?>
                </select>                
            </fieldset>
            <br>
            <fieldset>
                <input type="submit" class="button button-primary button-large" name="srng2_submit" value="ذخیره تنظیمات" />
                <?php wp_nonce_field(basename(__FILE__) , 'srng2_nonce'); ?>
            </fieldset>
        </form>    
    </div><!--.srng2-container-->

    <?php
}
add_action('admin_menu', 'srng_theme_option_init', 11);
