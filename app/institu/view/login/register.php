<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
	<!-- 公共样式-->
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/font/iconfont.css">
	<!--<link rel="stylesheet" href="{__ADMIN_FRAME}/plugins/layui/css/layui.css">-->
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/iview.css">
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/mi-common.css">
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/pages/mi.css">

</head>
<body>
	<div id="app" class="w-100 h-100 mi-register d-flex align-items-center justify-content-center">
		<div class="content h-100 d-flex align-items-center justify-content-center mt-80 mb-80">
			<div class="among w-100 d-flex align-items-start justify-content-between flex-column">
				<div class="top w-100 bg-fff">
					<div class="logo w-100 d-flex align-items-center justify-content-between">
						<img class="ml-20" style="height: 40px;" src="{__ADMIN_FRAME}/images/mi/logo-1.png" alt="">
						<span class="mr-20">已有账号，<a href="index.html" class="text-c01f5e">直接登录</a></span>
					</div>
					<div class="h-100" style="width: 330px;margin: auto">
						<form action="{:Url('register')}" method="post">
							<div class="text-c01f5e size-16 fw w-100 text-center mt-20">注册新账号</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">机构名称 <span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填" type="text" name="name" ></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">登录账号 <span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填,8-16位字符" type="text" name="account"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">密码 <span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填,6-20位字符" type="text" name="password"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">密码确认<span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填,6-20位字符" type="text"  name="re_password"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">对接人<span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填" type="text" name="referrer"></div>
							</div>
							<div class="w-100 mt-30 d-flex align-items-center justify-content-start">
								<div class="w-80px">手机号码</div>
								<div>：</div>
								<div class="relative">
									<input placeholder="请输入" v-model="mobile" name="refer_mobile" required class="ivu-input w-240px" type="text">
									<div class="absolute text-c01f5e codetext cursor" @click="getcode">{{codetext}}</div>
								</div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">邮箱地址<span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填" type="text" name="refer_email"></div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">邀请码<span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="必填" type="text" name="recommend"></div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">验证码<span class="text-f5222d">*</span></div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="短信验证码" type="text" name="code"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">紧急联系人</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="text" name="ecp"></div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">联系方式</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="text" name="ecm"></div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">邮箱地址</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="text" name="ece"></div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-start justify-content-start">
								<div style="width: 76px;">营业执照</div>
								<div>：</div>
								<div>
									<label>
										<div  class="ivu-btn ivu-btn-default">
											<i class="icon iconfont icondaoru1"></i>
											上传文件
										</div>
										<input multiple accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" name="business_license[]" type="file" class="hide upfile">
									</label>
									<div class="basic-updata-items basic-updata-items1" >
										<!--
										<div class="basic-updata-item">
											<div class="relative w-100 d-flex">
												<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
												<span>文件111.jpg</span>
												<span class="close absolute">
													<i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i>
												</span>
												<input type="hidden">
											</div>
										</div>
										-->

									</div>

								</div>
							</div>

							<div class="w-100 mt-25 d-flex align-items-start justify-content-start">
								<div style="width: 76px;">合作协议</div>
								<div>：</div>
								<div class="w-250px">
									<label>
										<div  class="ivu-btn ivu-btn-default">
											<i class="icon iconfont icondaoru1"></i>
											上传文件
										</div>
										<input multiple accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" name="ca[]" type="file" class="hide upfile2">
									</label>
									<div class="mt-8 basic-updata-items basic-updata-items2" style="">

										<!--
										<div class="basic-updata-item">
											<div class="relative w-100 d-flex">
												<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
												<span>文件111.jpg</span>
												<span class="close absolute">
													<i class="icon iconfont cursor iconguanbi updata-item-del absolute size-12"></i>
												</span>
												<input type="hidden">
											</div>
										</div>
										-->
									</div>
								</div>
							</div>
							<!--#######################-->

							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<button :disabled="!single" class="ivu-btn-primary ivu-btn w-100" type="submit"> 注册</button>
							</div>
							<div class="w-100 mt-8 d-flex align-items-start justify-content-start mb-30">
								<div>
									<Checkbox v-model="single" name="is_read" value="1"/>
								</div>
								<div class="size-12 text-57">
									我已阅读 <a href="" class="text-c01f5e">《TS平台用户服务协议》</a>、<a href="" class="text-c01f5e">《TS用户隐私政策》</a>，并同意相关条款。
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--验证码弹窗-->
		<div v-show="modal13">
			<div class=" ivu-modal-mask"></div>
			<div class="ivu-modal ivu-modal-wrap fixed" style="width: 530px;height: 218px;margin: auto">
				<div class="ivu-modal-content">
					<a class="ivu-modal-close">
						<i class="ivu-icon ivu-icon-ios-close" @click="modal13=false"></i>
					</a>
					<div class="ivu-modal-header">
						<div class="ivu-modal-header-inner ml-10">帮助</div>
					</div>
					<div class="ivu-modal-body pl-30 pr-30">
						<div class="fw">无法收到手机验证码怎么办？</div>
						<div>无法收到手机验证码帮助信息无法收到手机验证码帮助信息，无法收到手机验证码帮助信息无法收到手机验证码帮助信息</div>
					</div>
					<div class="ivu-modal-footer">
						<button type="button" class="ivu-btn ivu-btn-default" @click="modal13=false">关闭</button>
					</div>
				</div>
			</div>
		</div>

		<!-- 邀请码弹窗-->
		<div v-show="modal12">
			<div class=" ivu-modal-mask"></div>
			<div class="ivu-modal ivu-modal-wrap fixed" style="width: 530px;height: 218px;margin: auto">
				<div class="ivu-modal-content">
					<a class="ivu-modal-close">
						<i class="ivu-icon ivu-icon-ios-close" @click="modal12=false"></i>
					</a>
					<div class="ivu-modal-header">
						<div class="ivu-modal-header-inner ml-10">帮助</div>
					</div>
					<div class="ivu-modal-body pl-30 pr-30">
						<div class="fw">邀请码如何获取，有何作用？？</div>
						<div>邀请码如何获取，有何作用？邀请码如何获取，有何作用？邀请码如何获取，有何作用？邀请码如何获取，有何作用？</div>
					</div>
					<div class="ivu-modal-footer">
						<button type="button" class="ivu-btn ivu-btn-default" @click="modal12=false">关闭</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
<script src="{__ADMIN_FRAME}/js/jquery.js"></script>
<script src="{__ADMIN_FRAME}/js/vue.js"></script>
<script src="{__ADMIN_FRAME}/js/iview.min.js"></script>
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
</html>
<script>
	var app = new Vue({
		el     : '#app',
		data   : {
			mobile  : '',
			codetext: '发送验证码',
			show    : true,
			single  : false,
			modal12 : false,
			modal13 : false,
		},
		methods: {
			getcode() {
				var myreg = /^[1][0-9]{10}$/;
				if (!myreg.test(this.mobile)) {
					return false;
				}

				var count = 60;
				if (this.show) {
					clearInterval(this.timeId);
					this.codetext = count + 's';
					this.timeId   = setInterval(() => {
						count--;
						if (count <= 0) {
							clearInterval(this.timeId);
							this.show     = true;
							this.codetext = '发送验证码';taidu
						} else {
							this.codetext = count + 's';
						}
					}, 1000);
					this.show     = false;
				}
			},
		},
	});
	// 上传文件先清空
	$('.upfile').click(function () {
		$('.upfile').val('');
	});
	$('.upfile').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('files[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        : "{:Url('file_upload')}",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				for (var i = 0; i < res.length; i++) {
					var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
						res[i]+
						'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
						'<input type="hidden" value="'+res[i]+'">' +
						'</div></div>';
					$('.basic-updata-items1').append(html);
				}
			}, error   : function (er) {
				console.log(er);
			},
		});
	});
	//文件上传

	// 上传文件先清空
	$('.upfile2').click(function () {
		$('.upfile2').val('');
	});
	$('.upfile2').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile2")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('files[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        : "{:Url('file_upload')}",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				for (var i = 0; i < res.length; i++) {
					var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
						res[i]+
						'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
						'<input type="hidden" value="'+res[i]+'">' +
						'</div></div>';
					$('.basic-updata-items2').append(html);
				}
			}, error   : function (er) {
				console.log(er);
			},
		});
	});
	//文件上传

	/*删除文件*/
	$(".basic-updata-items").on('click', '.updata-item-del', function () {
		$(this).parent().parent().parent().remove();
	});

</script>
