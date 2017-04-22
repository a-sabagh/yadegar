                    <footer class="row">
                        <div class="col-sm-3 copyright">
                            <p id="AriazDevs"> <a href="http://ariazdevs.com" target="_blank">توسعه گران آریاز</a><img src="<?php echo RNG_TDU; ?>/img/ariazdevs.png" alt="Ariazdevs-co"> - ۲۰۱۶ ©</p>
                        </div><!--.copyright-->
                        <div class="col-sm-7 footer-menu">
                            <?php 
                            $footer_menu = array(
                                "theme_location" => "footer_menu",
                                "container" => FALSE,
                                "depth" => 1
                            );
                            wp_nav_menu($footer_menu);      
                            ?>
                        </div><!--.footer-menu-->
                        <div class="col-sm-2 footer-login">
                            <a href="#" class="login-container">
                                <span class="footer-login-text">لینک ورود اعضا</span>
                                <i class="icon-sprite w-icon-people"></i>
                            </a><!--.login-container-->
                        </div><!--.footer-login-->
                    </footer>
                </div><!--.container-->
            </div><!--#content-->
        </main>
    <?php wp_footer();?>
    </body>
</html>