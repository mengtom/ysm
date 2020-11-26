{include file="public/header"}
	<title>成分-使用情况</title>

	<div id="app" class="wp-useage">
		<!--头部-->
		{include file="public/header_navigate" }
		<!--头部-->
		<div class="w-1200 tip mt-80 text-666 size-14 text-57">
			<span>首页 /</span><span>微片 /</span><a class="text-57" href="index.html"> 成分管理/</a><span class="text-c01f5e"> 使用管理</span>
		</div>

		<!--列表-->
		<div class="w-1200 label-list  mt-10 ">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">成分名称-使用情况列表</span>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default" id="List" lay-filter="List">
					<!-- <tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="text-center" style="background: #f6f6f6;width: 100px;">编码<i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-200px bg-f6">微片名称 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-200px bg-f6">英文名称 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-100px bg-f6">适应症 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-100px bg-f6">分类 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-100px bg-f6">其他标签 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-100px bg-f6">剂量范围 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-100px bg-f6">单次增量 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-50px bg-f6">状态 <i class="icon iconfont iconshaixuan text-bf"></i></th>

					</tr>

					<tr class="text-57">
						<td class="text-center text-57">000</td>
						<td class="text-57">微片名称 </i></td>
						<td class="text-57">英文名称</td>
						<td class="text-57">适应症适应症</td>
						<td class="text-57">分类名</td>
						<td class="text-57">标签名</td>
						<td class="text-57">000-000ug</td>
						<td class="text-57">000ug</td>
						<td class="text-57">可用</td>
					</tr>
					</tbody> -->
					<script type="text/html" id="dose_range">
						{{d.dose_range}}{{d.unit}}
					</script>
					<script type="text/html" id="is_show">
						{{d.status == 1 ? '可用':'不可用'}}
					</script>
					<script type="text/html" id="dose">
						{{d.dose}}{{d.unit}}
					</script>
				</table>

			</div>
			<!--分页-->
			<!-- <div class="w-100 d-flex align-items-center justify-content-end ">
				<ul class="ivu-page mt-20 mb-20 mr-20">
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
				</ul>
			</div> -->
		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script type="text/javascript">
	//实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('List',"{:Url('microchip.microchipIngredient/ingredientUseage',array('id'=>$id))}",function (){
        join=[
        	{field: 'code', title: '编码',align:'center',sort:true,sort:true,event:'code',width:'15%',templet:"#code",style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'zn_name', title: '微片名称',align:'center',sort:true,event:'zn_name',width:'10%',templet:"#zn_name",style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'en_name', title: '英文名称',align:'center',sort:true,event:'en_name',width:'10%',templet:"#en_name",style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'cate2_name', title: '适应症',align:'center',sort:true,width:'10%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'cate1_name', title: '分类',align:'center',sort:true,width:'10%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'cate3_name', title: '其他标签',align:'center',sort:true,width:'10%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'dose_range', title: '剂量范围',align:'center',sort:true,toolbar:'#dose_range',width:'15%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'dose', title: '单次增量',align:'center',sort:true,toolbar:'#dose',width:'10%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
            {field: 'is_show', title: '状态',align:'center',sort:true,toolbar:'#is_show',style:"border-bottom:1px solid rgb(249, 249, 249)"},
        ];
         return join;
	},true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f6f6f6'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
    });
</script>
