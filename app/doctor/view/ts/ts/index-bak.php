{include file="public/header"}
	<div class="h-100 w-100 ts-index" >
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">TS配方</span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search" id="app">
			<div class="keyword w-100" style="height: auto">
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
										<!--<select name="city" lay-verify="required">
											<option value="">全部</option>
											<option value="0">适应症</option>
										</select>-->
										<cascader :data="data" name="cate2_id" v-model="value1"></cascader>
									</div>
								</div>
							<!-- 	<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span>其它标签:</span>
									<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
										<select name="city" lay-verify="required">
											<option value="">全部</option>
											<option value="0">其它标签</option>
										</select>
										<cascader :data="data" name="erji" v-model="value2"></cascader>
									</div>
								</div> -->
							</div>

							<div class="w-100  d-flex align-items-center justify-content-start mt-20">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span>状态:</span>
									<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
										<select name="is_status" lay-verify="required">
											<option value="">请选择</option>
											<option value="0">不可用</option>
											<option value="1">可用</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="w-25 h-100 d-flex align-items-start justify-content-end mt-20">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="submit" class="ivu-btn ivu-btn-primary mr-10">筛选</button>
							<!--<div class="h-100 d-flex align-items-center mr-20 text-c01f5e fw cursor">-->
							<!--	展开-->
							<!--	<i class="icon iconfont iconxiangxia2"></i>-->
							<!--</div>-->
						</div>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">TS配方列表</span>
				<div>
					<button type="button" class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaoru"></i>
						Excel导入
					</button>
					<button type="button" class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaochu"></i>
						Excel导出
					</button>
					<a href="{:Url('create')}" class="ivu-btn ivu-btn-primary mr-20"><i class="ivu-icon ivu-icon-md-add"></i> 添加新配方</a>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table ">
				<table class="ivu-table  ivu-table-default" id="list" lay-filter="list">

					<!-- <tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="text-center bg-f6 w-100px">编码<i class="icon iconfont iconshaixuan text-bf"></i></th>
						<th class="bg-f6 w-200px">TS配方名称</th>
						<th class="bg-f6 w-200px">英文名称</th>
						<th class="bg-f6 w-100px">适应症</th>
						<th class="bg-f6 w-100px">其他标签</th>
						<th class="bg-f6 w-100px">每组价格￥</th>
						<th class="bg-f6 w-100px">每组价格$</th>
						<th class="bg-f6 w-50px">状态</th>
						<th class="bg-f6 w-150px">操作</th>
					</tr>
					<tr v-for="i in 0" class="cursor text-57">
						<td class="text-center ckitem">000</td>
						<td class="ckitem text-57">微片名称 </i></td>
						<td class="ckitem text-57">英文名称</td>
						<td class="ckitem text-57">适应症适应症</td>
						<td class="ckitem text-57">标签名</td>
						<td class="ckitem text-57">1.25</td>
						<td class="ckitem text-57">0.25</td>
						<td class="ckitem text-57">可用</td>
						<td>
							<a class="edittext text-27" href="edit.html">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="edittext text-c01f5e  ml-10" href="">
								<i class="icon iconfont iconguanbi size-10"></i>
								删除
							</a>
						</td>
					</tr>
					</tbody> -->
				</table>
				<script type="text/html" id="checkboxstatus">
					<input name="id" value="{{d.id}}" type="checkbox" lay-filter="is_status" lay-skin="switch" lay-text="可用|不可用" {{d.is_status == 1 ? 'checked':''}}>
				</script>
				<script type="text/html" id="act">
					<a class="edittext text-27" href="{:Url('edit')}?id={{d.id}}">
						<i class="icon iconfont iconbian-ji"></i>
						编辑
					</a>
					<a class="edittext text-c01f5e ml-10" href="{:Url('delete')}?id={{d.id}}" lay-event='delstor'>
						<i class="icon iconfont iconguanbi size-10"></i>
						删除
					</a>
				</script>
			</div>

		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<!-- <script src="/js/less.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/vue.js"></script>
<script src="/js/iview.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/public.js"></script>
<script src="/plugins/layui/layui.js"></script> -->
<script type="text/javascript">

    var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			value1 : ['jiangsu', 'nanjing', 'fuzimiao'],
			value2 : [],
			data   : [
			{volist name="cate2" id="vo"}
				{
					value   : '{$vo.id}',
					label   : '{$vo.title}',
					{volist name="vo.child" id="v"}
					children: [
						{
							value: '{$v.id}',
							label: '{$v.title}',
						},

					],
					{/volist}
				},
			{/volist}
			],
			checked:false,
			checkList:[],

		},
		methods: {
			model         : function () {
				// this.ismodel = !this.ismodel;
			},
			reverseMessage: function () {
				this.message = this.message.split('').reverse().join('');
			},
			created:function(){
				var _this=this;
				_this.layerInit();
			}
		},
	});


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

</script>
{include file="public/layui_page"}
<script>
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('list',"{:Url('ts_list')}",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'15%'},
            {field: 'name_zn', title: 'TS配方名称',templet:'#zn_name',align:'center',sort: true,event:'name_zn',width:'15%'},
            {field: 'name_en', title: '英文名称',templet:'#en_name',align:'center',sort: true,event:'name_en',width:'15%'}, //edit:'en_name',
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'center', sort: true,event:'cate2_name',width:'15%'},
            {field: 'price', title: '没组价格￥',templet:'#price',align:'center',width:'8%'},
            {field: 'usd', title: '没组价格$',templet:'#usd',align:'center',width:'8%'},
            {field: 'is_status', title: '状态',templet:'#checkboxstatus',align:'center', sort: true,width:'10%'},
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
    layList.switch('is_status',function (odj,value) {

        if(odj.elem.checked==true){
            layList.baseGet("{:Url('set_show',array('is_status'=>1))}&id="+value,function (res) {
                layList.msg(res.msg, function () {
                    layList.reload();
                });
            });
        }else{
            layList.baseGet("{:Url('set_show',array('is_status'=>0))}&id="+value,function (res) {
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
                var url=layList.Url({c:'ts.ts',a:'delete',q:{id:data.id}});
                if(data.is_del) var code = {title:"操作提示",text:"确定恢复产品操作吗？",type:'info',confirm:'是的，恢复该产品'};
                else var code = {title:"操作提示",text:"确定将该配方移入回收站吗？",type:'info',confirm:'是的，移入回收站'};
                $swal('delete',function(){
                    axios.get(url).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $swal('success',res.data.msg);
                            obj.del();
                            location.reload();
                        }else
                            return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                        $swal('error',err);
                    });
                },code)
                break;
            // case 'open_image':
            //     openImage(data.image);
            //     break;
            case 'edit':
                createModalFrame(data.store_name+'-编辑',layList.U({a:'edit',q:{id:data.id}}),{h:700,w:1100});
                break;
            // case 'attr':
            //     createModalFrame(data.store_name+'-属性',layList.U({a:'attr',q:{id:data.id}}),{h:600,w:800})
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