<?php

$menu_items  = wp_get_nav_menu_items(7);



?>

$menu_items  = wp_get_nav_menu_items(7);

需要循环输出 wodpress 导航菜单 
要求:
输出类似以下html结构 最多3级

<ul class="level-1">
    <li>level-1-1</li>
    <li>level-1-2
        <ul class="level-2">
            <li>level-2-1</li>
            <li>level-2-2</li>
            <li>level-2-3</li>
        </ul>
    </li>
    <li>level-1-3
        <ul class="level-2">
            <li>level-2-1</li>
            <li>level-2-2</li>
        </ul>
        <div class="level-3-container">
            <ul class="level-3">
                <li>level-3-1</li>
                <li>level-3-2</li>
                <li>level-3-3</li>
            </ul>
            <ul class="level-3">
                <li>level-3-1</li>
                <li>level-3-2</li>
                <li>level-3-3</li>
            </ul>
        </div>
    </li>
</ul>