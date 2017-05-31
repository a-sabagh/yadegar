<?php
require_once 'mail_configure.php';
require_once 'login.php';
require_once 'registration.php';
require_once 'change-pass.php';
require_once 'reset-pass.php';

/**
 * Hide admin bar
 */
function rng_disable_admin_bar() {
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}
//add_action( 'after_setup_theme', 'rng_disable_admin_bar' );
 
/**
 * Redirect back to homepage and not allow access to Dashbord
 */
function rng_redirect_admin(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;      
    }
}
//add_action( 'admin_init', 'rng_redirect_admin' );
