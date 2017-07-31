<?php

function rng_script_init() {

    /*
     * enqueue style
     */

    wp_enqueue_style("reset", RNG_TDU . "/css/reset.css", array());
    wp_enqueue_style("general", RNG_TDU . "/css/general.css", array("reset"));
    wp_enqueue_style("sprite", RNG_TDU . "/css/sprite.css", array("reset"));
    wp_enqueue_style("fonts", RNG_TDU . "/css/fonts.css", array("sprite"));
    wp_enqueue_style("BTS-rtl", RNG_TDU . "/css/BTS-rtl-grid.css", array("fonts"));
    wp_enqueue_style("carousel", RNG_TDU . "/css/carousel.css", array("BTS-rtl"));
    wp_enqueue_style("shortcode", RNG_TDU . "/css/shortcode.css", array("carousel"));
    wp_enqueue_style("slick", RNG_TDU . "/css/slick.css", array("shortcode"));
    wp_enqueue_style("layout", RNG_TDU . "/css/layout.css", array("slick"));
    wp_enqueue_style("responsive", RNG_TDU . "/css/responsive.css", array("layout"));
    wp_enqueue_style("style", RNG_TDU . "/style.css", array("responsive"));

    /*
     * enqueue scripts
     */

    wp_enqueue_script("carousel", RNG_TDU . "/js/carousel.js", array("jquery"), '', TRUE);
    wp_enqueue_script("mixitup", RNG_TDU . "/js/mixitup.min.js", array(), '', TRUE);
    wp_enqueue_script("slick", RNG_TDU . "/js/slick.js", array("jquery"), '', TRUE);
    if(is_search() || is_home() || is_page()){
        wp_enqueue_script("script", RNG_TDU . "/js/script.js", array("jquery", "mixitup", "slick", "masonry"), '', TRUE);
    }else{
        wp_enqueue_script("script", RNG_TDU . "/js/script.js", array("jquery", "mixitup", "slick"), '', TRUE);
    }
}

add_action("wp_enqueue_scripts", "rng_script_init");

/*
 * admin style and script
 */

if (is_admin()) {

    function admin_script() {
        wp_enqueue_style("admin-style", RNG_ADMIN . "/css/admin-style.css", array());
        wp_enqueue_style("sprite", RNG_TDU . "/css/sprite.css", array());
        wp_enqueue_style("chosen", RNG_ADMIN . "/css/chosen.min.css", array());
        wp_enqueue_style("select2", RNG_ADMIN . "/css/select2.css", array());
        wp_enqueue_script("chosen", RNG_ADMIN . "/js/chosen.jquery.min.js", array("jquery"), '', TRUE);
        wp_enqueue_script("select2", RNG_ADMIN . "/js/select2.js", array("jquery"), '', TRUE);
        wp_enqueue_script("admin-script", RNG_ADMIN . "/js/admin-script.js", array("jquery" , "chosen" , "select2"), '', TRUE);
    }

    add_action("admin_enqueue_scripts", "admin_script");
}
