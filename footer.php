<!-- footer -->
<footer>
    <div class="warper">
        <div class="fo_gstop">
            <div class="fo_lole">
                <h2>Contact us</h2>
            </div>
            <div class="cl"></div>
        </div>
    </div>
    <div class="fo_nadi">
        <div class="warper">
            <div class="fo_oupr">
                <div class="fo_ou1">
                    <h4 class="fo_h4">Contact Us</h4>
                    <ul class="fo_usul">
                        <li>
                            <p>Email:</p>
                            <a href="mailto:<?php echo get_field('e-mail', 'option'); ?>"><?php echo get_field('e-mail', 'option'); ?></a>
                        </li>
                        <li>
                            <p>Tel:</p>
                            <a href="tel:<?php echo get_field('tel', 'option'); ?>"><?php echo get_field('tel', 'option'); ?></a>
                        </li>
                        <li>
                            <p>Address:</p>
                            <span><?php echo get_field('add', 'option'); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="fo_ou2">
                    <?php 
                        $args = [
                            'post_type'      => 'application',
                            'posts_per_page' => 6
                        ];
                        $query = new WP_Query($args);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                    <h4 class="fo_h4">Industry</h4>
                    <ul class="fo_opul">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li>
                            <a target="_blank" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></a>
                        </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="fo_ou3">
                    <?php 
                        $args = [
                            'post_type'      => 'product',
                            'posts_per_page' => 6
                        ];
                        $query = new WP_Query($args);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                    <h4 class="fo_h4">Products</h4>
                    <ul class="fo_opul">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li><a target="_blank" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></a></li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="fo_ou4">
                    <h4 class="fo_h4">Message</h4>
                    <div class="wpcf7 no-js" id="wpcf7-f5-o1" lang="zh-CN" dir="ltr">
                        <?php echo do_shortcode('[contact-form-7 id="fb58669" title="Footer Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p><?php echo get_field('copyright', 'option'); ?></p>
        </div>
    </div>
</footer>
<!-- footer end-->

<?php get_template_part('sections/sidebar'); ?>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/index_slick.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
<script>
    if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
        new WOW().init();
    };
</script>
<!-- wpcf7-form-control wpcf7-text wpcf7-validates-as-required -->

</body>

</html>