<?php /*a:5:{s:57:"F:\WWW\yeshai\app\platform\view\crm\crm_doctor\create.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\header.php";i:1596013767;s:58:"F:\WWW\yeshai\app\platform\view\public\header_navigate.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\footer.php";i:1592563283;s:55:"F:\WWW\yeshai\app\platform\view\public\inner_footer.php";i:1595304974;}*/ ?>
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

	<title>添加医生</title>

	<div id="app" class="crm-edit-p">
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
		<div class="w-1200  mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 独立医生管理  /</a> <span class="text-c01f5e">添加医生 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">添加医生</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="<?php echo Url('save'); ?>" method="post">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="items w-100">
						<div class="item w-100">
							<div class=" size-14 item-text">医生名称<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input style="width: 400px;" type="text" name="name" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="account" placeholder="由8~16位英文/数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">登录密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<i-input class="w-400px" v-model="value5" name="password" type="password" password placeholder="由英文/数字/符号组成"/>
								</div>
							</div>
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">联系方式<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="refer_mobile" placeholder="由数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">邮箱</div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="refer_email" placeholder="由英文/数字/符号组成" class="ivu-input ml0">
								</div>
							</div>
						</div>
						<div class="hr w-100 "></div>
						<div class="size-16 fw text-c01f5e mt-10 ">交易信息</div>
						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class="size-14 item-text">所属分组</div>
								<div class="w-400px">
									<select name="group" class="w-400px">
										<option value="">请选择</option>
										<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($g['id']); ?>"><?php echo htmlentities($g['name']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start mb-30">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">添加机构</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="submit">取消</a>
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
<script>
	/*删除文件*/
	$(".basic-updata-items").on('click', '.updata-item-del', function () {
		$(this).parent().parent().parent().remove();
	});

</script>
