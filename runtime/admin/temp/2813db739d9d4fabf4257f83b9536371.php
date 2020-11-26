<?php /*a:1:{s:48:"F:\WWW\yeshai\app\admin\view/ysm\login\index.php";i:1597135926;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>登录</title>
    <!-- 公共样式-->
    <link rel="stylesheet/less" href="/ysm/static/css/login.less">
</head>
<body>
    <div class="fixed w-100 h-100  loginbody">
        <div class="content  absolute d-flex align-items-center justify-content-center ">
            <div class="relative c_left">
                <div class="c_l_form h-100 ">
                    <form role="form" action="<?php echo url('verify'); ?>" method="post" id="form" onsubmit="return false">
                        <div class="logo relative">
                            <img  src="/ysm/static/images/zimg-logo.png" alt="">
                        </div>
                        <div class="form-item">
                            <input type="text" id="account" name="account" placeholder="用户名" placeholder="用户名" class="ivu-input">
                        </div>
                        <div class="form-item">
                            <input type="password" class="ivu-input" id="pwd" name="pwd" placeholder="密码" required="">
                        </div>

                        <button class="btn text-fff d-flex align-items-center justify-content-center cursor  btn-primary block full-width m-b" type="submit">登录</button>
                    </form>
                </div>
            </div>

            <div class="c_right relative">
                <img src="/ysm/static/images/timg.jpg" alt="">
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