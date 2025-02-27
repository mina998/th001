<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <?php if (is_home()) : ?>
        <title><?php bloginfo('name'); ?></title>
    <?php else : ?>
        <title><?php wp_title(); ?></title>
    <?php endif; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- lebel -->
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <!-- lebel end-->
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- ico -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/tb-1.png" type="image/x-icon" />
    <!-- ico end-->
    <link rel="canonical" href="homeurl">
    <link rel='stylesheet' type="text/css" href='<?php echo get_template_directory_uri(); ?>/css/style.css' />
    <link rel='stylesheet' type="text/css" href='<?php echo get_template_directory_uri(); ?>/css/animate.css' />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- header -->
    <header id="header">
        <!-- header_top -->
        <div class="h_top">
            <?php
            wp_nav_menu([
                'theme_location'  => 'top-menu', 
                'menu_id'         => false,  
                'container'       => false, 
                'container_class' => '', 
                'menu_class'      => 'h_tlx',
            ]);
            ?>
        </div>
        <!-- header_top end-->
        <div class="h_bot">
            <div class="warper">
                <!-- pc logo and wap logo -->
                <div class="logo">
                    <a href="/" target="_blank" title="">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" class="dis">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-1.png" alt="" class="undis">
                    </a>
                </div>
                <!-- pc logo and wap logo end-->
                <!-- nav -->
       
                <div id="nav">
                    <div id="nav-button" class="nav-button">
                        <i class="iconfont icon-mean_list"></i>
                    </div>
                    <nav>
                        <?php 
                            $soroy_primary_menu = new \Soroy\PrimaryMenu();
                            $soroy_primary_menu->render();
                        ?>
                    </nav>
                    <div id="close" class="close-nav"></div>
                </div>
                <!-- nav end-->

                <div class="head_rcon">
                    <!-- search -->
                    <div id="search-button" class="search-button">
                        <i class="iconfont icon-fangdajing">
                        </i>
                        <form method="get" action="/" class="searchform" style="height: 0px;">
                            <input type="text" class="text" name="s" id="keyword" placeholder="Search">
                            <button type="submit" title="search">
                                <i class="iconfont icon-fangdajing"></i>
                            </button>
                        </form>
                    </div>
                    <!-- search end-->
                    <!-- language -->
                    <div class="language">
                        <span>EN</span>
                        <div class="language-main">
                            <div class="language-cont">
                                <div class="language-post">
                                    <a target="_blank" href="/" title="English">
                                        English
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- language end-->
                </div>
            </div>
        </div>
    </header>
    <!-- header end-->