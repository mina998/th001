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
    <!-- application_article -->
    <div class="iudus_war">
        <div class="warper">
            <div class="indutit">
                <h2 class="de_h2ti">Aviation Indudustry</h2>
                <?php get_template_part('sections/shares'); ?>
            </div>
            <div class="infocon">
                <h1><?php the_title(); ?></h1>
                <div class="content">
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
            <!-- Related products 调用产品信息底部的热门产品-->
            <?php 
                $related       = get_field('rel-application');
                $related_posts = get_posts([
                    'post_type'      => 'application',
                    'posts_per_page' => 4,
                    'post__in' => $related
                ]);
            ?>
            <?php if ($related_posts): ?>
            <div class="de_rel">
                <h2 class="de_h2ti">Related products</h2>
                <div class="de_reswi">
                    <div class="de_regds">
                        <?php foreach ($related_posts as $post): ?>
                        <div class="item">
                            <div class="pro_item">
                                <a target="_blank" href="<?php echo get_the_permalink($post->ID); ?>">
                                    <div class="changpic">
                                        <img 
                                            src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" 
                                            class="attachment-post-thumbnail size-post-thumbnail wp-post-image" 
                                            alt="<?php echo $post->post_title; ?>" 
                                            style="object-fit: cover; aspect-ratio: 4/3;"
                                        />
                                    </div>
                                    <h3><?php echo $post->post_title; ?></h3>
                                    <p>
                                        <?php echo wp_trim_words($post->post_excerpt, 20); ?>
                                    </p>
                                    <span>Learn More</span>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="rel_arr">
                        <span class="rel_prev">
                            <i class="iconfont icon-jiantou"></i>
                        </span>
                        <span class="rel_next">
                            <i class="iconfont icon-jiantou"></i>
                        </span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- Related products end-->
        </div>
    </div>
    <!-- industry_article end-->
    <div class="ge_mess">
        <div class="warper">
            <h2 class="de_h2ti">
                Send us a message
            </h2>
            <div class="proinfoform">
                <div class="wpcf7 no-js" id="wpcf7-f60-p132-o1" lang="zh-CN" dir="ltr">
                    <?php echo do_shortcode('[contact-form-7 id="6064e8c" title="Application"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>