<?php
/*
 * template name: home 
 */

get_header();
?>
<div class="container">
    <div class="row">
        <?php get_template_part('templates/content' , 'intro'); ?>
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
        <!--#############################################################################################-->
        <?php get_template_part('templates/blog' , 'squre'); ?>
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
        <!--#############################################################################################-->
        <?php get_template_part('templates/qa' , 'tab'); ?>
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
        <!--#############################################################################################-->
    </div><!--.row-->
    <?php get_footer(); ?>
