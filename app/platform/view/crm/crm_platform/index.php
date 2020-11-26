{include file="public/header"}
	<title>平台管理</title>
	<div class="h-100 w-100 cmr-index" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">平台管理</span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="">

					<div class="w-75 h-100  pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="" style="width: 70px;">平台名称:</span>
								<input class="ivu-input w-300px" placeholder="请输入" name="p_name" type="text">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 90px;">平台开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative w-250px">
									<input class="ivu-input" type="text" placeholder="开始时间->结束时间" name="time" style="width: 240px;" id="test13">
								</div>
							</div>
						</div>

						<div class="w-100 d-flex align-items-center justify-content-start mt-20">

							<div class="h-100 d-flex align-items-center justify-content-start">
								<span style="width: 70px;">平台余额:</span>
								<div class="ivu-select d-flex align-items-center w-300px  ivu-select-single ivu-select-default">
									<input class="ivu-input" style="width: 120px;" name="min_price" placeholder="请输入最小值" type="text">
									<span class="ml-8 mr-8 text-57">~</span>
									<input class="ivu-input" style="width: 120px;" name="max_price" placeholder="请输入最大值" type="text">
								</div>
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span>结算货币:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<select name="currency">
										<option value="">全部</option>
										<option value="人民币">人民币</option>
										<option value="美元">美元</option>
									</select>
								</div>
							</div>

						</div>

					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button class="ivu-btn ivu-btn-primary mr-10" lay-submit="search" lay-filter="search">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16 fw ml-20">平台列表</span>
				<div>
					<button class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaoru"></i>
						Excel导入
					</button>
					<a href="{:Url('create')}" class="ivu-btn ivu-btn-primary mr-20"><i class="ivu-icon ivu-icon-md-add"></i> 添加新平台</a>
				</div>
			</div>

			<!--表格-->
			<div class="w-100 table ">
				<table class="ivu-table  ivu-table-default" style="overflow: initial" id="list" lay-filter="list"></table>
				<script type="text/html" id="act">
					<div class="edittext text-27" onclick="dropdown(this)">
						更多操作
						<i class="icon iconfont iconxiangxia2"></i>
					</div>
					<div class="absolute cj-edit-list mt-8">
						<div class="w-100 h-100 d-flex align-items-start justify-content-start flex-column">
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('basic')}?id={{d.id}}">基本信息</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10 add-mode" lay-event="add-mode">平台充值</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('wpindex')}?id={{d.id}}">选择可用微片</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('pfindex')}?id={{d.id}}">选择可用TS配方</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('medical')}?id={{d.id}}">查看下属医疗机构</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('doctor')}?id={{d.id}}">查看下属医生</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('patient')}?id={{d.id}}">查看平台内患者</a></div>
							<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" href="{:Url('order')}?id={{d.id}}">查看平台订单</a></div>
						</div>
					</div>
				</script>
			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-end ">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100" />
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
		<!--充值-->
		<div style="display: none" class="modal-root label-modal closemode">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 460px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">充值</span>
					<span style="right: 20px;" class="absolute cursor ">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="{:url('')}" method="post">
					<div class="items  d-flex align-items-center justify-content-start flex-column   ">
						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<span style="width: 90px;">结算货币：</span><input type="text" value="人民币" disabled class="ivu-input ivu-input-default ivu-input-disabled">
						</div>
						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">充值金额：</span><input type="text" placeholder="请输入"  class="ivu-input ivu-input-default ">
						</div>
						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">收款方式：</span><input type="text" placeholder="请输入"  class="ivu-input ivu-input-default ">
						</div>
						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">流水单号：</span><input type="text" placeholder="请输入"  class="ivu-input ivu-input-default ">
						</div>
						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<div style="width: 90px;">备  注：</div>
							<div>
								<textarea placeholder="请输入" style="width: 327px;height: 68px;"  class="ivu-input ivu-input-default"></textarea>
							</div>
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">提交</button>
					</div>
				</form>
			</div>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script>
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"{:Url('platform_ist')}",function (){
        var join=new Array();
        join=[
            {field: 'id', title: '编码',templet:'#id',align:'center', sort: true,event:'id',width:'6%'},
            {field: 'p_name', title: '平台名称',templet:'#p_name',align:'left',event:'p_name',width:'20%'},
            {field: 'referrer', title: '对接人',templet:'#referrer',align:'left',event:'referrer',width:'10%'}, //edit:'en_name',
            {field: 'refer_mobile', title: '联系电话',templet:'#refer_mobile',align:'left',event:'refer_mobile',width:'10%'},
            {field: 'createtime', title: '开通时间',templet:'#createtime',align:'left',event:'cate_id',width:'10%'},
            {field: 'money', title: '余额',templet:'#now_money',align:'left',event:'now_money',width:'6%'},
            {field: 'currency', title: '结算货币',templet:'#currency',align:'left',event:'currency',width:'10%'},
            {field: 'total_order', title: '成交订单',templet:'#total_order',align:'left',event:'total_order',width:'9%'},
            {field: 'total_price', title: '成交金额',templet:'#total_price',align:'left',event:'total_price',width:'9%'},
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
        location.href=layList.U({c:'microchip.microchip_product',a:'product_ist',q:where});
    })
    function dropdown(that){
        $(that).next('.cj-edit-list').stop().slideToggle();
    }
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
        	case 'add-mode':
        		var url=layList.U({m:'admin',c:'crm.crm_platform',a:'recharge',q:{id:data.id}});
        		layList.createModalFrame('充值',url);
        	break;
        }
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
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
    // //多选事件绑定
    // $('.layui-btn-container').find('button').each(function () {
    //     var type=$(this).data('type');
    //     $(this).on('click',function(){
    //         action[type] && action[type]();
    //     })
    // });
</script>
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


</script>
