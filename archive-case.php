<?php get_header(); ?>

<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/subbanner.jpg" alt="">
    </div>
</div>
<!-- banner end-->
<div class="w_p_main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <!-- list_cases -->
    <div class="iudus_libox">
        <?php if(have_posts()): ?>
        <div class="warper">
            <ul class="case_ul">
                <?php while(have_posts()): the_post(); ?>
                <?php
                    $case_id = get_the_ID();
                    $case_image = get_the_post_thumbnail_url($case_id, 'full');
                ?>
                <li>
                    <div class="ca_sitem">
                        <a target="_blank" href="<?php the_permalink(); ?>">
                            <div class="changpic">
                                <img src="<?php echo $case_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?php the_title(); ?>">
                            </div>
                            <div class="ca_stxt">
                                <p><?php echo wp_trim_words(get_the_title(), 5); ?></p>
                            </div>
                        </a>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <!-- page -->
            <div class="digg4 metpager_8">
            <?php
            $args = [
                'prev_text' => '<',
                'next_text' => '>',
                'mid_size'  => 3, // 当前页前后显示的页数
            ];
            the_posts_pagination( $args );
            ?>
            </div>
            <!-- page end-->
        </div>
        <?php endif; ?>
    </div>
    <!-- list_cases end-->
</div>

<?php get_footer(); ?>