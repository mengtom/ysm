{include file="public/header"}
	<title>微片添加-编辑</title>

	<div id="app" class="ts-edit">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html"> TS配方 / </a> <span class="text-c01f5e"> 添加配方 </span>
		</div>
		<!--列表-->
		<div class="w-1200  wp-edit mt-10 pb-10 mb-30" style="border-radius: 1px;">
			<form class="d-flex layui-form  align-items-start justify-content-between" action="{:Url('save')}" method="post">
				<input type="text" hidden name="ts_id">
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
							<div class="d-flex align-items-center justify-content-center w-50px">
								<input type="checkbox" lay-ignore lay-skin="primary" style="display: block" class="checked-items ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">
							</div>
							<div class="d-flex align-items-center justify-content-start w-200px">微片名称</div>
							<div class="d-flex align-items-center justify-content-start w-150px">剂量范围</div>
							<div class="d-flex align-items-center justify-content-start w-150px">最大剂量</div>
							<div class="d-flex align-items-center justify-content-start w-150px">数量调节</div>
							<div class="d-flex align-items-center justify-content-start w-100px">剂量显示</div>
							<div class="d-flex align-items-center justify-content-start w-100px">价格￥</div>
							<div class="d-flex align-items-center justify-content-start w-100px">价格$</div>
							<div class="d-flex align-items-center justify-content-center w-50px">删除</div>
						</div>
						<div class="w-100 d-flex align-items-center justify-content-start flex-column  hxcflist">

							<!--<div class="w-100 mt-10 d-flex align-items-center justify-content-around flex-column hxcfitem">-->

							<!--</div>-->

							<div class="w-100 d-flex align-items-center justify-content-around hxcfitem" data-type="5" data-name="微片一" data-value="5" data-num="5" data-unit="ug" data-id="1" style="height: 40px;">
								<div class="d-flex align-items-center justify-content-center w-50px h-100">
									<input type="checkbox" name="m_id[]" lay-ignore lay-skin="primary" style="display: block" class="ivu-checkbox ivu-checkbox-checked ivu-checkbox-inner">
								</div>
								<div class="text-left ellipsis-1 w-200px">微片名称</div>
								<div class="d-flex align-items-center justify-content-start w-150px">100-1000mg</div>
								<div class="d-flex align-items-center justify-content-start w-150px maximum">1000mg</div>
								<div class="d-flex align-items-center justify-content-start w-150px ">
									<input class="ivu-input ivu-input-small" name="m_num[]" data-num="10" value="1" type="number" min="1" style="width: 70px">
									<div class="d-flex align-items-start justify-content-start flex-column plusminus">
										<i class="w-100 plus cursor icon iconfont icon2shang size-12 h-50 ellipsis-1"></i>
										<i class="w-100 minus cursor icon iconfont iconxiangxia2 size-12 h-50 ellipsis-1"></i>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-start w-100px itemdosage">1000mg</div>
								<div class="d-flex align-items-center justify-content-start w-100px itempricermg">20</div>
								<div class="d-flex align-items-center justify-content-start w-100px itempriceusd">3.8</div>
								<div class="d-flex align-items-center justify-content-center w-50px">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>
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
									<i-select v-model="model18" filterable multiple  @on-create="handleCreate2" name="cate_id">
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
											<option value="一日一次">一日一次</option>
											<option value="一日二次">一日二次</option>
											<option value="一日三次">一日三次</option>
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
										<option value="10天">10天</option>
										<option value="20天">20天</option>
										<option value="30天">30天</option>
										<option value="60天">60天</option>
										<option value="90天">90天</option>
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

						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">保存本配方</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="submit">取消</a>

					</div>
				</div>

				<div class="ts_right d-flex ml-20 h-auto d-flex align-items-start justify-content-start flex-column">
					<div class="top w-100 bg-fff">
						<div class="title bg-f6 fw size-16 text-center">配方概要
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
								<div>微片种类</div>
								<div class="wpkind"><span>63.00</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>活性成分种类</div>
								<div class="hxkind"><span>63.00</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>辅料种类</div>
								<div class="flkind"><span>63.00</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>单剂价格(RMB)</div>
								<div class="singlepricermb">￥<span>63.00</span></div>
							</div>

							<div class="item d-flex align-items-center justify-content-between">
								<div>单剂价格(USD)</div>
								<div class="singlepriceusd">$<span>63.00</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>周期合计价格(RMB)</div>
								<div class="periodpricermb">￥<span>63.00</span></div>
							</div>
							<div class="item d-flex align-items-center justify-content-between">
								<div>周期合计价格(USD)</div>
								<div class="periodpriceusd">$<span>63.00</span></div>
							</div>


							<div class="item d-flex align-items-center mt-20" style="border-bottom: none;">
								<button class="w-100 ivu-btn ivu-btn-primary ">保存本配方</button>
							</div>
						</div>
					</div>

					<div class="mt-20 cf-list w-100 bg-fff">
						<div class="title fw size-16 text-center">成分列表
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
								<div>微片种类</div>
								<div>剂量</div>
							</div>
						</div>

						<div class="items w-100 d-flex align-items-center justify-content-center flex-column mb-30">
							<div v-for="i in cflist" class="item  d-flex align-items-center justify-content-between">
								<div>{{i.name}}</div>
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
					<iframe src="{:Url('microchip_selected')}" class="w-100 h-100" style="border: none"></iframe>
				</div>
			</div>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<!-- <script src="/js/less.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/vue.js"></script>
<script src="/js/iview.min.js"></script>

<script src="/js/public.js"></script>
<script src="/plugins/layui/layui.js"></script> -->
<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message  : 'Hello Vue.js!',
			ismodel  : false,
			cf       : '',
			cityList4: [
				{volist name="$cate2" id="vo"}
				{
					value: '{$vo.id}',
					label: '{$vo.title}',
				},
				{/volist}

			],
			suggest: [],
			model18  : [],
			model19  : [],
			deme     : 1,
			cflist   : [{name:'成分',value:'2',unit:'mg'}],
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

			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});



	// console.log(dest);





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
		var arr  = [];
		var hxcfitems = $('.hxcflist').find('.hxcfitem');
		for (var i = 0; i < hxcfitems.length; i++) {
			var value                  = 1;
			value                      = hxcfitems[i].getElementsByClassName('ivu-input-small')[0].value;
			hxcfitems[i].dataset.value = hxcfitems[i].dataset.num * value;
			arr.push(hxcfitems[i].dataset);
		}

		// var arr = [
		// 	{"id": "10", "name": "张三", "value": "2","unit":'ul'},
		// 	{"id": "11", "name": "张三", "value": "2","unit":'mg'},
		// 	{"id": "12", "name": "张三", "value": "3","unit":'mg'},
		// 	{"id": "22", "name": "李四", "value": "1120","unit":'mg'},
		// 	{"id": "23", "name": "李四", "value": "1362","unit":'ui'},
		// 	{"id": "24", "name": "王五", "value": "1008","unit":'mg'},
		// 	{"id": "31", "name": "王五", "value": "1360","unit":'mg'},
		// 	{"id": "41", "name": "赵六", "value": "1986","unit":'ul'},
		// 	{"id": "42", "name": "赵六", "value": "1240","unit":'mg'},
		// ];
		var map = {},dest = [];
		for(var i = 0; i < arr.length; i++){
			var ai   = arr[i];
			ai.name1 = ai.name + ai.unit;
			if(!map[ai.name1]){
				dest.push({
					id   : ai.id,
					name : ai.name,
					value: ai.value,
					unit : ai.unit,
				});
				map[ai.name1] = ai;
			}else{
				for(var j = 0; j < dest.length; j++){
					var dj = dest[j];
					dj.name1 = dj.name + dj.unit;
					if(dj.name1 == ai.name1){
						dj.value=(parseFloat(dj.value) + parseFloat(ai.value)).toString();
						break;
					}
				}
			}
		};
		app.$data.cflist =dest;


		// hxcflist  列表class
		// console.log(takedate,period,frequency);
		var wpkind = 0, hxkind = 0, flkind = 0, singlepricermb = 0, singlepriceusd = 0, periodpricermb = 0, periodpriceusd = 0;

		/*
		itempricermg
		itempriceusd
		ivu-input-small
		*/

		/*
		* 单剂周期价格 -rmg
		* */
		var itempricermglist = $('.hxcflist').find('.itempricermg');
		for (var i = 0; i < itempricermglist.length; i++) {
			singlepricermb=+parseFloat(itempricermglist[i].innerHTML)
		}
		periodpricermb = singlepricermb * period * frequency;
		/*
		* 单剂周期价格 -usd
		* */
		var itempriceusdlist = $('.hxcflist').find('.itempriceusd');
		for (var i = 0; i < itempriceusdlist.length; i++) {
			singlepriceusd=+parseFloat(itempriceusdlist[i].innerHTML)
		}
		periodpriceusd = singlepriceusd * period * frequency;




		$('.wpkind span').html(wpkind)
		$('.hxkind span').html(hxkind)
		$('.flkind span').html(flkind)
		$('.singlepricermb span').html(singlepricermb)
		$('.singlepriceusd span').html(singlepriceusd)
		$('.periodpricermb span').html(periodpricermb)
		$('.periodpriceusd span').html(periodpriceusd)
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
		return false;
		layer.open({
			type     : 2,
			title    : '添加微片',
			closeBtn : 1, //不显示关闭按钮
			shade    : 0.5,
			resize   : false,
			scrollbar: false,
			area     : ['900px', '618px'],
			anim     : 2,
			content  : '{:Url('microchip_selected')}', //iframe的url，no代表不显示滚动条
		});
	});


	/*
	* 数量加
	* itemdosage  剂量显示
	* itempricermg 价格人民币
	* itempriceusd 价格美元
	*
	*/
	$(".hxcflist").on('click', '.plus', function () {
		var val = 0, maximum = 0;
		//获取input的值
		val     = $(this).parent().prev().val();
		//获取最大值
		maximum = parseFloat($(this).parent().parent().prev('.maximum').text());
		if (val >= 0) {
			val++;
		}

		$(this).parent().prev().val(val);
		$(this).parent().parent().next('.itemdosage').html(maximum * val + 'mg');
		$(this).parent().parent().next().next('.itempricermg').html(2 * val );
		$(this).parent().parent().next().next().next('.itempriceusd').html(1.5 * val );
		total();
	});
	/*
	* 数量减
	* */
	$(".hxcflist").on('click', '.minus', function () {
		var val = 0,maximum = 0;
		//获取最大值
		maximum = parseFloat($(this).parent().parent().prev('.maximum').text());
		val     = $(this).parent().prev().val();
		if (val > 1) {
			val--;
		}
		$(this).parent().prev().val(val);
		$(this).parent().parent().next('.itemdosage').html(maximum / val + 'mg');
		$(this).parent().parent().next().next('.itempricermg').html(2 / val );
		$(this).parent().parent().next().next().next('.itempriceusd').html(1.5 / val );
		total();
	});

	/*
	* 点击删除活性成分
	* */
	$(".hxcflist").on('click', '.rmhxcfitem', function () {
		$(this).parent().parent().remove();
		total();
	});

	$('.closemode').click(function () {
		$('.ts-edit-modal').hide();
	});

	/*
	* 关闭窗口-框架集使用
	* */
	function closemode() {
		$('.ts-edit-modal').hide();
		total();
	}
</script>
