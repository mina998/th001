<?php get_header(); ?>


<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/subbanner.jpg" alt="Products">
    </div>
</div>
<!-- banner end-->
<div class="main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <div class="pr_libox">
        <div class="warper">
            <div class="intih2">
                <h2>Products</h2>
            </div>
            <div class="pdobox">
                <div class="pr_lef">
                    <div class="pro_nav">
                        <h3>Products
                            <a href="javascript:void(0)">+</a>
                        </h3>
                        <ul class="accordion">
                            <li>
                                <div class="links">
                                    <a target="_blank" href="/products/gantry-crane">Gantry Crane</a>
                                </div>
                                <ul class="submenu">
                                    <li>
                                        <a target="_blank" href="/european-single-girder-gantry-crane.html">European Single Girder Gantry Crane</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="/european-single-girder-gantry-crane.html">European Single Girder Gantry Crane</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="/european-single-girder-gantry-crane.html">European Single Girder Gantry Crane</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="/european-single-girder-gantry-crane.html">European Single Girder Gantry Crane</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = [
                        'post_type' => 'product',
                        'posts_per_page' => 9,
                        'paged' => $paged,
                    ];
                    $query = new WP_Query($args);
                ?>
                <?php if($query->have_posts()): ?>
                <div class="pr_rig">
                    <ul class="pr_list">
                        <?php while($query->have_posts()): $query->the_post(); ?>
                        <?php
                            $product_id = get_the_ID();
                            $product_image = get_the_post_thumbnail_url($product_id, 'full');
                        ?>
                        <li>
                            <div class="pro_item">
                                <a href="<?php echo get_the_permalink($product_id); ?>">
                                    <div class="changpic">
                                        <img src="<?php echo $product_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?php the_title(); ?>">
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <p>
                                        <?php echo wp_trim_words(get_the_excerpt(), 12); ?>
                                    </p>
                                    <span>Learn More</span>
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
                                'current' => $paged,
                            ];
                            echo paginate_links($args);
                        ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <!-- page end-->
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- footer -->

<?php get_footer(); ?>