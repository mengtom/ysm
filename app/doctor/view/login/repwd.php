<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<!-- 公共样式-->
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/ts-common.css">
    <link rel="stylesheet" href="{__ADMIN_FRAME}/css/font/iconfont.css">
    <link rel="stylesheet" href="{__ADMIN_FRAME}/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="{__ADMIN_FRAME}/css/ts-iview.css">
    <link rel="stylesheet" href="{__ADMIN_FRAME}/css/pages/ts-view.css">
</head>
<body>
	<div id="app" class="w-100 h-100 fixed password d-flex align-items-center justify-content-center" style="background-image: url('{__ADMIN_FRAME}/images/doctor/img@3x.png');">
		<div class="content h-100 d-flex align-items-center justify-content-center">
			<div class="among w-100 d-flex align-items-start justify-content-between flex-column">
				<div class="top w-100 bg-fff">
					<div class="logo w-100 d-flex align-items-center justify-content-between">
						<img class="ml-20" style="height: 40px;" src="{__ADMIN_FRAME}/images/doctor/logo-2@3x.png" alt="">
						<a href="login.html" class="text-0081a7 pr-20">登录</a>
					</div>
					<div class="h-100" style="width: 312px;margin: auto">
						<form action="{:Url('repwd')}" method="post">
							<div class="text-0081a7 size-16 fw w-100 text-center mt-20">找回密码</div>
							<div class="w-100 mt-30 d-flex align-items-center justify-content-start">
								<div class="w-60px">手机号码</div>
								<div>：</div>
								<div class="relative">
									<input placeholder="请输入" v-model="mobile" name="mobile" required class="ivu-input w-240px" type="text">
									<div class="absolute text-0081a7 codetext cursor" @click="getcode">{{codetext}}</div>
								</div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-60px">重置密码</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="password" name="re_password"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-60px">确认密码</div>
								<div>：</div>
								<div><input placeholder="请输入" class="ivu-input w-240px" type="password" name="password"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-60px">验证码</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="text" name="captcha"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<button  class="ivu-btn-primary ivu-btn w-100" type="submit">重置密码</button>
							</div>
						</form>
					</div>
				</div>
				<div class="button w-100 bg-fff d-flex align-items-start justify-content-between flex-column">
					<div class="w-100 h-50 d-flex align-items-center justify-content-center help">帮助</div>
					<div class="w-100 h-50 d-flex align-items-center justify-content-start">
						<div class="w-50 h-100 d-flex align-items-center justify-content-center cursor text-57" @click="modal13 = true">无法收到手机验证码怎么办？</div>
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
						<i class="ivu-icon ivu-icon-ios-close"  @click="modal13=false"></i>
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
	</div>
</body>
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
							this.codetext = '发送验证码';
						} else {
							this.codetext = count + 's';
						}
					}, 1000);
					this.show     = false;
				}
			},
		},
		// 获取列表数


	});

</script>
