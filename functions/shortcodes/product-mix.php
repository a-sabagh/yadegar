<?php

function rng_shortcode_product_mix($atts) {
    $shortcode = 'product_mix';
    $pairs = array(
        'id' => 1,
        'title' => 'محصولات برگزیده',
        'caption' => ''
    );
    $array_atts = shortcode_atts($pairs, $atts, $shortcode);
    $post_parent = $array_atts['id'];
    $parent_arg = array(
        'post_parent' => $post_parent,
    );
    $post_children = get_children($parent_arg);
    $post_children_id = array();
    foreach ($post_children as $post) {
        $post_children_id[] = $post->ID;
    }
    array_push($post_children_id, $array_atts['id']);
    ob_start();
    ?>
    <section class="product">
        <div class="container">
            <div class="row text-center">
                <h2 class="heading-format1">محصولات ما</h2>
                <h3 class="large-format"><?php echo $array_atts['title']; ?></h3>
                <p class="product-caption"><?php echo $array_atts['caption']; ?></p><br>
                <div class="product-content">
                    <div class="clearfix"></div><!--clearfix-->
                    <div class="product-item-container">
                        <?php
                        $product_args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'meta_key' => 'rng_scat',
                            'meta_value' => $post_children_id,
                            'meta_compare' => 'IN',
                        );
                        $product_query = new WP_Query($product_args);
                        if ($product_query->have_posts()):
                            while ($product_query->have_posts()):
                                $product_query->the_post();
                                $new = get_post_meta(get_the_ID(), 'rng_new_product', TRUE);
                                $new_on = ($new == TRUE) ? 'new' : '';
                                $best_seller = get_post_meta(get_the_ID(), 'rng_best_seller', TRUE);
                                $best_seller_on = ($best_seller == TRUE) ? 'best-seller' : '';
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                    $product_img_src = $thumbnail_url[0];
                                    $product_img_alt = $thumbnail_alt;
                                } else {
                                    $product_img_src = RNG_TDU . '/img/product1.png';
                                    $product_img_alt = get_the_excerpt();
                                }
                                ?>
                                <div class="<?php echo $new_on . ' ' . $best_seller_on; ?> col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="product-item">
                                        <img src="<?php echo $product_img_src; ?>" class="img-responsive product-item-image" alt="<?php echo $product_img_alt; ?>" >
                                        <span class="product-item-name"><?php echo get_post_meta(get_the_ID() , 'rng_product_desc' , TRUE); ?></span>
                                    </a><!--product-item-->
                                </div><!--.mix-->
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div><!--.product-item-container-->
                </div><!--.product-content-->
            </div><!--.row-->
        </div><!--.container-->
    </section><!--.product-->
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode('product_mix', 'rng_shortcode_product_mix');
