<?php

function p3($v){
    $o = print_r($v, true);
    error_log($o);
}


 // 菜单名称
 $menu_slug = 'primary-menu';
 // 获取菜单位置
 $locations = get_nav_menu_locations();
 // 获取菜单对象
 $menu_object = wp_get_nav_menu_object($locations[$menu_slug]);
 // 获取菜单项
 $menu_items  = wp_get_nav_menu_items($menu_object->term_id);
// 获取顶级菜单
$step1 = array_filter($menu_items, function($item) {
    return $item->menu_item_parent == 0;
});

if(empty($step1)){
    return;
}
?>

<ul class="level-1" id="show">
    <?php foreach ($step1 as $item) : ?>
        <li>
            <a href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a>
            <?php 
                // 获取2级菜单
                $step2 = array_filter($menu_items, function($child) use ($item) {
                    return $child->menu_item_parent == $item->ID;
                });
                if(empty($step2)){
                    continue;
                }
                // 保存3级菜单
                $last_level_list = []; 
            ?>
            <div class="nav_pro">
                <div class="na_prdiv">
                    <!-- 2级菜单 -->
                    <div class="na_ple level-2">
                        <?php foreach ($step2 as $child) : ?>
                        <?php
                            $step3 = array_filter($menu_items, function($item) use ($child) {
                                return $item->menu_item_parent == $child->ID;
                            });
                            $last_level_list[] = $step3;
                        ?>
                        <a href="<?php echo esc_url($child->url); ?>"><?php echo esc_html($child->title); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($last_level_list)) : ?>
                    <div class="na_pri">
                        <?php foreach ($last_level_list as $item_list) : ?>
                            <!-- 3级菜单 -->
                            <dl>
                                <?php foreach ($item_list as $item) : ?>
                                    <dd><?php echo esc_html($item->title); ?></dd>
                                <?php endforeach; ?>
                            </dl>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>




