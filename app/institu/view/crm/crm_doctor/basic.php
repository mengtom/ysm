{include file="public/header"}
	<title>独立医生管理-医生基本信息</title>
	<div id="app" class="crm-basic-p">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 独立医生管理 / </a> <span class="text-c01f5e">医生基本信息 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">医生基本信息</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">
			<form class="layui-form" action="{:Url('update',array('id'=>$doctor['id']))}" method="post">
				<div class="wp-edit-body  h-100 pt-20">
					<div class="size-16 fw text-c01f5e ">基本信息</div>
					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">医生姓名<span class="text-ff4d4f">*</span></div>
							<div class="w-100">
								<input type="text" name="name" value="{$doctor.name}" placeholder="由中文/英文/数字/符号组成" class="ivu-input w-400px">
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input type="text" value="{$doctor.account}" disabled placeholder="由英文/数字/符号组成" class="ivu-input w-400px">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">重置密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<i-input class="w-400px" name="repassword" v-model="value5" type="password" password placeholder="由英文/数字/符号组成"/>
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">联系方式<span class="text-ff4d4f">*</span></div>
								<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-400px">
									<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input w-400px" name="refer_mobile" value="{$doctor.refer_mobile}">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">邮箱</div>
								<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-400px">
									<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input w-400px" name="refer_email" value="{$doctor.refer_email}">
								</div>
							</div>
						</div>

					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="size-16 fw text-c01f5e mt-10 ">交易信息</div>
					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">所属分组</div>
							<div class="w-400px">
								<select name="group">
									<option value="">全部</option>
									{volist name="group" id="g"}
									<option value="{$g.id}" {eq name="$doctor.group" value="$g.id"}selected="selected"{/eq}>{$g.name}</option>
									{/volist}
								</select>
							</div>
						</div>
						<div class="item w-100 text-27">
							<span>返佣比例：{$doctor.group_commission}%</span> <span class="ml-20">拿货折扣：{$doctor.group_discount}折</span>
						</div>
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="d-flex align-items-start justify-content-start useroder">
								<div class="w-100 h-100">
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-50 h-100 bg-f6 pl-20 d-flex align-items-center fw">开具处方数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">目前成单数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">拿货订单数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">总佣金金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">已提现佣金金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">未提现佣金金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">患者数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="hr w-100"></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">保存</button>
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
