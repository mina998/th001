<?php
/*
 * Template Name: 新闻中心
 */

 // 菜单名称
$menu_name = 'primary-menu';
// 获取菜单位置
$locations = get_nav_menu_locations();
// 获取菜单对象
$menu_object = wp_get_nav_menu_object($locations[$menu_name]);
// 获取菜单项
$menu_items  = wp_get_nav_menu_items($menu_object->term_id);
?>


<?php
    // 获取顶级菜单
    $step1 = array_filter($menu_items, function($item) {
        return $item->menu_item_parent == 0;
    });
?>

<ul class="level-1">
    <?php foreach ($step1 as $item) : ?>
        <li>
            <a href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a>
            <?php 
                // 获取2级菜单
                $step2 = array_filter($menu_items, function($child) use ($item) {
                    return $child->menu_item_parent == $item->ID;
                });
            ?>

            <?php $last_level_list = []; //  保存3级菜单 ?>
            <?php if (!empty($step2)) : ?>
                <ul class="level-2">
                    <?php foreach ($step2 as $child) : ?>
                        <?php
                            $step3 = array_filter($menu_items, function($item) use ($child) {
                                return $item->menu_item_parent == $child->ID;
                            });
                            $last_level_list[] = $step3;
                        ?>
                        <li><a href="<?php echo esc_url($child->url); ?>"><?php echo esc_html($child->title); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($last_level_list)) : ?>
                <ul class="level-3">
                    <?php foreach ($last_level_list as $item_list) : ?>
                        <?php if (!empty($item_list)) : ?>
                            <ul class="level-3">
                                <?php foreach ($item_list as $item) : ?>
                                    <li><a href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <ul class="level-3-container">
                                <li>111</li>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php $last_level_list = []; ?>
                </ul>
            <?php endif; ?>

        </li>
    <?php endforeach; ?>
</ul>


















<?php  exit();
// Build the menu tree
$menu_tree = array();
foreach ($menu_items as $item) {
    $menu_tree[$item->ID] = $item;
    $menu_tree[$item->ID]->children = array(); // Add a children array to each item
}

// Assign children to their parents
foreach ($menu_items as $item) {
    if ($item->menu_item_parent && isset($menu_tree[$item->menu_item_parent])) {
        $menu_tree[$item->menu_item_parent]->children[] = $menu_tree[$item->ID];
    }
}

// Get top-level items (where menu_item_parent is 0)
$top_level_items = array_filter($menu_items, function($item) {
    return $item->menu_item_parent == 0;
});

// Start outputting the menu
echo '<ul class="level-1">';
foreach ($top_level_items as $item) {
    // Output the first-level item
    echo '<li>';
    echo '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';

    // Check for second-level children
    if (!empty($item->children)) {
        echo '<ul class="level-2">';
        foreach ($item->children as $child) {
            // Output each second-level item
            echo '<li><a href="' . esc_url($child->url) . '">' . esc_html($child->title) . '</a></li>';
        }
        echo '</ul>';

        // Check if any second-level item has third-level children
        $has_third_level = false;
        foreach ($item->children as $child) {
            if (!empty($child->children)) {
                $has_third_level = true;
                break;
            }
        }

        // Output third-level items if they exist
        if ($has_third_level) {
            echo '<div class="level-3-container">';
            foreach ($item->children as $child) {
                if (!empty($child->children)) {
                    // Output a <ul class="level-3"> for each second-level item with children
                    echo '<ul class="level-3">';
                    foreach ($child->children as $grandchild) {
                        echo '<li><a href="' . esc_url($grandchild->url) . '">' . esc_html($grandchild->title) . '</a></li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</div>';
        }
    }

    echo '</li>';
}
echo '</ul>';
?>