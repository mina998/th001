<?php get_header(); ?>

<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/news-banner.jpg" alt="">
    </div>
</div>
<!-- banner end-->
<div class="w_p_main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <!-- list_news -->
    <div class="iudus_libox">
        <!-- top_list_news -->
         <?php
            // 获取置顶文章
            $sticky_posts = get_option('sticky_posts');
            $sticky_posts_query = new WP_Query([
                'post_type' => 'post',
                'post__in' => $sticky_posts,
                'posts_per_page' => 1,
            ]);
         ?>
        <div class="inne_cen">
            <div class="warper">
                <div class="inne_swi">
                    <?php if($sticky_posts_query->have_posts()): ?>
                    <ul class="inelist">
                        <?php while($sticky_posts_query->have_posts()): $sticky_posts_query->the_post(); ?>
                        <?php
                            $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        ?>
                        <li>
                            <div class="ines_item">
                                <a target="_blank" href="<?php the_permalink(); ?>">
                                    <div class="inepic">
                                        <div class="changpic">
                                            <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" style="object-fit: cover; aspect-ratio: 16/9;">
                                        </div>
                                        <em><i class="iconfont icon-rili"></i><?php echo get_the_date('Y-m-d'); ?></em>
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <p>
                                        <?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?>
                                    </p>
                                    <span>Learn More</span>
                                </a>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="rel_arr">
                        <span class="ine_prev">
                            <i class="iconfont icon-jiantou"></i>
                        </span>
                        <span class="ine_next">
                            <i class="iconfont icon-jiantou"></i>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- top_list_news end-->

        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'post',
                // 排除置顶
                'post__not_in' => [get_option('sticky_posts')],
                'posts_per_page' => 6,
                'paged' => $paged,
            ];
            $query = new WP_Query($args);
        ?>
        <div class="news_list">
            <div class="warper">
                <?php if($query->have_posts()): ?>
                <ul class="nes_lis">
                    <?php while($query->have_posts()): $query->the_post(); ?>
                    <li>
                        <div class="nes_item">
                            <a target="_blank" href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_content(), 60, '...'); ?></p>
                                <span><i class="iconfont icon-rili"></i><?php echo get_the_date('Y-m-d'); ?></span>
                                <em class="iconfont icon-jiantou-left"></em>
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
                    'total' => $query->max_num_pages,
                    'current' => $paged,
                ];
                echo paginate_links($args);
                ?>
                <?php wp_reset_postdata(); ?>
                </div>
                <!-- page end-->
                <?php else: ?>
                <p>no news</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- list_news end-->
</div>



<?php get_footer(); ?>