{include file="public/header"}
	<title>平台下属机构列表</title>

	<div class="h-100 w-100 cmr-medical" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <a href="index.html" class="text-57">平台管理 </a> <span class="text-c01f5e">/ 查看下属医疗机构 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="" style="width: 70px;">机构名称:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text" v-model="keyword">
							</div>

							<!-- <div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">所属平台:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select >
										<option value="">请选择</option>
										<option value="0">平台</option>
										<option value="0">平台</option>
									</select>
								</div>
							</div>
 -->

							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 125px;">平台开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input class="ivu-input" v-model="time" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13">
								</div>
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
				<span class="size-16  ml-20"><span class="fw">平台下属医疗机构</span> <span class="size-14">（{$platform.p_name}）</span> </span>
				<div>
					<button class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaochu"></i>
						导出Excel
					</button>
				</div>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default" style="overflow: initial">
					<tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="pl-30 bg-f6 w-100px">编码<i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="bg-f6 w-200px">机构名称</th>
						<th class="bg-f6 w-100px">对接人</th>
						<th class="bg-f6 w-100px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-150px">所属平台</th>
						<th class="bg-f6 w-100px">成交订单</th>
						<th class="bg-f6 w-100px">成交金额</th>
						<th class="bg-f6 w-100px">医生人数</th>
						<th class="bg-f6 w-100px">患者人数</th>
						<th class="bg-f6 w-100px"></th>
					</tr>

					<tr v-for="i in data" class="cursor text-57">
						<td class="pl-30 ckitem">{{i.id}}</td>
						<td class="ckitem">{{i.name}}</td>
						<td class="ckitem">{{i.referrer}}</td>
						<td class="ckitem">{{i.refer_mobile}}</td>
						<td class="ckitem">{{i.total_order}}</td>
						<td class="ckitem">{{i.platform_name}}</td>
						<td class="ckitem">{{i.createtime}}</td>
						<td class="ckitem">{{i.total_price}}</td>
						<td class="ckitem">{{i.total_doctor}}</td>
						<td class="ckitem">{{i.total_patient}}</td>
						<td class="ckitem"><a href="" class="text-c01f5e">机构详情</a></td>
					</tr>
					</tbody>
				</table>

			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between ">
				<a href="index.html"  class="ivu-btn ivu-btn-default ml-30">返回</a>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
			</div>

		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
<script type="text/javascript">
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'datetime'
			,range: true
			,change: function(value, date, endDate){
    			app.$data.time=value;
  			}
		});
	})

	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			data  : [],
			message: 'Hello Vue.js!',
			ismodel: false,
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			total   : 0,
			keyword : '',
			time :'',
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
					pagenum : this.pagenum,
					pagesize: this.pagesize,
					keyword : this.keyword,
					platform:{$id},
					time : this.time,
				};
				axios.post('{:Url("institution_list")}', data).then((e) => {
					this.data = e.data.data;
					this.total   = e.data.count;

				});
			},
		},
		created() {
			this.getitems();
		},
	});


	$('.edittext').click(function (e) {
		$(this).next('.cj-edit-list').stop().slideToggle();
		// $('.table-li-handle').stop().slideToggle();
		// $(this).show();
	});


</script>
