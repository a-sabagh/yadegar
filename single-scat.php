<?php get_header("single"); ?>
<div class="container">
    <?php
    global $post;
    $scat_id = strval($post->ID);
    $page_id = $post->ID;
    $scat_title = $post->post_title;
    $scat_args = array(
        'post_type' => 'scat',
        'posts_per_page' => -1
    );
    $scat_array = get_posts($scat_args);
//    var_dump($scat_array);
    $scats = array();
    foreach ($scat_array as $scat) {
        $scats['title'][] = $scat->post_title;
        $scats['id'][] = strval($scat->ID);
        $scats['permalink'][] = get_permalink($scat->ID);
    }
    ?>
    <div class="row text-center">
        <h2 class="heading-format2">مقالات بر اساس دسته بندی <?php echo $scat_title; ?></h2>
    </div><!--.row-->
    <h3 class="section-title">جدیدترین مقالات</h3>
    <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
    <form class="search-box" action="#">
        <input type="text" class="search-box-input" name="s" placeholder="جستجو در وبسایت" />
        <input type="submit"class="search-box-btn icon-sprite g-search" value="" />
    </form><!--.searchbox-->
    <div class="category-box">
        <div class="category-box-title">
            <h3>دسته بندی های مطالب<span class="cb-title-link"></span></h3>
        </div><!--.category-title-->
        <div class="category-box-content">
            <ul>
                <?php
                $scat_counter = 0;
                foreach ($scat_array as $scat) {
                    $class = ($scats['id'][$scat_counter] === $scat_id) ? 'class="active"' : '';
                    echo '<li><a ' . $class . ' href="' . $scats['permalink'][$scat_counter] . '">' . $scats['title'][$scat_counter] . '</a></li>';
                    $scat_counter++;
                }
                ?>
            </ul>
        </div><!--.category-content-->
    </div><!--.category-box-->
    <!--#############################################################################################-->


    <?php
    $article_args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'rng_scat',
                'value' => $page_id,
                'compare' => '=',
                'type' => 'NUMERIC'
            )
        )
    );
    $posts = new WP_Query($article_args);
    $post_counter = 0;
    if ($posts->have_posts()):
        $post_count = $posts->post_count;
        while ($posts->have_posts()):
            $posts->the_post();
            if ($post_counter % 2 == 0) {
                ?>
                <div class=row-post>
                    <div class="table-row">    
                    <?php } ?>
                    <div class="row-post-item">
                        <div class="blog-square-in">
                            <div class="square-left-box">
                                <div class="author"><?php the_author(); ?></div>
                                <h4><?php the_title(); ?></h4>
                                <?php
                                $scat_id = get_post_meta(get_the_ID(), 'rng_scat', TRUE);
                                $scat_icon = get_post_meta($scat_id, 'rng_scat_icon', TRUE);
                                ?>
                                <span class="category"><i class="icon-animals r-<?php echo $scat_icon; ?>"></i></span>
                            </div><!--.square-full-box-->
                        </div><!--.blog-square-in-->
                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div><!--.blog-square-in-->
                    </div><!--.row-post-item-->
                    <?php
                    $post_counter++;
                    if ($post_counter % 2 == 0 || $post_count == $post_counter) {
                        ?>
                    </div><!--.table-row-->
                </div><!--.related-post-->                    
                <?php
            }
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
    <div class="load-more text-center">
        <a href="" id="load-more-post">نمایش مطالب بیشتر</a><!--.load-more-post-->
    </div><!--.text-center-->
    <!--#############################################################################################-->
    <?php
    $qa_catarg = array(
        'post_type' => 'qa',
        'meta_key' => 'rng_scat',
        'meta_value' => $page_id,
        'meta_compare' => '=',
        'meta_type' => 'NUMERIC'
    );
    $qa = new WP_Query($qa_catarg);
    if ($qa->have_posts()):
        ?>

        <div class="row text-center">
            <h2 class="heading-format2">پرسش ها و پاسخ ها در رابطه با <?php echo $scat_title; ?></h2>
        </div><!--.row-->
        <h3 class="section-title"> پاسخ های ما به پرسش های شما</h3><!--.section-title-->
        <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p><!--.section-caption-->
        <div class="qa-accordian">
            <ul class="accordian">

                <?php
                while ($qa->have_posts()):
                    $qa->the_post();
                    ?>
                    <li>
                        <div class="accordian-list">
                            <span class="ac-q-sign">Q</span><!--.ac-q-sign-->
                            <span class="ac-title"><?php echo get_post_meta(get_the_ID(), 'rng_question', TRUE); ?></span><!--.ac-title-->
                            <span class="ac-toggle-icon"></span><!--.ac-toggle-icon-->
                        </div><!--.accordian-list-->
                        <div class="accordian-panel">
                            <span class="ac-a-sign">A</span><!--.ac-a-sign-->
                            <span class="ac-answer-content"><?php echo get_post_meta(get_the_ID(), 'rng_answer', TRUE); ?></span><!--.ac-answer-content-->
                        </div><!--.accordian-panel-->
                    </li>
                    <?php endwhile;
                ?>
            </ul><!--.accordian-->
        </div><!--.qa-accordian-->
        <div class="load-more text-center">
            <a href="" id="load-more-qa">نمایش مطالب بیشتر</a><!--.load-more-post-->
        </div><!--.text-center-->

        <?php
    endif;
    ?>
    <!--#############################################################################################-->
    <?php
    get_footer();
    ?>