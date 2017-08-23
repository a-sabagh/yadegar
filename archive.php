<?php
get_header('single');
if (have_posts()):
    $post_counter = 0;
    $row_counter = 0;
    echo '<div class="container"><div class="category-box toggle">';
    while (have_posts()):
        the_post();
        if ($post_counter % 2 == 0) {
            $row_counter++;
            ?>
            <div class="row-post">
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
                if ($post_counter % 2 == 0 || $post_count == $post_counter) {
                    ?>
                </div><!--.table-row-->
            </div><!--.related-post-->     
            <?php
            
        }
        wp_reset_postdata();
    endwhile;
    echo '</div></div>';
    rng_pagination();
endif;
?>

<div class="container">
    <?php get_footer(); ?>
