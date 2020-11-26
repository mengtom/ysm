<?php /*a:5:{s:59:"F:\WWW\yeshai\app\platform\view\crm\institution\paitent.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\header.php";i:1596013767;s:58:"F:\WWW\yeshai\app\platform\view\public\header_navigate.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\footer.php";i:1592563283;s:55:"F:\WWW\yeshai\app\platform\view\public\inner_footer.php";i:1595304974;}*/ ?>
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

	<title>机构-患者列表</title>

	<div class="h-100 w-100 crm-patient-p" id="app">
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
		<div class="w-1200 mt-80 mb-10 text-666 size-14">
			<a class="text-57">首页 /</a>  </a> <span class="text-c01f5e">患者管理 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span >患者信息:</span>
								<input class="ivu-input ml-8 w-300px"  placeholder="请输入" type="text" v-model="keyword">
							</div>

							<div class="h-100  d-flex align-items-center justify-content-start ml-20">
								<span >所属机构:</span>
								<input class="ivu-input ml-8 w-300px" placeholder="请输入" type="text">
							</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start mt-20">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span >所属医生:</span>
								<input class="ivu-input ml-8 w-300px"  placeholder="请输入" type="text" v-model="doctor">
							</div>
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 125px;">账号开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13" v-model="time">
								</div>
							</div>
						</div>
					</div>

					<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="button" class="ivu-btn ivu-btn-primary mr-10" @click="getitems">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">患者列表</span> </span>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default" style="overflow: initial">
					<tbody class="ivu-table-tbody">

					<tr class="ivu-table-header cursor">
						<th class="pl-30 bg-f6 w-100px">编码</th>
						<th class="bg-f6 w-100px">患者姓名</th>
						<th class="bg-f6 w-150px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-250px">所属机构/医生</th>
						<th class="bg-f6 w-100px">处方数量</th>
						<th class="bg-f6 w-100px">成交订单</th>
						<th class="bg-f6 w-100px">成交金额</th>
						<th class="bg-f6 w-150px">最后一次订单时间</th>
					</tr>

					<tr v-for="i in data" class="cursor text-57">
						<td class="pl-30 ckitem">{{i.uid}}</td>
						<td class="ckitem">{{i.nickname}}</td>
						<td class="ckitem">{{i.mobile}}</td>
						<td class="ckitem">{{i.add_time}}</td>
						<td class="ckitem">{{i.institu_name}}</td>
						<td class="ckitem ">1000</td>
						<td class="ckitem">{{i.total_order}}</td>
						<td class="ckitem">{{i.total_price}}</td>
						<td class="ckitem">2020-00-00</td>
					</tr>
					</tbody>
				</table>

			</div>

			<!--page 分页-->

			<div class="w-100 d-flex align-items-center justify-content-end">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
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



<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">

	layui.use('laydate', function () {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem   : '#test13'
			, type : 'datetime'
			, range: true,
		});
	});


	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			date1  : '',
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '2019.1.1',
			data:[],
			pagenum : 1,//页码数
			pagesize: 10,//每页条数
			total   : 0,
			keyword : '',
			time : '',
			doctor:'',
		},
		methods: {
			// 页码改变的回调，返回改变后的页码
			pagechange(e) {
				this.pagenum = e;
				// this.listnum = e * 3;

				this.getitems();
			},
			// 切换每页条数时的回调，返回切换后的每页条数
			pagesizechange(e) {
				this.pagesize = e;
				this.getitems();
			},
			// 获取列表数
			getitems() {
				var data = {
					page : this.pagenum,
					limit: this.pagesize,
					keyword : this.keyword,
					time : this.time,
					doctor : this.doctor,
					id:'<?php echo htmlentities($id); ?>',
				};
				axios.post("<?php echo Url('get_paitent_list'); ?>", data).then((e) => {
					e=e.data;
					this.data = e.data.data;
					this.total   = e.data.count;
				});
			},
		},
		created() {
			this.getitems();
		},
	});


</script>

