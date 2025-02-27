<?php

// ---------- 为page添加摘要 ----------
function my_init() {
     add_post_type_support('page', array('excerpt'));
}
add_action('init', 'my_init');


// ---------- 摘要自定义更多标记 ----------
function xz_excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'xz_excerpt_more' );

function xz_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length' , 'xz_excerpt_length' , 999 );