<?php

function rng_bts_grid_1($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-1"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_1", "rng_bts_grid_1");

function rng_bts_grid_2($atts  = array(), $content) {
    ob_start();
    ?>
    <div class="col-md-2"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_2", "rng_bts_grid_2");

function rng_bts_grid_3($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-3"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_3", "rng_bts_grid_3");

function rng_bts_grid_4($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-4"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_4", "rng_bts_grid_4");

function rng_bts_grid_5($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-5"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_5", "rng_bts_grid_5");

function rng_bts_grid_6($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-6"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_6", "rng_bts_grid_6");

function rng_bts_grid_7($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-7"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_7", "rng_bts_grid_7");

function rng_bts_grid_8($atts  = array(), $content) {
    ob_start();
    ?>
    <div class="col-md-8"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_8", "rng_bts_grid_8");

function rng_bts_grid_9($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-9"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_9", "rng_bts_grid_9");

function rng_bts_grid_10($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-10"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_10", "rng_bts_grid_10");

function rng_bts_grid_11($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-11"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_11", "rng_bts_grid_11");

function rng_bts_grid_12($atts  = array(), $content = "") {
    ob_start();
    ?>
    <div class="col-md-12"><?php echo do_shortcode($content); ?></div>
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("col_12", "rng_bts_grid_12");

