<?php get_header(); ?>

<!-- banner 写死-->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/in-banner.jpg" alt="">
    </div>
</div>
<!-- banner end-->
<div class="w_p_main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <!-- list_application 循环调用该栏目信息 图片写死-->
    <div class="iudus_libox">
        <div class="warper">
            <?php if (have_posts()): ?>
                <ul class="application-ls">
                    <?php while (have_posts()): the_post(); ?>
                        <div class="loop-application">
                            <picture>
                                <img width="480" height="580" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="attachment-medium_large size-medium_large wp-post-image" alt="<?php the_title(); ?>">
                            </picture>
                            <div class="loop-application-x">
                                <p class="loop-application-tit h6">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </p>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="loop-application-cover">
                                <p class="loop-application-tit h6"><?php the_title(); ?></p>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </a>
                        </div>
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
                    the_posts_pagination($args);
                    ?>
                </div>
                <!-- page end-->
            <?php else: ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- list_application 循环调用该栏目信息 图片写死 end-->
</div>
<?php get_footer(); ?>