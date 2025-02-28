<?php
/*
 * Template Name: 服务
 */
get_header();
?>
<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri();?>/images/ce-banner.jpg" alt="Service">
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
                    <h2>Our Service</h2>
                </div>
                <p>
                    At Yangyumech, we’ve been providing excellence in customer care for over
                    40 years. Yangyumech techncians respect your time, respect your budget
                    and respect your business needs. We have a reputation for fast, reliable
                    service at reasonable rates.
                </p>
            </div>
        </div>
    </div>
</div>

<?php
get_footer(); // 调用底部
?>