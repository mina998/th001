<?php 
namespace Soroy;
defined("ABSPATH") || exit;

class PrimaryMenu {
    /**
     * 主菜单项
     * @var array
     */
    private $primary_items;
    /**
     * 顶级菜单
     * @var array
     */
    private $level_1_items;
    /**
     * 默认图片
     * @var string
     */
    private $default_image = '/wp-content/themes/d8/images/20.jpg';

    /**
     * 构造函数
     */
    public function __construct() {
        $this->primary_items   = [];
        $this->level_1_items   = [];
        $this->get_primary_menu();
    }

    /**
     * 获取主菜单项
     *
     * @return void
     */
    private function get_primary_menu() {
        // 菜单名称
        $menu_slug = 'primary-menu';
        // 获取菜单位置
        $locations = get_nav_menu_locations();
        // 需要检查 $locations[$menu_slug] 是否存在
        if (!isset($locations[$menu_slug])) {
            return;
        }
        // 获取菜单对象
        $menu_object = wp_get_nav_menu_object($locations[$menu_slug]);
        // 需要检查 $menu_object 是否为空
        if (!$menu_object) {
            return;
        }
        // 获取菜单项
        $this->primary_items  = wp_get_nav_menu_items($menu_object->term_id);
        // 获取顶级菜单
        $this->level_1_items = array_filter($this->primary_items, function($item) {
            return $item->menu_item_parent == 0;
        });
    }
    

    /**
     * 输出菜单HTML
     *
     * @return void
     */
    public function render() {
        // 顶级菜单不存在 返回false
        if(empty($this->level_1_items)) {
            return false;
        } ?>
        <!-- level 1 menu  -->
        <ul id="show">
        <?php foreach ($this->level_1_items as $item_obj) : ?>
            <li>
                <a href="<?php echo esc_url($item_obj->url); ?>"><?php echo esc_html($item_obj->title); ?></a>
                <?php 
                    $level = $this->has_level_3($item_obj);
                    // 只有二级菜单
                    if ($level === 2){
                        $this->level_2_only($item_obj);
                    }
                    // 存在三级菜单
                    if($level === 3){
                        $this->level_with_3($item_obj);
                    }
                ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php }

    /**
     * 获取当前级别菜单
     * 
     * @param object \WP_Post $menu_obj
     * @return array
     */
    private function get_current_level_items($menu_obj) {
        return array_filter($this->primary_items, function($child) use ($menu_obj) {
            return $child->menu_item_parent == $menu_obj->ID;
        });
    }

    /**
     * 判断是否存在三级菜单
     * 
     * @param object \WP_Post $menu_obj
     * @return int 1=没有二级菜单  2=只存在二级菜单  3=存在且有三级菜单
     */
    private function has_level_3($menu_obj) {
        // 获取2级菜单
        $level_2_items = $this->get_current_level_items($menu_obj);
        // 如果2级菜单不存在
        if(empty($level_2_items)){
            return 1;
        }
        // 检查是否存在3级菜单
        foreach ($level_2_items as $level_2_item) {
            $level_3_items = array_filter($this->primary_items, function($child) use ($level_2_item) {
                return $child->menu_item_parent == $level_2_item->ID;
            });
            if(!empty($level_3_items)) {
                return 3;
            }
        }
        return 2;
    }

    /**
     * 获取菜单项图片
     * 
     * @param object \WP_Post $item_obj
     * @return string
     */
    private function get_item_image($item_obj){
        // 获取对象ID
        $obj_id = $item_obj->object_id;
        // 如果是文章
        if( $item_obj->type === 'post_type' && has_post_thumbnail($obj_id) ){
            // 获取文章特色图片
            $image_id = get_post_thumbnail_id($obj_id);
            if($image_id){
                return wp_get_attachment_url($image_id);
            }
        }
        return $this->default_image;
    }
    /**
     * 只有二级菜单
     * 
     * @param object \WP_Post $item_obj
     * @return void
     */
    private function level_2_only($item_obj){ ?>
        <?php 
            $level_2_items = $this->get_current_level_items($item_obj);
        ?>
        <div class="nav_dus">
            <!-- level 2 -->
            <dl class="hy_class">
                <?php foreach ($level_2_items as $item) : ?>
                <dd>
                    <a target="_blank" href="/">
                        <div class="changpic">
                            <img src="<?php echo $this->get_item_image($item); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                        </div>
                        <p><?php echo esc_html($item->title); ?></p>
                    </a>
                </dd>
                <?php endforeach; ?>
            </dl>
        </div>
    <?php }

    /**
     * 带三级菜单
     *
     * @param object \WP_Post $item_obj
     * @return void
     */
    private function level_with_3($item_obj){ ?>
        <?php 
            $level_2_items = $this->get_current_level_items($item_obj);
        ?>
        <div class="nav_pro">
            <div class="na_prdiv">
                <!-- level 2  -->
                <div class="na_ple">
                    <?php $i = 0; ?>
                    <?php foreach ($level_2_items as $item) : ?>
                        <?php $class = $i === 0 ? 'class="cur"' : ''; ?>
                        <a target="_blank" href="<?php echo $item->url; ?>" <?php echo $class; ?>><?php echo $item->title; ?></a>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
                <!-- level 3 -->
                <div class="na_pri">
                    <?php $i = 0; ?>
                    <?php foreach($level_2_items as $item): ?>
                        <?php
                            $class = $i === 0 ? 'class="cur"' : '';
                        ?>
                        <dl <?php echo $class; ?>>
                            <?php $level_3_items = $this->get_current_level_items($item); ?>
                            <?php foreach($level_3_items as $child): ?>
                            <dd>
                                <a target="_blank" href="/">
                                    <div class="changpic">
                                        <img src="<?php echo $this->get_item_image($child); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                                    </div>
                                    <p><?php echo $child->title; ?></p>
                                </a>
                            </dd>
                            <?php endforeach; ?>
                        </dl>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
                <!-- 3 end  -->
            </div>
        </div>
    <?php }
    
}
