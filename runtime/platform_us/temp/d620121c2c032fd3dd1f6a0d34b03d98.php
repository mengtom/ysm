<?php /*a:6:{s:59:"F:\WWW\yeshai\app\platform_us\view\crm\crm_doctor\order.php";i:1606213739;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1595310927;}*/ ?>
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

	<title>CMR-列表-订单</title>

	<div class="h-100 w-100 cmr-order" id="app">
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
			<a class="text-57">Home /</a> <a href="index.html" class="text-57">Independent Doctors Management </a> <span class="text-c01f5e">/ View order </span>
		</div>

		<div style="height: 34px;" class="w-1200">
			<div class="w-100 h-100 d-flex align-items-center justify-content-start tab relative">
				<!-- <div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative tab-item-active">全部订单(00)</div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">待付款(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">待发货(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">待收货(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">已完成(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative tab-item-active"><a href="order1.html">已关闭(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">退款申请(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="order2.html">已退款(00)</a></div> -->
				<div class="h-100 w-170px text-center ellipsis-1 cursor tab-item relative" :class="{'tab-item-active':where.status===item.value}" @click="getitems(item.value,1)" type="button" v-for="item in orderStatus">{{item.name}}<span v-if="item.count!=undefined" >({{item.count}})</span></div>
			</div>

		</div>

		<!--搜索区-->
		<div class="w-1200 relative" style="border: 1px solid #d9d9d9;z-index: 1">
			<div class="w-100 com-search" style="border-bottom: 2px solid #f0f0f0;margin-top: 0;">
				<div class="keyword w-100  h-auto">
					<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

						<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-wrap mt-20 mb-20">
							<div class="h-100 w-300px mr-30 mb-10">
							<div class="w-100">Orders No</div>
								<input class="ivu-input w-100 mt-8" placeholder="Please enter" type="text" v-model="where.ordersn">
							</div>

							<div class="h-100 w-300px mr-30 mb-10">
								<div class="w-100">User information</div>
								<input class="ivu-input w-100 mt-8" placeholder="Please enter" type="text" v-model="where.nickname">
							</div>

							<div class="h-100 w-300px mr-30 mb-10">
								<div class="w-100">Organization/Doctor information</div>
								<input class="ivu-input w-100 mt-8" placeholder="Please enter" type="text" v-model="where.institu">
							</div>

							<div class="h-100 w-300px mr-30 mb-10">
								<div class="w-100">Order time</div>
								<input class="ivu-input w-100 mt-8" type="text" placeholder="Star → End" style="width: 240px;" id="test13" v-model="where.time">
							</div>

						</div>

						<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20 mt-20">Reset</button>
							<button type="button" class="ivu-btn ivu-btn-primary mr-20 mt-20" @click="getitems">Search</button>
						</div>
					</form>
				</div>
			</div>
			<!--列表-->
			<div class="w-100 label-list bg-fff">
				<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">All orders</span> <span class="size-14">(<?php echo htmlentities($name); ?>)</span> </span>
			</div>

				<!--表格-->
				<div class="w-100 table">
				<div class="t-table pl-20 pr-20">

					<div class="w-100 bg-f6 d-flex align-items-center justify-content-start text-57" style="height: 50px;margin: auto;border: 1px solid #d9d9d9">
						<div class="text-center entbablediv w-240px" > Order information</div>
						<div class="w-150px text-center entbablediv">Prescribe doctor</div>
						<div class="w-140px text-center entbablediv">Single dose price($)</div>
						<div class="w-90px text-center entbablediv">Quantity</div>
						<div class="w-95px text-center entbablediv">Total price($)</div>
						<div class="w-125px text-center entbablediv">Consignee</div>
						<div class="w-125px text-center entbablediv">Payment method</div>
						<div class="w-90px text-center entbablediv">Order status</div>
						<div class="w-90px text-center entbablediv">Function</div>
					</div>


						<!--已退款- 已关闭  t-tabl-top-close         ---- 默认 t-tabl-top-->
						<!--代发货-->
						<div v-for="i in items" class="w-100 d-flex align-items-center justify-content-start flex-column t-tabl-top">
							<div class="w-100 t-tabl-top-title">
								<span class="ml-20 fw">Order No.：{{i.order_sn}}</span>
								<span class="ml-20">Order time：{{i.add_time}}</span>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start t-tabl-top-centen">
								<div class="h-100 d-flex align-items-center pl-20 w-240px"> {{i.order_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-150px bl">{{i.account}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-140px bl">{{i.price}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-90px bl">
									<span class="w-100 text-center text-27">{{i.total_num}}</span>
									<span class="w-100 text-center size-12 text-57" style="line-height: 1;">{{i.taking_quency}} times a day</span>
									<span class="w-100 text-center size-12 text-57" style="line-height: 1;">{{i.taking_cycle}}-day cycle</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-95px bl">
									<span class="w-100 text-center text-27">{{i.total_price}}</span>
									<span class="w-100 text-center size-12 text-57" style="line-height: 1;">Freight ${{i.pay_postage}}</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center bl flex-column w-125px">
									<span class="w-100 text-center text-27">{{i.real_name}}</span>
									<span class="w-100 text-center text-27">{{i.user_phone}}</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-125px bl">{{i.pay_type_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-90px flex-column bl">
									<span class="w-100 text-center text-27">{{i.status_name}}</span>
									<span class="w-100 text-center text-27"><a :href=`<?php echo Url('order_details'); ?>?id=${i.id}&d_id=<?php echo htmlentities($id); ?>` class="text-c01f5e">Details</a></span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-90px bl">
									<button style="width: 72px;" class="ivu-btn ivu-btn-primary ivu-btn-small refund-btn" type="button">Refund</button>
									<span class="w-100 pr-10 pl-10">Customs declaration success</span>
								</div>
							</div>
							<div class="w-100" style="display:none">
								<div class="" style="width: 1128px;margin: auto">
									<div class="w-100 text-57 mt-8"><span>Types of microtabs:{{i.micro_cate_count}}种</span><span class="ml-20">Total number of microtabs：{{i.micro_num}}片</span></div>
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
												<td class="text-center text-57 t-table-td">{{m.code}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_name}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_dose}}</td>
												<td class="text-center text-57 t-table-td">{{m.num}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_price}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_price}}</td>
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
				<div class="w-100 d-flex align-items-center justify-content-between ">
					<a href="index.html" class="ivu-btn ivu-btn-default ml-30">Return</a>
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
				</div>

			</div>
		</div>

		<!-- 订单退款 -->
		<div style="display: none" class="modal-root label-modal order-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 422px;width: 480px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">Order Refund</span>
					<span style="right: 20px;" class="absolute cursor order-closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="">
					<div class="items  d-flex align-items-center justify-content-start flex-column" style="width: 450px;">
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="fw" style="margin-left: 40px;">Refund method：</div>
						</div>

						<div class="item mt-20 w-100 refund">
							<div class="d-flex align-items-start justify-content-start flex-column w-100" style="margin-left: 40px;min-height: 32px;">
								<div class="w-100">
									<input class="h-100" type="radio" value="1" checked name="demo1" title="Direct refund">
								</div>
								<div class="size-12 remark text-57 text-center" style="width: 353px;" >
									The money will be refunded to the original payment account
								</div>
							</div>
						</div>

						<div class="item w-100 refund mt-14">
							<div class="d-flex align-items-start justify-content-start flex-column w-100" style="margin-left: 40px;min-height: 32px;">
								<div class="w-100">
									<input class="h-100" type="radio" value="1" name="demo1" title="Manual refund">
								</div>
								<div class="size-12 remark text-57 text-center" style="width: 95px;" >
									Offline refund
								</div>
							</div>
						</div>

						<div class="item w-100 refund mt-14">
							<div class="d-flex align-items-start justify-content-start flex-column w-100" style="margin-left: 40px;min-height: 32px;">
								<div class="w-100">
									<input class="h-100" type="radio" value="1" name="demo1" title="Refusing to refund">
								</div>
								<div class="size-12 text-center remark text-57" style="width: 175px;">
									Order is ineligible for refund
								</div>
							</div>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="button" class="ivu-btn ivu-btn-default order-closemode">Cancel</button>
						<button type="button" class="ivu-btn ivu-btn-primary ml-20 order-btn">Confirm</button>
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

<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">

	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'datetime'
			,range: true
		});
	})
	var real_name='<?=$real_name?>';
    var orderCount=<?=json_encode($orderCount)?>,status=<?=$status ? $status : "''"?>;
	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
			ismodel: false,
			orderStatus: [
                {name: 'All orders',   value: ''},
                {name: 'Pending payment', value: 0,count:orderCount.wz},
                {name: 'To be delivered', value: 1,count:orderCount.wf,class:true},
                {name: 'To be received', value: 2,count:orderCount.ds},
                {name: 'Completed', value: 4,count:orderCount.jy},
                {name: 'Closed', value: -4,count:orderCount.del},
                {name: 'Request a refund', value: -1,count:orderCount.tk,class:true},
                {name: 'Refunded', value: -2,count:orderCount.yt},
            ],
            items:[],
			total:0,
			pagenum:1,
			pagesize:10,
			where:{
                ordersn:'',
                status:'',
                type:'',
                platform:'',
                nickname:real_name || '',
                institu:'',
                excel:0,
                time:'',
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
	        excel:function () {
	            this.where.excel=1;
	            location.href=layList.U({c:'crm.institution',a:'order_list',q:this.where});
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
				if(type >= 1){
					this.where.status=e;
				}
				var data = {
					page   : this.pagenum,
					limit  : this.pagesize,
					nickname  : this.where.nickname,
					time      :  this.where.time,
					platform  : this.where.platform,
					institu   :  this.where.institu,
					ordersn	  :this.where.ordersn,
					doctor_id 		:<?php echo htmlentities($id); ?>,
					type :<?php echo htmlentities($type); ?>,
					status    :this.where.status,
				};
				axios.post('<?php echo Url('order_list'); ?>', data).then((e) => {
					this.items = e.data.data;
					this.total   = e.data.count;
				});
			},
		},
		created() {
			this.getitems();
		},
	});
	layList.form.render();
	//退款
	$('.order-closemode').click(function () {
		$('.order-modal').hide();
	});
	$('.refund-btn').click(function () {alert(213)
		$('.order-modal').show();
	});
	// $('.order-btn').click(function () {
	// 	 代码
	// 	$('.order-modal').hide();
	// });


	function unfold(e) {
		var type = $(e).data('id');
		if (type == 1) {
			$(e).data('id', '2');
			$(e).html('<i class="icon iconfont iconxiangshang"></i> 收起');
		} else {
			$(e).data('id', '1');
			$(e).html('<i class="icon iconfont iconxiangxia_hei"></i> 详情');
		}
		$(e).parent().prev().stop().slideToggle();
	};


</script>
