<?php

function p2($v){
    $o = print_r($v, true);
    error_log($o);
}

/**
 * 获取文章特色图片
 *
 * @param int $post_id 文章ID
 * @return string 特色图片URL
 */
function get_featured_image_src($post_id) {
    // 获取文章特色图片
    $image_id = get_post_thumbnail_id($post_id);
    if($image_id){
        return wp_get_attachment_url($image_id);
    }
    return '';
}

/**
 * 加载必要文件
 *
 * @return void
 */
function xz_include_all_php() {
    // 获取当前主题目录
    $theme_path = get_template_directory();
    // 需要包含的文件夹
    $soroy_path = ['inc', 'soroy'];
    // 包含文件夹中的所有 PHP 文件
    foreach ($soroy_path as $path) {
        $php_files = glob("{$theme_path}/{$path}/*.php");
        foreach ($php_files as $filename) {
            require_once $filename;
        }
    }
}
xz_include_all_php();

// 主题支持logo
function d8_theme_setup() {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
    ]);
}
add_action('after_setup_theme', 'd8_theme_setup');
/**
 * 注册网站导航菜单位置
 */
function register_d8_menus() {
    register_nav_menus([
        'top-menu'     => __('顶部菜单', 'd8-theme'),
        'primary-menu' => __('主导航菜单', 'd8-theme'),
        'footer-menu'  => __('底部菜单', 'd8-theme'),
    ]);
}
add_action('init', 'register_d8_menus');

/**
 * 在顶部菜单末尾添加自定义邮箱链接
 * 
 * @param string $items 当前菜单项 HTML
 * @param object $args 菜单参数对象
 * @return string 修改后的菜单项 HTML
 */
function append_custom_menu_item($items, $args) {
    // 仅在顶部菜单添加邮箱链接
    if ($args->theme_location === 'top-menu') {
        $email = get_field('e-mail', 'option');
        $items .= sprintf(
            '<li><i class="iconfont icon-Mail"></i><a href="mailto:%s">%s</a></li>',
            esc_attr($email),
            esc_html($email)
        );
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'append_custom_menu_item', 10, 2);

/**
 * 设置顶部菜单的所有链接在新窗口打开
 * 
 * @param array $items 菜单项数组
 * @param object $args 菜单参数对象
 * @return array 修改后的菜单项数组
 */
function add_target_blank_to_specific_menu($items, $args) {
    if ($args->theme_location === 'top-menu') {
        foreach ($items as $item) {
            $item->target = '_blank';
        }
    }
    return $items;
}
// add_filter('wp_nav_menu_objects', 'add_target_blank_to_specific_menu', 10, 2);

/**
 * 自定义案例列表每页显示数量
 * @param [type] $query
 * @return void
 */
function custom_case_posts_per_page( $query ) {
    if ( is_post_type_archive( 'case' ) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 9 ); // 每页显示 5 篇
    }
}
add_action( 'pre_get_posts', 'custom_case_posts_per_page' );

/**
 * 自定义应用列表每页显示数量
 * @param [type] $query
 * @return void
 */
function custom_application_posts_per_page( $query ) {
    if ( is_post_type_archive( 'application' ) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 9 ); // 每页显示 5 篇
    }
}
add_action( 'pre_get_posts', 'custom_application_posts_per_page' );