{include file="public/header"}
	<title>CMR-列表-独立医生管理</title>

	<div class="h-100 w-100 cmr-independentdoctor" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a><span class="text-c01f5e ml-8">{if condition="$type eq 2"}独立{else /}全部{/if}医生管理 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20" style="width: 1000px;">
						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="" style="width: 70px;">医生信息:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text" name="keyword">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span class="" style="width: 70px;">所属机构:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text" name="institu">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">所属平台:</span>
								<div class="w-150px">
									<select name="platform">
										<option value="">请选择</option>
										{volist name="$platform" id="p"}
										<option value="{$p.id}">{$p.p_name}</option>
										{/volist}
									</select>
								</div>
							</div>

						</div>

						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span style="width: 125px;">账号开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input class="ivu-input" name="time" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13">
								</div>
							</div>
						</div>
					</div>

					<div class="h-100 mt-20  d-flex align-items-start justify-content-end" >
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="submit" class="ivu-btn ivu-btn-primary mr-10" lay-submit="seach" lay-filter="seach">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">{if condition="$type eq 2"}独立{else /}全部{/if}医生列表</span> </span>
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
					<!-- <tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="pl-30 bg-f6 w-100px">编码</th>
						<th class="bg-f6 w-100px">医生姓名</th>
						<th class="bg-f6 w-100px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-200px">所属平台</th>
						<th class="bg-f6 w-200px">所属机构</th>
						<th class="bg-f6 w-100px">开具处方</th>
						<th class="bg-f6 w-100px">成交订单</th>
						<th class="bg-f6 w-100px">成交金额</th>
						<th class="bg-f6 w-100px">患者人数</th>
					</tr>

					<tr v-for="i in 10" class="cursor text-57">
						<td class="pl-30 ckitem">000</td>
						<td class="ckitem">医生姓名 </td>
						<td class="ckitem">12345678912</td>
						<td class="ckitem">2020-00-00</td>
						<td class="ckitem">平台名称</td>
						<td class="ckitem">所属机构</td>
						<td class="ckitem">3000</td>
						<td class="ckitem">500</td>
						<td class="ckitem">83000.00</td>
						<td class="ckitem">300</td>
					</tr>
					</tbody> -->
				</table>

			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between ">
				<a href="index.html" class="ivu-btn ivu-btn-default ml-30">返回</a>
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
    layList.tableInfo('list',"{:Url('get_doctor_list',array('type'=>$type))}",function (){
        var join=new Array();
        join=[
            {field: 'id', title: '编码',templet:'#id',align:'center', sort: true,event:'id',width:'8%'},
            {field: 'name', title: '医生姓名',templet:'#p_name',align:'left',event:'p_name',width:'15%'},
            // {field: 'referrer', title: '对接人',templet:'#referrer',align:'left',event:'referrer',width:'10%'}, //edit:'en_name',
            {field: 'refer_mobile', title: '联系电话',templet:'#refer_mobile',align:'left',event:'refer_mobile',width:'15%'},
            {field: 'createtime', title: '开通时间',templet:'#createtime',align:'left',event:'cate_id',width:'15%'},
            {field: 'platform_name', title: '所属平台',templet:'#plat_name',align:'left',width:'10%'},
            // {field: 'institu_name', title: '所属机构',templet:'#institu_name',align:'center',width:'20%'},
            {field: 'total_ts', title: '开具处方',templet:'#total_ts',align:'left',width:'10%'},
            {field: 'total_order', title: '成交订单',templet:'#total_order',align:'left',event:'total_order',width:'10%'},
            {field: 'total_price', title: '成交金额',templet:'#total_price',align:'left',event:'total_price',width:'10%'},
            {field: 'total_patient', title: '患者人数',templet:'#total_patient',align:'left'},

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

</script>
