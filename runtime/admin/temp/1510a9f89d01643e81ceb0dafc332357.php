<?php /*a:5:{s:74:"F:\WWW\yeshai\app\admin\view/ysm\microchip\microchip_ingredient\create.php";i:1603274870;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1595304974;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
 <!--    <title>后台-首页</title> -->
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/view.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/menu.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/search.css">
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/common.css">
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->

<title ><?php if($product['id']): ?>编辑<?php else: ?>添加<?php endif; ?>成分</title >
<div id="app" class="wp-editingredient" >
    <!--头部-->
    <!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start w-75 ">
                    <div class="top-logo d-flex align-items-center justify-content-center h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/zimg-logo.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item "><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li class="ivu-menu-submenu <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                    <div class="ivu-menu-submenu-title">
                                        <?php if(isset($menu['child']) && count($menu['child']) > 0){ ?>
                                            <span href="#"><?php echo htmlentities($menu['menu_name']); ?> <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                        <?php }else{ ?>
                                            <a href="<?php echo htmlentities($menu['url']); ?>"><?php echo htmlentities($menu['menu_name']); ?></a>
                                        <?php } ?>

                                    </div>
                                    <div class="ivu-select-dropdown bg-c01f5e">
                                        <ul class="ivu-menu-drop-list">
                                            <li class="ivu-menu-item-group ">
                                                <ul>
                                                    <?php if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                                                    <li class="ivu-menu-item ">
                                                        <a href="<?php echo htmlentities($child['url']); ?>" class="w-100 h-100 text-fff"> <?php echo htmlentities($child['menu_name']); ?></a>
                                                    </li>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="top_right w-25 h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-50 text-right">
                        <a class="text-27" href=""><?php echo htmlentities($_admin['real_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '管理员'; ?></a>
                        <a class="text-c01f5e" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>

    <!--头部-->
    <div class="w-1200  mt-80 tip mt-10  text-666 size-14" >
        <span >首页 /</span > <a class="text-57" href="javascript:;" >微片 /</a > <a class="text-57" href="<?php echo Url('index'); ?>" >成分管理 </a >
        <span class="text-c01f5e" >/ <?php if($product['id']): ?>编辑<?php else: ?>添加<?php endif; ?>成分 </span >

    </div >

    <div class="w-1200 mt-10 mb-10 tip  text-666 size-14" >
        <span class="fw size-20 text-333" ><?php if($product['id']): ?>编辑<?php else: ?>添加<?php endif; ?>成分</span >
    </div >

    <!--列表-->
    <div class="w-1200  wp-edit pb-10" style="border-radius: 1px;  background-color: #ffffff;" >
        <form class="layui-form" action="<?php if($product[
        'id']): ?><?php echo Url('update',array('id'=>$product['id'])); else: ?><?php echo Url('save'); ?><?php endif; ?>" method="post">
        <div class="wp-edit-body  h-100 pt-20" >
            <div class="items w-100" >
                <div class="item w-100 " >
                    <div class=" size-14 item-text" >成分编码<span class="text-ff4d4f" >*</span ></div >
                    <div class=" w-100" >
                        <input style="width: 400px;" name="code" type="text" placeholder="请输入" class="ivu-input ml0" value="<?php echo htmlentities($product['code']); ?>" >
                    </div >
                </div >

                <div class="item  w-100 d-flex align-items-center justify-content-start  " >
                    <div >
                        <div class=" size-14 item-text" >中文名称<span class="text-ff4d4f" >*</span ></div >
                        <div class="w-100" >
                            <input style="width: 400px;" type="text" name="zn_name" placeholder="由英文/数字/符号组成" class="ivu-input ml0" value="<?php echo htmlentities($product['zn_name']); ?>" >
                        </div >
                    </div >
                    <div style="margin-left: 50px;" >
                        <div class=" size-14 item-text" >英文名称</div >
                        <div class="w-100" >
                            <input style="width: 400px;" type="text" name="en_name" placeholder="由英文/数字/符号组成" class="ivu-input ml0" value="<?php echo htmlentities($product['en_name']); ?>" >
                        </div >
                    </div >
                </div >


                <div class="item w-100 d-flex align-items-center justify-content-start  " >
                    <div >
                        <div class=" size-14 item-text" >成分类型</div >
                        <div class="w-100" >
                            <div class="ivu-select  ivu-select-single ivu-select-default relative w-400px" >
                                <select name="cate_id" lay-verify="required" >
                                    <option value="" >请选择</option >
                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo['cate_id']); ?>" {eq name="vo.cate_id" value="product.cate_id" }selected="selected" {
                                    /eq}><?php echo htmlentities($vo['cate_name']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select >
                            </div >
                        </div >
                    </div >
                </div >

                <div class="item w-100 mt-20 d-flex align-items-center justify-content-start  " >
                    <div style="width: 230px;" >
                        <div class="size-14 item-text" >原料进价(RMB/KG)<span class="text-ff4d4f" >*</span ></div >
                        <div class="w-100 mt-8" >
                            <input type="text" id="material" name="price" class="ivu-input" placeholder="请输入" value="<?php echo htmlentities($product['price']); ?>" >
                        </div >
                    </div >
                    <div style="margin-left: 20px;width: 150px;" >
                        <div class=" size-14 item-text" >汇率</div >
                        <div class="w-100 mt-8" >
                            <input type="text" id="exchange" name="scale" class="ivu-input w-150px" placeholder="请输入" value="<?php echo htmlentities($product['scale']); ?>" >
                        </div >
                    </div >
                </div >
                <div class="hr w-100 mt-20" ></div >

                <div class="item w-100 mt-20 fw " >
                    计算结果：
                </div >

                <div class="item w-100 mt-20 d-flex align-items-center justify-content-start  " >
                    <span >每g成本价</span >
                    <span class="ml-20" >￥<span class="price1" >0</span ></span >
                    <span class="ml-20" >$<span class="price2" >0</span ></span >
                </div >
                <div class="item w-100 mt-10 d-flex align-items-center justify-content-start  " >
                    <!--<div class="d-flex align-items-start justify-content-around flex-column bg-f4 size-12 code text-57 ">-->
                    <!--	<div>此处成本价为系统计算所得，公式如下：</div>-->
                    <!--	<div>原料进价÷1000</div>-->
                    <!--	<div>原料进价÷1000÷汇率</div>-->
                    <!--</div>-->
                </div >
                <div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;" >
                    <button class="ivu-btn-primary ivu-btn mr-20" type="submit" >确定</button >
                    <a class="ivu-btn-default ivu-btn" type="submit" href="<?php echo Url('index'); ?>" >取消</a >
                </div >

            </div >
        </div >
        </form>
    </div >


</div >
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/less.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>



<script type="text/javascript" >
    $('#exchange').blur(function () {
        price();
    });
    $('#material').blur(function () {
        price();
    });
    function price() {
        var material = parseFloat($('#material').val()) ? parseFloat($('#material').val()) : 0;
        var exchange = parseFloat($('#exchange').val()) > 0 ? parseFloat($('#exchange').val()) : 0;
        var pricermb = (material / 1000).toFixed(3);
        var pricemy = ((material / 1000) / exchange).toFixed(3);
        $('.price1').html(pricermb > 0 ? pricermb : 0);
        $('.price2').html(pricemy > 0 ? pricemy : 0);
    }
    price();
</script >
