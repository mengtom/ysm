<?php /*a:6:{s:60:"F:\WWW\yeshai\app\platform_us\view\crm\crm_patient\index.php";i:1606214478;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1595310927;}*/ ?>
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

	<title>CMR-列表-全部患者</title>
	<div class="h-100 w-100 cmr-patient-p" id="app">
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
			<a class="text-57">Home /</a>  </a> <span class="text-c01f5e">Patients Management </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">
					<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-wrap mt-20 mb-20">

						<div class="h-100 d-flex align-items-center justify-content-start flex-column mr-20 mb-10">
							<div class="w-100">Patient information</div>
							<input class="ivu-input w-300px"  placeholder="Please enter" type="text" name="keyword">
						</div>
						<div class="h-100  d-flex align-items-center justify-content-start mr-20 flex-column mb-10">
							<div class="w-100">Organization</div>
							<input class="ivu-input w-300px" placeholder="Please enter" type="text"  name="institu">
						</div>
						<div class="h-100 d-flex align-items-center justify-content-start mr-20 flex-column mb-10">
							<div class="w-100">Doctor</div>
							<input class="ivu-input w-300px"  placeholder="Please enter" type="text" name="doctor">
						</div>
						<div class="h-100 d-flex align-items-center justify-content-start  flex-column mb-10">
							<div class="w-100 ">Register time </div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-300px">
								<input class="ivu-input" type="text" placeholder="Star → End" style="width: 240px;" id="test13" name="time">
							</div>
						</div>

					</div>
					<div class="w-150px h-100 mt-20  d-flex align-items-start justify-content-end ">
						<button type="reset" @click="reset" class="ivu-btn ivu-btn-default mr-20 mt-20">Reset</button>
						<button type="submit" class="ivu-btn ivu-btn-primary mr-10 mt-20" lay-submit="search" lay-filter="search">Filter</button>
					</div>
				</form>
			</div>
		</div>
		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">Patients List</span> </span>
			</div>

			<!--表格-->
			<div class="w-100 table ">
				<table class="ivu-table  ivu-table-default entbableth" style="overflow: initial" id="list">
					<!-- <tbody class="ivu-table-tbody">
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
					<tr v-for="i in 10" class="cursor text-57">
						<td class="pl-30 ckitem">000</td>
						<td class="ckitem">平台名称 </i></td>
						<td class="ckitem">15123456</td>
						<td class="ckitem">2020-00-00</td>
						<td class="ckitem">平台名称</td>
						<td class="ckitem ">所属平台</td>
						<td class="ckitem">1000</td>
						<td class="ckitem">500</td>
						<td class="ckitem">300000.00</td>
					</tr>
					</tbody> -->
				</table>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-end">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100" />
				<!--<ul class="ivu-page mt-20 mb-20 mr-20">
					<span class="ivu-page-total">共 100 条</span>
					<li title="上一页" class="ivu-page-prev ivu-page-disabled"><a><i class="ivu-icon ivu-icon-ios-arrow-back"></i></a></li>
					<li title="1" class="ivu-page-item ivu-page-item-active"><a>1</a></li>
					<li title="2" class="ivu-page-item"><a>2</a></li>
					<li title="3" class="ivu-page-item"><a>3</a></li>
					<li title="向后 5 页" class="ivu-page-item-jump-next"><a><i class="ivu-icon ivu-icon-ios-arrow-forward"></i></a></li>
					<li title="10" class="ivu-page-item"><a>10</a></li>
					<li title="下一页" class="ivu-page-next"><a><i class="ivu-icon ivu-icon-ios-arrow-forward"></i></a></li>

					<div class="ivu-page-options">
						<div class="ivu-page-options-sizer">
							<div class="ivu-select ivu-select-single ivu-select-default">
								<div tabindex="0" class="ivu-select-selection"><input type="hidden" value="10">
									<div class="">
										<span class="ivu-select-selected-value">10 条/页</span>
										<i class="ivu-icon ivu-icon-ios-arrow-down ivu-select-arrow"></i></div>
								</div>
							</div>
						</div>
					</div>

					<div class="ivu-page-options">
						<div class="ivu-page-options-elevator">
							跳至
							<input type="text" autocomplete="off" spellcheck="false">
							页
						</div>
					</div>
				</ul>-->
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
	//实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"<?php echo Url('get_patient_list'); ?>",function (){
        var join=new Array();
        join=[
            {field: 'user_id', title: 'No.',templet:'#user_id',align:'center', sort: true,event:'user_id',width:'10%'},
            {field: 'nickanme', title: 'Name',templet:'#p_name',align:'left',event:'p_name',width:'10%'},
            {field: 'account', title: 'Contact number',templet:'#account',align:'left',event:'account',width:'10%'},
            {field: 'createtime', title: 'Register time',templet:'#createtime',align:'left',event:'cate_id',width:'12%'},
            {field: 'institu_name', title: 'Affiliated organization/doctor',templet:'#institu_name',align:'center',width:'12%'},
            {field: 'total_ts', title: 'Number of Scripts',templet:'#total_ts',align:'left',width:'12%'},
            {field: 'total_order', title: 'Completed orders',templet:'#total_order',align:'left',event:'total_order',width:'12%'},
            {field: 'total_price', title: 'Total turnover',templet:'#total_price',align:'left',event:'total_price',width:'12%'},
            {field: 'total_end_time', title: 'Recent order time',templet:'#total_end_time',align:'left',event:'total_end_time'},
        ];
        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f6f6f6'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
    });
    //excel下载
    layList.search('export',function(where){
        where.excel = 1;
        location.href=layList.U({m:'admin',c:'crm.crm_patient',a:'get_patient_list',q:where});
    })
    function dropdown(that){
        $(that).next('.cj-edit-list').stop().slideToggle();
    }
    //排序
    layList.sort(function (obj) {
        var type = obj.type;
        switch (obj.field){
            case 'user_id':
                layList.reload({order: layList.order(type,'user_id')},true,null,obj);
                break;
        }
    });
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
</script>
