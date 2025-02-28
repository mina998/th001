<!-- side -->
<div class="side-bar">
    <a href="/contact-us/">
        <p>
            <i class="iconfont icon-zixun1"></i>
            <em>Inquiry</em>
        </p>
        <span>Inquiry</span>
    </a>
    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo trim(get_field('tel', 'option'), '+'); ?>" class="ewm_show">
        <p>
            <i class="iconfont icon-original-whatapp"></i>
            <em>Whatsapp</em>
        </p>
        <span>Whatsapp:<?php echo get_field('tel', 'option'); ?></span>
    </a>
    <a href="mailto:<?php echo get_field('e-mail', 'option'); ?>" target="_blank">
        <p>
            <i class="iconfont icon-youxiang1"></i>
            <em>Email</em>
        </p>
        <span>Email:<?php echo get_field('e-mail', 'option'); ?></span>
    </a>
    <a href="javaScript:;" class="popup-modal">
        <p>
            <i class="iconfont icon-liaotian"></i>
            <em>Message</em>
        </p>
        <span>Message</span>
    </a>
</div>

<div class="bigbg allhide">
    <div class="getbox">
        <div class="close_btn">
            <i class="iconfont icon-chahao"></i>
        </div>
        <div class="bigform">
            <div class="wpcf7 no-js" id="wpcf7-f47-o2" lang="zh-CN" dir="ltr">
                <?php echo do_shortcode('[contact-form-7 id="a287158" title="SideBar Form"]'); ?>
            </div>
        </div>
    </div>
</div>
<div class="footmenu">
    <div class="con">
        <p>
            <a href="/"><i class="iconfont icon-zhuye"></i>Home</a>
            <a href="tel:+86-1111"><i class="iconfont icon-dianhua1"></i>Tel</a>
            <a href="mailto:1111.com"><i class="iconfont icon-666666-copy"></i>Mail</a>
            <a href="/contact"><i class="iconfont icon-liaotian"></i>Inquiry</a>
        </p>
    </div>
</div>
<!-- side end-->