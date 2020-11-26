{include file="public/header"}
	<title>cmr添加-编辑</title>

	<div id="app" class="cmr-details">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html">平台管理 </a> <a class="text-57" :href=`{:Url('order')}?id={$p_id}`>/ 查看平台订单</a> <span class="text-c01f5e">/ 订单详情 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">订单详情</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="size-16 fw text-c01f5e mt-10 ">订单基本信息</div>

					<div class="items w-100">
						<div class="w-100 mt-20">
							<div class="size-14 item-text">订单编号：{$order.order_sn}</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class=" size-14 item-text w-400px">会员手机号：{$order.user_phone}</div>
							<div class=" size-14 item-text w-400px ml-50">会员姓名：{$order.real_name}</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">订单金额：{$order.pay_price}元（商品：{$order.total_price}元，运费{$order.freight_price}元）</div>
							<div class="size-14 item-text w-400px ml-50">付款方式：{$order.pay_type_name}</div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">订单状态：{$order.status_name}</div>
							<div class="size-14 item-text w-400px ml-50">下单时间：{$order.add_time}</div>
						</div>


						<div class="w-100 mt-20">
							<div class="size-14 item-text w-400px fw">发票信息</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">发票抬头：XXXXX</div>
							<div class="size-14 item-text w-400px ml-50">税号：XXXXXS</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">开户行：XXXXXXXXXXXXXX</div>
							<div class="size-14 item-text w-400px ml-50">账号：XXXXXXXXXXXXX</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100" style="width: 70px;">地址：</div>
								<div>址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址地址</div>
							</div>
							<div class="size-14 item-text w-400px ml-50">电话：123456789</div>
						</div>

						<div class="w-100 mt-20">
							<div class="size-14 item-text w-400px fw">其他</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100 w-100px">订单备注：</div>
								<div>{$order.mark}</div>
							</div>
						</div>

					</div>


					<div class="hr w-100" style="margin: 30px auto"></div>


					<div class="size-16 fw text-c01f5e mt-10 ">订单详情信息</div>

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
								{volist name="$order._info" id="m"}
								<tr>
									<td class="text-center text-57 t-table-td">{$m.code}</td>
									<td class="text-center text-57 t-table-td">{$m.micro_name}</td>
									<td class="text-center text-57 t-table-td">{$m.total_dose}</td>
									<td class="text-center text-57 t-table-td">{$m.num}</td>
									<td class="text-center text-57 t-table-td">{$m.micro_price}</td>
									<td class="text-center text-57 t-table-td">{$m.total_price}</td>
								</tr>
								{/volist}
								</tbody>
							</table>
						</div>
						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-200px">单剂微片种类数：{$order.micro_cate_count}</div>
							<div class="w-200px ml-10">单剂微片总数量：{$order.micro_count}</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px text-c01f5e">单剂总价格：{$order.price}元</div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-200px">每日服用次数：{$order.taking_quency}</div>
							<div class="w-200px ml-10">服用周期：{$order.taking_cycle}</div>
						</div>


						<div class="w-100 mt-10">
							<div class="w-400px text-c01f5e fw">总计价格：{$order.total_price}元</div>
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
						<div class="size-16 fw text-c01f5e mt-10 ">Supplement Facts</div>

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
								{volist name="$order.facts" id="f"}
								<div class="w-100 d-flex align-items-center justify-content-start fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;">
									<div class="pl-10" style="width: 280px;">{$f.facts_name}</div>
									<div style="width: 130px;" class="text-right">{$f.amount} {$f.facts_unit}</div>
									<div style="width: 90px;" class="ml-20 text-right">{$f.facts_daily} %</div>
								</div>
								{/volist}
								<!--内容-->
								<div class="w-100 fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;line-height: 28px; border-top: 4px solid #d9d9d9;">
									<span class="pl-10">** Daily Value not established.</span>
								</div>
								<div style="height: 32px;border-bottom: 1px solid #d9d9d9;"></div>
							</div>
							<div>
								<span class="fw">Other ingredients:</span>
								<span class="text-57">{$order.ingredient}</span>
							</div>
						</div>
					</div>
					{if condition="$order.refund_status gt 0"}
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="items w-100">
						<div class="size-16 fw text-c01f5e mt-10">退款申请</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100" style="width: 85px;">退款原因：</div>
								<div>{$order.refund_reason_wap}</div>
							</div>
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start ml-50">
								<div class="h-100" style="width: 85px;">退款说明：</div>
								<div>{$order.refund_reason_wap_explain}</div>
							</div>
						</div>
					</div>
					{/if}
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="items w-100">

						<div class="size-16 fw text-c01f5e mt-10">收件、清关、物流信息</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text fw w-400px">收件人信息</div>
							<div class="size-14 item-text fw w-400px ml-50">清关信息</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">姓名：姓名</div>
							<div class="size-14 item-text w-400px ml-50">支付单清关单号：XXXXXXXXXXXXXXXX</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">身份证号：010111111111111111</div>
							<div class="size-14 item-text w-400px ml-50">清关状态：通过</div>
						</div>

						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">手机号码：1523456789</div>
						</div>

						<div class="w-100 mt-10">
							<div class="d-flex align-items-start justify-content-start w-400px">
								<div class="h-100" style="width: 85px;">收件地址：</div>
								<div class="">XX省 XX市 XX区 详细地址详细地址详细地址是快乐的方式开发</div>
							</div>
						</div>


						<div class="w-100 mt-20">
							<div class="size-14 item-text  w-400px fw">物流信息</div>
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
									<div><a href="" class="text-c01f5e">更多物流信息</a></div>
								</div>
							</div>
							<div></div>
						</div>
					</div>

					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="size-16 fw text-c01f5e mt-10 ">结算信息</div>
					<div class="items w-100">
						<div class="w-100 mt-20 fw">单剂中微片信息</div>
						<div class="w-100 mt-10 ivu-table-wrapper ivu-table-wrapper-with-border">
							<table class="ivu-table  ivu-table-default ivu-table-border" style="overflow: initial">
								<tbody class="ivu-table-tbody">
								<tr class="ivu-table-header">
									<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">微片编码</th>
									<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">微片名称</th>
									<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">数量</th>
									<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">微片结算价</th>
									<th class="bg-f4 text-center text-57 t-table-td" style="width: 228px;">小计</th>
								</tr>
								<tr>
									<td class="text-center text-57 t-table-td" style="width: 228px;">XXXXXXXXXXXXX</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">微片名称</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
								</tr>
								<tr>
									<td class="text-center text-57 t-table-td" style="width: 228px;">XXXXXXXXXXXXX</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">微片名称</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
									<td class="text-center text-57 t-table-td" style="width: 228px;">0000</td>
								</tr>
								</tbody>
							</table>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-200px">单剂结算价格：XXX</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">单剂包材结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">筒形包装包材结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">外包装包材结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">物流结算价格：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<!--（单剂结算价格+单剂包材结算价格）每日次数周期+筒形包装*周期/10+外包装包材结算价格+物流结算价格-->
							<div class="w-400px">订单总结算价格：<span>1111111</span>元</div>
						</div>

						<div class="w-100 mt-20">
							<div class="w-400px fw">订单来源追溯</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">合作平台：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">机构名称：XXX元</div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px">医生名称：XXX元</div>
						</div>

					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
						<a href="javascript:history.back('-1');" class="ivu-btn-default ivu-btn" >返回</a>
					</div>
				</div>
			</form>
		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
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

