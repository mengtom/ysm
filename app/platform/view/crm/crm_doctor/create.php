{include file="public/header"}
	<title>添加医生</title>

	<div id="app" class="crm-edit-p">
		<!--头部-->

		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200  mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 独立医生管理  /</a> <span class="text-c01f5e">添加医生 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">添加医生</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="{:Url('save')}" method="post">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="items w-100">
						<div class="item w-100">
							<div class=" size-14 item-text">医生名称<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input style="width: 400px;" type="text" name="name" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start">
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
								</div>
							</div>
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">联系方式<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="refer_mobile" placeholder="由数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">邮箱</div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="refer_email" placeholder="由英文/数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
						</div>
						<div class="hr w-100 "></div>
						<div class="size-16 fw text-c01f5e mt-10 ">交易信息</div>
						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">所属分组</div>
								<div class="w-400px">
									<select name="group" class="w-400px">
										<option value="">请选择</option>
										{volist name="group" id="g"}
										<option value="{$g.id}">{$g.name}</option>
										{/volist}
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">添加机构</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="submit">取消</a>
					</div>
				</div>
			</form>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
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

</script>
