<?php

function rng_shortcode_blog_list() {
    ob_start();
    ?>
    <div class="container">
        <div class="text-center">
            <h2 class="heading-format2">مقالات برگزیده </h2>
        </div>
        <div class="grid">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1
            );
            $bl_query = new WP_Query($args);
            if ($bl_query->have_posts()):
                while ($bl_query->have_posts()):
                    $bl_query->the_post();
                    ?>
                    <div class="grid-item">
                        <div class="search-block">
                            <?php
                            if (has_post_thumbnail()) {
                                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                $post_img_src = $thumbnail_url[0];
                                $post_img_alt = $thumbnail_alt;
                            } else {
                                $post_img_src = RNG_TDU . '/img/article1.jpeg';
                                $post_img_alt = get_the_excerpt();
                            }
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $post_img_src; ?>" alt="<?php echo $post_img_alt; ?>" class="img-responsive" /></a>
                            <a href="<?php the_permalink() ?>" >
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <p><?php echo custom_excerpt(90); ?></p>
                        </div><!--search-block-->
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div><!--.container-->    
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode('blog_list', 'rng_shortcode_blog_list');
