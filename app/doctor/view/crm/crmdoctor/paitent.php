{include file="public/header"}
	<title>医生管理-患者管理</title>
	<div class="h-100 w-100 crm-patient-p" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a>  </a> <span class="text-c01f5e">患者管理 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span >患者信息:</span>
								<input class="ivu-input ml-8 w-300px"  placeholder="请输入" type="text" v-model="keyword">
							</div>

							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 125px;">账号开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input class="ivu-input" type="text" placeholder="开始时间->结束时间" v-model="time" style="width: 240px;" id="test13">
								</div>
							</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span >所属医生:</span>
								<input class="ivu-input ml-8 w-300px"  placeholder="请输入" type="text" v-model="doctor">
							</div>

						</div>
					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="button" class="ivu-btn ivu-btn-primary mr-10" @click="getitems">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">患者列表</span> </span>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default" style="overflow: initial">
					<tbody class="ivu-table-tbody">

					<tr class="ivu-table-header cursor">
						<th class="pl-30 bg-f6 w-100px">编码</th>
						<th class="bg-f6 w-100px">患者姓名</th>
						<th class="bg-f6 w-150px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-250px">医生</th>
						<th class="bg-f6 w-100px">处方数量</th>
						<th class="bg-f6 w-100px">成交订单</th>
						<th class="bg-f6 w-100px">成交金额</th>
						<th class="bg-f6 w-150px">最后一次订单时间</th>
					</tr>

					<tr v-for="i in data" class="cursor text-57">
						<td class="pl-30 ckitem">000</td>
						<td class="ckitem">平台名称 </td>
						<td class="ckitem">15123456</td>
						<td class="ckitem">2020-00-00</td>
						<td class="ckitem">平台名称</td>
						<td class="ckitem ">所属平台</td>
						<td class="ckitem">1000</td>
						<td class="ckitem">500</td>
						<td class="ckitem">2020-00-00</td>
					</tr>
					</tbody>
				</table>

			</div>

			<!--page 分页-->

			<div class="w-100 d-flex align-items-center justify-content-end">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
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
			, range: true
			,change: function(value, date, endDate){
    			app.$data.time=value;
  			}
		});
	});

	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			date1  : '',
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '2019.1.1',
			data:[],
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			total   : 0,
			keyword : '',
			time : '',
			doctor : '',
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
			// 获取列表数
			getitems() {
				var data = {
					page : this.pagenum,
					limit: this.pagesize,
					keyword : this.keyword,
					time : this.time,
					doctor : this.doctor,
					id:'{$id}',
				};
				axios.post("{:Url('get_paitent_list')}", data).then((e) => {
					e=e.data;
					this.data = e.data.data;
					this.total   = e.data.count;
				});
			},
		},
		created() {
			this.getitems();
		},
	});
</script>
