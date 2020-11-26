<?php /*a:5:{s:55:"F:\WWW\yeshai\app\institu\view\doctor\doctor\create.php";i:1597374943;s:48:"F:\WWW\yeshai\app\institu\view\public\header.php";i:1597219200;s:57:"F:\WWW\yeshai\app\institu\view\public\header_navigate.php";i:1603187334;s:48:"F:\WWW\yeshai\app\institu\view\public\footer.php";i:1592563283;s:54:"F:\WWW\yeshai\app\institu\view\public\inner_footer.php";i:1597309734;}*/ ?>
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
	<title>添加医生</title>

	<div id="app" class="mi-doctor-basic">
		<!--头部-->
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
		<!--头部-->
		<div class="w-1200 tip mt-80  text-999 size-14">
			<span>首页 /</span> <a class="text-999" href="index.html"> 医生管理  /</a> <span class="text-c01f5e">添加医生 </span>
		</div>
		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">添加医生</span>
		</div>
		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="<?php echo Url('save'); ?>" method="post">
				<div class="wp-edit-body pl-30 pr-30  h-100 pt-20">

					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">医生姓名<span class="text-ff4d4f">*</span></div>
							<div class="w-100 mt-8">
								<input style="width: 400px;" type="text" name="name" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
							</div>
						</div>

						<div class="item mt-20 w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input style="width: 400px;" type="text" name="account" placeholder="由8~16位英文/数字/符号组成" class="ivu-input  w-400px">
								</div>
							</div>
							<div class="ml-50">
								<div class=" size-14 item-text">登录密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<i-input class="w-400px" v-model="value5" name="password" type="password" password placeholder="由8~16位英文/数字/符号组成"/>
								</div>
							</div>
						</div>
						<div class="item mt-20 w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">联系电话<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" name="refer_mobile" placeholder="由数字/符号组成" class="ivu-input w-400px">
								</div>
							</div>
							<div class="ml-50">
								<div class="size-14 item-text">邮箱<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" name="refer_email" placeholder="由英文/数字/符号组成" class="ivu-input w-400px">
								</div>
							</div>
						</div>

					</div>
					<div class="hr w-100 "></div>
					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">添加医生</button>
						<a href="index.html" class="ivu-btn-default ivu-btn">取消</a>
					</div>
				</div>
			</form>
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



<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			value5 : '',
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
</script>