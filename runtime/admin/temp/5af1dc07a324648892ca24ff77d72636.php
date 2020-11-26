<?php /*a:4:{s:48:"F:\WWW\yeshai\app\admin\view/ysm\index\index.php";i:1602675081;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;}*/ ?>
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

    <div class="ht-home">
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
        <div class="w-1200 mt-80 tip  text-666 size-14">
            <span>首页</span>
        </div>
        <!--内容区-->
        <div class="w-1200  i-conten">
            <div class="i-c-conten  h-100">

                <div class="i-c-top w-100 d-flex align-items-start justify-content-between">
                    <div class="top-item   d-flex align-items-start justify-content-start flex-column text-fff relative" style=" background-image: linear-gradient(to right, #fc3583, #fb9d9e);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start  w-100">本月订单总金额</div>
                        <a href="#" class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start text-fff fw">
                            <?php echo htmlentities($topData['now_month_order_p']); ?>
                            <span class="size-14 staff">元</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('/ysm/static/images/img-1.png') "></div>
                    </div>
                    <div class="top-item  d-flex align-items-start justify-content-start flex-column text-fff relative" style="background-image: linear-gradient(to right, #814bf7, #b19afe);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start text-fff  w-100">本月订单新增</div>
                        <a class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start fw text-fff">
                             <?php echo htmlentities($topData['now_order_info_c']); ?>
                            <span class="size-14 staff">单</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('/ysm/static/images/img-2.png') "></div>
                    </div>
                    <div class="top-item  d-flex align-items-start justify-content-start flex-column text-fff relative" style="background-image: linear-gradient(to right, rgba(255, 130, 70, 0.97), #ffbb78);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start  w-100">医生总数</div>
                        <a class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start fw text-fff">
                            <?php echo htmlentities($topData['doctor']['doctor_c']); ?>
                            <span class="size-14 staff">人</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('/ysm/static/images/img-3.png') "></div>
                    </div>
                    <div class="top-item  d-flex align-items-start justify-content-start flex-column text-fff relative" style="  background-image: linear-gradient(to right, #3668fe, #85a4ff);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start  w-100">患者总数</div>
                        <a class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start fw text-fff">
                            <?php echo htmlentities($topData['patient']['patient_c']); ?>
                            <span class="size-14 staff">人</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('/ysm/static/images/img-4.png') "></div>
                    </div>
                </div>
                <!-- 图表-->
                <div id="main" style="width: 1160px;height : 385px;" class="chart"></div>

                <!-- 统计 -->
                <div class="count ">
                    <div class="w-100 li title d-flex align-items-center justify-content-around size-14" style="">
                        <div class="item h-100"></div>
                        <div class="item h-100 d-flex align-items-center justify-content-start fw">数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start fw">本月新增</div>
                    </div>
                    <div class="w-100 li  d-flex align-items-center justify-content-around size-14">
                        <div class="item h-100 d-flex align-items-center justify-content-start">总医疗机构数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start "><?php echo htmlentities($topData['institu']['institu_c']); ?>家</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start "><?php echo htmlentities($topData['institu']['month_institu_c']); ?>家 <span class="text-7ed321">↑</span></div>
                    </div>
                    <div class="w-100 li  d-flex align-items-center justify-content-around size-14">
                        <div class="item h-100 d-flex align-items-center justify-content-start">医生总数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start "><?php echo htmlentities($topData['doctor']['doctor_c']); ?>人</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start "><?php echo htmlentities($topData['doctor']['month_doctor_c']); ?>人 <span class="text-7ed321">↑</span></div>
                    </div>

                    <div class="w-100 li  d-flex align-items-center justify-content-around size-14">
                        <div class="item h-100 d-flex align-items-center justify-content-start">患者总数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start "><?php echo htmlentities($topData['patient']['patient_c']); ?>人</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start "><?php echo htmlentities($topData['patient']['month_patient_c']); ?>人<span class="text-7ed321">↑</span></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/less.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>
<script src="/ysm/static/plugins/echarts/echarts.min.js"></script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    // 指定图表的配置项和数据
    var option  = {
        title  : {
            text   : '图表名称',
            left   : 10,
            align  : 'right',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type : 'cross',
                label: {
                    backgroundColor: '#6a7985',
                },
            },
        },
        legend : {
            data: ['患者人数','医生人数','医疗机构数量'],
        },
        grid   : {
            left        : '3%',
            right       : '4%',
            bottom      : '3%',
            containLabel: true,
        },
        toolbox: {
            feature: {
                saveAsImage: {},
            },
        },
        xAxis  : {
            type       : 'category',
            boundaryGap: false,
            data       : ['2019-01', '2019-02', '2019-03', '2019-04', '2019-05', '2019-06', '2019-07'],
        },
        yAxis  : {
            type: 'value',
        },
        series : [
            {
                name : '患者人数',
                type : 'line',
                stack: '总量',
                data : [120, 132, 101, 134, 90, 230, 210],
            },
            {
                name : '医生人数',
                type : 'line',
                stack: '总量',
                data : [120, 132, 101, 134, 90, 230, 210],
            },
            {
                name     : '医疗机构数量',
                type     : 'line',
                stack    : '总量',
                areaStyle: {},
                data     : [100, 100, 201, 154, 190, 330, 410],
            },
        ],
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
