<?php get_header('single');?>
<div class="container">
    <h3>نتایج جستجو بر اساس کلمه کلیدی <?php echo '<span class="red">' . $s . '</span>'; ?></h3>
</div><!--.container-->
<?php
if(have_posts()):
    while(have_posts()):
        the_post();

    endwhile;
endif;
?>
<div class="container">
<?php get_footer(); ?>

    