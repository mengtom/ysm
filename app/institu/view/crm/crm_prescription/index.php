{include file="public/header"}
	<title>处方查看</title>

	<div class="h-100 w-100 mi-recipe" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">处方查看</span>
		</div>

		<!--搜索区-->
		<div class="w-1200 relative" >
			<div class="w-100 com-search" style="border-bottom: 2px solid #f0f0f0;margin-top: 0;">
				<div class="keyword bg-fff w-100  h-auto">
					<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

						<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

							<div class="w-100 d-flex align-items-center justify-content-start">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span style="width: 70px;">处方名称:</span>
									<input class="ivu-input w-300px" placeholder="请输入" type="text" v-model="where.keyword">
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span class="mr-8">医生:</span>
									<input class="ivu-input w-300px" placeholder="请输入" type="text" v-model="where.doctor">
								</div>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start mt-20">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span style="width: 120px;">开具处方时间:</span>
									<div class="ivu-select  ivu-select-single ivu-select-default relative">
										<input class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13" v-model="where.time">
									</div>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span style="width: 70px;">处方状态:</span>
									<div class="w-150px">
										<select  v-model="where.status" class="w-400px">
											<option value="">请选择</option>
											<option value="0">待查看</option>
											<option value="1">状态</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="button" @click='getitems' class="ivu-btn ivu-btn-primary mr-20">搜索</button>
						</div>
					</form>
				</div>
			</div>
			<!--列表-->
			<div class="w-100 label-list">

				<div class="w-100 list-title d-flex align-items-center justify-content-between pb-20 pt-20 bg-fff mt-10">
					<span class="size-16  ml-20"><span class="fw">处方列表</span> </span>
				</div>

				<!--表格-->
				<div class="w-100 table bg-fff">
					<div class="t-table" style="width: 1160px;margin: auto">

						<div class="w-100 bg-f6 d-flex align-items-center justify-content-start text-57" style="height: 32px;margin: auto;border: 1px solid #d9d9d9">
							<div class="text-center w-438">处方信息</div>
							<div class="text-center w-180">开具时间</div>
							<div class="text-center w-180">用户姓名</div>
							<div class="text-center w-180">医生姓名</div>
							<div class="text-center w-180">处方状态</div>
						</div>

						<div v-for="i in items" class="w-100 d-flex align-items-center justify-content-start flex-column t-tabl-top">
							<div class="w-100 t-tabl-top-title">
								<span class="ml-20 fw">处方编码：{{i.order_sn}}</span>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start t-tabl-top-centen">
								<div class="h-100 d-flex align-items-center pl-20 w-438"> 处方名称：{{i.order_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.add_time}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.real_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.nickanme}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">待查看</div>
							</div>

							<div class="w-100" style="display:none">
								<div class="" style="width: 1128px;margin: auto">
									<div class="w-100 text-57 mt-8">
										<span>单剂微片种类数：{{i.micro_num}}种</span>
										<span class="ml-20">单剂微片总片数：{{i.micro_total}}片</span>
										<span class="ml-20">单剂价格：{{i.price}}元</span>
										<span class="ml-20">单日次数：{{i.taking_quency}}次</span>
										<span class="ml-20">周期：{{i.taking_cycle}}天</span>
										<span class="ml-20">总价：{{i.total_price}}元</span>
									</div>
									<div class="w-100 ivu-table-wrapper ivu-table-wrapper-with-border">
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
											<tr class="ivu-table-header" v-for="m in i._micro">
												<td class="text-center text-57 t-table-td">{{m.micro_code}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_name}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_dose}}</td>
												<td class="text-center text-57 t-table-td">{{m.num}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_price}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_price}}</td>
											</tr>
											</tbody>
										</table>

									</div>
								</div>

							</div>

							<div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 42px;">
								<span class="text-c01f5e cursor unfold" data-id="1"><i class="icon iconfont iconxiangxia_hei"></i> 详情</span>
							</div>
						</div>


					</div>
				</div>
				<!--page 分页-->
				<div class="w-100 d-flex align-items-center justify-content-end bg-fff">
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total"/>
				</div>

			</div>
		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
<script type="text/javascript">

	layui.use('laydate', function () {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem   : '#test13'
			, type : 'datetime'
			, range: true,
		});
	});


	var app = new Vue({
		el     : '#app',
		data   : {
			date1  : '',
			ismodel: false,
			items:[],
			total:0,
			pagenum:1,
			pagesize:10,
			where:{
                keyword:'',
                status:status,
                doctor:'',
                excel:0,
                time:'',
            },
		},
		methods: {
			// 页码改变的回调，返回改变后的页码
			pagechange(e) {
				this.pagenum = e;
				// this.listnum = e * 3;

				this.getitems();
			},
			// 切换每页条数时的回调，返回切换后的每页条数
			pagesizechange(e) {

				this.pagesize = e;
				this.getitems();
			},
			model         : function () {
				// this.ismodel = !this.ismodel;
			},
			reverseMessage: function () {
				this.message = this.message.split('').reverse().join('');
			},
			// 获取列表数
			getitems(e) {
				var data = {
					page   : this.pagenum,
					limit  : this.pagesize,
					time      :  this.where.time,
					doctor  : this.where.doctor,
					keyword	  :this.where.keyword,
				};
				axios.post('{:Url('order_list')}', data).then((e) => {
					this.items = e.data.data;
					this.total   = e.data.data.count;
					console.log(e.data);
				});
			},
		},
		created() {
			this.getitems();
		},
	});

	// t-table
	$('.t-table').on('click', '.unfold', function (e) {
		var type = $(this).data('id');
		if (type == 1) {
			$(this).data('id', '2');
			$(this).html('<i class="icon iconfont iconxiangshang"></i> 收起');
		} else {
			$(this).data('id', '1');
			$(this).html('<i class="icon iconfont iconxiangxia_hei"></i> 详情');
		}
		$(this).parent().prev().stop().slideToggle();
	});


</script>
