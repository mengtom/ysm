<?php /*a:6:{s:60:"F:\WWW\yeshai\app\platform_us\view\crm\institution\basic.php";i:1606113698;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1595310927;}*/ ?>
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

	<title>平台管理-基本信息</title>
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
		<div class="w-1200  mt-80  text-666 size-14">
			<span>Home /</span> <a class="text-57" href="index.html"> Cooperation Organization Management / </a> <span class="text-c01f5e">Organization Information </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">Organization Information</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">
			<form class="layui-form" action="<?php echo Url('update',array('id'=>$institu['id'])); ?>" method="post">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="size-16 fw text-c01f5e ">Basic Information</div>

					<div class="items w-100">
						<div class="item w-100 ">
							<div class="size-14 item-text">Organization name<span class="text-ff4d4f">*</span></div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-400px" name="name" value="<?php echo htmlentities($institu['name']); ?>">
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">Login account<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-400px"value="<?php echo htmlentities($institu['account']); ?>">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">Reset password<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="English/Numbers/Symbols" class="ivu-input ml0" name="repassword">
									<i-input class="w-400px" v-model="value5" name="repassword" type="password" password placeholder="English/Numbers/Symbols" />
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">Contact person<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-400px" name="referrer" value="<?php echo htmlentities($institu['referrer']); ?>">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">Contact number<span class="text-ff4d4f">*</span></div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-190px" name="refer_mobile" value="<?php echo htmlentities($institu['refer_mobile']); ?>">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">E-mai</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-190px" name="refer_email" value="<?php echo htmlentities($institu['refer_email']); ?>">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">Emergency contact</div>
								<div class="w-100">
									<input  type="text" placeholder="English/Numbers/Symbols" class="ivu-input ml0 w-400px" name="ecp" value="<?php echo htmlentities($institu['ecp']); ?>">
								</div>
							</div>
							<div class="ml-50">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">Emergency contact number</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-190px" name="ecm" value="<?php echo htmlentities($institu['ecm']); ?>">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">E-mail</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-190px" name="ece" value="<?php echo htmlentities($institu['ece']); ?>">
										</div>
									</div>
								</div>
						</div>
					</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>
					<div style="margin-top: 18px;"><span class="size-16 fw text-c01f5e">Upload Files</span> <span class="ml-20">jpg、png、jepg、 JPG、PNG、JEPG、pdf、PDF</span></div>
					<div class="item mt-20 w-100 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text fw">Business license</div>
							<div class="w-400px mt-10">

								<?php if($institu['business_license']): ?>
								<div class="mt-8 basic-updata-items1" style="">
										<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span><?=pathinfo($institu['business_license'],PATHINFO_BASENAME)?></span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi  size-12"></i>
											</span>
											<input type="hidden" name="business_license" value="<?php echo htmlentities($institu['business_license']); ?>">
										</div>
									</div>
								</div>
								<?php else: ?>
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaoru1"></i>
										Upload
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" type="file" class="hide upfile">
								</label>
								<?php endif; ?>

							</div>
						</div>

						<div class="ml-50">
							<div class="size-14 item-text fw">Cooperation agreement</div>
							<div class="w-400px mt-10">
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaoru1"></i>
										Upload
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" multiple name="" type="file" class="hide upfile2">
								</label>
								<div class="mt-8 basic-updata-items basic-updata-items2">
									<?php if(is_array($filename) || $filename instanceof \think\Collection || $filename instanceof \think\Paginator): $i = 0; $__LIST__ = $filename;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?>
									<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span><?php echo htmlentities($f['filename']); ?></span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi absolute size-12"></i>
											</span>
											<input type="hidden" name="ca[]" value="<?php echo htmlentities($f['path']); ?>">
										</div>
									</div>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="hr w-100"></div>
					<div class="size-16 fw text-c01f5e mt-10 ">Transaction information</div>
					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">Group</div>
							<div class="w-400px">
								<select name="group">
									<option value="">ALL</option>
									<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($g['id']); ?>" <?php if($institu['group'] == $g['id']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($g['name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
						<div class="item w-100 text-27">
							<span>Commission rate：<?php echo htmlentities($institu['group_commission']); ?>%</span> <span class="ml-20">Purchase discount：<?php echo htmlentities($institu['group_discount']); ?></span>
						</div>
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="d-flex align-items-start justify-content-start useroder w-400px" style="width: 400px;">
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
					<div class="hr w-100 "></div>
					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">Save</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">Cancel</a>
					</div>
				</div>

			</form>
		</div>

		<!--充值-->
		<div style="display: none" class="modal-root label-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 460px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">充值</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="<?php echo Url('update_recharge',array('pid'=>$institu['id'])); ?>" method="post">

					<div class="items d-flex align-items-center justify-content-start flex-column   ">
						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<!--结算货币不可更改，添加平台时已指定-->
							<span style="width: 90px;">结算货币：</span><?php echo htmlentities($institu['currency']); ?>
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">充值金额：</span><input type="number" placeholder="请输入" name="money" value="0" class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">收款方式：</span><input type="text" placeholder="请输入" name="payment"  class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">流水单号：</span><input type="text" placeholder="请输入" name="code" class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<div style="width: 90px;">备  注：</div>
							<div>
								<textarea placeholder="请输入" style="width: 327px;height: 68px;" name="mark" class="ivu-input ivu-input-default"></textarea>
							</div>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">提交</button>
					</div>
				</form>
			</div>
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

<!-- <script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			value5: '',
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
</script> -->
<script>
 //实例化form
    layList.form.render();
	//excel下载
    layList.search('export',function(where){
    	var time=$("#test13").val();
    	if(!time){
    		layList.msg('请选择年月');
    		return false;
    	}
        location.href=layList.U({m:'terrace',c:'crm.institution',a:'recharge_list',p:{excel:1,time:time,id:<?php echo htmlentities($institu['id']); ?>}});
    })
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'month'
		});
	})



	//弹窗
	$('.closemode').click(function () {
		$('.modal-root').hide();
	});

	$('.add-mode').click(function () {
		$('.modal-root').show();
	});
	// 上传文件先清空
	$('.upfile').click(function () {
		$('.upfile').val('');
	});
	$('.upfile').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile")[0].files;
		data.append('file', files[0]);
		$.ajax({
			url        : "<?php echo Url('upload'); ?>",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code == 200){
					var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
					res.data.filename+
					'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
					'<input type="hidden" value="'+res.data.path+'" name="business_license">' +
					'</div></div>';
					$('.basic-updata-items1').append(html);
					$('.upfile').parent().hide();
				}
			}, error   : function (er) {
				console.log(er);
			},
		});
	});

	// 上传文件先清空
	$('.upfile2').click(function () {
		$('.upfile2').val('');
	});
	$('.upfile2').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile2")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('file[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        : "<?php echo Url('file_upload'); ?>",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code == 200){
					for (var i = 0; i < res.data.length; i++) {
						var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
							res.data[i].filename+
							'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
							'<input type="hidden" value="'+res.data[i].path+'" name="ca[]">' +
							'</div></div>';
						$('.basic-updata-items2').append(html);
					}
				}

			}, error   : function (er) {
				console.log(er);
			},
		});
	});

</script>
