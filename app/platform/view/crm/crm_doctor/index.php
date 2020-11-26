{include file="public/header"}
	<title>独立医生列表</title>

	<div class="h-100 w-100 crm-index-i-p" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10   text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">独立医生管理 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="">
					<div class="h-100  pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">
						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span>医生信息:</span>
								<input class="ivu-input w-300px ml-8" placeholder="请输入" type="text" v-model="keyword">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span >所属分组:</span>
								<div class="w-150px ml-8">
									<select v-model="group">
										<option value="">全部</option>
										{volist name="group" id="g"}
										<option value="{$g.id}">{$g.name}</option>
										{/volist}
									</select>
								</div>
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 118px;" >账号开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative ml-8">
									<input class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13" v-model="time">
								</div>
							</div>
						</div>
					</div>

					<div class="h-100 mt-20  d-flex align-items-start justify-content-end">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="button" class="ivu-btn ivu-btn-primary mr-10" @click="getitems">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16 fw ml-20">
					<span>独立医生列表</span>
					<a href="{:Url('setting')}" class="size-14 text-c01f5e ml-10"><i class="ivu-icon ivu-icon-md-add"></i> 设置</a>
				</span>
				<div>
					<a href="{:Url('create')}" class="ivu-btn ivu-btn-primary mr-20"><i class="ivu-icon ivu-icon-md-add"></i>添加医生</a>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table">

				<table class="ivu-table  ivu-table-default" style="overflow: initial">
					<tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="text-center bg-f6 w-100px">编码</th>
						<th class="bg-f6 w-200px">医生姓名</th>
						<th class="bg-f6 w-100px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-100px">开具处方</th>
						<th class="bg-f6 w-100px">成交订单</th>
						<th class="bg-f6 w-100px">成交金额</th>
						<th class="bg-f6 w-100px">患者人数</th>
						<th class="bg-f6 w-100px">分组</th>
						<th class="bg-f6 w-100px">操作</th>
					</tr>

					<tr v-for="i in data" class="cursor text-57">
						<td class="text-center ckitem">{{i.id}}</td>
						<td class="ckitem">
							<div class="w-200px ellipsis" title="1111">
								{{i.name}}
							</div>
						</td>
						<td class="ckitem">{{i.refer_mobile}}</td>
						<td class="ckitem">{{i.createtime}}</td>
						<td class="ckitem">1000</td>
						<td class="ckitem">{{i.total_order}}</td>
						<td class="ckitem">{{i.total_price}}</td>
						<td class="ckitem">{{i.num}}</td>
						<td class="ckitem">{{i.group_name}}</td>
						<td class="relative">
							<div class="edittext text-27 fw">
								更多操作
								<i class="icon iconfont iconxiangxia2"></i>
							</div>
							<div class="absolute cj-edit-list mt-8">
								<div class="w-100 h-100 d-flex align-items-start justify-content-start flex-column">
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`{:Url('basic')}?id=${i.id}`>基本信息</a></div>
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`{:Url('paitent')}?id=${i.id}`>查看下属患者</a></div>
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`{:Url('order')}?id=${i.id}`>查看订单</a></div>
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`{:Url('order')}?type=1&id=${i.id}`>查看处方</a></div>
								</div>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-end ">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
			</div>

		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
<script type="text/javascript">
	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			date1  : '',
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			data:[],
			total:0,
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			keyword:'',
			group:'',
			time:''
		},
		methods: {
			// 页码改变的回调，返回改变后的页码
			pagechange(e) {
				this.pagenum = e;
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
					group : this.group,
				};
				axios.post("{:Url('get_doctor_list')}", data).then((e) => {
					e=e.data;
					this.data = e.data;
					this.total   = e.count;
				});
			},
		},
		created() {
			this.getitems();
		},
	});

	//弹窗
	$('.closemode').click(function () {
		$('.modal-root').hide();
	});
	$('.add-mode').click(function () {
		$('.modal-root').show();
	});
	$(".ivu-table").on('click', '.edittext', function (e) {
		$(this).next('.cj-edit-list').stop().slideToggle();
	});
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'datetime'
			,range: true
		});
	})


</script>
