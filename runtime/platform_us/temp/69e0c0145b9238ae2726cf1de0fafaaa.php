<?php /*a:6:{s:59:"F:\WWW\yeshai\app\platform_us\view\crm\crm_order\script.php";i:1606275198;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1606215127;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1595310927;}*/ ?>
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

	<title>CMR-列表-处方管理</title>
<div class="h-100 w-100 cmr-recipe" id="app">
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
                                                <a href="<?php echo Url('crm.CrmOrder/script',array('type'=>1)); ?>" class="w-100 h-100 text-fff text-center">
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
		<a class="text-57">Home /</a> <a href="index.html" class="text-57">Cooperation Organization Management </a> <span class="text-c01f5e">/ View  Scripts</span>
	</div>

	<!--Search区-->
	<div class="w-1200 relative" style="border: 1px solid #d9d9d9;z-index: 1">
		<div class="w-100 com-search" style="border-bottom: 2px solid #f0f0f0;margin-top: 0;">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-wrap mt-20 mb-20">

						<div class="h-100 w-300px mr-30 mb-10">
							<div >Script name</div>
							<input class="ivu-input w-100 mt-8" placeholder="Please enter" type="text" v-model="where.script_name">
						</div>
						<div class="h-100 w-300px mr-30 mb-10">
							<div class="w-100">Doctor/Organization information</div>
							<input class="ivu-input w-100 mt-8" placeholder="Please enter" type="text" v-model="where.institu">
						</div>

						<div class="h-100 w-300px mr-30 mb-10">
							<div>Script time</div>
							<div class="iw-100 mt-8">
								<input class="ivu-input" type="text" placeholder="Star → End"  id="test13" v-model="where.time">
							</div>
						</div>
						<div class="h-100 w-200px mr-30 mb-10">
							<div>Script status</div>
							<div class="w-100 mt-8">
								<i-select name="status"  v-model="where.status">
									<i-option value="">Select</i-option>
									<i-option value="0">Available</i-option>
									<i-option value="1">Read</i-option>
								</i-select>
							</div>
						</div>
					</div>

					<div class="w-150px h-100 mt-30  d-flex align-items-start justify-content-end ">
						<button type="reset"  @click="reset()" class="ivu-btn ivu-btn-default mr-20 mt-20">Reset</button>
						<button type="button"  class="ivu-btn ivu-btn-primary mr-20 mt-20" @click="getitems">Search</button>
					</div>
				</form>
			</div>
		</div>
		<!--列表-->
		<div class="w-100 label-list">

			<div class="w-100 list-title d-flex align-items-center justify-content-between pt-20 bg-fff mt-10">
				<span class="size-16  ml-20"><span class="fw">Scripts List</span> </span>
			</div>

			<!--表格-->
			<div class="w-100 table bg-fff pt-10">
				<div class="t-table" style="width: 1160px;margin: auto">

					<div class="w-100 bg-f6 d-flex align-items-center justify-content-start text-57" style="height: 32px;margin: auto;border: 1px solid #d9d9d9">
						<div class="text-center w-438">Script information</div>
						<div class="text-center w-180">Script time</div>
						<div class="text-center w-180">Username</div>
						<div class="text-center w-180">Doctor's name</div>
						<div class="text-center w-180">Script status</div>
					</div>

					<div v-for="i in items" class="w-100 d-flex align-items-center justify-content-start flex-column t-tabl-top">
						<div class="w-100 t-tabl-top-title">
							<span class="ml-20 fw">Script No.：{{i.order_sn}}</span>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start t-tabl-top-centen">
							<div class="h-100 d-flex align-items-center pl-20 w-438"> {{i.order_name}}</div>
							<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.add_time}}</div>
							<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.real_name}}</div>
							<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.doctor_name}}</div>
							<div class="h-100 d-flex align-items-center justify-content-center w-180 bl">{{i.status == 1 ? 'Check':'Waiting for a check'}}</div>
						</div>

						<div class="w-100" style="display:none">
							<div class="" style="width: 1128px;margin: auto">
								<div class="w-100 text-57 mt-8">
									<span>Types of microtabs：{{i.micro_cate_count}}</span>
									<span class="ml-20">Total number of microtabs：{{i.micro_num}}</span>
									<span class="ml-20">Single dose price：{{i.price}}</span>
									<span class="ml-20">Number of daily taking times：{{i.taking_quency}}</span>
									<span class="ml-20">Cycle：{{i.taking_cycle}}</span>
									<span class="ml-20">Total price：{{i.total_price}}</span>
								</div>
								<div class="w-100 ivu-table-wrapper ivu-table-wrapper-with-border">
									<table class="ivu-table  ivu-table-default ivu-table-border entbableth" style="overflow: initial">
										<tbody class="ivu-table-tbody">
										<tr class="ivu-table-header">
											<th class="bg-f4 text-center text-57 t-table-td">Microtabs No.</th>
											<th class="bg-f4 text-center text-57 t-table-td">Microtabs name</th>
											<th class="bg-f4 text-center text-57 t-table-td">Total dose display</th>
											<th class="bg-f4 text-center text-57 t-table-td">Quantity</th>
											<th class="bg-f4 text-center text-57 t-table-td">Unit price($)</th>
											<th class="bg-f4 text-center text-57 t-table-td">Single dose price($)</th>
										</tr>
										<tr class="ivu-table-header" v-for="m in i._info">
											<td class="text-center text-57 t-table-td">{{m.micro_code}}</td>
											<td class="text-center text-57 t-table-td">{{m.micro_name}}</td>
											<td class="text-center text-57 t-table-td">{{m.total_dose}}</td>
											<td class="text-center text-57 t-table-td">{{m.num}}</td>
											<td class="text-center text-57 t-table-td">{{m.total_price}}</td>
											<td class="text-center text-57 t-table-td">{{m.micro_price}}</td>
										</tr>
										</tbody>
									</table>

								</div>
							</div>

						</div>

						<div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 42px;">
							<span class="text-c01f5e cursor unfold" onclick="unfold(this)" data-id="1"><i class="icon iconfont iconxiangxia_hei"></i> Details</span>
						</div>
					</div>


				</div>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between bg-fff">
				<a href="index.html" class="ivu-btn ivu-btn-default ml-20">Return</a>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total"/>
			</div>

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

<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">
	layui.use("laydate", function () {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem   : "#test13"
			, type : "datetime"
			, lang : "en"
			, range: true,
		});
	});
	var script_name='<?=$script_name?>';
    var orderCount=<?=json_encode($orderCount)?>,status=<?=$status ? $status : "''"?>;
	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			ismodel: false,
            items:[],
			total:0,
			pagenum:1,
			pagesize:10,
			where:{
                script_name:script_name || '',
                institu:'',
                time:'',
                status:'',
            },
		},
		methods: {
			setData:function(item){
	            var that=this;
	            if(item.is_zd==true){
	                that.showtime=true;
	                this.where.data=this.$refs.date_time.innerText;
	            }else{
	                this.showtime=false;
	                this.where.data=item.value;
	            }
	        },
	        search:function () {
	            this.where.excel=0;
	            this.getBadge();
	            layList.reload(this.where,true);
	        },
	        refresh:function () {
	            layList.reload();
	            this.getBadge();
	        },
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
			model         : function () {
				// this.ismodel = !this.ismodel;
			},
			reverseMessage: function () {
				this.message = this.message.split('').reverse().join('');
			},
			// 获取列表数
			getitems(e,type) {
				var data = {
					page   : this.pagenum,
					limit  : this.pagesize,
					script_name  : this.where.script_name,
					time      :  this.where.time,
					institu   :  this.where.institu,
					status    :this.where.status,
				};
				axios.post('<?php echo Url('script_list'); ?>', data).then((e) => {
					this.items = e.data.data;
					this.total   = e.data.count;
				});
			},
			shipments(e){
				var url="<?php echo Url('updateDeliveryGoods'); ?>"+'?id='+e;
				$(".shipments-modal").find('form').attr('action',url);
				$('.shipments-modal').show();
			},
		},
		created() {
			this.getitems();
		},
	});
	layList.form.render();


	//发货
	$(".shipments-closemode").click(function () {
		$(".shipments-modal").hide();
	});
	$(".shipments").click(function () {
		$(".shipments-modal").show();
	});

	//退款
	$(".order-closemode").click(function () {
		$(".order-modal").hide();
	});
	$(".refund-btn").click(function () {
		$(".order-modal").show();
	});


	//报关
	$(".failed-closemode").click(function () {
		$(".failed-modal").hide();
	});

	$(".failed").click(function () {
		$(".failed-modal").show();
	});


	function unfold(e) {
		var type = $(e).data('id');
		if (type == 1) {
			$(e).data('id', '2');
			$(e).html('<i class="icon iconfont iconxiangshang"></i> Close');
		} else {
			$(e).data('id', '1');
			$(e).html('<i class="icon iconfont iconxiangxia_hei"></i> Details');
		}
		$(e).parent().prev().stop().slideToggle();
	};


</script>
