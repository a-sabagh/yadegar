<?php get_header('single');
if(have_posts()):
    echo '<div class="container qa-accordian"><ul class="accordian">';
    while(have_posts()):
    the_post();
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

            
    
    
    
    
    
    
    
    
    
    
    
    <?php
    endwhile;
    echo '</ul><!--.accordian--></div><!--.qa-accordian-->';
endif;
?>
<div class="container">
<?php get_footer(); ?>
