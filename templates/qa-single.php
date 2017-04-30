<div class="container">
    <div class="row text-center">
        <h2 class="heading-format2">پرسش ها و پاسخ ها</h2>
    </div><!--.row-->
</div><!--.container-->
<div class="container">
    <h3 class="section-title">پاسخ پرسش شما</h3>
    <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>                    
</div><!--.container-->
<div class="container">
    <div class="tab-menu-content" id="featured-tab1">
        <?php 
        $qa_args = array(
            'post_type' => 'qa',
            'posts_per_page' => 1,
            'meta_key' => 'rng_scat',
            'meta_value' => 113,
            'meta_compare' => '=',
            'meta_type' => 'NUMERIC'
        );
        $qa_query = new WP_Query($qa_args);
        if($qa_query->have_posts()):
            while($qa_query->have_posts()):
                $qa_query->the_post();
                if (has_post_thumbnail()) {
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                    $qa_img_src = $thumbnail_url[0];
                    $qa_img_alt = $thumbnail_alt;
                } else {
                    $qa_img_src =  RNG_TDU . '/img/QA/qa-featured-tab1.jpeg';
                    $qa_img_alt = get_the_excerpt();
                }
            ?>
        <img src="<?php echo $qa_img_src; ?>" alt="<?php echo $qa_img_alt; ?>">
            <div class="qa-content">
                <div class="row question">
                    <div class="col-md-3 question-icon">Q</div>
                    <div class="col-md-8 question-text"><p><?php echo get_post_meta(get_the_ID() , 'rng_question' , TRUE); ?></p></div>
                </div><!--.question-->
                <div class="row answer">
                    <div class="col-md-1 answer-gap"></div>
                    <div class="col-md-3 answer-icon">A</div>
                    <div class="col-md-7 answer-text"><p class="more"><?php echo get_post_meta(get_the_ID() , 'rng_answer' , TRUE); ?></p></div>
                </div><!--.answer-->
                <div class="row button text-center">
                    <a href="" class="button-all">Find More Answers</a>
                    <a href="" class="button-all">Ask Question</a>
                </div><!--button-->
            </div><!--.qa-content-->
            <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div><!--tab-menu-content-->                    
</div><!--.container-->