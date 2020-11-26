{include file="public/header"}
	<title>医生管理</title>
	<div id="app" class="mi-doctor-basic">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-999 size-14">
			<span>首页 /</span> <a class="text-999" href="index.html"> 医生管理 / </a> <span class="text-c01f5e">修改 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">修改</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="{:Url('update',array('id'=>$doctor['id']))}" method="post">
				<div class="wp-edit-body pl-30 pr-30  h-100 pt-20">

					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">医生姓名<span class="text-ff4d4f">*</span></div>
							<div class="w-100">
								<input style="width: 400px;" type="text" lay-verify="required" name="name" value="{$doctor.name}" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
							</div>
						</div>

						<div class="item mt-20 w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" value="{$doctor.account}" disabled placeholder="由8~16位英文/数字/符号组成" class="ivu-input w-400px">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">登录密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<i-input class="w-400px" name="repassword" v-model="value5" type="password" password placeholder="由8~16位英文/数字/符号组成"/>
								</div>
							</div>
						</div>

						<div class="item mt-20 w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">联系电话<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="由数字/符号组成" lay-verify="required" class="ivu-input w-400px" name="refer_mobile" value="{$doctor.refer_mobile}">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">邮箱</div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input w-400px" name="refer_email" value="{$doctor.refer_email}">
								</div>
							</div>
						</div>
					</div>
					<div class="hr w-100"></div>
					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
						<button class="ivu-btn-primary ivu-btn mr-20" lay-submit type="submit">保存</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">取消</a>
					</div>
				</div>

			</form>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
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
