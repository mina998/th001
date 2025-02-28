<?php get_header(); ?>

<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/subbanner.jpg" alt="">
    </div>
</div>
<!-- banner end-->
<div class="main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <?php get_template_part('sections/breadcrumb'); ?>
    </div>
    <!-- Breadcrumb end-->
    <!-- list_search -->
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // get search query
    $search_query = get_search_query();
    // get search results
    $args = array(
        'post_type' => ['post', 'product', 'case', 'application'],
        's' => $search_query,
        'posts_per_page' => 9,
        'paged' => $paged
    );
    $query = new WP_Query($args);
    ?>
    <div class="pr_libox">
        <div class="warper">
            <div class="pdobox">
                <div class="pr_rig">
                    <?php if ($query->have_posts()) : ?>
                        <ul class="pr_list">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <li>
                                    <div class="pro_item">
                                        <a target="_blank" href="<?php the_permalink(); ?>">
                                            <div class="changpic">
                                                <img 
                                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" 
                                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" 
                                                    alt="<?php the_title(); ?>" 
                                                    style="object-fit: cover; aspect-ratio: 4/3;"
                                                />
                                            </div>
                                            <h3><?php echo wp_trim_words(get_the_title(), 4); ?></h3>
                                            <p>
                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
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
                                'total' => $query->max_num_pages
                            ];
                            echo paginate_links($args);
                            ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                        <!-- page end-->
                    <?php else: ?>
                        <p>No results found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- list_search end-->
</div>

<?php get_footer(); ?>