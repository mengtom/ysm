{include file="public/header"}
	<title>平台选择配方</title>

	<div class="h-100 w-100 cmr-pfindex" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <a href="index.html" class="text-57">平台管理 </a> <span class="text-c01f5e">/ 选择可用TS配方 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="post">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="w-50px">关键字:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text">
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span class="w-50px">适应症:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select name="cate2">
										<option value="">请选择</option>
										{volist name="cate2" id="v2"}
										<option value="{$v2.id}">{$v2.title}</option>
										{/volist}
									</select>
								</div>
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">其它标签:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select name="cate3" >
										<option value="">请选择</option>
										{volist name="cate3" id="v3"}
										<option value="{$v3.id}">{$v3.title}</option>
										{/volist}
									</select>
								</div>
							</div>

						</div>
						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<span>配方显示状态:</span>
							<div class="ivu-select ivu-select-single ivu-select-default relative w-150px ml-8">
								<select name="status">
									<option value="">请选择</option>
									<option value="0">未选</option>
									<option value="1">已选</option>
								</select>
							</div>
						</div>
					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="submit" class="ivu-btn ivu-btn-primary mr-10" lay-filter="search" lay-submit="search">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<div class="w-1200 bg-f8e8ee pl-20 mt-10 text-c01f5e wptip relative">
			配方被勾选后方可显示至平台的后台
			<i class="icon iconfont iconcha text-c01f5e cursor tipclose absolute"></i>
		</div>
		<!--列表-->
		<div class="w-1200 label-list mt-10 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">平台配方选择</span> <span class="size-14">（{$platform.p_name}）</span> </span>
			</div>

			<!--表格-->
			<div class="w-100 table ">
				<form action="" class="">
					<table class="ivu-table  ivu-table-default" style="overflow: initial" id="list" lay-filter='list'>
					</table>
				</form>
			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between ">
				<div class="conrelTable">
					<button type="button" class="ivu-btn ivu-btn-primary ml-30" data-type="save_ts">保存</button>
					<a href="index.html" type="button" class="ivu-btn ivu-btn-default ml-20">取消</a>
				</div>

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


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script type="text/javascript">
	 //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('list',"{:Url('platform_ingredient',array('id'=>$platform.id))}",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'20%'},
            {field: 'name_zn', title: '平台TS配方',templet:'#name_zn',align:'center',event:'name_zn',width:'25%'},
            {field: 'name_en', title: '英文名称',templet:'#name_en',align:'center',event:'name_en',width:'21.5%'}, //edit:'en_name',
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'center', event:'cate2_name',width:'15%'},
            {field: 'cate3_name', title: '其他标签',templet:'#cate3_name',align:'center',event:'cate3_name',width:'15%'},
            {type:'checkbox',width:'3.7%'},
        ];
        return join;
    })

    //excel下载
    layList.search('export',function(where){
        where.excel = 1;
        where.id={$platform.id};
        location.href=layList.U({m:'admin',c:'crm.CrmPlatform',a:'platform_ingredient',q:where});
    })
    //下拉框
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })
    function dropdown(that){
        var oEvent = arguments.callee.caller.arguments[0] || event;
        oEvent.stopPropagation();
        var offset = $(that).offset();
        var top=offset.top-$(window).scrollTop();
        var index = $(that).parents('tr').data('index');
        $('.layui-nav-child').each(function (key) {
            if (key != index) {
                $(this).hide();
            }
        })
        if($(document).height() < top+$(that).next('ul').height()){
            $(that).next('ul').css({
                'padding': 10,
                'top': - ($(that).parent('td').height() / 2 + $(that).height() + $(that).next('ul').height()/2),
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }else{
            $(that).next('ul').css({
                'padding': 10,
                'top':$(that).parent('td').height() / 2 + $(that).height(),
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }
    }
    //排序
    layList.sort(function (obj) {
        var type = obj.type;
        switch (obj.field){
            case 'code':
                layList.reload({order: layList.order(type,'m.code')},true,null,obj);
                break;
        }
    });
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
    //自定义方法
    var action={
        save_ts:function(){
        	var ids=layList.table.cache.ids.getIds('id');
            var sids=layList.getCheckData().getIds('id');
            for(var i=0;i< ids.length;i++){
            	var index=sids.indexOf(ids[i]);
            	if(index > -1){
            		ids[i]={status:1,id:ids[i]};
            	}else{
            		ids[i]={status:0,id:ids[i]};
            	}
            }
        	var pid={$platform.id};
            layList.basePost(layList.Url({m:'admin',c:'crm.crm_platform',a:'select_ts'}),{ids:ids,pid:pid},function (res) {
                layList.msg(res.msg);
                layList.reload();
            });
        }
    };
    //多选事件绑定
    $('.conrelTable').find('button').each(function () {
        var type=$(this).data('type');
        $(this).on('click',function(){
            action[type] && action[type]();
        })
    });
    // tipclose
	$('.tipclose').click(function (e) {
		$(this).parent().remove();
	})
</script>
