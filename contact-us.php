<?php
/*
 * Template Name: 联系我们
 */
get_header(); // 调用头部
?>
<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/con-banner.jpg" alt="">
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
            <div class="xz-main">
                <div class="content">
                    <h2 class="wp-block-heading">Make client successful, aiming to every client’s satisfaction and success.</h2>
                    <p>Have questions about our cranes or need help?<br>Reach out to our friendly team for expert support and guidance.</p>
                    <div class="contact-form">
                        <div class="contact-form-L">
                            <h4>Contact Us Now</h4>
                            <ul class="f-contact">
                                <li class="f-contact-li">
                                    <span>Tel:</span>
                                    <p><a href="tel:<?php echo get_field('tel', 'option'); ?>"><?php echo get_field('tel', 'option'); ?></a></p>
                                </li>
                                <li class="f-contact-li">
                                    <span>E-mail:</span>
                                    <p><a href="mailto:<?php echo get_field('e-mail', 'option'); ?>"><?php echo get_field('e-mail', 'option'); ?></a></p>
                                </li>
                                <li class="f-contact-li">
                                    <span>Whatsapp:</span>
                                    <p><a href="https://wa.me/<?php echo get_field('tel', 'option'); ?>" target="_blank"><?php echo get_field('tel', 'option'); ?></a></p>
                                </li>
                                <li class="f-contact-li f-contact-li-add">
                                    <span>Address:</span>
                                    <p><?php echo get_field('add', 'option'); ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-form-R">
                            <?php get_template_part('sections/contact-form'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-map">
        <p><?php echo get_field('map'); ?></p>
    </div>
</div>

<?php get_footer(); ?>