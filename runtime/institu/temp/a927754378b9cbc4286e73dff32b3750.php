<?php /*a:5:{s:48:"F:\WWW\yeshai\app\institu\view\ts\ts\details.php";i:1600767526;s:48:"F:\WWW\yeshai\app\institu\view\public\header.php";i:1597219200;s:57:"F:\WWW\yeshai\app\institu\view\public\header_navigate.php";i:1603187334;s:48:"F:\WWW\yeshai\app\institu\view\public\footer.php";i:1592563283;s:54:"F:\WWW\yeshai\app\institu\view\public\inner_footer.php";i:1597309734;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>医疗机构后台-首页</title>
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/mi.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/mi-menu.css">
    <link rel="stylesheet" href="/ysm/static/css/mi-common.css">
</head>
<body class="bg-f2f3f5">

<!-- <script>
 $eb = parent._mpApi;
</script> -->
	<title>配方查看详情</title>

	<div id="app" class="mi-ts-edit">
		<!--头部-->
			<!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100">
                        <img src="/ysm/static/images/mi/logo-2.png" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item <?php if($controller == 'Index'): ?>ivu-menu-item-active <?php endif; ?>"><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if(isset($menu['child']) && count($menu['child'])  >0){ ?>
                                    <li class="ivu-menu-submenu <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                        <div class="ivu-menu-submenu-title ">
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
                                <?php }else{ ?>
                                     <li class="ivu-menu-item <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                        <a href="<?php echo htmlentities($menu['url']); ?>">
                                            <?php echo htmlentities($menu['menu_name']); ?>
                                        </a>
                                    </li>


                                <?php } ?>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="top_right w-200px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="w-75 text-right d-flex align-items-center justify-content-start">
                        <a class="text-27 w-100px ellipsis-1" href="" title="<?php echo htmlentities($_institu['i_name']); ?>(<?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?>)"><?php echo htmlentities($_institu['i_name']); ?>(<?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?>)</a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg w-50px">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>


                 <!--    <div class="top-nav  h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">

                            <li class="ivu-menu-item ivu-menu-item-active ">
                                <a href="/mi/index.html">首页</a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/wp/index.html">
                                    微片查看
                                </a>
                            </li>
                            <li class="ivu-menu-submenu ">
                                <div class="ivu-menu-submenu-title">
                                    <span href="/mi/ts/index.html">配方查看<i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                </div>
                                <div class="ivu-select-dropdown bg-c01f5e">
                                    <ul class="ivu-menu-drop-list">
                                        <li class="ivu-menu-item-group ">
                                            <ul>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/ts/index.html" class="w-100 h-100 text-fff"> 配方查看</a>
                                                </li>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/wp/ingredient.html" class="w-100 h-100 text-fff"> 成分管理</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/ts/index.html">
                                    医生管理
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/patient/index.html">
                                    患者管理
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/recipe/index.html">
                                    处方查看
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/order/order.html">
                                    订单查看
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="">
                                    佣金管理
                                </a>
                            </li>
                            <li class="ivu-menu-submenu ">
                                <div class="ivu-menu-submenu-title">
                                    <span href="">设置<i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                </div>
                                <div class="ivu-select-dropdown bg-c01f5e" >
                                    <ul class="ivu-menu-drop-list">
                                        <li class="ivu-menu-item-group ">
                                            <ul>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/setting/basics.html" class="w-100 h-100 text-fff">系统设置</a>
                                                </li>
                                                <li class="ivu-menu-item ">
                                                    <a href="" class="w-100 h-100 text-fff">分权系统</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="top_right h-100 d-flex align-items-center justify-content-end cursor w-200px">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27" href="">用户名称..</a>
                        <a class="text-c01f5e ml-10" href="">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div> -->
		<!--头部-->
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 配方管理 / </a> <span class="text-c01f5e"> 查看详情 </span>
		</div>
		<div class="w-1200 fw size-20 mt-10 text-27">查看详情</div>
		<!--列表-->
		<div class="w-1200  mt-10 pb-10 mb-30" style="border-radius: 1px;">
			<form class="d-flex w-100 layui-form  align-items-start justify-content-between" action="">
				<div class="wp-edit-body h-100 pt-20 bg-fff">
					<div class="size-16 fw text-c01f5e mt-10 pl-30 ">配方名称</div>
					<div class="items pl-30 w-100">
						<div class="item w-100 mt-20">
							<div class="size-14 item-text">配方编码: <?php echo htmlentities($info['code']); ?></div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start mt-10">
							<div class="size-14 item-text w-400px">配方名称: <?php echo htmlentities($info['name_zn']); ?></div>
							<div class="size-14 item-text w-400px ml-50">Name: <?php echo htmlentities($info['name_en']); ?></div>
						</div>
						<div class="item w-100 mt-10">
							<div class="size-14 item-text">配方状态:<?php echo $info['is_status']>0 ? '可用' : '不可用'; ?></div>
						</div>
					</div>
					<div class="hr" style="margin: 30px"></div>
					<div class="size-16 fw pl-30 text-c01f5e">微片信息</div>

					<div class="items wpdetailstable w-100 pr-30 pl-30 ">
						<div class="w-100 mt-20" style="border: 1px solid #d9d9d9">
							<table class="ivu-table w-100  ivu-table-default" style="overflow: initial;">
								<tbody class="ivu-table-tbody">
								<tr class="ivu-table-header cursor">
									<th class="bg-f4 text-center bl w-200px">微片名称</th>
									<th class="bg-f4 text-center bl w-200px">剂量范围</th>
									<th class="bg-f4 text-center bl w-100px">最大剂量</th>
									<th class="bg-f4 text-center bl w-150px">数量调节</th>
									<th class="bg-f4 text-center bl w-100px">剂量显示</th>
									<th class="bg-f4 text-center bl w-150px">价格s</th>
								</tr>
								<?php if(is_array($microchip) || $microchip instanceof \think\Collection || $microchip instanceof \think\Paginator): $i = 0; $__LIST__ = $microchip;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
								<tr>
									<td class="text-center bl"><?php echo htmlentities($m['name_zn']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['dose_range']); ?><?php echo htmlentities($m['unit']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['day_max']); ?><?php echo htmlentities($m['unit']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['num']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['dose']); ?><?php echo htmlentities($m['unit']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['price']); ?></td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>

					</div>

					<div class="hr" style="margin: 30px"></div>

					<div class="size-16 fw text-c01f5e pl-30 mt-20">医嘱</div>

					<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-100 item-text">适应症:<?php echo htmlentities($info['cate2_name']); ?></div>
					</div>

				<!-- 	<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-100 item-text">其它标签:<?php echo htmlentities($info['cate2_name']); ?></div>
					</div>
 -->
					<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-400px item-text">服用频次:一日<?php echo htmlentities($info['taking_quency']); ?>次</div>
						<div class="size-14 w-400px ml-50 item-text">服用时间:<?php echo htmlentities($info['taking_time']); ?></div>
					</div>

					<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-100 item-text">周期:<?php echo htmlentities($info['taking_cycle']); ?>天</div>
					</div>

					<div class="item pl-30 w-100 mt-10">
						<div class="size-14 item-text">建议:</div>
						<div class="w-100 mt-8 pr-30">
							<?php echo htmlentities($info['taking_suggest']); ?>
						</div>
					</div>


					<div class="hr" style="margin: 30px"></div>

					<div class="size-16 pl-30 fw text-c01f5e mt-20">描述和参考</div>

					<div class="item w-100 pl-30 mt-20 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text">描述：</div>
							<div class="mt-8 w-400px">
								<?php echo htmlentities($info['description']); ?>
							</div>
						</div>
						<div class="ml-50">
							<div class="size-14 item-text">参考：</div>
							<div class="w-100 mt-8 w-400px pr-30">
								<?php echo htmlentities($info['reference']); ?>
							</div>
						</div>
					</div>


					<div class="hr " style="margin: 30px"></div>
					<div class="item pl-30 w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<a href="index.html" class="ivu-btn-default ivu-btn text-57">返回</a>
					</div>
				</div>

				<div class="ts_right d-flex ml-20 h-auto d-flex align-items-start justify-content-start flex-column">
					<div class="top h-auto w-100 bg-fff">
						<div class="title bg-f6 fw size-16 text-center">配方概要
							<Poptip placement="right-start">
								<div slot="content">
									<div class="size-12 text-57 mt-8 text-left">1、微片种类指配方内微片类型的总数量;</div>
									<div class="size-12 text-57 mt-8 text-left">2、活性成分指配方内各微片内活性成分的类型总量，同名称不同剂量的也需要合并同类项;</div>
									<div class="size-12 text-57 mt-8 text-left">3、辅料种类指各微片内辅料成分的类型的总量，同名称不同剂量的需合并同类项;</div>
								</div>
								<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
							</Poptip>
						</div>
						<div class="items w-100 d-flex align-items-center justify-content-center flex-column">

							<div class="item mt-20 d-flex align-items-center justify-content-between">
								<div>微片种类</div>
								<div class="wpkind"><span><?=count($microchip)?></span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>活性成分种类</div>
								<div class="hxkind"><span><?php echo htmlentities($ingre1); ?></span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>辅料种类</div>
								<div class="flkind"><span><?php echo htmlentities($ingre2); ?></span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>单剂价格</div>
								<div class="singlepricermb"><span><?php echo htmlentities($single_price); ?></span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>周期合计价格</div>
								<div class="periodpricermb"><span><?php echo htmlentities($info['total_price']); ?></span></div>
							</div>
						</div>
					</div>

					<div class="mt-20 cf-list w-100 bg-fff">
						<div class="title fw size-16 text-center">成分列表
							<Poptip placement="right-start">
								<div slot="content">
									<div class="size-12 text-57 mt-8 text-left">1、成分包括活性成分和辅料成分;</div>
									<div class="size-12 text-57 mt-8 text-left">2、同名称同计量单位的成分需合并，数量为各项之和;</div>
									<div class="size-12 text-57 mt-8 text-left">3、同名称不同计量单位的成分不合并;</div>
								</div>
								<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
							</Poptip>
						</div>

						<div style="height: 44px;" class="bg-f6 w-100">
							<div style="width: 240px;margin: auto;" class="d-flex align-items-center justify-content-between h-100">
								<div>微片种类</div>
								<div>剂量</div>
							</div>
						</div>

						<div class="items w-100 d-flex align-items-center justify-content-center flex-column mb-30">
							<?php if(is_array($ingre) || $ingre instanceof \think\Collection || $ingre instanceof \think\Paginator): $i = 0; $__LIST__ = $ingre;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($i % 2 );++$i;?>
							<div class="item  d-flex align-items-center justify-content-between">
								<div><?php echo htmlentities($i['name']); ?></div>
								<div><?php echo htmlentities($i['dose']); ?><?php echo htmlentities($i['unit']); ?></div>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>

					</div>

				</div>
			</form>
		</div>
	</div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>



<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">
	var app = new Vue({
		el  : '#app',
		data: {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',

			model18: [],
			model19: [],
			model21: [],
			deme   : 1,
			cflist : [{name: '成分', value: '2', unit: 'mg', type: '1'}],

		},

		methods: {
			handleCreate2(val) {
				this.cityList4.push({
					value: val,
					label: val,
				});
			},

			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});


</script>
