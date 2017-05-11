<?php
function rng_shortcode_vertical_space(){
    ob_start();
    ?>
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('v_s', 'rng_shortcode_vertical_space');