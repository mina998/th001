<?php get_header(); ?>
<?php
    $post_type = get_post_type();

    switch($post_type) {
        case 'product':
            get_template_part('sections/product');
            break;
        case 'application':
            get_template_part('sections/application');
            break;
        case 'case':
            get_template_part('sections/case');
            break;
        case 'post':
            get_template_part('sections/case');
            break;
        default:
            // get_template_part('sections/page');
            echo 'default1111111111';
            break;
    }

?>
<?php get_footer(); ?>
