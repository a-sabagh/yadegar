<?php
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
        if (get_post_meta(get_the_ID(), "rng_show_title", TRUE) == 'on'):
            ?>
            <div class="text-center">
                <h3 class="section-title"><?php the_title(); ?></h3>
            </div>
            <?php
        endif;
        echo '<div class="container page-content">';
        the_content();
        echo '</div>';
    endwhile;
endif;
?>
<div class="vertical-space-4"></div><!--.vertical-space-4-->
<div class="container">
    <?php get_footer(); ?>

