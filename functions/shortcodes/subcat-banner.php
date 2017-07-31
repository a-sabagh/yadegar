<?php

function rng_subcat_banner() {
    ob_start();
    ?>
    <div class="vertical-space-4"></div><!--.vertical-space-4-->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="http://yadegar.co/fa/%d9%85%d8%b1%d8%ba-%d9%87%d8%a7%db%8c-%d8%aa%d8%ae%d9%85-%da%af%d8%b0%d8%a7%d8%b1/" title="مرغ های تخم گذار"><img class="img-responsive" src="http://yadegar.co/fa/wp-content/uploads/2017/06/poultry-banner1.jpeg" alt="" /></a>
            </div>
            <div class="col-md-6 text-center">
                <a href="http://yadegar.co/fa/%d9%85%d8%b1%d8%ba-%d9%87%d8%a7%db%8c-%da%af%d9%88%d8%b4%d8%aa%db%8c/" title="مرغ های گوشتی"><img class="img-responsive" src="http://yadegar.co/fa/wp-content/uploads/2017/06/poultry-banner1.jpeg" alt="" /></a>
                <h3>مرغ های گوشتی</h3>
            </div>
        </div>
    </div>
    <div class="vertical-space-4"></div><!--.vertical-space-4-->
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode('subcat_banner', 'rng_subcat_banner');
