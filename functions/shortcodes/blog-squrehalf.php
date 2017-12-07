<?php

function rng_shortcode_blog_squrehalf($atts) {
    $shortcode = 'blog_squrehalf';
    $pairs = array(
        'id' => 1,
        'title' => 'مقالات برگزیده',
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
    <!--#############################################################################################-->
    <div class="container">
        <div class="text-center">
            <?php
            $scat = get_post($array_atts['id']);
            $scat_title = $scat->post_title;
            ?>
            <h3 class="section-title"><?php echo $array_atts['title']; ?></h3>
            <p class="section-caption"><?php echo $array_atts['caption']; ?></p>
        </div><!--.row-->
    </div><!--.container-->
    <!--#############################################################################################-->
    <div class="blog-content toggle">
        <?php
        $post_squrehalf_args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'meta_key' => 'rng_scat',
            'meta_value' => $post_children_id,
            'meta_compare' => 'IN'
        );
        $post_squrehalf = new WP_Query($post_squrehalf_args);
        if ($post_squrehalf->have_posts()):
            $post_count = $post_squrehalf->post_count;
            $post_counter = 0;
            $row_counter = 0;
            echo '<div class="container"><div class="category-box">';
            while ($post_squrehalf->have_posts()):
                $post_squrehalf->the_post();
                if ($post_counter % 2 == 0) {
                    $row_counter++;
                    ?>
                    <div class=row-post>
                        <div class="table-row">    
                        <?php } ?>
                        <div class="row-post-item">

                            <?php
                            if ($row_counter % 2 == 0) {

                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large-blog', FALSE);
                                    echo '<div class="blog-square-in"><img class="img-responsive" src="' . $thumbnail_url[0] . '" alt="' . $thumbnail_alt . '"></div><!--.blog-square-in-->';
                                } else {
                                    ?>
                                    <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt="<?php echo get_bloginfo("description"); ?>"></div><!--.blog-square-in-->
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
                                    <div class="blog-square-in"><img class="img-responsive" src="<?php echo get_option('srng_default_post_thumbnail'); ?>" alt="<?php echo get_bloginfo("description"); ?>"></div><!--.blog-square-in-->
                                    <?php
                                }
                                ?>
                                <?php
                            }
                            ?>
                        </div><!--.row-post-item-->
                        <?php
                        $post_counter++;
                        if ($post_counter % 2 == 0 || $post_counter == $post_count) {
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
    <div class="vertical-space-1"></div>
    <div class="row button text-center">
        <a href="<?php echo get_category_link(1); ?>" class="button-all">مشاهده تمامی مقالات</a>
    </div><!--.button-->
    <?php
    $output = ob_get_clean();
    return $output;
}

add_shortcode('blog_squrehalf', 'rng_shortcode_blog_squrehalf');
//[blog_squrehalf id=]
