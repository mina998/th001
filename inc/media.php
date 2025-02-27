<?php

// ---------- 缩略图支持 自定义尺寸 ----------
add_theme_support('post-thumbnails');
// add_image_size( 'thumb-m', 376, 282, true );
// add_image_size( 'thumb-l', 490, 367, true );


//---------- 添加相册可选自定义尺寸 ----------
// function custom_image_sizes_choose( $sizes ) {
//     $custom_sizes = array(
//         'thumb-l' => '推荐尺寸',
//     );
//     return array_merge( $sizes, $custom_sizes );
// }
// add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );


// ----- 禁用自动图片缩小 -----
// add_filter( 'big_image_size_threshold', '__return_false' );