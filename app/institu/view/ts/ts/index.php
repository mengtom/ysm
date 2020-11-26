{include file="public/header"}
	<title>配方管理</title>

	<div class="h-100 w-100 mi-ts-index" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">参考配方 </span>
		</div>
	    <!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword bg-fff w-100" style="height: auto">
				<form class="layui-form" action="" method="post">
					<div class="w-100 h-100 d-flex align-items-start justify-content-between">
						<div class="w-75 h-100  pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">
							<div class="w-100  d-flex align-items-center justify-content-start">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span class="w-50px">关键字:</span>
									<input class="ivu-input w-300px ml-8" placeholder="请输入" type="text" name="keyword">
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span class="w-50px">适应症:</span>
									<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
										<select name="cate_id">
											<option value="">全部</option>
											{volist name="cate2" id="c2"}
											<option value="{$c2.id}">{$c2.html}{$c2.title}</option>
											{/volist}
										</select>
										<!-- <cascader :data="data" name="erji" v-model="value1"></cascader> -->
									</div>
								</div>
							</div>
						</div>
						<div class="w-25 h-100 d-flex align-items-start justify-content-end mt-20">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="submit" class="ivu-btn ivu-btn-primary mr-20" lay-submit="search" lay-filter="search">筛选</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">参考配方列表</span>
				<div>
					<button type="button" class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaochu"></i>
						Excel导出
					</button>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table ">
				<table class="ivu-table  ivu-table-default" id="list" lay-filter="list">
				</table>
				<script type="text/html" id="act">
					<a class="text-c01f5e" href="{:Url('details')}?id={{d.id}}">查看详情</a>
				</script>
			</div>

			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-end ">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100"/>
			</div>

		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script src="https://cdn.bootcdn.net/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
	var type='<?=$type?>';
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"{:Url('ts_list',['type'=>$type])}",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'left',event:'code',width:'20%'},
            {field: 'name_zn', title: '配方名称',templet:'#zn_name',align:'left',event:'name_zn',width:'20%'},
            {field: 'name_en', title: '英文名称',templet:'#en_name',align:'left',event:'name_en',width:'20%'},
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'left',event:'cate2_name',width:'20%'},
            {field: 'price', title: '每组价格',templet:'#price',align:'left',width:'10%'},
            {field: 'right', title: '操作',align:'left',toolbar:'#act'}
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
    //点击事件绑定
    layList.tool(function (event,data,obj) {

        switch (event) {
            case 'delstor':
                var url=layList.Url({m:'terrace',c:'ts.ts',a:'delete',q:{id:data.id}});
                var code = {title:"操作提示",text:"确定将该配方移入回收站吗？",type:'info',confirm:'是的，移入回收站'};
				layList.layer.confirm('配方删除后，医生的TS配方列表中，将不会再次出现该配方，是否确定删除？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
					axios.get(url).then(function(res){
						console.log(res)
                        if(res.data.code == 200 && res.status == 200) {
                        	layList.msg(res.data.msg,{icon:1});
                            obj.del();
                            location.reload();
                        }else
                           	return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                    	layList.msg(err,{icon:2});
                    });
                });
                break;
        }
    })
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
    //自定义方法
    var action={
        set_ts:function(field,id,value){
            layList.baseGet(layList.Url({c:'ts.ts_ts',a:'set_ts',q:{field:field,id:id,value:value}}),function (res) {
                layList.msg(res.msg);
            });
        },
        show:function(){
            var ids=layList.getCheckData().getIds('id');
            if(ids.length){
                layList.basePost(layList.Url({c:'ts.ts_ts',a:'ts_show'}),{ids:ids},function (res) {
                    layList.msg(res.msg);
                    layList.reload();
                });
            }else{
                layList.msg('请选择要可用的配方');
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