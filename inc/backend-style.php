<?php 

// ---------- 设置后台样式表 ----------
function koaya_enqueue_options_style() {
    wp_enqueue_style( 'koaya-options-style', get_stylesheet_directory_uri().'/css/background_style.css' ); 
}
add_action( 'admin_enqueue_scripts', 'koaya_enqueue_options_style' );

// ----- xizhi定制界面 ----- 
add_filter('login_headerurl', 'xz_get_siturl');
function xz_get_siturl() {
  return get_bloginfo( 'siteurl' );
}
add_action('login_head', 'xz_login_logo');
function xz_login_logo() {
    echo '<style type="text/css">
       .login h1 a, .login h1.wp-login-logo a {
            background-image:url('.get_bloginfo('template_directory').'/img/xz-logo.png); 
            width:auto;
            background-size:auto 75%;
            background-position:center;
        }
        body.login {
            background-image:url('.get_bloginfo('template_directory').'/img/xz-bg.jpg); 
            background-color:#feffff;
            background-position:center bottom;
            background-size:100% auto;
            background-repeat:no-repeat;
        }
    </style>';
}

// ----- 隐藏后台Logo ----- 
function xz_admin_bar_remove() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'xz_admin_bar_remove', 0);

// ----- 移除后台无用的菜单 ----- 
add_action( 'admin_menu', function(){
    //仪表盘 index.php | 多媒体 upload.php | 页面 edit.php?post_type=page | 插件 plugins.php | 工具 tools.php  | 设置 options-general.php
    remove_menu_page( 'edit-comments.php' ); //评论
});

// ----- 隐藏前台admin_bar ----- 
show_admin_bar(false);
