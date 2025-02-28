<!-- <div class="warper">
    <p>
        <i class="iconfont icon-zhuye"></i>
        <a target="_blank" id="ss" href="">Home</a>&gt;
        <a target="_blank" id="ss" href="">Products</a>&gt;
        <span class="current">Gantry Crane</span>
    </p>
</div> -->

<?php
// 将此代码放入主题的 functions.php 文件中，或者创建一个独立的文件如 inc/breadcrumbs.php 然后通过 functions.php 引入

if (!function_exists('custom_breadcrumbs')) {
    function custom_breadcrumbs($args = array()) {
        // 默认参数
        $defaults = array(
            'separator' => ' &raquo; ', // 分隔符
            'home_title' => '首页',    // 首页标题
            'before' => '<nav class="breadcrumbs">', // 面包屑前面的 HTML
            'after' => '</nav>',      // 面包屑后面的 HTML
            'show_current' => true,   // 是否显示当前页面
            'echo' => true           // 是否直接输出
        );
        
        $args = wp_parse_args($args, $defaults);
        
        // 检查是否为主页或前台页面
        if (is_front_page() && !is_paged()) {
            return '';
        }
        
        $breadcrumbs = array();
        $output = '';
        
        // 开始构建面包屑
        $output .= $args['before'];
        
        // 首页链接
        $breadcrumbs[] = '<a href="' . esc_url(home_url('/')) . '">' . esc_html($args['home_title']) . '</a>';
        
        // 处理不同的页面类型
        if (is_category()) {
            // 分类页面
            $category = get_queried_object();
            $cat_parents = get_category_parents($category->term_id, true, $args['separator']);
            $breadcrumbs[] = trim(str_replace($args['separator'], '', $cat_parents));
            
        } elseif (is_single()) {
            // 文章页面
            $post = get_queried_object();
            $categories = get_the_category($post->ID);
            if ($categories) {
                $category = $categories[0];
                $breadcrumbs[] = get_category_parents($category->term_id, true, $args['separator']);
            }
            if ($args['show_current']) {
                $breadcrumbs[] = get_the_title();
            }
            
        } elseif (is_page() && !is_front_page()) {
            // 页面
            $page = get_queried_object();
            if ($page->post_parent) {
                $ancestors = array_reverse(get_post_ancestors($page->ID));
                foreach ($ancestors as $ancestor) {
                    $breadcrumbs[] = '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
                }
            }
            if ($args['show_current']) {
                $breadcrumbs[] = get_the_title();
            }
            
        } elseif (is_tag()) {
            // 标签页面
            $breadcrumbs[] = single_tag_title('', false);
            
        } elseif (is_author()) {
            // 作者页面
            $author = get_queried_object();
            $breadcrumbs[] = $author->display_name;
            
        } elseif (is_search()) {
            // 搜索页面
            $breadcrumbs[] = '搜索结果：' . get_search_query();
            
        } elseif (is_404()) {
            // 404页面
            $breadcrumbs[] = '404 - 页面未找到';
        }
        
        // 组合输出
        $output .= implode($args['separator'], $breadcrumbs);
        $output .= $args['after'];
        
        if ($args['echo']) {
            echo $output;
        } else {
            return $output;
        }
    }
}

// 简便调用函数
if (!function_exists('get_breadcrumbs')) {
    function get_breadcrumbs($args = array()) {
        return custom_breadcrumbs($args);
    }
}

/* 使用示例：
 * 在模板文件中直接调用：
 * <?php custom_breadcrumbs(); ?>
 * 
 * 或者使用自定义参数：
 * <?php 
 * custom_breadcrumbs(array(
 *     'separator' => ' / ',
 *     'home_title' => 'Home',
 *     'show_current' => false
 * ));
 * ?>
 */

get_breadcrumbs();