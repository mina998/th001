<?php
    $args = [
        'icon'      => '<i class="iconfont icon-zhuye"></i>',
        'home'      => 'Home',
        'before'    => '<p>',
        'after'     => '</p>',
    ];
    $breadcrumb = new \Soroy\Breadcrumb($args);
?>
<div class="warper">
    <?php $breadcrumb->render(); ?>
</div>
