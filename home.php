<?php get_header(); ?>
<div class="container">
    <div class="row">
        <section class="intro">
            <div class="col-md-12 text-center intro-logo">
                <img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/Feed-Greatness.png" alt="">
            </div>
            <div class="vertical-space-2"></div>
            <div class="video-field">
                <img src="<?php echo RNG_TDU; ?>/img/home-youtube.jpg" class="img-responsive" alt="">
            </div><!--.video-field-->
            <div class="background-text-horse">
                <p><span class="red-text">نکاتی پیرامون تغذیه اسب</span> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،</p>
            </div><!--.background-text-->
        </section><!--.intro-->
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
        <!--#############################################################################################-->
        <section class="latest-blog">
            <h3 class="section-title">گزیده ای از مقالات ما</h3>
            <p class="section-caption">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،</p>
            <div class="blog-content">
                <?php
                $rev_row_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6
                );
                $post_rev_row = new WP_Query($rev_row_args);
                if ($post_rev_row->have_posts()):
                    $counter = 1;
                    $post_count = $post_rev_row->post_count();
                    while ($post_rev_row->have_posts()):
                        $post_rev_row->the_post();
                        $post_cat_id = get_post_meta(get_the_ID() , 'rng_scat' , TRUE);
                        $post_cat = get_post_meta($post_cat_id , 'rng_scat_icon' , TRUE);
                        if ($counter == 1) {
                            ?>
                            <div class="table-row">
                                <div class="blog-square square-full">
                                <?php
                                if ( has_post_thumbnail() ) {
                                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
                                        $thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'large-blog', FALSE );
                                        echo '<img src="' . $thumbnail_url[ 0 ] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div>
                                <?php } ?>
                                    <a href="#" class="square-full-box">
                                        <div class="author"><?php the_author(); ?></div>
                                        <h4><?php the_title(); ?></h4>
                                        <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-->    
                                <?php
                            } elseif ($counter == 2) {
                                ?>
                                <div class="blog-square">
                                    <div class="table-row">
                                        <div class="blog-square-in">
                                            <a href="#" class="square-left-box">
                                                <div class="author"><?php the_author(); ?></div>
                                                <h4><?php the_title(); ?></h4>
                                                <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                            </a><!--.square-full-box-->
                                        </div><!--.blog-square-in-->
                                        <div class="blog-square-in">
                                                                            <?php
                                if ( has_post_thumbnail() ) {
                                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
                                        $thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'small-blog', FALSE );
                                        echo '<img src="' . $thumbnail_url[ 0 ] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div>
                                <?php } ?>
                                        </div><!--.blog-square-in-->
                                    </div><!--.table-row-->    
                                    <?php
                                    if($post_count == 2) echo '</div>';
                                } elseif ($counter == 3) {
                                    ?>
                                    <div class="table-row">
                                        <div class="blog-square-in">
                                                                            <?php
                                if ( has_post_thumbnail() ) {
                                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
                                        $thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'small-blog', FALSE );
                                        echo '<img src="' . $thumbnail_url[ 0 ] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div>
                                <?php } ?>
                                        </div><!--.blog-square-->
                                        <div class="blog-square-in">
                                            <a hrf="#" class="square-right-box">
                                                <div class="author"><?php the_author(); ?></div>
                                                <h4><?php the_title(); ?></h4>
                                                <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                            </a><!--.square-full-box-->
                                        </div><!--.blog-square-in-->
                                    </div><!--table-row-->
                                </div><!--.blog-square-->
                            </div><!--.table-row-->    
                            <?php
                        } elseif ($counter == 4) {
                            ?>
                            <div class="table-row">
                                <div class="blog-square">
                                    <div class="table-row">
                                        <div class="blog-square-in">
                                            <a hrf="#" class="square-left-box">
                                                <div class="author"><?php the_author(); ?></div>
                                                <h4><?php the_title(); ?> </h4>
                                                <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                            </a><!--.square-full-box-->
                                        </div><!--.blog-square-in-->
                                        <div class="blog-square-in">
                                                                            <?php
                                if ( has_post_thumbnail() ) {
                                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
                                        $thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'small-blog', FALSE );
                                        echo '<img src="' . $thumbnail_url[ 0 ] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div>
                                <?php } ?>                                        </div><!--.blog-square-in-->
                                    </div><!--.table-row-->    
                                    <?php
                                    if($post_count == 4) echo '</div>';
                                } elseif ($counter == 5) {
                                    ?>
                                    <div class="table-row">
                                        <div class="blog-square-in">
                                                                            <?php
                                if ( has_post_thumbnail() ) {
                                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
                                        $thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'large-blog', FALSE );
                                        echo '<img src="' . $thumbnail_url[ 0 ] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div>
                                <?php } ?>                                        </div><!--.blog-square-->
                                        <div class="blog-square-in">
                                            <a class="square-right-box">
                                                <div class="author"><?php the_author(); ?></div>
                                                <h4><?php the_title(); ?></h4>
                                                <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                            </a><!--.square-full-box-->
                                        </div><!--.blog-square-in-->
                                    </div><!--table-row-->
                                </div><!--.blog-square-->    
                                <?php
                            } elseif ($counter == 6) {
                                ?>
                                <div class="blog-square square-full">
                                                                                                                <?php
                                if ( has_post_thumbnail() ) {
                                        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
                                        $thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'large-blog', FALSE );
                                        echo '<img src="' . $thumbnail_url[ 0 ] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" />';
                                } else {
                                        ?>
                                        <div class="blog-square-in"><img class="img-responsive" src="<?php echo RNG_TDU; ?>/img/article5.png" alt=""></div>
                                <?php } ?>
                                    <a href="#" class="square-full-box">
                                        <div class="author"><?php the_author(); ?></div>
                                        <h4><?php the_title(); ?></h4>
                                        <span class="category"><i class="icon-animals r-<?php echo $post_cat; ?>"></i></span>
                                    </a><!--.square-full-box-->
                                </div><!--.blog-square-->
                            </div>    
                            <?php
                        }
                        $counter++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div><!--.blog-content-->
        </section><!--.latest-blog-->
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
        <!--#############################################################################################-->
        <section class="fqa-tab">
            <h3 class="section-title">پرسش های شما پاسخ های ما</h3>
            <p class="section-caption">ما تجربیات چندین ساله خود را در رابطه با دام و طیور با شما به اشتراک می گذاریم</p>
            <div class="featured-tab">
                <ul class="featured-head">
                    <li><a href="#featured-tab1"><i class="icon-animals c-deer"></i></a></li>
                    <li><a href="#featured-tab2"><i class="icon-animals c-rabbit"></i></a></li>
                    <li><a href="#featured-tab3"><i class="icon-animals c-goat"></i></a></li>
                    <li><a href="#featured-tab4"><i class="icon-animals c-pig"></i></a></li>
                    <li><a href="#featured-tab5"><i class="icon-animals c-deer"></i></a></li>
                    <li><a href="#featured-tab6"><i class="icon-animals c-horse"></i></a></li>
                    <li><a href="#featured-tab7"><i class="icon-animals c-cock"></i></a></li>
                    <li><a href="#featured-tab8"><i class="icon-animals c-certificate"></i></a></li>
                    <li><a href="#featured-tab9"><i class="icon-animals c-rabbit"></i></a></li>
                    <li><a href="#featured-tab10"><i class="icon-animals c-cock"></i></a></li>
                    <li><a href="#featured-tab11"><i class="icon-animals c-pig"></i></a></li>
                </ul><!--.featured-head-->
                <div class="featured-tab-container">
                    <div class="tab-menu-content" id="featured-tab1">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab1.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div><!--.tab-menu-content-->
                    <div class="tab-menu-content" id="featured-tab2">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab2.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab3">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab3.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab4">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab4.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab5">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab5.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab6">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab6.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab7">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab7.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab8">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab3.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab9">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab9.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab10">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab1.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                    <div class="tab-menu-content" id="featured-tab11">
                        <img src="<?php echo RNG_TDU; ?>/img/QA/qa-featured-tab5.jpeg" alt="">
                        <div class="qa-content">
                            <div class="row question">
                                <div class="col-md-3 question-icon">Q</div>
                                <div class="col-md-8 question-text"><p>آیا می توان بصورت خودآگاه به اسب ها دارو داد</p></div>
                            </div><!--.question-->
                            <div class="row answer">
                                <div class="col-md-1 answer-gap hidden-sm hidden-xs"></div>
                                <div class="col-md-3 answer-icon">A</div>
                                <div class="col-md-7 answer-text"><p class="more">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط</p></div>
                            </div><!--.answer-->
                            <div class="row button text-center">
                                <a href="" class="button-all">تمامی پاسخ های خود را بیابید</a>
                            </div><!--button-->
                        </div><!--.qa-content-->
                    </div>
                </div><!--.featured-tab-container-->
            </div><!--.featured-tab-->
        </section><!--.fqa-->
        <div class="vertical-space-4"></div><!--.vertical-space-4-->
        <!--#############################################################################################-->
    </div><!--.row-->
    <?php get_footer(); ?>