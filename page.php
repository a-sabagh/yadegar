<?php get_header('single');
if(have_posts()):
    while(have_posts()):
    the_post();

    endwhile;
endif;
?>
<div class="container">
<?php get_footer(); ?>

    