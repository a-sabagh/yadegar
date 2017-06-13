<?php
require_once 'jdf.php';
require_once 'login.php';
require_once 'ticket.php';
require_once 'user-meta.php';
require_once 'reset-pass.php';
require_once 'change-pass.php';
require_once 'registration.php';
require_once 'mail_configure.php';
require_once 'shortcodes/login.php';
require_once 'shortcodes/reset-password.php';

/**
 * Hide admin bar
 */
function rng_disable_admin_bar() {
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action( 'after_setup_theme', 'rng_disable_admin_bar' );
 
/**
 * Redirect back to homepage and not allow access to Dashbord
 */
function rng_redirect_admin(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;      
    }
}
add_action( 'admin_init', 'rng_redirect_admin' );

function rng_reset_check(){
    if(is_user_logged_in() && !(current_user_can('edit_post'))){
        if(is_page(get_option('srng_reset_password_page'))){
            wp_redirect(home_url());
        }     
    }
}
add_action('template_redirect' , 'rng_reset_check');

