{include file="public/header"}
	<title>配方查看详情</title>

	<div id="app" class="mi-ts-edit">
		<!--头部-->
			{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 配方管理 / </a> <span class="text-c01f5e"> 查看详情 </span>
		</div>
		<div class="w-1200 fw size-20 mt-10 text-27">查看详情</div>
		<!--列表-->
		<div class="w-1200  mt-10 pb-10 mb-30" style="border-radius: 1px;">
			<form class="d-flex w-100 layui-form  align-items-start justify-content-between" action="">
				<div class="wp-edit-body h-100 pt-20 bg-fff">
					<div class="size-16 fw text-c01f5e mt-10 pl-30 ">配方名称</div>
					<div class="items pl-30 w-100">
						<div class="item w-100 mt-20">
							<div class="size-14 item-text">配方编码: {$info.code}</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start mt-10">
							<div class="size-14 item-text w-400px">配方名称: {$info.name_zn}</div>
							<div class="size-14 item-text w-400px ml-50">Name: {$info.name_en}</div>
						</div>
						<div class="item w-100 mt-10">
							<div class="size-14 item-text">配方状态:{$info.is_status > 0 ? '可用':'不可用'}</div>
						</div>
					</div>
					<div class="hr" style="margin: 30px"></div>
					<div class="size-16 fw pl-30 text-c01f5e">微片信息</div>

					<div class="items wpdetailstable w-100 pr-30 pl-30 ">
						<div class="w-100 mt-20" style="border: 1px solid #d9d9d9">
							<table class="ivu-table w-100  ivu-table-default" style="overflow: initial;">
								<tbody class="ivu-table-tbody">
								<tr class="ivu-table-header cursor">
									<th class="bg-f4 text-center bl w-200px">微片名称</th>
									<th class="bg-f4 text-center bl w-200px">剂量范围</th>
									<th class="bg-f4 text-center bl w-100px">最大剂量</th>
									<th class="bg-f4 text-center bl w-150px">数量调节</th>
									<th class="bg-f4 text-center bl w-100px">剂量显示</th>
									<th class="bg-f4 text-center bl w-150px">价格s</th>
								</tr>
								{volist name="microchip" id="m"}
								<tr>
									<td class="text-center bl">{$m.name_zn}</td>
									<td class="text-center bl">{$m.dose_range}{$m.unit}</td>
									<td class="text-center bl">{$m.day_max}{$m.unit}</td>
									<td class="text-center bl">{$m.num}</td>
									<td class="text-center bl">{$m.dose}{$m.unit}</td>
									<td class="text-center bl">{$m.price}</td>
								</tr>
								{/volist}
								</tbody>
							</table>
						</div>

					</div>

					<div class="hr" style="margin: 30px"></div>

					<div class="size-16 fw text-c01f5e pl-30 mt-20">医嘱</div>

					<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-100 item-text">适应症:{$info.cate2_name}</div>
					</div>

				<!-- 	<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-100 item-text">其它标签:{$info.cate2_name}</div>
					</div>
 -->
					<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-400px item-text">服用频次:一日{$info.taking_quency}次</div>
						<div class="size-14 w-400px ml-50 item-text">服用时间:{$info.taking_time}</div>
					</div>

					<div class="item w-100 mt-10 pl-30 d-flex align-items-center justify-content-start">
						<div class="size-14 w-100 item-text">周期:{$info.taking_cycle}天</div>
					</div>

					<div class="item pl-30 w-100 mt-10">
						<div class="size-14 item-text">建议:</div>
						<div class="w-100 mt-8 pr-30">
							{$info.taking_suggest}
						</div>
					</div>


					<div class="hr" style="margin: 30px"></div>

					<div class="size-16 pl-30 fw text-c01f5e mt-20">描述和参考</div>

					<div class="item w-100 pl-30 mt-20 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text">描述：</div>
							<div class="mt-8 w-400px">
								{$info.description}
							</div>
						</div>
						<div class="ml-50">
							<div class="size-14 item-text">参考：</div>
							<div class="w-100 mt-8 w-400px pr-30">
								{$info.reference}
							</div>
						</div>
					</div>


					<div class="hr " style="margin: 30px"></div>
					<div class="item pl-30 w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<a href="index.html" class="ivu-btn-default ivu-btn text-57">返回</a>
					</div>
				</div>

				<div class="ts_right d-flex ml-20 h-auto d-flex align-items-start justify-content-start flex-column">
					<div class="top h-auto w-100 bg-fff">
						<div class="title bg-f6 fw size-16 text-center">配方概要
							<Poptip placement="right-start">
								<div slot="content">
									<div class="size-12 text-57 mt-8 text-left">1、微片种类指配方内微片类型的总数量;</div>
									<div class="size-12 text-57 mt-8 text-left">2、活性成分指配方内各微片内活性成分的类型总量，同名称不同剂量的也需要合并同类项;</div>
									<div class="size-12 text-57 mt-8 text-left">3、辅料种类指各微片内辅料成分的类型的总量，同名称不同剂量的需合并同类项;</div>
								</div>
								<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
							</Poptip>
						</div>
						<div class="items w-100 d-flex align-items-center justify-content-center flex-column">

							<div class="item mt-20 d-flex align-items-center justify-content-between">
								<div>微片种类</div>
								<div class="wpkind"><span><?=count($microchip)?></span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>活性成分种类</div>
								<div class="hxkind"><span>{$ingre1}</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>辅料种类</div>
								<div class="flkind"><span>{$ingre2}</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>单剂价格</div>
								<div class="singlepricermb"><span>{$single_price}</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>周期合计价格</div>
								<div class="periodpricermb"><span>{$info.total_price}</span></div>
							</div>
						</div>
					</div>

					<div class="mt-20 cf-list w-100 bg-fff">
						<div class="title fw size-16 text-center">成分列表
							<Poptip placement="right-start">
								<div slot="content">
									<div class="size-12 text-57 mt-8 text-left">1、成分包括活性成分和辅料成分;</div>
									<div class="size-12 text-57 mt-8 text-left">2、同名称同计量单位的成分需合并，数量为各项之和;</div>
									<div class="size-12 text-57 mt-8 text-left">3、同名称不同计量单位的成分不合并;</div>
								</div>
								<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
							</Poptip>
						</div>

						<div style="height: 44px;" class="bg-f6 w-100">
							<div style="width: 240px;margin: auto;" class="d-flex align-items-center justify-content-between h-100">
								<div>微片种类</div>
								<div>剂量</div>
							</div>
						</div>

						<div class="items w-100 d-flex align-items-center justify-content-center flex-column mb-30">
							{volist name="ingre" id="i"}
							<div class="item  d-flex align-items-center justify-content-between">
								<div>{$i.name}</div>
								<div>{$i.dose}{$i.unit}</div>
							</div>
							{/volist}
						</div>

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
		el  : '#app',
		data: {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',

			model18: [],
			model19: [],
			model21: [],
			deme   : 1,
			cflist : [{name: '成分', value: '2', unit: 'mg', type: '1'}],

		},

		methods: {
			handleCreate2(val) {
				this.cityList4.push({
					value: val,
					label: val,
				});
			},

			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});


</script>
