<!--#############################################################################################-->
<div class="vertical-space-4"></div><!--.vertical-space-4-->
<div class="container">
    <div class="row text-center">
        <h2 class="heading-format2">مقالات برگزیده با موضوع گاو</h2>
    </div><!--.row-->
</div><!--.container-->
<!--#############################################################################################-->
<div class="container">
    <section class="latest-blog">
        <h3 class="section-title">دانش و تجربیات ما</h3>
        <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
        <div class="blog-content">
            <div class="table-row">
                <?php
                $halfsqure_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'meta_key' => 'rng_scat',
                    'meta_value' => 113,
                    'meta_compare' => '=',
                    'meta_type' => 'NUMERIC'
                );
                $halfsqure_query = new WP_Query($halfsqure_args);
                if ($halfsqure_query->have_posts()):
                    $counter = 0;
                    $post_count = $halfsqure_query->post_count;
                    while ($halfsqure_query->have_posts()):
                        $halfsqure_query->the_post();
                        if ($counter == 0) {
                            ?>
                            <div class="blog-square square-full">
                                <?php
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                    $post_img_src = $thumbnail_url[0];
                                    $post_img_alt = $thumbnail_alt;
                                } else {
                                    $post_img_src = RNG_TDU . '/img/post1.png';
                                    $post_img_alt = get_the_excerpt();
                                }
                                ?>
                                <img class="img-responsive img-square-full" src="<?php echo $post_img_src; ?>" alt="<?php echo $post_img_alt; ?>">
                                <div class="square-full-box">
                                    <div class="author"><?php the_author(); ?></div>
                                    <h4><?php the_title(); ?></h4>
                                    <?php
                                    $cat_icon = get_post_meta(113, 'rng_scat_icon', TRUE);
                                    ?>
                                    <span class="category"><i class="icon-animals r-<?php echo $cat_icon; ?>"></i></span>
                                </div><!--.square-full-box-->
                            </div><!--.blog-square-->
                            <?php
                        } elseif ($counter == 1) {
                            ?>
                            <div class="blog-square">
                                <div class="table-row">
                                    <div class="blog-square-in">
                                        <div class="square-left-box">
                                            <div class="author"><?php the_author(); ?></div>
                                            <h4><?php the_title(); ?></h4>
                                            <?php $cat_icon = get_post_meta(113, 'rng_scat_icon', TRUE); ?>
                                            <span class="category"><i class="icon-animals r-<?php echo $cat_icon; ?>"></i></span>
                                        </div><!--.square-full-box-->
                                    </div><!--.blog-square-in-->
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                        $post_img_src = $thumbnail_url[0];
                                        $post_img_alt = $thumbnail_alt;
                                    } else {
                                        $post_img_src = RNG_TDU . '/img/post1.png';
                                        $post_img_alt = get_the_excerpt();
                                    }
                                    ?>
                                    <div class="blog-square-in"><img class="img-responsive" src="<?php echo $post_img_src; ?>" alt="<?php echo $post_img_alt; ?>"></div><!--.blog-square-in-->
                                </div><!--.table-row-->

                                <?php
                                if($post_count == 2) echo '</div>';
                            } elseif ($counter == 2) {
                                ?>

                                <div class="table-row">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                        $post_img_src = $thumbnail_url[0];
                                        $post_img_alt = $thumbnail_alt;
                                    } else {
                                        $post_img_src = RNG_TDU . '/img/post1.png';
                                        $post_img_alt = get_the_excerpt();
                                    }
                                    ?>
                                    <div class="blog-square-in"><img class="img-responsive" src="<?php echo $post_img_src; ?>" alt="<?php echo $post_img_alt; ?>"></div><!--.blog-square-->
                                    <div class="blog-square-in">
                                        <div class="square-right-box">
                                            <div class="author"><?php the_author(); ?></div>
                                            <h4><?php the_title(); ?></h4>
                                            <?php $cat_icon = get_post_meta(113, 'rng_scat_icon', TRUE); ?>
                                            <span class="category"><i class="icon-animals r-<?php echo $cat_icon; ?>"></i></span>
                                        </div><!--.square-full-box-->
                                    </div><!--.blog-square-in-->
                                </div><!--table-row-->
                            </div><!--.blog-square-->

                        <?php
                    }
                    $counter++;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
            </div><!--.table-row-->
        </div><!--.blog-content-->
    </section><!--.latest-blog-->
    <div class="vertical-space-1"></div>
    <div class="row button text-center">
        <a href="" class="button-all">See All Article</a>
    </div><!--.button-->
</div>