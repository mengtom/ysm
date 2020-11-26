<?php /*a:1:{s:50:"F:\WWW\yeshai\app\platform_us\view\login\index.php";i:1605781943;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>登录</title>
    <!-- 公共样式-->
    <link rel="stylesheet" href="/ysm/static/css/platform/login.css">
    <style>
        .border{
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <div class="fixed w-100 h-100  loginbody">
        <div class="content  absolute d-flex align-items-center justify-content-center ">
            <div class="relative c_left">
                <div class="c_l_form h-100 ">
                    <form role="form" action="<?php echo url('verify'); ?>" method="post" id="form" onsubmit="return false">
                        <div class="logo relative">
                            <img style="width: 217px;" src="/ysm/static/images/p-logo-en.png" alt="">
                        </div>
                        <div class="form-item">
                            <input type="text" id="account" name="account" placeholder="Account" class="ivu-input">
                        </div>
                        <div class="form-item" style="margin-top: 20px;">
                            <input type="password" class="ivu-input" id="pwd" name="pwd" placeholder="Passsword" required="">
                        </div>
                        <button class="btn  text-fff d-flex align-items-center justify-content-center cursor" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="c_right relative">
                <img src="/ysm/static/images/invalid-name.png" alt="">
            </div>
        </div>
    </div>
<!-- 公共js-->
<script src="/ysm/static/js/less.js"></script>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>
<!-- 全局js -->
<script src="/system/module/login/ios-parallax.js"></script>
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/module/login/index.js"></script>
<!--统计代码，可删除-->
<!--点击刷新验证码-->
</body>
</html>