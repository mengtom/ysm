{include file="public/header"}
	<title>医疗机构管理</title>

	<div class="h-100 w-100 cmr-allmedical" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a><span class="text-c01f5e ml-8">医疗机构管理 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="" style="width: 70px;">机构名称:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" name="keyword" type="text">
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">所属平台:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select name="platform" >
										<option value="">请选择</option>
										{volist name="$platform" id="p"}
										<option value="{$p['id']}">{$p['p_name']}</option>
										{/volist}
									</select>
								</div>
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 125px;">机构开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input name="time" class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13">
								</div>
							</div>
						</div>
					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="submit" class="ivu-btn ivu-btn-primary mr-10" lay-submit="search" lay-filter="search">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">医疗机构列表</span> </span>
				<div>
					<button class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaochu"></i>
						导出Excel
					</button>
				</div>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default" style="overflow: initial" id="list">

				</table>
				<script type="text/html" id="act">
					<a href="" class="text-c01f5e">机构详情</a>
				</script>
			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between ">
				<a href="index.html" class="ivu-btn ivu-btn-default ml-30">返回</a>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100" />

			</div>

		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
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
	//实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"{:Url('institu_list')}",function (){
        var join=new Array();
        join=[
            {field: 'id', title: '编码',templet:'#id',align:'center', sort: true,event:'id',width:'6%'},
            {field: 'name', title: '机构名称',templet:'#name',align:'left',event:'name',width:'15%'},
            {field: 'referrer', title: '对接人',templet:'#referrer',align:'left',event:'referrer',width:'10%'}, //edit:'en_name',
            {field: 'refer_mobile', title: '联系电话',templet:'#refer_mobile',align:'left',event:'refer_mobile',width:'10%'},
            {field: 'createtime', title: '开通时间',templet:'#createtime',align:'left',event:'cate_id',width:'10%'},
            {field: 'platform_name', title: '所属平台',templet:'#platform_name',align:'left',width:'10%'},
            {field: 'total_order', title: '成交订单',templet:'#total_order',align:'left',event:'total_order',width:'8%'},
            {field: 'total_price', title: '成交金额',templet:'#total_price',align:'left',event:'total_price',width:'8%'},
            {field: 'total_doctor', title: '医生人数',templet:'#total_doctor',align:'left',width:'8%'},
            {field: 'total_patient', title: '患者人数',templet:'#total_patient',align:'left',width:'8%'},
            {field: 'right', title: '操作',align:'left',toolbar:'#act'},
        ];

        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f6f6f6'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
    });
    //excel下载
    layList.search('export',function(where){
        where.excel = 1;
        location.href=layList.U({m:'admin',c:'crm.crm_institution',a:'institu_list',q:where});
    })
    function dropdown(that){
        $(that).next('.cj-edit-list').stop().slideToggle();
    }
    //排序
    layList.sort(function (obj) {
        var type = obj.type;
        switch (obj.field){
            case 'id':
                layList.reload({order: layList.order(type,'id')},true,null,obj);
                break;
        }
    });
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });

	// var heght = window.innerHeight;
	// var app   = new Vue({
	// 	el     : '#app',
	// 	data   : {
	// 		date1  : '',
	// 		message: 'Hello Vue.js!',
	// 		ismodel: false,
	// 		cf     : '2019.1.1',
	// 	},
	// 	methods: {
	// 		// 页码改变的回调，返回改变后的页码
	// 		pagechange(e) {
	// 			console.log(e)
	// 		},
	// 		// 切换每页条数时的回调，返回切换后的每页条数
	// 		pagesizechange(e){
	// 			console.log(e)
	// 		},
	// 		model         : function () {
	// 			// this.ismodel = !this.ismodel;
	// 		},
	// 		reverseMessage: function () {
	// 			this.message = this.message.split('').reverse().join('');
	// 		},
	// 	},
	// });



</script>
