<div class="container">
    <div class="row">
        <div class="col-md-12 text-center banner">
            <img src="<?php echo RNG_TDU; ?>/img/horse-banner.jpeg" alt="" class="img-responsive">
        </div><!--.banner-->
    </div><!--.row-->
</div>
<section class="product">
    <div class="container">
        <div class="row text-center">
            <h2 class="heading-format1">محصولات گاوی</h2>
            <h3 class="large-format">محصولات مرتبط با گاو تولیدی یادگار</h3>
            <p class="product-caption">تولیدی یادگار لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</p><br>
            <div class="product-content">
                <div class="clearfix"></div><!--clearfix-->
                <div class="product-item-container">
                    <?php
                    $product_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'meta_key' => 'rng_scat',
                        'meta_value' => 113,
                        'meta_compare' => '=',
                        'meta_type' => 'NUMERIC'
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
                                $product_img_src =  RNG_TDU . '/img/product1.png';
                                $product_img_alt = get_the_excerpt();
                            }
                            ?>
                            <div class="<?php echo $new_on . ' ' . $best_seller_on; ?> col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                <a href="#" class="product-item">
                                    <img src="<?php echo $product_img_src; ?>" class="img-responsive product-item-image" alt="<?php echo $product_img_alt; ?>" >
                                    <span class="product-item-name"><?php the_excerpt(); ?></span>
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