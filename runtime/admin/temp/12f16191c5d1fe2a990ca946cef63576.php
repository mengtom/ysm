<?php /*a:5:{s:47:"F:\WWW\yeshai\app\admin\view/ysm\ts\ts\cost.php";i:1603372339;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1595304974;}*/ ?>
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
</head>
<body class="bg-f2f3f5">
<!-- <script>
 $eb = parent._mpApi;
</script> -->


<div class = "h-100 w-100 ts-cost" id = "app">
	<!--头部-->
	<!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start w-75 ">
                    <div class="top-logo d-flex align-items-center justify-content-center h-100 ">
                        <img src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/ysm/static/images/zimg-logo.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item "><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li class="ivu-menu-submenu <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                    <div class="ivu-menu-submenu-title">
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
                <div class="top_right w-25 h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-50 text-right">
                        <a class="text-27" href=""><?php echo htmlentities($_admin['real_name']); ?><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '管理员'; ?></a>
                        <a class="text-c01f5e" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>

	<!--头部-->
	<div class = "w-1200 mt-80 mb-10 tip  text-666 size-14">
		<a class = "text-57">首页 /</a> <span class = "text-c01f5e">计算成本</span>
	</div>
	
	<div class = "w-1200 list-title d-flex align-items-center justify-content-between mb-10 mt-10">
		<span class = "size-20 fw">计算成本</span>
	</div>
	
	<!--列表-->
	<div class = "w-1200 mb-30 wrap bg-fff">
		
		<div class = "w-100 text-c01f5e size-16 fw pb-20">配方信息</div>
		
		<!--表格-->
		<div class = "w-100 table">
			<table class = "ivu-table  ivu-table-default">
				<tbody class = "ivu-table-tbody">
				
				<tr class = "ivu-table-header cursor">
					<th class = "bg-f6 w-285px">微片名称</th>
					<!--<th class = "bg-f6 w-285px">微片价格(￥)</th>-->
					<th class = "bg-f6 w-285px">微片数量</th>
					<th class = "bg-f6 w-285px">COG成本价(￥)</th>
					<th class = "bg-f6 w-285px">COG成本价($)</th>
					<th class = "bg-f6 w-285px">Pircing成本价(￥)</th>
					<th class = "bg-f6 w-285px">Pircing成本价($)</th>
					<th class = "bg-f6 w-285px">重量(mg)</th>
				</tr>
				
				<?php if(is_array($microchip) || $microchip instanceof \think\Collection || $microchip instanceof \think\Paginator): $i = 0; $__LIST__ = $microchip;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$micro): $mod = ($i % 2 );++$i;?>
				<tr class = "cursor text-57">
					<td class = "ckitem text-57"><?php echo htmlentities($micro['name_zn']); ?></td>
					<td class = "ckitem text-57"><?php echo htmlentities($micro['num']); ?></td>
					<td class = "ckitem text-57"><?php echo htmlentities($micro['price']); ?></td>
					<td class = "ckitem text-57"><?php echo htmlentities($micro['usd']); ?></td>
					<td class = "ckitem text-57"><?php echo htmlentities($micro['pricing_rmb']); ?></td>
					<td class = "ckitem text-57"><?php echo htmlentities($micro['pricing_usd']); ?></td>
					<td class = "ckitem text-57"><?php echo htmlentities($micro['weight']); ?></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<!-- <tr class = "cursor text-57">
					<td class = "ckitem text-57">微片名称</td>
					<td class = "ckitem text-57">100.00</td>
					<td class = "ckitem text-57">1000.00</td>
					<td class = "ckitem text-57">10</td>
				</tr>
				<tr class = "cursor text-57">
					<td class = "ckitem text-57">微片名称</td>
					<td class = "ckitem text-57">100</td>
					<td class = "ckitem text-57">1000.00</td>
					<td class = "ckitem text-57">10</td>
				</tr> -->
				</tbody>
			</table>
		</div>
		<div class = "w-100 mt-30 mb-30">
			<hr class = "hr">
		</div>
		
		<div class = "w-100 text-c01f5e size-16 fw pb-20">重量</div>
		
		<div class = "table" style = "width: 570px;">
			<table class = "ivu-table w-100  ivu-table-default">
				<tbody class = "ivu-table-tbody">
				<tr class = "ivu-table-header cursor">
					<th class = "bg-f6 w-190px">微片总重(克)</th>
					<th class = "bg-f6 w-190px">包装总重(克)</th>
					<th class = "bg-f6 w-190px">重量合计(克)</th>
				</tr>
				<tr class = "cursor text-57">
					<td class = "ckitem text-57">{{wptotalweight|number}}</td>
					<td class = "ckitem text-57">{{totalpacking|number}}</td>
					<td class = "ckitem text-57">{{totalall|number}}</td>
				</tr>
				</tbody>
			</table>
		</div>
		
		<div class = "w-100 mt-30 mb-30">
			<hr class = "hr">
		</div>
		
		<div class = "w-100 mb-20 hide">
			<div class = "w-100 fw">微片加工费</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
					<input autocomplete = "off" v-model = "machiningrmb" spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input ivu-input-default ivu-input-with-prefix">
					<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "font-size: 14px;color: #272727"></i></span>
				</div>
				<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
					<input autocomplete = "off" v-model = "machiningusd" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix">
					<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "font-size: 14px;color: #272727"></i></span>
				</div>
			</div>
		</div>
		
		<div class = "w-100 mb-20">
			<div class = "w-100 fw">包装人工费/盒</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
					<input autocomplete = "off" v-model = "packingrmb" spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input ivu-input-default ivu-input-with-prefix">
					<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "font-size: 14px;color: #272727"></i></span>
				</div>
				<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
					<input autocomplete = "off" v-model = "packingusd" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix">
					<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "font-size: 14px;color: #272727"></i></span>
				</div>
			</div>
		</div>
		
		<div class = "w-100 mb-20 hide">
			<div class = "w-100 fw">关税</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "w-190px d-flex align-items-center justify-content-between text-57 pr-10">
					<input type = "text" v-model = "tariff" placeholder = "请输入数字" class = "ivu-input w-150px ivu-input-default">%
				</div>
			</div>
		</div>
		
		<div class = "w-100 mb-20">
			<div class = "w-100 fw">服用频次:</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "d-flex align-items-center justify-content-between text-57 pr-10">
					<radio-group v-model = "frequency" @on-change = "changefrequency">
						<Radio label = "1">一日一次</Radio>
						<Radio label = "2">早晚各一次</Radio>
					</radio-group>
				</div>
			</div>
		</div>
		
		<div class = "w-100 mb-20">
			<div class = "w-100 fw">服用周期:</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "d-flex align-items-center justify-content-between text-57 pr-10">
					<radio-group v-model = "cycle" @on-change = "changefrequency">
						<Radio label = "28">28天</Radio>
						<Radio label = "56">56天</Radio>
						<Radio label = "84">84天</Radio>
					</radio-group>
				</div>
			</div>
		</div>
		
		<div class = "w-100 mb-20">
			<div class = "w-100 fw">微片成本价计算方式:</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "d-flex align-items-center justify-content-between text-57 pr-10">
					<radio-group v-model = "mode">
						<Radio label = "1">COG成本</Radio>
						<Radio label = "2">Pricing成本价</Radio>
					</radio-group>
				</div>
			</div>
		</div>
		
		<div class = "w-100 mb-20">
			<div class = "w-100 fw">物流选择:</div>
			<div class = "w-100 d-flex mt-10">
				<div class = "d-flex align-items-center justify-content-between text-57 pr-10">
					<radio-group v-model = "logistics">
						<Radio label = "1">B-C</Radio>
						<Radio label = "2">air</Radio>
						<Radio label = "3">sea</Radio>
						<Radio label = "4">B-HK-C</Radio>
						<Radio label = "5">air to C</Radio>
						<Radio label = "6">sea to C</Radio>
					</radio-group>
				</div>
			</div>
		</div>
		
		<div class = "w-100 pr-10 pt-10 pl-10 pb-10 logistics">
			<div class = "w-100">
				<div class = "w-100 fw">物流方式及价格:</div>
				<div class = "w-100 d-flex mt-10 justify-content-between align-items-start">
					<div class = "border table" style = "width: 750px;border: solid 1px #d9d9d9;">
						<table class = "ivu-table  ivu-table-default w-100">
							<tbody class = "ivu-table-tbody">
							<tr class = "ivu-table-header cursor">
								<th class = "bg-f6 w-100px"></th>
								<th class = "bg-f6 w-100px">B-C(￥)</th>
								<th class = "bg-f6 w-100px">B-C($)</th>
								<th class = "bg-f6 w-100px">air(￥)</th>
								<th class = "bg-f6 w-100px">air($)</th>
								<th class = "bg-f6 w-100px">sea(￥)</th>
								<th class = "bg-f6 w-100px">sea($)</th>
								<th class = "bg-f6 w-100px">B-HK-C(￥)</th>
								<th class = "bg-f6 w-100px">B-HK-C($)</th>
							</tr>
							
							<tr class = "cursor text-57" v-for = "(i,k) in wuliu">
								<td class = "ckitem text-57">{{i.kg}}kg</td>
								<td class = "ckitem text-57">{{i.bcrmb}}</td>
								<td class = "ckitem text-57">{{i.bcusd}}</td>
								<td class = "ckitem text-57">{{i.airrmb}}</td>
								<td class = "ckitem text-57">{{i.airusd}}</td>
								<td class = "ckitem text-57">{{i.searmb}}</td>
								<td class = "ckitem text-57">{{i.seausd}}</td>
								<td class = "ckitem text-57">{{i.bhkcrmb}}</td>
								<td class = "ckitem text-57">{{i.bhkcusd}}</td>
							</tr>
							
							</tbody>
						</table>
					</div>
					<div class = "w-300px border table" style = "border: solid 1px #d9d9d9;">
						<table class = "ivu-table  ivu-table-default w-100">
							<tbody class = "ivu-table-tbody">
							<tr class = "ivu-table-header cursor">
								<th class = "bg-f6 w-100px">国外当地物流</th>
								<th class = "bg-f6 w-100px">价格(￥)</th>
								<th class = "bg-f6 w-100px">价格($)</th>
							</tr>
							<tr class = "cursor text-57" v-for = "(i,k) in wuliu1">
								<td class = "ckitem text-57">{{i.kg}}kg</td>
								<td class = "ckitem text-57">{{i.valrmb}}</td>
								<td class = "ckitem text-57">{{i.valusd}}</td>
							</tr>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class = "w-100 mt-30 mb-30">
			<hr class = "hr">
		</div>
		<div class = "w-100 mt-30 mb-30 d-flex align-items-center">
			<button class = "ivu-btn ivu-btn-primary" type = "button" @click = "save()">保存并计算成本</button>
			<span class = "fw size-16 ml-20 mr-20" v-show = "costpricermb >0 ">计算结果：￥{{costpricermb | number}}</span>
			<span class = "fw size-16 ml-20" v-show = "costpriceusd >0 ">计算结果：${{costpriceusd | number}}</span>
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



<script src = "/js/axios.js"></script>
<script type = "text/javascript">
	var app = new Vue({
		el     : "#app",
		data   : {
			//汇率
			exchangerate     : 7,
			// machiningrmb     : "<?php echo htmlentities($config['microchip_processing_rmb']); ?>",//微片加工费
			// machiningusd     : "<?php echo htmlentities($config['microchip_processing_usd']); ?>",
			machiningrmb     : 0,//微片加工费
			machiningusd     : 0,
			packingrmb       : "<?php echo htmlentities($config['packing_labor_rmb']); ?>",//人工费
			packingusd       : "<?php echo htmlentities($config['packing_labor_usd']); ?>",
			// tariff           : "<?php echo htmlentities($config['tariff']); ?>", //关税
			tariff           : 0, //关税
			frequency        : "<?php echo htmlentities($info['taking_quency']); ?>", //频次
			cycle            : "<?php echo htmlentities($info['taking_cycle']); ?>",  //周期
			mode             : "1",
			logistics        : "1",//物流选择
			microchip        : "", // 微片
			aluminum_cuprmb  : "<?php echo htmlentities($config['single_dose_ymb']); ?>", // 铝杯
			aluminum_cupusd  : "<?php echo htmlentities($config['single_dose_usd']); ?>", // 铝杯
			parafilmrmb      : 0,// 封口膜
			parafilmusd      : 0,// 封口膜
			color_boxrmb     : "<?php echo htmlentities($config['out_pack_ymb']); ?>", // 彩盒
			color_boxusd     : "<?php echo htmlentities($config['out_pack_usd']); ?>", // 彩盒
			manualusd        : "<?php echo htmlentities($config['brochure_rmb']); ?>", // 手册
			manualrmb        : "<?php echo htmlentities($config['brochure_usd']); ?>", // 手册
			transport_casermb: "<?php echo htmlentities($config['packing_shipping_rmb']); ?>", // 运输箱
			transport_caseusd: "<?php echo htmlentities($config['packing_shipping_usd']); ?>", // 运输箱
			freightrmb       : 0,//运输费
			freightusd       : 0,//运输费
			canisterrmb      : "<?php echo htmlentities($config['barrel_price_ymb']); ?>", //筒
			canisterusd      : "<?php echo htmlentities($config['barrel_price_usd']); ?>", //筒
			totalrmb         : 0,
			singledose       : "<?php echo htmlentities($info['microchip_weight']); ?>",// 单剂微片总重量
			wptotalweight    : 0,// 微片总重量
			totalpacking     : 0,//包装总重量
			totalall         : 0,//总重量
			wuliu            : [
				<?php if(is_array($config_logistics) || $config_logistics instanceof \think\Collection || $config_logistics instanceof \think\Paginator): $i = 0; $__LIST__ = $config_logistics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
				{"kg": "<?php echo htmlentities($log['weight']); ?>", "bcrmb": "<?php echo htmlentities($log['bc_rmb']); ?>", "bcusd": "<?php echo htmlentities($log['bc_usd']); ?>", "airrmb": "<?php echo htmlentities($log['air_rmb']); ?>", "airusd": "<?php echo htmlentities($log['air_usd']); ?>", "searmb": "<?php echo htmlentities($log['sea_rmb']); ?>", "seausd": "<?php echo htmlentities($log['sea_usd']); ?>", "bhkcrmb": "<?php echo htmlentities($log['bhkc_rmb']); ?>", "bhkcusd": "<?php echo htmlentities($log['bhkc_usd']); ?>"},
				<?php endforeach; endif; else: echo "" ;endif; ?>
			],
			wuliuarr         : ["bc", "air", "sea", "bhk", "air", "sea"],
			wuliu1           : [
				<?php if(is_array($config_logistics) || $config_logistics instanceof \think\Collection || $config_logistics instanceof \think\Paginator): $i = 0; $__LIST__ = $config_logistics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$logi): $mod = ($i % 2 );++$i;?>
				{"kg": "<?php echo htmlentities($logi['weight']); ?>", "valrmb": "<?php echo htmlentities($logi['local_logistics_abroad_rmb']); ?>", "valusd": "<?php echo htmlentities($logi['local_logistics_abroad_usd']); ?>"},
				<?php endforeach; endif; else: echo "" ;endif; ?>
			],
			costpricermb           : 0,//成本计算
			costpriceusd           : 0,
			wpprice                : 1,//微片成本价
			wppricecogrmb          : <?php echo htmlentities($info['cost_rmb']); ?>,//微片成本价cog
			wppricecogusd          : <?php echo htmlentities($info['cost_usd']); ?>,//微片成本价cog
			wppricepricingrmb      : <?php echo htmlentities($info['pricing_rmb']); ?>,//微片成本价pricing
			wppricepricingusd      :<?php echo htmlentities($info['pricing_usd']); ?>,//微片成本价pricing
			single_dose_weight     : "<?php echo htmlentities($config['single_dose_weight']); ?>",//铝杯 重量
			barrel_weight          : "<?php echo htmlentities($config['barrel_weight']); ?>",//纸筒 重量
			out_pack_weight        : "<?php echo htmlentities($config['out_pack_weight']); ?>",//彩盒 重量
			packing_shipping_weight: "<?php echo htmlentities($config['packing_shipping_weight']); ?>",//运输盒 重量
			brochure_weight        : "<?php echo htmlentities($config['brochure_weight']); ?>",//手册 重量
		},
		filters: {
			number(value) {
				return value > 0 ? value.toFixed(2) : 0;
			},
		},
		//重量合计=(单剂微片总重量*周期*频次)+(杯*周期*频次+(筒*周期*频次)÷7)+([(彩盒+运输箱+手册)*频次*周期÷28])
		methods: {
			//微片总重量计算
			totalweightall() {
				//(单剂微片总重量*周期*频次
				var singledose     = parseFloat(this.singledose) >0 ? parseFloat(this.singledose) : 0;// 单剂微片总重量
				var cycle          = parseFloat(this.cycle); //周期
				var frequency      = parseFloat(this.frequency); //频次
				var wptotalweight  = (parseFloat(singledose * cycle * frequency)/1000);//上面单位是g
				this.wptotalweight = wptotalweight;
				//杯重量
				var aluminum_cup   = parseFloat(this.single_dose_weight);// 铝杯
				var aluminumtota   = (aluminum_cup * cycle * frequency);
				
				var canister     = parseFloat(this.barrel_weight);// 桶
				var canistertota = (canister * cycle * frequency);
				
				var color_box      = parseFloat(this.out_pack_weight);//彩盒
				var manual         = parseFloat(this.brochure_weight);//手册
				var transport_case = parseFloat(this.packing_shipping_weight);//运输箱
				var totalpacking   = parseFloat(((aluminumtota + (canistertota) / 7)) + ((color_box + transport_case + manual) * cycle * frequency / 28));
				this.totalpacking  = totalpacking;
				this.totalall      = totalpacking + wptotalweight;
			},
			//保存计算结果
			save() {
				this.totalweightall();
				this.comfreight();
				// 计算成本 =(微片成本价/1000)*周期*频次+ {人工费*[(周期*频次)÷28]} + {(铝杯+封口膜)*周期*频次+筒*[(周期*频次)÷7]+(彩盒+手册)*[(周期*频次)÷28]} + 运输箱+运输费
				// var wpprice        = parseFloat(this.wpprice);//微片成本价
				if (this.mode === "1") {
					console.log(111)
					var wppricermb = parseFloat(this.wppricecogrmb) > 0 ? parseFloat(this.wppricecogrmb) : 0;
					var wppriceusd = parseFloat(this.wppricecogusd) > 0 ? parseFloat(this.wppricecogusd) : 0;
				} else {
					console.log(222)
					var wppricermb = parseFloat(this.wppricepricingrmb) > 0 ? parseFloat(this.wppricepricingrmb) : 0;
					var wppriceusd = parseFloat(this.wppricepricingusd) > 0 ? parseFloat(this.wppricepricingusd) : 0;
				}
				console.log(wppricermb,wppriceusd)
				var cycle             = parseFloat(this.cycle); //周期
				var frequency         = parseFloat(this.frequency); //频次
				var packingrmb        = parseFloat(this.packingrmb);//人工费
				var packingusd        = parseFloat(this.packingusd);//人工费
				var aluminum_cuprmb   = parseFloat(this.aluminum_cuprmb);// 铝杯
				var aluminum_cupusd   = parseFloat(this.aluminum_cupusd);// 铝杯
				var parafilmrmb       = parseFloat(this.parafilmrmb);// 封口膜
				var parafilmusd       = parseFloat(this.parafilmusd);// 封口膜
				var canisterrmb       = parseFloat(this.canisterrmb);// 桶
				var canisterusd       = parseFloat(this.canisterusd);// 桶
				var color_boxrmb      = parseFloat(this.color_boxrmb);//彩盒
				var color_boxusd      = parseFloat(this.color_boxusd);//彩盒
				var manualrmb         = parseFloat(this.manualrmb);//手册
				var manualusd         = parseFloat(this.manualusd);//手册
				var transport_casermb = parseFloat(this.transport_casermb);//运输箱
				var transport_caseusd = parseFloat(this.transport_caseusd);//运输箱
				var freightrmb        = parseFloat(this.freightrmb);//运输费
				var freightusd        = parseFloat(this.freightusd);//运输费
				
				var costpricermb  = ((wppricermb / 1000) * cycle * frequency) + (packingrmb * ((cycle * frequency) / 28)) + (((aluminum_cuprmb + parafilmrmb) * cycle * frequency) + (canisterrmb * ((cycle * frequency) / 7)) + ((color_boxrmb + manualrmb) * ((cycle * frequency) / 28))) + transport_casermb + freightrmb;
				this.costpricermb = costpricermb;
				var costpriceusd  = ((wppriceusd / 1000) * cycle * frequency) + (packingusd * ((cycle * frequency) / 28)) + (((aluminum_cupusd + parafilmusd) * cycle * frequency) + (canisterusd * ((cycle * frequency) / 7)) + ((color_boxusd + manualusd) * ((cycle * frequency) / 28))) + transport_caseusd + freightusd;
				this.costpriceusd = costpriceusd;
				
				var postdata = {
					machiningrmb: this.machiningrmb,
					machiningusd: this.machiningusd,
					packingrmb  : this.packingrmb,
					packingusd  : this.packingusd,
					tariff      : this.tariff,
					frequency   : this.frequency,
					cycle       : this.cycle,
					mode        : this.mode,
				};
				//提交数据
				/*				axios("url", postdata).then(e => {
				 if (e.data.code == 1) {
				 console.log("提交成功");
				 }
				 }).error(console.log("提交错误"));*/
			},
			//选择频次,选择周期
			changefrequency(e) {
				this.totalweightall();
			},
			//运输计算
			comfreight() {
				var totalall  = parseFloat(this.totalall);//总重量
				var logistics = parseFloat(this.logistics);//物流选择
				var wuliu     = this.wuliu;
				// totalall      = 1999;
				var key       = 0;
				if (totalall >= 0 && totalall >= 1000) {
					key = 0;
				}
				if (totalall > 1000 && totalall <= 2000) {
					key = 1;
				}
				if (totalall > 2000) {
					key = 2;
				}
				var freightrmb = 0, freightusd = 0;
				// var name    = Object.keys(wuliu[key]);
				var wuliuarr   = this.wuliuarr;
				var obj        = wuliu[key];
				var obgs       = [];//第一个是人民币，二是美元
				for (let key in obj) {
					if (key.indexOf(wuliuarr[(logistics - 1)]) == 0) {
						obgs.push(obj[key]);
					}
				}
				freightrmb = obgs[0];
				freightusd = obgs[1];
				// var values  = Object.values(wuliu[key]);
				// if (logistics == 5) {
				//     freight = parseFloat(values[2]);
				// } else if (logistics == 6) {
				//     freight = parseFloat(values[3]);
				// } else {
				//     freight = parseFloat(values[logistics]);
				// }
				//to-c   air+国外当地价格  sea+国外当地价格
				if (logistics == 5 || logistics == 6) {
					var wuliu1  = this.wuliu1;
					var values1 = Object.values(wuliu1[key]);
					freightrmb  = parseFloat(values1[1]) + parseFloat(freightrmb);
					freightusd  = parseFloat(values1[2]) + parseFloat(freightusd);
				}
				this.freightrmb = freightrmb;
				this.freightusd = freightusd;
				
				
			},
		},
		created() {
			this.totalweightall();
		},
	});


</script>
