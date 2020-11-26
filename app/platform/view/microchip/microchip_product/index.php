{include file="public/header"}
<title>微片</title>
<div class="h-100 w-100 wp-index" id="app">
		{include file="public/header_navigate"}
		<div class="w-1200 mt-80 mb-10  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">微片 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="{:Url('product_ist')}">

					<div class="w-75 h-100  pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="w-50px">关键字:</span>
								<input class="ivu-input w-300px ml-8" placeholder="请输入" type="text" name="keyword">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span class="w-50px">适应症:</span>
								<div class="ivu-select ml-8  ivu-selqect-single ivu-select-default relative w-150px">
									<select name="cate2">
										<option value="">请选择</option>
										{volist name="cate2" id="c2"}
										<option value="{$c2.id}">{$c2.html}{$c2.title}</option>
										{/volist}
									</select>
								</div>
							</div>

							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span>分类标签:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<select name="cate1">
										<option value="">请选择</option>
										{volist name="cate1" id="c1"}
										<option value="{$c1.id}">{$c1.html}{$c1.title}</option>
										{/volist}
									</select>
								</div>
							</div>
						</div>

						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span>其他标签:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<select name="cate3">
										<option value="">请选择</option>
										{volist name="cate3" id="c3"}
										<option value="{$c3.id}">{$c3.html}{$c3.title}</option>
										{/volist}
									</select>
								</div>
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span>状态:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<select name="is_show">
										<option value="">请选择</option>
										<option value="0">不可用</option>
										<option value="1">可用</option>
									</select>
								</div>
							</div>
						</div>

					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button class="ivu-btn ivu-btn-primary mr-10" lay-submit="search" lay-filter="search">筛选</button>
						<div class="h-100 d-flex align-items-center mr-20 text-c01f5e fw cursor hide">
							展开
							<i class="icon iconfont iconxiangxia2"></i>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">微片列表</span>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table ivu-table-default layui-table" id="list" lay-skin='list'  lay-filter="list">
                        <script type="text/html" id="dose_range">{{d.dose_range}}{{d.unit}}</script>
                         <script type="text/html" id="dose">{{d.dose}}{{d.unit}}</script>
                        <script type="text/html" id="status">{{d.status == 1 ? '可用':'不可用'}}</script>
						<script type="text/html" id="act">
                            <a class="edittext ml-10 text-c01f5e" target="_blank" href="{:Url('details')}?micro_id={{d.micro_id}}">微片详情</a>
							<!-- <a class="edittext text-27" href="{:Url('edit')}?id={{d.id}}">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="edittext text-27 ml-10" href="{:Url('pricing')}?id={{d.id}}">
								<i class="icon iconfont icondingjia"></i>
								定价
							</a> -->
						</script>
				<!-- 	</tbody> -->
				</table>

			</div>

			<!--page 分页-->


		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script>

    //实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"{:Url('product_ist')}",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'10%'},
            {field: 'zn_name', title: '微片名称',templet:'#zn_name',align:'center',event:'zn_name',width:'8%'},
            {field: 'en_name', title: '英文名称',templet:'#en_name',align:'center',event:'en_name',width:'8%'}, //edit:'en_name',
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'center', event:'cate2_name',width:'8%'},
            {field: 'cate1_name', title: '分类',templet:'#cate1_name',align:'center', event:'cate_id',width:'7%'},
            {field: 'cate3_name', title: '其他标签',templet:'#cate3_name',align:'center',event:'cate3_name',width:'8%'},
            {field: 'dose_range', title: '剂量范围',align:'center', event:'dose_max',width:'8%',templet:'#dose_range'},
            {field: 'dose', title: '单次增量',templet:'#dose',align:'center', event:'dose',width:'7%'},
            {field: 'status', title: '状态',templet:'#status',align:'center', event:'status',width:'7%'},
            {field: 'platform_price', title: '平台结算价',templet:'#platform_price',align:'center', event:'platform_price',width:'8%'},
            {field: 'price', title: '建议售价',templet:'#price',align:'center', event:'price',width:'7%'},
            {field: 'sell_price', title: '定价',templet:'#sell_price',align:'center', event:'sell_price',width:'7%',edit:'price'},
            {field: 'right', title: '操作',align:'center',toolbar:'#act'},
        ];
        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f8f8f9'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
        $('tr').css({'border-bottom':'1px solid #e8eaec'});
    });
       //下拉框
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })
    //快速编辑
    layList.edit(function (obj) {
        var id=obj.data.micro_id,value=obj.value;
        switch (obj.field) {
            case 'sell_price':
            console.log(value)
                action.set_price('sell_price',id,value);
                break;
        }
    });
    //自定义方法
    var action={
        set_price:function(field,id,value){
            layList.baseGet(layList.Url({m:'terrace',c:'microchip.microchip_product',a:'set_price',q:{field:field,id:id,value:value}}),function (res) {
                layList.msg(res.msg);
            });
        }
    };
    //排序
    layList.sort(function (obj) {
        var type = obj.type;
        switch (obj.field){
            case 'id':
                layList.reload({order: layList.order(type,'p.id')},true,null,obj);
                break;
            case 'sales':
                layList.reload({order: layList.order(type,'p.sales')},true,null,obj);
                break;
        }
    });
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
    //多选事件绑定
    $('.layui-btn-container').find('button').each(function () {
        var type=$(this).data('type');
        $(this).on('click',function(){
            action[type] && action[type]();
        })
    });
</script>