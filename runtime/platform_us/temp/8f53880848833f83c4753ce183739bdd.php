<?php /*a:6:{s:72:"F:\WWW\yeshai\app\platform_us\view\microchip\microchip_product\index.php";i:1605866284;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1606294604;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1606302392;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
 <!--    <title>后台-首页</title> -->
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/view.css">
<!--     <link rel="stylesheet" href="/ysm/static/css/pages/menu.css"> -->
    <link rel="stylesheet" href="/ysm/static/css/pages/search.css">
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/modules/layer/default/layer.css">
    <link rel="stylesheet" href="/ysm/static/css/common.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/p-menu.css">
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->

<title>微片查看</title>
<div class="h-100 w-100 wp-index-p-en" id="app">
	<!--头部-->
        <div class="p-topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-between">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/p-logo-en.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start">
                    <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="index.html" class="leftname">Home</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="<?php echo Url('microchip.microchipProduct/index'); ?>" class="leftname">Microtabs</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="<?php echo Url('ts.ts/index'); ?>" class="leftname">Formulation Managment</a>
                            </div>
                        </li>


                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname ">CRM</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.institution/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Cooperation Organization Management
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.crmDoctor/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Independent Doctors Management
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.crmPatient/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Patients Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname">Orders Managment</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.CrmOrder/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Order List
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.CrmOrder/script',array('type'=>1)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Script Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="" class="leftname">Statistics</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname">Setting</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.systemConfig/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    System Setting
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
                                                    Decentralization System
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
                                                    Official Account Binding
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
                                                    Payment Binding
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
                </div>
                <div class="top_right w-250px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27  w-100px ellipsis-1" href=""><?php echo htmlentities($_platform['p_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?></a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">Logout</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>
	<div class="w-1200 mt-80 mb-10  text-666 size-14">
		<a class="text-57">Home /</a> <span class="text-c01f5e">View Microtabs</span>
	</div>
	<!--搜索区-->
	<div class="w-1200 com-search">
		<div class="keyword w-100  h-auto">
			<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="<?php echo Url('product_ist'); ?>">

				<div class="w-auto h-100  pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

					<div class="w-100 d-flex align-items-center justify-content-start flex-wrap">

						<div class="h-100 w-300px mr-30 mb-10">
							<div class="w-100">Key words</div>
							<input class="ivu-input w-100 mt-8" placeholder="Please enter" type="text" name="keyword">
						</div>

						<div class="h-100 w-200px mr-30 mb-10">
							<div class="w-100">Indications</div>
							<div class="ivu-select mt-8  ivu-select-single ivu-select-default relative w-100">
								<select name="cate2">
									<option value="">ALL</option>
									<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c2): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($c2['id']); ?>"><?php echo htmlentities($c2['html']); ?><?php echo htmlentities($c2['en_title']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
						<div class="h-100 w-200px mr-30 mb-10">
							<div class="w-100">Classification tags</div>
							<div class="ivu-select mt-8  ivu-select-single ivu-select-default relative w-100">
								<select name="cate1">
									<option value="">ALL</option>
									<?php if(is_array($cate1) || $cate1 instanceof \think\Collection || $cate1 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c1): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($c1['id']); ?>"><?php echo htmlentities($c1['html']); ?><?php echo htmlentities($c1['en_title']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>

						<div class="h-100 w-200px mr-30 mb-10">
							<div class="w-100 ">Other tags</div>
							<div class="ivu-select mt-8 w-100">
								<select name="cate3">
									<option value="">ALL</option>
									<?php if(is_array($cate3) || $cate3 instanceof \think\Collection || $cate3 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c3): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($c3['id']); ?>"><?php echo htmlentities($c3['html']); ?><?php echo htmlentities($c3['en_title']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
						<div class="h-100 w-200px mr-30 mb-10">
							<div class="w-100 ">Status</div>
							<div class="ivu-select mt-8 w-100">
								<select name="is_show">
									<option value="">ALL</option>
									<option value="0">Unavailable</option>
									<option value="1">Available</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="w-250px h-100 mt-30  d-flex align-items-start justify-content-end ">
					<button type="reset" @click="reset" class="ivu-btn ivu-btn-default mr-20 mt-20">Reset</button>
					<button class="ivu-btn ivu-btn-primary mr-20 mt-20" lay-submit="search" lay-filter="search">Filter</button>
				</div>
			</form>
		</div>
	</div>

	<!--列表-->
	<div class="w-1200 label-list mt-20 mb-30">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">Microtabs List</span>
			</div>
			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table ivu-table-default layui-table" id="list" lay-skin='list'  lay-filter="list">
                    <script type="text/html" id="dose_range">{{d.dose_range}}{{d.unit}}</script>
                     <script type="text/html" id="dose">{{d.dose}}{{d.unit}}</script>
                    <script type="text/html" id="status">{{d.status == 1 ? 'Available':'Unavailable'}}</script>
					<script type="text/html" id="act">
                        <a class="edittext ml-10 text-c01f5e" target="_blank" href="<?php echo Url('details'); ?>?micro_id={{d.micro_id}}">Details</a>
					</script>
				</table>
			</div>
			<!--page 分页-->
		</div>
	</div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/less.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>



<!-- <link href="/static/plug/layui/css/layui.css" rel="stylesheet"> -->
<link href="/system/css/layui-admin.css" rel="stylesheet">
<link href="/system/plugins/layui/css/layui.css" rel="stylesheet">
<script src="/static/plug/layui/layui_en.all.js"></script>
<script src="/system/js/layuiList.js"></script>

<script>
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"<?php echo Url('product_ist'); ?>",function (){
        var join=new Array();
        join=[
            {field: 'code', title: 'No.',templet:'#code',align:'center', sort: true,event:'code',width:'10%'},
            // {field: 'zn_name', title: 'Name',templet:'#zn_name',align:'center',event:'zn_name',width:'8%'},
            {field: 'en_name', title: 'Name',templet:'#en_name',align:'center',event:'en_name',width:'8%'},
            {field: 'cate2_name', title: 'Indications',templet:'#cate2_name',align:'center', event:'cate2_name',width:'9%'},
            {field: 'cate1_name', title: 'Classification',templet:'#cate1_name',align:'center', event:'cate_id',width:'10%'},
            {field: 'cate3_name', title: 'Other tags',templet:'#cate3_name',align:'center',event:'cate3_name',width:'8%'},
            {field: 'dose_range', title: 'Dose range',align:'center', event:'dose_max',width:'10%',templet:'#dose_range'},
            {field: 'dose', title: 'Single increment',templet:'#dose',align:'center', event:'dose',width:'7%'},
            {field: 'status', title: 'Status',templet:'#status',align:'center', event:'status',width:'7%'},
            {field: 'platform_price', title: 'Platform settlement price',templet:'#platform_price',align:'center', event:'platform_price',width:'8%'},
            {field: 'price', title: 'Suggested price',templet:'#price',align:'center', event:'price',width:'8%'},
            {field: 'sell_price', title: 'Pricing',templet:'#sell_price',align:'center', event:'sell_price',width:'7%',edit:'price'},
            {field: 'right', title: 'Function',align:'center',toolbar:'#act'},
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