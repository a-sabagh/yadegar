<?php
$qa_args = array(
    'post_type' => 'qa',
    'posts_per_page' => 10
);
$hqa_array = array(
    'icon' => array(),
    'href' => array(),
    'q' => array(),
    'a' => array(),
    'himg_src' => array(),
    'himg_alt' => array(),
);
$qa_counter = 0;
$qa_query = new WP_Query($qa_args);
if ($qa_query->have_posts()):
    while ($qa_query->have_posts()):
        $qa_query->the_post();
        $qa_cat_id = get_post_meta(get_the_ID(), 'rng_scat', TRUE);
        $qa_cat = get_post_meta($qa_cat_id, 'rng_scat_icon', TRUE);
        $hqa_array['icon'][] = $qa_cat;
        $hqa_array['href'][] = "#ft-" . get_the_ID();
        $hqa_array['id'][] = "ft-" . get_the_ID();
        $hqa_array['q'][] = get_post_meta(get_the_ID(), 'rng_question', TRUE);
        $hqa_array['a'][] = get_post_meta(get_the_ID(), 'rng_answer', TRUE);
        if (has_post_thumbnail()) {
            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
            $hqa_array['himg_alt'][] = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, '', FALSE);
            $hqa_array['himg_src'][] = $thumbnail_url[0];
        } else {
            $hqa_array['himg_alt'][] = get_post_meta(get_the_ID(), 'rng_question', TRUE);
            $hqa_array['himg_src'][] = get_option('srng_default_qa_thumbnail');
        }
        $qa_counter++;
    endwhile;
endif;
$hqa_icons = $hqa_array['icon'];
$hqa_href = $hqa_array['href'];
$hqa_id = $hqa_array['id'];
$hqa_q = $hqa_array['q'];
$hqa_a = $hqa_array['a'];
$hqa_himg_src = $hqa_array['himg_src'];
$hqa_himg_alt = $hqa_array['himg_alt'];
?>

<section class="fqa-tab">
    <h3 class="section-title">پرسش های شما پاسخ های ما</h3>
    <p class="section-caption">ما تجربیات چندین ساله خود را در رابطه با دام و طیور با شما به اشتراک می گذاریم</p>
    <div class="featured-tab">
        <ul class="featured-head">
            <?php
            for ($i = 0; $i < $qa_counter; $i++):
                echo '<li><a href="' . $hqa_href[$i] . '"><i class="icon-animals c-' . $hqa_icons[$i] . '"></i></a></li>';
            endfor;
            ?>
        </ul><!--.featured-head-->
        <div class="featured-tab-container">
            <?php
            for ($i = 0; $i < $qa_counter; $i++):
                ?>
                <div class="tab-menu-content" id="<?php echo $hqa_id[$i]; ?>">
                    <img src="<?php echo $hqa_himg_src[$i]; ?>" alt="<?php echo $hqa_himg_alt[$i]; ?>">
                    <div class="qa-content">
                        <div class="row question">
                            <div class="col-md-3 question-icon">Q</div>
                            <div class="col-md-8 question-text"><p><?php echo $hqa_q[$i]; ?></p></div>
                        </div><!--.question-->
                        <div class="row answer">
                            <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                            <div class="col-md-3 answer-icon">A</div>
                            <div class="col-md-7 answer-text"><p class="more"><?php echo $hqa_a[$i]; ?></p></div>
                        </div><!--.answer-->
                    </div><!--.qa-content-->
                </div><!--.tab-menu-content-->    
                <?php
            endfor;
            ?>
            <div class="row button text-center">
                <a href="<?php echo get_post_type_archive_link('qa'); ?>" class="button-all">پرسش ها و پاسخ ها</a>
            </div><!--button-->
        </div><!--.featured-tab-container-->
    </div><!--.featured-tab-->
</section><!--.fqa-->