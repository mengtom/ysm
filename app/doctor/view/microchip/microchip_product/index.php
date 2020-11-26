{include file="public/header"}
<body class="bg-f2f3f5">
	<title>微片查看</title>
	<div class="h-100 w-100 wp-index pl-20 pr-20" id="app">
		<div class="w-100 mt-14 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-0081a7">微片查看 </span>
		</div>
		<!--搜索区-->
		<div class="w-100 com-search bg-fff mt-10">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="">
					<div class="h-100  pl-20 d-flex align-items-center justify-content-start flex-column mb-20">
						<div class="w-100 d-flex align-items-center justify-content-start flex-wrap">
							<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
								<span class="w-50px">关键字:</span>
								<input class="ivu-input w-300px ml-8" placeholder="请输入" type="text" v-model="keyword">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
								<span class="w-50px">适应症:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<!--<cascader :data="data" name="erji" v-model="value1"></cascader>-->
									<i-select v-model="cate2">
										<i-option value="0">全部</i-option>
										{volist name="cate2" id="c2"}
										<i-option value="{$c2.id}">{$c2.title}</i-option>
										{/volist}

									</i-select>
								</div>
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
								<span>分类标签:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<!--<cascader :data="data1" name="erji" v-model="value2"></cascader>-->
									<i-select v-model="cate1">
										<i-option value="0">全部</i-option>
										{volist name="cate1" id="c1"}
										<i-option value="{$c1.id}">{$c1.title}</i-option>
										{/volist}
									</i-select>
								</div>
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
								<span>其他标签:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<i-select v-model="cate3">
										<i-option value="0">全部</i-option>
										{volist name="cate3" id="c3"}
										<i-option value="{$c3.id}">{$c3.title}</i-option>
										{/volist}
									</i-select>
								</div>
							</div>
							<div class="h-100  d-flex align-items-center justify-content-start mr-20 mt-20">
								<span>状态:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<i-select v-model="is_show">
										<i-option value="">全部</i-option>
										<i-option value="1">可用</i-option>
										<i-option value="0">不可用</i-option>
									</i-select>
								</div>
							</div>
						</div>
					</div>
					<div class="h-100 mt-20 w-200px d-flex align-items-start justify-content-end">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="button" class="ivu-btn ivu-btn-primary mr-20" @click="getitems">筛选</button>
					</div>
				</form>
			</div>
		</div>
		<!--列表-->
		<div class="w-100 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">微片列表</span>
			</div>
			<!--表格-->
			<div class="w-100 table">
				<table class="ivu-table  ivu-table-default">
					<tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="text-center bg-f6 w-100px">编码</th>
						<th class="bg-f6 w-150px">微片名称</th>
						<th class="bg-f6 w-150px">英文名称</th>
						<th class="bg-f6 w-100px">适应症</th>
						<th class="bg-f6 w-100px">分类</th>
						<th class="bg-f6 w-100px">其他标签</th>
						<th class="bg-f6 w-100px">剂量范围</th>
						<th class="bg-f6 w-100px">单次增量</th>
						<th class="bg-f6 w-50px">状态</th>
						<th class="bg-f6 w-50px">价格</th>
						<th class="bg-f6 w-100px">操作</th>
					</tr>
					<tr v-for="i in data" class="cursor text-57">
						<td class="text-center ckitem">{{i.code}}</td>
						<td class="ckitem">
							<div class="ellipsis-1 w-150px" title="微片名称微片">{{i.zn_name}}</div>
						</td>
						<td class="ckitem">
							<div class="w-150px ellipsis-1" title="sssss">{{i.en_name}}</div>
						</td>
						<td class="ckitem">{{i.cate2_name}}</td>
						<td class="ckitem">{{i.cate1_name}}</td>
						<td class="ckitem">{{i.cate3_name}}</td>
						<td class="ckitem">{{i.dose_range}}{{i.unit}}</td>
						<td class="ckitem">{{i.dose}}{{i.unit}}</td>
						<td class="ckitem">{{i.status ===1 ? '可用' :'不可用'}}</td>
						<td class="ckitem">{{i.sell_price}}</td>
						<td>
							<a class="edittext ml-10 text-0081a7" :href=`{:Url('details')}?micro_id=${i.micro_id}`>查看详情</a>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-end ">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total"/>
			</div>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script type="text/javascript">
	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			data:[],
			total:0,
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			keyword:'',
			cate1:'',
			cate2:'',
			cate3:'',
			is_show:'',
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
					cate1: this.cate1,
					cate2: this.cate2,
					cate3: this.cate3,
					is_show: this.is_show,
				};
				axios.post("{:Url('product_list')}", data).then((e) => {
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
</script>