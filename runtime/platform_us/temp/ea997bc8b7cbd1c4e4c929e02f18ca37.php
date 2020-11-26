<?php /*a:5:{s:74:"F:\WWW\yeshai\app\platform_us\view\microchip\microchip_product\details.php";i:1605866085;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;}*/ ?>
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

	<title>微片详情</title>

	<div id="app" class="wp-details-p-en">
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
		<div class="w-1200 tip mt-80  text-999 size-14">
			<span>Home /</span> <a class="text-999" href="index.html"> View Microtabs /</a> <span class="text-c01f5e"> Details </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">Information</span>
		</div>
		<!--列表-->

		<div class="w-1200  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">

			<div class="wp-edit-body  h-100 pt-20">

				<div class="size-16 fw text-c01f5e mt-10 ">Basic Information</div>

				<div class="items w-100">
					<div class="w-100 mt-20">
						<div class="size-14 item-text">Microtabs classification：<?php echo htmlentities($info['cate1_name']); ?></div>
					</div>

					<div class="w-100 mt-20">
						<div class="size-14 item-text">Microtabs No.：<?php echo htmlentities($info['code']); ?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class=" size-14 item-text w-400px">Name：<?php echo htmlentities($info['en_name']); ?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">Scientific name：<?php echo htmlentities($info['scientific_en_name']); ?></div>
					</div>

					<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">Dosage：<?php echo htmlentities($info['dose']); ?><?php echo htmlentities($info['unit']); ?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">Dose range：<?php echo htmlentities($info['dose_min']); ?><?php echo htmlentities($info['unit']); ?> — <?php echo htmlentities($info['dose_max']); ?><?php echo htmlentities($info['unit']); ?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">Indication tags：<?php echo htmlentities($info['cate2_name']); ?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">Other tags：<?php echo htmlentities($info['cate3_name']); ?></div>
					</div>

					<div class="w-100 mt-20 d-flex align-items-start justify-content-start">
						<div class="size-14 item-text w-100 d-flex align-items-start justify-content-start flex-column">
							<div>Product description：</div>
							<div class="mt-10"><?php echo htmlentities($info['microchip_info_en']); ?></div>
						</div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
						<div class="size-14 item-text w-100 d-flex align-items-start justify-content-start flex-column">
							<div>Side effects：</div>
							<div class="mt-10"><?php echo htmlentities($info['effects_en']); ?></div>
						</div>
					</div>
				</div>


				<div class="hr w-100" style="margin: 30px auto"></div>



				<div class="items w-100 mt-20">
					<div class="size-16 fw text-c01f5e mt-10 mb-20">References</div>
					<div class="w-100">
						<?php echo htmlentities($info['references']); ?>
					</div>
				</div>
				<div class="hr w-100" style="margin: 30px auto"></div>



				<div class="items w-100">
					<div class="w-100 size-16 mt-20 fw text-c01f5e">Microtabs Composition</div>
					<div class="mt-20 ivu-table-wrapper ivu-table-wrapper-with-border" style="width: 540px;">
						<table class="ivu-table  ivu-table-default ivu-table-border" style="overflow: initial;">
							<tbody class="ivu-table-tbody">
							<tr class="ivu-table-header">
								<th class="bg-f4 w-100px text-center text-27 fw" style="width: 175px;">Ingredient attributes</th>
								<th class="bg-f4 pl-20  text-27 fw w-250px">Ingredient name</th>
								<th class="bg-f4 pl-20  text-27 fw w-120px">Dosage</th>
							</tr>
							<?php if(is_array($info['ingredient']['0']) || $info['ingredient']['0'] instanceof \think\Collection || $info['ingredient']['0'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['ingredient']['0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$huo): $mod = ($i % 2 );++$i;?>
							<tr>
								<td class="text-center text-57 ">Active component</td>
								<td class="text-57 pl-20"><?php echo htmlentities($huo['en_name']); ?></td>
								<td class="text-57 pl-20"><?php echo htmlentities($huo['dose']); ?><?php echo htmlentities($huo['unit']); ?></td>
							</tr>
							<?php endforeach; endif; else: echo "" ;endif; if(is_array($info['ingredient']['1']) || $info['ingredient']['1'] instanceof \think\Collection || $info['ingredient']['1'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['ingredient']['1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fu): $mod = ($i % 2 );++$i;?>
							<tr>
								<td class="text-center text-57 ">Excipient</td>
								<td class="text-57 pl-20"><?php echo htmlentities($fu['en_name']); ?></td>
								<td class="text-57 pl-20"><?php echo htmlentities($fu['dose']); ?><?php echo htmlentities($fu['unit']); ?></td>
							</tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<!-- <tr>
								<td class="text-center text-57 ">Active component</td>
								<td class="text-57 pl-20">Ingredient name</td>
								<td class="text-57 pl-20">20mg</td>
							</tr>
							<tr>
								<td class="text-center text-57 ">Excipient</td>
								<td class="text-57 pl-20">Ingredient name</td>
								<td class="text-57 pl-20">20mg</td>
							</tr>
							<tr>
								<td class="text-center text-57 ">Excipient</td>
								<td class="text-57 pl-20">Ingredient name</td>
								<td class="text-57 pl-20">20mg</td>
							</tr> -->
							</tbody>
						</table>
					</div>
				</div>

				<div class="items w-100">
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
							<div class="w-100 d-flex align-items-center justify-content-start fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;">
								<div class="pl-10" style="width: 280px;"><?php echo htmlentities($info['facts_name']); ?></div>
								<div style="width: 130px;" class="text-right"><?php echo htmlentities($info['amount']); ?><?php echo htmlentities($info['facts_unit']); ?></div>
								<div style="width: 90px;" class="ml-20 text-right"><?php echo htmlentities($info['facts_daily']); ?> %</div>
							</div>
							<!--内容-->
							<div class="w-100 fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;line-height: 28px; border-top: 4px solid #d9d9d9;">
								<span class="pl-10">** Daily Value not established.</span>
							</div>
							<div style="height: 32px;border-bottom: 1px solid #d9d9d9;"></div>
						</div>
						<div>
							<span class="fw">Other ingredients:</span>
							<span class="text-57">other ingredients……</span>
						</div>
					</div>
				</div>

				<div class="hr w-100" style="margin: 30px auto"></div>

				<div class="items w-100">
					<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
						<div class="size-14 item-text w-150px d-flex align-items-start justify-content-start flex-column">
							<div class="text-c01f5e fw size-16">Thumbnail</div>
							<div class="mt-10">
								<img src="/images/404.png" class="w-100px" height="100" alt="">
							</div>
						</div>
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column ml-50">
							<div class="text-c01f5e fw size-16" style="height: 24px;line-height: 24px;">
								<span class="text-c01f5e fw size-16">Supporting Documents</span>
								<button type="button" class="ivu-btn-default ivu-btn ivu-input-small ml-8"> Download package</button>
							</div>
							<div class="mt-10 d-flex align-items-start justify-content-start flex-column">
								<?php if(is_array($filename) || $filename instanceof \think\Collection || $filename instanceof \think\Paginator): $i = 0; $__LIST__ = $filename;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?>
								<div><span><?php echo htmlentities($file['filename']); ?></span> <a class="icon iconfont icondaochu ml-8" href="<?php echo htmlentities($file['path']); ?>"></a></div>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="hr w-100" style="margin: 30px auto"></div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
					<a href="index.html" class="ivu-btn-default ivu-btn" >Return</a>
				</div>
			</div>

		</div>

	</div>
</body>
</html>
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
			message  : 'Hello Vue.js!',
			ismodel  : false,
			cf       : '',
			model18  : ["valueLondon", "Ottawa", "Paris"],
			model19  : ["Ottawa", "Paris"],
			model20  : [],
			cityList4: [
				{
					value: 'valueNew York',
					label: 'New York',
				},
				{
					value: 'valueLondon',
					label: 'London',
				},
				{
					value: 'Sydney',
					label: 'Sydney',
				},
				{
					value: 'Ottawa',
					label: 'Ottawa',
				},
				{
					value: 'Paris',
					label: 'Paris',
				},
				{
					value: 'Canberra',
					label: 'Canberra',
				},
			],
			cityList5: [
				{
					value: 'New York',
					label: 'New York',
				},
				{
					value: 'London',
					label: 'London',
				},
				{
					value: 'Sydney',
					label: 'Sydney',
				},
				{
					value: 'Ottawa',
					label: 'Ottawa',
				},
				{
					value: 'Paris',
					label: 'Paris',
				},
				{
					value: 'Canberra',
					label: 'Canberra',
				},
			],
		},
		methods: {
			changemodel20: function (e) {

				this.cityList5 = [
					{
						value: e + 'New 点此选择编码',
						label: e + 'New Yo点此选择编码rk',
					},
					{
						value: '点此选择编码',
						label: '点此选择编码',
					},
					{
						value: 'Sydney',
						label: 'Sydney',
					},
					{
						value: 'Ottawa',
						label: 'Ottawa',
					},
					{
						value: 'Paris',
						label: 'Paris',
					},
					{
						value: 'Canberra',
						label: 'Canberra',
					},
				];
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
<script>

	layui.use(['form'], function () {
		var form = layui.form;
		form.on('select(test1)', function (data) {
			var value   = data.value;
			var option  = $('.flcode').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flcode').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});

		form.on('select(test2)', function (data) {
			var value   = data.value;
			var option  = $('.flname').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flname').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});

		form.on('select(test3)', function (data) {

			// $('.cfcode').empty();
			// $('.cfcode').append(
			// 	'<option value=""></option>' +
			// 	'<option value="0">编码</option>' +
			// 	'<option value="1">编码</option>' +
			// 	'<option value="2">编码</option>',
			// );

			var value   = data.value;
			var option  = $('.cfcode').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.cfcode').append(apphtml);
			form.render('select');
		});

		form.on('select(test4)', function (data) {
			// console.log(data)
			// $('.cfname').empty();
			// $('.cfname').append(
			// 	'<option value=""></option>' +
			// 	'<option value="0">成分1</option>' +
			// 	'<option value="1">成分1</option>' +
			// 	'<option value="2">成分1</option>',
			// );

			var value   = data.value;
			var option  = $('.cfname').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.cfname').append(apphtml);
			form.render('select');
		});


		// form.render(null, 'test1'); //更新 lay-filter="test1" 所在容器内的全部表单状态
		// form.render('select', 'test2'); //更新 lay-filter="test2" 所在容器内的全部 select 状态

	});


	/*删除上传图片*/
	$('.imgdelete').click(function () {
		$('#male').val('');
	});

	/*删除文件*/
	$(".basic-updata-items").on('click', '.updata-item-del', function () {
		$(this).parent().parent().parent().remove();
	});

	/* 添加活性成分*/
	$('.add-hxcf').click(function (e) {
		//成分
		var cf     = $(this).parent().prev().prev().prev().prev().children('select').val();
		var cftext = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").text();
		if (cf == '') {
			alert('成分为空');
			return false;
		}
		//编码
		var bm     = $(this).parent().prev().prev().prev().children('select').val();
		var bmtext = $(this).parent().prev().prev().prev().children('select').find("option:selected").text();
		if (bm == '') {
			alert('成分为空');
			return false;
		}
		// 剂量
		var jl = $(this).parent().prev().prev().children('input').val();
		if (jl == '') {
			alert('剂量为空');
			return false;
		}
		//单位
		var mg     = $(this).parent().prev().children('select').val();
		var mgtext = $(this).parent().prev().children('select').find("option:selected").text();
		if (mg == '') {
			alert('单位为空');
			return false;
		}


		var html = '<div class="hxcfitem w-100 d-flex align-items-center justify-content-around" style="height: 40px;">' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cf + '" type="hidden">' +
			cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bm + '" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>' +
			'</div>' +
			'</div>';
		$('.hxcflistitems').append(html);
	});
	/* 点击删除活性成分*/
	$(".hxcflist").on('click', '.rmhxcfitem', function () {
		$(this).parent().parent().remove();
	});

	/*添加辅料*/
	$('.add-fl').click(function (e) {
		//成分
		var cf     = $(this).parent().prev().prev().prev().prev().children('select').val();
		var cftext = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").text();
		if (cf == '') {
			alert('成分为空');
			return false;
		}
		//编码
		var bm     = $(this).parent().prev().prev().prev().children('select').val();
		var bmtext = $(this).parent().prev().prev().prev().children('select').find("option:selected").text();
		if (bm == '') {
			alert('成分为空');
			return false;
		}
		// 剂量
		var jl = $(this).parent().prev().prev().children('input').val();
		if (jl == '') {
			alert('剂量为空');
			return false;
		}
		//单位
		var mg     = $(this).parent().prev().children('select').val();
		var mgtext = $(this).parent().prev().children('select').find("option:selected").text();
		if (mg == '') {
			alert('单位为空');
			return false;
		}

		var html = '<div class="hxcfitem w-100 d-flex align-items-center justify-content-around" style="height: 40px;">' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cf + '" type="hidden">' +
			cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bm + '" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmflitem"></i>' +
			'</div>' +
			'</div>';
		$('.fllistitems').append(html);
	});
	/* 点击删除辅料*/
	$(".fllistitems").on('click', '.rmflitem', function () {
		$(this).parent().parent().remove();
	});

</script>
