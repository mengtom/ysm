{include file="public/header"}
	<title>CMR-列表-订单</title>

	<div class="h-100 w-100 cmr-recipe" id="app">

		<div class="w-100 mt-20 mb-10 tip pr-20 pl-20  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-0081a7">患者处方</span>
		</div>

		<!--搜索区-->
		<div class="w-100 relative pr-20 pl-20" style="z-index: 1">
			<div class="w-100 com-search mt-0 bg-fff" style="border-bottom: 2px solid #f0f0f0;">
				<div class="keyword w-100  h-auto">
					<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="post">

						<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mb-20">
							<div class="w-100 d-flex align-items-center justify-content-start flex-wrap">

								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span style="width: 70px;">处方名称:</span>
									<input class="ivu-input w-300px" placeholder="请输入" type="text" v-model="keyword">
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>开具处方时间:</span>
									<div class="ml-8">
										<input class="ivu-input w-250px" type="text" placeholder="开始时间->结束时间" id="test13" v-model="time">
									</div>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span style="width: 70px;">处方状态:</span>
									<div class="w-150px">
										<!--<cascader :data="data" name="erji" v-model="value1"></cascader>-->
										<i-select v-model="status">
											<i-option value="0">全部</i-option>
											<i-option value="9">可用</i-option>
											<i-option value="10">不可用</i-option>
										</i-select>
									</div>
								</div>
							</div>
						</div>

						<div class="w-250px h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="botton" class="ivu-btn ivu-btn-primary mr-20" @click="getitems">搜索</button>
						</div>
					</form>
				</div>
			</div>
			<!--列表-->
			<div class="w-100 label-list">

				<div class="w-100 list-title d-flex align-items-center justify-content-between pt-20 bg-fff mt-10">
					<span class="size-16  ml-20"><span class="fw">处方列表</span> </span>
				</div>

				<!--表格-->
				<div class="w-100 table bg-fff pt-10">
					<div class="t-table pr-20 pl-20 mw-1140">
						<div class="w-100 bg-f6 d-flex align-items-center justify-content-start text-57" style="height: 32px;border: 1px solid #d9d9d9">
							<div class="text-center w-40">处方信息</div>
							<div class="text-center w-20">开具时间</div>
							<div class="text-center w-20">用户姓名</div>
							<div class="text-center w-20">处方状态</div>
						</div>

						<div v-for="i in data" class="w-100 d-flex align-items-center justify-content-start flex-column t-tabl-top">
							<div class="w-100 t-tabl-top-title">
								<span class="ml-20 fw">处方编码：{{i.order_sn}}</span>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start t-tabl-top-centen">
								<div class="h-100 d-flex align-items-center pl-20 w-40"> {{i.order_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-20 bl">{{i.add_time}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-20 bl">{{i.real_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-20 bl">待查看</div>
							</div>

							<div class="w-100" style="display:none">
								<div class="w-100 pl-20 pr-20" style="min-width: 1128px;margin: auto">
									<div class="w-100 text-57 mt-8">
										<span>单剂微片种类数：{{i.micro_cate_count}}种</span>
										<span class="ml-20">单剂微片总片数：{{i.total_num}}片</span>
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

											<tr class="ivu-table-header" v-for="m in i._info">
												<td class="text-center text-57 t-table-td">{{m.code}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_name}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_dose}}</td>
												<td class="text-center text-57 t-table-td">{{m.num}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_price}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_price}}</td>
											</tr>
											<!-- <tr class="ivu-table-header">
												<td class="text-center text-57 t-table-td">WXXXXXX</td>
												<td class="text-center text-57 t-table-td">微片名称</td>
												<td class="text-center text-57 t-table-td">0000000</td>
												<td class="text-center text-57 t-table-td">100</td>
												<td class="text-center text-57 t-table-td">0000000</td>
												<td class="text-center text-57 t-table-td">0000000</td>
											</tr> -->
											</tbody>
										</table>

									</div>
								</div>

							</div>

							<div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 42px;">
								<span class="text-0081a7 cursor" data-id="1" onclick="unfold(this)"><i class="icon iconfont iconxiangxia_hei"></i> 详情</span>
							</div>
						</div>


					</div>
				</div>
				<!--page 分页-->
				<div class="w-100 d-flex align-items-center justify-content-between bg-fff">
					<a href="index.html" class="ivu-btn ivu-btn-default ml-20">返回</a>
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total"/>
				</div>

			</div>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
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

	var type='<?=$type?>';
	var app = new Vue({
		el     : '#app',
		data   : {
			date1  : '',
			message: 'Hello Vue.js!',
			data:[],
			total     : 0,
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			time:'',
			status :'',
			keyword:'',
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
					status: this.status,
					time : this.time,
				};
				axios.post("{:Url('prescription_list',['type'=>$type])}", data).then((e) => {
					e=e.data;
					this.data = e.data;
					this.total= e.count;
				});
			},
		},
		created() {
			this.getitems();
		},
	});

	function unfold(de){
		var type = $(de).data('id');
		if (type == 1) {
			$(de).data('id', '2');
			$(de).html('<i class="icon iconfont iconxiangshang"></i> 收起');
		} else {
			$(de).data('id', '1');
			$(de).html('<i class="icon iconfont iconxiangxia_hei"></i> 详情');
		}
		$(de).parent().prev().stop().slideToggle();
	}
	// $('.unfold').on('click',(function (e) {

	// }));


</script>
