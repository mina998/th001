<?php

// ----- 添加支持特性 -----
add_action( 'after_setup_theme', 'frontier_setup' );
function frontier_setup() {
    add_theme_support( 'align-wide' );
}