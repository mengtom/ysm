<?php /*a:5:{s:53:"F:\WWW\yeshai\app\doctor\view\crm\crm_order\order.php";i:1600853796;s:47:"F:\WWW\yeshai\app\doctor\view\public\header.php";i:1602238877;s:47:"F:\WWW\yeshai\app\doctor\view\public\footer.php";i:1603783219;s:53:"F:\WWW\yeshai\app\doctor\view\public\inner_footer.php";i:1603783219;s:51:"F:\WWW\yeshai\app\doctor\view\public\layui_page.php";i:1595310927;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>后台-首页</title>
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/ts-iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/ts-view.css">
	<link rel="stylesheet" href="/ysm/static/css/ts-common.css">
    <style>
        html, body {
            width      : 100%;
            height     : 100%;
            background : #f2f3f5;
        }
    </style>
</head>

	<title>CMR-列表-订单</title>
	<div class="h-100 w-100 mw-1140 pr-20 pl-20 crm-order" id="app">

		<div class="w-100 mt-20 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-0081a7">采购订单 </span>
		</div>

		<div style="height: 34px;" class="w-100">
			<div class="w-100 h-100 d-flex align-items-center justify-content-start tab relative">
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative" :class="{'tab-item-active':where.status===item.value}" v-for="item in orderStatus"><a @click="getitems(item.value,1)">{{item.name}}<span v-if="item.count!=undefined" >({{item.count}})</span></a></div>
				<!-- <div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">待付款(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">待发货(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">待收货(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">已完成(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="order1.html">已关闭(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="">退款申请(00)</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="order2.html">已退款(00)</a></div> -->
			</div>
		</div>

		<!--搜索区-->
		<div class="w-100 relative" style="border: 1px solid #d9d9d9;z-index: 1">
			<div class="w-100 com-search mt-0 bg-fff" style="border-bottom: 2px solid #f0f0f0;">
				<div class="keyword w-100  h-auto">
					<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

						<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mb-20">
							<div class="w-100 d-flex align-items-center justify-content-start">
								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>订单号:</span>
									<input class="ivu-input w-150px ml-8" placeholder="请输入" type="text" v-model="where.keyword">
								</div>

								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>用户信息:</span>
									<input class="ivu-input w-150px ml-8" placeholder="请输入" type="text">
								</div>

								<div class="h-100 d-flex align-items-center justify-content-start mr-20 mt-20">
									<span>下单时间:</span>
									<input class="ivu-input ml-8 w-250px" type="text" placeholder="开始时间->结束时间" id="test13" v-model="where.time">
								</div>
							</div>
						</div>

						<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="button" class="ivu-btn ivu-btn-primary mr-20" @click="getitems">搜索</button>
						</div>
					</form>
				</div>
			</div>
			<!--列表-->
			<div class="w-100 label-list bg-fff">
				<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
					<span class="size-16  ml-20"><span class="fw">全部订单</span> </span>
				</div>

				<!--表格-->
				<div class="w-100 table">
					<div class="t-table pl-20 pr-20">

						<div class="w-100 bg-f6 d-flex align-items-center justify-content-start text-57" style="height: 32px;border: 1px solid #d9d9d9">
							<div class="text-center w-40"> 订单信息</div>
							<div class="text-center w-8 ellipsis-1">开具医生姓名</div>
							<div class="text-center w-8">单剂价格(元)</div>
							<div class="text-center w-8">数量</div>
							<div class="text-center w-8">总价(元)</div>
							<div class="text-center w-10">收货人信息</div>
							<div class="text-center w-8">支付方式</div>
							<div class="text-center w-8">订单状态</div>
							<div class="text-center w-10">操作</div>
						</div>
						<!--已退款- 已关闭  t-tabl-top-close         ---- 默认 t-tabl-top-->


						<div v-for="i in data" class="w-100 d-flex align-items-center justify-content-start flex-column t-tabl-top-close">
							<div class="w-100 t-tabl-top-title">
								<span class="ml-20 fw">订单编号：{{i.order_sn}}</span>
								<span class="ml-20">下单时间：{{i.add_time}}</span>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start t-tabl-top-centen">
								<div class="h-100 d-flex align-items-center pl-20 w-40"> {{i.order_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-8 bl">{{i.account}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-8 bl">{{i.price}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-8  bl">
									<span class="w-100 text-center text-27">{{i.total_num}}</span>
									<span class="w-100 text-center size-12 text-57 lh-1">每日{{i.taking_quency}}次</span>
									<span class="w-100 text-center size-12 text-57 lh-1">周期{{i.taking_cycle}}天</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-8 bl">
									<span class="w-100 text-center text-27">{{i.total_price}}</span>
									<span class="w-100 text-center size-12 text-57 lh-1">运费10元</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center bl flex-column w-10" >
									<span class="w-100 text-center text-27">{{i.real_name}}</span>
									<span class="w-100 text-center text-27">{{i.user_phone}}</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-8 bl">{{i.pay_type_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-8 flex-column bl">
									<span class="w-100 text-center text-27">{{i.status_name}}</span>
									<span class="w-100 text-center text-27"><a :href=`<?php echo Url('details'); ?>?id=${i.id}` class="text-0081a7">查看详情</a></span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-10 bl">
									<!--<a href="" class="ivu-btn ivu-btn-default ivu-btn-small mt-8" style="width: 72px;">导出标签</a>-->
									<button type="button" href="" class="ivu-btn ivu-btn-default ivu-btn-small mt-8" style="width: 72px;">报关成功</button>
								</div>
							</div>

							<div class="w-100" style="display:none">
								<div class="pl-20 pr-20 w-100" >
									<div class="w-100 text-57 mt-8"><span>单剂微片种类数：{{i.micro_cate_count}}种</span><span class="ml-20">单剂微片总片数：{{i.total_num}}片</span></div>
									<div class="w-100 ivu-table-wrapper ivu-table-wrapper-with-border">
										<table class="ivu-table  ivu-table-default ivu-table-border" style="overflow: initial">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header">
												<th class="bg-f4 text-center text-57 t-table-td">微片编码</th>
												<th class="bg-f4 text-center text-57 t-table-td">微片名称</th>
												<th class="bg-f4 text-center text-57 t-table-td">总显示剂量</th>
												<th class="bg-f4 text-center text-57 t-table-td">数量</th>
												<th class="bg-f4 text-center text-57 t-table-td">微片单价</th>
												<th class="bg-f4 text-center text-57 t-table-td">单剂价格</th>
											</tr>
											<tr class="ivu-table-header" v-for="m in i._info">
												<td class="text-center text-57 t-table-td">{{m.micro_code}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_name}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_dose}}</td>
												<td class="text-center text-57 t-table-td">{{m.num}}</td>
												<td class="text-center text-57 t-table-td">{{m.micro_price}}</td>
												<td class="text-center text-57 t-table-td">{{m.total_price}}</td>
											</tr>
											<!-- <tr class="ivu-table-header">
												<td class="text-center text-57 t-table-td">WXXXXXX</td>
												<td class="text-center text-57 t-table-td">微片名称</td>
												<td class="text-center text-57 t-table-td">0000000</td>
												<td class="text-center text-57 t-table-td">100</td>
												<td class="text-center text-57 t-table-td">0000000</td>
												<td class="text-center text-57 t-table-td">0000000</td>
											</tr> -->
											</tbody>
										</table>

									</div>
								</div>

							</div>

							<div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 42px;">
								<span class="text-0081a7 cursor" onclick="unfold(this)" data-id="1"><i class="icon iconfont iconxiangxia_hei"></i> 详情</span>
							</div>
						</div>



					</div>
				</div>
				<!--page 分页-->
				<div class="w-100 d-flex align-items-center justify-content-end">
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total"/>
				</div>

			</div>
		</div>

		<!--报关失败-->
		<div style="display: none" class="modal-root label-modal failed-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 290px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">报关失败</span>
					<span style="right: 20px;" class="absolute cursor failed-closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="">

					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item  w-100 d-flex align-items-center justify-content-start">
							失败原因
						</div>
						<div class="item  w-100 d-flex align-items-center justify-content-start mt-10">
							<textarea placeholder="请在此处填写报关失败详细原因" style="height: 68px;" class="w-400px ivu-input ivu-input-default"></textarea>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="button" class="ivu-btn ivu-btn-default failed-closemode closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">提交</button>
					</div>
				</form>
			</div>
		</div>
		<!--发货-->
		<div style="display: none" class="modal-root label-modal shipments-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 332px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">订单发货</span>
					<span style="right: 20px;" class="absolute cursor shipments-closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="">

					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item  w-100 d-flex align-items-start justify-content-start flex-column">
							<div class="w-100">物流公司 <span class="text-c01f5e">*</span></div>
							<input type="text" value="" placeholder="请输入" class="ivu-input ivu-input-default w-100 mt-8">
						</div>
						<div class="item  w-100 d-flex align-items-start justify-content-start flex-column mt-20">
							<div class="w-100">快递单号 <span class="text-c01f5e">*</span></div>
							<input type="text" value="" placeholder="请输入" class="ivu-input ivu-input-default w-100 mt-8">
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default shipments-closemode closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20 shipments-btn">确定</button>
					</div>
				</form>
			</div>
		</div>
		<!-- 订单退款 -->
		<div style="display: none" class="modal-root label-modal order-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 352px;width: 336px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">订单退款</span>
					<span style="right: 20px;" class="absolute cursor order-closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="">
					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="fw" style="margin-left: 40px;">退款方式：</div>
						</div>

						<div class="item mt-20 w-100 refund">
							<div class="d-flex align-items-center justify-content-start" style="margin-left: 40px;height: 32px;">
								<input class="h-100" type="radio" value="1" checked name="demo1" title="直接退款">
								<div class="size-12 text-center remark text-57">
									货款将会原路退回至支付账户
								</div>
							</div>
						</div>

						<div class="item w-100 refund">
							<div class="d-flex align-items-center justify-content-start" style="margin-left: 40px;height: 32px;">
								<input class="h-100" type="radio" value="1" name="demo1" title="手动退款">
								<div class="size-12 text-center remark text-57" style="width: 124px;">
									在线下进行退款操作
								</div>
							</div>
						</div>

						<div class="item w-100 refund">
							<div class="d-flex align-items-center justify-content-start" style="margin-left: 40px;height: 32px;">
								<input class="h-100" type="radio" value="1" name="demo1" title="不予退款">
								<div class="size-12 text-center remark text-57">
									订单不符合退款条件，不退款
								</div>
							</div>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="button" class="ivu-btn ivu-btn-default order-closemode">取消</button>
						<button  @click="search" type="button" class="ivu-btn ivu-btn-primary ml-20 order-btn">确定</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>

<script src="/ysm/static/js/axios.js"></script>



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
	// var real_name='<?=$real_name?>';
    var orderCount=<?=json_encode($orderCount)?>,payTypeCount=<?=json_encode($payTypeCount)?>,status=<?=$status ? $status : "''"?>;

	var app   = new Vue({
		el     : '#app',
		data   : {
			date1  : '',
			message: 'Hello Vue.js!',
			ismodel: false,
		    badge: [],
            payType: [
                {name: '全部', value: ''},
                {name: '微信支付', value: 1,count:payTypeCount.weixin},
                {name: '余额支付', value: 2,count:payTypeCount.yue},
                {name: '线下支付', value: 3,count:payTypeCount.offline},
            ],
            orderType: [
                {name: '全部', value: ''},
                {name: '普通订单', value: 1,count:orderCount.general},
                {name: '拼团订单', value: 2,count:orderCount.pink},
                {name: '秒杀订单', value: 3,count:orderCount.seckill},
                {name: '砍价订单', value: 4,count:orderCount.bargain},
            ],
            orderStatus: [
                {name: '全部', value: ''},
                {name: '待付款', value: 0,count:orderCount.wz},
                {name: '待发货', value: 1,count:orderCount.wf,class:true},
                {name: '待收货', value: 2,count:orderCount.ds},
                {name: '已完成', value: 4,count:orderCount.jy},
                {name: '退款申请', value: -1,count:orderCount.tk,class:true},
                {name: '已退款', value: -2,count:orderCount.yt},
                {name: '已关闭', value: -4,count:orderCount.del},
            ],
            dataList: [
                {name: '全部', value: ''},
                {name: '今天', value: 'today'},
                {name: '昨天', value: 'yesterday'},
                {name: '最近7天', value: 'lately7'},
                {name: '最近30天', value: 'lately30'},
                {name: '本月', value: 'month'},
                {name: '本年', value: 'year'},
            ],
            where:{
                data:'',
                status:status,
                type:'',
                pay_type:'',
                time:'',
                type:<?php echo htmlentities($type); ?>,
                excel:0,
                keyword:'',
            },
            data:[],
            total:0,
            showtime: false,
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
	        getBadge:function() {
	            var that=this;
	            layList.basePost(layList.Url({m:'medical',c:'crm.crm_order',a:'getBadge'}),this.where,function (rem) {
	                that.badge=rem.data;
	            });
	        },
	        search:function () {
	            this.where.excel=0;
	            // this.getBadge();
	            layList.reload(this.where,true);
	        },
	        refresh:function () {
	            layList.reload();
	            // this.getBadge();
	        },
	        excel:function () {
	            this.where.excel=1;
	            location.href=layList.U({m:'medical',c:'crm.crm_order',a:'order_list',q:this.where});
	        },
			model         : function () {
				// this.ismodel = !this.ismodel;
			},
			reverseMessage: function () {
				this.message = this.message.split('').reverse().join('');
			},
			// 页码改变的回调，返回改变后的页码
			pagechange(e) {
				this.pagenum = e;
				this.getitems();
			},
			// 切换每页条数时的回调，返回切换后的每页条数
			pagesizechange(e) {
				this.pagesize = e;
				this.getitems();
			},
			// 获取列表数
			getitems(e,type) {
				if(type >=1){
					this.where.status=e;
				}
				var data = {
					page : this.pagenum,
					limit: this.pagesize,
					keyword : this.where.keyword,
					status: this.where.status,
					time : this.where.time,
					type:this.where.type,
				};
				axios.post("<?php echo Url('order_list'); ?>", data).then((e) => {
					e=e.data;
					this.data = e.data;
					this.total= e.count;
				});
			},
		},
		// watch: {
  //               'where.status':function () {
  //                   layList.reload(this.where,true);
  //               },
  //               'where.data':function () {
  //                   layList.reload(this.where,true);
  //               },
  //               'where.type':function () {
  //                   layList.reload(this.where,true);
  //               },
  //               'where.pay_type':function () {
  //                   layList.reload(this.where,true);
  //               }
  //           },
        // methods: {
        //     setData:function(item){
        //         var that=this;
        //         if(item.is_zd==true){
        //             that.showtime=true;
        //             this.where.data=this.$refs.date_time.innerText;
        //         }else{
        //             this.showtime=false;
        //             this.where.data=item.value;
        //         }
        //     },
        //     getBadge:function() {
        //         var that=this;
        //         layList.basePost(layList.Url({c:'order.store_order',a:'getBadge'}),this.where,function (rem) {
        //             that.badge=rem.data;
        //         });
        //     },
        //     search:function () {
        //         this.where.excel=0;
        //         this.getBadge();
        //         layList.reload(this.where,true);
        //     },
        //     refresh:function () {
        //         layList.reload();
        //         this.getBadge();
        //     },
        //     excel:function () {
        //         this.where.excel=1;
        //         location.href=layList.U({c:'order.store_order',a:'order_list',q:this.where});
        //     }
        // },
        created() {
			this.getitems();
		},
        mounted:function () {
            var that=this;
            // that.getBadge();
            window.formReload = this.search;
            layList.laydate.render({
                elem:this.$refs.date_time,
                trigger:'click',
                eventElem:this.$refs.time,
                range:true,
                change:function (value){
                    that.where.data=value;
                }
            });
        }
	});
	layList.form.render();

	//发货
	$('.shipments-closemode').click(function () {
		$('.shipments-modal').hide();
	});
	$('.shipments').click(function () {
		$('.shipments-modal').show();
	});
	$('.shipments-btn').click(function () {
		$('.shipments-modal').hide();
	});



	//退款
	$('.order-closemode').click(function () {
		$('.order-modal').hide();
	});
	$('.refund-btn').click(function () {
		$('.order-modal').show();
	});
	$('.order-btn').click(function () {
		/* 代码*/
		$('.order-modal').hide();
	});




	//报关
	$('.failed-closemode').click(function () {
		$('.failed-modal').hide();
	});

	$('.failed').click(function () {
		$('.failed-modal').show();
	});
	function unfold(de){
		var type = $(de).data('id');
		if (type == 1) {
			$(de).data('id', '2');
			$(de).html('<i class="icon iconfont iconxiangshang"></i> 收起');
		} else {
			$(de).data('id', '1');
			$(de).html('<i class="icon iconfont iconxiangxia_hei"></i> 详情');
		}
		$(de).parent().prev().stop().slideToggle();
	}


</script>