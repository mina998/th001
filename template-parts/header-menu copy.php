<?php

function p3($v){
    $o = print_r($v, true);
    error_log($o);
}



function build_menu($parent_id, $menu_items) {
    $menu_tree = [];
    // 从所有菜单项中筛选出当前层级的项目
    $current_level_items = array_filter($menu_items, function($item) use ($parent_id) {
        return $item->menu_item_parent == $parent_id;
    });
    foreach ($current_level_items as $item) {
        // 创建当前菜单项的基本结构
        $menu_item = [
            'ID' => $item->ID,
            'title' => $item->title,
            'url' => $item->url,
            'children' => []
        ];
        // 递归获取子菜单
        $menu_item['children'] = build_menu($item->ID, $menu_items);
        $menu_tree[] = $menu_item;
    }
    return $menu_tree;
}

$menu_name = 'primary-menu';
$locations = get_nav_menu_locations();
if (isset($locations[$menu_name])) {
    $menu_object = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items  = wp_get_nav_menu_items($menu_object->term_id);
    
    // 直接构建完整的菜单树
    $menu_tree = build_menu(0, $menu_items);
    p3($menu_tree);
}

?>


