{include file="public/header"}
	<div id="app" class="wp-ingredient">
		<!--头部-->
		<div class="topmenu fixed w-100">
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80  text-666 size-14">
			<span><a href="/">首页 /</a></span> <span>微片 /</span><span class="text-c01f5e"> 成分管理</span>
		</div>
		<!--内容区-->
		<div class="w-1200 mt-10 mb-10  com-search">
			<div class="keyword w-100">
				<form class="w-100 h-100 layui-form  d-flex align-items-center justify-content-between" action="{:Url('product_ist')}">
					<div class="w-75 h-100  pl-20 d-flex align-items-center justify-content-start">
						<div class="h-100 d-flex align-items-center justify-content-start mr-20">
							<span style="width: 66px;">关键字:</span>
							<input class="ivu-input ivu-input-default w-300px" placeholder="请输入" type="text" name="keyword">
						</div>
						<div class="h-100 d-flex align-items-center justify-content-start">
							<span>成分类型:</span>

							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-8 w-150px">
								<select name="cate_id" >
									<option value="">请选择</option>
									{volist name="cate" id="vo"}
									<option value="{$vo.cate_id}">{$vo.cate_name}</option>
									{/volist}
								</select>
							</div>
						</div>
					</div>
					<div class="w-25 h-100  d-flex align-items-center justify-content-end">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button class="ivu-btn ivu-btn-primary mr-20" lay-submit="search" lay-filter="search">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mb-30">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">成分列表</span>
				<a href="{:Url('create')}" class="ivu-btn ivu-btn-primary mr-20" ><i class="ivu-icon ivu-icon-md-add"></i> 添加新成分</a>
			</div>

			<!--new-->
			<div class="w-100 table ivu-table ">
				<table class=" w-100  ivu-table-default" cellpadding="0" cellspacing="0"  id="list"  lay-filter="list">
					<!--<tbody class="ivu-table-tbody">-->
					<!-- <tr class="ivu-table-header cursor">
						<th class="text-center bg-f6 w-100px">编码<i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-350px bg-f6">成分名称 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-350px bg-f6">英文名称 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-150px bg-f6 text-center">成分类型 <i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="w-350px bg-f6">操作</th>
					</tr> -->
					<script type="text/html" id="act" class="text-center">
						<a class="text-27" href="{:Url('useage')}?id={{d.id}}">
								<i class="icon iconfont iconshiyongqingkuang"></i>
								使用情况
							</a>
							<a class="text-27 ml-10" href="{:Url('edit')}?id={{d.id}}">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="ml-10 text-c01f5e" href="{:Url('delete')}?id={{d.id}}">
								<i class="icon iconfont icondingjia"></i>
								删除
							</a>
					</script>
					<!--</tbody>-->
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
<script>

    //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('list',"{:Url('product_ist')}",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'15%'},
            {field: 'zn_name', title: '成分名称',templet:'#zn_name',align:'center',sort: true,event:'zn_name',width:'27.5%'},
            {field: 'en_name', title: '英文名称',templet:'#en_name',align:'center',sort: true,event:'en_name',width:'27.5%'},
            {field: 'cate_name', title: '成分类型',templet:'#cate_name',align:'center',sort: true,event:'cate_id',width:'10%'},
            {field: 'right', title: '操作',align:'center',toolbar:'#act'},
        ];

        return join;
    })
    //excel下载
    layList.search('export',function(where){
        where.excel = 1;
        location.href=layList.U({c:'store.store_product',a:'product_ist',q:where});
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
    //快速编辑
    layList.edit(function (obj) {
        var id=obj.data.id,value=obj.value;
        switch (obj.field) {
            case 'price':
                action.set_product('price',id,value);
                break;
            case 'stock':
                action.set_product('stock',id,value);
                break;
            case 'sort':
                action.set_product('sort',id,value);
                break;
            case 'ficti':
                action.set_product('ficti',id,value);
                break;
        }
    });
    //上下加产品
    layList.switch('is_show',function (odj,value) {
        if(odj.elem.checked==true){
            layList.baseGet(layList.Url({c:'store.store_product',a:'set_show',p:{is_show:1,id:value}}),function (res) {
                layList.msg(res.msg, function () {
                    layList.reload();
                });
            });
        }else{
            layList.baseGet(layList.Url({c:'store.store_product',a:'set_show',p:{is_show:0,id:value}}),function (res) {
                layList.msg(res.msg, function () {
                    layList.reload();
                });
            });
        }
    });
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
            case 'delstor':
                var url=layList.U({c:'microchip.microchip_ingredient',a:'delete',q:{id:data.id}});
                if(data.is_del) var code = {title:"操作提示",text:"确定恢复产品操作吗？",type:'info',confirm:'是的，恢复该产品'};
                else var code = {title:"操作提示",text:"确定将该产品移入回收站吗？",type:'info',confirm:'是的，移入回收站'};
                $eb.$swal('delete',function(){
                    $eb.axios.get(url).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success',res.data.msg);
                            obj.del();
                            location.reload();
                        }else
                            return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                        $eb.$swal('error',err);
                    });
                },code)
                break;
            // case 'open_image':
            //     $eb.openImage(data.image);
            //     break;
            // case 'edit':
            //     $eb.createModalFrame(data.store_name+'-编辑',layList.U({a:'edit',q:{id:data.id}}),{h:700,w:1100});
            //     break;
            // case 'attr':
            //     $eb.createModalFrame(data.store_name+'-属性',layList.U({a:'attr',q:{id:data.id}}),{h:600,w:800})
            //     break;
        }
    })
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
    //自定义方法
    var action={
        set_product:function(field,id,value){
            layList.baseGet(layList.Url({c:'store.store_product',a:'set_product',q:{field:field,id:id,value:value}}),function (res) {
                layList.msg(res.msg);
            });
        },
        show:function(){
            var ids=layList.getCheckData().getIds('id');
            if(ids.length){
                layList.basePost(layList.Url({c:'store.store_product',a:'product_show'}),{ids:ids},function (res) {
                    layList.msg(res.msg);
                    layList.reload();
                });
            }else{
                layList.msg('请选择要上架的产品');
            }
        }
    };
    //多选事件绑定
    $('.layui-btn-container').find('button').each(function () {
        var type=$(this).data('type');
        $(this).on('click',function(){
            action[type] && action[type]();
        })
    });
</script>