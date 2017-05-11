<?php
/*
 * template name:horse
 *
 */
get_header();
?>
<!--#############################################################################################-->
<nav class="content-nav">
    <ul class="content-nav-menu">
        <li><a href="#">Featured Articles</a></li>
        <li><a href="#">Featured Video</a></li>
        <li><a href="#">Feed Calculator</a></li>
        <li><a href="#">Feed Recomendor</a></li>
    </ul><!--content-nav-menu-->
    <ul class="content-nav-icon">
        <li><a href="#"><i class="icon-sprite r-icon-ask"></i></a></li>
        <li><a href="#"><i class="icon-sprite r-icon-locator"></i></a></li>
    </ul><!--.content-nav-icon-->
</nav><!--.content-nav-->
<?php get_template_part('templates/product' , 'mix'); ?>
<div class="vertical-space-4"></div><!--.vertical-space-4-->
<!--#############################################################################################-->
<?php get_template_part('templates/blog' , 'squrehalf'); ?>
<div class="vertical-space-4"></div><!--.vertical-space-4-->
<?php get_template_part('templates/qa' , 'single'); ?>
<div class="vertical-space-4"></div>
<?php get_template_part('templates/blog' , 'videotab') ?>
<div class="vertical-space-4"></div>
<?php get_template_part('templates/content' , 'leaders'); ?>
<?php get_template_part('templates/content' , 'box'); ?>
<?php get_template_part('templates/content' , 'social'); ?>
<div class="container">
    <?php get_footer(); ?>