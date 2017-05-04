<?php

function rng_shortcode_qa_vtab($atts) {
    $shortcode = 'qa_vtab';
    $pairs = array(
        'id' => 1
    );
    $array_atts = shortcode_atts($pairs, $atts, $shortcode);
    ?>
    <div class="container">
        <div class="row text-center">
            <h2 class="heading-format2">پاسخ خود رابیابید</h2>
        </div><!--.row-->
    </div><!--.container-->
    <div class="container">
        <h3 class="section-title">پاسخ پرسش ها</h3>
        <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>                    
    </div><!--.container-->
    <!--#############################################################################################-->

    <?php
    $qa_vt_args = array(
        'titiel' => array(),
        'id' => array(),
        'img_src' => array(),
        'img_alt' => array(),
        'question' => array(),
        'answer' => array(),
        'permalink' => array()
    );
    $qa_vt_query_args = array(
        'post_type' => 'qa',
        'posts_per_page' => 5,
        'meta_key' => 'rng_scat',
        'meta_value' => $array_atts['id'],
        'meta_compare' => '=',
        'meta_type' => 'NUMERIC'
    );
    $qa_vt_query = new WP_Query($qa_vt_query_args);
    if ($qa_vt_query->have_posts()):
        while ($qa_vt_query->have_posts()):
            $qa_vt_query->the_post();
            $qa_vt_args['title'][] = get_the_title();
            $qa_vt_args['id'][] = get_the_ID();
            if (has_post_thumbnail()) {
                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                $qa_vt_args['img_alt'][] = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, '', FALSE);
                $qa_vt_args['img_src'][] = $thumbnail_url[0];
            } else {
                $qa_vt_args['img_alt'][] = get_post_meta(get_the_ID(), 'rng_question', TRUE);
                $qa_vt_args['img_src'][] = get_option('srng_default_qa_thumbnail');
            }
            $qa_vt_args['question'][] = get_post_meta(get_the_ID(), 'rng_question', TRUE);
            $qa_vt_args['answer'][] = get_post_meta(get_the_ID(), 'rng_answer', TRUE);
            $qa_vt_args['permalink'][] = get_the_permalink();
        endwhile;
        wp_reset_postdata();
    endif;
    $qa_count = count($qa_vt_args['id']);
    ?>
    <div class="container">
        <div class="row toturial-tab">
            <div class="featured-tab">
                <ul class="featured-head col-md-4 ">
                    <?php
                    for ($i = 0; $i < $qa_count; $i++):
                        echo '<li><a href="#' . $qa_vt_args['id'][$i] . '">' . $qa_vt_args['title'][$i] . '</a></li>';
                    endfor;
                    ?>                
                </ul><!--.featured-head-->
                <div class="featured-tab-container col-md-8">
                    <?php
                    for ($i = 0; $i < $qa_count; $i++):
                        ?>
                        <div class="tab-menu-content" id="<?php echo $qa_vt_args['id'][$i] ?>">
                            <img src="<?php echo $qa_vt_args['img_src'][$i] ?>" alt="<?php echo $qa_vt_args['img_alt'][$i] ?>" class="img-responsive tt-img-thumb">
                            <h3 class="tt-content-title"><?php echo $qa_vt_args['question'][$i]; ?></h3>
                            <p class="tt-content-excerpt"><?php echo rng_custom_excerpt(200, $qa_vt_args['answer'][$i]); ?></p>
                            <div class="text-center">
                                <a href="<?php echo $qa_vt_args['permalink'][$i]; ?>" class="btn-read-more">ادامه مطلب</a>
                            </div><!--.text-center-->
                        </div><!--.featured-tab-menu-->                          
                        <?php
                    endfor;
                    ?>
                </div><!--.featured-content-->
            </div><!--.featured-tab-container-->    
        </div><!--.blog-tab-->
    </div><!--.container-->        
    <?php
}
add_shortcode('qa_vtab', 'rng_shortcode_qa_vtab');