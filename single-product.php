<?php
get_header('single');
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <div class="container" >
            <header class="blog-head product-blog-head">
                <h1 class="blog-title"><?php the_title(); ?></h1><!--.blog-title-->
                <blockquote class="blog-author"><?php the_author(); ?></blockquote><!--.blog-author-->
                <ul class="blog-meta">
                    <li class="meta-eshare"><a href="javascript:emailCurrentPage()">ارسال از طریق ایمیل</a></li>
                    <li class="meta-print"><a href="javascript:printCurrentPage()">پرینت این برگه</a></li>
                </ul><!--.blog-meta-->
            </header><!--.blog-head-->
            <main class="blog-content">
                <div class="row">   
                    <aside class="single-product-thumb col-md-4">
                        <?php
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
                        <img src="<?php echo $product_img_src; ?>" alt="<?php echo $product_img_alt; ?>" />
                    </aside><!--single-product-content-->
                    <article class="single-product-content col-md-8">
                        <?php the_content(); ?>
                        <?php
                        $product_new = get_post_meta(get_the_ID() , 'rng_new_product' , TRUE);
                        $product_best = get_post_meta(get_the_ID() , 'rng_best_seller' , TRUE);
                        if(!empty($product_new)){
                            echo '<strong class="product-tag">جدید</strong>';
                        }
                        if(!empty($product_best)){
                            echo '<strong class="product-tag">پرفروش ترین ها</strong>';
                        }
                        ?>
                    </article><!--.single-product-content-->
                </div><!--.row-->
            </main><!--.blog-content-->
            <?php
        endwhile;
    endif;
    ?>
    <div class="container">
        <?php get_footer(); ?>

