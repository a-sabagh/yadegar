<?php
/*
 * template name: تمام عرض 
 */

get_header();
if(have_posts()):
    while(have_posts()):
    the_post();
    the_content();
    endwhile;
endif;
?>
<div class="container">
<?php get_footer(); ?>

    