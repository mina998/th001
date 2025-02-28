<?php
namespace Soroy;
defined("ABSPATH") || exit;

class Breadcrumb {
    // 当前页对象
    private $object;
    // 图标
    private $icon         = '<i class="iconfont icon-zhuye"></i>';
    // 分隔符
    private $separator    = ' &raquo; ';
    // 首页
    private $home         = 'Home';
    // 开始标签
    private $before       = '<nav class="breadcrumbs">';
    // 结束标签
    private $after        = '</nav>';
    // 是否显示当前页
    private $show_current = true;
    // 是否直接输出
    private $echo         = true;

    // 面包屑
    private $breadcrumbs  = [];
    
    /**
     * 构造函数
     *
     * @param array $args
     */
    public function __construct($args = []) {
        // 设置参数
        $this->init($args);
        // 获取当前页对象
        $this->object = get_queried_object();
        // 首页
        $this->breadcrumbs[] = $this->icon . '<a href="' . home_url() . '">' . $this->home . '</a>';
        // 创建面包屑
        $this->create();

        if(isset($this->object->post_content)){
            $this->object->post_content = '2222222222222';
        }
        // print_r($this->object);
    }

    /**
     * 初始化参数
     *
     * @param array $args
     */
    public function init($args = []) {
        // 设置参数
        foreach($args as $key => $value){
            $this->$key = $value;
        }
    }

    /**
     * 渲染面包屑
     */
    public function render() {
        // 如果当前页不显示，则移除最后一个面包屑
        if(! $this->show_current){
            array_pop($this->breadcrumbs);
        }
        // 组装面包屑
        $output  = $this->before;
        $output .= \implode($this->separator, $this->breadcrumbs);
        $output .= $this->after;
        // 如果直接输出，则输出面包屑
        if ($this->echo) {
            echo $output;
        }
        // 如果直接返回，则返回面包屑
        return $output;
    }

    /**
     * 创建面包屑
     */
    private function create() {
        // 判断是否是分类
        if( is_category() ){
            $this->get_category_loop_up($this->object);
            return;
        }
        // 判断是否是归档页
        if( is_archive() ){
            $this->breadcrumbs[] = $this->object->label;
            return;
        }
        // 判断是否是页面
        if( is_page() ){
            $this->breadcrumbs[] = $this->object->post_title;
            return;
        }
        // 判断是否是文章
        if( is_single() ){
            $this->single();
            return;
        }
        // 判断是否是标签
        if(is_tag()){
            $this->breadcrumbs[] = $this->object->name;
            return;
        }
        // 判断是否是作者
        if(is_author()){
            $this->breadcrumbs[] = $this->object->display_name;
            return;
        }
        // 判断是否是搜索
        if(is_search()){
            $this->breadcrumbs[] = 'Search Result: ' . get_search_query();
            return;
        }
        // 判断是否是404
        if(is_404()){
            $this->breadcrumbs[] = '404';
            return;
        }
    }

    /**
     * 文章页
     */
    private function single(){
        // 获取文章归档页
        $this->archive_page_exists($this->object->post_type);
        // 获取文章分类 循环向上查找父分类
        $categories = get_the_category($this->object->ID);
        if(count($categories) > 0){
            $this->get_category_loop_up($categories[0]);
        }
        $this->breadcrumbs[] = $this->object->post_title;
    }

    /**
     * 查找归档页
     * @param string $post_type
     */
    private function archive_page_exists($post_type){
        // 获取文章归档页
        $archive = get_post_type_object($post_type);
        if($archive && isset($archive->has_archive) && $archive->has_archive){
            $archive_url = get_post_type_archive_link($post_type);
            $this->breadcrumbs[] = '<a href="' . $archive_url . '">' . $archive->label . '</a>';
        }
    }

    /**
     * 获取分类循环向上查找父分类
     * @param object \WP_Term
     */
    private function get_category_loop_up($term){
        // 如果当前分类没有父级，则直接返回
        if($term->parent === 0){
            $this->breadcrumbs[] = $term->name;
            return;
        }
        // 获取上级分类路径
        $parents_list = get_term_parents_list(
            $term->term_id, 
            $term->taxonomy, // 例如 'category' 或自定义 taxonomy
            [
                'format'    => 'name', // 返回分类名称
                'separator' => $this->separator, // 分隔符
                'link'      => true, // 是否生成链接
                'inclusive' => true // 是否包含当前分类
            ]
        );
        $parents_list = trim($parents_list, $this->separator);
        $this->breadcrumbs[] = $parents_list;
    }

}