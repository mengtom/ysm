<?php /*a:6:{s:59:"F:\WWW\yeshai\app\admin\view/ysm\crm\crm_platform\basic.php";i:1602842619;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1603854727;s:54:"F:\WWW\yeshai\app\admin\view/ysm\public\layui_page.php";i:1603854936;}*/ ?>
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

	<title>平台管理-基本信息</title>
	<div id="app" class="cmr-basic">
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
			<span>首页 /</span> <a class="text-57" href="index.html">平台管理 </a> <span class="text-c01f5e">/ 基本信息 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">基本信息</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="<?php echo Url('update',array('pid'=>$platform['id'])); ?>" method="post">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="size-16 fw text-c01f5e ">基础信息</div>

					<div class="items w-100">
						<div class="item w-100 ">
							<div class=" size-14 item-text">平台名称<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input style="width: 400px;" type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0" name="p_name" value="<?php echo htmlentities($platform['p_name']); ?>">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" value="<?php echo htmlentities($platform['account']); ?>">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">重置密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="repassword">
									<i-input class="w-400px" v-model="value5" name="repassword" type="password" password placeholder="由英文/数字/符号组成" />
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">对接人<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0" name="referrer" value="<?php echo htmlentities($platform['referrer']); ?>">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">联系方式<span class="text-ff4d4f">*</span></div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="refer_mobile" value="<?php echo htmlentities($platform['refer_mobile']); ?>">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">邮箱</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="refer_email" value="<?php echo htmlentities($platform['refer_email']); ?>">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">紧急联系人</div>
								<div class="w-100">
									<input  type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0 w-400px" name="ecp" value="<?php echo htmlentities($platform['ecp']); ?>">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">紧急联系方式</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="ecm" value="<?php echo htmlentities($platform['ecm']); ?>">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">邮箱</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="ece" value="<?php echo htmlentities($platform['ece']); ?>">
										</div>
									</div>
								</div>
						</div>
					</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>
					<div style="margin-top: 18px;"><span class="size-16 fw text-c01f5e">文件上传</span> <span class="ml-20">jpg、png、jepg、 JPG、PNG、JEPG、pdf、PDF</span></div>
					<div class="item mt-20 w-100 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text fw">营业执照</div>
							<div class="w-400px mt-10">
								<div class="mt-8 basic-updata-items1" style="">
								<?php if($platform['business_license']): ?>

										<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span><?=pathinfo($platform['business_license'],PATHINFO_BASENAME)?></span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi  size-12"></i>
											</span>
											<input type="hidden" name="business_license" value="<?php echo htmlentities($platform['business_license']); ?>">
										</div>
									</div>

								<?php else: ?>
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaochu"></i>
										上传文件
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" type="file" class="hide upfile">
								</label>
								<?php endif; ?>
								</div>
							</div>
						</div>

						<div style="margin-left: 50px;">
							<div class="size-14 item-text fw">合作协议</div>
							<div class="w-400px mt-10">
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaochu"></i>
										上传文件
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" multiple name="" type="file" class="hide upfile2">
								</label>
								<div class="mt-8 basic-updata-items2" style="">
									<?php if(is_array($filename) || $filename instanceof \think\Collection || $filename instanceof \think\Paginator): $i = 0; $__LIST__ = $filename;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?>
									<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span><?php echo htmlentities($f['filename']); ?></span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi absolute size-12"></i>
											</span>
											<input type="hidden" name="ca[]" value="<?php echo htmlentities($f['path']); ?>">
										</div>
									</div>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</div>

					</div>

					<div class="hr w-100 "></div>

					<div class="size-16 fw text-c01f5e mt-10 ">财务信息</div>
					<div class="items w-100">
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="w-400px">
								<div class="size-14 item-text">余额（<?php echo htmlentities($platform['currency']); ?>）</div>
								<div class="balance"><?php if($platform['currency'] == '人民币'): ?>￥<?php else: ?>$<?php endif; ?><?php echo htmlentities($platform['money']); ?></div>
								<div class="w-100 mt-10">
									<button type="button" style="width: 88px;" class="ivu-btn-primary ivu-btn add-mode">充值</button>
									<a href="<?php echo Url('rechargeList',array('id'=>$platform['id'])); ?>" type="button" style="width: 88px;" class="ivu-btn-default ivu-btn ml-20">充值记录</a>
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">月度对账单</div>
								<div class="w-100 d-flex align-items-start justify-content-start" >
									<div class="w-150px">
										<input type="text" class="layui-input" id="test13" placeholder="选择年月" value="">
									</div>
								</div>
								<div class="mt-10">
									<button type="button" class="ivu-btn-default ivu-btn " lay-submit="export" lay-filter="export">导出月度对账单</button>
								</div>
							</div>
						</div>

					</div>

					<div class="hr w-100 "></div>

					<div class="size-16 fw text-c01f5e mt-10 ">结算信息</div>
					<div class="items w-100">
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="w-400px">
								<div class="size-14 item-text d-flex align-items-center">
									<div class="closetextwidtn" >微片毛利率：</div>
									<input type="number" max="99" placeholder="请输入" class="ivu-input w-100px" name="default_discount" value="<?php echo htmlentities($platform['default_discount']); ?>">
								</div>
								<div class="w-400px size-12 text-57 bg-f4 mt-8 accounttip">
									折扣价为基础零售价的倍数。如果不单独为该平台设置结算价格，则所有结算价以此价格为准
								</div>
								<div class="text-ff4d4f size-12 mt-20 mb-10">*以下三项不修改则取系统设置中的值</div>
								<div class="size-14 item-text d-flex align-items-center">
									<div class="closetextwidtn">单剂包材结算价：</div>
									<input type="text" placeholder="请输入" class="ivu-input w-100px" name="single_dose" value="<?php echo htmlentities($platform['single_dose']); ?>"> <span style="margin-left: 4px;">元</span>
								</div>
								<div class="size-14 item-text d-flex align-items-center">
									<div class="closetextwidtn">筒形包材结算价：</div>
									<input type="text" placeholder="请输入" class="ivu-input w-100px" name="barrel_price" value="<?php echo htmlentities($platform['barrel_price']); ?>"> <span style="margin-left: 4px;">元</span>
								</div>
								<div class="size-14 item-text d-flex align-items-center">
									<div class="closetextwidtn">外包装包材结算价：</div>
									<input type="text" placeholder="请输入" class="ivu-input w-100px" name="out_pack" value="<?php echo htmlentities($platform['out_pack']); ?>"> <span style="margin-left: 4px;">元</span>
								</div>
							</div>
							<div  style="margin-left: 50px;">
								<div class=" size-14 item-text">运费结算价：</div>
								<div class="w-400px wind">
									<div style="height: 30px;" class="bg-f6 w-100 d-flex align-items-center justify-content-center">
										<div class="w-100px ellipsis-1 text-center fw">首重(克)</div>
										<div class="w-100px ellipsis-1 text-center fw">首费(元)</div>
										<div class="w-100px ellipsis-1 text-center fw">续重(克)</div>
										<div class="w-100px ellipsis-1 text-center fw">续费(元)</div>
									</div>
									<div  class="w-100 d-flex align-items-center justify-content-center h-38">
										<div class="w-100px ellipsis-1 text-center"><input type="text" class="ivu-input text-center" placeholder="请输入" name="first_weight" value="<?php echo htmlentities($platform['first_weight']); ?>"></div>
										<div class="w-100px ellipsis-1 text-center"><input type="text" class="ivu-input text-center" placeholder="请输入" name="first_payment" value="<?php echo htmlentities($platform['first_payment']); ?>"></div>
										<div class="w-100px ellipsis-1 text-center"><input type="text" class="ivu-input text-center" placeholder="请输入" name="re_weight" value="<?php echo htmlentities($platform['re_weight']); ?>"></div>
										<div class="w-100px ellipsis-1 text-center"><input type="text" class="ivu-input text-center" placeholder="请输入" name="re_payment" value="<?php echo htmlentities($platform['re_payment']); ?>"></div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="hr w-100 "></div>

					<div class="size-16 fw text-c01f5e mt-10 ">用户及订单信息</div>
					<div class="items w-100">
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="d-flex align-items-start justify-content-start useroder">
								<div class="w-50 h-100">
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">下属机构数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['institu_c']); ?></div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">下属独立医生数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['doctor']); ?></div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">下属医生总数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['doctor_c']); ?></div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">患者数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['patient_c']); ?></div>
									</div>
								</div>
								<div class="w-50 h-100">
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">开具处方数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['order_prescript_c']); ?></div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">目前成单数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['order_c']); ?></div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">成交金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"><?php echo htmlentities($platform['order_price_c']); ?></div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw"></div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20"></div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="hr w-100 "></div>


					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">保存</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">取消</a>
					</div>
				</div>

			</form>
		</div>

		<!--充值-->
		<div style="display: none" class="modal-root label-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 460px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">充值</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="<?php echo Url('update_recharge',array('pid'=>$platform['id'])); ?>" method="post">

					<div class="items d-flex align-items-center justify-content-start flex-column   ">
						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<!--结算货币不可更改，添加平台时已指定-->
							<span style="width: 90px;">结算货币：</span><?php echo htmlentities($platform['currency']); ?>
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">充值金额：</span><input type="number" placeholder="请输入" name="money" value="0" class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">收款方式：</span><input type="text" placeholder="请输入" name="payment"  class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">流水单号：</span><input type="text" placeholder="请输入" name="code" class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<div style="width: 90px;">备  注：</div>
							<div>
								<textarea placeholder="请输入" style="width: 327px;height: 68px;" name="mark" class="ivu-input ivu-input-default"></textarea>
							</div>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">提交</button>
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



<!-- <link href="/static/plug/layui/css/layui.css" rel="stylesheet"> -->
<link href="/system/css/layui-admin.css" rel="stylesheet">
<link href="/system/plugins/layui/css/layui.css" rel="stylesheet">
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/js/layuiList.js"></script>

<!-- <script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			value5: '',
		},
		methods: {
			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});
</script> -->
<script>
 //实例化form
    layList.form.render();
	//excel下载
    layList.search('export',function(where){
    	var time=$("#test13").val();
    	if(!time){
    		layList.msg('请选择年月');
    		return false;
    	}
        location.href=layList.U({m:'admin',c:'crm.crmplatform',a:'recharge_list',p:{excel:1,time:time,id:<?php echo htmlentities($platform['id']); ?>}});
    })
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'month'
		});
	})



	//弹窗
	$('.closemode').click(function () {
		$('.modal-root').hide();
	});

	$('.add-mode').click(function () {
		$('.modal-root').show();
	});
	// 上传文件先清空
	$('.upfile').click(function () {
		$('.upfile').val('');
	});
	$('.upfile').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile")[0].files;
		data.append('file', files[0]);
		$.ajax({
			url        : "<?php echo Url('upload'); ?>",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code == 200){
					var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
					res.data.filename+
					'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
					'<input type="hidden" value="'+res.data.path+'" name="business_license">' +
					'</div></div>';
					$('.basic-updata-items1').append(html);
					$('.upfile').parent().hide();
				}
			}, error   : function (er) {
				console.log(er);
			},
		});
	});

	// 上传文件先清空else{
				// 	layList.msg(data.msg)
				// }
	$('.upfile2').click(function () {
		$('.upfile2').val('');
	});
	$('.upfile2').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile2")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('file[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        : "<?php echo Url('file_upload'); ?>",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code == 200){
					for (var i = 0; i < res.data.length; i++) {
						var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
							res.data[i].filename+
							'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
							'<input type="hidden" value="'+res.data[i].path+'" name="ca[]">' +
							'</div></div>';
						$('.basic-updata-items2').append(html);
					}
				}else{
					layList.msg(data.msg)
				}
			}, error   : function (er) {
				console.log(er);
			},
		});
	});

</script>
