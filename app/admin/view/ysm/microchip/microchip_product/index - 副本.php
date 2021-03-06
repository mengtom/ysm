{include file="public/header"}
<title>微片</title>
<div class="h-100 w-100 wp-index" id="app">
		{include file="public/header_navigate"}
		<div class="w-1200 mt-80 mb-10 tip text-666 size-14">
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
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
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
				<div>
					<button class="ivu-btn ivu-btn-default mr-20" name="excel" value='2'>
						<i class="icon iconfont icondaoru"></i>
						Excel导入
					</button>
					<button class="ivu-btn ivu-btn-default mr-20" name="excel" value='1'>
						<i class="icon iconfont icondaochu"></i>
						Excel导出
					</button>
					<a href="{:url('create')}" class="ivu-btn ivu-btn-primary mr-20"><i class="ivu-icon ivu-icon-md-add"></i> 添加新微片</a>
				</div>

			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table ivu-table-default layui-table" id="list" lay-skin='line'  lay-filter="list">

						<script type="text/html" id="is_show">
							<input name="id" value="{{d.id}}" type="checkbox" data="{{d.is_show}}" lay-filter="is_show" lay-skin="switch" lay-text="可用|不可用" {{d.is_show == 1 ? 'checked':''}}>
						</script>
						<script type="text/html" id="act">
							<a class="edittext text-27" href="{:Url('edit')}?id={{d.id}}">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
						<!-- 	<a class="edittext text-27 ml-10" href="{:Url('pricing')}?id={{d.id}}">
								<i class="icon iconfont icondingjia"></i>
								定价
							</a> -->
						</script>
				<!-- 	</tbody> -->
				</table>

			</div>

			<!--page 分页-->


		</div>

		<!--添加新成分-->
		<div style="display: none" class="modal-root weipian-modal">
			<div class="ant-modal-wrap "></div>
			<div class="ant-modal fixed">

				<div class="w-100  top d-flex align-items-center justify-content-start size-16  relative">
					<div data-toggle="1" class="fw modeltitle h-100 title-item text-bf active">微片信息</div>
					<div data-toggle="2" class="fw modeltitle h-100 title-item text-bf ">定价</div>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-57"></i>
					</span>
				</div>
				<!--微片信息-->
				<div class="wp-mode-toggle1 h-100 ">
					<div class="w-100" style="overflow-y: auto;height:calc(100% - 105px);">
						<div class="items  d-flex align-items-center justify-content-start flex-column">
							<div class="item w-100 fw">
								基础信息
							</div>
							<div class="item  w-100 mt-10">
								<div>
							<span>
								分类：XXXXX
							</span>
									<span class="ml-20">
								微片编码：XXXXX
							</span>
								</div>
							</div>
							<div class="item  w-100 mt-10">
								<div>
							<span>
								微片名称：XXXXX
							</span>
									<span class="ml-20">
								Name：XXXXX
							</span>
								</div>
							</div>
							<div class="item  w-100 mt-10">
								<div>
							<span>
								微片学名：XXXXX
							</span>
									<span class="ml-20">
								Scientific name：XXXXX
							</span>
								</div>
							</div>

							<div class="item  w-100 mt-20">
								<div>
							<span>
								微片详细描述：
							</span>
								</div>
								<div class="w-100 " style="height: 66px;word-break:break-all">
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
								</div>
							</div>

							<div class="item  w-100 mt-20">
								<div>
							<span>
								Product description：
							</span>
								</div>
								<div class="w-100 " style="height: 66px;word-break:break-all">
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
								</div>
							</div>

							<div class="item  w-100 mt-20">
								<div>
							<span>
								副作用：
							</span>
								</div>
								<div class="w-100 " style="height: 66px;word-break:break-all">
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
								</div>
							</div>

							<div class="item  w-100 mt-20">
								<div>
							<span>
								Side effects：
							</span>
								</div>
								<div class="w-100 " style="height: 66px;word-break:break-all">
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
								</div>
							</div>

							<div class="item w-100 fw mt-20 mb-20">
								基础价格
							</div>
							<div class="item  w-100 mt-10">
								<span>成本价：</span>
								<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
							</div>
							<div class="item  w-100 mt-10">
								<div>
									<span>基础售价：</span>
									<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
								</div>
							</div>


							<div class="item w-100 fw mt-20 mb-20">
								微片构成
							</div>
							<div class="item w-100 fw">
								活性成分
							</div>

							<div class="w-100">
								<div class="item  w-100 mt-10">
									<span>成分名称：</span>
									<span>XXXXXXXXX</span>
									<span class="ml-10">成分编码：</span>
									<span>XXXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>剂量：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
							</div>


							<div class="w-100">
								<div class="item w-100 fw mt-20">
									辅料
								</div>
								<div class="item  w-100 mt-10">
									<span>成分名称：</span>
									<span>XXXXXXXXX</span>
									<span class="ml-10">成分编码：</span>
									<span>XXXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>剂量：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
								<div class="item  w-100 mt-10">
									<span>成分名称：</span>
									<span>XXXXXXXXX</span>
									<span class="ml-10">成分编码：</span>
									<span>XXXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>剂量：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
							</div>

							<div class="w-100">
								<div class="item w-100 fw mt-20">
									剂量显示
								</div>
								<div class="item  w-100 mt-10">
									<span>计量单位：</span>
									<span>XXXXXXXXX</span>
									<span class="ml-10">单日建议最大摄入量：</span>
									<span>XXXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>剂量范围：</span>
										<span>XXXXXXXXXX</span>
										<span class="ml-10">
											剂量显示/单次增量
										</span>
										<span>XXXXXXXXXX</span>
									</div>
								</div>
								<div class="item  w-100 mt-10">
									<span>成分名称：</span>
									<span>XXXXXXXXX</span>
									<span class="ml-10">成分编码：</span>
									<span>XXXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>剂量：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
							</div>

							<div class="w-100">
								<div class="item w-100 fw mt-20">
									标签选择
								</div>
								<div class="item  w-100 mt-10">
									<span>适应症标签：</span>
									<span>XXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>其他标签：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
							</div>

							<div class="w-100">
								<div class="item w-100 fw mt-20">
									Supplement Facts 展示
								</div>
								<div class="item  w-100 mt-10">
									<span>成分名展示：</span>
									<span>XXXXXXXXX</span>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>%Daily Value：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
								<div class="item  w-100 mt-10">
									<div>
										<span>Amout Per Serving：</span>
										<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
									</div>
								</div>
							</div>


							<div class="w-100">
								<div class="item w-100 fw mt-20">
									参考文献 References
								</div>
								<div class="item  w-100 mt-10">
									1.XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									2.XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									3.XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									4.XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									XXXXXXXXXX
									5.XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
									XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
								</div>
							</div>

							<div class="w-100">
								<div class="item w-100 fw mt-20">
									文件上传
								</div>
								<div class="item  w-100 mt-10">
									<div>缩略图</div>
									<div class="mt-10" style=" width: 104px;  height: 104px;  border-radius: 2px;  border: solid 1px #d9d9d9;">
										<img class="w-100 h-100" src="https://www.baidu.com/img/dong_ff40776fbaec10db0dd452d55c7fe6d7.gif" alt="">
									</div>
								</div>
							</div>

							<div class="w-100 mb-20">
								<div class="item w-100 fw mt-20">
									文件
								</div>
								<div class="item  w-100 mt-10">
									<div class="mt-8 size-14"><i class="icon iconfont iconguanbi size-14"></i>文件111.jpg</div>
									<div class="mt-8 size-14"><i class="icon iconfont iconguanbi size-14"></i>文件111.jpg</div>
								</div>
							</div>
						</div>
					</div>

					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button class="ivu-btn ivu-btn-default closemode">关闭</button>
						<a class="ivu-btn ivu-btn-primary ml-20" href="/view/wp/edit.html">编辑信息</a>
					</div>
				</div>

				<!--定价-->
				<div class="wp-mode-toggle2  h-100" style="display: none">
					<div style="overflow-y: auto" class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item  w-100 mt-10">
							<div>
								<span>
									微片名称：XXXXX
								</span>
							</div>
						</div>
						<div class="item  w-100 mt-10 mb-10">
							<div>
								<span>
									Name：XXXXX
								</span>
							</div>
						</div>
						<div class="item w-100 fw mt-20">
							基础价格
						</div>
						<div class="item  w-100 mt-10">
							<div>
								成本价：
								<span>$ 0.0XXXX</span>
								<span class="ml-20">$ 0.0XXXX</span>
							</div>
						</div>
						<div class="item  w-100 mt-10">
							<div>
								基础售价：
								<span>$ 0.0XXXX</span>
								<span class="ml-20">$ 0.0XXXX</span>
							</div>
						</div>
						<div class="item  w-100 mt-10">
							<div>
							<span>
								微片学名：XXXXX
							</span>
								<span class="ml-20">
								Scientific name：XXXXX
							</span>
							</div>
						</div>


						<div class="item w-100 fw mt-20 text-000">
							合作平台价格
						</div>
						<div class="item  w-100 mt-20">
							<div class="w-100 ">
								<span>平台名称：</span>
								<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
							</div>
							<div class="w-100 mt-10">
								<span>金额：</span>
								<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
							</div>
						</div>

						<div class="item  w-100 mt-20">
							<div class="w-100 ">
								<span>平台名称：</span>
								<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
							</div>
							<div class="w-100 mt-10">
								<span>金额：</span>
								<span>XXXXXXXXXXXXXXXXXXXXXXXX</span>
							</div>
						</div>

					</div>

					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button class="ivu-btn ivu-btn-default closemode">关闭</button>
						<a class="ivu-btn ivu-btn-primary ml-20" href="pricing.html">编辑定价</a>
					</div>
				</div>
			</div>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script type="text/javascript">
	// var heght = window.innerHeight;
	// var app   = new Vue({
	// 	el     : '#app',
	// 	data   : {
	// 		message: 'Hello Vue.js!',
	// 		ismodel: false,
	// 		cf     : '',
	// 	},
	// 	methods: {
	// 		model         : function () {
	// 			// this.ismodel = !this.ismodel;
	// 		},
	// 		reverseMessage: function () {
	// 			this.message = this.message.split('').reverse().join('');
	// 		},
	// 	},
	// });


	function btn() {
		layer.open({
			type     : 2 //此处以iframe举例
			, title  : '当你选择该窗体时，即会在最顶端'
			, area   : ['700px', heght + 'px']
			, offset : 'rt'
			, shade  : 0.6
			, maxmin : false
			, content: '//layer.layui.com/test/settop.html',
		});
	}

	$('.modeltitle').click(function (e) {
		var toggle = e.target.dataset.toggle;
		if (toggle == 2) {
			$(this).addClass('active');
			$(this).prev().removeClass('active');
			$('.wp-mode-toggle1').hide();
			$('.wp-mode-toggle2').show();
		} else {
			$(this).addClass('active');
			$(this).next().removeClass('active');
			$('.wp-mode-toggle2').hide();
			$('.wp-mode-toggle1').show();
		}
	});

	$('.ckitem').click(function (e) {
		$('.modal-root').show();
	});
	$('.closemode').click(function (e) {
		$('.modal-root').hide();
	});


</script>
{include file="public/layui_page"}
<script>

    //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('list',"{:Url('product_ist')}",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'10%'},
            {field: 'zn_name', title: '微片名称',templet:'#zn_name',align:'center',sort: true,event:'zn_name',width:'12%'},
            {field: 'en_name', title: '英文名称',templet:'#en_name',align:'center',sort: true,event:'en_name',width:'12%'}, //edit:'en_name',
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'center', sort: true,event:'cate2_name',width:'10%'},
            {field: 'cate1_name', title: '分类',templet:'#cate1_name',align:'center', sort: true,event:'cate_id',width:'7%'},
            {field: 'cate3_name', title: '其他标签',templet:'#cate3_name',align:'center',sort: true,event:'cate3_name',width:'10%'},
            {field: 'dose_range', title: '剂量范围',templet:'#dose_range',align:'center', sort: true,event:'dose_max',width:'10%'},
            {field: 'dose', title: '单次增量',templet:'#dose',align:'center', sort: true,event:'dose',width:'9%'},
            {field: 'is_show', title: '状态',templet:'#is_show',align:'center', sort: true,event:'is_show',width:'9%'},
            {field: 'right', title: '操作',align:'center',toolbar:'#act'},
        ];

        return join;
    })
    //excel下载
    layList.search('export',function(where){
        where.excel = 1;
        location.href=layList.U({c:'microchip.microchip_product',a:'product_ist',q:where});
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
            layList.baseGet("{:Url('set_show',array('is_show'=>1))}&id="+value,function (res) {
                layList.msg(res.msg, function () {
                    layList.reload();
                });
            });
        }else{
            layList.baseGet("{:Url('set_show',array('is_show'=>0))}&id="+value,function (res) {
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