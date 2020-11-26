{include file="public/header"}
	<title>订单详情</title>

	<div id="app" class="crm-details pr-20 pl-20">

		<div class="w-100 mt-20  mb-10 tip size-14"><a class="text-999">首页 /</a><a href="index.html" class="text-999">采购订单 /</a><a class="text-0081a7">订单详情</a></div>

		<div class="w-100 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-27">订单详情</span>
		</div>


		<!--列表-->
		<div class="w-100 mw-1160  wp-edit pb-10 pr-30 pl-30 bg-fff" style="border-radius: 1px;">
			<form class="layui-form" action="">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="size-16 fw text-0081a7 mt-10 ">订单基本信息</div>

					<div class="items w-100">
						<div class="w-100 mt-20">
							<div class="size-14 item-text">订单编号：{$order.order_sn}</div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class=" size-14 item-text w-400px">会员手机号：{$order.real_name}</div>
							<div class=" size-14 item-text w-400px ml-50">会员姓名：{$order.user_phone}</div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">订单金额：{$order.pay_price}元（商品：{$order.total_price}元，运费10元）</div>
							<div class="size-14 item-text w-400px ml-50">付款方式：{$order.pay_type_name}</div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">订单状态：{$order.status_name}</div>
							<div class="size-14 item-text w-400px ml-50">下单时间：<?php echo date('Y-m-d H:i',$order['add_time'])?></div>
						</div>
						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100 w-100px">订单备注：</div>
								<div>{$order.mark}</div>
							</div>
						</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>
					<div class="size-16 fw text-0081a7 mt-10 ">订单详情信息</div>
					<div class="items w-100">
						<div class="w-100 mt-20 fw">单剂中微片信息</div>
						<div class="w-100 mt-10 ivu-table-wrapper ivu-table-wrapper-with-border">
							<table class="ivu-table  ivu-table-default ivu-table-border" style="overflow: initial">
								<tbody class="ivu-table-tbody">
								<tr class="ivu-table-header">
									<th class="bg-f4 text-center text-57 t-table-td">微片编码</th>
									<th class="bg-f4 text-center text-57 t-table-td">微片名称</th>
									<th class="bg-f4 text-center text-57 t-table-td">总显示剂量</th>
									<th class="bg-f4 text-center text-57 t-table-td">数量</th>
									<th class="bg-f4 text-center text-57 t-table-td">微片单价</th>
									<th class="bg-f4 text-center text-57 t-table-td">单剂价格</th>
								</tr>
								{volist name="$order['_info']" id="m"}
								<tr>
									<td class="text-center text-57 t-table-td">{$m.code}</td>
									<td class="text-center text-57 t-table-td">{$m.zn_name}</td>
									<td class="text-center text-57 t-table-td">{$m.total_dose}</td>
									<td class="text-center text-57 t-table-td">{$m.num}</td>
									<td class="text-center text-57 t-table-td">{$m.micro_price}</td>
									<td class="text-center text-57 t-table-td">{$m.total_price}</td>
								</tr>
								{/volist}
								</tbody>
							</table>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="w-200px">单剂微片种类数：{$order.micro_cate_count}</div>
							<div class="w-200px ml-10">单剂微片总数量：{$order.micro_count}</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px text-0081a7">单剂总价格：{$order.price}元</div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-200px">每日服用次数：{$order.taking_quency}</div>
							<div class="w-200px ml-10">服用周期：{$order.taking_cycle}</div>
						</div>


						<div class="w-100 mt-10">
							<div class="w-400px text-0081a7 fw">总计价格：{$order.total_price}元</div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100" style="width: 45px;">医嘱：</div>
								<div>{$order.taking_remark}</div>
							</div>
						</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>
					<div class="items w-100">
						<div class="w-100 mt-20">
							<div class="size-16 item-text  w-400px fw">物流信息</div>
						</div>

						<div class="w-100 mt-10">
							<div class="size-14 item-text  w-400px">物流公司：XX快递</div>
						</div>

						<div class="w-100 mt-10">
							<div class="size-14 item-text  w-400px">物流单号：XXXXXXXXXXXXXXXX</div>
						</div>

						<div class="w-100 mt-10">
							<div class="d-flex align-items-start justify-content-start">
								<div class="h-100 w-100px" style="width: 75px;">物流跟踪：</div>
								<div class="w-100 d-flex align-items-start flex-column justify-content-start">
									<div>2020-00-00 10:00:00 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX已发出</div>
									<div><a href="" class="text-0081a7">更多物流信息</a></div>
								</div>
							</div>
							<div></div>
						</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-20" >
						<a href="order.html" class="ivu-btn-default ivu-btn" >返回</a>
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
		},
		methods: {

		},
	});
</script>

