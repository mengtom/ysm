<?php /*a:5:{s:64:"F:\WWW\yeshai\app\admin\view/ysm\setting\system_config\index.php";i:1603421353;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1603854727;}*/ ?>
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

	<title>系统设置</title>
	<div class="h-100 w-100 setting-deal" id="app">
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
				<form class="layui-form" action="<?php echo url('save_basics'); ?>" method="post">
					<div class="h-100 pt-20 ">
						<div class="items w-100 ">
							<?php if($tab_id == 22): ?>
							<div class="w-100">

								<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<div>
										<div class="size-14 item-text"><?php echo htmlentities($list['0']['info']); ?></div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="text" value="<?php echo htmlentities(json_decode($list['0']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['0']['menu_name']); ?>" >
										</div>
										<div class="size-12 text-center text-57 mt-8 remark"><?php echo htmlentities($list['0']['desc']); ?></div>
									</div>
								</div>
								<input hidden type="text" name="config_tab_id" value="<?php echo htmlentities($tab_id); ?>">

								<!--<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<div>
										<div class=" size-14 item-text">单剂包装成本</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['1']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" class="ivu-input w-400px ml0" name="<?php echo htmlentities($list['1']['menu_name']); ?>">
										</div>
									</div>
									<div class="ml-50">
										<div class=" size-14 item-text">平台初始结算价格</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['2']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['2']['menu_name']); ?>">
										</div>
									</div>
								</div>
								<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<div>
										<div class=" size-14 item-text">长筒包装成本</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['3']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['3']['value'])); ?>" class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['3']['menu_name']); ?>">
										</div>
									</div>
									<div class="ml-50">
										<div class=" size-14 item-text">平台初始结算价格</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['4']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['4']['value'])); ?>" class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['4']['menu_name']); ?>">
										</div>
									</div>
								</div>
								<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<div>
										<div class=" size-14 item-text">外包装成本</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['5']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['5']['value'])); ?>" class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['5']['menu_name']); ?>">
										</div>
									</div>
									<div class="ml-50">
										<div class=" size-14 item-text">平台初始结算价格</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="<?php echo htmlentities($list['6']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['6']['value'])); ?>" class="ivu-input w-400px ml0 orderinp" name="<?php echo htmlentities($list['6']['menu_name']); ?>">
										</div>
									</div>
								</div>-->

								<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>

								<div class="w-100 mb-20  ml-30 item">
									<div class="w-100 fw"><?php echo htmlentities($list['1']['info']); ?></div>
									<div class="w-100 d-flex mt-10">
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="RMB" class="ivu-input ivu-input-default ivu-input-with-prefix" name="<?php echo htmlentities($list['1']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-yen" style="font-size: 14px;color: #272727"></i></span>
										</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="USD" class="ivu-input ivu-input-default ivu-input-with-prefix" name="<?php echo htmlentities($list['2']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-usd" style="font-size: 14px;color: #272727"></i></span>
										</div>
									</div>
									<div class="size-12 w-100 mt-10" style="color: #f5222d">*人民币价格必填</div>
								</div>

								<div class="w-100 mb-20  ml-30 item">
									<div class="w-100 fw">包装人工费/盒</div>
									<div class="w-100 d-flex mt-10">
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="RMB" class="ivu-input ivu-input-default ivu-input-with-prefix" name="<?php echo htmlentities($list['3']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['3']['value'])); ?>">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-yen" style="font-size: 14px;color: #272727"></i></span>
										</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="USD" class="ivu-input ivu-input-default ivu-input-with-prefix" name="<?php echo htmlentities($list['4']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['4']['value'])); ?>">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-usd" style="font-size: 14px;color: #272727"></i></span>
										</div>
									</div>
									<div class="size-12 w-100 mt-10" style="color: #f5222d">*人民币价格必填</div>
								</div>

								<div class="w-100 mb-20 ml-30 item">
									<div class="w-100 fw"><?php echo htmlentities($list['5']['info']); ?></div>
									<div class="w-100 d-flex mt-10">
										<div class="w-190px d-flex align-items-center justify-content-between text-57 pr-10">
											<input type="text" value="<?php echo htmlentities(json_decode($list['5']['value'])); ?>" name="<?php echo htmlentities($list['5']['menu_name']); ?>" placeholder="请输入数字" class="ivu-input w-150px ivu-input-default">%
											<!--<input type="<?php echo htmlentities($list['5']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['5']['value'])); ?>" name="<?php echo htmlentities($list['5']['menu_name']); ?>" placeholder="请输入数字" class="ivu-input w-150px ivu-input-default">%-->
										</div>
									</div>
								</div>

								<div class="w-100 mb-20 pl-30 pr-30 item">

									<div class="w-100 table">
										<table class="ivu-table  ivu-table-default">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header cursor">
												<th class="bg-f6 w-190px"></th>
												<th class="bg-f6 w-190px">成本(￥)</th>
												<th class="bg-f6 w-190px">成本($)</th>
												<th class="bg-f6 w-190px">平台结算价(￥)</th>
												<th class="bg-f6 w-190px">平台结算价($)</th>
												<!--<th class="bg-f6 w-190px">重量(克)</th>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">铝杯+封口膜</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['6']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['6']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['7']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['7']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['8']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['8']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['9']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['9']['value'])); ?>"></td>
												<!--<td class="ckitem text-57"><input type = "text" class="ivu-input w-100 text-center" placeholder="请输入"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">纸筒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['10']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['10']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['11']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['11']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['12']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['12']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['13']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['13']['value'])); ?>"></td>
												<!--<td class="ckitem text-57"><input type = "<?php echo htmlentities($list['9']['input_type']); ?>" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['9']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['9']['value'])); ?>"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">彩盒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['14']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['14']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['15']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['15']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['16']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['16']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['17']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['17']['value'])); ?>"></td>
												<!--<td class="ckitem text-57"><input type = "<?php echo htmlentities($list['9']['input_type']); ?>" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['9']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['9']['value'])); ?>"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">包装运输箱/盒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['18']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['18']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['19']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['19']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['20']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['20']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['21']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['21']['value'])); ?>"></td>
												<!--<td class="ckitem text-57"><input type = "<?php echo htmlentities($list['9']['input_type']); ?>" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['9']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['9']['value'])); ?>"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">Brochure/盒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['22']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['22']['value'])); ?>" ></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['23']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['23']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['24']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['24']['value'])); ?>"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($list['25']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['25']['value'])); ?>"></td>
												<!--<td class="ckitem text-57"><input type = "text" class="ivu-input w-100 text-center" placeholder="请输入"></td>-->
											</tr>
											</tbody>
										</table>
									</div>

								</div>

							</div>

							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>

							<div class="w-100 pl-30 pr-30">
								<div class="mt-20 mb-20 fw size-16 text-c01f5e">运费设置</div>
								<div class="w-100 table">
									<table class="ivu-table  ivu-table-default">
										<tbody class="ivu-table-tbody">
										<tr class="ivu-table-header cursor">
											<th class="bg-f6 w-190px">首重(克)</th>
											<th class="bg-f6 w-190px">首费成本(￥)</th>
											<th class="bg-f6 w-190px">首费成本($)</th>
											<th class="bg-f6 w-190px">首费结算价(￥)</th>
											<th class="bg-f6 w-190px">首费结算价($)</th>
										</tr>
										<tr class="cursor text-57">
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['26']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['26']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['27']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['27']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['28']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['28']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['29']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['29']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['30']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['30']['value'])); ?>"></td>
										</tr>
										<tr class="ivu-table-header cursor">
											<th class="bg-f6 w-190px">续重(克)</th>
											<th class="bg-f6 w-190px">续重成本(￥)</th>
											<th class="bg-f6 w-190px">续重成本($)</th>
											<th class="bg-f6 w-190px">续重结算价(￥)</th>
											<th class="bg-f6 w-190px">续重结算价($)</th>
										</tr>
										<tr class="cursor text-57">
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['31']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['31']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['32']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['32']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['33']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['33']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['34']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['34']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['35']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['35']['value'])); ?>"></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>


							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>
							<div class="w-100 pl-30 pr-30">
								<div class="mt-20 mb-20 fw size-16 text-c01f5e">物流方式及价格</div>
								<div class="w-100 d-flex mt-10 justify-content-between align-items-start">
									<div class="border table" style="width: 750px;border: solid 1px #d9d9d9;">
										<table class="ivu-table  ivu-table-default w-100">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header cursor">
												<th class="bg-f6 w-100px"></th>
												<th class="bg-f6 w-100px">B-C(￥)</th>
												<th class="bg-f6 w-100px">B-C($)</th>
												<th class="bg-f6 w-100px">Air(￥)</th>
												<th class="bg-f6 w-100px">Air($)</th>
												<th class="bg-f6 w-100px">Sea(￥)</th>
												<th class="bg-f6 w-100px">Sea($)</th>
												<th class="bg-f6 w-100px">B-HK-C(￥)</th>
												<th class="bg-f6 w-100px">B-HK-C($)</th>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">1kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[bc_rmb]" value="<?php echo htmlentities($logisgics['0']['bc_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[bc_usd]" value="<?php echo htmlentities($logisgics['0']['bc_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[air_rmb]" value="<?php echo htmlentities($logisgics['0']['air_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[air_usd]" value="<?php echo htmlentities($logisgics['0']['air_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[sea_rmb]" value="<?php echo htmlentities($logisgics['0']['sea_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[sea_usd]" value="<?php echo htmlentities($logisgics['0']['sea_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[bhkc_rmb]" value="<?php echo htmlentities($logisgics['0']['bhkc_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[bhkc_usd]" value="<?php echo htmlentities($logisgics['0']['bhkc_usd']); ?>"></td>
											</tr>

											<tr class="cursor text-57">
												<td class="ckitem text-57">2kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[bc_rmb]" value="<?php echo htmlentities($logisgics['1']['bc_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[bc_usd]" value="<?php echo htmlentities($logisgics['1']['bc_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[air_rmb]" value="<?php echo htmlentities($logisgics['1']['air_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[air_usd]" value="<?php echo htmlentities($logisgics['1']['air_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[sea_rmb]" value="<?php echo htmlentities($logisgics['1']['sea_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[sea_usd]" value="<?php echo htmlentities($logisgics['1']['sea_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[bhkc_rmb]" value="<?php echo htmlentities($logisgics['1']['bhkc_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[bhkc_usd]" value="<?php echo htmlentities($logisgics['1']['bhkc_usd']); ?>"></td>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">3kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[bc_rmb]" value="<?php echo htmlentities($logisgics['2']['bc_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[bc_usd]" value="<?php echo htmlentities($logisgics['2']['bc_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[air_rmb]" value="<?php echo htmlentities($logisgics['2']['air_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[air_usd]" value="<?php echo htmlentities($logisgics['2']['air_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[sea_rmb]" value="<?php echo htmlentities($logisgics['2']['sea_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[sea_usd]" value="<?php echo htmlentities($logisgics['2']['sea_usd']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[bhkc_rmb]" value="<?php echo htmlentities($logisgics['2']['bhkc_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[bhkc_usd]" value="<?php echo htmlentities($logisgics['2']['bhkc_usd']); ?>"></td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="w-300px border table" style="border: solid 1px #d9d9d9;">
										<table class="ivu-table  ivu-table-default w-100">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header cursor">
												<th class="bg-f6 w-150px">国外当地物流</th>
												<th class="bg-f6 w-150px">价格(￥)</th>
												<th class="bg-f6 w-150px">价格($)</th>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">1kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[local_logistics_abroad_rmb]" value="<?php echo htmlentities($logisgics['0']['local_logistics_abroad_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['0']['weight']); ?>[local_logistics_abroad_usd]" value="<?php echo htmlentities($logisgics['0']['local_logistics_abroad_usd']); ?>"></td>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">2kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[local_logistics_abroad_rmb]" value="<?php echo htmlentities($logisgics['1']['local_logistics_abroad_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['1']['weight']); ?>[local_logistics_abroad_usd]" value="<?php echo htmlentities($logisgics['1']['local_logistics_abroad_usd']); ?>"></td>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">3kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[local_logistics_abroad_rmb]" value="<?php echo htmlentities($logisgics['2']['local_logistics_abroad_rmb']); ?>"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="<?php echo htmlentities($logisgics['2']['weight']); ?>[local_logistics_abroad_usd]" value="<?php echo htmlentities($logisgics['2']['local_logistics_abroad_usd']); ?>"></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>

							<div class="w-100 pl-30 pr-30">
								<div class="mt-20 mb-20 fw size-16 text-c01f5e">包材重量</div>
								<div class="w-100 table">
									<table class="ivu-table  ivu-table-default">
										<tbody class="ivu-table-tbody">
										<tr class="ivu-table-header cursor">
											<th class="bg-f6 w-190px"></th>
											<th class="bg-f6 w-190px">铝杯+封口膜</th>
											<th class="bg-f6 w-190px">纸筒</th>
											<th class="bg-f6 w-190px">彩盒</th>
											<th class="bg-f6 w-190px">包装运输箱/盒</th>
											<th class="bg-f6 w-190px">Brochure/盒</th>
										</tr>
										<tr class="cursor text-57">
											<td class = "ckitem text-57">重量(克)</td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['36']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['36']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['37']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['37']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['38']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['38']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['39']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['39']['value'])); ?>"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="<?php echo htmlentities($list['40']['menu_name']); ?>" value="<?php echo htmlentities(json_decode($list['40']['value'])); ?>"></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>


				<!--			<div class="w-100">
								<div class="ml-30 mt-20 fw text-27 size-14">运费设置</div>
								<div class="ml-30 mt-10 test2bg">
									<div class="item w-100 d-flex align-items-center justify-content-start size-14 flex-column">
										<div class="w-100 d-flex align-items-center justify-content-start bg-f4 bb lh30">
											<div class="h-100 w-100px text-center fw lh30">首重(克)</div>
											<div class="h-100 w-100px text-center fw lh30">首费成本(元)</div>
											<div class="h-100 w-100px text-center fw lh30">首重结算价(元)</div>
											<div class="h-100 w-100px text-center fw lh30">续重(克)</div>
											<div class="h-100 w-100px text-center fw lh30">续重成本(元)</div>
											<div class="h-100 w-100px text-center fw lh30">续重结算价(元)</div>
										</div>
										<div class="w-100 lh38 d-flex align-items-center justify-content-start">
											<div class="h-100 text-center w-100px"><input type="<?php echo htmlentities($list['7']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['7']['value'])); ?>" class="ivu-input  ml0" name="<?php echo htmlentities($list['7']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-100px"><input type="<?php echo htmlentities($list['8']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['8']['value'])); ?>" class="ivu-input  ml0" name="<?php echo htmlentities($list['8']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-100px"><input type="<?php echo htmlentities($list['9']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['9']['value'])); ?>" class="ivu-input  ml0" name="<?php echo htmlentities($list['9']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-100px"><input type="<?php echo htmlentities($list['10']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['10']['value'])); ?>" class="ivu-input  ml0" name="<?php echo htmlentities($list['10']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-100px"><input type="<?php echo htmlentities($list['11']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['11']['value'])); ?>" class="ivu-input  ml0" name="<?php echo htmlentities($list['11']['menu_name']); ?>"></div>
											<div class="h-100 text-center w-100px"><input type="<?php echo htmlentities($list['12']['input_type']); ?>" value="<?php echo htmlentities(json_decode($list['12']['value'])); ?>" class="ivu-input  ml0" name="<?php echo htmlentities($list['12']['menu_name']); ?>"></div>
										</div>
									</div>
								</div>
							</div>-->

							<?php elseif($tab_id == 23): ?>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14 fw">
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
								</div>
							<?php elseif($tab_id == 24): ?>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">自动收货天数</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['0']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['0']['value'])); ?>" class="ivu-input w-400px ml0 " name="<?php echo htmlentities($list['0']['menu_name']); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark w-auto pl-10 pr-10" >订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为15天</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">单笔订单金额上限</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['1']['input_type']); ?>" placeholder="请输入" value="<?php echo htmlentities(json_decode($list['1']['value'])); ?>" class="ivu-input w-400px ml0 " name="<?php echo htmlentities($list['1']['menu_name']); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark w-auto pl-10 pr-10" >默认为2500元，根据国家政策，海外购订单，单笔有金额上限限制</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">年度订单金额限制</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="<?php echo htmlentities($list['2']['input_type']); ?>" placeholder="请输入"  value="<?php echo htmlentities(json_decode($list['2']['value'])); ?>" class="ivu-input w-400px ml0 " name="<?php echo htmlentities($list['2']['menu_name']); ?>">
											<div class="text-57 size-12 bg-f4 ml-8 remark w-auto pl-10 pr-10" >默认为26000元</div>
										</div>
									</div>
								</div>
							<?php else: ?>
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">-->
								<!--	<span class="text-27">平台信息：</span><span class="">XXXXX科技有限公司</span>-->
								<!--</div>-->
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">-->
								<!--	<span class="text-27">平台推荐码：</span>-->
								<!--	<input type="text" class="copyval" style="border: none;width: auto;min-width: 100px" id="input" value="AA44444444444AA">-->
								<!--	<span class="ml-8 text-c01f5e cursor copy" onclick="copyText()">复制</span>-->
								<!--</div>-->
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">-->
								<!--	<span class="text-27">APPID：</span><span class="">XXXXXXXXXXX</span>-->
								<!--</div>-->
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">-->
								<!--	<span class="text-27">APP Secret：</span><span class="">XXXXXXXXXXX</span>-->
								<!--</div>-->
							<?php endif; ?>

							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>
							<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-30 pb-30">
								<button type="submit" class="ivu-btn ivu-btn-primary">保存设置</button>
								<button type="reset" class="ivu-btn ivu-btn-default ml-20">取消</button>
							</div>
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




<script type="text/javascript">

	function copyText() {
		var input   = document.getElementById("input");
		input.select(); // 选中文本
		document.execCommand("copy"); // 执行浏览器复制命令
	}

</script>
