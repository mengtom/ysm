<?php /*a:3:{s:44:"F:\WWW\yeshai\app\doctor\view\index\main.php";i:1600226574;s:47:"F:\WWW\yeshai\app\doctor\view\public\header.php";i:1602238877;s:47:"F:\WWW\yeshai\app\doctor\view\public\footer.php";i:1603783219;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>后台-首页</title>
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/ts-iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/ts-view.css">
	<link rel="stylesheet" href="/ysm/static/css/ts-common.css">
    <style>
        html, body {
            width      : 100%;
            height     : 100%;
            background : #f2f3f5;
        }
    </style>
</head>

    <div class="home w-100 h-100">
        <div class="w-100 h-100 pl-20 pr-20">
            <div class="mt-14 mb-10 w-100">首页</div>
            <div class="top-name" style='background-image: url("/ysm/static/images/doctor/home-bg.png");'>
                <div class="ml-30 fw size-24 text-fff doctor-name"><?php echo htmlentities($topData['name']); ?>医生，欢迎回来！</div>
                <div class="ml-30 mt-8 text-fff">便捷管理 轻松查看</div>
            </div>
            <div class="w-100 together d-flex align-items-center justify-content-start mt-20 bg-fff">
                <div class="date h-100 d-flex align-items-start justify-content-start">
                    <div class="h-100 ml-8">
                        <img class="together_img mt-25 ml-14" src="/ysm/static/images/doctor/date.svg" alt="">
                    </div>
                    <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                        <div class="text-57 mt-25">今天是</div>
                        <div class="size-30"><?php echo htmlentities($topData['now_day']); ?></div>
                    </div>
                </div>
                <div class="long mr-20"></div>
                <div class="right h-100 d-flex align-items-start justify-content-start">
                    <div class="w-33 h-100 d-flex align-items-start justify-content-start">
                        <div class="h-100">
                            <img class="together_img mt-25 ml-14" src="/ysm/static/images/doctor/patient.svg" alt="">
                        </div>
                        <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                            <div class="text-57 mt-25">已服务患者</div>
                            <div class="size-30"><span class="fw"><?php echo htmlentities($topData['patientCount']); ?></span>人</div>
                        </div>
                    </div>
                    <div class="w-33 h-100 d-flex align-items-start justify-content-start">
                        <div class="h-100">
                            <img class="together_img mt-25 ml-14" src="/ysm/static/images/doctor/recipel.svg" alt="">
                        </div>
                        <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                            <div class="text-57 mt-25">开具处方</div>
                            <div class="size-30"><span class="fw"><?php echo htmlentities($topData['prescriptCount']); ?></span>单</div>
                        </div>
                    </div>
                    <div class="w-33 h-100 d-flex align-items-start justify-content-start">
                        <div class="h-100">
                            <img class="together_img mt-25 ml-14" src="/ysm/static/images/doctor/nutrition.svg" alt="">
                        </div>
                        <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                            <div class="text-57 mt-25">预定营养素患者</div>
                            <div class="size-30"><span class="fw"><?php echo htmlentities($topData['orderCount']); ?></span>人</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-100 d-flex align-items-start justify-content-between flex-wrap items">

                <div class="mt-20 mr-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">微片</div>
                    <div class="w-100 pl-20 pr-20 content">
                        <?php if(is_array($list['microchip']['data']) || $list['microchip']['data'] instanceof \think\Collection || $list['microchip']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['microchip']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
                        <div class="w-100 d-flex align-items-center justify-content-between li">
                            <div class="w-50 ml-8"><?php echo htmlentities($m['zn_name']); ?></div>
                            <div class="w-40"><?php echo htmlentities($m['cate2_name']); ?></div>
                            <div><a href="<?php echo Url('microchip.microchipProduct/details',array('micro_id'=>$m['id'])); ?>" data-url="<?php echo Url('microchip.microchipProduct/details',array('micro_id'=>$m['id'])); ?>" class="text-0081a7">详情</a></div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="<?php echo Url('microchip.microchipProduct/index'); ?>" data-url="<?php echo Url('microchip.microchipProduct/index'); ?>" class="text-0081a7">查看全部</a>
                    </div>
                </div>

                <div class="mt-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">参考配方</div>
                    <div class="w-100 pl-20 pr-20 content">
                        <?php if(is_array($list['ts_ts']['data']) || $list['ts_ts']['data'] instanceof \think\Collection || $list['ts_ts']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['ts_ts']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                        <div class="w-100 d-flex align-items-center justify-content-between li bg-f6">
                            <div class="text-57 w-50 ml-8"><?php echo htmlentities($t['name_zn']); ?></div>
                            <div class="text-57 w-40"><?php echo htmlentities($t['cate2_name']); ?></div>
                            <div><a href="<?php echo Url('ts.ts/details',array('id'=>$t['id'])); ?>" data-url="<?php echo Url('ts.ts/details',array('id'=>$t['id'])); ?>" class="text-0081a7">详情</a></div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="<?php echo Url('ts.ts/index',array('type'=>'0,2,3,4')); ?>" data-url="<?php echo Url('ts.ts/index',array('type'=>1)); ?>" class="text-0081a7">查看全部</a>
                    </div>
                </div>

                <div class="mt-20 mr-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">我的配方</div>
                    <div class="w-100 pl-20 pr-20 content">
                        <?php if(is_array($list['ts']['data']) || $list['ts']['data'] instanceof \think\Collection || $list['ts']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['ts']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                        <div class="w-100 d-flex align-items-center justify-content-between li">
                            <div class="w-50 ml-8"><?php echo htmlentities($t['name_zn']); ?></div>
                            <div class="w-40"><?php echo htmlentities($t['cate2_name']); ?></div>
                            <div><a href="<?php echo Url('ts.ts/details',array('id'=>$t['id'])); ?>" data-url="<?php echo Url('ts.ts/details',array('id'=>$t['id'])); ?>" class="text-0081a7">详情</a></div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="<?php echo Url('ts.ts/index',array('type'=>'1')); ?>" data-url="<?php echo Url('ts.ts/index',array('type'=>'2')); ?>" class="text-0081a7">查看全部</a>
                    </div>
                </div>

                <div class="mt-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">处方查看</div>
                    <div class="w-100 pl-20 pr-20 content">
                        <!-- <div class="w-100 d-flex align-items-center justify-content-between li bg-f6">
                            <div class="ml-8 text-57 w-40">处方名称</div>
                            <div class="w-10 text-57">患者姓名</div>
                            <div class="w-20 text-57">金额</div>
                            <div class="w-10 text-57">状态</div>
                            <div><a href="" style="color: #F6F6F6">详情</a></div>
                        </div> -->
                        <?php if(is_array($list['order']['data']) || $list['order']['data'] instanceof \think\Collection || $list['order']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['order']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?>
                        <div class="w-100 d-flex align-items-center justify-content-between li">
                            <div class="ml-8 w-40"><?php echo htmlentities($o['order_name']); ?></div>
                            <div class="w-10"><?php echo htmlentities($o['real_name']); ?></div>
                            <div class="w-20"><?php echo htmlentities($o['total_price']); ?></div>
                            <div class="w-10">待查看</div>
                            <div><a href="<?php echo Url('crm.CrmOrder/details',array('id'=>$o['id'])); ?>" data-url="<?php echo Url('crm.CrmOrder/details',array('id'=>$o['id'])); ?>" class="text-0081a7">详情</a></div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>


                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="<?php echo Url('crm.CrmOrder/index',array('type'=>0)); ?>" data-url="<?php echo Url('crm.CrmOrder/index',array('type'=>0)); ?>" class="text-0081a7">查看全部</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script>
    $('.route').click(function (e) {
        var url = $(this).data('url');
        window.open(url, '_blank');
    });
</script>


