{include file="public/header"}
	<title>TS-编辑-添加微片</title>
	<div id="select" class="ts-edit-add bg-fff">

		<div class="center  bg-fff">
			<div class="items ">
				
				<div class="item w-100 mt-20  h-auto d-flex align-items-start justify-content-start">
					<div class="fw size-14 left-title mt-10">已选微片/配方：</div>
					<div class="right-title mt-10">
						<div class="w-100 d-flex align-items-start justify-content-start flex-wrap items-list"></div>
					</div>
				</div>
				
				
				<div class="item w-100 mt-20 tab d-flex align-items-start justify-content-start relative">
					<div data-tab="1" class="size-14 tab1 w-100px h-100 d-flex align-items-center justify-content-center absolute activate" style="left: 0;">微片</div>
					<div data-tab="2" class="size-14 tab2 w-100px h-100 d-flex align-items-center justify-content-center  absolute" style="left: 105px;">配方</div>
				</div>
				
				<div class="relative" style=" border-radius: 2px;  border: solid 1px #d9d9d9;top: -2px;">
				<!--lee-728-->
					<!--微片-->
					<div class="wp-list w-100" style="overflow-y: auto;height: 350px;">
						<div class="w-100 wp-list-top ">
							<form action="" class="layui-form d-flex align-items-start justify-content-between">
								<div class="h-100">
									<div class="d-flex align-items-center justify-content-start flex-wrap pt-10">
										<div class="w-350px ml-20 mt-10 d-flex align-items-center justify-content-start">
											<span>关键字：</span>
											<input type="text" v-model="where.keyword" placeholder="请输入" style="width: 290px;" class="ivu-input ivu-input-small">
										</div>
										<div style="width: 210px;" class="ml-20 mt-10  d-flex align-items-center justify-content-start">
											<span>适应症：</span>
											<div class="w-150px">
											<i-select size="small" v-model="where.cate1">
													<i-option value="">请选择</i-option>
												{volist name="cate2" id="vo2"}
													<i-option :value="{$vo2.id}">{$vo2.title}</i-option>
												{/volist}
											</i-select>
										
											</div>
										</div>
										<div style="margin-top: 14px;width: 226px;" class="ml-20 d-flex align-items-center justify-content-start">
											<span>分类标签：</span>
											<div class="w-150px">
												<i-select size="small" v-model="where.cate2">
														<i-option value="">请选择</i-option>
													{volist name="cate1" id="vo1"}
														<i-option :value="{$vo1.id}">{$vo1.title}</i-option>
													{/volist}
												</i-select>
											</div>
										</div>

										<div style="margin-top: 14px;width: 226px;" class="ml-10 d-flex align-items-center justify-content-start">
											<span>其他标签：</span>
											<div class="w-150px">
												<i-select size="small" v-model="where.cate3">
														<i-option value="">请选择</i-option>
													{volist name="cate3" id="vo3"}
														<i-option :value="{$vo3.id}">{$vo3.title}</i-option>
													{/volist}
												</i-select>
											</div>
										</div>

										<div style="margin-top: 14px;" class="w-200px d-flex align-items-center justify-content-start">
											<span class="w-50px">状态：</span>
											<div class="w-150px">
												<i-select size="small" v-model="where.is_status">
													<i-option value="">请选择</i-option>
													<i-option value="0">不可用</i-option>
													<i-option value="1">可用</i-option>
												</i-select>
											</div>
										
										</div>
									</div>
								</div>
								<div class="h-100 pr-20" style="width: 80px;">
									<button type="button" @click="search" class="ivu-btn mt-20 ivu-btn-primary">筛选</button>
									<button type="reset" @click="reset(1)" style="margin-top: 7px;width: 60px;" class="ivu-btn ivu-btn-default ivu-btn-small">重置</button>
								</div>
							</form>

						</div>
						<div class="mt-10 items1" style="width: 754px;margin: auto">
							<div class="w-100 bg-f6 d-flex align-items-center justify-content-start fw" style="height: 30px;">
								<div class="w-250px pl-10">微片名称</div>
								<div class="w-100px">分类</div>
								<div class="w-150px">适应症</div>
								<div class="w-100px">剂量范围</div>
								<div class="w-100px">价格￥</div>
								<div class="w-100px">价格$</div>
								<div class="w-50px text-center">选择</div>
							</div>
							<div class="">
								<div v-for="(i,k) in items1" class="w-100  d-flex align-items-center justify-content-start" style="height: 38px;border-bottom: 1px solid #f9f9f9;">
									<div class="w-250px pl-10 ellipsis-1" :title="i.zn_name">{{i.zn_name}}</div>
									<div class="w-100px ellipsis-1" :title="i.cate1_name">{{i.cate1_name}}</div>
									<div class="w-150px ellipsis-1" :title="i.cate2_name">{{i.cate2_name}}</div>
									<div class="w-100px ellipsis-1" :title="i.dose_range">{{i.dose_range}}{{i.unit}}</div>
									<div class="w-100px ellipsis-1" :title="i.price">{{i.price}}</div>
									<div class="w-100px ellipsis-1" :title="i.usd">{{i.usd}}</div>
									<div class="w-50px text-center">
<!--:data-id="m.micro_id" :data-kind="m.ts_id" :data-name="m.name_zn" :data-scope="m.dose_range" :data-maxnum="m.day_max" :data-unit="m.unit"-->
										<!--:data-val="m.num" :data-dosage="m.dose" :data-dosage1="m.dose_range" :data-rmbprice="m.price" :data-usdprice="m.usd" data-type="2"-->
			
			<i
					:data-name="i.zn_name" :data-id="i.id" :data-kind="i.id" :data-scope="i.dose" :data-maxnum="i.day_max" :data-unit="i.unit"
					data-val="1" :data-dosage="i.dose" :data-dosage1="i.dose" :data-rmbprice="i.price" :data-usdprice="i.usd" :data-type="1" :data-pid="i.id"
					class="icon iconfont iconicon-test text-c01f5e cursor items-add"
			></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--配方-->
					<div class="pf-list w-100" style="overflow-y: auto;height: 350px;display: none">
						<div class="w-100 pf-list-top ">
							<form action="" class="layui-form d-flex align-items-start justify-content-between">
								<div class="h-100">
									<div class="d-flex align-items-center justify-content-start flex-wrap pt-10">

										<div class="w-350px ml-20 mt-10 d-flex align-items-center justify-content-start">
											<span>关键字：</span>
											<input type="text" v-model="where1.keyword" placeholder="请输入" style="width: 290px;" class="ivu-input ivu-input-small">
										</div>
										<div style="width: 220px;" class="ml-20 mt-10  d-flex align-items-center justify-content-start">
											<span style="width: 70px;">适应症：</span>
											<div class="w-150px">
												<i-select size="small" v-model="where1.cate2">
														<i-option value="">请选择</i-option>
													{volist name="cate2" id="vo2"}
														<i-option :value="{$vo2.id}">{$vo2.title}</i-option>
													{/volist}
												</i-select>
											</div>
										</div>

										<div style="margin-top: 14px;width: 226px;" class="ml-20 d-flex align-items-center justify-content-start">
											<span style="width: 90px;">其它标签：</span>
											<div class="w-150px">
												<i-select size="small" v-model="where1.cate3">
														<i-option value="">请选择</i-option>
													{volist name="cate3" id="vo3"}
														<i-option :value="{$vo3.id}">{$vo3.title}</i-option>
													{/volist}
												</i-select>
											</div>
										</div>
										<div style="margin-top: 14px;" class="ml-20 w-200px d-flex align-items-center justify-content-start">
											<span class="w-50px">状态：</span>
											<div class="w-150px">
												<i-select size="small" v-model="where1.is_status">
													<i-option value="">请选择</i-option>
													<i-option value="0">不可用</i-option>
													<i-option value="1">可用</i-option>
												</i-select>
											</div>
										</div>
									</div>
								</div>
								<div class="h-100 pr-20" style="width: 80px;">
									<button type="button" @click="search1" class="ivu-btn mt-20 ivu-btn-primary">筛选</button>
									<button type="reset" @click="reset(2)" style="margin-top: 7px;width: 60px;" class="ivu-btn ivu-btn-default ivu-btn-small">重置</button>
								</div>
							</form>
						</div>
						<div class="mt-10 items2" style="width: 754px;margin: auto">
							<div class="w-100 bg-f6 d-flex align-items-center justify-content-start fw" style="height: 30px;">
								<div class="w-250px pl-10">配方名称</div>
								<div class="w-100px pl-10">分类</div>
								<div class="w-200px">适应症</div>
								<div class="w-100px">价格￥</div>
								<div class="w-100px">价格$</div>
								<div class="w-50px text-center">选择</div>
							</div>
							<div class="">
								<div v-for="(i,k) in items2" class="w-100  d-flex align-items-center justify-content-start flex-column" style="min-height: 38px;border-bottom: 1px solid #f9f9f9;">
									<div class="w-100 d-flex align-items-center justify-content-start" style="height: 38px;">
										<i data-type="1" class="icon iconfont icon2you cursor pfdow"></i>
										<div class="w-250px pl-10 ellipsis-1" :title="i.name_zn">{{i.name_zn}}</div>
										<div class="w-100px ellipsis-1" :title="i.cate_id">{{i.cate_id}}</div>
										<div class="w-200px ellipsis-1" :title="i.cate2_name">{{i.cate2_name}}</div>
										<div class="w-100px ellipsis-1" :title="i.price">{{i.price}}</div>
										<div class="w-100px ellipsis-1" :title="i.usd">{{i.usd}}</div>
										<div class="w-50px text-center">
											<i :data-name="i.name_zn" :data-pid="i.id"  class="icon iconfont iconicon-test text-c01f5e cursor pf-items-add"></i>
										</div>
									</div>

									<div class="w-100 bg-f6 pl-30" style="min-height: 30px;padding: 4px;display:none;">
										<div class="w-100 h-auto d-flex align-items-center justify-content-start flex-wrap pl-30 pr-30">
											<span class="mr-8 wplistspan" v-for="m in i.microchip"
													:data-id="m.micro_id" :data-kind="m.micro_id" :data-tsid="m.ts_id" :data-name="m.name_zn" :data-scope="m.dose_range" :data-maxnum="m.day_max" :data-unit="m.unit"
													:data-val="m.num" :data-dosage="m.dose" :data-dosage1="m.dose" :data-rmbprice="m.price" :data-usdprice="m.usd" data-type="2"
											>
												<span>{{m.name_zn}}</span>
												<span>{{m.dose}}{{m.unit}} ;</span>
											</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!--lee-728-->
				</div>
			</div>
			<div class="w-100 d-flex align-items-center justify-content-end mt-20 " style="height: 50px;border-top:1px solid #f9f9f9">
				<button type="button" class="ivu-btn ivu-btn-default mode-close">取消</button>
				<button type="button" class="ivu-btn ivu-btn-primary ml-10 mr-20 item-confirm">确定</button>
			</div>
		</div>

</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script src="https://cdn.bootcdn.net/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script type="text/javascript">
	var app = new Vue({
		el     : '#select',
		data   : {
			ismodel: false,
			items  : [],
			m_id   : [],
			t_id   : [],
			d      : [],
			ts     : [],
			keyword: '',

			//lee-28
			items1: [],
			items2: [],
			where : {
				keyword  : '',//关键字
				cate1    : '',//适应症
				cate2    : '',//标签
				cate3    : '',//其它
				is_status: '',//状态
				page     : 1,
				limit    : 0
			},
			where1: {
				keyword  : '',//关键字
				cate1    : '',//适应症
				cate2    : '',//标签
				cate3    : '',//其它
				is_status: '',//状态
				page     : 1,
				limit    : 0
			},
		},
		methods: {
			//重置
			reset: function (type) {
				if (type == 1) {
					this.where = {
						keyword: '',//关键字
						adapt  : '',//适应症
						label  : '',//标签
						other  : '',//其它
						status : '',//状态
						page   : 1,
						limit  : 0
					};
					this.search();
				} else {
					this.where1 = {
						keyword: '',//关键字
						adapt  : '',//适应症
						label  : '',//标签
						other  : '',//其它
						status : '',//状态
						page   : 1,
						limit  : 0
					}
					this.search1();
				}
			},
			// 微片搜索
			search() {
				var data = this.where;
				var that = this;
				axios.post("{:Url('microchip.microchipProduct/product_ist')}", data).then(function (e) {
					that.items1 = e.data.data ? e.data.data : [];
				})
			},
			// 配方搜索
			search1() {
				var data = this.where1;
				var that = this;
				axios.post("{:Url('ts_list')}", data).then(function (e) {
					that.items2 = e.data.data ? e.data.data : [];
				})
			}
		},
		created: function () {
			this.search();
			this.search1();
		}
	});

	function delwp() {
		$('.items-list').html('');
		app.$data.m_id  = [];
		app.$data.items = [];
		app.$data.t_id  = [];
	}

	delwp();
	//删除微片
	$(".items-list").on('click', '.item-del', function () {
		var pid   = $(this).data('pid');
		var type  = $(this).data('type');
		var items = app.$data.items;
		var m_id  = app.$data.m_id;
		var m     = app.$data.m_id.indexOf(pid);
		var t_id  = app.$data.t_id;
		var t     = app.$data.t_id.indexOf(pid);
		if (type == 1) {
			if (m >= 0) {
				app.$data.m_id.splice(m, 1);
			}
		} else {
			if (t >= 0) {
				app.$data.t_id.splice(t, 1);
			}
		}
		for (let len = items.length, i = len - 1; i >= 0; i--) {
			if (items[i].pid == pid) {
				items.splice(i, 1);
			}
		}
		$(this).parent().remove();
	});

	// //配方添加
	// $(".items1").on('click', '.pf-items-add', function () {
	// 	var items      = app.$data.items;
	// 	var name       = $(this).data('name');
	// 	var pid        = $(this).data('pid');
	// 	var wplistspan = $(this).parent().parent().next().children().find('.wplistspan');
	// 	for (var i = 0; i < wplistspan.length; i++) {
	// 		items.push({
	// 			"id"      : wplistspan[i].getAttribute('data-id'),
	// 			"kind"    : wplistspan[i].getAttribute('data-kind'),
	// 			"name"    : wplistspan[i].getAttribute('data-name'),
	// 			"scope"   : wplistspan[i].getAttribute('data-scope'),
	// 			"maxnum"  : wplistspan[i].getAttribute('data-maxnum'),
	// 			"unit"    : wplistspan[i].getAttribute('data-unit'),
	// 			"val"     : wplistspan[i].getAttribute('data-val'),
	// 			"dosage"  : wplistspan[i].getAttribute('data-dosage'),
	// 			"dosage1" : wplistspan[i].getAttribute('data-dosage1'),
	// 			"rmbprice": wplistspan[i].getAttribute('data-rmbprice'),
	// 			"usdprice": wplistspan[i].getAttribute('data-usdprice'),
	// 			"type"    : wplistspan[i].getAttribute('data-type'),
	// 			"pid"     : pid,
	// 		});
	// 	}
	// 	app.$data.items = items;
	// 	var html        = '' +
	// 		'<span class="d-flex align-items-center justify-content-start item-input">' +
	// 		'<span class="size-12 pl-10 h-100 d-flex align-items-center justify-content-start">' + name + '</span>' +
	// 		'<span class="text-bf ml-10 mr-10 icon iconfont iconguanbi size-10 item-del" data-type="2" data-pid="' + pid + '"></span>' +
	// 		'<input type="hidden">' +
	// 		'</span>';
	// 	$('.items-list').append(html);
	// 	// $(this).remove('.pf-items-add')
	// })
	//
	// //在iframe子页面中查找父页面元素
	// $('.item-confirm').click(function () {
	//
	// 	var list  = $('.items-list').find('.item-input');
	// 	var items = app.$data.items;
	// 	$('.items-list').html();
	// 	app.$data.items = [];
	// 	window.parent.closemode(items);
	// 	// layer.closeAll();
	// });
	//
	// //取消
	// $('.mode-close').click(function () {
	// 	window.parent.closemode([]);
	// });

	// tab切换
	$('.tab').click(function (e) {
		var type = e.target.dataset.tab;
		if (type == 1) {
			$('.tab1').addClass('activate');
			$('.tab2').removeClass('activate');

			$('.wp-list').show();
			$('.pf-list').hide();
		} else {
			$('.tab2').addClass('activate');
			$('.tab1').removeClass('activate');
			$('.pf-list').show();
			$('.wp-list').hide();
		}
	});


	//配方点击展开
	$(".items2").on('click', '.pfdow', function (e) {
		var type = $(this).data('type');
		if (type == 1) {
			$(this).data('type', 2);
			$(this).removeClass('icon2you');
			$(this).addClass('iconxiangxia2');
			$(this).parent().next().show();
		} else {
			$(this).removeClass('iconxiangxia2');
			$(this).addClass('icon2you');
			$(this).data('type', 1);
			$(this).parent().next().hide();
		}
	});


	// 微片添加
	$(".items1").on('click', '.items-add', function (e) {
		var name  = $(this).data('name');
		var pid   = $(this).data('pid');
		var items = app.$data.items;
		var type  = $(this).data('type');
		var xia   = true;
		for (var i = 0; i < items.length; i++) {
			if (items[i].type == type && items[i].pid == pid) {
				xia = false;
				break;
			}
		}
		if (xia == false) {
			return false
		}
		items.push({
			"id"      : $(this).data('id'),
			"kind"    : $(this).data('kind'),
			"name"    : $(this).data('name'),
			"scope"   : $(this).data('scope'),
			"maxnum"  : $(this).data('maxnum'),
			"unit"    : $(this).data('unit'),
			"val"     : $(this).data('val'),
			"dosage"  : $(this).data('dosage'),
			"dosage1" : $(this).data('dosage1'),
			"rmbprice": $(this).data('rmbprice'),
			"usdprice": $(this).data('usdprice'),
			"type"    : $(this).data('type'),
			"pid"     : pid,
		});
		app.$data.items = items;
		var html        = '<span class="d-flex align-items-center justify-content-start item-input">' +
			'<span class="size-12 pl-10 h-100 d-flex align-items-center justify-content-start">' + name + '</span>' +
			'<span class="text-bf ml-10 mr-10 icon iconfont iconguanbi size-10 item-del"  data-type="1" data-pid="' + pid + '"></span>' +
			'<input type="hidden">' +
			'</span>';
		$('.items-list').append(html);
	});


	//配方添加
	$(".items2").on('click', '.pf-items-add', function (e) {
		var items = app.$data.items;
		var name  = $(this).data('name');
		var pid   = $(this).data('pid');
		var xia   = true;
		for (var i = 0; i < items.length; i++) {
			if (items[i].type == 2  && items[i].pid == pid) {
				xia = false;
				break;
			}
		}
		
		if (xia == false) {
			return false
		}
		
		var wplistspan = $(this).parent().parent().next().children().find('.wplistspan');
		for (var i = 0; i < wplistspan.length; i++) {
			items.push({
				"id"      : wplistspan[i].getAttribute('data-id'),
				"kind"    : wplistspan[i].getAttribute('data-kind'),
				"name"    : wplistspan[i].getAttribute('data-name'),
				"scope"   : wplistspan[i].getAttribute('data-scope'),
				"maxnum"  : wplistspan[i].getAttribute('data-maxnum'),
				"unit"    : wplistspan[i].getAttribute('data-unit'),
				"val"     : wplistspan[i].getAttribute('data-val'),
				"dosage"  : wplistspan[i].getAttribute('data-dosage'),
				"dosage1" : wplistspan[i].getAttribute('data-dosage1'),
				"rmbprice": wplistspan[i].getAttribute('data-rmbprice'),
				"usdprice": wplistspan[i].getAttribute('data-usdprice'),
				"type"    : wplistspan[i].getAttribute('data-type'),
				"pid"     : pid,
			});
		}

		app.$data.items = items;
		var html        = '' +
			'<span class="d-flex align-items-center justify-content-start item-input">' +
			'<span class="size-12 pl-10 h-100 d-flex align-items-center justify-content-start">' + name + '</span>' +
			'<span class="text-bf ml-10 mr-10 icon iconfont iconguanbi size-10 item-del" data-type="2" data-pid="' + pid + '"></span>' +
			'<input type="hidden">' +
			'</span>';
		$('.items-list').append(html);
		// $(this).remove('.pf-items-add')
	});


	//在iframe子页面中查找父页面元素
	$('.item-confirm').click(function () {
		var list = $('.items-list').find('.item-input');

		for (var i = 0; i < list.length; i++) {
			var html = '' +
				'<div class="w-100 d-flex align-items-center  justify-content-around hxcfitem" data-num="5" data-type="5" data-name="微片动态添加" data-value="5" data-unit="ug" data-id="1" style="height: 40px;">' +
				'<div class="d-flex align-items-center justify-content-center w-50px h-100">' +
				'<input type="checkbox" lay-ignore lay-skin="primary" style="display: block"  class="ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">' +
				'</div>' +
				'<div class="d-flex align-items-center justify-content-start w-200px">微片名称</div>' +
				'<div class="d-flex align-items-center justify-content-start w-150px">100-1000mg</div>' +
				'<div class="d-flex align-items-center justify-content-start w-150px maximum">1000mg</div>' +
				'<div class="d-flex align-items-center justify-content-start w-150px">' +
				'<input class="ivu-input ivu-input-small" value="1" type="number" style="width: 70px">' +
				'<div class="d-flex align-items-start justify-content-start flex-column plusminus">' +
				'<i class="w-100 plus cursor icon iconfont icon2shang size-12 h-50 ellipsis-1"></i>' +
				'<i class="w-100 minus cursor icon iconfont iconxiangxia2 size-12 h-50 ellipsis-1"></i>' +
				'</div>' +
				'</div>' +
				'<div class="d-flex align-items-center justify-content-start w-100px itemdosage">1000mg</div>' +
				'<div class="d-flex align-items-center justify-content-start w-100px itempricermg">20</div>' +
				'<div class="d-flex align-items-center justify-content-start w-100px itempriceusd">3.8</div>' +
				'<div class="d-flex align-items-center justify-content-center w-50px"><i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i></div>' +
				'</div>';
			// $('.hxcflist', window.parent.document).append(html);
		}
		var items = app.$data.items;
		// 关闭窗口
		window.parent.closemode(items);
		// layer.closeAll();
	});

	//取消
	$('.mode-close').click(function () {
		window.parent.closemode([]);
	});
	
	

</script>


