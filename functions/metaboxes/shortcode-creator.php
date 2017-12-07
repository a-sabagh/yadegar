<?php

function rng_shortcode_creator_input($post) {
    ?>
    <div class="rng-shortcode-creator-wrapper">
        <select class="rng-shortcode-creator">
            <option class="blog-squre">آخرین پست ها</option>
            <option class="about-intro">معرفی</option>
            <option class="blog-squrehalf">آخرین پست ها بر اساس دسته بندی</option>
            <option class="product-mix">نمایش محصولات بر اساس دسته بندی</option>
            <option class="product-feature">نمایش محصولات به صورت تب</option>
            <option class="qa-single">آخرین پرسش و پاسخ بر اساس دسته بندی</option>
            <option class="qa-tab">پرسش و پاسخ منو با تب</option>
            <option class="qa-vtab">پرسش و پاسخ تب عمودی</option>
        </select>
        <div class="rng-shortcode blog-squre">
            <?php
            $scat_args = array(
                'post_type' => 'scat',
                'posts_per_page' => -1
            );
            $scats = get_posts($scat_args);
            ?>
            <p>تیتر مقالات را اینجا وارد کنید:</p>
            <input class="shortcode-input blog-squre-title" type="text" name="">
            <p>متن کوتاه در رابطه با مقالات را اینجا وارد کنید:</p>
            <textarea class="shortcode-input blog-squere-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-blog-squre" value="ساخت شورتکد" >
            <input type="text" name="blog_squre_output" class="shortcode-output blog-squre-output">
        </div><!--.blog-squre-->
        <div class="rng-shortcode about-intro">
            <p>تصویر لوگو را انتخاب کنید</p>
            <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس">
            <input type="text" class="rng-link-banner rng-poster-holder about-intro-logo"  >
            <p>تصویر سربرگ را انتخاب کنید</p>
            <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس">
            <input type="text" class="rng-link-banner rng-poster-holder about-intro-header" >
            <p>متن معرفی را اینجا وارد کنید</p>
            <textarea class="shortcode-input about-intro-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-about-intro" value="ساخت شورتکد" >
            <input type="text" name="blog_squre_output" class="shortcode-output about-intro-output">
        </div><!--.about-intro-->
        <div class="rng-shortcode blog-squrehalf">
            <?php
            $scat_args = array(
                'post_type' => 'scat',
                'posts_per_page' => -1
            );
            $scats = get_posts($scat_args);
            ?>
            <p>لطفا دسته بندی مقاله را انتخاب کنید:</p>
            <select class="shortcode-input blog-squrehalf-id chosen">
                <?php
                foreach ($scats as $scat) {
                    echo '<option value="' . $scat->ID . '">' . $scat->post_title . '</option>';
                }
                ?>

            </select>
            <p>تیتر مقالات را اینجا وارد کنید:</p>
            <input class="shortcode-input blog-squrehalf-title" type="text" name="">
            <p>متن کوتاه در رابطه با مقالات را اینجا وارد کنید:</p>
            <textarea class="shortcode-input blog-squrehalf-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-blog-squrehalf" value="ساخت شورتکد" >
            <input type="text" name="blog_squre_output" class="shortcode-output blog-squrehalf-output"/>
        </div><!--.blog-squrehalf-->
        <div class="rng-shortcode product-mix">
            <?php
            $scat_args = array(
                'post_type' => 'scat',
                'posts_per_page' => -1
            );
            $scats = get_posts($scat_args);
            ?>
            <p>لطفا دسته بندی محصولات را انتخاب کنید:</p>
            <select class="shortcode-input product-mix-id chosen">
                <?php
                foreach ($scats as $scat) {
                    echo '<option value="' . $scat->ID . '">' . $scat->post_title . '</option>';
                }
                ?>

            </select>
            <p>تیتر محصولات را اینجا وارد کنید:</p>
            <input class="shortcode-input product-mix-title" type="text" name="">
            <p>متن کوتاه در رابطه با محصولات را اینجا وارد کنید:</p>
            <textarea class="shortcode-input product-mix-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-product-mix" value="ساخت شورتکد" />
            <input type="text" name="blog_squre_output" class="shortcode-output product-mix-output"/>
        </div><!--.product-mix-->
        <div class="rng-shortcode product-feature">
            <p>تیتر محصولات را اینجا وارد کنید:</p>
            <input class="shortcode-input product-feature-title" type="text" name="">
            <p>متن کوتاه در رابطه با محصولات را اینجا وارد کنید:</p>
            <textarea class="shortcode-input product-feature-caption"></textarea>
            <p>دسته بندی های مورد نظر برای نمایش محصولات را انتخاب کنید (حداکثر چهار مورد حداقل یک مورد)</p>
            <select multiple class="shortcode-input product-feature-cat" name="product-feature-cat[]">
                <?php
                $scat_args = array(
                    'post_type' => 'scat',
                    'posts_per_page' => -1
                );
                $scats = get_posts($scat_args);
                foreach ($scats as $scat) {
                    echo '<option value="' . $scat->ID . '">' . $scat->post_title . '</option>';
                }
                ?>
            </select>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-product-feature" value="ساخت شورتکد" />
            <input type="text" name="blog_squre_output" class="shortcode-output product-feature-output"/>
        </div><!--.product-feature-->
        <div class="rng-shortcode qa-single">
            <?php
            $scat_args = array(
                'post_type' => 'scat',
                'posts_per_page' => -1
            );
            $scats = get_posts($scat_args);
            ?>
            <p>لطفا دسته بندی پرسش و پاسخ را انتخاب کنید:</p>
            <select class="shortcode-input qa-single-id chosen">
                <?php
                foreach ($scats as $scat) {
                    echo '<option value="' . $scat->ID . '">' . $scat->post_title . '</option>';
                }
                ?>

            </select>
            <p>تیتر پرسش و پاسخ را اینجا وارد کنید:</p>
            <input class="shortcode-input qa-single-title" type="text" name="">
            <p>متن کوتاه در رابطه با پرسش و پاسخ را اینجا وارد کنید:</p>
            <textarea class="shortcode-input qa-single-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-qa-single" value="ساخت شورتکد" />
            <input type="text" name="blog_squre_output" class="shortcode-output qa-single-output"/>
        </div><!--.qa-single-->
        <div class="rng-shortcode qa-tab">
            <?php
            $scat_args = array(
                'post_type' => 'scat',
                'posts_per_page' => -1
            );
            $scats = get_posts($scat_args);
            ?>
            <p>تیتر پرسش و پاسخ را اینجا وارد کنید:</p>
            <input class="shortcode-input qa-tab-title" type="text" name="">
            <p>متن کوتاه در رابطه با پرسش و پاسخ را اینجا وارد کنید:</p>
            <textarea class="shortcode-input qa-tab-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-qa-tab" value="ساخت شورتکد" />
            <input type="text" name="blog_squre_output" class="shortcode-output qa-tab-output"/>
        </div><!--.qa-tab-->
        <div class="rng-shortcode qa-vtab">
            <?php
            $scat_args = array(
                'post_type' => 'scat',
                'posts_per_page' => -1
            );
            $scats = get_posts($scat_args);
            ?>
            <p>لطفا دسته بندی پرسش وپاسخ را انتخاب کنید:</p>
            <select class="shortcode-input qa-vtab-id chosen">
                <?php
                foreach ($scats as $scat) {
                    echo '<option value="' . $scat->ID . '">' . $scat->post_title . '</option>';
                }
                ?>

            </select>
            <p>تیتر پرسش و پاسخ را اینجا وارد کنید:</p>
            <input class="shortcode-input qa-vtab-title" type="text" name="">
            <p>متن کوتاه در رابطه با پرسش و پاسخ را اینجا وارد کنید:</p>
            <textarea class="shortcode-input qa-vtab-caption"></textarea>
            <input type="button" name="create_shortcode" class="wp-core-ui button create-shortcode-qa-vtab" value="ساخت شورتکد" />
            <input type="text" name="blog_squre_output" class="shortcode-output qa-vtab-output"/>
        </div><!--.qa-vtab-->
    </div>
    <?php
}

function rng_shortcode_creator_init() {
    add_meta_box('rng_shortcode_creator', 'شورتکد ساز', 'rng_shortcode_creator_input', 'page', 'normal', 'low');
}

add_action('add_meta_boxes', 'rng_shortcode_creator_init');
