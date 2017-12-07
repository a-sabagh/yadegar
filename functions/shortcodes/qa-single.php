<?php

function rng_shortcode_qa_single($atts) {
    $shortcode = 'qa_single';
    $pairs = array(
        'id' => 1,
        'title' => 'پرسش و پاسخ',
        'caption' => ''
    );
    $array_atts = shortcode_atts($pairs, $atts, $shortcode);
    $post_parent = $array_atts['id'];
    $parent_arg = array(
        'post_parent' => $post_parent,
    );
    $post_children = get_children($parent_arg);
    $post_children_id = array();
    foreach ($post_children as $post) {
        $post_children_id[] = $post->ID;
    }
    array_push($post_children_id, $array_atts['id']);
    ob_start();
    ?>
    <div class="container">
        <h3 class="section-title"><?php echo $array_atts['title']; ?></h3>
        <p class="section-caption"><?php echo $array_atts['caption']; ?></p>                    
    </div><!--.container-->
    <div class="container">
        <div class="tab-menu-content" id="featured-tab1">
            <?php
            $qa_args = array(
                'post_type' => 'qa',
                'posts_per_page' => 1,
                'meta_key' => 'rng_scat',
                'meta_value' => $array_atts['id'],
                'meta_compare' => '=',
                'meta_type' => 'NUMERIC'
            );
            $qa_query = new WP_Query($qa_args);
            if ($qa_query->have_posts()):
                while ($qa_query->have_posts()):
                    $qa_query->the_post();
                    if (has_post_thumbnail()) {
                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                        $qa_img_src = $thumbnail_url[0];
                        $qa_img_alt = $thumbnail_alt;
                    } else {
                        $qa_img_src = get_option('srng_default_qa_thumbnail');
                        $qa_img_alt = get_the_excerpt();
                    }
                    ?>
                    <img src="<?php echo $qa_img_src; ?>" alt="<?php echo $qa_img_alt; ?>">
                    <div class="qa-content">
                        <div class="row question">
                            <div class="col-md-3 question-icon">Q</div>
                            <div class="col-md-8 question-text"><p><?php echo get_post_meta(get_the_ID(), 'rng_question', TRUE); ?></p></div>
                        </div><!--.question-->
                        <div class="row answer">
                            <div class="col-md-1 answer-gap"></div>
                            <div class="col-md-3 answer-icon">A</div>
                            <div class="col-md-7 answer-text"><p class="more"><?php echo get_post_meta(get_the_ID(), 'rng_answer', TRUE); ?></p></div>
                        </div><!--.answer-->
                        <div class="row button text-center">
                            <a href="<?php echo get_post_type_archive_link('qa'); ?>" class="button-all">تمامی پرسش ها</a>
                            <a href="<?php echo get_post_permalink(get_option('srng_qa_page')); ?>" class="button-all">سوال بپرسید</a>
                        </div><!--button-->
                    </div><!--.qa-content-->
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div><!--tab-menu-content-->                    
    </div><!--.container-->
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('qa_single','rng_shortcode_qa_single');
//[qa_single id]