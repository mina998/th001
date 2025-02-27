<?php

// ---------- 为不同分类列表设置不同单页条目 ----------
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
if(!function_exists('my_option_posts_per_page')){
	$option_posts_per_page = get_option( 'posts_per_page' );
	function my_option_posts_per_page( $option_posts_per_page ) {
		if(is_category()) {return 6;}
		else if(is_post_type_archive( 'case' )) {return 12;}
		else if(is_post_type_archive( 'application' )) {return 12;}
		else if(is_post_type_archive( 'product' )) {return 12;}
		else if(is_tax('pro_cat')) {return 12;}
		else {return $option_posts_per_page;}
	}
}