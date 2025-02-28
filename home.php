<?php
/*
 * Template Name: 首页
 */
get_header();
?>

<?php $banner_repeater_field = get_field('banner');?>
<?php if($banner_repeater_field): ?>
<div class="banner_home">

    <div class="banner">
        <?php foreach($banner_repeater_field as $item): ?>
        <?php 
            $banner    = $item['banner_item'][0];
            $backgound = wp_get_attachment_url($banner['background']);    
        ?>
        <div class="item">
            <a target="_blank" href="">
                <picture><img src="<?php echo $backgound; ?>" alt=""></picture>
                <div class="item_text">
                    <?php echo $banner['content']; ?>
                    <!-- 
                    <h2>Cranes Manufacturer & Supplier</h2>
                    <p>China's professional manufacturer of special cranes.</p>
                    <p>Supplier of mechanical and electrical supporting equipment for special cranes</p> 
                    -->
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="ban_arrow">
        <span class="ban_prev">
            <i class="iconfont icon-jiantou"></i>
        </span>
        <span class="ban_next">
            <i class="iconfont icon-jiantou"></i>
        </span>
    </div>
    <div class="ban_gd">
        <i class="iconfont icon-shubiao"></i>
    </div>
</div>


<!-- about -->
<?php 
    $about_page_id  = 129;
    $about_page     = get_post($about_page_id);
    // print_r($about_page);
    $image_url      = get_the_post_thumbnail_url($about_page_id);
?>
<div class="inab_usd">
    <div class="intih2">
        <h2><?php echo $about_page->post_title ?></h2>
    </div>
    <div class="inausbo">

        <div class="inaule wow slideInLeft">
            <div class="inaltxus">
                <p>
                    <?php echo $about_page->post_excerpt; ?>
                </p>
                <a target="_blank" href="<?php echo get_permalink($about_page_id) ?>">Learn More<i class="iconfont icon-jiantou-left"></i></a>
            </div>
        </div>
        <div class="inauri">
            <div class="changpic">
                <p>
                    <img src="<?php echo $image_url; ?>" alt="iaubp" class="alignnone size-full wp-image-549" />
                </p>
            </div>
        </div>
    </div>
</div>
<!-- about end-->
<!-- indus -->
<!--<div class="indus_di">
            <div class="intih2">
                <h2>Industry applications</h2>
            </div>
            <ul class="indus_ul wow slideInUp">
                <li class="on" style="background-image: url(../Yangyumech/images/Iron-crane-1.jpg);">
                    <a target="_blank" href="steel-and-iron-industry.html">
                        <div class="insu_txt">
                            <em class="iconfont icon-huojian"></em>
                            <h3>Steel and Iron Industry
                            </h3>
                            <p>Iron and steel metallurgical crane is one of the important key equipment
                                in the production of iron and steel enterprises. The metal production industrial
                                has the molten metal, severe heat, dusty, dangerous load and continuous
                                production demands.</p>
                            <span>Learn More<i class="iconfont icon-jiantou-left"></i></span>
                        </div>
                    </a>
                </li>
                <li class="" style="background-image: url(../Yangyumech/images/Iron-crane-1.jpg);">
                    <a target="_blank" href="port-transportation-industry-2.html">
                        <div class="insu_txt">
                            <em class="iconfont icon-huojian"></em>
                            <h3>Steel and Iron Industry
                            </h3>
                            <p>Iron and steel metallurgical crane is one of the important key equipment
                                in the production of iron and steel enterprises. The metal production industrial
                                has the molten metal, severe heat, dusty, dangerous load and continuous
                                production demands.</p>
                            <span>Learn More<i class="iconfont icon-jiantou-left"></i></span>
                        </div>
                    </a>
                </li>
                <li class="" style="background-image: url(../Yangyumech/images/Iron-crane-1.jpg);">
                    <a target="_blank" href="port-transportation-industry-2.html">
                        <div class="insu_txt">
                            <em class="iconfont icon-huojian"></em>
                            <h3>Steel and Iron Industry
                            </h3>
                            <p>Iron and steel metallurgical crane is one of the important key equipment
                                in the production of iron and steel enterprises. The metal production industrial
                                has the molten metal, severe heat, dusty, dangerous load and continuous
                                production demands.</p>
                            <span>Learn More<i class="iconfont icon-jiantou-left"></i></span>
                        </div>
                    </a>
                </li>
                <li class="" style="background-image: url(../Yangyumech/images/Iron-crane-1.jpg);">
                    <a target="_blank" href="port-transportation-industry-2.html">
                        <div class="insu_txt">
                            <em class="iconfont icon-huojian"></em>
                            <h3>Steel and Iron Industry
                            </h3>
                            <p>Iron and steel metallurgical crane is one of the important key equipment
                                in the production of iron and steel enterprises. The metal production industrial
                                has the molten metal, severe heat, dusty, dangerous load and continuous
                                production demands.</p>
                            <span>Learn More<i class="iconfont icon-jiantou-left"></i></span>
                        </div>
                    </a>
                </li>
                <li class="" style="background-image: url(../Yangyumech/images/Iron-crane-1.jpg);">
                    <a target="_blank" href="port-transportation-industry-2.html">
                        <div class="insu_txt">
                            <em class="iconfont icon-huojian"></em>
                            <h3>Steel and Iron Industry
                            </h3>
                            <p>Iron and steel metallurgical crane is one of the important key equipment
                                in the production of iron and steel enterprises. The metal production industrial
                                has the molten metal, severe heat, dusty, dangerous load and continuous
                                production demands.</p>
                            <span>Learn More<i class="iconfont icon-jiantou-left"></i></span>
                        </div>
                    </a>
                </li>
            </ul>
            <a href="/" class="learn_indus">
                More Industry Applications You May Interest
                <i class="iconfont icon-jiantou-left"></i>
            </a>
        </div>-->
<!-- indus end-->
<!-- products -->
<?php
    // 查询类型 为 product 的 post
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => 4
    ];
    $products = new WP_Query($args);
?>
<?php if($products->have_posts()): ?>
<div class="inpob_di">
    <div class="intih2">
        <h2>our products</h2>
    </div>
    <div class="inptho">
        <div class="warper">
            <ul class="inp_houl wow slideInUp">
                <?php while($products->have_posts()): $products->the_post(); ?>
                <?php 
                    $product_id = get_the_ID();
                    $product_image = get_the_post_thumbnail_url($product_id);
                ?>
                <li>
                    <div class="inph_ditem">
                        <a target="_blank" href="<?php echo get_permalink($product_id); ?>">
                            <div class="inhppi">
                                <span>Hot Sale</span>
                                <div class="changpic">
                                    <img src="<?php echo $product_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                                </div>
                            </div>
                            <div class="inp_start">
                                <i class="iconfont icon-shoucangfill"></i>
                                <i class="iconfont icon-shoucangfill"></i>
                                <i class="iconfont icon-shoucangfill"></i>
                                <i class="iconfont icon-shoucangfill"></i>
                                <i class="iconfont icon-shoucangfill"></i>
                            </div>
                            <p><?php the_title(); ?></p>
                        </a>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- products end-->


<!-- applicatios -->
<?php
    $args = [
        'post_type'      => 'application',
        'posts_per_page' => 5
    ];
    $applications = new WP_Query($args);
?>
<?php if($applications->have_posts()): ?>
<div class="home-application">
    <div class="home-application-txt">
        <p class="home-strong">
            <strong>APPLICATIONS</strong>
        </p>
        <h2>We Serve These Industries and More</h2>
        <p>Committed to providing customers with multifunctional, efficient, and high-quality products, tailoring solutions to meet the needs of our customers.</p>
        <a href="#popup-form" class="popup-modal xz-btn">CONSULT NOW</a>
    </div>

    <?php while($applications->have_posts()): $applications->the_post(); ?>
    <?php 
        $application_id = get_the_ID();
        $application_image = get_the_post_thumbnail_url($application_id);
    ?>
    <div class="loop-application loop-home-applications">
        <picture>
            <img width="480" height="580" src="<?php echo $application_image; ?>" class="attachment-medium_large size-medium_large wp-post-image" alt="">
        </picture>
        <div class="loop-application-x">
            <i class="iconfont icon"></i>
            <h2 class="loop-application-tit h6">
                <a href="<?php echo get_permalink($application_id); ?>"><?php the_title(); ?></a>
            </h2>
        </div>
        <a href="<?php echo get_permalink($application_id); ?>" class="loop-application-cover">
            <i class="iconfont icon"></i>
            <h2 class="loop-application-tit h6"><?php the_title(); ?></h2>
            <div class="loop-special-des">
                <p><?php the_excerpt(); ?></p>
            </div>
        </a>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>
<!-- applicatios end-->
<!-- ceses -->
<?php
    $args = [
        'post_type'      => 'case',
        'posts_per_page' => 3
    ];
    $cases = new WP_Query($args);
?>
<?php if($cases->have_posts()): ?>
<div class="home-case">
    <p class="home-strong">
        <strong>CASES</strong>
    </p>
    <div class="home-case-title">
        <h2>Your Trusted Partner For Industrial Lifting Equipment</h2>
        <a href="/case/" class="xz-btn">LEARN MORE</a>
    </div>
    <ul class="home-case-ls">
        <?php while($cases->have_posts()): $cases->the_post(); ?>
        <?php 
            $case_id = get_the_ID();
            $case_image = get_the_post_thumbnail_url($case_id);
        ?>
        <div class="loop-case">
            <a class="loop-case-thumb" href="<?php echo get_permalink($case_id); ?>">
                <img width="450" height="320" src="<?php echo $case_image; ?>" class="attachment-medium-large size-medium-large wp-post-image" alt="">
            </a>
            <div class="loop-case-x">
                <p class="loop-case-tit">
                    <a href="<?php echo get_permalink($case_id); ?>" class="h5"><?php the_title(); ?></a>
                </p>
                <div class="loop-case-des">
                    <ul>
                        <li><?php echo wp_trim_words( get_the_excerpt(), 12); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </ul>
</div>
<?php endif; ?>
<!-- ceses end-->
<!-- news -->
<?php
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 3
    ];
    $news = new WP_Query($args);
?>
<?php if($news->have_posts()): ?>
<div class="inne_cen">
    <div class="warper">
        <div class="intih2">
            <h2>news center</h2>
        </div>
        <div class="inne_swi wow slideInUp">
            <ul class="inelist">
                <?php while($news->have_posts()): $news->the_post(); ?>
                <?php 
                    $news_id = get_the_ID();
                    $news_image = get_the_post_thumbnail_url($news_id);
                ?>
                <li>
                    <div class="ines_item">
                        <a target="_blank" href="<?php echo get_permalink($news_id); ?>">
                            <div class="inepic">
                                <div class="changpic">
                                    <img src="<?php echo $news_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" style="object-fit: cover; aspect-ratio: 4/3;">
                                </div>
                                <em>
                                    <i class="iconfont icon-rili"></i><?php echo get_the_date('Y-m-d', $news_id); ?>
                                </em>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <p>
                                <?php echo wp_trim_words( get_the_excerpt(), 12); ?>
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
        </div>
    </div>
</div>
<?php endif; ?>
<!-- news end-->
<?php
get_footer();
