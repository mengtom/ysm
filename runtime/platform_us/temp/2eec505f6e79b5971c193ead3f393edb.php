<?php /*a:5:{s:49:"F:\WWW\yeshai\app\platform_us\view\ts\ts\edit.php";i:1606304009;s:52:"F:\WWW\yeshai\app\platform_us\view\public\header.php";i:1605782084;s:61:"F:\WWW\yeshai\app\platform_us\view\public\header_navigate.php";i:1606294604;s:52:"F:\WWW\yeshai\app\platform_us\view\public\footer.php";i:1592563283;s:58:"F:\WWW\yeshai\app\platform_us\view\public\inner_footer.php";i:1595304974;}*/ ?>
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

	<title>编辑配方</title>

	<div id="app" class="ts-edit">
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
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
                                                    Official Account Binding
                                                </a>
                                            </li>
                                            <li class="ivu-menu-item ">
                                                <a href="javascript:;" class="w-100 h-100 text-fff text-center">
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
		<div class="w-1200 mt-80  text-666 size-14">
			<span>Home /</span> <a class="text-57" href="index.html"> Formulation Managment / </a> <span class="text-c01f5e"> Add Own Formulation </span>
		</div>
		<!--列表-->
		<div class="w-1200  wp-edit mt-10 pb-10 mb-30" style="border-radius: 1px;">
			<form class="d-flex layui-form  align-items-start justify-content-between" id="formput" action="<?php echo Url('save',array('id'=>$info['id'])); ?>" method="post">
				<input type="text" hidden name="ts_id">
				<div class="wp-edit-body h-100 pt-20 bg-fff" style="width: 900px;margin: initial">
					<div class="size-16 fw text-c01f5e mt-10 pl-30 ">Formulation Name</div>
					<div class="items pl-30 w-100">
						<div class="item w-100 ">
							<div class=" size-14 item-text">Formulation No.<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input ml0 w-400px" name="code" value="<?php echo htmlentities($info['code']); ?>">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start  ">
							<div >
								<div class=" size-14 item-text">Name</div>
								<div class="w-100">
									<input type="text" placeholder="English/Numbers/Symbols" class="ivu-input w-400px ml0" name="name_en" value="<?php echo htmlentities($info['name_en']); ?>">
								</div>
							</div>
						</div>
						<div class="item w-100 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text">Formulation Status</div>
							<div class="w-100">
								<i-switch <?php if($info['is_status'] > 0): ?>:value="true" <?php else: ?>:value="false"<?php endif; ?> size="large" name="is_status">
									<span slot="open">Available</span>
									<span slot="close">Unavailable</span>
								</i-switch>
							</div>
						</div>
					</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>


					<div class="size-16 fw pl-30 text-c01f5e ">Microtabs Select
						<Poptip placement="right-start" >
							<div slot="content">
								<div class="size-12 text-57 mt-8 text-left">1、成分表内，名称、剂量范围、最大剂量，取微片添加内表格的值;</div>
								<div class="size-12 text-57 mt-8 text-left">2、添加剂量时，有单次增加量的设定，此部分的剂量调节，每次调节的值以单次添加量为准；</div>
								<div class="size-12 text-57 mt-8 text-left">3、添加微片时，多处方内会存在重复微片，在此处需进行合并</div>
							</div>
							<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
						</Poptip>
					</div>
					<div class="items" style="width: 840px;margin: auto">
						<div class="w-100 mt-10 d-flex align-items-center  justify-content-around bg-f6" style="height: 40px;">
							<div class="d-flex align-items-center justify-content-center w-50px hide pl-10">
								<input type="checkbox" name="m_id[]" lay-ignore lay-skin="primary" style="display: block" class="checked-items ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">
							</div>
							<div class="d-flex align-items-center justify-content-start w-200px pl-10">Microtabs name</div>
							<div class="d-flex align-items-center justify-content-start w-150px">Dose range</div>
							<div class="d-flex align-items-center justify-content-start w-150px">Maximum dose</div>
							<div class="d-flex align-items-center justify-content-start w-150px">Quantity</div>
							<div class="d-flex align-items-center justify-content-start w-100px">Dose display</div>
							<div class="d-flex align-items-center justify-content-start w-100px">Price($)</div>
                            <div class="d-flex align-items-center justify-content-start w-100px">Status</div>
							<div class="d-flex align-items-center justify-content-center w-50px">Delete</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start flex-column  hxcflist">

							<div v-for="(i,k) in hxcflistdata" class="w-100 d-flex align-items-center justify-content-around hxcfitem" style="height: 40px;">
								<div class="d-flex align-items-center justify-content-center w-50px h-100 hide pl-10">
									<input type="checkbox" lay-ignore lay-skin="primary" style="display: block" class="ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">
								</div>
								<div class="text-left ellipsis-1 w-200px pl-10">{{i.name}}</div>
								<div class="d-flex align-items-center justify-content-start w-150px">{{i.scope}}{{i.unit}}</div>
								<div class="d-flex align-items-center justify-content-start w-150px maximum">{{i.maxnum}}{{i.unit}}</div>
								<div class="d-flex align-items-center justify-content-start w-150px ">
									<input class="ivu-input ivu-input-small" :value="i.val"  :name="`mid[${i.id}]`" min="1" type="text" min="1" style="width: 70px">
									<div class="d-flex align-items-start justify-content-start flex-column plusminus">
										<i class="w-100 plus cursor icon iconfont icon2shang size-12 h-50 ellipsis-1" :data-key="k"></i>
										<i class="w-100 minus cursor icon iconfont iconxiangxia2 size-12 h-50 ellipsis-1" :data-key="k"></i>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-start w-100px itemdosage">{{i.dosage}}{{i.unit}}</div>
								<div class="d-flex align-items-center justify-content-start w-100px itempricermg">{{(i.rmbprice*i.val)|numFilter}}</div>
                                <div class="d-flex align-items-center justify-content-start w-100px itempriceusd">{{i.is_status == 1 ? "Available":"Unavailable"}}</div>
								<div class="d-flex align-items-center justify-content-center w-50px">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem" :data-key="k" :data-id="i.id" @click="itemsdel(i,k)"></i>
								</div>
							</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-center mt-10 cursor addhxcf" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
							<i class="icon iconfont iconicon-test"></i> Add
						</div>
					</div>
					<div class="hr w-100"></div>
					<div class="size-16 fw text-c01f5e pl-30" style="margin-top: 18px;">Medical Order</div>
					<div class="item w-100 mt-20 pl-30 d-flex align-items-center justify-content-start  ">
						<div>
							<div class="size-14 item-text">Indications</div>
							<div class="w-100 mt-8">
								<div class="relative w-400px">
									<i-select v-model="model18" filterable multiple  @on-create="handleCreate2" name="cate_id">
										<i-option v-for="item in cityList4" :value="item.value" :key="item.value">{{ item.label }}</i-option>
									</i-select>
								</div>
							</div>
						</div>

					</div>

					<div class="item w-100 mt-20 pl-30 d-flex align-items-center justify-content-start  ">
						<div class="w-400px d-flex align-items-start justify-content-center">
							<div class="w-190px">
								<div class="size-14 item-text">Frequency of taking<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<div class="ivu-select  ivu-select-single ivu-select-default relative w-190px">
										<select id="frequency" lay-filter="frequency" class="frequency" lay-verify="required" name="taking_quency">
											<option value="">All</option>
											<option value="1" <?php if(1 == $info['taking_quency']): ?>selected="selected"<?php endif; ?>>一日一次</option>
											<option value="2" <?php if(12 == $info['taking_quency']): ?>selected="selected"<?php endif; ?>>早晚各一次</option>
											<!--<option value="2" <?php if(2 == $info['taking_quency']): ?>selected="selected"<?php endif; ?>>一日二次</option>
											<option value="3" <?php if(3 == $info['taking_quency']): ?>selected="selected"<?php endif; ?>>一日三次</option>-->
										</select>
									</div>
								</div>
							</div>
							<div class="w-190px ml-20">
								<div class=" size-14 item-text">When to taking</div>
								<div class="w-100 mt-8">
									<div class="ivu-select  ivu-select-single ivu-select-default relative w-190px">
										<select id="takedate" class="takedate" lay-filter="takedate" lay-verify="required" name="taking_time">
											<option value="">All</option>
											<option value="无建议"  <?php if('无建议' == $info['taking_time']): ?>selected="selected"<?php endif; ?>>无建议</option>
											<option value="早上" 	<?php if('早上' == $info['taking_time']): ?>selected="selected"<?php endif; ?>>早上</option>
											<option value="下午" 	<?php if('下午' == $info['taking_time']): ?>selected="selected"<?php endif; ?>>下午</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div style="margin-left: 40px;" class="w-400px ">
							<div class=" size-14 item-text">Cycle<span class="text-ff4d4f">*</span></div>
							<div class="w-100 mt-8">
								<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
									<select id="period" class="period" lay-filter="period" lay-verify="required" name="taking_cycle">
										<option value="">All</option>
										<option value="28" <?php if('28' == $info['taking_cycle']): ?>selected="selected"<?php endif; ?>>28天</option>
										<option value="56" <?php if('56' == $info['taking_cycle']): ?>selected="selected"<?php endif; ?>>56天</option>
										<option value="84" <?php if('84' == $info['taking_cycle']): ?>selected="selected"<?php endif; ?>>84天</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="item pl-30 w-100 mt-20">
						<div class="size-14 item-text">Suggestion</div>
						<div class="w-100 mt-8">
							<div class="relative w-400px">
								<!--可选择或填写-->
								<i-select v-model="model19" filterable multiple allow-create @on-create="handleCreate3" name="taking_suggest">
									<i-option v-for="item in suggest" :value="item.value" :key="item.value">{{ item.label }}</i-option>
								</i-select>
							</div>
						</div>
					</div>
					<div class="hr w-100 "></div>

					<div class="size-16 pl-30 fw text-c01f5e" style="margin-top: 18px;">Description And Reference</div>

					<div class="item w-100 pl-30 mt-20 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text">Description</div>
							<div class="w-100 mt-8">
								<textarea rows="3" placeholder="Please enter" class="ivu-input w-400px" name="description"> <?php echo htmlentities($info['description']); ?></textarea>
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Reference</div>
							<div class="w-100 mt-8">
								<textarea rows="3" placeholder="Please enter" class="ivu-input w-400px" name="reference"> <?php echo htmlentities($info['reference']); ?></textarea>
							</div>
						</div>
					</div>


					<div class="hr w-100 "></div>

					<div class="item pl-30 w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
						<button class="ivu-btn-primary ivu-btn mr-20 put" type="button">Save</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="submit">Cancel</a>
					</div>
				</div>

				<div class="ts_right d-flex ml-20 h-auto d-flex align-items-start justify-content-start flex-column">
					<div class="top w-100 bg-fff h-auto pb-10" style="min-height: auto">
						<div class="title bg-f6 fw size-16 text-center">Formulation Summary
							<Poptip placement="right-start" >
								<div slot="content">
									<div class="size-12 text-57 mt-8 text-left">1、微片种类指配方内微片类型的总数量;</div>
									<div class="size-12 text-57 mt-8 text-left">2、活性成分指配方内各微片内活性成分的类型总量，同名称不同剂量的也需要合并同类项;</div>
									<div class="size-12 text-57 mt-8 text-left">3、辅料种类指各微片内辅料成分的类型的总量，同名称不同剂量的需合并同类项;</div>
								</div>
								<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
							</Poptip>
						</div>
						<div class="items w-100 d-flex align-items-center justify-content-center flex-column">

							<div class="item mt-20 d-flex align-items-center justify-content-between">
								<div>Microtabs kinds</div>
								<div class="wpkind"><span>0</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>Active component kinds</div>
								<div class="hxkind"><span>0</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>Excipient kinds</div>
								<div class="flkind"><span>0</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>Single dose price</div>
								<div class="singlepricermb"><span>0</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>Total period price</div>
								<div class="periodpricermb"><span>0</span></div>
							</div>
							<div class="item d-flex align-items-center mt-20" style="border-bottom: none;">
								<button class="w-100 ivu-btn ivu-btn-primary put" type="button">Save</button>
							</div>
						</div>
					</div>

					<div class="mt-20 cf-list w-100 bg-fff">
						<div class="title fw size-16 text-center">Ingredient list
							<Poptip placement="right-start" >
								<div slot="content">
									<div class="size-12 text-57 mt-8 text-left">1、成分包括活性成分和辅料成分;</div>
									<div class="size-12 text-57 mt-8 text-left">2、同名称同计量单位的成分需合并，数量为各项之和;</div>
									<div class="size-12 text-57 mt-8 text-left">3、同名称不同计量单位的成分不合并;</div>
								</div>
								<i class="icon iconfont icontishi text-c01f5e cursor"> </i>
							</Poptip>
						</div>

						<div style="height: 44px;" class="bg-f6 w-100">
							<div style="width: 240px;margin: auto;" class="d-flex align-items-center justify-content-between h-100">
								<div>Microtabs kinds</div>
								<div>Dosage</div>
							</div>
						</div>

						<div class="items w-100 d-flex align-items-center justify-content-center flex-column mb-30">
							<div v-for="i in cflist" class="item  d-flex align-items-center justify-content-between">
								<div class="ellipsis-1">{{i.name}}</div>
								<div>{{i.value}}{{i.unit}}</div>
							</div>
						</div>

					</div>
				</div>
			</form>
		</div>


		<!--弹窗-->
		<div style="display: none;" class="modal-root ts-edit-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="width : 852px ;height: 520px ;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative">
					<span class="fw size-16">Add Microtabs</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<div class="items w-100" style="height: 520px;margin-top: 0;">
					<iframe id="wpitems" src="<?php echo Url('microchip_selected',array('type'=>$type,'time'=>time())); ?>" class="w-100 h-100" style="border: none"></iframe>
				</div>
			</div>
		</div>

		<!--put-->
		<div style="display: none;" class="modal-root ts-edit-modal-put">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="width : 852px ;height: 520px ;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative" style="height: 55px; padding: 0 20px;border-bottom: 1px solid #eee;">
					<span class="fw size-16">该配方中的以下微片状态为不可用，如继续使用，无法生成有效订单。</span>
					<span style="right: 20px;" class="absolute cursor put-cancel">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<div class="items w-100" style="height: 520px;margin-top: 0;">
					<div class="w-100" style="height: 420px;overflow-y: auto">
						<div class="w-100 d-flex align-items-center justify-content-start bg-f4" style="height: 40px;border-bottom: 1px solid #D9D9D9;">
							<div class="text-left ellipsis-1 w-200px pl-20">微片名称</div>
							<div class="d-flex align-items-center justify-content-start w-200px">剂量范围</div>
							<div class="d-flex align-items-center justify-content-start w-200px maximum">最大剂量</div>
							<div class="d-flex align-items-center justify-content-start w-200px itemisstatus">状态</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start" v-for="i in statusdata" style="height: 40px;border-bottom: 1px solid #D9D9D9;">
							<div class="text-left ellipsis-1 w-200px pl-20">{{i.name}}</div>
							<div class="d-flex align-items-center justify-content-start w-200px">{{i.scope}}{{i.unit}}</div>
							<div class="d-flex align-items-center justify-content-start w-200px maximum">{{i.maxnum}}{{i.unit}}</div>
							<div class="d-flex align-items-center justify-content-start w-200px itemisstatus">{{i.is_status === 1 ? "可用":"不可用"}}</div>
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end">
						<button class="ivu-btn ivu-btn-default mr-20 put-cancel" type="button">重新选择微片</button>
						<button class="ivu-btn ivu-btn-primary mr-20 put-affirm" type="button">继续生成配方</button>
					</div>
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




<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message  : 'Hello Vue.js!',
			ismodel  : false,
			cf       : '',
			cityList4: [
				<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				{
					value: '<?php echo htmlentities($vo['id']); ?>',
					label: "<?php echo htmlentities($vo['en_title']); ?>",
				},
				<?php endforeach; endif; else: echo "" ;endif; ?>

			],
			suggest     : [
				<?php if(is_array($info['taking_suggest']) || $info['taking_suggest'] instanceof \think\Collection || $info['taking_suggest'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['taking_suggest'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>
				{
					value: '<?php echo htmlentities($s); ?>',
					label: '<?php echo htmlentities($s); ?>',
				},
				<?php endforeach; endif; else: echo "" ;endif; ?>
			],
			model18     : ["<?=implode('","', explode(',', $info['cate_id']))?>"],
			model19     : ["<?=implode('","',$info['taking_suggest'])?>"],
			deme        : 1,
			cflist      : [],
			hxcflistdata:[
				<?php if(is_array($microchip) || $microchip instanceof \think\Collection || $microchip instanceof \think\Paginator): $i = 0; $__LIST__ = $microchip;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				{
					kind:'<?php echo htmlentities($v['micro_id']); ?>',
					name: '<?php echo htmlentities($v['en_name']); ?>',
					scope: '<?php echo htmlentities($v['dose_range']); ?>',
					unit :'<?php echo htmlentities($v['unit']); ?>',
					maxnum: '<?php echo htmlentities($v['dose_max']); ?>',
					id :'<?php echo htmlentities($v['micro_id']); ?>',
					dosage :'<?php echo htmlentities($v['dose']); ?>',
					dosage1 :'<?php echo htmlentities($v['dose']); ?>',
					rmbprice: '<?php echo htmlentities($v['price']); ?>',
					is_status:'<?php echo htmlentities($v['is_show']); ?>',
					val :'<?php echo htmlentities($v['num']); ?>',
				},
				<?php endforeach; endif; else: echo "" ;endif; ?>
			],
			statusdata  : [],
			factsdata   : [],
		},

		filters: {
			//价钱过滤器
			numFilter(value) {
				if (value == "NaN" || value == "undefined") {
					return Number(0);
				} else {
					let realVal = Number(value).toFixed(2);
					return realVal;
				}
			},
		},
		methods: {
			handleCreate2(val) {
				this.cityList4.push({
					value: val,
					label: val,
				});
			},
			handleCreate3(val) {
				this.suggest.push({
					value: val,
					label: val,
				});
			},
			itemsdel(item, key) {
				this.hxcflistdata.splice(key, 1);
				total();
			}

		},
	});




	/*
	 * periodpriceusd  周期价格美元
	 * periodpricermb  周期价格人民币
	 * singlepriceusd  单剂价格美元
	 * singlepricermb  单剂价格人民币
	 * flkind          辅料种类
	 * hxkind          活性种类
	 * wpkind          微片种类
	 * period           服用周期
	 * takedate        服用时间
	 * frequency       服用频次
	 * */
	var takedate = 0, period = <?php echo htmlentities($info['taking_cycle']); ?>, frequency =  <?php echo htmlentities($info['taking_quency']); ?>;
	layui.use(['form'], function () {
		var form = layui.form; //表单
		form.on('select(frequency)', function (data) {
			setTimeout(function () {
				total();
			}, 1000);
			return frequency = data.value;
		});
		form.on('select(takedate)', function (data) {
			return takedate = data.value;
		});
		form.on('select(period)', function (data) {
			setTimeout(function () {
				total();
			}, 1000);
			return period = data.value;
		});
	});



	/*
	 * 统计-配方概要 - 成分列表
	 * cflist 成分列表
	 * */
	function total() {
		//微片列表合并
		var arr = app.$data.hxcflistdata;
		var map = {}, dest = [], singlepricermb = 0,  periodpricermb = 0, wpkind = 0, hxkind = 0, flkind = 0,is_status=0, ids = [];
		for (var i = 0; i < arr.length; i++) {
			var ai = arr[i];
			if (!map[ai.kind]) {
				dest.push({
					"id"      : ai.id,
					"kind"    : ai.kind,
					"name"    : ai.name,
					"scope"   : ai.scope,
					"maxnum"  : ai.maxnum,
					"unit"    : ai.unit,
					"val"     : ai.val,
					"dosage"  : ai.dosage,
					"dosage1" : ai.dosage1,
					"rmbprice": ai.rmbprice,
					"is_status":ai.is_status,
				});
				map[ai.kind] = ai;
			} else {
				for (var j = 0; j < dest.length; j++) {
					var dj = dest[j];
					if (dj.kind == ai.kind) {
						dj.val    = (parseFloat(dj.val) + parseFloat(ai.val)).toString();
						dj.dosage = (parseFloat(dj.dosage1) * (parseFloat(dj.val)));
						break;
					}
				}
			}
		}

		// 微片种类
		for (var i = 0; i < dest.length; i++) {
			if (parseFloat(dest[i].dosage) >= parseFloat(dest[i].maxnum)) {
				dest[i].val    = Math.ceil(dest[i].maxnum / dest[i].dosage1);
				dest[i].dosage = dest[i].maxnum;
			}
			wpkind++;
			singlepricermb += (parseFloat(dest[i].rmbprice) * parseInt(dest[i].val));
		}
		periodpricermb = singlepricermb * parseFloat(period) * parseFloat(frequency);
		$('.wpkind span').html(wpkind);
		$('.singlepricermb span').html(singlepricermb.toFixed(2));
		$('.periodpricermb span').html(periodpricermb.toFixed(2));
		app.$data.hxcflistdata = dest;

		//请求接口  成分列表
		if(dest) {
			axios.post("<?php echo url('getIngredient'); ?>", {data: dest}).then(e => {
				var arr = e.data.data;
				var map = {}, dest = [];
				for (var i = 0; i < arr.ingre.length; i++) {
					var ai   = arr.ingre[i];
					ai.name1 = ai.en_name + ai.unit;
					if (!map[ai.name1]) {
						dest.push({
							id   : ai.id,
							name : ai.en_name,
							value: ai.dose,
							unit : ai.unit,
							type : ai.type,
						});
						map[ai.name1] = ai;
					} else {
						for (var j = 0; j < dest.length; j++) {
							var dj   = dest[j];
							dj.name1 = dj.en_name + dj.unit;
							if (dj.name1 == ai.name1) {
								dj.value = (parseFloat(dj.value) + parseFloat(ai.value)).toString();
								break;
							}
						}
					}
				}
				$('.hxkind span').html(arr.ingre1); //活性种类
				$('.flkind span').html(arr.ingre2);//辅料种类
				app.$data.cflist = dest;//成分列表
			});
		}



	}

	/*
	 * 点击全选
	 * */
	$('.checked-items').click(function () {
		var checked = $(this).prop('checked');
		if (checked == true) {
			$(".hxcflist .ivu-checkbox:checkbox").prop("checked", true);
		} else {
			$(".hxcflist .ivu-checkbox:checkbox").prop("checked", false);
		}
	});
	/*
	 * 添加更多
	 * */
	$('.addhxcf').click(function () {
		document.getElementById('wpitems').contentWindow.delwp();
		$('.ts-edit-modal').show();
	});


	/*
	 * 数量加
	 * itemdosage  剂量显示
	 * itempricermg 价格人民币
	 * itempriceusd 价格美元
	 *
	 */
	$(".hxcflist").on('click', '.plus', function () {

		/*new*/
		var key     = $(this).data('key');
		var val     = $(this).parent().prev().val();
		var items   = app.$data.hxcflistdata;
		var item    = items[key];
		var res     = {
			"id"      : item.id,
			"kind"    : item.kind,
			"pid"     : item.pid,
			"name"    : item.name,
			"scope"   : item.scope,
			"maxnum"  : item.maxnum,
			"unit"    : item.unit,
			"val"     : item.val,
			"dosage"  : item.dosage,
			"dosage1" : item.dosage1,
			"rmbprice": item.rmbprice,
			"is_status":item.is_status,
		};
		val         = parseInt(val) + 1;
		var maxnum  = item.maxnum;
		var dosage1 = item.dosage1;
		var num     = parseInt(val) * parseFloat(dosage1);
		if (maxnum <= parseInt(item.val) * parseFloat(dosage1)) {
			res.dosage = maxnum;
			return false;
		} else {
			res.dosage = num >= maxnum ? maxnum : num;
			res.val    = val;
		}
		app.$data.hxcflistdata = [];
		items[key]             = res;
		app.$data.hxcflistdata = items;
		total();
	});

	/*
	 * 数量减
	 * */
	$(".hxcflist").on('click', '.minus', function () {
		/*new*/
		var key   = $(this).data('key');
		var val   = $(this).parent().prev().val();
		var items = app.$data.hxcflistdata;
		var item  = items[key];
		var res   = {
			"id"      : item.id,
			"kind"    : item.kind,
			"pid"     : item.pid,
			"name"    : item.name,
			"scope"   : item.scope,
			"maxnum"  : item.maxnum,
			"unit"    : item.unit,
			"val"     : item.val,
			"dosage"  : item.dosage,
			"dosage1" : item.dosage1,
			"rmbprice": item.rmbprice,
			"is_status":item.is_status,
		};
		if (item.val <= 1) {
			return false;
		}
		val                    = parseInt(val) - 1;
		var dosage1            = item.dosage1;
		var num                = parseInt(val) * parseFloat(dosage1);
		res.dosage             = num;
		res.val                = val;
		app.$data.hxcflistdata = [];
		items[key]             = res;
		app.$data.hxcflistdata = items;
		total();
	});

	/*
	 * 点击删除活性成分
	 * */
	// $(".hxcflist").on('click', '.rmhxcfitem', function () {
	// 	var key = $(this).data('key');
	// 	// $(this).parent().parent().remove();
	// 	var items = app.$data.hxcflistdata;
	// 	items.splice(key, 1);
	// 	app.$data.hxcflistdata = items;
	// 	total();
	// });

	$('.closemode').click(function () {
		$('.ts-edit-modal').hide();
	});

	/*
	 * 关闭窗口-框架集使用
	 * */
	function closemode(data) {
		var arr = app.$data.hxcflistdata;
		for (var i = 0; i < data.length; i++) {
			arr.push(data[i]);
		}
		app.$data.hxcflistdata = arr;

		$('.ts-edit-modal').hide();

		setTimeout(function () {
			total();
		}, 100);
	}

	//提交检测
	$('.put').click(function () {
		var itemsdata  = app.$data.hxcflistdata;
		var statusdata = [];
		for (var i = 0; i < itemsdata.length; i++) {
			if (itemsdata[i].is_status != 1) {
				statusdata.push(itemsdata[i]);
			}
		}
		if (statusdata.length > 0) {
			$('.ts-edit-modal-put').show();
		} else {
			$('#formput').submit();
		}
		app.$data.statusdata = statusdata;
		// $('#formput').submit();
		// console.log(statusdata)

	})
	//确认提交
	$('.put-affirm').click(function () {
		$('#formput').submit();
	})
	//重新选择微片
	$('.put-cancel').click(function () {
		$('.ts-edit-modal-put').hide();
	})


	total();
</script>
