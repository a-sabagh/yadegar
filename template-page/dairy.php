<?php
/*
 * template name:dairy
 *
 */
get_header();
?>
<?php get_template_part('templates/content' , 'nav'); ?>
<!--#############################################################################################-->
<div class="container">
    <div class="row text-center">
        <h2 class="heading-format2">FEATURED deer ARTICLES</h2>
    </div><!--.row-->
</div><!--.container-->                
<!--#############################################################################################-->
<?php get_template_part('templates/blog' , 'squrehalf'); ?>
<!--#############################################################################################-->
<?php get_template_part('templates/qa' , 'single'); ?>
<!--#############################################################################################-->
<div class="container">
<?php get_footer(); ?>