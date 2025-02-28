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
    <!-- cases_article -->
    <div class="iudus_libox">
        <div class="warper">
            <div class="infocon">
                <h1><?php the_title(); ?></h1>
                <div>
                    <p>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="size-full wp-image-952 aligncenter">
                    </p>
                    <?php the_content(); ?>
                </div>
                <div class="other">
                    <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                    ?>
                    <div>
                        <b>Prev:</b>
                        <a href="<?php echo get_the_permalink($prev_post->ID); ?>"><?php echo $prev_post->post_title; ?></a>
                    </div>
                    <div>
                        <b>Next:</b>
                        <a href="<?php echo get_the_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cases_article end-->
</div>