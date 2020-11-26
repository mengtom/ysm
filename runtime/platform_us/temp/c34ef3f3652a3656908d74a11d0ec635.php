<?php /*a:6:{s:61:"F:\WWW\yeshai\app\platform_us\view\crm\crm_doctor\setting.php";i:1606207509;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1605783593;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;s:56:"F:\WWW\yeshai\app\platform_us\view\public\layui_page.php";i:1595310927;}*/ ?>
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

	<title>独立医生管理-医生设置</title>
	<div class="h-100 w-100 crm-setting-p" id="app">
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
			<a class="text-57">Home /</a> <a class="text-57" href="index.html">Independent Doctors Management /</a> <span class="text-c01f5e">Independent Doctors Setting </span>
		</div>
		<!--搜索区-->
		<div class="w-1200">
			<div class="keyword bg-fff w-100 h-auto d-flex align-items-center justify-content-between" style="height: 62px;line-height: 62px;">
				<div class="h-100 pl-20 d-flex align-items-center justify-content-start">
					<div class="w-100 d-flex align-items-center justify-content-start fw size-16">
						<span>Initial commission rate: <?php echo htmlentities($scale['commission']); ?>%</span>
						<span class="ml-30">Initial purchase discount：<?php echo htmlentities($scale['discount']); ?></span>
					</div>
				</div>
				<button type="button" class="ivu-btn ivu-btn-primary mr-20 redact1">Edit</button>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16 fw ml-20">Independent Doctors Group List</span>
				<div>
					<button type="button" class="ivu-btn ivu-btn-primary mr-20 grou"><i class="ivu-icon ivu-icon-md-add"></i> Add New Group</button>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table ">

				<table class="ivu-table  ivu-table-default" style="overflow: initial" id="List" lay-filter="List">
				</table>
				<script type="text/html" id="act">
					<a class="edittext text-27 redact" lay-event="redact">
						<i class="icon iconfont iconbian-ji"></i>
						Edit
					</a>
					<a class="edittext text-c01f5e ml-10" href="javascript:void(0)" lay-event="delstor">
						<i class="icon iconfont iconguanbi size-12"></i>
						Delete
					</a>
				</script>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-between">
				<a href="index.html" class="ivu-btn-default ivu-btn ml-20">Return</a>
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100" />
			</div>

		</div>

		<!--添加新分组-->
		<div style="display: none" class="modal-root label-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 410px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">Add New Group</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="<?php echo Url('save_group'); ?>" method="post">
					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column">
							<div class="w-100">Group name<span class="text-ff4d4f">*</span></div>
							<input type="text" value="" name="name" placeholder="Please enter" class="ivu-input ivu-input-default mt-8">
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column mt-20">
							<div class="w-100">Commission rate<span class="text-ff4d4f">*</span></div>
							<input type="text" value="" name="commission" placeholder="Please enter" class="ivu-input ivu-input-default mt-8">
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column mt-20">
							<div class="w-100">Purchase discount<span class="text-ff4d4f">*</span></div>
							<input type="text" value="" name="discount" placeholder="Please enter" class="ivu-input ivu-input-default mt-8">
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">Cancel</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">Confirm</button>
					</div>
				</form>
			</div>
		</div>

		<!-- 编辑 -->
		<div style="display: none" class="modal-root edit-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 332px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">Edit</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="<?php echo Url('setting'); ?>" method="post">
					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column">
							<div class="w-100">Initial commission rate<span class="text-ff4d4f">*</span></div>
							<input type="text" name="commission" value="<?php echo htmlentities($scale['commission']); ?>" placeholder="Please enter" class="ivu-input ivu-input-default mt-8">
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start flex-column mt-20">
							<div class="w-100">Initial purchase discount<span class="text-ff4d4f">*</span></div>
							<input type="text" name="discount" value="<?php echo htmlentities($scale['discount']); ?>" placeholder="Please enter" class="ivu-input ivu-input-default mt-8">
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">Cancel</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">Confirm</button>
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
	//实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('List',"<?php echo Url('groupList'); ?>",function (){
        var join=new Array();
        join=[
            {field: 'name', title: 'Group name',templet:'#name',align:'left',event:'name',width:'25%'},
            {field: 'commission', title: 'Commission rate',templet:'#commission',align:'left',event:'commission',width:'25%'},
            {field: 'discount', title: 'Purchase discount',templet:'#discount',align:'left',event:'discount',width:'20%'}, //edit:'en_name',
            {field: 'num', title: 'Quantity',templet:'#num',align:'left', event:'num',width:'20%'},
            {field: 'right', title: 'Function',align:'left',toolbar:'#act'},
        ];
        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f8f8f9'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
        $('tr').css({'border-bottom':'1px solid #e8eaec'});
    });
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
        	case 'redact':
        		var url=layList.U({m:'terrace',c:'crm.CrmDoctor',a:'edit_group',q:{id:data.id}});
        		layList.createModalFrame('分组编辑',url);
        	break;
        	case 'delstor':
                var url=layList.Url({m:'terrace',c:'crm.CrmDoctor',a:'delete_group',q:{id:data.id}});
				layList.layer.confirm('分组删除后，将不会再次出现该分组，是否确定删除？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
					axios.get(url).then(function(res){

                        if(res.data.code == 200 && res.status == 200) {
                        	layList.msg(res.data.msg,{icon:1});
                            obj.del();
                            location.reload();
                        }else
                           	return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                    	layList.msg(err,{icon:2});
                    });
                });
                break;
        }
    })

	// 分组
	$('.grou').click(function () {
		$('.label-modal').show();
	});


	//充值弹窗
	$('.closemode').click(function () {
		$('.modal-root').hide();
	});
	//编辑
	$('.redact1').click(function () {
		$('.edit-modal').show();
	});




</script>
