<?php

function rng_shortcode_blog_squre($atts) {
    $shortcode = 'blog_squre';
    $pairs = array(
        'title' => 'آخرین مقالات',
        'caption' => ''
    );
    $array_atts = shortcode_atts($pairs, $atts, $shortcode);
    ob_start();
    ?>
    <section class="latest-blog">
        <h3 class="section-title"><?php echo $array_atts['title']; ?></h3>
        <p class="section-caption"><?php echo $array_atts['caption']; ?></p>
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
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode('blog_squre', 'rng_shortcode_blog_squre');
