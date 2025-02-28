<?php
/*
 * Template Name: 关于我们
 */
get_header(); // 调用头部
?>

<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ce-banner.jpg" alt="Service">
    </div>
</div>
<!-- banner end-->
<div class="w_p_main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <!-- service -->
    <div class="iudus_libox">
        <div class="warper">
            <div class="wor_ptx">
                <div class="intih2">
                    <h2>about</h2>
                </div>
                <p>
                    At Yangyumech, we’ve been providing excellence in customer care for over
                    40 years. Yangyumech techncians respect your time, respect your budget
                    and respect your business needs. We have a reputation for fast, reliable
                    service at reasonable rates.
                </p>
                <h2 class="wp-block-heading has-text-align-center">Factory Show</h2>
                <div class="xz-gallery-block factory-show-gallery">
                    <div class="xz-gallery-item">
                        <img width="768" height="480" src="https://www.slkjcrane.com/wp-content/uploads/2024/07/Factory-Show1-768x480.jpg" class="attachment-medium_large size-medium_large" alt="">
                    </div>
                    <div class="xz-gallery-item">
                        <img width="768" height="480" src="https://www.slkjcrane.com/wp-content/uploads/2024/07/Factory-Show1-768x480.jpg" class="attachment-medium_large size-medium_large" alt="">
                    </div>
                    <div class="xz-gallery-item">
                        <img width="768" height="480" src="https://www.slkjcrane.com/wp-content/uploads/2024/07/Factory-Show1-768x480.jpg" class="attachment-medium_large size-medium_large" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>