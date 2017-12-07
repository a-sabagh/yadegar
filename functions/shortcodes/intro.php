<?php

function rng_shortcode_intro($atts) {
    $shortcode = "intro";
    $pairs = array(
        "logo" => get_option("srng_logo2"),
        "header" => RNG_TDU . "/img/yadegar-about.jpg",
        "content" => ""
    );
    $array_atts = shortcode_atts($pairs, $atts, $shortcode);
    ob_start();
    ?>
    <section class="intro">
        <div class="col-md-12 text-center intro-logo">
            <img src="<?php echo $array_atts['logo'] ?>" class="img-responsive" alt="<?php echo get_bloginfo("description"); ?>">
        </div>
        <div class="vertical-space-2"></div>
        <div class="video-field">
            <img src="<?php echo $array_atts['header']; ?>" class="img-responsive" alt="<?php echo get_bloginfo('description'); ?>">
        </div><!--.video-field-->
        <div class="background-text-horse">
            <p><?php echo $array_atts['content']; ?></p>
        </div><!--.background-text-->
    </section><!--.intro-->

    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode("intro" , "rng_shortcode_intro" );

