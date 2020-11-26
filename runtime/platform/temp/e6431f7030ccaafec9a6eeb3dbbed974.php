<?php /*a:5:{s:48:"F:\WWW\yeshai\app\platform\view\ts\ts\create.php";i:1604306999;s:49:"F:\WWW\yeshai\app\platform\view\public\header.php";i:1596013767;s:58:"F:\WWW\yeshai\app\platform\view\public\header_navigate.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\footer.php";i:1592563283;s:55:"F:\WWW\yeshai\app\platform\view\public\inner_footer.php";i:1595304974;}*/ ?>
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

	<title>自有配方添加</title>

	<div id="app" class="ts-edit">
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
		<div class="w-1200 mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> 配方管理 / </a> <span class="text-c01f5e"> 添加自有配方 </span>
		</div>
		<!--列表-->
		<div class="w-1200  wp-edit mt-10 pb-10 mb-30" style="border-radius: 1px;">
			<form class="d-flex layui-form  align-items-start justify-content-between" id="formput" action="<?php echo Url('save'); ?>" method="post">
				<input type="text" hidden name="id" >
				<div class="wp-edit-body h-100 pt-20 bg-fff" style="width: 900px;margin: initial">
					<div class="size-16 fw text-c01f5e mt-10 pl-30 ">配方名称</div>
					<div class="items pl-30 w-100">
						<div class="item w-100 ">
							<div class=" size-14 item-text">配方编码<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0 w-400px" name="code">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class=" size-14 item-text">配方名称</div>
								<div class="w-100">
									<input type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input w-400px ml0" name="name_zn">
								</div>
							</div>
							<div style="margin-left: 40px;">
								<div class=" size-14 item-text">Name</div>
								<div class="w-100">
									<input type="text" placeholder="由英文/数字/符号组成" class="ivu-input w-400px ml0" name="name_en">
								</div>
							</div>
						</div>

					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>


					<div class="size-16 fw pl-30 text-c01f5e ">微片选择
						<Poptip placement="right-start">
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
								<input type="checkbox" lay-ignore lay-skin="primary" style="display: block" class="checked-items ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">
							</div>
							<div class="d-flex align-items-center justify-content-start w-200px pl-10">微片名称</div>
							<div class="d-flex align-items-center justify-content-start w-150px">剂量范围</div>
							<div class="d-flex align-items-center justify-content-start w-150px">最大剂量</div>
							<div class="d-flex align-items-center justify-content-start w-150px">数量调节</div>
							<div class="d-flex align-items-center justify-content-start w-100px">剂量显示</div>
							<div class="d-flex align-items-center justify-content-start w-100px">价格</div>
                            <div class="d-flex align-items-center justify-content-start w-100px">状态</div>
							<div class="d-flex align-items-center justify-content-center w-50px">删除</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start flex-column  hxcflist">

							<!--<div class="w-100 mt-10 d-flex align-items-center justify-content-around flex-column hxcfitem">-->

							<!--</div>-->

							<div v-for="(i,k) in hxcflistdata" class="w-100 d-flex align-items-center justify-content-around hxcfitem" style="height: 40px;">
								<div class="d-flex align-items-center justify-content-center w-50px h-100 hide ">
									<input type="checkbox" lay-ignore lay-skin="primary" style="display: block" class="ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">
								</div>
								<div class="text-left ellipsis-1 w-200px pl-10">{{i.name}}</div>
								<div class="d-flex align-items-center justify-content-start w-150px">{{i.scope}}{{i.unit}}</div>
								<div class="d-flex align-items-center justify-content-start w-150px maximum">{{i.maxnum}}{{i.unit}}</div>
								<div class="d-flex align-items-center justify-content-start w-150px ">
									<input class="ivu-input ivu-input-small" :value="i.val" :name="`mid[${i.id}]`" type="text" min="1" style="width: 70px">
									<div class="d-flex align-items-start justify-content-start flex-column plusminus">
										<i class="w-100 plus cursor icon iconfont icon2shang size-12 h-50 ellipsis-1" :data-key="k"></i>
										<i class="w-100 minus cursor icon iconfont iconxiangxia2 size-12 h-50 ellipsis-1" :data-key="k"></i>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-start w-100px itemdosage">{{i.dosage}}{{i.unit}}</div>
								<div class="d-flex align-items-center justify-content-start w-100px itempricermg">{{(i.rmbprice*i.val)|numFilter}}</div>
                                <div class="d-flex align-items-center justify-content-start w-100px itempriceusd">{{i.is_status === 1 ? "可用":"不可用"}}</div>
								<div class="d-flex align-items-center justify-content-center w-50px">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem" :data-key="k" :data-id="i.id" @click="itemsdel(i,k)"></i>
								</div>
							</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-center mt-10 cursor addhxcf" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
							<i class="icon iconfont iconicon-test"></i> 添加更多
						</div>
					</div>
					<div class="hr w-100"></div>
					<div class="size-16 fw text-c01f5e pl-30" style="margin-top: 18px;">医嘱</div>
					<div class="item w-100 mt-20 pl-30 d-flex align-items-center justify-content-start  ">
						<div>
							<div class="size-14 item-text">适应症</div>
							<div class="w-100 mt-8">
								<div class="relative w-400px">
									<i-select v-model="model18" filterable multiple @on-create="handleCreate2" name="cate_id">
										<i-option v-for="item in cityList4" :value="item.value" :key="item.value">{{ item.label }}</i-option>
									</i-select>
								</div>
								<!--<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px hide">-->
								<!--	<select name="city" lay-verify="required">-->
								<!--		<option value="">请选择</option>-->
								<!--		<option value="0">分类</option>-->
								<!--	</select>-->
								<!--</div>-->
							</div>
						</div>

					</div>

					<div class="item w-100 mt-20 pl-30 d-flex align-items-center justify-content-start  ">
						<div class="w-400px d-flex align-items-start justify-content-center">
							<div class="w-190px">
								<div class="size-14 item-text">服用频次<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<div class="ivu-select  ivu-select-single ivu-select-default relative w-190px">
										<select id="frequency" lay-filter="frequency" class="frequency" lay-verify="required" name="taking_quency">
											<option value="">请选择</option>
											<option value="1">一日一次</option>
											<option value="2">早晚各一次</option>
											<!--<option value="2">一日二次</option>
											<option value="3">一日三次</option>-->
										</select>
									</div>
								</div>
							</div>
							<div class="w-190px ml-20">
								<div class=" size-14 item-text">服用时间</div>
								<div class="w-100 mt-8">
									<div class="ivu-select  ivu-select-single ivu-select-default relative w-190px">
										<select id="takedate" class="takedate" lay-filter="takedate" lay-verify="required" name="taking_time">
											<option value="">请选择</option>
											<option value="无建议">无建议</option>
											<option value="早上">早上</option>
											<option value="下午">下午</option>
											<!--出症状时-->
											<!--<option value="0">早餐</option>-->
											<!--<option value="0">午餐</option>-->
											<!--<option value="0">中下午</option>-->
											<!--<option value="0">晚餐</option>-->
											<!--<option value="0">睡前</option>-->
											<!--<option value="0">[早餐、晚餐]</option>-->
											<!--<option value="0">[早餐、午餐、晚餐]</option>-->
										</select>
									</div>
								</div>
							</div>
						</div>
						<div style="margin-left: 40px;" class="w-400px ">
							<div class=" size-14 item-text">周期<span class="text-ff4d4f">*</span></div>
							<div class="w-100 mt-8">
								<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
									<select id="period" class="period" lay-filter="period" lay-verify="required" name="taking_cycle">
										<option value="">请选择</option>
										<option value="28">28天</option>
										<option value="56">56天</option>
										<option value="84">84天</option>
										<!--<option value="10">10天</option>
										<option value="20">20天</option>
										<option value="30">30天</option>
										<option value="60">60天</option>
										<option value="90">90天</option>-->
									</select>
								</div>
							</div>
						</div>
					</div>


					<div class="item pl-30 w-100 mt-20">
						<div class="size-14 item-text">建议</div>
						<div class="w-100 mt-8">
							<div class="relative w-400px">
								<!--可选择或填写-->
								<!--<select name="city" lay-verify="required">-->
								<!--	<option value="">请选择</option>-->
								<!--	<option value="0">分类</option>-->
								<!--</select>-->
								<i-select v-model="model19" filterable multiple allow-create @on-create="handleCreate3" name="taking_suggest">
									<i-option v-for="item in suggest" :value="item.value" :key="item.value">{{ item.label }}</i-option>
								</i-select>
							</div>
						</div>
					</div>


					<div class="hr w-100 "></div>

					<div class="size-16 pl-30 fw text-c01f5e" style="margin-top: 18px;">描述和参考</div>

					<div class="item w-100 pl-30 mt-20 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text">描述</div>
							<div class="w-100 mt-8">
								<textarea rows="3" placeholder="请输入" class="ivu-input w-400px" name="description"></textarea>
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">参考</div>
							<div class="w-100 mt-8">
								<textarea rows="3" placeholder="请输入" class="ivu-input w-400px" name="reference"></textarea>
							</div>
						</div>
					</div>


					<div class="hr w-100 "></div>

					<div class="item pl-30 w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">

						<button class="ivu-btn-primary ivu-btn mr-20 put" type="button">保存本配方</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="submit">取消</a>

					</div>
				</div>

				<div class="ts_right d-flex ml-20 h-auto d-flex align-items-start justify-content-start flex-column">
					<div class="top w-100 bg-fff h-auto pb-10" style="min-height: auto">
						<div class="title bg-f6 fw size-16 text-center">配方概要
							<Poptip placement="right-start">
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
								<div>微片种类</div>
								<div class="wpkind"><span>0</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>活性成分种类</div>
								<div class="hxkind"><span>0</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>辅料种类</div>
								<div class="flkind"><span>0</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>单剂价格</div>
								<div class="singlepricermb"><span>0</span></div>
							</div>


							<div class="item d-flex align-items-center justify-content-between">
								<div>周期合计价格</div>
								<div class="periodpricermb"><span>0</span></div>
							</div>



							<div class="item d-flex align-items-center mt-20" style="border-bottom: none;">
								<button class="w-100 ivu-btn ivu-btn-primary put" type="button">保存本配方</button>
							</div>
						</div>
					</div>

					<div class="mt-20 cf-list w-100 bg-fff">
						<div class="title fw size-16 text-center">成分列表
							<Poptip placement="right-start">
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
								<div>成分名称</div>
								<div>剂量</div>
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
					<span class="fw size-16">添加微片</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<div class="items w-100" style="height: 520px;margin-top: 0;">
					<iframe src="<?php echo Url('microchip_selected'); ?>" class="w-100 h-100" style="border: none"></iframe>
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
			message     : 'Hello Vue.js!',
			ismodel     : false,
			cf          : '',
			cityList4   : [
				<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				{
					value: '<?php echo htmlentities($vo['id']); ?>',
					label: '<?php echo htmlentities($vo['title']); ?>',
				},
				<?php endforeach; endif; else: echo "" ;endif; ?>

			],
			suggest     : [],
			model18     : [],
			model19     : [],
			deme        : 1,
			cflist      : [],
			hxcflistdata: [],
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
	var takedate = 0, period = 0, frequency = 0;
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
		var map = {}, dest = [], singlepricermb = 0, periodpricermb = 0,  wpkind = 0, hxkind = 0, flkind = 0,is_status = 0, ids = [];
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
					ai.name1 = ai.name + ai.unit;
					if (!map[ai.name1]) {
						dest.push({
							id   : ai.id,
							name : ai.name,
							value: ai.dose,
							unit : ai.unit,
							type : ai.type,
						});
						map[ai.name1] = ai;
					} else {
						for (var j = 0; j < dest.length; j++) {
							var dj   = dest[j];
							dj.name1 = dj.name + dj.unit;
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
			"id"       : item.id,
			"kind"     : item.kind,
			"pid"      : item.pid,
			"name"     : item.name,
			"scope"    : item.scope,
			"maxnum"   : item.maxnum,
			"unit"     : item.unit,
			"val"      : item.val,
			"dosage"   : item.dosage,
			"dosage1"  : item.dosage1,
			"rmbprice" : item.rmbprice,
			"is_status": item.is_status,
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
			"id"       : item.id,
			"kind"     : item.kind,
			"pid"      : item.pid,
			"name"     : item.name,
			"scope"    : item.scope,
			"maxnum"   : item.maxnum,
			"unit"     : item.unit,
			"val"      : item.val,
			"dosage"   : item.dosage,
			"dosage1"  : item.dosage1,
			"rmbprice" : item.rmbprice,
			"is_status": item.is_status,
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
	// 	// $(this).parent().parent().remove();
	// 	// total();
	// 	var key = $(this).data('key');
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
	
	
	// total();
</script>
