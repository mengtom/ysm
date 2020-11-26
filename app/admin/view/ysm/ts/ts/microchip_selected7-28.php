{include file="public/header"}
	<title>TS-编辑-添加微片</title>
	<div id="select" class="ts-edit-add bg-fff">

		<div class="center  bg-fff">
			<div class="items ">
				<div class="item w-100 mt-20  h-auto d-flex align-items-start justify-content-start">
					<div class="fw size-14 left-title">已选微片/配方：</div>
					<div class="right-title">
						<div class="w-100 d-flex align-items-start justify-content-start flex-wrap items-list">
						</div>
					</div>
				</div>

				<div class="item w-100 mt-20 tab d-flex align-items-start justify-content-start relative">
					<div data-tab="1" class="size-14 tab1 w-100px h-100 d-flex align-items-center justify-content-center absolute {eq name='type' value='1'}activate{/eq}" style="left: 0;"> <a href="{eq name='type' value='1'}javascript:;{else}{:Url('microchip_selected',['type'=>1])}{/eq}">微片</a></div>
					<div data-tab="2" class="size-14 tab2 w-100px h-100 d-flex align-items-center justify-content-center absolute {eq name='type' value='2'}activate{/eq}" style="left: 105px;"><a href="{eq name='type' value='2'}javascript:;{else}{:Url('microchip_selected',['type'=>2])}{/eq}">配方</a></div>
				</div>
				<div class="relative" style=" border-radius: 2px;  border: solid 1px #d9d9d9;top: -2px;">

					<!--微片-->
					<div class="wp-list w-100" style="overflow-y: auto;height: 350px;{eq name="$type" value="2"}display: none{/eq}">
						<div class="w-100 wp-list-top ">
							<form action="" class="layui-form d-flex align-items-start justify-content-between">
								<div class="h-100">
									<div class="d-flex align-items-center justify-content-start flex-wrap pt-10">
										<div class="w-350px ml-20 mt-10 d-flex align-items-center justify-content-start">

											<span>关键字：</span>
											<input type="text" placeholder="请输入" style="width: 290px;" class="ivu-input ivu-input-small" name="keyword" v-model="keyword">
										</div>
										<div style="width: 210px;" class="ml-20 mt-10  d-flex align-items-center justify-content-start">
											<span>适应症：</span>
											<div class="w-150px">
												<select name="cate2">  <!-- lay-verify="required" -->
													<option value="">请选择</option>
													{volist name="cate2" id="vo2"}
														<option value="{$vo2.id}">{$vo2.title}</option>
													{/volist}
												</select>
											</div>
										</div>
										{neq name="$type" value="2"}
										<div style="margin-top: 14px;width: 226px;" class="ml-20 d-flex align-items-center justify-content-start">
											<span>分类标签：</span>
											<div class="w-150px">
												<select name="cate1">
													<option value="">请选择</option>
													{volist name="cate1" id="vo1"}
														<option value="{$vo1.id}">{$vo1.title}</option>
													{/volist}
												</select>
											</div>
										</div>

										<div style="margin-top: 14px;width: 226px;" class="ml-10 d-flex align-items-center justify-content-start">
											<span>其他标签：</span>
											<div class="w-150px">
												<select name="cate3">
													<option value="">请选择</option>
													{volist name="cate3" id="vo3"}
														<option value="{$vo3.id}">{$vo3.title}</option>
													{/volist}
												</select>
											</div>
										</div>
										{/neq}
										<div style="margin-top: 14px;" class="w-200px d-flex align-items-center justify-content-start">
											<span class="w-50px">状态：</span>
											<select class="w-150px" name="status">
												<option value="">请选择</option>
												<option value="0">不可用</option>
												<option value="1">可用</option>
											</select>
										</div>
									</div>
								</div>
								<div class="h-100 pr-20" style="width: 80px;">
									<button class="ivu-btn mt-20 ivu-btn-primary" lay-submit="search" lay-filter="search">筛选</button>
									<button type="reset" style="margin-top: 7px;width: 60px;" class="ivu-btn ivu-btn-default ivu-btn-small">重置</button>
								</div>
							</form>

						</div>
						<div class="mt-10" style="width: 754px;margin: auto" >
							<!-- <div class="w-100 bg-f6 d-flex align-items-center justify-content-start fw" style="height: 30px;">
								<div class="w-250px pl-10" lay-data="{field:'zn_name', templet: '#zn_name'}"">微片名称</div>
								<div class="w-100px">分类</div>
								<div class="w-150px">适应症</div>
								<div class="w-100px">剂量范围</div>
								<div class="w-100px">价格￥</div>
								<div class="w-100px">价格$</div>
								<div class="w-50px text-center">选择</div>
							</div> -->
							<div class="w-100 bg-f6 d-flex align-items-center justify-content-start fw"  lay-filter="List" id="List"></div>
							<script type="text/html" id="act">
								<div class="w-50px">
									<i class="icon iconfont iconicon-test text-c01f5e cursor" lay-event='items-add'></i>
								</div>
							</script>
							<script type="text/html" id="next">
								<i data-type="1" class="icon iconfont icon2you cursor pfdow" lay-event='pfdow'></i>
								<div class="w-250px pl-10">{{d.name_zn}}</div>
								<div class="w-100 bg-f6 pl-30" style="min-height: 30px;padding: 4px;display:none;">
									<div class="w-100 h-auto d-flex align-items-center justify-content-start flex-wrap pl-30 pr-30">
											<span
													class="mr-8 wplistspan" v-for="i in 10"
													data-id="1" data-kind="1" data-name="name" data-scope="10-1000" data-maxnum="1000" data-unit="mg"
													data-val="1" data-dosage="100" data-dosage1="100" data-rmbprice="20" data-usdprice="3.8" data-type="2"
											>
												<span>{{d.name_zn}}</span>
												<span>{{d.dose}}{{d.unit}}</span>
											</span>
									</div>
								</div>
							</script>
						</div>
					</div>
					<!--配方-->
					<div class="pf-list w-100" style="overflow-y: auto;height: 350px;{neq name='$type' value='2'}display: none{/neq}">
						<div class="w-100 pf-list-top ">
							<form action="" class="layui-form d-flex align-items-start justify-content-between">
								<div class="h-100">
									<div class="d-flex align-items-center justify-content-start flex-wrap pt-10">

										<div class="w-350px ml-20 mt-10 d-flex align-items-center justify-content-start">
											<span>关键字：</span>
											{{ts}}
											<input type="text" placeholder="请输入" style="width: 290px;" class="ivu-input ivu-input-small">
										</div>
										<div style="width: 210px;" class="ml-20 mt-10  d-flex align-items-center justify-content-start">
											<span style="width: 70px;">适应症：</span>
											<select name="cate2" lay-verify="required">
												<option value="">请选择</option>
													{volist name="cate2" id="vo2"}
														<option value="{$vo2.id}">{$vo2.title}</option>
													{/volist}
											</select>
										</div>

										<div style="margin-top: 14px;width: 226px;" class="ml-20 d-flex align-items-center justify-content-start">
											<span style="width: 90px;">其它标签：</span>
											<select name="cate3" lay-verify="required">
												<option value="">请选择</option>
												{volist name="cate3" id="vo3"}
												<option value="{$vo3.id}">{$vo3.title}</option>
												{/volist}
											</select>
										</div>
										<div style="margin-top: 14px;" class="ml-20 w-200px d-flex align-items-center justify-content-start">
											<span class="w-50px">状态：</span>
											<select name="is_status" lay-verify="required">
												<option value="">请选择</option>
												<option value="0">不可用</option>
												<option value="1">可用</option>
											</select>
										</div>
									</div>
								</div>
								<div class="h-100 pr-20" style="width: 80px;">
									<button type="submit" class="ivu-btn mt-20 ivu-btn-primary">筛选</button>
									<button type="reset" style="margin-top: 7px;width: 60px;" class="ivu-btn ivu-btn-default ivu-btn-small">重置</button>
								</div>
							</form>
						</div>
						<div class="mt-10" style="width: 754px;margin: auto">
							<div class="w-100 bg-f6 d-flex align-items-center justify-content-start fw" style="height: 30px;">
								<div class="w-250px pl-10">配方名称</div>
						<!-- 		<div class="w-100px">分类</div> -->
								<div class="w-200px">适应症</div>
								<div class="w-100px">价格￥</div>
								<div class="w-100px">价格$</div>
								<div class="w-50px text-center">选择</div>
							</div>
							<div class="">
								<div v-for="i in ts" class="w-100  d-flex align-items-center justify-content-start flex-column" style="min-height: 38px;border-bottom: 1px solid #f9f9f9;">
									<div class="w-100 d-flex align-items-center justify-content-start" style="height: 38px;">
										<i data-type="1" class="icon iconfont icon2you cursor pfdow"></i>
										<div class="w-250px pl-10">{{i.name_zn}}</div>
									<!-- 	<div class="w-100px ">分类名</div> -->
										<div class="w-200px">适应症适应症</div>
										<div class="w-100px">20</div>
										<div class="w-100px">21</div>
										<div class="w-50px text-center">
											<i :data-name="'配方name'+i" :data-pid="i" class="icon iconfont iconicon-test text-c01f5e cursor pf-items-add"></i>
										</div>
									</div>

									<div class="w-100 bg-f6 pl-30" style="min-height: 30px;padding: 4px;display:none;">
										<div class="w-100 h-auto d-flex align-items-center justify-content-start flex-wrap pl-30 pr-30">
												<span
														class="mr-8 wplistspan" v-for="i in 10"
														data-id="1" data-kind="1" data-name="name" data-scope="10-1000" data-maxnum="1000" data-unit="mg"
														data-val="1" data-dosage="100" data-dosage1="100" data-rmbprice="20" data-usdprice="3.8" data-type="2"
												>
													<span>微片</span>
													<span>1000ug;</span>
												</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-100 d-flex align-items-center justify-content-end mt-20 " style="height: 50px;border-top:1px solid #f9f9f9">
				<button type="button" class="ivu-btn ivu-btn-default mode-close">取消</button>
				<button type="button" class="ivu-btn ivu-btn-primary ml-10 mr-20 item-confirm">确定</button>
			</div>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script type="text/javascript">
	var app = new Vue({
		el     : '#select',
		data   : {
			ismodel: false,
			items  : [],
			m_id:[],
			t_id:[],
			d:[],
			ts:[],
			keyword:'',
		},
		methods: {},
	});
function delwp(){
	$('.items-list').html('');
	app.$data.m_id=[];
	app.$data.items=[];
	app.$data.t_id=[];
}
delwp();
	//删除微片
	$(".items-list").on('click', '.item-del', function () {
		var pid   = $(this).data('pid');
		var type  = $(this).data('type');
		var items = app.$data.items;
		var m_id=app.$data.m_id;
		var m=app.$data.m_id.indexOf(pid);
		var t_id=app.$data.t_id;
		var t=app.$data.t_id.indexOf(pid);
		if(type == 1){
			if( m>= 0){
				app.$data.m_id.splice(m, 1);
			}
		}else{
			if( t >= 0){
				app.$data.t_id.splice(t, 1);
			}
		}
		for (let len = items.length, i = len - 1; i >= 0; i--) {
			if (items[i].pid == pid ) {
				items.splice(i, 1);
			}
		}s
		$(this).parent().remove();
	});

	//配方添加
	$('.pf-items-add').click(function (e) {
		var items      = app.$data.items;
		var name       = $(this).data('name');
		var pid        = $(this).data('pid');
		var wplistspan = $(this).parent().parent().next().children().find('.wplistspan');
		for (var i = 0; i < wplistspan.length; i++) {
			items.push({
				"id"      : wplistspan[i].getAttribute('data-id'),
				"kind"    : wplistspan[i].getAttribute('data-kind'),
				"name"    : wplistspan[i].getAttribute('data-name'),
				"scope"   : wplistspan[i].getAttribute('data-scope'),
				"maxnum"  : wplistspan[i].getAttribute('data-maxnum'),
				"unit"    : wplistspan[i].getAttribute('data-unit'),
				"val"     : wplistspan[i].getAttribute('data-val'),
				"dosage"  : wplistspan[i].getAttribute('data-dosage'),
				"dosage1"  : wplistspan[i].getAttribute('data-dosage1'),
				"rmbprice": wplistspan[i].getAttribute('data-rmbprice'),
				"usdprice": wplistspan[i].getAttribute('data-usdprice'),
				"type"    : wplistspan[i].getAttribute('data-type'),
				"pid"     : pid,
			});
		}
		app.$data.items = items;
		var html        = '' +
			'<span class="d-flex align-items-center justify-content-start item-input">' +
			'<span class="size-12 pl-10 h-100 d-flex align-items-center justify-content-start">' + name + '</span>' +
			'<span class="text-bf ml-10 mr-10 icon iconfont iconguanbi size-10 item-del" data-type="2" data-pid="' + pid + '"></span>' +
			'<input type="hidden">' +
			'</span>';
		$('.items-list').append(html);
		// $(this).remove('.pf-items-add')
	});
	//在iframe子页面中查找父页面元素
	$('.item-confirm').click(function () {

		var list = $('.items-list').find('.item-input');
		var items  = app.$data.items;
		$('.items-list').html();
		app.$data.items=[];
		window.parent.closemode(items);
		// layer.closeAll();
	});
	//取消
	$('.mode-close').click(function () {
		window.parent.closemode([]);
	});


</script>
{include file="public/layui_page"}
<script src="https://cdn.bootcdn.net/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
    var type=<?=$type?>;

    //实例化form
    layList.form.render();
    //加载列表
    var join=new Array();
    switch (parseInt(type)){
        case 1:
        	layList.tableInfo('List',"{:Url('microchip.microchipProduct/product_ist')}",function (){
                join=[
                    {field: 'zn_name', title: '微片名称',align:'center',event:'zn_name',width:'20%',templet:"#zn_name",style:"border-bottom:1px solid rgb(249, 249, 249)"},
                    {field: 'cate1_name', title: '分类',align:'center',width:'15%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
                    {field: 'cate2_name', title: '适应症',align:'center',width:'15%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
                    {field: 'dose_range', title: '剂量范围',align:'center',edit:'ficti',width:'15%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
                    {field: 'price', title: '价格￥',align:'center',edit:'stock',width:'10%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
                    {field: 'usd', title: '价格$',align:'center',edit:'sort',width:'10%',style:"border-bottom:1px solid rgb(249, 249, 249)"},
                    {field: 'right', title: '选择',align:'center',toolbar:'#act',style:"border-bottom:1px solid rgb(249, 249, 249)"},
                ];
                 return join;
			},false,false,false,false,false,function(res,curr,count){
                $('.layui-border-box').css('border','none');
                $('.layui-table-header').css('border','none');
                $('th').css({'background-color': '#f6f6f6'});
                $('th').find('span').css({'color': '#333','font-weight':'bold'});
	        });
            break;
        case 2:
        		console.log(2)

    			var data = {
					keyword : this.keyword,
				};
        		// $.ajax({
        		// 	url:"{:Url('ts_list')}",
        		// 	method:'post',
        		// 	data:data,
        		// 	success:function (json){console.log(json)
        		// 		 app.$data.ts = json.data;
        		// 	}
        		// });
        		axios.post("{:Url('ts_list')}", data).then((e) => {
					this.ts = e.data.data;
					console.log(e.data);
				});

   //          layList.tableInfo('list',"{:Url('ts_list')}",function (){
   //              join=[
   //                  {field: 'left', title: '',align:'left',toolbar:'#next',width:'5%'},
   //                  {field: 'name_zn', title: '配方名称',event:'name_zn',width:'30%',templet:'#name_zn',align:'left'},
   //                  // {field: 'cate', title: '分类',templet:'#image',width:'10%'},
   //                  {field: 'cate2_name', title: '适应症',templet:'#cate2_name',width:'30%',align:'left'},
   //                  {field: 'price', title: '价格￥',width:'15%',align:'left'},
   //                  {field: 'usd', title: '价格$',width:'15%',align:'left'},
   //                  // {field: 'status', title: '状态',templet:"#checkboxstatus",width:'8%'},
   //                  {field: 'right', title: '选择',align:'left',toolbar:'#act'},
   //              ];
   //               return join;
			// },false,false,false,false,false,function(res,curr,count){
   //              $('.layui-border-box').css('border','none');
   //              $('.layui-table-header').css('border','none');
   //              $('th').css({'background-color': '#f6f6f6'});
   //              $('th').find('span').css({'color': '#333','font-weight':'bold'});
   //              app.$data.ts = res.data;
   //              console.log(app.$data.ts)
	  //       });
            break;
    }
    //下拉框
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
            case 'pf-items-add':
				var items      = app.$data.items;
				var name       = $(this).data('name');
				var pid        = $(this).data('pid');

				var wplistspan = $(this).parent().parent().next().children().find('.wplistspan');
				for (var i = 0; i < wplistspan.length; i++) {
					items.push({
						"id"      : wplistspan[i].getAttribute('data-id'),
						"kind"    : wplistspan[i].getAttribute('data-kind'),
						"name"    : wplistspan[i].getAttribute('data-name'),
						"scope"   : wplistspan[i].getAttribute('data-scope'),
						"maxnum"  : wplistspan[i].getAttribute('data-maxnum'),
						"unit"    : wplistspan[i].getAttribute('data-unit'),
						"val"     : wplistspan[i].getAttribute('data-val'),
						"dosage"  : wplistspan[i].getAttribute('data-dosage'),
						"dosage1" : wplistspan[i].getAttribute('data-dosage1'),
						"rmbprice": wplistspan[i].getAttribute('data-rmbprice'),
						"usdprice": wplistspan[i].getAttribute('data-usdprice'),
						"type"    : wplistspan[i].getAttribute('data-type'),
						"pid"     : pid,
					});
				}
				app.$data.items = items;
				var html        = '' +
					'<span class="d-flex align-items-center justify-content-start item-input">' +
					'<span class="size-12 pl-10 h-100 d-flex align-items-center justify-content-start">' + name + '</span>' +
					'<span class="text-bf ml-10 mr-10 icon iconfont iconguanbi size-10 item-del" data-type="2" data-pid="' + data.id + '"></span>' +
					'<input type="hidden">' +
					'</span>';
				$('.items-list').append(html);
				// $(this).remove('.pf-items-add')
                break;
            case 'items-add':
            	var name = data.zn_name;
            	var pid  = data.id;
				var items      = app.$data.items;
				if(app.$data.m_id.indexOf(data.id) >= 0) break;
				// items[data.id]={
				// 	"id"      : data.id,
				// 	"name"    : data.zn_name,
				// 	"cate1"   : data.cate1_name,
				// 	"cate2"   : data.cate2_name,
				// 	"dosage"  : data.dose_range,
				// 	"price"   : data.price,
				// 	"usd"     : data.usd,
				// 	"unit"	  : data.unit,
				// 	"dose_max": data.dose_max,
				// };
				//

				items.push({
					"id"      : data.id,
					"name"    : data.zn_name,
					"scope"   : data.dose_range,
					"maxnum"  : data.dose_max,
					"unit"    : data.unit,
					"val"	  : 1,
					"rmbprice": data.price,
					"usdprice": data.usd,
					"dosage"  : data.dose,
					"dosage1"  : data.dose,
					"pid"     : pid,
				});

				app.$data.m_id.push(data.id);
				app.$data.items = items;
				var html = '<span class="d-flex align-items-center justify-content-start item-input">' +
					'<span class="size-12 pl-10 h-100 d-flex align-items-center justify-content-start">' + data.zn_name + '</span>' +
					'<span class="text-bf ml-10 mr-10 icon iconfont iconguanbi size-10 item-del"  data-type="1" data-pid="' + data.id + '"></span>' +
					'<input type="hidden" name="pid[]" value="' + data.id + '">' +
					'</span>';
				$('.items-list').append(html);
            break;
            case 'pfdow':
            	//配方点击展开
            	console.log(1)
				var type = $(this).data('type');
				if (type == 1) {
					$(this).data('type', 2);
					$(this).removeClass('icon2you');
					$(this).addClass('iconxiangxia2');
					$(this).parent().next().show();
				} else {
					$(this).removeClass('iconxiangxia2');
					$(this).addClass('icon2you');
					$(this).data('type', 1);
					$(this).parent().next().hide();
				}

            break;
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
</script>