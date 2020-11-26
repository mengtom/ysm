{include file="public/header"}
	<title>CMR-平台管理-查看下属医生</title>

	<div class="h-100 w-100 cmr-doctor" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <a href="index.html" class="text-57">平台管理 </a> <span class="text-c01f5e">/ 查看下属医生 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="" style="width: 70px;">医生信息:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text" v-model="keyword">
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">所属机构:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<i-select v-model="institu">
										{volist name="institu" id="ins"}
										<i-option value="{$ins.id}">{$ins.name}</i-option>
										{/volist}
									</i-select>
								</div>
							</div>

							<!-- <div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">所属平台:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select name="city" lay-verify="required">
										<option value="">请选择</option>
										<option value="0">平台</option>
										<option value="0">平台</option>
									</select>
								</div>
							</div> -->
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span style="width: 125px;">账号开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13" v-model="time">
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
				<span class="size-16  ml-20"><span class="fw">平台下属医生</span> <span class="size-14">（{$platform.p_name}）</span> </span>
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
						<th class="bg-f6 w-100px">医生姓名</th>
						<th class="bg-f6 w-100px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-100px">所属平台</th>
						<th class="bg-f6 w-300px text-center">所属机构</th>
						<th class="bg-f6 w-100px">开具处方</th>
						<th class="bg-f6 w-100px">成交订单</th>
						<th class="bg-f6 w-100px">成交金额</th>
						<th class="bg-f6 w-100px">患者人数</th>
					</tr>

					<tr v-for="i in data" class="cursor text-57">
						<td class="pl-30 ckitem">{{i.id}}</td>
						<td class="ckitem">{{i.name}} </i></td>
						<td class="ckitem">{{i.refer_mobile}}</td>
						<td class="ckitem">{{i.createtime}}</td>
						<td class="ckitem">{{i.platform_name}}</td>
						<td class="ckitem text-center">{{i.institu_name}}</td>
						<td class="ckitem">{{i.total_prescript}}</td>
						<td class="ckitem">{{i.total_order}}</td>
						<td class="ckitem">{{i.total_price}}</td>
						<td class="relative"> {{i.total_patient}}</td>
					</tr>
					</tbody>
				</table>

			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between ">
				<a href="index.html" class="ivu-btn ivu-btn-default ml-30">返回</a>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
				<!--<ul class="ivu-page mt-20 mb-20 mr-20">
					<span class="ivu-page-total">共 100 条</span>
					<li title="上一页" class="ivu-page-prev ivu-page-disabled"><a><i class="ivu-icon ivu-icon-ios-arrow-back"></i></a></li>
					<li title="1" class="ivu-page-item ivu-page-item-active"><a>1</a></li>
					<li title="2" class="ivu-page-item"><a>2</a></li>
					<li title="3" class="ivu-page-item"><a>3</a></li>
					<li title="向后 5 页" class="ivu-page-item-jump-next"><a><i class="ivu-icon ivu-icon-ios-arrow-forward"></i></a></li>
					<li title="10" class="ivu-page-item"><a>10</a></li>
					<li title="下一页" class="ivu-page-next"><a><i class="ivu-icon ivu-icon-ios-arrow-forward"></i></a></li>

					<div class="ivu-page-options">
						<div class="ivu-page-options-sizer">
							<div class="ivu-select ivu-select-single ivu-select-default">
								<div tabindex="0" class="ivu-select-selection"><input type="hidden" value="10">
									<div class="">
										<span class="ivu-select-selected-value">10 条/页</span>
										<i class="ivu-icon ivu-icon-ios-arrow-down ivu-select-arrow"></i></div>
								</div>
							</div>
						</div>
					</div>

					<div class="ivu-page-options">
						<div class="ivu-page-options-elevator">
							跳至
							<input type="text" autocomplete="off" spellcheck="false">
							页
						</div>
					</div>
				</ul>-->
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
			institu:'',
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
					institu:this.institu,
				};
				axios.post('{:Url("doctor_list")}', data).then((e) => {
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
