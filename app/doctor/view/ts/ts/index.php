{include file="public/header"}
	<title>配方管理</title>
	<div class="h-100 w-100 ts-index " id="app">
		<div class="w-100 mt-20 mb-10 pr-20 pl-20 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-0081a7">配方查看 </span>
		</div>
		<!--搜索区-->
		<div class="w-100 pr-20 pl-20 relative">
			<div class="w-100 com-search bg-fff">
				<div class="keyword w-100  h-auto">
					<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">
						<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mb-20">
							<div class="w-100 d-flex align-items-center justify-content-start flex-wrap">
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>关键字:</span>
									<input class="ivu-input w-300px ml-8" placeholder="请输入" type="text" v-model="keyword" value="">
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>适应症:</span>
									<div class="w-150px ml-8">
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
									<span>其它标签:</span>
									<div class="w-150px ml-8">
										<!--<cascader :data="data" name="erji" v-model="value1"></cascader>-->
										<i-select v-model="cate3">
											<i-option value="0">全部</i-option>
											{volist name="cate3" id="c3"}
											<i-option value="{$c3.id}">{$c3.title}</i-option>
											{/volist}
										</i-select>
									</div>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>来源:</span>
									<div class="w-150px ml-8">
										<!--<cascader :data="data" name="erji" v-model="value1"></cascader>-->
										<i-select v-model="status">
											<i-option value="0">全部</i-option>
											<i-option value="0">来源1</i-option>
											<i-option value="0">来源1</i-option>
										</i-select>
									</div>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>状态:</span>
									<div class="w-150px ml-8">
										<!--<cascader :data="data" name="erji" v-model="value1"></cascader>-->
										<i-select v-model="is_show">
											<i-option value="0">全部</i-option>
											<i-option value="0">可用</i-option>
											<i-option value="0">不可用</i-option>
										</i-select>
									</div>
								</div>
							</div>
						</div>

						<div class="w-250px h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="button" class="ivu-btn ivu-btn-primary mr-20" @click="getitems">搜索</button>
						</div>
					</form>
				</div>
			</div>

			<div class="message w-100 mt-10 d-flex align-items-center justify-content-between pl-20 fw">
				请勾选您需要使用的配方后，再生成处方，或直接建立新配方以生成处方。
			</div>

			<div class="message w-100 mt-10 d-flex align-items-center justify-content-between">
				<span class="ml-20 text-0081a7">在下方点击“+”号选择配方</span>
				<i class="icon iconfont iconcha text-0081a7 cursor tipclose mr-8"></i>
			</div>
			<!--列表-->
			<div class="w-100 label-list bg-fff mt-10">
				<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
					<span class="size-16  ml-20 fw">全部配方列表</span>
					<div>
						<a href="{:Url('create')}" class="ivu-btn ivu-btn-primary mr-20">
							<i class="ivu-icon ivu-icon-md-add"></i>
							添加我的配方
						</a>
					</div>
				</div>

				<!--表格-->
				<div class="w-100 table">

					<table class="ivu-table  ivu-table-default" style="overflow: initial">
						<tbody class="ivu-table-tbody">
						<tr class="ivu-table-header cursor">
							<th class="text-center bg-f6 w-50px">选择</th>
							<th class="text-left bg-f6 w-50px">编码</th>
							<th class="bg-f6 w-200px">配方名称</th>
							<th class="bg-f6 w-200px">英文名称</th>
							<th class="bg-f6 w-100px">来源</th>
							<th class="bg-f6 w-150px">适应症</th>
						<!-- 	<th class="bg-f6 w-100px">其它标签</th> -->
							<th class="bg-f6 w-100px">每组价格</th>
							<th class="bg-f6 w-100px">状态</th>
							<th class="bg-f6 w-150px">操作</th>
						</tr>
						<tr class="cursor text-57" v-for="i in data">
							<td class="text-center ckitem"><i class="icon iconfont iconicon-test text-0081a7 add fw" :data-id="i.id"></i></td>
							<td class="text-left ckitem">{{i.code}}</td>
							<td class="ckitem">
								<div class="w-200px ellipsis-1" :data-id="i">{{i.name_zn}}</div>
							</td>
							<td class="ckitem">
								<div class="w-200px ellipsis-1" >{{i.name_en}}</div>
							</td>
							<td class="ckitem">{{i.type_name}}</td>
							<td class="ckitem">{{i.cate2_name}}</td>
							<td class="ckitem">{{i.price}}</td>
							<td class="ckitem">{{i.is_status ? '可用':'不可用'}}</td>
							<!--去掉 ckedit 可以增删改查-->
							<td class="ckitem" v-if="i.type == 1">
								<a class="text-0081a7" :href=`{:url('details')}?id=${i.id}`>
									<i class="icon iconfont iconbian-ji"></i>
									详情
								</a>
								<a class="text-27" :href=`{:url('edit')}?id=${i.id}`>
									<i class="icon iconfont iconbian-ji"></i>
									编辑
								</a>
								<a class="text-0081a7" :href=`{:url('delete')}?id=${i.id}`>
									<i class="icon iconfont iconguanbi size-12"></i>
									删除
								</a>
							</td>
							<td class="ckitem" v-else>
								<a class="text-0081a7" :href=`{:url('details')}?id=${i.id}`>
									<i class="icon iconfont iconbian-ji"></i>
									详情
								</a>
								<a class="text-27 ckedit">
									<i class="icon iconfont iconbian-ji"></i>
									编辑
								</a>
								<a class="text-0081a7 ckedit">
									<i class="icon iconfont iconguanbi size-12"></i>
									删除
								</a>
							</td>
						</tr>
						</tbody>
					</table>

				</div>
				<!--page 分页-->
				<div class="w-100 d-flex align-items-center justify-content-end" style="margin-bottom: 80px;">
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total"/>
				</div>

			</div>
		</div>

		<div class="fixed w-100 bg-fff button-recipe d-flex align-items-start justify-content-start">
			<div class="h-100 w-100px d-flex align-items-center justify-content-center">
				已选配方：
			</div>
			<div class="h-100 d-flex align-items-center justify-content-start flex-wrap footconten">
				<!--<span class="size-12 d-flex align-items-center justify-content-center ml-10 wrap">
					配方名称配方名称配方名称配方名称
					<i class="icon iconfont iconguanbi text-bf cursor ml-10 size-14"></i>
				</span>-->
			</div>
			<div class="h-100 w-150px d-flex align-items-center justify-content-center">
				<button type="button" class="ivu-btn-primary ivu-btn  ml-20 mr-20 create"><i class="icon iconfont iconyishenghoutai-chufang1"></i> 生成处方</button>
			</div>
		</div>

		<!--弹窗-->
		<div style="display: none;" class="modal-root ts-edit-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style=" width: 425px;height: 193px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative">
					<span class="fw size-16">提示</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<div class="w-100 items d-flex align-items-center">
					请勾选您需要使用的配方后，再生成处方，或直接建立新配方以生成处方。
				</div>
				<div class="w-100 d-flex align-items-center justify-content-end foot">
					<a href="{:Url('create')}"  class="ivu-btn-primary ivu-btn mr-10">新建配方</a>
					<button type="button" class="ivu-btn-default ivu-btn closemode mr-20">取消</button>
				</div>
			</div>
		</div>

		<div style="display: none;" class="modal-root ts-edit-modal-create ts-edit-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style=" width: 425px;height: 243px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative">
					<span class="fw size-16">提示</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<div class="w-100 d-flex align-items-center justify-content-center flex-column">
					<div class="w-100 mt-30 text-center">您将使用已勾选的 <span class="number">0</span> 个配方形成一个新处方，是否确定？</div>
					<div class="w-100 mt-20 mb-30 text-center">
						<a data-href="{:Url('prescription')}" class="ivu-btn-primary ivu-btn mr-30 route">确定，生成患者处方</a>
						<a data-href="{:Url('purchase')}" class="ivu-btn-primary ivu-btn route">确定，我要自己采购</a>
					</div>
				</div>
				<div class="w-100 d-flex align-items-center justify-content-end foot">
					<button type="button" class="ivu-btn-default ivu-btn closemode mr-20">取消</button>
				</div>
			</div>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script type="text/javascript">
var type='<?=$type?>';
	var app = new Vue({
		el     : '#app',
		data   : {
			date1   : '',
			message : 'Hello Vue.js!',
			ismodel : false,
			data    :[],
			total   : 0,
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			is_show : 0,
			status  : 0,
			keyword :'',
			cate2   :0,
			cate3   :0,
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
					cate2: this.cate2,
					cate3: this.cate3,
					is_status: this.is_show,
				};
				axios.post("{:Url('ts_list',['type'=>$type])}", data).then((e) => {
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

	var items = [];

	// tipclose
	$('.tipclose').click(function (e) {
		$(this).parent().remove();
	});

	//删除配方
	$(".footconten").on('click', '.iconguanbi', function () {
		$(this).parent().remove();
		var id = $(this).data('id');
		for (var i = 0; i < items.length; i++) {
			if (items[i] == id) {
				items.splice(i, 1);
			}
		}
	});

	//生成处方
	$('.create').click(function () {
		var num = items.length;
		if (num <= 0) {
			return false;
		}
		$('.number').html(num);
		$('.ts-edit-modal-create').show();
	});

	//关闭提示窗
	$('.closemode').click(function () {
		$('.ts-edit-modal').hide();
		$('.ts-edit-modal-create').hide();
	});


	$(".ts-edit-modal").on('click', '.route', function () {
		var url=$(this).data('href');
		if(items.lenght <=0) {
			return false
		}
 		var ids = items.join(',');
		window.location.href=url +'?id='+ids;
	});



	$(".table").on('click', '.add', function () {
		var ispush = true;
		var name   = $(this).parent().next().next().find('.w-200px').text();
		var id     = $(this).data('id');
		if (items.length >= 10) {
			console.log('最多勾选十个');
			return false;
		}

		items.forEach(item => {
			if (item == id) {
				ispush = false;
			}
		});

		if (ispush == false) {
			return false;
		} else {
			items.push(id);
			var html = '<span  class="size-12 d-flex align-items-center justify-content-center ml-10 wrap">' +
				name +
				'<i class="icon iconfont iconguanbi text-bf cursor ml-10 size-14" data-id="' + id + '" ></i></span>';
			$('.footconten').append(html);
		}
	});


</script>
