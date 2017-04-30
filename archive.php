<?php
get_header('single');
if (have_posts()):
    $post_counter = 0;
    echo '<div class="container"><div class="category-box">';
    while (have_posts()):
        the_post();
            if ($post_counter % 2 == 0) {
                ?>
                <div class=row-post>
                    <div class="table-row">    
                    <?php } ?>
                    <div class="row-post-item">
                        <div class="blog-square-in">
                            <a href="<?php the_permalink(); ?>" class="square-left-box">
                                <div class="author"><?php the_author(); ?></div>
                                <h4><?php the_title(); ?></h4>
                                <?php
                                $scat_id = get_post_meta(get_the_ID(), 'rng_scat', TRUE);
                                $scat_icon = get_post_meta($scat_id, 'rng_scat_icon', TRUE);
                                ?>
                                <span class="category"><i class="icon-animals r-<?php echo $scat_icon; ?>"></i></span>
                            </a><!--.square-full-box-->
                        </div><!--.blog-square-in-->
                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div><!--.blog-square-in-->
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
endif;
?>

<div class="container">
    <?php get_footer(); ?>
