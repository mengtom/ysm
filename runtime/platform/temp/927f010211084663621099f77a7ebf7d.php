<?php /*a:5:{s:63:"F:\WWW\yeshai\app\platform\view\setting\system_config\index.php";i:1602499545;s:49:"F:\WWW\yeshai\app\platform\view\public\header.php";i:1596013767;s:58:"F:\WWW\yeshai\app\platform\view\public\header_navigate.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\footer.php";i:1592563283;s:55:"F:\WWW\yeshai\app\platform\view\public\inner_footer.php";i:1595304974;}*/ ?>
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
    <link rel="stylesheet" href="/ysm/static/css/pages/p-menu.css">
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->

<?php if($tab_id == 4): ?>
 <!--   <link href="/system/frame//css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/system//css/layui-admin.css" rel="stylesheet">
    <link href="/system/frame//css/style.min.css?v=3.0.0" rel="stylesheet">
   <link href="/system/frame/css/font-awesome.min.css?v=4.3.0" rel="stylesheet"> -->
     <script src="/static/plug/vue/dist/vue.min.js"></script>
 <!--    <link href="/static/plug/iview/dist/styles/iview.css" rel="stylesheet"> -->
    <script src="/static/plug/iview/dist/iview.min.js"></script>
<!--     <script src="/static/plug/jquery/jquery.min.js"></script>
    <script src="/static/plug/form-create/province_city.js"></script> -->
    <script src="/static/plug/form-create/form-create.min.js"></script>
<!--     <link href="/static/plug/layui/css/layui.css" rel="stylesheet">
    <script src="/static/plug/layui/layui.all.js"></script> -->
   	<?php endif; ?>
	<title>系统设置</title>
	<div class="h-100 w-100 setting-deal" id="app">
		<!--头部-->
		<!--头部-->
        <div class="p-topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-between w-auto">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/p-logo.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item fw"><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li class="ivu-menu-submenu fw <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                    <div class="ivu-menu-submenu-title fw">
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
                <div class="top_right w-250px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27" href=""><?php echo htmlentities($_platform['p_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?></a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">系统设置 </span>
		</div>
		<div style="height: 34px;" class="w-1200">
			<div class="w-100 h-100 d-flex align-items-center justify-content-start tab relative">
			<?php if(is_array($config_tab) || $config_tab instanceof \think\Collection || $config_tab instanceof \think\Paginator): $i = 0; $__LIST__ = $config_tab;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['value'] == $tab_id): ?>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative tab-item-active"><a href="<?php echo Url('index',array('tab_id'=>$vo['value'],'type'=>$vo['type'])); ?>"><?php echo htmlentities($vo['label']); ?></a></div>
	            <?php else: ?>
	            <div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="<?php echo Url('index',array('tab_id'=>$vo['value'],'type'=>$vo['type'])); ?>"><?php echo htmlentities($vo['label']); ?></a></div>
	            <?php endif; ?>
            <?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<!--搜索区-->
		<div class="w-1200 relative" style="border: 1px solid #d9d9d9;z-index: 1">
			<!--列表-->
			<div class="w-100 label-list bg-fff">
				<form class="layui-form" action="<?php echo url('save_basics',array('tab_id'=>$tab_id)); ?>" method="post">
					<div class="h-100 pt-20 ">
						<div class="items w-100 ">
							<?php if($tab_id == 22): ?>
							<div class="w-100">
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<input type="checkbox" lay-filter="test1" value="1" <?php if($list[1]['is_use'] == 1): ?> checked="checked"<?php endif; ?> lay-skin="primary" name="is_pack"> <span>用户订单结算时，计算包材的价格</span>
								</div>
								<div class="ml-30 mt-10 orderitem bg-f4" style="width: 890px;  height: 288px;  border: solid 1px #d9d9d9;">
									<div class="pl-20 mt-10 text-27 fw size-14">包材设置</div>
									<div class="item pl-20  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
										<div>
											<div class=" size-14 item-text">单剂包装成本</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input   type="text" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" disabled  class="ivu-input w-400px ml0">
											</div>
										</div>
										<div class="ml-50">
											<div class=" size-14 item-text">价格</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" disabled class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['2']['menu_name']); ?>">
											</div>
										</div>
									</div>
									<div class="item pl-20  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
										<div>
											<div class=" size-14 item-text">长筒包装成本</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text" value="<?php echo htmlentities(json_decode($list['3']['value'])); ?>" disabled class="ivu-input w-400px ml0">
											</div>
										</div>
										<div class="ml-50">
											<div class=" size-14 item-text">价格</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="<?php echo htmlentities(json_decode($list['4']['value'])); ?>" disabled class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['4']['menu_name']); ?>">
											</div>
										</div>
									</div>
									<div class="item pl-20  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
										<div>
											<div class=" size-14 item-text">外包装成本</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="<?php echo htmlentities(json_decode($list['5']['value'])); ?>" disabled class="ivu-input w-400px ml0">
											</div>
										</div>
										<div class="ml-50">
											<div class=" size-14 item-text">价格</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="<?php echo htmlentities(json_decode($list['6']['value'])); ?>" disabled class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['6']['menu_name']); ?>">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="w-100">
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<input type="checkbox" lay-filter="test2" name="is_fare" value="1" lay-skin="primary"> <span>用户订单结算时，计算运费价格</span>
								</div>
								<div class="ml-30 mt-10 test2bg bg-f4" style="width: 890px;  height: 107px;  border: solid 1px #d9d9d9;">
									<div class="item w-100 d-flex align-items-center justify-content-start  size-14 flex-column">
										<div class="w-100 d-flex align-items-center justify-content-start bg-f4 bb lh30">
											<div class="h-100 w-128 lh30"></div>
											<div class="h-100 w-126 text-center fw lh30">首重(克)</div>
											<div class="h-100 w-126 text-center fw lh30">首费成本(元)</div>
											<div class="h-100 w-126 text-center fw lh30">首重结算价(元)</div>
											<div class="h-100 w-126 text-center fw lh30">续重(克)</div>
											<div class="h-100 w-126 text-center fw lh30">续重成本(元)</div>
											<div class="h-100 w-126 text-center fw lh30">续重结算价(元)</div>
										</div>
										<div class="w-100 lh38 d-flex align-items-center justify-content-start bg-f4 bb text-999">
											<div class="h-100 text-center w-128">成本(不可修改)</div>
											<div class="h-100 text-center w-126"><?php echo htmlentities(json_decode($list['7']['value'])); ?></div>
											<div class="h-100 text-center w-126"><?php echo htmlentities(json_decode($list['8']['value'])); ?></div>
											<div class="h-100 text-center w-126"><?php echo htmlentities(json_decode($list['9']['value'])); ?></div>
											<div class="h-100 text-center w-126"><?php echo htmlentities(json_decode($list['10']['value'])); ?></div>
											<div class="h-100 text-center w-126"><?php echo htmlentities(json_decode($list['11']['value'])); ?></div>
											<div class="h-100 text-center w-126"><?php echo htmlentities(json_decode($list['12']['value'])); ?></div>
										</div>
										<div class="w-100 lh38 d-flex align-items-center justify-content-start ">
											<div class="h-100 text-center w-128 text-57">设置价格</div>
											<div class="h-100 text-center w-126"><input type="<?php echo htmlentities($list['7']['input_type']); ?>" disabled value="<?php echo htmlentities(json_decode($list['7']['value'])); ?>" class="ivu-input ml0 orderinp2" disabled name="<?php echo htmlentities($list['7']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-126"><input type="<?php echo htmlentities($list['8']['input_type']); ?>" disabled value="<?php echo htmlentities(json_decode($list['8']['value'])); ?>" class="ivu-input ml0 orderinp2" name="<?php echo htmlentities($list['8']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-126"><input type="<?php echo htmlentities($list['9']['input_type']); ?>" disabled value="<?php echo htmlentities(json_decode($list['9']['value'])); ?>" class="ivu-input ml0 orderinp2" name="<?php echo htmlentities($list['9']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-126"><input type="<?php echo htmlentities($list['10']['input_type']); ?>" disabled value="<?php echo htmlentities(json_decode($list['10']['value'])); ?>" class="ivu-input ml0 orderinp2" name="<?php echo htmlentities($list['10']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-126"><input type="<?php echo htmlentities($list['11']['input_type']); ?>" disabled value="<?php echo htmlentities(json_decode($list['11']['value'])); ?>" class="ivu-input ml0 orderinp2" name="<?php echo htmlentities($list['11']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-126"><input type="<?php echo htmlentities($list['12']['input_type']); ?>" disabled value="<?php echo htmlentities(json_decode($list['12']['value'])); ?>" class="ivu-input ml0 orderinp2" name="<?php echo htmlentities($list['12']['menu_name']); ?>"></div>
										</div>

									</div>
								</div>
							</div>
							<?php elseif($tab_id == 23): ?>
								<!-- <div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14 fw">
								支付平台清关填写内容
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10">
									<div>
										<div class=" size-14 item-text">发送海关</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['0']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['0']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['0']['menu_name']); ?>">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">海关备案号</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['1']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['1']['menu_name']); ?>">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">海关备案名</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['2']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['2']['menu_name']); ?>">
										</div>
									</div>
								</div> -->
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div class="text-57 size-12 bg-f4 remark" style="width: 680px;">以下内容为清关信息，请将如下信息复制粘贴至支付平台的指定位置。微信支付在清关设置内，支付宝在接口数据传输字段内</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<span class="text-27">发送海关：</span><span class=""><?php echo htmlentities(json_decode($list['0']['value'])); ?></span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">海关备案号：</span><span class=""><?php echo htmlentities(json_decode($list['1']['value'])); ?></span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">海关备案名：</span><span class=""><?php echo htmlentities(json_decode($list['2']['value'])); ?></span>
								</div>

							<?php elseif($tab_id == 24): ?>
								<!-- <div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">自动收货天数</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['0']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['0']['value'])); ?>" class="ivu-input w-400px ml0 " name="<?php echo htmlentities($list['0']['menu_name']); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为15天</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">单笔订单金额上限</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['1']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" class="ivu-input w-400px ml0 " name="<?php echo htmlentities($list['1']['menu_name']); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为2500元，根据国家政策，海外购订单，单笔有金额上限限制</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">年度订单金额限制</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['2']['input_type']); ?>" placeholder="请输入"  value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" class="ivu-input w-400px ml0 " name="<?php echo htmlentities($list['2']['menu_name']); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为26000元</div>
										</div>
									</div>
								</div> -->
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">自动收货天数</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="text" placeholder="请输入" class="ivu-input w-400px ml0" value="<?php echo htmlentities(json_decode($list['0']['value'])); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为15天</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">单笔订单金额上限</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="text" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" class="ivu-input w-400px ml0 ">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为2500元，根据国家政策，海外购订单，单笔有金额上限限制</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">年度订单金额限制</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="text" placeholder="请输入"  value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" class="ivu-input w-400px ml0 ">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为26000元</div>
										</div>
									</div>
								</div>
							<?php elseif($tab_id == 2): ?>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['0']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['0']['type']); ?>" placeholder="<?php echo htmlentities($list['0']['desc']); ?>" value="<?php echo htmlentities(json_decode($list['0']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['0']['menu_name']); ?>">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['1']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['1']['type']); ?>" placeholder="<?php echo htmlentities($list['1']['desc']); ?>" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['1']['menu_name']); ?>">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['2']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['2']['type']); ?>" placeholder="<?php echo htmlentities($list['2']['desc']); ?>" value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['2']['menu_name']); ?>">
											<span onclick="updateToken(32,this)">更新</span>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['3']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['3']['type']); ?>" placeholder="请输入" value="0" <?php if(json_decode($list['3']['value']) == '0'): ?> checked="checked"<?php endif; ?> class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['3']['menu_name']); ?>">明文模式
											<input  type="<?php echo htmlentities($list['3']['type']); ?>" placeholder="请输入" value="1" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['3']['menu_name']); ?>" <?php if(json_decode($list['3']['value']) == '1'): ?> checked="checked"<?php endif; ?>>兼容模式
											<input  type="<?php echo htmlentities($list['3']['type']); ?>" placeholder="请输入" value="2" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['3']['menu_name']); ?>" <?php if(json_decode($list['3']['value']) == '2'): ?> checked="checked"<?php endif; ?>>安全模式
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['4']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['4']['type']); ?>" placeholder="<?php echo htmlentities($list['4']['desc']); ?>" value="<?php echo htmlentities(json_decode($list['4']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['4']['menu_name']); ?>">
											<span onclick="updateToken(43,this)">更新</span>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['7']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['7']['type']); ?>" placeholder="请输入" value="0" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['7']['menu_name']); ?>" <?php if(json_decode($list['7']['value']) == '0'): ?> checked="checked"<?php endif; ?>>服务号
											<input  type="<?php echo htmlentities($list['7']['type']); ?>" placeholder="请输入" value="1" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['7']['menu_name']); ?>" <?php if(json_decode($list['7']['value']) == '1'): ?> checked="checked"<?php endif; ?>>订阅号
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text"><?php echo htmlentities($list['10']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['10']['type']); ?>" placeholder="<?php echo htmlentities($list['10']['desc']); ?>" value="<?php echo htmlentities($url); ?><?php echo htmlentities(json_decode($list['10']['value'])); ?>" class="ivu-input w-400px ml0" readonly>
										</div>
									</div>
								</div>
							<?php elseif($tab_id == 4): ?>
								<div class="p-m m-t-sm" id="configboay"></div>

							<?php else: ?>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<span class="text-27">平台信息：</span><span class=""><?php echo htmlentities($platform['name']); ?></span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">平台推荐码：</span>
									<input type="text" class="copyval" style="border: none;width: auto;min-width: 100px" id="input" value="<?php echo htmlentities($platform['referral_code']); ?>">
									<span class="ml-8 text-c01f5e cursor copy" onclick="copyText()">复制</span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">APPID：</span><span class=""><?php echo htmlentities($platform['appid']); ?></span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">APP Secret：</span><span class=""><?php echo htmlentities($platform['secret']); ?></span>
								</div>
							<?php endif; if($tab_id != 4): ?>
							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>
							<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-30 pb-30">
								<button type="submit" class="ivu-btn ivu-btn-primary">保存设置</button>
								<button type="reset" class="ivu-btn ivu-btn-default ml-20">取消</button>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</form>
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



<?php if($tab_id == 4): ?>
<script type="text/javascript">
	 formCreate.formSuccess = function(form,$r){
        <?=$form->getSuccessScript()?>
        $r.btn.loading(false);
    };
	 (function () {
        var create = (function () {
            var getRule = function () {
                var rule = <?=json_encode($form->getRules())?>;
                rule.forEach(function (c) {
                    if ((c.type == 'cascader' || c.type == 'tree') && Object.prototype.toString.call(c.props.data) == '[object String]') {
                        if (c.props.data.indexOf('js.') === 0) {
                            c.props.data = window[c.props.data.replace('js.', '')];
                        }
                    }
                });
                return rule;
            }, vm = new Vue,name = 'formBuilderExec<?= !$form->getId() ? '' : '_'.$form->getId() ?>';
            var _b = false;
            window[name] =  function create(el, callback) {
                if(_b) return ;
                _b = true;
                if (!el) el = document.getElementById('configboay');
                var $f = formCreate.create(getRule(), {
                    el: el,
                    form:<?=json_encode($form->getConfig('form'))?>,
                    row:<?=json_encode($form->getConfig('row'))?>,
                    submitBtn:<?=$form->isSubmitBtn() ? '{}' : 'false'?>,
                    resetBtn:<?=$form->isResetBtn() ? 'true' : '{}'?>,
                    iframeHelper:false,
                    global:{
                        upload: {
                            props:{
                                onExceededSize: function (file) {
                                    vm.$Message.error(file.name + '超出指定大小限制');
                                },
                                onFormatError: function () {
                                    vm.$Message.error(file.name + '格式验证失败');
                                },
                                onError: function (error) {
                                    vm.$Message.error(file.name + '上传失败,(' + error + ')');
                                },
                                onSuccess: function (res, file) {
                                    if (res.code == 200) {
                                    	console.log(file)
                                    	vm.$Message.success(res.msg);
                                        file.url = res.data.filePath;
                                    } else {
                                        vm.$Message.error(res.msg);
                                    }
                                },
                            },
                        },
                    },
                    //表单提交事件
                    onSubmit: function (formData) {
                        $f.btn.loading(true);
                        $.ajax({
                            url: '<?=$form->getAction()?>',
                            type: '<?=$form->getMethod()?>',
                            dataType: 'json',
                            data: formData,
                            success: function (res) {
                                if (res.code == 200) {
                                    vm.$Message.success(res.msg);
                                    $f.btn.loading(false);
                                    //formCreate.formSuccess && formCreate.formSuccess(res, $f, formData);
                                    callback && callback(0, res, $f, formData);
                                    //TODO 表单提交成功!
                                } else {
                                    vm.$Message.error(res.msg || '表单提交失败');
                                    $f.btn.loading(false);
                                    callback && callback(1, res, $f, formData);
                                    //TODO 表单提交失败
                                }
                            },
                            error: function () {
                                vm.$Message.error('表单提交失败');
                                $f.btn.loading(false);
                            }
                        });
                    }
                });
                return $f;
            };
            return window[name];
        }());
        window.$f = create();
    })();
</script>
<?php endif; ?>
<script type="text/javascript">
	function copyText() {
		var input   = document.getElementById("input");
		input.select(); // 选中文本
		document.execCommand("copy"); // 执行浏览器复制命令
		alert('复制成功');
	}
	layui.use('form', function () {
		var form = layui.form;
		form.on('checkbox(test2)', function (data) {
			var checked = data.elem.checked;
			if (checked != true) {
				$('.test2bg').addClass('bg-f4');
				$('.orderinp2').attr('disabled', true);
			}else {
				$('.test2bg').removeClass('bg-f4');
				$('.orderinp2').attr('disabled',false)
			}
		});
		form.on('checkbox(test1)', function (data) {
			var checked = data.elem.checked;
			if (checked != true) {
				$('.orderinp').attr('disabled', true);
				$('.orderinp').attr('placeholder','');
				$('.orderinp').addClass('bg-f4');
				$('.orderitem').addClass('bg-f4');
			} else {
				$('.orderinp').attr('placeholder','请输入');
				$('.orderinp').attr('disabled',false)
				$('.orderinp').removeClass('bg-f4');
				$('.orderitem').removeClass('bg-f4');
			}
		});
	});
	var length=0;
	function updateToken(length,obj){
		$.ajax({
			type:'post',
			async:true,
			dataType:'json',
			url:"<?php echo url('setting.systemConfig/update_token'); ?>"+'?length='+length,
			success:function(json){
				if(json.code == 200){
					$(obj).prev().val(json.data.token);
				}
			},
			error:function(){

			}
		})
	}

</script>