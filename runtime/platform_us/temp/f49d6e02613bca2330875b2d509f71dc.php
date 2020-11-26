<?php /*a:5:{s:61:"F:\WWW\yeshai\app\platform_us\view\crm\crm_doctor\paitent.php";i:1606210898;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
 <!--    <title>后台-首页</title> -->
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/view.css">
<!--     <link rel="stylesheet" href="/ysm/static/css/pages/menu.css"> -->
    <link rel="stylesheet" href="/ysm/static/css/pages/search.css">
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/modules/layer/default/layer.css">
    <link rel="stylesheet" href="/ysm/static/css/common.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/p-menu.css">
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->

	<title>医生管理-患者管理</title>
	<div class="h-100 w-100 crm-patient-p" id="app">
		<!--头部-->
		<!--头部-->
        <div class="p-topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-between">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/p-logo-en.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start">
                    <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="index.html" class="leftname">Home</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="<?php echo Url('microchip.microchipProduct/index'); ?>" class="leftname">Microtabs</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="<?php echo Url('ts.ts/index'); ?>" class="leftname">Formulation Managment</a>
                            </div>
                        </li>


                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname ">CRM</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.institution/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Cooperation Organization Management
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.crmDoctor/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Independent Doctors Management
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.crmPatient/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Patients Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname">Orders Managment</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.CrmOrder/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    Order List
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('crm.CrmOrder/index',array('type'=>1)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Script Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <a href="" class="leftname">Statistics</a>
                            </div>
                        </li>

                        <li class="ivu-menu-submenu fw">
                            <div class="ivu-menu-submenu-title">
                                <div class="leftname">Setting</div>
                                <div class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></div>
                            </div>
                            <div class="ivu-select-dropdown bg-c01f5e" style="display:none;">
                                <ul class="ivu-menu-drop-list">
                                    <li class="ivu-menu-item-group ">
                                        <ul>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.systemConfig/index'); ?>" class="w-100 h-100 text-fff text-center">
                                                    System Setting
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
                                                    Decentralization System
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.systemConfig/index',array('type'=>1,'tab_id'=>2)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Official Account Binding
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="<?php echo Url('setting.settingPatient/index',array('type'=>2,'tab_id'=>4)); ?>" class="w-100 h-100 text-fff text-center">
                                                    Payment Binding
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
                </div>
                <div class="top_right w-250px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27  w-100px ellipsis-1" href=""><?php echo htmlentities($_platform['p_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?></a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">Logout</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">Home /</a> <a href="index.html" class="text-57">Independent Doctors Management /</a> <span class="text-c01f5e">Subordinate patients </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="">
					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-wrap mt-20 mb-20">

					<div class="h-100 w-300px mr-30 mb-10">
						<div class="w-100">Patient information</div>
							<input class="ivu-input w-100 mt-8"  placeholder="Please enter" type="text" v-model="keyword">
						</div>
					<div class="h-100 w-300px mr-30 mb-10">
						<div class="w-100">Register time</div>
						<div class="w-100 mt-8">
								<input class="ivu-input" type="text" placeholder="Star → End" v-model="time" id="test13">
							</div>
						</div>
					</div>
					<div class="w-250px h-100 mt-30  d-flex align-items-start justify-content-end ">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20 mt-20">Reset</button>
						<button type="button" class="ivu-btn ivu-btn-primary mr-20 mt-20" @click="getitems">Filter</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">Subordinate Patients List</span><span>(<?php echo htmlentities($name); ?>)</span> </span>
			</div>

			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default entbableth" style="overflow: initial">
				<tbody class="ivu-table-tbody">

					<tr class="ivu-table-header cursor">
						<th class="bg-f6 text-center w-70px">No.</th>
						<th class="bg-f6 w-100px">Name</th>
						<th class="bg-f6 w-150px">Contact number</th>
						<th class="bg-f6 w-100px">Register time</th>
						<th class="bg-f6 w-250px">Affiliated organization/doctor</th>
						<th class="bg-f6 w-100px">Number of prescription</th>
						<th class="bg-f6 w-100px">Completed orders</th>
						<th class="bg-f6 w-100px">Total turnover</th>
						<th class="bg-f6 w-150px">Recent order time</th>
					</tr>
					<tr v-for="i in data" class="cursor text-57">
						<td class="pl-30 ckitem">000</td>
						<td class="ckitem">平台名称 </td>
						<td class="ckitem">15123456</td>
						<td class="ckitem">2020-00-00</td>
						<td class="ckitem">平台名称</td>
						<td class="ckitem ">所属平台</td>
						<td class="ckitem">1000</td>
						<td class="ckitem">500</td>
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
			, range: true
			,change: function(value, date, endDate){
    			app.$data.time=value;
  			}
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
			doctor : '',
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
