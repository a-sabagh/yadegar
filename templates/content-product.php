<div class="container">
    <h3 class="section-title"> محصولات</h3>
    <p class="section-caption">جدیدترین محصولات از دسته بندی های اسب و خرگوش</p>
    <div class="product-tab">
        <ul class="tabs">
            <?php
            $categories = array(218, 323, 322);
            $product_args = array(
                "post_type" => "scat",
                "post__in" => $categories,
            );
            $scat = new WP_Query($product_args);
            if ($scat->have_posts()):
                $i = 0;
                while ($scat->have_posts()):
                    $scat->the_post();
                    $scat_icon = get_post_meta(get_the_ID(), "rng_scat_icon", TRUE);
                    ?>
                    <li class="tab-link" data-tab="<?php echo "cp-" . get_the_ID() ?>">
                        <i class="icon-animals r-<?php echo $scat_icon; ?>"></i><!--.product-tab-img-->
                        <span class="product-tab-txt"><?php the_title(); ?></span><!--.product-tab-txt-->
                    </li><!--.tab-link-->
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul><!--.tabs-->
        <div class="tab-container">
            <?php
            $i= 0;
            foreach ($categories as $category):
                ?>
                <div id="<?php echo "cp-" . $category; ?>" class="tab-content"><br><br>
                    <div class="pt-slider">
                        <?php
                        $childrens_ids = get_children($category);
                        array_push($childrens_ids, $category);
                        $products_args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'meta_key' => 'rng_scat',
                            'meta_value' => $category,
                            'meta_compare' => 'IN',
                        );
                        $products = new WP_Query($products_args);
                        if ($products->have_posts()):
                            while ($products->have_posts()):
                                $products->the_post();
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
                                <div class="slider-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo $product_img_src; ?>" class="img-responsive pt-item-image" alt="<?php echo $product_img_alt; ?>">
                                        <h5 class="pt-item-title"><?php the_title(); ?></h5><!--.pt-item-title-->
                                    </a>
                                </div><!--.slider-item-->
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div><!--.pt-slider-->
                </div><!--.tab-content-->
                <?php
                $i++;
            endforeach;
            /*
              ?>


              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product1.png" class="img-responsive pt-item-image">
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product1.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product1.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product1.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product1.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product1.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->

              <?php

              <div id="tab-2" class="tab-content">
              <div class="pt-slider">
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product2.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product2.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product2.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product2.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product2.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product2.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              </div><!--.pt-slider-->
              </div><!--.tab-content-->
              <div id="tab-3" class="tab-content">
              <div class="pt-slider">
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product3.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product3.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product3.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product3.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product3.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product3.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              </div><!--.pt-slider-->
              </div><!--.tab-content-->
              <div id="tab-4" class="tab-content">
              <div class="pt-slider">
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              <div class="slider-item">
              <a href="#">
              <img src="<?php echo RNG_TDU; ?>/img/product.png" class="img-responsive pt-item-image" >
              <h5 class="pt-item-title">Lorem ipsum dolor.</h5><!--.pt-item-title-->
              </a>
              </div><!--.slider-item-->
              </div><!--.pt-slider-->
              </div><!--.tab-content-->
             */
            ?>
        </div><!--.tab-container-->
    </div><!--.product-tab-->
</div><!--.container-->