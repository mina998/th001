<?php
    $gallery = get_field('pro-gallery');
    $related = get_field('rel-pro');
    // 获取相关产品
    $related_products = get_posts([
        'post_type' => 'product',
        'posts_per_page' => 4,
        'post__in' => $related,
        'orderby' => 'post__in',
    ]);
?>

<div class="main deshow">
    <!-- Breadcrumb -->
    <div class="su_txt">
    <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <!-- products_article -->
    <div class="demadi">
        <div class="warper">
            <div class="pr_dmain">
                <div class="prm_le">
                    <?php if($gallery) : ?>
                    <div class="propicflash">
                        <div class="big">
                            <?php $i = 0; ?>
                            <?php foreach($gallery as $image_id) : ?>
                            <?php $image = wp_get_attachment_image_src($image_id, 'full'); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="<?php echo $i == 0 ? 'on' : ''; ?>">
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="small">
                            <?php $i = 0; ?>
                            <?php foreach($gallery as $image_id) : ?>
                            <?php $image = wp_get_attachment_image_src($image_id); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="<?php echo $i == 0 ? 'on' : ''; ?>">
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="prm_ri">
                    <h1><?php the_title(); ?></h1>
                    <div class="pr_decs">
                        <div class="spe_pp">
                            <?php echo get_field('pro-intro'); ?>
                        </div>
                    </div>
                    <div class="pro_lxbtn">
                        <a class="probu" href="/contact">Inquiry Now
                            <i class="iconfont icon-zixun"></i>
                        </a>
                        <a class="probu" href="mailto:1111.com">Send E-mail
                            <i class="iconfont icon-Mail"></i>
                        </a>
                    </div>
                    <div class="share">
                        <a target="_blank" href="https://www.facebook.com/profile.php?id=111" title="facebook" class="iconfont icon-facebook"></a>
                        <a target="_blank" href="https://x.com/" title="twitter" class="iconfont icon-twitter"></a>
                        <a target="_blank" href="https://www.linkedin.com/company/" title="linkedin" class="iconfont icon-in"></a>
                        <a target="_blank" href="https://www.youtube.com/" title="youtube" class="iconfont icon-youtube1"></a>
                    </div>
                </div>
            </div>
            <div class="de_nrshow">
                <div class="de_nritem" id="index_1">
                    <h2 class="de_h2ti">Description</h2>
                    <div class="spe_pp">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- products_article end-->
    <!-- hot products -->
    <div class="de_rel">
        <div class="warper">
            <h2 class="de_h2ti">hot products</h2>
            <div class="de_reswi">
                <div class="de_regds">
                    <?php foreach($related_products as $product) : ?>
                    <div class="item">
                        <div class="pro_item">
                            <a target="_blank" href="<?php echo get_the_permalink($product->ID); ?>">
                                <div class="changpic">
                                    <img src="<?php echo get_the_post_thumbnail_url($product->ID, 'full'); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                                </div>
                                <h3><?php echo get_the_title($product->ID); ?></h3>
                                <p>
                                    <?php echo wp_trim_words(get_the_excerpt($product->ID), 20); ?>
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
    </div>
    <!-- hot products end-->
</div>