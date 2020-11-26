{include file="public/header"}
	<title>CMR-列表</title>

	<div class="h-100 w-100 cmr-recharge" id="app">
		<!--头部	-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10   text-666 size-14">
			<a class="text-57">首页 /</a> <a href="index.html" class="">平台管理/ </a> <a href="{:Url('basic',array('id'=>$id))}" class="">基本信息 /</a> <span class="text-c01f5e">充值记录 </span>
		</div>
		<div class="w-1200 mb-10 mt-10">
			<span class="size-20 fw">充值记录</span>
		</div>
		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">

			<!--表格-->
			<div class="w-100 table" style="border: white 1px solid">

				<!--<div class="" style="width: 1140px;margin: auto;margin-top: 30px;border: 1px solid #d9d9d9">
					<div class="w-100 bg-f6 d-flex align-items-center justify-content-start" style="height: 30px;">
						<div class="w-150px pl-30 fw h30">充值时间</div>
						<div class="w-150px pl-30 fw h30">充值金额</div>
						<div class="w-150px pl-30 fw h30">操作人</div>
						<div style="width: 120px;" class="pl-30 fw h30">收款方式</div>
						<div style="width: 220px;" class="pl-30 fw h30">流水单号</div>
						<div class="w-350px pl-30 fw h30">备注</div>
					</div>
					<div v-for="i in 10" class="w-100 d-flex align-items-center justify-content-start text-57" style="height: 38px;border-bottom: 1px solid #d9d9d9;">
						<div class="w-150px pl-30">2020-00-00</div>
						<div class="w-150px pl-30">2020-00-00</div>
						<div class="w-150px pl-30">操作人</div>
						<div style="width: 120px;" class="pl-30">收款方式</div>
						<div style="width: 220px;" class="pl-30">S5555551111414</div>
						<div class="w-350px pl-30">备注备注备注</div>
					</div>
				</div>-->


				<div class="tb">
					<table class="ivu-table  ivu-table-default w-100" id="list">

					</table>
				</div>

			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between">
				<div class="ml-30">
					<button class="ivu-btn ivu-btn-default " type="button" lay-filter="export" lay-submit="export"><i class="icon iconfont icondaochu mr-8"></i>导出Excel</button>
					<a href="index.html" class="ivu-btn ivu-btn-default ml-20" type="button">返回</a>
				</div>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100"/>
			</div>

		</div>


	</div>
</body>
</html>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script type="text/javascript">
	 //实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"{:Url('recharge_list',array('id'=>$id))}",function (){
        var join=new Array();
        join=[
            {field: 'add_time', title: '充值时间',templet:'#add_time',align:'center',event:'add_time',width:'15%'},
            {field: 'number', title: '充值金额',templet:'#number',align:'left',event:'number',width:'10%'},
            {field: 'title', title: '充值操作',templet:'#title',align:'left',event:'title',width:'10%'},
            {field: 'balance', title: '余额',templet:'#balance',align:'left',event:'balance',width:'10%'},
            {field: 'act_name', title: '操作人',templet:'#act_name',align:'left',event:'act_name',width:'15%'}, //edit:'en_name',
            {field: 'payment', title: '收款方式',templet:'#payment',align:'left',event:'payment',width:'10%'},
            {field: 'code', title: '流水单号',templet:'#code',align:'left',event:'code',width:'15%'},
            {field: 'mark', title: '备注',templet:'#mark',align:'left',event:'mark'},
        ];
        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f6f6f6'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
    });
    layList.form.render();
	//excel下载
    layList.search('export',function(where){
        location.href=layList.U({m:'admin',c:'crm.crmplatform',a:'recharge_list',p:{excel:1,id:{$id}}});
    })
    //排序
    layList.sort(function (obj) {
        var type = obj.type;
        switch (obj.field){
            case 'id':
                layList.reload({order: layList.order(type,'id')},true,null,obj);
                break;
        }
    });

</script>
