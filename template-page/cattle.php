<?php
/*
 * template name:cattle
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
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center banner">
            <a href="#"><img src="<?php echo RNG_TDU; ?>/img/cattle-banner.jpeg" alt="" class="img-responsive"></a>
            <a href="#"><img src="<?php echo RNG_TDU; ?>/img/cattle-banner2.png" alt="" class="img-responsive"></a>
        </div><!--.banner-->
    </div><!--.row-->
</div><!--container-->
<?php get_template_part('templates/product', 'feature'); ?>
</div><!--.container-->
<?php get_template_part('templates/blog', 'squrehalf'); ?>
</div><!--.container-->
<div class="vertical-space-4"></div><!--.vertical-space-4-->
<?php get_template_part('templates/qa', 'single'); ?>
<div class="vertical-space-4"></div>
<?php get_template_part('templates/blog', 'videotab'); ?>
<div class="vertical-space-4"></div>
<?php get_template_part('templates/content', 'leaders'); ?>
<?php get_template_part('templates/content', 'box'); ?>
<div class="container">
    <?php get_footer(); ?>