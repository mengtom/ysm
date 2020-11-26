<?php /*a:6:{s:61:"F:\WWW\yeshai\app\admin\view/ysm\crm\crm_platform\wpindex.php";i:1603855603;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1603854727;s:54:"F:\WWW\yeshai\app\admin\view/ysm\public\layui_page.php";i:1603854936;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
 <!--    <title>后台-首页</title> -->
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/view.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/menu.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/search.css">
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/common.css">
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->

<title>CMR-列表</title>
	<div class="h-100 w-100 cmr-wpindex" id="app">
		<!--头部-->
		<!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start w-75 ">
                    <div class="top-logo d-flex align-items-center justify-content-center h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/zimg-logo.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item "><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li class="ivu-menu-submenu <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                    <div class="ivu-menu-submenu-title">
                                        <?php if(isset($menu['child']) && count($menu['child']) > 0){ ?>
                                            <span href="#"><?php echo htmlentities($menu['menu_name']); ?> <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                        <?php }else{ ?>
                                            <a href="<?php echo htmlentities($menu['url']); ?>"><?php echo htmlentities($menu['menu_name']); ?></a>
                                        <?php } ?>

                                    </div>
                                    <div class="ivu-select-dropdown bg-c01f5e">
                                        <ul class="ivu-menu-drop-list">
                                            <li class="ivu-menu-item-group ">
                                                <ul>
                                                    <?php if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                                                    <li class="ivu-menu-item ">
                                                        <a href="<?php echo htmlentities($child['url']); ?>" class="w-100 h-100 text-fff"> <?php echo htmlentities($child['menu_name']); ?></a>
                                                    </li>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="top_right w-25 h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-50 text-right">
                        <a class="text-27" href=""><?php echo htmlentities($_admin['real_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '管理员'; ?></a>
                        <a class="text-c01f5e" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>

		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <a href="index.html" class="text-57">平台管理 </a> <span class="text-c01f5e">/ 选择可用微片 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="w-50px">关键字:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text" name="keyword">
							</div>
							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span class="w-50px">适应症:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select name="cate2">
										<option value="">请选择</option>
										<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($v2['id']); ?>"><?php echo htmlentities($v2['title']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span style="width: 70px;">分类标签:</span>
								<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
									<select name="cate1">
										<option value="">请选择</option>
										<?php if(is_array($cate1) || $cate1 instanceof \think\Collection || $cate1 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($v1['id']); ?>"><?php echo htmlentities($v1['title']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>

						</div>
						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 70px;">其它标签:</span>
							<div class="ivu-select ivu-select-single ivu-select-default relative w-150px">
								<select name="cate3">
									<option value="">请选择</option>
									<?php if(is_array($cate3) || $cate3 instanceof \think\Collection || $cate3 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($v3['id']); ?>"><?php echo htmlentities($v3['title']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="submit" class="ivu-btn ivu-btn-primary mr-10" lay-filter="search" lay-submit="search">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<div class="w-1200 bg-f8e8ee pl-20 mt-10 text-c01f5e wptip relative">
			微片被勾选后方可在平台的后台进行展示
			<i class="icon iconfont iconcha text-c01f5e cursor tipclose absolute"></i>
		</div>
		<!--列表-->
		<div class="w-1200 label-list mt-10 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">平台微片选择</span> <span class="size-14">（<?php echo htmlentities($platform['p_name']); ?>）</span> </span>
				<div>
					<button class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaochu"></i>
						导出Excel
					</button>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table ">
				<form action="" class="">
					<table class="ivu-table  ivu-table-default" style="overflow: initial" id="list" lay-filter='list'></table>
					<!-- <script type="text/html" id="platform_price" lay-filter="platform_price">
						<input type="number" name="platform_price[{{d.id}}]" value="{{d.platform_price}}" style="width:100%" min="0">
					</script> -->
					<script type="text/html" id="checkboxstatus">
						{{d.is_show == 1 ? '可用':'不可用'}}
						<!-- <input name="id" value="{{d.id}}" type="checkbox" lay-filter="is_status" lay-skin="switch" lay-text="可用|不可用" {{d.is_status == 1 ? 'checked':''}}> -->
					</script>
					<script type="text/html" id="price">
						<?php if($platform['currency'] == 1): ?> {{d.cost_rmb}}<?php else: ?>  {{d.cost_usd}}<?php endif; ?>
					</script>
					<script type="text/html" id="sell_price">
						<?php if($platform['currency'] == 1): ?> {{d.price}}<?php else: ?>  {{d.usd}}<?php endif; ?>
					</script>
					<script type="text/html" id="status" >

						<input  v-if="d.status ==0" type='checkbox' lay-skin='primary' lay-filter='checkboxIsSelected' {{ d.status == 1 ? 'checked' : '' }} class='checkboxIsSelected' value=' {{ d.status == 1 ? d.id.1 : d.id.0 }}'>

					</script>
				</form>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between ">
				<div class="conrelTable">
					<button type="button" class="ivu-btn ivu-btn-primary ml-30" data-type="save_micro">保存</button>
					<a href="index.html" type="button" class="ivu-btn ivu-btn-default ml-20">取消</a>
				</div>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100" />

			</div>

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
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/js/layuiList.js"></script>

<script type="text/javascript">
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('list',"<?php echo Url('platform_microList',array('id'=>$platform['id'])); ?>",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'8%'},
            {field: 'zn_name', title: '微片名称',templet:'#zn_name',align:'center',event:'zn_name',width:'9%'},
            {field: 'en_name', title: '英文名称',templet:'#en_name',align:'center',event:'en_name',width:'8%'}, //edit:'en_name',
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'center', event:'cate2_name',width:'8%'},
            {field: 'cate1_name', title: '分类',templet:'#cate1_name',align:'center', event:'cate_id',width:'7%'},
            {field: 'cate3_name', title: '其他标签',templet:'#cate3_name',align:'center',event:'cate3_name',width:'8%'},
            {field: 'dose_range', title: '剂量范围',templet:'#dose_range',align:'center', event:'dose_max',width:'7%'},
            {field: 'dose', title: '单次增量',templet:'#dose',align:'center', event:'dose',width:'7%'},
            {field: 'currency', title: '结算货币',templet:'#currency',align:'center', event:'currency',width:'6%'},
            {field: 'cost_rmb', title: '成本价',templet:'#price',align:'center', event:'price',width:'6%'},
            {field: 'price', title: '建议售价',templet:'#sell_price',align:'center', event:'sell_price',width:'6%'},
            {field: 'platform_price', title: '平台结算价',templet:'#platform_price',edit:'platform_price',align:'center',width:'7%'},
			{field: 'is_status', title: '状态',templet:'#checkboxstatus',align:'center', width:'9%'},
            {type:'checkbox',filed:'select',templet:'#status'},
        ];
        return join;
    })

    //excel下载
    layList.search('export',function(where){
        where.excel = 1;
        where.id=<?php echo htmlentities($platform['id']); ?>;
        location.href=layList.U({m:'admin',c:'crm.CrmPlatform',a:'platform_microList',q:where});
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
        var id=obj.data.id,value=obj.value,pid=<?php echo htmlentities($platform['id']); ?>;
        switch (obj.field) {
            case 'platform_price':
	            var ids=layList.getCheckData().getIds('id');
	        	if(ids.indexOf(id) < 0){
	        		layList.msg("请先选择微片保存后在编辑");
	        		 break;
	        	}
                action.set_product(id,value,pid);
                break;
        }
    });

    //排序
    layList.sort(function (obj) {
        var type = obj.type;
        switch (obj.field){
            case 'code':
                layList.reload({order: layList.order(type,'m.code')},true,null,obj);
                break;
        }
    });
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
    //自定义方法
    var action={
        set_product:function(id,value,pid){
            layList.baseGet(layList.Url({m:'admin',c:'crm.crm_platform',a:'edit_platform_price',q:{id:id,value:value,pid:pid}}),function (res) {
                layList.msg(res.msg);
                layList.reload();
            });
        },
        save_micro:function(){
            var ids=layList.table.cache.ids.getIds('id');
            var sids=layList.getCheckData().getIds('id');
            for(var i=0;i< ids.length;i++){
            	var index=sids.indexOf(ids[i]);
            	if(index > -1){
            		ids[i]={status:1,id:ids[i]};
            	}else{
            		ids[i]={status:0,id:ids[i]};
            	}
            }
        	var pid=<?php echo htmlentities($platform['id']); ?>;
            layList.basePost(layList.Url({m:'admin',c:'crm.crm_platform',a:'select_show'}),{ids:ids,pid:pid},function (res) {
                layList.msg(res.msg);
                layList.reload();
            });
            // }else{
            //     layList.msg('请选择要上架的产品');
            // }
        }
    };
    //多选事件绑定
    $('.conrelTable').find('button').each(function () {
        var type=$(this).data('type');
        $(this).on('click',function(){
            action[type] && action[type]();
        })
    });
	$('.tipclose').click(function (e) {
		$(this).parent().remove();
	})

	// $('.checked-items').click(function (e) {
	// 	var checked = $(this).prop('checked');
	// 	if (checked == true) {
	// 		//把所有复选框选中
	// 		$(".ivu-table td :checkbox").prop("checked", true);
	// 		$(".bg-item").each(function (item, k) {
	// 			$(this).addClass('bg-f8e8ee');
	// 		});
	// 	} else {
	// 		$(".ivu-table td :checkbox").prop("checked", false);
	// 		$(".bg-item").each(function (item, k) {
	// 			$(this).removeClass('bg-f8e8ee');
	// 		});
	// 	}


	// });

	// //点击单个多选框
	// $('.checked-item').click(function (e) {
	// 	var checked = $(this).prop('checked');
	// 	if (checked == true) {
	// 		$(this).parent().parent().addClass('bg-f8e8ee');
	// 	} else {
	// 		$(this).parent().parent().removeClass('bg-f8e8ee');
	// 	}
	// });



</script>
