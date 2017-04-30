<?php get_header('single'); ?>
<!--#############################################################################################-->
<div class="container">
    <?php 
    if(have_posts()):
        while(have_posts()):
        the_post();
        $single_id = get_the_ID();
        ?>
        <div class="blog-head">
            <h1 class="blog-title"><?php the_title(); ?></h1><!--.blog-title-->
            <blockquote class="blog-author"><?php the_author(); ?></blockquote><!--.blog-author-->
            <ul class="blog-meta">
                <li class="meta-eshare"><a href="javascript:emailCurrentPage()">ارسال از طریق ایمیل</a></li>
                <li class="meta-print"><a href="javascript:printCurrentPage()">پرینت این برگه</a></li>
            </ul><!--.blog-meta-->
        </div><!--.blog-head-->
        <div class="blog-content">
            <?php the_content(); ?>
        </div><!--.blog-content-->    
        <?php
        endwhile;
    endif;
    ?>
    <div class="row text-center">
        <h2 class="heading-format2">مطالب مشابه</h2>
    </div><!--.row-->
    <div class="related-post">
        <div class="table-row">
            <?php
                $related_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'meta_key' => 'rng_scat',
                    'meta_value' => get_post_meta(get_the_ID() , 'rng_scat' , TRUE),
                    'meta_compare' => '=',
                    'meta_type' => 'NUMERIC',
                    'post__not_in' => array($single_id)
                );
                $related_query = new WP_Query($related_args);
                if($related_query->have_posts()):
                    while($related_query->have_posts()):
                        $related_query->the_post();
            ?>
            <div class="relate-post-item">
                <div class="blog-square-in">
                    <div class="square-left-box">
                        <div class="author"><?php the_author(); ?></div>
                        <h4><?php the_title(); ?></h4>
                        <?php $scat_icon = get_post_meta(get_post_meta(get_the_ID() , 'rng_scat' , TRUE) , 'rng_scat_icon' , TRUE); ?>
                        <span class="category"><i class="icon-animals r-<?php echo $scat_icon; ?>"></i></span>
                    </div><!--.square-full-box-->
                </div><!--.blog-square-in-->
                <?php
                if (has_post_thumbnail()) {
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                    $related_img_src = $thumbnail_url[0];
                    $related_img_alt = $thumbnail_alt;
                } else {
                    $related_img_src =  RNG_TDU . '/img/product1.png';
                    $related_img_alt = get_the_excerpt();
                }
                ?>
                <div class="blog-square-in"><img class="img-responsive" src="<?php echo $related_img_src; ?>" alt="<?php echo $related_img_alt; ?>"></div><!--.blog-square-in-->
            </div><!--.relate-post-item-->            
            <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
        </div><!--.table-row-->
    </div><!--.related-post-->
    <div class="row button text-center">
        <?php  ?>
        <a href="<?php echo get_category_link(1); ?>" class="button-all">مشاهده تمامی مقالات</a>
    </div><!--.button-->
</div><!--.container-->
<!--#############################################################################################-->
<div class="container">
    <?php get_footer(); ?>