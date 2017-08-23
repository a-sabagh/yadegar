<?php
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <div class="row text-center">
            <h3 class="section-title"><?php the_title(); ?></h3>
            <p class="section-caption"></p>
        </div>
        <?php
        echo '<div class="container">';
        the_content();
        echo '</div>';
    endwhile;
endif;
?>
<div class="container">
    <?php get_footer(); ?>

