<?php /*a:6:{s:71:"F:\WWW\yeshai\app\admin\view/ysm\microchip\microchip_product\create.php";i:1604306999;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1603854727;s:54:"F:\WWW\yeshai\app\admin\view/ysm\public\layui_page.php";i:1603854936;}*/ ?>
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

<div id="app" class="wp-edit">
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
	<div class="w-1200 tip mt-80  text-666 size-14">
		<span>首页 /</span> <a class="text-57" href="index.html">微片 </a> <span class="text-c01f5e">/ 添加微片 </span>
	</div>
	
	<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
		<span class="fw size-20 text-333">添加微片</span>
	</div>
	
	<!--列表-->
	<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
		<form class="layui-form" action="<?php echo url('save'); ?>" method="post">
			<div class="wp-edit-body  h-100 pt-20">
				<div class="size-16 fw text-c01f5e mt-10 ">基础信息</div>
				<div class="items w-100">
					<div class="item w-100 ">
						<div class=" size-14 item-text">分类<span class="text-ff4d4f">*</span></div>
						<div class=" w-100">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-200px">
								<select name="cate_id" class="w-200px" lay-verify="required">
									<option value="">请选择</option>
									<?php if(is_array($cate1) || $cate1 instanceof \think\Collection || $cate1 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['html']); ?><?php echo htmlentities($vo['title']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="item w-100 ">
						<div class=" size-14 item-text">微片编码<span class="text-ff4d4f">*</span></div>
						<div class=" w-100">
							<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="code">
						</div>
					</div>
					
					<div class="item  w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">微片名称<span class="text-ff4d4f">*</span></div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="zn_name">
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Name</div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="en_name">
							</div>
						</div>
					</div>
					
					<div class="item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">微片学名</div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="scientific_zn_name">
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Scientific name</div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="scientific_en_name">
							</div>
						</div>
					</div>
					
					<div class="item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">微片详细描述</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="microchip_info_zn"></textarea>
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Product description</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="microchip_info_en"></textarea>
							</div>
						</div>
					</div>
					
					<div class="item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">副作用</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="effects_zn"></textarea>
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Side effects</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="effects_en"></textarea>
							</div>
						</div>
					</div>
				
				
				</div>
				<div class="hr w-100" style="margin: 30px auto"></div>
				
				
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">基础价格</div>
				<div class="items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class = " size-14 item-text">基础售价</div>
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
									<input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input ivu-input-default ivu-input-with-prefix" name="price">
									<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>
								</div>
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
									<input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix" name="usd">
									<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>
								</div>
							</div>
							<div><span class = "text-ff4d4f size-12">*人民币价格必填</span></div>
						</div>
					</div>
				</div>
				<div class = "items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div >
							<div class = " size-14 item-text">COG成本价(千粒成本)</div>
							<!--
								成本价（系统自动生成）：显示至小数点后两位。根据下方微片构成中的值进行计算。
								例如，微片构成中，选择了活性成分a，单位为mg，选定批次的每mg人民币单价为2元，美元单价为0.33，每微片中使用剂量为3mg；
								辅料成分b，单位为iu，选定批次的每iu人民币价格为5元，美元单价为0.9，每微片使用剂量为6iu；
								则该处人民币成本为：3*2+6*5=36，显示为36.00；
								美元成本为：3*0.33+6*0.9=6.39，显示为6.39
							-->
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">
										<span v-show="!cogeditshow">
											<span>￥</span>
											<span class = "cogtotalrmbprice">0</span>
										</span>
										<span v-show="cogeditshow">
											 <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">
										        <input autocomplete = "off"  spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input ivu-input-default ivu-input-with-prefix cogtotalrmbpriceinput" name="cost_rmb">
										        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>
										    </div>
										</span>
								</div>
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text text-27 w-150px">
									<span v-show="!cogeditshow">
										<span>$</span>
										<span class = "cogtotalusdprice">0</span>
									</span>
									<span v-show="cogeditshow">
										 <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">
									        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix cogtotalusdpriceinput" name="cost_usd">
									        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>
										 </div>
									</span>
								</div>
								<label class="ivu-btn ivu-btn-default d-flex align-items-center justify-content-center mr-20 ml-20 coginput-btn" >成分成本价计算</label >
								<input id="coginput" class="hide" type="radio" lay-ignore value="1" >
								<label  @click="cogedit()" for="coginput"   class = "ml-10 text-c01f5e cursor">编辑</label>
							</div>
						</div>
					</div>
				</div>
				
			
				
				<div class = "items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div >
							<div class = " size-14 item-text">Pricing成本价(千粒成本)</div>
							<!--增加【Pricing成本价】，计算逻辑为：（COG成本价+（A*微片重量mg）/1000）*（1+B），A为微片加工费，B为关税（A和B均在系统设置-交易设置中获取）。可以手动修改。-->
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">
										<span v-show="!pricingshow">
											<span>￥</span>
											<span class = "pricingpricermb">0</span>
										</span>
									<span v-show="pricingshow">
	                                        <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">
		                                        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix pricingpricermbinput"  name="pricing_rmb">
		                                        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>
											 </div>
										<!--<input type = "text" placeholder = "请输入" class = "ivu-input w-100 pricingpricermbinput">-->
										</span>
								</div>
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text text-27 w-150px">
										<span v-show="!pricingshow">
											<span>$</span>
											<span class="pricingpriceusd" >0</span >
										</span>
									<span v-show="pricingshow" >
	                                         <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">
		                                        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix pricingpriceusdinput" name="pricing_usd">
		                                        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>
											 </div>
										<!--<input type = "text" placeholder = "请输入" class = "ivu-input w-100 pricingpriceusdinput">-->
										</span>
								</div>
								<label class="ivu-btn ivu-btn-default d-flex align-items-center justify-content-center ml-20 mr-20 pricinginput-btn"  >COG成本价计算</label >
								<input id="pricinginput" class="hide" type="radio" lay-ignore value="1"   >
								<label for="pricinginput" @click="pricingedit()"   class = "ml-10 text-c01f5e cursor">编辑</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class = "items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div style = "width: 400px;">
							<div class = " size-14 item-text">微片重量</div>
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "w-190px">
									<input type = "text" name="weight" class = "ivu-input w-100 weight" placeholder = "请输入数字">
								</div>
								<div class = "ml-8">mg</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="hr w-100 mt20"></div>
				<div class="size-16 fw text-c01f5e ">微片构成</div>
				<div class="items w-100">
					<div class="w-100 mt-20 fw">活性成分</div>
					<div class="w-100 mt-10 d-flex align-items-center justify-content-around" style="height: 40px;background: #f6f6f6">
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分名称 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分编码 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">剂量<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">单位<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-20 w-150px">操作</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-start flex-column  hxcflist">
						<div class="w-100 mt-10 hxcflistitems">
							<div class="hxcfitem w-100 d-flex align-items-center justify-content-around hide">
								<div class="w-200px d-flex align-items-center justify-content-start  border">
									<input type="hidden">
									成分
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start border">
									<input type="hidden">
									编码
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start border">
									<input type="hidden">
									剂量
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start border">
									<input type="hidden">
									单位
								</div>
								<div class="d-flex align-items-center justify-content-start " style="width: 150px;">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>
								</div>
							</div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-around hxcfitem" style="height: 40px;">
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px cfname" lay-filter="test3" lay-verify="required" lay-search="">
									<option selected="" value="">点此选择成分</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									<?php if(is_array($huo_micro) || $huo_micro instanceof \think\Collection || $huo_micro instanceof \think\Paginator): $i = 0; $__LIST__ = $huo_micro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?>
									<option data-rmbprice="<?php echo htmlentities($h['price_rmb']); ?>" data-usdprice="<?php echo htmlentities($h['price_usd']); ?>" value="<?php echo htmlentities($h['id']); ?>"><?php echo htmlentities($h['zn_name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px cfcode" lay-filter="test4" lay-verify="required" lay-search="">
									<option selected="" value="">点此选择编码</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									<?php if(is_array($huo_micro) || $huo_micro instanceof \think\Collection || $huo_micro instanceof \think\Paginator): $i = 0; $__LIST__ = $huo_micro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?>
									<option data-rmbprice="<?php echo htmlentities($h['price_rmb']); ?>" data-usdprice="<?php echo htmlentities($h['price_usd']); ?>" value="<?php echo htmlentities($h['id']); ?>"><?php echo htmlentities($h['code']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-center ml-10 mr-10" style="width: 200px;">
								<input type="text" oninput = "value=value.replace(/[^\d.]/g,'')" class="ivu-input" placeholder="请输入">
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-200px ml-10 mr-10">
								<select class="w-200px" lay-verify="required">
									<option value="">请选择</option>
									<option value="mg">mg</option>
									<option value="iu">iu</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">
								<i class="icon iconfont iconicon-test cursor  add-hxcf" style="color: #1fc054"></i>
							</div>
						</div>
					
					
					</div>
					<div class="w-100 hide d-flex align-items-center justify-content-center mt-10 cursor addhxcf" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
						<i class="icon iconfont iconicon-test"></i> 添加更多活性成分
					</div>
				</div>
				
				<div class="items w-100">
					<div class="w-100 mt-20 fw">辅料</div>
					<div class="w-100 mt-10 d-flex align-items-center justify-content-around" style="height: 40px;background: #f6f6f6">
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分名称 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分编码 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">剂量<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">单位<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-20 w-150px">操作</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-start flex-column  fllist">
						
						<div class="w-100 mt-10 fllistitems">
							<div class="hxcfitem w-100 d-flex align-items-center justify-content-around hide">
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									成分
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									编码
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									剂量
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									单位
								</div>
								<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>
								</div>
							</div>
						</div>
						
						
						<div class="w-100 mt-10 d-flex align-items-center justify-content-around flitem" style="height: 40px;">
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px flname" lay-filter="test1" lay-verify="required" lay-search="">
									<option value="">点此选择成分</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									<?php if(is_array($fu_micro) || $fu_micro instanceof \think\Collection || $fu_micro instanceof \think\Paginator): $i = 0; $__LIST__ = $fu_micro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?>
									<option data-rmbprice="<?php echo htmlentities($f['price_rmb']); ?>" data-usdprice="<?php echo htmlentities($f['price_usd']); ?>" value="<?php echo htmlentities($f['id']); ?>"><?php echo htmlentities($f['zn_name']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px flcode" lay-filter="test2" lay-verify="required" lay-search="">
									<option  value="">点此选择编码</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									<?php if(is_array($fu_micro) || $fu_micro instanceof \think\Collection || $fu_micro instanceof \think\Paginator): $i = 0; $__LIST__ = $fu_micro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?>
									<option data-rmbprice="<?php echo htmlentities($f['price_rmb']); ?>" data-usdprice="<?php echo htmlentities($f['price_usd']); ?>" value="<?php echo htmlentities($f['id']); ?>"><?php echo htmlentities($f['code']); ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-center ml-10 mr-10" style="width: 200px;">
								<input type="text" oninput = " value=value.replace(/[^\d.]/g,'')" class="ivu-input" placeholder="请输入">
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-200px ml-10 mr-10">
								<select class="w-200px" lay-verify="required">
									<option value="">请选择</option>
									<option value="mg">mg</option>
									<option value="iu">iu</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">
								<i class="icon iconfont iconicon-test cursor  add-fl" style="color: #1fc054"></i>
							</div>
						</div>
					
					
					</div>
					<div class="w-100 hide d-flex align-items-center justify-content-center mt-10 cursor addfl" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
						<i class="icon iconfont iconicon-test"></i> 添加更多辅料
					</div>
				</div>
				
				<div class="hr w-100" style=""></div>
				
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">剂量显示</div>
				
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">计量单位<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
								<select name="unit" lay-verify="required">
									<option value="">请选择</option>
									<option value="iu">iu</option>
									<option value="mg">mg</option>
									<option value="ml">ml</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">单日建议最大摄入量</div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" lay-verify="number" placeholder="请输入数字" class="ivu-input ml0" name="day_max">
						</div>
					</div>
				</div>
				
				<div class="item mt-20 w-100 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">剂量范围<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8 d-flex align-items-center justify-content-center">
							<input type="text" placeholder="请输入最小值" class="ivu-input mr-20 w-190px" name="dose_min">
							<input type="text" placeholder="请输入最大值" class="ivu-input w-190px" name="dose_max">
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">剂量显示/单次增量<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" placeholder="请输入数字" class="ivu-input ml0" name="dose">
						</div>
					</div>
				</div>
				<!--<div class="item mt-20 w-100 text-ff4d4f size-12">-->
				<!--	*注：此处涉及到配方时的逻辑，如确定了单次增量及剂量范围后，用户进行增减时受到相应限制-->
				<!--</div>-->
				
				<div class="hr w-100 "></div>
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">标签选择</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">适应症<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
								<i-select v-model="model18" filterable multiple allow-create name="cate2[]">
									
									<i-option v-for="(item,key) in cate2" :key="key" :value="item.value">{{ item.label }}</i-option>
								
								</i-select>
								<!--<select name="city" class="w-200px" lay-verify="required">-->
								<!--	<option value="">请选择</option>-->
								<!--	<option value="0">分类</option>-->
								<!--</select>-->
							</div>
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">其他标签</div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
								<i-select v-model="model19" filterable multiple allow-create name="cate3[]">
									<i-option v-for="item in cate3" :value="item.value">{{ item.label }}</i-option>
								</i-select>
								<!--<select name="city" class="w-200px" lay-verify="required">-->
								<!--	<option value="">请选择</option>-->
								<!--	<option value="0">其他标签</option>-->
								<!--</select>-->
							</div>
						</div>
					</div>
				</div>
				
				<div class="hr w-100 "></div>
				
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">Supplement Facts 展示</div>
				
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">成分名展示<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" class="ivu-input" placeholder="由中文/英文/数字/符号组成" name="facts_name">
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">%Daily Value<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" class="ivu-input" placeholder="请输入数字"  name="facts_daily">
						</div>
					</div>
				</div>
				
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div style="width: 230px;">
						<div class="size-14 item-text">Amout Per Serving<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input type="text" class="ivu-input" placeholder="请输入数字"  name="amount">
						</div>
					</div>
					<div style="margin-left: 20px;width: 150px;">
						<div class=" size-14 item-text">单位 <span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative " style="width: 150px;">
								<select name="facts_unit" class="w-200px" lay-verify="required">
									<option value="">点此选择单位</option>
									<option value="iu">iu</option>
									<option value="mg">mg</option>
									<option value="ml">ml</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">排序<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" class="ivu-input" placeholder="请输入数字"  name="sort">
						</div>
					</div>
				</div>
				
				<div class="hr w-100 "></div>
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">参考文献 References</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<textarea rows="7" style="width: 850px;" placeholder="请输入" class="ivu-input" name="references"></textarea>
				</div>
				
				<div class="hr w-100 "></div>
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">文件上传</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start ">
					<div class="cursor d-flex align-items-center justify-content-center flex-column filesft">
						<input id="image_input" type="text" value="" class="hide" name="image" maxlength="1">
						<!--上传前-->
						<span class="w-100 h-100 cursor hide">
								<label for="male" class="w-100 h-100 d-flex align-items-center justify-content-center flex-column cursor">
									<div><i class="icon iconfont iconicon-test size-24"></i></div>
									<div class="">上传缩略图</div>
								</label>
							</span>
						<!--上传后-->
						<span class="w-100 h-100 imgupdata">
								<span class="relative w-100 h-100 d-flex align-items-center justify-content-center">
									<img class="absolute w-100 image_img"  src="/images/zimg-logo.png" alt="">
									<div class="w-100 h-100 absolute imgupdatadel" style="background: #000;top: 0;left: 0;opacity:0.6"></div>
									<span class="text-center mt-30 imgupdatadel">
										<div class="relative" style="z-index: 3">
										  <label for="male">
											  <div class="ivu-btn ivu-btn-default ivu-btn-small" id="male">上传缩略图</div>
										  </label>
										</div>
										<span class="text-fff relative text-center pt-10 w-100  cursor imgdelete">删除</span>
									</span>
								</span>
							</span>
					
					</div>
					<div class="ml-20">仅限格式为 jpg、jepg、png的图片上传，仅限一张</div>
				</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start flex-column">
					<div class="w-100 d-flex align-items-center justify-content-start">
						<label class="ivu-btn ivu-btn-default d-flex align-items-center justify-content-center">
							<i class="icon iconfont iconicon-test"></i>
							上传文件
							<input type="file" class="hide upfile" multiple>
						</label>
						<div class="ml-20"> 格式不限，数量不限、大小不限</div>
					</div>
					
					<div class="mt-8 w-100 basic-updata-items" style="">
					
					</div>
				</div>
				
				
				<div class="hr w-100 "></div>
				
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
					
					<button class="ivu-btn-primary ivu-btn mr-20" type="submit">添加微片</button>
					<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">取消</a>
				</div>
			</div>
		</form>
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
	var app = new Vue({
		el     : '#app',
		data   : {
			message  : 'Hello Vue.js!',
			ismodel  : false,
			cf       : '',
			model18  : [],
			model19  : [],
			model20  : [],
			model21  : [],
			model25  : [],
			model26  : [],
			cate2: [
				<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca2): $mod = ($i % 2 );++$i;?>
				{
					value: '<?php echo htmlentities($ca2['id']); ?>',
					label: '<?php echo htmlentities($ca2['title']); ?>',
				},
				<?php endforeach; endif; else: echo "" ;endif; ?>
			],
			cate3: [
				<?php if(is_array($cate3) || $cate3 instanceof \think\Collection || $cate3 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca3): $mod = ($i % 2 );++$i;?>
				{
					value: '<?php echo htmlentities($ca3['id']); ?>',
					label: '<?php echo htmlentities($ca3['title']); ?>',
				},
				<?php endforeach; endif; else: echo "" ;endif; ?>
			],
			cogeditshow: false,
			pricingshow: false,
		},
		methods: {
			cogedit() {
				this.cogeditshow = !this.cogeditshow;
			},
			pricingedit() {
				this.pricingshow = !this.pricingshow
			},
			changemodel20: function (e) {
				
				this.cityList5 = [
					{
						value: e + 'New 点此选择编码',
						label: e + 'New Yo点此选择编码rk',
					},
					{
						value: '点此选择编码',
						label: '点此选择编码',
					},
					{
						value: 'Sydney',
						label: 'Sydney',
					},
					{
						value: 'Ottawa',
						label: 'Ottawa',
					},
					{
						value: 'Paris',
						label: 'Paris',
					},
					{
						value: 'Canberra',
						label: 'Canberra',
					},
				];
			},
		},
	});
</script>
<!-- <link href="/static/plug/layui/css/layui.css" rel="stylesheet"> -->
<link href="/system/css/layui-admin.css" rel="stylesheet">
<link href="/system/plugins/layui/css/layui.css" rel="stylesheet">
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/js/layuiList.js"></script>

<script>
	
	layui.use(['form','upload'], function () {
		var form = layui.form;
		var upload=layui.upload;
		form.on('select(test1)', function (data) {
			var value  = data.value;
			var option = $('.flcode').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flcode').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});
		form.on('select(test2)', function (data) {
			var value  = data.value;
			var option = $('.flname').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flname').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});
		form.on('select(test3)', function (data) {
			
			// $('.cfcode').empty();
			// $('.cfcode').append(
			// 	'<option value=""></option>' +
			// 	'<option value="0">编码</option>' +
			// 	'<option value="1">编码</option>' +
			// 	'<option value="2">编码</option>',
			// );
			
			var value  = data.value;
			var option = $('.cfcode').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.cfcode').append(apphtml);
			form.render('select');
		});
		
		form.on('select(test4)', function (data) {
			// console.log(data)
			// $('.cfname').empty();
			// $('.cfname').append(
			// 	'<option value=""></option>' +
			// 	'<option value="0">成分1</option>' +
			// 	'<option value="1">成分1</option>' +
			// 	'<option value="2">成分1</option>',
			// );
			
			var value  = data.value;
			var option = $('.cfname').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.cfname').append(apphtml);
			form.render('select');
		});
		// form.render(null, 'test1'); //更新 lay-filter="test1" 所在容器内的全部表单状态
		// form.render('select', 'test2'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		
	});
	$('.upfile').click(function () {
		$('.upfile').val('');
	});
	$('.upfile').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('file[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        :'<?php echo Url('file_upload'); ?>',
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code ==200){
					for (var i = 0; i < res.data.length; i++) {
						var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
							res.data[i].filename+
							'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
							'<input type="hidden" name="files[]" value="'+res.data[i].path+'">' +
							'</div></div>';
						$('.basic-updata-items').append(html);
					}
					layui.msg(res.msg);
				}else{
					var res = JSON.parse(data);
					layui.msg(res.msg);
				}
				
			}, error   : function (er) {
				console.log(er);
			},
		});
	});
	
	//图片类型验证
	function verificationPicFile(file) {
		var fileTypes = [".jpg", ".png",".jpeg"];
		var filePath = file;
		//当括号里面的值为0、空字符、false 、null 、undefined的时候就相当于false
		if(filePath){
			var isNext = false;
			var fileEnd = filePath.substring(filePath.indexOf(".",20));
			for (var i = 0; i < fileTypes.length; i++) {
				if (fileTypes[i] == fileEnd) {
					isNext = true;
					break;
				}
			}
			if (!isNext){
				layList.msg('不接受此文件类型');
				file = "";
				return false;
			}
			return true;
		}else {
			return false;
		}
	}
	//选择图片
	function changeIMG(index,pic){
		if(!verificationPicFile(pic)){
			return false;
		};
		$(".image_img").attr('src',pic);
		// $(".active").css('background-image',"url("+pic+")");
		$('#image_input').attr('value',pic);
	}
	function createFrame(title,src,opt){
		opt === undefined && (opt = {});
		return layer.open({
			type: 2,
			title:title,
			area: [(opt.w || 800)+'px', (opt.h || 550)+'px'],
			fixed: false, //不固定
			maxmin: true,
			moveOut:false,//true  可以拖出窗外  false 只能在窗内拖
			anim:5,//出场动画 isOutAnim bool 关闭动画
			offset:'auto',//['100px','100px'],//'auto',//初始位置  ['100px','100px'] t[ 上 左]
			shade:0,//遮罩
			resize:true,//是否允许拉伸
			content: src,//内容
			move:'.layui-layer-title'
		});
	}
	
	/**
	 * 上传图片
	 * */
	$('#male').on('click',function (e) {
		
		// $('.upload').trigger('click');
		createFrame('选择图片','<?php echo Url('widget.images/index'); ?>?fodder=image');
	})
	//   /**
	//    * 上传文件
	//    * */
	//   $('#upload').on('click',function (e) {
	//   	console.log(e)
	// fileUpload('upload');
	
	//   })
	/*删除上传图片*/
	$('.imgdelete').click(function () {
		$('#male').val('');
	});
	
	/*删除文件*/
	$(".basic-updata-items").on('click', '.updata-item-del', function () {
		$(this).parent().parent().parent().remove();
	});
	
	/* 添加活性成分*/
	$('.add-hxcf').click(function (e) {
		//价钱
		var rmbprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('rmbprice');
		var usdprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('usdprice');
		
		//成分
		var cf     = $(this).parent().prev().prev().prev().prev().children('select').val();
		var cftext = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").text();
		if (cf == '') {
			alert('成分为空');
			return false;
		}
		//编码
		var bm     = $(this).parent().prev().prev().prev().children('select').val();
		var bmtext = $(this).parent().prev().prev().prev().children('select').find("option:selected").text();
		if (bm == '') {
			alert('成分为空');
			return false;
		}
		// 剂量
		var jl = $(this).parent().prev().prev().children('input').val();
		if (jl == '') {
			alert('剂量为空');
			return false;
		}
		//单位
		var mg     = $(this).parent().prev().children('select').val();
		var mgtext = $(this).parent().prev().children('select').find("option:selected").text();
		if (mg == '') {
			alert('单位为空');
			return false;
		}
		var html = '<div class="hxcfitem w-100 d-flex align-items-center justify-content-around" style="height: 40px;">' +
			'<span class="hide cfsingledata" data-name='+cftext+' data-code='+bmtext+' data-dose='+jl+' data-unit='+mg+' data-rmbprice='+rmbprice+' data-usdprice='+usdprice+'></span>'+
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cftext + '"  name="ingre1['+cf+'][name]" type="hidden">' + cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bmtext + '" name="ingre1['+cf+'][code]" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" name="ingre1['+cf+'][dose]" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" name="ingre1['+cf+'][unit]" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>' +
			'</div>' +
			'</div>';
		$('.hxcflistitems').append(html);
		total();
		pricing();
	});
	/* 点击删除活性成分*/
	$(".hxcflist").on('click', '.rmhxcfitem', function () {
		$(this).parent().parent().remove();
		total();
		pricing();
	});
	
	
	/*添加辅料*/
	$('.add-fl').click(function (e) {
		//价钱
		var rmbprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('rmbprice');
		var usdprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('usdprice');
		
		//成分
		var cf     = $(this).parent().prev().prev().prev().prev().children('select').val();
		var cftext = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").text();
		if (cf == '') {
			alert('成分为空');
			return false;
		}
		//编码
		var bm     = $(this).parent().prev().prev().prev().children('select').val();
		var bmtext = $(this).parent().prev().prev().prev().children('select').find("option:selected").text();
		if (bm == '') {
			alert('成分为空');
			return false;
		}
		// 剂量
		var jl = $(this).parent().prev().prev().children('input').val();
		if (jl == '') {
			alert('剂量为空');
			return false;
		}
		//单位
		var mg     = $(this).parent().prev().children('select').val();
		var mgtext = $(this).parent().prev().children('select').find("option:selected").text();
		if (mg == '') {
			alert('单位为空');
			return false;
		}
		
		var html = '<div class="hxcfitem w-100 d-flex align-items-center justify-content-around" style="height: 40px;">' +
			'<span class="hide flsingledata" data-name='+cftext+' data-code='+bmtext+' data-dose='+jl+' data-unit='+mg+' data-rmbprice='+rmbprice+' data-usdprice='+usdprice+'></span>'+
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cftext + '" name="ingre2['+cf+'][name]" type="hidden">' +
			cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bmtext + '" name="ingre2['+cf+'][code]" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" name="ingre2['+cf+'][dose]" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" name="ingre2['+cf+'][unit]" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmflitem"></i>' +
			'</div>' +
			'</div>';
		$('.fllistitems').append(html);
		total();
		pricing();
	});
	/* 点击删除辅料*/
	$(".fllistitems").on('click', '.rmflitem', function () {
		$(this).parent().parent().remove();
		total();
		pricing();
	});
	//点击-成分成本价计算
	$('.coginput-btn').click(function () {
		$('.cogtotalrmbpriceinput').val('');
		$('.cogtotalusdpriceinput').val('');
		$('#coginput:checked').attr('checked', false);
		total();
		pricing();
	});
	$('.pricinginput-btn').click(function () {
		$('.pricingpricermbinput').val('');
		$('.pricingpriceusdinput').val('');
		$('#pricinginput:checked').attr('checked', false);
		pricing();
	});
	
	
	
	//cog 成本价
	function total() {
		//是否已经编辑
		if($('#coginput:checked').val() == 1){
			return false
		}
		var singledataitemsrmbprice = 0;
		var singledataitemusdprice  = 0;
		// data-name='+cftext+' data-code='+bmtext+' data-dose='+jl+' data-unit='+mg+' data-rmbprice='+rmbprice+' data-usdprice='+usdprice+'
		//活性成分
		var cfsingledataitems =$('.cfsingledata');
		for (var i = 0; i < cfsingledataitems.length; i++) {
			singledataitemsrmbprice += parseFloat(cfsingledataitems[i].getAttribute('data-dose')) * parseFloat(cfsingledataitems[i].getAttribute('data-rmbprice'));
			singledataitemusdprice += parseFloat(cfsingledataitems[i].getAttribute('data-dose')) * parseFloat(cfsingledataitems[i].getAttribute('data-usdprice'));
		}
		//辅料成分
		var flsingledataitems = $('.flsingledata');
		for (var i = 0; i < flsingledataitems.length; i++) {
			singledataitemsrmbprice += parseFloat(flsingledataitems[i].getAttribute('data-dose')) * parseFloat(flsingledataitems[i].getAttribute('data-rmbprice'));
			singledataitemusdprice += parseFloat(flsingledataitems[i].getAttribute('data-dose')) * parseFloat(flsingledataitems[i].getAttribute('data-usdprice'));
		}
		singledataitemsrmbprice = singledataitemsrmbprice > 0 ? singledataitemsrmbprice.toFixed(4) : 0;
		singledataitemusdprice = singledataitemusdprice > 0 ? singledataitemusdprice.toFixed(4) : 0
		$('.cogtotalrmbprice').html(singledataitemsrmbprice);
		$('.cogtotalusdprice').html(singledataitemusdprice);
	}
	//Pricing 价格计算
	function pricing() {
		if($('#pricinginput:checked').val() == 1){
			return false
		}
		var machiningrmb     = "<?php echo htmlentities($config['microchip_processing_rmb']); ?>";//微片加工费-交易设置中获取
		var machiningusd     = "<?php echo htmlentities($config['microchip_processing_usd']); ?>";//微片加工费-交易设置中获取
		var tariff           = "<?php echo htmlentities($config['tariff']); ?>";//关税
		tariff =tariff >0 ? tariff /100 :0;
		var cogtotalrmbprice = parseFloat($('.cogtotalrmbprice').html()) > 0 ? parseFloat($('.cogtotalrmbprice').html()) : 0;
		var cogtotalusdprice = parseFloat($('.cogtotalusdprice').html()) > 0 ? parseFloat($('.cogtotalusdprice').html()) : 0;
		var weight           = parseFloat($('.weight').val()) > 0 ? parseFloat($('.weight').val()) : 0;
		var pricingpricermb  = ((parseFloat(cogtotalrmbprice) + ((machiningrmb * weight) / 1000))) * (1 + parseFloat(tariff));
		var pricingpriceusd  = ((parseFloat(cogtotalusdprice) + ((machiningusd * weight) / 1000))) * (1 + parseFloat(tariff));
		pricingpricermb =pricingpricermb >0 ? pricingpricermb.toFixed(4) : 0;
		pricingpriceusd =pricingpriceusd >0 ? pricingpriceusd.toFixed(4) : 0;
		$('.pricingpricermb').html(pricingpricermb);
		$('.pricingpriceusd').html(pricingpriceusd);
		// （COG成本价+（A*微片重量mg）/1000）*（1+B），A为微片加工费，B为关税（A和B均在系统设置-交易设置中获取）。可以手动修改
	}
	
	$('.weight').blur(function () {
		pricing();
	})
	
	$('.cogtotalrmbpriceinput').blur(function () {
		var singledataitemsrmbprice = $(this).val();
		$('.cogtotalrmbprice').html(singledataitemsrmbprice);
		pricing();
	});
	$('.cogtotalusdpriceinput').blur(function () {
		var singledataitemusdprice = $(this).val();
		$('.cogtotalusdprice').html(singledataitemusdprice);
		pricing();
	});
	
	$('.pricingpricermbinput').blur(function () {
		var singledataitemsrmbprice = $(this).val();
		$('.pricingpricermb').html(singledataitemsrmbprice);
	});
	$('.pricingpriceusdinput').blur(function () {
		var singledataitemusdprice = $(this).val();
		$('.pricingpriceusd').html(singledataitemusdprice);
	});
	
	
	total();
	pricing();


</script>
