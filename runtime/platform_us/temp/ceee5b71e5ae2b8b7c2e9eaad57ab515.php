<?php /*a:6:{s:68:"F:\WWW\yeshai\app\platform_us\view\crm\institution\order_details.php";i:1606122342;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1595310927;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
 <!--    <title>后台-首页</title> -->
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/view.css">
<!--     <link rel="stylesheet" href="/ysm/static/css/pages/menu.css"> -->
    <link rel="stylesheet" href="/ysm/static/css/pages/search.css">
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/modules/layer/default/layer.css">
    <link rel="stylesheet" href="/ysm/static/css/common.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/p-menu.css">
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->

	<title>cmr添加-编辑</title>

	<div id="app" class="cmr-details">
		<!--头部-->
		<!--头部-->
        <div class="p-topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-between">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/p-logo-en.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start">
                    <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="index.html" class="leftname">Home</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="<?php echo Url('microchip.microchipProduct/index'); ?>" class="leftname">Microtabs</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="<?php echo Url('ts.ts/index'); ?>" class="leftname">Formulation Managment</a>
                            </div>
                        </li>


                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname ">CRM</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.institution/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Cooperation Organization Management
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.crmDoctor/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Independent Doctors Management
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.crmPatient/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Patients Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname">Orders Managment</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.CrmOrder/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Order List
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.CrmOrder/index',array('type'=>1)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Script Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="" class="leftname">Statistics</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname">Setting</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.systemConfig/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    System Setting
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
                                                    Decentralization System
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.systemConfig/index',array('type'=>1,'tab_id'=>2)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Official Account Binding
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.settingPatient/index',array('type'=>2,'tab_id'=>4)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Payment Binding
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
                </div>
                <div class="top_right w-250px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27  w-100px ellipsis-1" href=""><?php echo htmlentities($_platform['p_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?></a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">Logout</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">Home /</a>
			<a href="index.html" class="text-57">Cooperation Organization Management/</a>
			<a :href=`<?php echo Url('order'); ?>?id=<?php echo htmlentities($i_id); ?>` class="text-57">View order/</a>
			<a class="text-c01f5e">Order Details</a>
		</div>

		<div class="w-1200 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">Order Details</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">
			<form class="layui-form" action="">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="size-16 fw text-c01f5e mt-10 ">Basic Information</div>

					<div class="items w-100">
						<div class="w-100 mt-20">
							<div class="size-14 item-text">Order No.：<?php echo htmlentities($order['order_sn']); ?></div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class=" size-14 item-text w-400px">Telephone number：<?php echo htmlentities($order['user_phone']); ?></div>
							<div class=" size-14 item-text w-400px ml-50">Member name：<?php echo htmlentities($order['real_name']); ?></div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">Order amount: $<?php echo htmlentities($order['pay_price']); ?>（Goods $<?php echo htmlentities($order['total_price']); ?>Freight $<?php echo htmlentities($order['freight_price']); ?>）</div>
							<div class="size-14 item-text w-400px ml-50">Payment method: <?php echo htmlentities($order['pay_type_name']); ?></div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">Order status：<?php echo htmlentities($order['status_name']); ?></div>
							<div class="size-14 item-text w-400px ml-50">Order time：<?php echo htmlentities($order['add_time']); ?></div>
						</div>


						<div class="w-100 mt-20">
							<div class="size-14 item-text w-400px fw">Fapiao Information</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">Fapiao title：XXXXX</div>
							<div class="size-14 item-text w-400px ml-50">Tax ID：XXXXXS</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">Account Bank：XXXXXXXXXXXXXX</div>
							<div class="size-14 item-text w-400px ml-50">Account number：XXXXXXXXXXXXX</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100" style="width: 70px;">Address：</div>
								<div>址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址</div>
							</div>
							<div class="size-14 item-text w-400px ml-50">Telephone number：123456789</div>
						</div>

						<div class="w-100 mt-20">
							<div class="size-14 item-text w-400px fw">Other information</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100 w-100px">Order remarks：</div>
								<div><?php echo htmlentities($order['mark']); ?></div>
							</div>
						</div>

					</div>


					<div class="hr w-100" style="margin: 30px auto"></div>


					<div class="size-16 fw text-c01f5e mt-10 ">Order Details</div>

					<div class="items w-100">
						<div class="w-100 mt-20 fw">Single dose information for microtabs</div>
						<div class="w-100 mt-10 ivu-table-wrapper ivu-table-wrapper-with-border">
							<table class="ivu-table  ivu-table-default ivu-table-border entbableth" style="overflow: initial">
								<tbody class="ivu-table-tbody">
								<tr class="ivu-table-header">
									<th class="bg-f4 text-center text-57 t-table-td">Microtabs No.</th>
									<th class="bg-f4 text-center text-57 t-table-td">Microtabs name</th>
									<th class="bg-f4 text-center text-57 t-table-td">Total dose display</th>
									<th class="bg-f4 text-center text-57 t-table-td">Quantity</th>
									<th class="bg-f4 text-center text-57 t-table-td">Unit price($)</th>
									<th class="bg-f4 text-center text-57 t-table-td">Single dose price($)</th>
								</tr>
								<?php if(is_array($order['_info']) || $order['_info'] instanceof \think\Collection || $order['_info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
								<tr>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['code']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['micro_name']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['total_dose']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['num']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['micro_price']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['total_price']); ?></td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-250px">Types of microtabs：<?php echo htmlentities($order['micro_cate_count']); ?></div>
							<div class="w-250px ml-10">Total number of microtabs：<?php echo htmlentities($order['micro_count']); ?></div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px text-c01f5e">Total price of single dose：<?php echo htmlentities($order['price']); ?></div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-250px">Number of daily taking times：<?php echo htmlentities($order['taking_quency']); ?></div>
							<div class="w-200px ml-10">Cycle：<?php echo htmlentities($order['taking_cycle']); ?></div>
						</div>


						<div class="w-100 mt-10">
							<div class="w-400px text-c01f5e fw">Total price：<?php echo htmlentities($order['total_price']); ?></div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100 w-130px">Medical Order：</div>
								<div><?php echo htmlentities($order['taking_remark']); ?></div>
							</div>
						</div>

					</div>

					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="items w-100">
						<div class="size-16 fw text-c01f5e mt-10 ">Supplement Facts</div>

						<div class="w-100 mt-20">
							<div class="d-flex align-items-start justify-content-start flex-column" style="width: 540px;border: 1px solid #d9d9d9">
								<div class="w-100 bg-f4" style="border-bottom:6px solid #d9d9d9">
									<div class="fw size-20 text-27 ml-10" style="height: 24px;">Supplement Facts</div>
									<div class="text-57 ml-10">Serving Size 1 Package</div>
								</div>
								<div class="w-100 d-flex align-items-center justify-content-start" style="height: 32px;border-bottom: 4px solid #d9d9d9;">
									<div class="pl-10" style="width: 280px;"></div>
									<div style="width: 130px;" class="text-right">Amount Per Serving</div>
									<div style="width: 90px;" class="ml-20 text-right">% Daily Value</div>
								</div>
								<!--内容-->
								<?php if(is_array($order['facts']) || $order['facts'] instanceof \think\Collection || $order['facts'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['facts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?>
								<div class="w-100 d-flex align-items-center justify-content-start fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;">
									<div class="pl-10" style="width: 280px;"><?php echo htmlentities($f['facts_name']); ?></div>
									<div style="width: 130px;" class="text-right"><?php echo htmlentities($f['amount']); ?> <?php echo htmlentities($f['facts_unit']); ?></div>
									<div style="width: 90px;" class="ml-20 text-right"><?php echo htmlentities($f['facts_daily']); ?> %</div>
								</div>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								<!--内容-->
								<div class="w-100 fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;line-height: 28px; border-top: 4px solid #d9d9d9;">
									<span class="pl-10">** Daily Value not established.</span>
								</div>
								<div style="height: 32px;border-bottom: 1px solid #d9d9d9;"></div>
							</div>
							<div>
								<span class="fw">Other ingredients:</span>
								<span class="text-57"><?php echo htmlentities($order['ingredient']); ?></span>
							</div>
						</div>
					</div>
					<?php if($order['refund_status'] > 0): ?>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="items w-100">
						<div class="size-16 fw text-c01f5e mt-10">Request a refund</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100 w-170px">Refund reason：</div>
								<div><?php echo htmlentities($order['refund_reason_wap']); ?></div>
							</div>
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start ml-50">
								<div class="h-100 w-215px">Refund instructions：</div>
								<div><?php echo htmlentities($order['refund_reason_wap_explain']); ?></div>
							</div>
						</div>
						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<a class="ivu-btn ivu-btn-primary">Refund</a>
						</div>
					</div>
					<?php endif; ?>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="items w-100">

						<div class="size-16 fw text-c01f5e mt-10">Addressee, Customs clearance, Logistics information</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text fw w-400px">Addressee information</div>
							<div class="size-14 item-text fw w-400px ml-50">Customs clearance information</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">Name：姓名</div>
							<div class="size-14 item-text w-400px ml-50">Customs clearance number:</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">ID number：010111111111111111</div>
							<div class="size-14 item-text w-400px ml-50">Customs clearance status：Pass/Failure</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">Telephone number：1523456789</div>
						</div>

						<div class="w-100 mt-10">
							<div class="d-flex align-items-start justify-content-start w-400px">
								<div class="h-100 w-85px">Address：</div>
								<div class="">XX省 XX市 XX区 详细地址详细地址详细地址是快乐的方式开发</div>
							</div>
						</div>


						<div class="w-100 mt-20">
							<div class="size-14 item-text  w-400px fw">Logistics information</div>
						</div>

						<div class="w-100 mt-10">
							<div class="size-14 item-text  w-400px">Logistics company：XX快递</div>
						</div>

						<div class="w-100 mt-10">
							<div class="size-14 item-text  w-400px">Tracking number：XXXXXXXXXXXXXXXX</div>
						</div>

						<div class="w-100 mt-10">
							<div class="d-flex align-items-start justify-content-start">
								<div class="h-100 w-100px" style="width: 75px;">物流跟踪：</div>
								<div class="w-100 d-flex align-items-start flex-column justify-content-start">
									<div>2020-00-00 10:00:00 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX已发出</div>
									<div><a href="" class="text-c01f5e">更多物流信息</a></div>
								</div>
							</div>
							<div></div>
						</div>
					</div>

					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="size-16 fw text-c01f5e mt-10 ">Clearing Information</div>
					<div class="items w-100">
						<div class="w-100 mt-20 fw">Single dose information for microtabs</div>
						<div class="w-100 mt-10 ivu-table-wrapper ivu-table-wrapper-with-border">
							<table class="ivu-table  ivu-table-default ivu-table-border" style="overflow: initial">
								<tbody class="ivu-table-tbody">
								<tr class="ivu-table-header">
									<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">Microtabs No.</th>
								<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">Microtabs name</th>
								<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">Quantity</th>
								<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">Settlement price($)</th>
								<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">Sub-total($)</th>
								</tr>
								<tr>
									<td class="text-center text-57 t-table-td" style="width: 228px;">XXXXXXXXXXXXX</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">微片名称</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
								</tr>
								<tr>
									<td class="text-center text-57 t-table-td" style="width: 228px;">XXXXXXXXXXXXX</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">微片名称</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
								</tr>
								</tbody>
							</table>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-200px">单剂结算价格：XXX</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">单剂包材结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">筒形包装包材结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">外包装包材结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">物流结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<!--（单剂结算价格+单剂包材结算价格）每日次数周期+筒形包装*周期/10+外包装包材结算价格+物流结算价格-->
							<div class="w-400px">订单总结算价格：<span>1111111</span>元</div>
						</div>

						<div class="w-100 mt-20">
							<div class="w-400px fw">订单来源追溯</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">合作平台：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">机构名称：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">医生名称：XXX元</div>
						</div>

					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-30 ">
						<a href="javascript:history.back('-1');" class="ivu-btn-default ivu-btn" >Return</a>
					</div>
				</div>
			</form>
		</div>


	</div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/less.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>



<!-- <link href="/static/plug/layui/css/layui.css" rel="stylesheet"> -->
<link href="/system/css/layui-admin.css" rel="stylesheet">
<link href="/system/plugins/layui/css/layui.css" rel="stylesheet">
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/js/layuiList.js"></script>

<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
		},
		methods: {
			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});
</script>

