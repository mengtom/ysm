<?php /*a:6:{s:73:"F:\WWW\yeshai\app\admin\view/ysm\microchip\microchip_ingredient\index.php";i:1596097003;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1595304974;s:54:"F:\WWW\yeshai\app\admin\view/ysm\public\layui_page.php";i:1595310927;}*/ ?>
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

	<div id="app" class="wp-ingredient">
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
		<div class="w-1200 mt-80 tip mt-20  text-666 size-14">
			<span><a href="/">首页 /</a></span> <span>微片 /</span><span class="text-c01f5e"> 成分管理</span>
		</div>
		<!--内容区-->
		<div class="w-1200 mt-10 mb-10  com-search">
			<div class="keyword w-100">
				<form class="w-100 h-100 layui-form  d-flex align-items-center justify-content-between" action="<?php echo Url('product_ist'); ?>">
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
									<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($vo['cate_id']); ?>"><?php echo htmlentities($vo['cate_name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
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
				<a href="<?php echo Url('create'); ?>" class="ivu-btn ivu-btn-primary mr-20" ><i class="ivu-icon ivu-icon-md-add"></i> 添加新成分</a>
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
						<a class="text-27" href="<?php echo Url('useage'); ?>?id={{d.id}}">
								<i class="icon iconfont iconshiyongqingkuang"></i>
								使用情况
							</a>
							<a class="text-27 ml-10" href="<?php echo Url('edit'); ?>?id={{d.id}}">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="ml-10 text-c01f5e" href="<?php echo Url('delete'); ?>?id={{d.id}}">
								<i class="icon iconfont icondingjia"></i>
								删除
							</a>
					</script>
					<!--</tbody>-->
				</table>
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

<script>
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableList('list',"<?php echo Url('product_ist'); ?>",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'15%'},
            {field: 'zn_name', title: '成分名称',templet:'#zn_name',align:'center',sort: true,event:'zn_name',width:'27.5%'},
            {field: 'en_name', title: '英文名称',templet:'#en_name',align:'center',sort: true,event:'en_name',width:'27.5%'},
            {field: 'cate_name', title: '成分类型',templet:'#cate_name',align:'center',sort: true,event:'cate_id',width:'10%'},
            {field: 'right', title: '操作',align:'center',toolbar:'#act'},
        ];

        return join;
    },2)
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