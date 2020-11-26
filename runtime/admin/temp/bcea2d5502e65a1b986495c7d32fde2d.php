<?php /*a:5:{s:60:"F:\WWW\yeshai\app\admin\view/ysm\crm\crm_platform\create.php";i:1600675383;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1603854727;}*/ ?>
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

	<title>添加平台</title>

	<div id="app" class="cmr-basic">
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
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57t" href="<?php echo Url('crm.crm_platform/index'); ?>">平台管理 </a> <span class="text-c01f5e">/ 添加平台 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">添加平台</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="<?php echo Url('save'); ?>" method="post">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="items w-100">
						<div class="item w-100 ">
							<div class=" size-14 item-text">平台名称<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input style="width: 400px;" type="text" name="p_name" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class=" size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="account" placeholder="由8~16位英文/数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">登录密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<i-input class="w-400px" v-model="value5" name="password" type="password" password placeholder="由英文/数字/符号组成"/>
									<!--<input style="width: 400px;" type="text" placeholder="由8~16位英文/数字/符号组成" class="ivu-input ml0">-->
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class=" size-14 item-text">对接人<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="referrer" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">联系方式<span class="text-ff4d4f">*</span></div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" name="refer_mobile" placeholder="由数字/符号组成" class="ivu-input ml0">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">邮箱</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" name="refer_email" placeholder="由英文/数字/符号组成" class="ivu-input ml0">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class=" size-14 item-text">紧急联系人</div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="ecp" placeholder="由英文/数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">紧急联系方式</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" name="ecm" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">邮箱</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" name="ece" placeholder="由英文/数字/符号组成" class="ivu-input ml0">
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="item  w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class="size-14 item-text">结算货币<span class="text-ff4d4f">*</span></div>
								<div class="w-400px">
									<select name="currency" class="w-400px" lay-verify="required">
										<option value="">请选择</option>
										<option value="人民币">人民币</option>
										<option value="美元">美元</option>
									</select>
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">业务区域</div>
								<div class="w-400px">
									<input type="text" name="place" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0 w-400px">
								</div>
							</div>
						</div>


					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>


					<div style="margin-top: 18px;"><span class="size-16 fw text-c01f5e">文件上传</span> <span class="ml-20">jpg、png、jepg、 JPG、PNG、JEPG、pdf、PDF</span></div>

					<div class="item mt-20 w-100 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text fw">营业执照</div>
							<div class="w-400px mt-10">
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaochu"></i>
										上传文件
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" type="file" class="hide upfile">
								</label>
								<div class="mt-8 basic-updata-items basic-updata-items1" style="">
								</div>
							</div>
						</div>

						<div style="margin-left: 50px;">
							<div class="size-14 item-text fw">合作协议</div>
							<div class="w-400px mt-10">
								<label >
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaochu"></i>
										上传文件
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" multiple="multiple"  type="file" class="hide upfile2">
								</label>
								<div class="mt-8 basic-updata-items basic-updata-items2" style="">
									<!-- <div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span>文件111.jpg</span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i>
											</span>
											<input type="hidden">
										</div>
									</div>
									<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span>文件111.jpg</span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi updata-item-del  size-12"></i>
											</span>
											<input type="hidden">
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>

					<div class="hr w-100 "></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">

						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">添加平台</button>
						<button class="ivu-btn-default ivu-btn" type="submit">取消</button>

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
<script>
	/*删除文件*/
	$(".basic-updata-items").on('click', '.updata-item-del', function () {
		$(this).parent().parent().parent().remove();
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
					layer.msg(res.msg);
				}else{
					layer.msg(res.msg);
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
					layer.msg(res.msg);
				}else{
					layer.msg(res.msg);
				}

			}, error   : function (er) {
				console.log(er);
			},
		});
	});
	//文件上传
</script>
