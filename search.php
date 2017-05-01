<?php get_header('single'); ?>
<div class="container">
    <h3>نتایج جستجو بر اساس کلمه کلیدی <?php echo '<span class="red">' . $s . '</span>'; ?></h3>
</div><!--.container-->
<div class="container">
    <div class="grid">
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                ?>
                <div class="grid-item">
                    <div class="search-block">
                        <?php if ('qa' == get_post_type()) { ?>
                        <div class="search-qa-box" >Q</div>
                        <?php
                        } else {
                            if (has_post_thumbnail()) {
                                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                $post_img_src = $thumbnail_url[0];
                                $post_img_alt = $thumbnail_alt;
                            } else {
                                $post_img_src = RNG_TDU . '/img/article1.jpeg';
                                $post_img_alt = get_the_excerpt();
                            }
                            ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $post_img_src; ?>" alt="<?php echo $post_img_alt; ?>" class="img-responsive" /></a>
                        <?php } ?>
                        <a href="<?php the_permalink() ?>" >
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <p><?php echo custom_excerpt(90); ?></p>
                    </div><!--search-block-->
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div><!--.container-->
<div class="container">
    <?php get_footer(); ?>

