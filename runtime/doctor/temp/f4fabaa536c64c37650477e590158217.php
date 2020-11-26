<?php /*a:1:{s:45:"F:\WWW\yeshai\app\doctor\view\login\index.php";i:1599636628;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>登录</title>
    <!-- 公共样式-->
    <link rel="stylesheet" href="/ysm/static/css/ts-common.css">
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/ts-iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/ts-view.css">
</head>
<body>
    <div id="app" class="fixed w-100 h-100  d-flex align-items-center justify-content-start login">
        <div class="left h-100 d-flex align-items-start justify-content-start ">
            <div class="w-100 l-top">
                <img class="logo" src="/ysm/static/images/doctor/logo-1@3x.png" alt="">
            </div>
            <div class="l-button d-flex align-items-start justify-content-start ">
                <form role="form"  action="<?php echo Url('verify'); ?>" method="post" id="form" onsubmit="return false">
                    <div class="title item">TS医生操作平台</div>
                    <div class="item d-flex align-items-center justify-content-center">
                        <input v-model="mobile" name="account" required type="text" id="account" placeholder="账号" class="ivu-input w-200px">
                    </div>
                    <div class="item d-flex align-items-center justify-content-center mt-20">
                        <input type="password" name="pwd" required placeholder="密码" id="pwd" class="ivu-input w-200px">
                    </div>
                    <div class="item d-flex align-items-center justify-content-center relative mt-20">
                        <input required type="text" name="code" placeholder="验证码" class="ivu-input w-200px">
                        <span class="absolute codetext" @click="getcode">{{codetext}}</span>
                    </div>
                    <div class="item d-flex align-items-center justify-content-center mt-20">
                        <button type="submit" class="ivu-btn ivu-btn-primary w-100 cursor">登录</button>
                    </div>
                    <div class="item d-flex align-items-center justify-content-between mt-20">
                        <div><a href="<?php echo Url('repwd'); ?>" class="text-0081a7">忘记密码</a></div>
                        <div>没有账号？<a class="text-0081a7" href="register.html">注册</a></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="right h-100" style="background-image: url('/ysm/static/images/doctor/img@3x.png');"></div>
    </div>
</body>
   <!-- 公共js-->
    <script src="/ysm/static/js/jquery.js"></script>
    <script src="/ysm/static/js/bootstrap.js"></script>
    <script src="/ysm/static/js/vue.js"></script>
    <script src="/ysm/static/js/axios.js"></script>
    <!-- 全局js -->
    <script src="/system/module/login/ios-parallax.js"></script>
    <script src="/static/plug/layui/layui.all.js"></script>
    <script src="/system/module/login/index.js"></script>
</html>
<script>
    var app = new Vue({
        el     : '#app',
        data   : {
            mobile  : '',
            codetext: '获取验证码',
            show    : true,
        },
        methods: {
            getcode() {
                var myreg = /^[1][0-9]{10}$/;
                if (!myreg.test(this.mobile)) {
                    return false;
                }

                var count = 60;
                if (this.show) {
                    clearInterval(this.timeId);
                    this.codetext = count + 's';
                    this.timeId   = setInterval(() => {
                        count--;
                        if (count <= 0) {
                            clearInterval(this.timeId);
                            this.show     = true;
                            this.codetext = '获取验证码';
                        } else {
                            this.codetext = count + 's';
                        }
                    }, 1000);
                    this.show     = false;
                }
            },
        },
        // 获取列表数


    });

</script>
