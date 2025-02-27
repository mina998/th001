<?php

// 添加默认的Option页面
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

// 注册blocks
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	$blocks_path = __dir__.'/../blocks/';
    register_block_type( $blocks_path.'xz-gallery' );
    register_block_type( $blocks_path.'xz-cards' );
    register_block_type( $blocks_path.'xz-btn' );
}