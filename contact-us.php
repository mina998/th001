<?php
/*
 * Template Name: 联系我们
 */
get_header(); // 调用头部
?>
<!-- banner -->
<div class="subbanner">
    <div class="changpic">
        <img src="<?php echo get_template_directory_uri(); ?>/images/con-banner.jpg" alt="">
    </div>
</div>
<!-- banner end-->
<div class="w_p_main">
    <!-- Breadcrumb -->
    <div class="su_txt">
        <div class="warper">
            <p>
                <i class="iconfont icon-zhuye"></i>
                <a target="_blank" id="ss" href="">Home</a>&gt;
                <a target="_blank" id="ss" href="">Products</a>&gt;
                <span class="current">Gantry Crane</span>
            </p>
        </div>
    </div>
    <!-- Breadcrumb end-->
    <!-- service -->
    <div class="iudus_libox">
        <div class="warper">
            <div class="xz-main">
                <div class="content">
                    <h2 class="wp-block-heading">Make client successful, aiming to every client’s satisfaction and success.</h2>
                    <p>Have questions about our cranes or need help?<br>Reach out to our friendly team for expert support and guidance.</p>
                    <div class="contact-form">
                        <div class="contact-form-L">
                            <h4>Contact Us Now</h4>
                            <ul class="f-contact">
                                <li class="f-contact-li">
                                    <span>Tel:</span>
                                    <p><a href="tel:+8615738677559">+8615738677559</a></p>
                                </li>
                                <li class="f-contact-li">
                                    <span>E-mail:</span>
                                    <p><a href="mailto:info@slkjcrane.com">info@slkjcrane.com</a></p>
                                </li>
                                <li class="f-contact-li">
                                    <span>Whatsapp:</span>
                                    <p><a href="https://wa.me/+8615738677559" target="_blank">+8615738677559</a></p>
                                </li>
                                <li class="f-contact-li f-contact-li-add">
                                    <span>Address:</span>
                                    <p>Crane Industry Park, Xinxiang City, Henan Province</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-form-R">
                            <script>
                                const button = document.querySelector('.xz-form-button');
                                button.addEventListener('click', function() {
                                    window.location.href = 'https://www.slkjcrane.com/welcome/';
                                });
                            </script>
                            <form class="xz-form-x xz-form-sjqz" action="https://v1.xzgoogle.com/form.php?m=Data&amp;a=save">
                                <div class="xzform_hi"></div>
                                <div class="xz-form-infos">
                                    <div class="xz-form-info">
                                        <input type="text" name="userName" id="userName" autocomplete="off" maxlength="80" placeholder="Name" class="xz-form-input">
                                    </div>
                                    <div class="xz-form-info">
                                        <input type="tel" name="userPhone" id="userPhone" autocomplete="off" placeholder="Tel/Whatsapp" maxlength="80" class="xz-form-input">
                                    </div>
                                </div>
                                <div class="xz-form-infos">
                                    <div class="xz-form-info">
                                        <input type="email" name="userEMail" required="" autocomplete="off" placeholder="Email Address*" id="userEMail" maxlength="80" class="xz-form-input">
                                    </div>
                                    <div class="xz-form-info">
                                        <input type="text" name="uCountry" id="uCountry" autocomplete="off" maxlength="80" placeholder="Country" class="xz-form-input">
                                    </div>
                                </div>
                                <div class="xz-form-msg">
                                    <textarea name="Message" id="Message" placeholder="Please leave the following information for quotation:" class="xz-form-textarea"></textarea>
                                </div>
                                <div class="xz-form-btns">
                                    <button class="xz-form-button">SUBMIT NOW</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-map">
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52072.13719961689!2d113.85279556187584!3d35.34302292414144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35d990565eed9821%3A0xa43328435a01ed2e!2sMuye%20District%2C%20Xinxiang%2C%20Henan%2C%20China!5e0!3m2!1sen!2s!4v1722416515494!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
    </div>
</div>

<?php
get_footer(); // 调用底部
?>