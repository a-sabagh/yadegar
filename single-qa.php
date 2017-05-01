<?php get_header('single');
if(have_posts()):
    while(have_posts()):
    the_post();
?>
<div class="container" >
        <div class="blog-head qa-blog-head">
            <h1 class="blog-title"><?php the_title(); ?></h1><!--.blog-title-->
            <blockquote class="blog-author"><?php the_author(); ?></blockquote><!--.blog-author-->
            <ul class="blog-meta">
                <li class="meta-eshare"><a href="javascript:emailCurrentPage()">ارسال از طریق ایمیل</a></li>
                <li class="meta-print"><a href="javascript:printCurrentPage()">پرینت این برگه</a></li>
            </ul><!--.blog-meta-->
        </div><!--.blog-head-->
    <div class="blog-content">
        <h2><?php echo get_post_meta(get_the_ID() , 'rng_question' , TRUE); ?></h2>
        <p><?php echo '<strong>پاسخ: </strong>' . get_post_meta(get_the_ID() , 'rng_answer' , TRUE); ?></p>
    </div><!--.blog-content-->
</div><!--.container-->
<?php
    endwhile;
endif;
?>
<div class="container">
<?php get_footer(); ?>

    