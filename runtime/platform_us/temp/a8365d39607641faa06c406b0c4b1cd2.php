<?php /*a:5:{s:59:"F:\WWW\yeshai\app\platform_us\view\crm\crm_doctor\basic.php";i:1606208656;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;}*/ ?>
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

	<title>独立医生管理-医生基本信息</title>
	<div id="app" class="crm-basic-p">
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
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>Home /</span> <a class="text-57" href="index.html">Independent Doctors Management /</a> <span class="text-c01f5e">Doctor Basic Information </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">Doctor Basic Information</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">
			<form class="layui-form" action="<?php echo Url('update',array('id'=>$doctor['id'])); ?>" method="post">
				<div class="wp-edit-body  h-100 pt-20">
					<div class="size-16 fw text-c01f5e ">Basic Information</div>
					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">Doctor's Name<span class="text-ff4d4f">*</span></div>
							<div class="w-100">
								<input type="text" name="name" value="<?php echo htmlentities($doctor['name']); ?>" placeholder="English/Numbers/Symbols" class="ivu-input w-400px">
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">Login account<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input type="text" value="<?php echo htmlentities($doctor['account']); ?>" disabled placeholder="English/Numbers/Symbols" class="ivu-input w-400px">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">Reset password<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<i-input class="w-400px" name="repassword" v-model="value5" type="password" password placeholder="English/Numbers/Symbols"/>
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">Contact number<span class="text-ff4d4f">*</span></div>
								<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-400px">
									<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-400px" name="refer_mobile" value="<?php echo htmlentities($doctor['refer_mobile']); ?>">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">E-mail</div>
								<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-400px">
									<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-400px" name="refer_email" value="<?php echo htmlentities($doctor['refer_email']); ?>">
								</div>
							</div>
						</div>

					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="size-16 fw text-c01f5e mt-10 ">Transaction information</div>
					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">Group</div>
							<div class="w-400px">
								<select name="group">
									<option value="">ALL</option>
									<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($g['id']); ?>" <?php if($doctor['group'] == $g['id']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($g['name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
						<div class="item w-100 text-27">
							<span>Commission rate：<?php echo htmlentities($doctor['group_commission']); ?>%</span> <span class="ml-20">Purchase discount：<?php echo htmlentities($doctor['group_discount']); ?></span>
						</div>
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="d-flex align-items-start justify-content-start useroder" style="width: 400px;">
								<div class="w-100 h-100">
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">Number of prescriptions</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">Number of completed orders</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">Number of purchased orders</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">The total amount of commission</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">The amount of withdrawals commission</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">Commission balance</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-300px h-100 bg-f6 pl-10 d-flex align-items-center fw">Number of patients</div>
										<div class="w-100px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="hr w-100"></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">Save</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">Cancel</a>
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



<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			value5 : '',
		},
		methods: {},
	});
</script>
<script>

	layui.use('laydate', function () {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem  : '#test13'
			, type: 'month',
		});
	});

</script>
