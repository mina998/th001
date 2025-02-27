<?php

// jquery move to footer
function xz_move_jquery_to_footer() {
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'xz_move_jquery_to_footer' );


// 禁止自动加载block lib css
// add_action('wp_enqueue_scripts', function () {
//     wp_dequeue_style('wp-block-library');
// });

// 仅加载需要用到的block资源
add_filter( 'should_load_separate_core_block_assets', '__return_true' );


// load js
function xz_add_scripts() {
	wp_register_script('xz_script', get_template_directory_uri().'/js/script.js', ['jquery-core'], '1.1', true);
	wp_enqueue_script('xz_script');
}
add_action( 'wp_enqueue_scripts', 'xz_add_scripts' ); 


// load css
function xz_add_styles() {
	wp_register_style('xz_style', get_template_directory_uri().'/css/public.css', [], '1.1');
	wp_enqueue_style('xz_style');
}
add_action( 'wp_enqueue_scripts', 'xz_add_styles' ); 


// Register block script
// function xz_register_block_script() {
// 	wp_register_script( 'xzslider', get_template_directory_uri().'/template-parts/blocks/xzslider/xzslider.js', ['jquery-core','xz_script'], '1.1', true );
// 	wp_register_script( 'slick', get_template_directory_uri().'/template-parts/blocks/xzslider/jquery.slick.min.js', ['jquery-core'], '1.1', true );
// }
// add_action( 'init', 'xz_register_block_script' );

