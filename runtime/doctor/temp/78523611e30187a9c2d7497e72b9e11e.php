<?php /*a:4:{s:48:"F:\WWW\yeshai\app\doctor\view\ts\ts\purchase.php";i:1603791340;s:47:"F:\WWW\yeshai\app\doctor\view\public\header.php";i:1602238877;s:47:"F:\WWW\yeshai\app\doctor\view\public\footer.php";i:1603783219;s:53:"F:\WWW\yeshai\app\doctor\view\public\inner_footer.php";i:1603783219;}*/ ?>
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

	<title>采购订单</title>

	<div id="app" class="ts-procure pr-20 pl-20 mw-1160">

		<div class="w-100 tip mt-20  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 配方查看 / </a> <span class="text-0081a7"> 采购订单 </span>
		</div>
		<div class="w-100 fw size-20 mt-10 text-27 d-flex align-items-center justify-content-between">
			<span>采购订单</span>
			<a href='<?php echo Url("prescription",["id"=>$id]); ?>' class="ivu-btn-primary ivu-btn"><i class="ivu-icon ivu-icon-md-add mr-8"></i>切换为患者处方</a>
		</div>
		<!--列表-->
		<div class="w-100  mt-10 pb-10 mb-30" style="border-radius: 1px;">
			<form class="d-flex w-100 layui-form  align-items-start justify-content-start" action="<?php echo url('doctor/crm.crm_order/savePurchase'); ?>" method="post">
				<div class="w-100 h-100 pt-20 bg-fff">
					<div class="size-16 fw text-0081a7 mt-10 pl-30 ">基础信息</div>
					<div class="items pl-30 w-100">

						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<div>
								<div class="size-14 item-text">收件人信息<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input w-400px" name="real_name">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">联络电话<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input w-190px" name="user_phone">
								</div>
							</div>
							<div class="ml-20">
								<div class="size-14 item-text">联络电话2</div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input w-190px" name="user_phone2">
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<div>
								<div class="size-14 item-text">身份证号码<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="请输入" class="ivu-input w-400px" name="idcard">
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<div>
								<div class="size-14 item-text">收货地址<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="请输入" class="ivu-input w-400px" name="user_address">
								</div>
							</div>
						</div>

						<div class="item w-100  mt-20">
							<div class="bg-f4 text-57 d-flex align-items-center justify-content-center hint">
								提示：根据国家跨境购的政策，请确保您的收件人姓名、身份证号码，与您支付使用的账号属于同一人。否则将无法完成报关。
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<div>
								<div class="size-14 item-text">处方名称<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" placeholder="请输入" class="ivu-input w-400px" name="order_name">
								</div>
							</div>
						</div>


						<div class="item w-100 mt-20 d-flex align-items-center justify-content-start">
							<div class="w-400px d-flex align-items-start justify-content-center">
								<div class="w-190px">
									<div class="size-14 item-text">服用频次<span class="text-ff4d4f">*</span></div>
									<div class="w-100 mt-8">
										<div class="ivu-select  ivu-select-single ivu-select-default relative w-190px">
											<select name="taking_quency">
												<!--<i-option v-for="item in cityList4" :value="item.value" :key="item.value">{{ item.label }}</i-option>-->
												<option value="0">请选择</option>
												<option value="1">一日一次</option>
												<option value="2">早晚各一次</option>
												<!--<option value="3">一日三次</option>-->
											</select>
										</div>
									</div>
								</div>
								<div class="w-190px ml-20">
									<div class=" size-14 item-text">服用时间</div>
									<div class="w-100 mt-8">
										<div class="ivu-select  ivu-select-single ivu-select-default relative w-190px">
											<select name="taking_time">
												<option value="无建议">无建议</option>
												<option value="早上">早上</option>
												<option value="下午">下午</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="w-400px ml-50">
								<div class=" size-14 item-text">周期<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
										<select name="taking_cycle">
											<option value="0">请选择</option>
											<option value="28">28天</option>
											<option value="56">56天</option>
											<option value="84">84天</option>
											<!--<option value="10">10天</option>
											<option value="20">20天</option>
											<option value="30">30天</option>
											<option value="60">60天</option>
											<option value="90">90天</option>-->
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="item pl-30 w-100 mt-20">
						<div class="size-14 item-text">建议</div>
						<div class="w-100 mt-8">
							<div class="relative w-400px">
								<i-select v-model="model19" filterable multiple allow-create @on-create="handleCreate2" name="taking_suggest">
									<i-option v-for="item in cityList4" :value="item.value" :key="item.value">{{ item.label }}</i-option>
								</i-select>
							</div>
						</div>
					</div>

					<div class="item w-100 pl-30 mt-20 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text">医嘱</div>
							<div class="w-100 mt-8">
								<textarea rows="3" placeholder="请输入" class="ivu-input w-400px" name="taking_remark"></textarea>
							</div>
						</div>
					</div>

					<div class="hr" style="margin: 30px"></div>

					<div class="w-100 d-flex align-items-center justify-content-between pl-30 pr-30">
						<span class="text-0081a7 size-16 fw">微片列表</span>
						<a href="<?php echo Url('create',array('micro_id'=>$micro_id)); ?>" class="ivu-btn-default ivu-btn"><i class="icon iconfont iconbian-ji"></i>重新编辑</a>
					</div>
					<div class="w-100 wpdetailstable pl-30 pr-30 mt-20">
						<div class="w-100" style="border: 1px solid #d9d9d9">
							<table class="ivu-table  w-100 ivu-table-default text-57" style="overflow: initial">
								<tbody class="ivu-table-tbody text-57">
								<tr class="ivu-table-header cursor text-57">
									<th class="bg-f4 w-350px bl text-center">微片名称</th>
									<th class="bg-f4 w-350px bl text-center">微片编码</th>
									<th class="bg-f4 w-200px bl text-center">数量</th>
									<th class="bg-f4 w-200px bl text-center">单价</th>
								</tr>
								<?php if(is_array($microchip) || $microchip instanceof \think\Collection || $microchip instanceof \think\Paginator): $i = 0; $__LIST__ = $microchip;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
								<tr>
									<input name="micro_id[<?php echo htmlentities($m['micro_id']); ?>]" value="<?php echo htmlentities($m['num']); ?>" hidden>
									<td class="text-center bl"><?php echo htmlentities($m['name_zn']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['code']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['num']); ?></td>
									<td class="text-center bl"><?php echo htmlentities($m['price']); ?></td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="hr" style="margin: 30px"></div>

					<div class="w-100 d-flex align-items-center justify-content-between pl-30 pr-30">
						<span class="text-0081a7 size-16 fw">支付方式</span>
					</div>

					<div class="item w-100 pl-30 mt-20 d-flex align-items-start justify-content-start ">
						<label>
							<div class="border d-flex align-items-center justify-content-center pay cursor" :class="paytype ==1 ? 'payactiva' :'' ">
								<input class="hide" lay-ignore type="radio" value="1" v-model="paytype" name="pay">
								<img src="/ysm/static/images/doctor/payment-1@3x.png" alt="">
							</div>
						</label>
						<label>
							<div class="border d-flex align-items-center justify-content-center pay ml-10 cursor" :class="paytype ==2 ? 'payactiva' :'' ">
								<input lay-ignore type="radio" class="hide" value="2" v-model="paytype" name="pay">
								<img src="/ysm/static/images/doctor/payment-2@3x.png" alt="">
							</div>
						</label>
					</div>

					<div class="item pl-30 w-100 mt-30 d-flex align-items-center justify-content-start mb-30">
						<button href="pay.html" class="ivu-btn-primary ivu-btn mr-20">
							<i class="icon iconfont iconyishenghoutai-zhifu1"></i>
							支付
						</button>
						<a href="index.html" class="ivu-btn-default ivu-btn">取消</a>
					</div>
				</div>
			</form>
		</div>


		<!--弹窗-->
		<div style="display: none;" class="modal-root ts-edit-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="width: 350px;height:490px;">
				<div class="w-100 top d-flex align-items-center justify-content-center size-16  relative">
					<span class="fw size-16">生成结果</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<div class="items w-100 d-flex align-items-center justify-content-start flex-column" style="height: 440px;">
					<div class="w-100 d-flex align-items-center justify-content-center mt-10">
						<img src="/ysm/static/images/doctor/correct.png" class="w-50px" style="height: 50px;" alt="">
					</div>
					<div class="mt-25 textcode text-57">
						<div class="w-100 mt-20 pl-20">姓名：XXXXXXX</div>
						<div class="w-100 mt-10 pl-20">症状：XXXXXXXXXXX</div>
					</div>
					<div class="w-100 mt-30 text-center text-27">
						请使用微信扫描以下二维码查看处方
					</div>
					<div class="w-100 d-flex align-items-center justify-content-center mt-20">
						<img class="w-100px" style="height: 100px;border: 1px solid #d9d9d9" src="" alt="">
					</div>
					<div class="w-100 d-flex align-items-center justify-content-center mt-30">
						<button class="ivu-btn ivu-btn-primary closemode" type="button">扫描完成</button>
					</div>
				</div>

			</div>
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
			message  : 'Hello Vue.js!',
			cityList4: [

			],
			model15  : [],
			model16  : [],
			model17  : [],
			model18  : [],
			model19  : [],
			model21  : [],
			paytype  : 1,
		},
		methods: {
			handleCreate2(val) {
				this.cityList4.push({
					value: val,
					label: val,
				});
			},
		},
	});


	$('.recipe').click(function () {
		$('.ts-edit-modal').show();
	});

	$('.closemode').click(function () {
		$('.ts-edit-modal').hide();
	});
	$(function () {
		layui.use(['laydate', 'laypage', 'layer', 'table', 'carousel', 'upload', 'element', 'form'], function () {
			var laydate    = layui.laydate //鏃ユ湡
				, laypage  = layui.laypage //鍒嗛〉
				, layer    = layui.layer //寮瑰眰
				, table    = layui.table //琛ㄦ牸
				, form     = layui.form //琛ㄦ牸
				, carousel = layui.carousel //杞挱
				, upload   = layui.upload //涓婁紶
				, element  = layui.element; //鍏冪礌鎿嶄綔 绛夌瓑...
		});
	});
</script>
