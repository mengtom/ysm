<?php /*a:4:{s:55:"F:\WWW\yeshai\app\doctor\view\crm\crm_order\details.php";i:1599731404;s:47:"F:\WWW\yeshai\app\doctor\view\public\header.php";i:1602238877;s:47:"F:\WWW\yeshai\app\doctor\view\public\footer.php";i:1603783219;s:53:"F:\WWW\yeshai\app\doctor\view\public\inner_footer.php";i:1603783219;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>后台-首页</title>
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/ts-iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/ts-view.css">
	<link rel="stylesheet" href="/ysm/static/css/ts-common.css">
    <style>
        html, body {
            width      : 100%;
            height     : 100%;
            background : #f2f3f5;
        }
    </style>
</head>

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
							<div class="size-14 item-text">订单编号：<?php echo htmlentities($order['order_sn']); ?></div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class=" size-14 item-text w-400px">会员手机号：<?php echo htmlentities($order['real_name']); ?></div>
							<div class=" size-14 item-text w-400px ml-50">会员姓名：<?php echo htmlentities($order['user_phone']); ?></div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">订单金额：<?php echo htmlentities($order['pay_price']); ?>元（商品：<?php echo htmlentities($order['total_price']); ?>元，运费10元）</div>
							<div class="size-14 item-text w-400px ml-50">付款方式：<?php echo htmlentities($order['pay_type_name']); ?></div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px">订单状态：<?php echo htmlentities($order['status_name']); ?></div>
							<div class="size-14 item-text w-400px ml-50">下单时间：<?php echo date('Y-m-d H:i',$order['add_time'])?></div>
						</div>
						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100 w-100px">订单备注：</div>
								<div><?php echo htmlentities($order['mark']); ?></div>
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
								<?php if(is_array($order['_info']) || $order['_info'] instanceof \think\Collection || $order['_info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
								<tr>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['code']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['zn_name']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['total_dose']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['num']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['micro_price']); ?></td>
									<td class="text-center text-57 t-table-td"><?php echo htmlentities($m['total_price']); ?></td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
							<div class="w-200px">单剂微片种类数：<?php echo htmlentities($order['micro_cate_count']); ?></div>
							<div class="w-200px ml-10">单剂微片总数量：<?php echo htmlentities($order['micro_count']); ?></div>
						</div>

						<div class="w-100 mt-10">
							<div class="w-400px text-0081a7">单剂总价格：<?php echo htmlentities($order['price']); ?>元</div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-200px">每日服用次数：<?php echo htmlentities($order['taking_quency']); ?></div>
							<div class="w-200px ml-10">服用周期：<?php echo htmlentities($order['taking_cycle']); ?></div>
						</div>


						<div class="w-100 mt-10">
							<div class="w-400px text-0081a7 fw">总计价格：<?php echo htmlentities($order['total_price']); ?>元</div>
						</div>

						<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start">
								<div class="h-100" style="width: 45px;">医嘱：</div>
								<div><?php echo htmlentities($order['taking_remark']); ?></div>
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
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>

<script src="/ysm/static/js/axios.js"></script>



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

