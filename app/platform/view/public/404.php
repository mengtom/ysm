<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>页面出错</title>
    <style>
        body {
            background : white;
        }

        .among {
            height          : 252px;
            width           : 600px;
            margin          : auto;
            top             : 0;
            bottom          : 0;
            left            : 0;
            right           : 0;
            position        : fixed;
            display         : flex;
            align-items     : center;
            justify-content : space-between;
        }

        .img {
            width  : 300px;
            height : 252px;
        }

        .right {
            height          : 100%;
            width           : 260px;
            display         : flex;
            align-items     : start;
            justify-content : start;
            flex-direction  : column;
        }

        .w-100 {
            width : 100%;
        }

        .number {
            height      : 70px;
            font-family : PingFangSC;
            font-size   : 50px;
            font-weight : 500;
            color       : #272727;
        }

        a {
            text-decoration : none;
        }

        .text {
            margin-bottom : 20px;
            height        : 22px;
            font-family   : PingFangSC;
            font-size     : 14px;
            line-height   : 1.57;
            color         : #272727;
        }

        .btn {
            width            : 88px;
            height           : 32px;
            border-radius    : 2px;
            background-color : #c01f5e;
            display          : block;
            color            : white;
            line-height      : 32px;
            text-align       : center;
            font-size        : 14px;
        }
    </style>
</head>
<body>
    <div class="among">
        <img class="img" src="{__ADMIN_FRAME}/images/404.png" alt="">
        <div class="right">
            <div class="w-100 number">404</div>
            <div class="w-100 text">抱歉，您访问的页面不存在</div>
            <div class="w-100"><a class="btn" href="{:Url('index/index')}">返回首页</a></div>
        </div>
    </div>
</body>
</html>
