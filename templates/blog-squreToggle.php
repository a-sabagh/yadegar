<section class="latest-blog">
    <h3 class="section-title">گزیده ای از مقالات ما</h3>
    <p class="section-caption">سعی بر آن است که مرغداران و دامداران محترم با استفاده از مطالب علمی بتوانند در راستای صنعت مرغداری و دامداری قدم بردارند</p>
    <div class="blog-content toggle">
        <?php
        $rev_row_args = array(
            'post_type' => 'post',
            'posts_per_page' => 8
        );
        $post_rev_row = new WP_Query($rev_row_args);
        if ($post_rev_row->have_posts()):
            $post_counter = 0;
            $row_counter = 0;
            echo '<div class="container"><div class="category-box">';
            while ($post_rev_row->have_posts()):
                $post_rev_row->the_post();
                if ($post_counter % 2 == 0) {
                    $row_counter++;
                    ?>
                    <div class=row-post>
                        <div class="table-row">    
                        <?php } ?>
                        <div class="row-post-item">
                            <?php if ($row_counter % 2 == 0) {
                                ?>

                                <?php
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large-blog', FALSE);
                                    echo '<div class="blog-square-in"><img class="img-responsive" src="' . $thumbnail_url[0] . '" alt="' . $thumbnail_alt . '"></div><!--.blog-square-in-->';
                                } else {
                                    ?>
                                    <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div><!--.blog-square-in-->
                                    <?php
                                }
                                ?>
                                <div class="blog-square-in">
                                    <a href="<?php the_permalink(); ?>" class="square-left-box">
                                        <h4><?php the_title(); ?></h4>
                                        <?php
                                        $scat_id = get_post_meta(get_the_ID(), 'rng_scat', TRUE);
                                        $scat_icon = get_post_meta($scat_id, 'rng_scat_icon', TRUE);
                                        ?>
                                        <span class="category"><i class="icon-animals r-<?php echo $scat_icon; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-in-->
                                <?php
                            } else {
                                ?>
                                <div class="blog-square-in">
                                    <a href="<?php the_permalink(); ?>" class="square-left-box">
                                        <h4><?php the_title(); ?></h4>
                                        <?php
                                        $scat_id = get_post_meta(get_the_ID(), 'rng_scat', TRUE);
                                        $scat_icon = get_post_meta($scat_id, 'rng_scat_icon', TRUE);
                                        ?>
                                        <span class="category"><i class="icon-animals r-<?php echo $scat_icon; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-in-->
                                <?php
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large-blog', FALSE);
                                    echo '<div class="blog-square-in"><img class="img-responsive" src="' . $thumbnail_url[0] . '" alt="' . $thumbnail_alt . '"></div><!--.blog-square-in-->';
                                } else {
                                    ?>
                                    <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div><!--.blog-square-in-->
                                    <?php
                                }
                                ?>

                                <?php
                            }
                            ?>
                        </div><!--.row-post-item-->
                        <?php
                        $post_counter++;
                        if ($post_counter % 2 == 0) {
                            ?>
                        </div><!--.table-row-->
                    </div><!--.related-post-->                    
                    <?php
                }
                wp_reset_postdata();
            endwhile;
            echo '</div></div>';
        endif;
        ?>
    </div><!--.blog-content-->
</section><!--.latest-blog-->
<div class="row button text-center">
    <a href="<?php echo get_category_link(1); ?>" class="button-all">مشاهده تمامی مقالات</a>
</div><!--.button-->