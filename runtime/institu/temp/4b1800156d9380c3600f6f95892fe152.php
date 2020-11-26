<?php /*a:6:{s:68:"F:\WWW\yeshai\app\institu\view\microchip\microchip_product\index.php";i:1603959542;s:48:"F:\WWW\yeshai\app\institu\view\public\header.php";i:1597219200;s:57:"F:\WWW\yeshai\app\institu\view\public\header_navigate.php";i:1603187334;s:48:"F:\WWW\yeshai\app\institu\view\public\footer.php";i:1592563283;s:54:"F:\WWW\yeshai\app\institu\view\public\inner_footer.php";i:1597309734;s:52:"F:\WWW\yeshai\app\institu\view\public\layui_page.php";i:1595310927;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>医疗机构后台-首页</title>
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/mi.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/mi-menu.css">
    <link rel="stylesheet" href="/ysm/static/css/mi-common.css">
</head>
<body class="bg-f2f3f5">

<!-- <script>
 $eb = parent._mpApi;
</script> -->
<title>微片</title>
<div class="h-100 w-100 wp-index" id="app">
		<!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100">
                        <img src="/ysm/static/images/mi/logo-2.png" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item <?php if($controller == 'Index'): ?>ivu-menu-item-active <?php endif; ?>"><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if(isset($menu['child']) && count($menu['child'])  >0){ ?>
                                    <li class="ivu-menu-submenu <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                        <div class="ivu-menu-submenu-title ">
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
                                <?php }else{ ?>
                                     <li class="ivu-menu-item <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                        <a href="<?php echo htmlentities($menu['url']); ?>">
                                            <?php echo htmlentities($menu['menu_name']); ?>
                                        </a>
                                    </li>


                                <?php } ?>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="top_right w-200px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="w-75 text-right d-flex align-items-center justify-content-start">
                        <a class="text-27 w-100px ellipsis-1" href="" title="<?php echo htmlentities($_institu['i_name']); ?>(<?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?>)"><?php echo htmlentities($_institu['i_name']); ?>(<?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?>)</a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg w-50px">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>


                 <!--    <div class="top-nav  h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">

                            <li class="ivu-menu-item ivu-menu-item-active ">
                                <a href="/mi/index.html">首页</a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/wp/index.html">
                                    微片查看
                                </a>
                            </li>
                            <li class="ivu-menu-submenu ">
                                <div class="ivu-menu-submenu-title">
                                    <span href="/mi/ts/index.html">配方查看<i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                </div>
                                <div class="ivu-select-dropdown bg-c01f5e">
                                    <ul class="ivu-menu-drop-list">
                                        <li class="ivu-menu-item-group ">
                                            <ul>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/ts/index.html" class="w-100 h-100 text-fff"> 配方查看</a>
                                                </li>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/wp/ingredient.html" class="w-100 h-100 text-fff"> 成分管理</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/ts/index.html">
                                    医生管理
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/patient/index.html">
                                    患者管理
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/recipe/index.html">
                                    处方查看
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/order/order.html">
                                    订单查看
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="">
                                    佣金管理
                                </a>
                            </li>
                            <li class="ivu-menu-submenu ">
                                <div class="ivu-menu-submenu-title">
                                    <span href="">设置<i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                </div>
                                <div class="ivu-select-dropdown bg-c01f5e" >
                                    <ul class="ivu-menu-drop-list">
                                        <li class="ivu-menu-item-group ">
                                            <ul>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/setting/basics.html" class="w-100 h-100 text-fff">系统设置</a>
                                                </li>
                                                <li class="ivu-menu-item ">
                                                    <a href="" class="w-100 h-100 text-fff">分权系统</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="top_right h-100 d-flex align-items-center justify-content-end cursor w-200px">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27" href="">用户名称..</a>
                        <a class="text-c01f5e ml-10" href="">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div> -->
		<div class="w-1200 mt-80 mb-10 tip text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">微片查看 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto bg-fff">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="<?php echo Url('product_ist'); ?>">

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
										<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c2): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($c2['id']); ?>"><?php echo htmlentities($c2['html']); ?><?php echo htmlentities($c2['title']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<!-- <cascader :data="data2" name="cate2" v-model="cate2"></cascader> -->
								</div>
							</div>

							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span>分类标签:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<select name="cate1">
										<option value="">请选择</option>
										<?php if(is_array($cate1) || $cate1 instanceof \think\Collection || $cate1 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c1): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($c1['id']); ?>"><?php echo htmlentities($c1['html']); ?><?php echo htmlentities($c1['title']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<!-- <cascader :data="data1" name="cate1" v-model="cate1"></cascader> -->
								</div>
							</div>
						</div>

						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span>其他标签:</span>
								<div class="ivu-select ml-8  ivu-select-single ivu-select-default relative w-150px">
									<select name="cate3">
										<option value="">请选择</option>
										<?php if(is_array($cate3) || $cate3 instanceof \think\Collection || $cate3 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c3): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($c3['id']); ?>"><?php echo htmlentities($c3['html']); ?><?php echo htmlentities($c3['title']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
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
		<div class="w-1200 label-list bg-fff mt-20 mb-30">
			<div class="w-100 list-title d-flex align-items-center justify-content-between">
				<span class="size-16 fw ml-20">微片列表</span>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table ivu-table-default" id="list" lay-skin='list'  lay-filter="list">
                        <script type="text/html" id="dose_range">{{d.dose_range}}{{d.unit}}</script>
                        <script type="text/html" id="dose">{{d.dose}}{{d.unit}}</script>
                        <script type="text/html" id="status">{{d.status == 1 ? '可用':'不可用'}}</script>
                        <script type="text/html" id="price">{{d.sell_price}}</script>
						<script type="text/html" id="act">
                            <a class="edittext ml-10 text-c01f5e" target="_blank" href="<?php echo Url('details'); ?>?micro_id={{d.micro_id}}">微片详情</a>
							<!-- <a class="edittext text-27" href="<?php echo Url('edit'); ?>?id={{d.id}}">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="edittext text-27 ml-10" href="<?php echo Url('pricing'); ?>?id={{d.id}}">
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
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
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
    layList.tableInfo('list',"<?php echo Url('product_ist'); ?>",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'center', sort: true,event:'code',width:'10%'},
            {field: 'zn_name', title: '微片名称',templet:'#zn_name',align:'center',event:'zn_name',width:'8%'},
            {field: 'en_name', title: '英文名称',templet:'#en_name',align:'center',event:'en_name',width:'10%'}, //edit:'en_name',
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'center', event:'cate2_name',width:'12%'},
            {field: 'cate1_name', title: '分类',templet:'#cate1_name',align:'center', event:'cate_id',width:'8%'},
            {field: 'cate3_name', title: '其他标签',templet:'#cate3_name',align:'center',event:'cate3_name',width:'10%'},
            {field: 'dose_range', title: '剂量范围',align:'center', event:'dose_max',width:'12%',templet:'#dose_range'},
            {field: 'dose', title: '单次增量',templet:'#dose',align:'center', event:'dose',width:'8%'},
            {field: 'status', title: '状态',templet:'#status',align:'center', event:'status',width:'6%'},
            {field: 'price', title: '售价',templet:'#price',align:'center', event:'price',width:'8%'},
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