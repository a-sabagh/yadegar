<section class="latest-blog">
    <h3 class="section-title">گزیده ای از مقالات ما</h3>
    <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،</p>
    <div class="blog-content">
        <?php
        $rev_row_args = array(
            'post_type' => 'post',
            'posts_per_page' => 6
        );
        $post_rev_row = new WP_Query($rev_row_args);
        if ($post_rev_row->have_posts()):
            $counter = 1;
            $post_count = $post_rev_row->post_count();
            while ($post_rev_row->have_posts()):
                $post_rev_row->the_post();
                $post_cat_id = get_post_meta(get_the_ID(), 'rng_scat', TRUE);
                $post_cat = get_post_meta($post_cat_id, 'rng_scat_icon', TRUE);
                if ($counter == 1) {
                    ?>
                    <div class="table-row">
                        <div class="blog-square square-full">
                            <?php
                            if (has_post_thumbnail()) {
                                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large-blog', FALSE);
                                echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                            } else {
                                ?>
                                <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt="<?php the_excerpt(); ?>"></div>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>" class="square-full-box">
                                <div class="author"><?php the_author(); ?></div>
                                <h4><?php the_title(); ?></h4>
                                <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                            </a><!--.square-full-box-->
                        </div><!--.blog-square-->    
                        <?php
                    } elseif ($counter == 2) {
                        ?>
                        <div class="blog-square">
                            <div class="table-row">
                                <div class="blog-square-in">
                                    <a href="<?php the_permalink(); ?>" class="square-left-box">
                                        <div class="author"><?php the_author(); ?></div>
                                        <h4><?php the_title(); ?></h4>
                                        <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-in-->
                                <div class="blog-square-in">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'small-blog', FALSE);
                                        echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                    } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt=""></div>
                                    <?php } ?>
                                </div><!--.blog-square-in-->
                            </div><!--.table-row-->    
                            <?php
                            if ($post_count == 2)
                                echo '</div>';
                        } elseif ($counter == 3) {
                            ?>
                            <div class="table-row">
                                <div class="blog-square-in">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'small-blog', FALSE);
                                        echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                    } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt=""></div>
                                    <?php } ?>
                                </div><!--.blog-square-->
                                <div class="blog-square-in">
                                    <a href="<?php the_permalink(); ?>" class="square-right-box">
                                        <div class="author"><?php the_author(); ?></div>
                                        <h4><?php the_title(); ?></h4>
                                        <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-in-->
                            </div><!--table-row-->
                        </div><!--.blog-square-->
                    </div><!--.table-row-->    
                    <?php
                } elseif ($counter == 4) {
                    ?>
                    <div class="table-row">
                        <div class="blog-square">
                            <div class="table-row">
                                <div class="blog-square-in">
                                    <a href="<?php the_permalink(); ?>" class="square-left-box">
                                        <div class="author"><?php the_author(); ?></div>
                                        <h4><?php the_title(); ?> </h4>
                                        <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-in-->
                                <div class="blog-square-in">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'small-blog', FALSE);
                                        echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                    } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt=""></div>
                                    <?php } ?>                                        </div><!--.blog-square-in-->
                            </div><!--.table-row-->    
                            <?php
                            if ($post_count == 4)
                                echo '</div>';
                        } elseif ($counter == 5) {
                            ?>
                            <div class="table-row">
                                <div class="blog-square-in">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large-blog', FALSE);
                                        echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                    } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt=""></div>
                                    <?php } ?>                                        </div><!--.blog-square-->
                                <div class="blog-square-in">
                                    <a href="<?php the_permalink(); ?>" class="square-right-box">
                                        <div class="author"><?php the_author(); ?></div>
                                        <h4><?php the_title(); ?></h4>
                                        <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-in-->
                            </div><!--table-row-->
                        </div><!--.blog-square-->    
                        <?php
                    } elseif ($counter == 6) {
                        ?>
                        <div class="blog-square square-full">
                            <?php
                            if (has_post_thumbnail()) {
                                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large-blog', FALSE);
                                echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                            } else {
                                ?>
                                <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt=""></div>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>" class="square-full-box">
                                <div class="author"><?php the_author(); ?></div>
                                <h4><?php the_title(); ?></h4>
                                <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                            </a><!--.square-full-box-->
                        </div><!--.blog-square-->
                    </div>    
                    <?php
                }
                $counter++;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div><!--.blog-content-->
</section><!--.latest-blog-->