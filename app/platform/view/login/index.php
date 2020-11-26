<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>登录</title>
    <!-- 公共样式-->
    <link rel="stylesheet/less" href="{__ADMIN_FRAME}/css/login.less">
</head>
<body>
    <div class="fixed w-100 h-100  loginbody">
        <div class="content  absolute d-flex align-items-center justify-content-center ">
            <div class="relative c_left">
                <div class="c_l_form h-100 ">
                    <form role="form" action="{:url('verify')}" method="post" id="form" onsubmit="return false">
                        <div class="logo relative">
                            <img style="width: 217px;" src="{__ADMIN_FRAME}/images/p-logo.png" alt="">
                        </div>
                        <div class="form-item">
                            <input type="text" id="account" name="account" placeholder="账号" class="ivu-input">
                        </div>
                        <div class="form-item" style="margin-top: 20px;">
                            <input type="password" class="ivu-input" id="pwd" name="pwd" placeholder="密码" required="">
                        </div>
                        <button class="btn  text-fff d-flex align-items-center justify-content-center cursor" type="submit">登录</button>
                    </form>
                </div>
            </div>
            <div class="c_right relative">
                <img src="{__ADMIN_FRAME}/images/invalid-name.png" alt="">
            </div>
        </div>
    </div>
<!-- 公共js-->
<script src="{__ADMIN_FRAME}/js/less.js"></script>
<script src="{__ADMIN_FRAME}/js/jquery.js"></script>
<script src="{__ADMIN_FRAME}/js/bootstrap.js"></script>
<!-- 全局js -->
<script src="{__MODULE_PATH}login/ios-parallax.js"></script>
<script src="{__PLUG_PATH}layui/layui.all.js"></script>
<script src="{__MODULE_PATH}login/index.js"></script>
<!--统计代码，可删除-->
<!--点击刷新验证码-->
</body>
</html>