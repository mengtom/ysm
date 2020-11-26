<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>登录</title>
    <!-- 公共样式-->
    <link rel="stylesheet" href="{__ADMIN_FRAME}/css/platform/login.css">
    <link rel="stylesheet" href="{__ADMIN_FRAME}/css/mi-common.css">
    <link rel="stylesheet" href="{__ADMIN_FRAME}/css/iview.css">

</head>
<body>
    <div class="fixed w-100 h-100  loginbody">
        <div class="content  absolute d-flex align-items-center justify-content-center ">
            <div class="relative c_left">
                <div class="c_l_form h-100 ">
                    <form role="form" action="{:url('verify')}" method="post" id="form" onsubmit="return false">
                        <div class="logo relative">
                            <img style="width: 217px;" src="{__ADMIN_FRAME}/images/mi/logo-1.png" alt="">
                        </div>
                        <div class="form-item">
                            <input class="ivu-input" placeholder="账号" type="text" id="account" name="account" >
                        </div>
                        <div class="form-item" style="margin-top: 20px;">
                            <input class="ivu-input" placeholder="密码" type="password" id="pwd" name="pwd" >
                        </div>
                        <button class="btn  text-fff d-flex align-items-center justify-content-center cursor" type="submit">登录</button>
                        <div class="d-flex align-items-center justify-content-between">
                            <div><a href="{:Url('repwd')}" class="text-c01f5e">忘记密码</a></div>
                            <div>没有账号？<a class="text-c01f5e" href="{:url('register')}">注册</a></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="c_right relative">
                <img src="{__ADMIN_FRAME}/images/invalid-name.png" alt="">
            </div>

        </div>
    </div>
    <!-- 公共js-->

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

