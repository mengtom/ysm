{include file="public/header"}
	<title>设置</title>
	<div class="h-100 w-100 crm-setting-p" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 text-666 size-14">
			<a class="text-57">首页 /</a> <a class="text-57" href="index.html">合作机构管理 /</a> <span class="text-c01f5e">合作机构设置 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200">
			<div class="keyword bg-fff w-100 h-auto d-flex align-items-center justify-content-between" style="height: 62px;line-height: 62px;">
				<div class="h-100 pl-20 d-flex align-items-center justify-content-start">
					<div class="w-100 d-flex align-items-center justify-content-start fw size-16">
						<span>初始佣金比例：{$scale.commission}%</span>
						<span class="ml-30">初始拿货折扣：{$scale.discount}折</span>
					</div>
				</div>
				<button type="button" class="ivu-btn ivu-btn-primary mr-20 redact1">编辑</button>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16 fw ml-20">合作机构分组列表</span>
				<div>
					<button type="button" class="ivu-btn ivu-btn-primary mr-20 grou"><i class="ivu-icon ivu-icon-md-add"></i> 添加新分组</button>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table ivu-table-default" style="overflow: initial" id="List" lay-filter="List">

				</table>
				<script type="text/html" id="act">
					<a data-a="1" data-b="1" class="edittext text-27 redact" lay-event="redact">
						<i class="icon iconfont iconbian-ji"></i>
						编辑
					</a>
					<a class="edittext text-c01f5e ml-10 delstor" href="javascript:void(0)" lay-event="delstor">
						<i class="icon iconfont iconguanbi size-12"></i>
						删除
					</a>
				</script>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between">
				<a href="index.html" class="ivu-btn-default ivu-btn ml-20">返回</a>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100" />
			</div>

		</div>

		<!--添加新分组-->
		<div style="display: none" class="modal-root label-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 410px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">添加新分组</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="{:Url('save_group')}" method="post">
					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column">
							<div class="w-100">分组名称<span class="text-ff4d4f">*</span></div>
							<input type="text" value="" name="name" placeholder="请输入" class="ivu-input ivu-input-default mt-8">
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column mt-20">
							<div class="w-100">返佣比例<span class="text-ff4d4f">*</span></div>
							<input type="text" value="" name="commission" placeholder="请输入" class="ivu-input ivu-input-default mt-8">
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column mt-20">
							<div class="w-100">拿货折扣<span class="text-ff4d4f">*</span></div>
							<input type="text" value="" name="discount" placeholder="请输入" class="ivu-input ivu-input-default mt-8">
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">确定</button>
					</div>
				</form>
			</div>
		</div>

		<!-- 编辑 -->
		<div style="display: none" class="modal-root edit-modal edit-modal2">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 332px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">编辑</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="{:Url('setting')}" method="post">
					<div class="items  d-flex align-items-center justify-content-start flex-column   ">
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column">
							<div class="w-100">初始佣金比例<span class="text-ff4d4f">*</span></div>
							<input type="text" name="commission" min="0" max="100" value="{$scale.commission}" placeholder="请输入" class="ivu-input ivu-input-default mt-8">
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column mt-20">
							<div class="w-100">初始拿货折扣<span class="text-ff4d4f">*</span></div>
							<input type="text" name="discount" min="0" max="10" value="{$scale.discount}" placeholder="请输入" class="ivu-input ivu-input-default mt-8">
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">确定</button>
					</div>
				</form>
			</div>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
<script type="text/javascript">
	//实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('List',"{:Url('groupList')}",function (){
        var join=new Array();
        join=[
            {field: 'name', title: '分组名称',templet:'#name',align:'left',event:'name',width:'25%'},
            {field: 'commission', title: '返佣比例',templet:'#commission',align:'left',event:'commission',width:'25%'},
            {field: 'discount', title: '拿货折扣',templet:'#discount',align:'left',event:'discount',width:'20%'}, //edit:'en_name',
            {field: 'num', title: '数量',templet:'#num',align:'left', event:'num',width:'20%'},
            {field: 'right', title: '操作',align:'left',toolbar:'#act'},
        ];
        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f8f8f9'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
        $('tr').css({'border-bottom':'1px solid #e8eaec'});
    });
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
        	case 'redact':
        		var url=layList.U({m:'terrace',c:'crm.Institution',a:'edit_group',q:{id:data.id}});
        		layList.createModalFrame('分组编辑',url);
        	break;
        	case 'delstor':
                var url=layList.Url({m:'terrace',c:'crm.Institution',a:'delete_group',q:{id:data.id}});
				layList.layer.confirm('分组删除后，将不会再次出现该分组，是否确定删除？', {
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
    // //快速编辑
    // layList.edit(function (obj) {
    //     var id=obj.data.micro_id,value=obj.value;
    //     switch (obj.field) {
    //         case 'price':
    //         console.log(value)
    //             action.set_price('price',id,value);
    //             break;
    //     }
    // });
    // //自定义方法
    // var action={
    //     set_price:function(field,id,value){
    //         layList.baseGet(layList.Url({m:'terrace',c:'microchip.microchip_product',a:'set_price',q:{field:field,id:id,value:value}}),function (res) {
    //             layList.msg(res.msg);
    //         });
    //     }
    // };

	// 分组
	$('.grou').click(function () {
		$('.label-modal').show();
	});
	//充值弹窗
	$('.closemode').click(function () {
		$('.modal-root').hide();
	});
	//编辑

	$('.redact1').click(function () {

		$('.edit-modal2').show();
	});
</script>
