<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<!-- 公共样式-->

	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/font/iconfont.css">
	<!--<link rel="stylesheet" href="{__ADMIN_FRAME}/plugins/layui/css/layui.css">-->
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/iview.css">
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/mi-common.css">
	<link rel="stylesheet" href="{__ADMIN_FRAME}/css/pages/mi.css">

</head>
<body>
	<div id="app" class="w-100 h-100 fixed mi-password d-flex align-items-center justify-content-center">
		<div class="content h-100 d-flex align-items-center justify-content-center">
			<div class="among w-100 d-flex align-items-start justify-content-between flex-column border">
				<div class="top w-100 bg-fff">
					<div class="logo w-100 d-flex align-items-center justify-content-between">
						<img class="ml-20" style="height: 40px;" src="{__ADMIN_FRAME}/images/mi/logo-2.png" alt="">
						<a href="index.html" class="text-c01f5e pr-20">登录</a>
					</div>
					<div class="h-100" style="width: 324px;margin: auto">
						<form action="{:Url('repwd')}" method="post">
							<div class="text-c01f5e size-16 fw w-100 text-center mt-20">找回密码</div>
							<div class="w-100 mt-30 d-flex align-items-center justify-content-start">
								<div class="w-100px">对接人手机</div>
								<div>：</div>
								<div class="relative">
									<input placeholder="请输入" v-model="mobile" name="mobile" required class="ivu-input w-240px" type="text">
									<div class="absolute text-c01f5e codetext cursor" @click="getcode">{{codetext}}</div>
								</div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">重置密码</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="password" name="password"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">确认密码</div>
								<div>：</div>
								<div><input placeholder="请输入" class="ivu-input w-240px" type="password" name="re_password"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<div class="w-100px">验证码</div>
								<div>：</div>
								<div><input class="ivu-input w-240px" placeholder="请输入" type="text" name="captcha"></div>
							</div>
							<div class="w-100 mt-25 d-flex align-items-center justify-content-start">
								<button  class="ivu-btn-primary ivu-btn w-100" type="submit">重置密码</button>
							</div>
						</form>
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
