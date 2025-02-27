<?php
    function myplugin_add_login_fields() {
        $num1=rand(0,9);
        $num2=rand(0,9);
            echo "<p><label for='math' class='small'>验证码</label><br /> $num1 + $num2 = ?<input type='text' name='sum' class='input' value='' size='25' tabindex='4'>"
        ."<input type='hidden' name='num1' value='$num1'>"
        ."<input type='hidden' name='num2' value='$num2'></p>";
        }
        add_action('login_form','myplugin_add_login_fields');
        function login_val() {
            $sum=$_POST['sum'];
            switch($sum){
            case $_POST['num1']+$_POST['num2']:break;
            case null:wp_die('错误: 请输入验证码.');break;
            default:wp_die('错误: 验证码错误,请重试.');
        }
    }
    add_action('login_form_login','login_val');