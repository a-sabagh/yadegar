<footer class="row">
    <div class="col-sm-3 copyright">
        <p id="AriazDevs"> <a href="http://ariazdevs.com" target="_blank">توسعه گران آریاز</a><img src="<?php echo RNG_TDU; ?>/img/ariazdevs.png" alt="Ariazdevs-co"> - ۲۰۱۶ ©</p>
    </div><!--.copyright-->
    <div class="col-sm-6 footer-menu">
        <?php
        $footer_menu = array(
        "theme_location" => "footer_menu",
        "container" => FALSE,
        "depth" => 1,
        );
        wp_nav_menu($footer_menu);
        ?>
    </div><!--.footer-menu-->

    <div class="col-sm-3 footer-login">
        <div class="footer-social">
            <?php if (!empty(get_option('srng_instagram'))): ?>
            <a href="<?php echo get_option('srng_instagram'); ?>" target="_blank"  >
                <i class="social instagram"></i>
            </a><!--.instagram-->
            <?php endif; ?>
            <?php if(!empty(get_option('srng_telegram'))): ?>
            <a href="<?php echo get_option('srng_telegram'); ?>" target="_blank" >
                <i class="social telegram"></i>
            </a><!--.instagram-->
            <?php endif; ?>
        </div><!--.footer-social-->
        <a href="<?php echo get_permalink(get_option('srng_profile_page')); ?>" target="_blank" class="login-container">
            <span class="footer-login-text">حساب کاربری</span>
            <i class="icon-sprite w-icon-people"></i>
        </a><!--.login-container-->
    </div><!--.footer-login-->
</footer>
</div><!--.container-->
</div><!--#content-->
</main>
<?php wp_footer(); ?>
</body>
</html>