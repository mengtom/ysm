{include file="public/header"}
	<title>CMR-列表-订单</title>

	<div class="h-100 w-100 cmr-order" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10   text-666 size-14">
			<a class="text-57">首页 </a>  <span class="text-c01f5e">/ 订单管理 </span>
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
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative " :class="{'tab-item-active':where.status===item.value}" @click="getitems(item.value,1)" type="button" v-for="item in orderStatus">{{item.name}}<span v-if="item.count!=undefined" >({{item.count}})</span></div>
			</div>

		</div>

		<!--搜索区-->
		<div class="w-1200 relative" style="border: 1px solid #d9d9d9;z-index: 1">
			<div class="w-100 com-search" style="border-bottom: 2px solid #f0f0f0;margin-top: 0;">
				<div class="keyword w-100  h-auto">
					<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="" method="get">

						<div class="h-100 pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">

							<div class="w-100 d-flex align-items-center justify-content-start">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span class="w-50px">订单号:</span>
									<input class="ivu-input w-150px" placeholder="请输入" type="text" v-model="where.ordersn">
								</div>

								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span class="" style="width: 70px;">用户信息:</span>
									<input class="ivu-input w-150px" placeholder="请输入" type="text" v-model="where.nickname">
								</div>

								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span class="w-100px">机构/医生信息:</span>
									<input class="ivu-input w-150px" placeholder="请输入" type="text" v-model="where.institu">
								</div>

								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span class="" style="width: 40px;">平台:</span>
									<input class="ivu-input w-150px" placeholder="请输入" type="text" v-model="where.platform">
								</div>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start mt-20">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span style="width: 90px;">下单时间:</span>
									<div class="ivu-select  ivu-select-single ivu-select-default relative">
										<input class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13" v-model="where.time">
									</div>
								</div>
							</div>
						</div>

						<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="button" class="ivu-btn ivu-btn-primary mr-10" @click="getitems">搜索</button>
						</div>
					</form>
				</div>
			</div>
			<!--列表-->
			<div class="w-100 label-list bg-fff">
				<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
					<span class="size-16  ml-20">
						<span class="fw">
						全部订单
						<!-- 待付款	-->
						<!-- 待发货	-->
						<!-- 待收货	-->
						<!-- 已完成	-->
						<!-- 已关闭	-->
						<!-- 退款申请-->
						<!-- 已退款	-->
						</span>
						<span class="size-14"></span>
					</span>
					<div>
						<button type="button" class="ivu-btn ivu-btn-default mr-20">
							<i class="icon iconfont icondaochu"></i>
							导出Excel
						</button>
					</div>
				</div>

				<!--表格-->
				<div class="w-100 table ">
					<div class="t-table" style="width: 1160px;margin: auto">

						<div class="w-100 bg-f6 d-flex align-items-center justify-content-start text-57" style="height: 32px;margin: auto;border: 1px solid #d9d9d9">
							<div class="text-center" style="width: 390px;"> 订单信息</div>
							<div class="w-90px text-center">开具医生姓名</div>
							<div class="w-90px text-center">单剂价格(元)</div>
							<div class="w-90px text-center">数量</div>
							<div class="w-90px text-center">总价(元)</div>
							<div class="w-90px text-center" style="width: 128px;">收货人信息</div>
							<div class="w-90px text-center">支付方式</div>
							<div class="w-90px text-center">订单状态</div>
							<div class="w-90px text-center">操作</div>
						</div>


						<!--已退款- 已关闭  t-tabl-top-close         ---- 默认 t-tabl-top-->
						<!--代发货-->
						<div v-for="i in items" class="w-100 d-flex align-items-center justify-content-start flex-column t-tabl-top">
							<div class="w-100 t-tabl-top-title">
								<span class="ml-20 fw">订单编号：{{i.order_sn}}</span>
								<span class="ml-20">下单时间：{{i.add_time}}</span>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start t-tabl-top-centen">
								<div class="h-100 d-flex align-items-center pl-20 " style="width: 390px;"> {{i.order_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-90px bl">{{i.account}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-90px bl">{{i.price}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-90px bl">
									<span class="w-100 text-center text-27">{{i.total_num}}</span>
									<span class="w-100 text-center size-12 text-57" style="line-height: 1;">每日{{i.taking_quency}}次</span>
									<span class="w-100 text-center size-12 text-57" style="line-height: 1;">周期{{i.taking_cycle}}天</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-90px bl">
									<span class="w-100 text-center text-27">{{i.total_price}}</span>
									<span class="w-100 text-center size-12 text-57" style="line-height: 1;">运费{{i.pay_postage}}元</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center bl flex-column" style="width: 128px;">
									<span class="w-100 text-center text-27">{{i.real_name}}</span>
									<span class="w-100 text-center text-27">{{i.user_phone}}</span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-90px bl">{{i.pay_type_name}}</div>
								<div class="h-100 d-flex align-items-center justify-content-center w-90px flex-column bl">
									<span class="w-100 text-center text-27">{{i.status_name}}</span>
									<span class="w-100 text-center text-27"><a :href=`{:Url('order_details')}?id=${i.id}` class="text-c01f5e">查看详情</a></span>
								</div>
								<div class="h-100 d-flex align-items-center justify-content-center flex-column w-90px bl">

									<button v-if="i._status == 2 && i.shipping_type==1" type="button"  class="ivu-btn ivu-btn-primary ivu-btn-small mt-8 shipments" style="width: 72px;" @click="shipments(i.id)">发货</button>
									<button v-if="i.status == 1" type="button"  class="ivu-btn ivu-btn-default ivu-btn-small mt-8 failed" style="width: 72px;">报关失败</button>
									<a class="ivu-btn ivu-btn-default ivu-btn-small mt-8" style="width: 72px;" v-if="i.is_del == 0">导出标签</a>
								</div>
							</div>
							<div class="w-100" style="display:none">
								<div class="" style="width: 1128px;margin: auto">
									<div class="w-100 text-57 mt-8"><span>单剂微片种类数：{{i.micro_cate_count}}种</span><span class="ml-20">单剂微片总片数：{{i.micro_num}}片</span></div>
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
								<span class="text-c01f5e cursor" onclick="unfold(this)" data-id="1"><i class="icon iconfont iconxiangxia_hei"></i> 详情</span>
							</div>
						</div>
					</div>
				</div>
				<!--page 分页-->
				<div class="w-100 d-flex align-items-center justify-content-between ">
					<a href="index.html" class="ivu-btn ivu-btn-default ml-30">返回</a>
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
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
							<textarea placeholder="请在此处填写报关失败详细原因" style="height: 68px;"  class="w-400px ivu-input ivu-input-default"></textarea>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="button" class="ivu-btn ivu-btn-default failed-closemode closemode">取消</button>
						<button type="button" class="ivu-btn ivu-btn-primary ml-20">确定</button>
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
				<form class="layui-form" action="" method="post">
					<div class="items  d-flex align-items-center justify-content-start flex-column">
						<div class="item  w-100 d-flex align-items-start justify-content-start flex-column">
							<div class="w-100">物流公司 <span class="text-c01f5e">*</span></div>
							<input type="text" value="" placeholder="请输入" class="ivu-input ivu-input-default w-100 mt-8" name="delivery_name">
						</div>
						<div class="item  w-100 d-flex align-items-start justify-content-start flex-column mt-20">
							<div class="w-100">快递单号 <span class="text-c01f5e">*</span></div>
							<input type="text" value="" placeholder="请输入" class="ivu-input ivu-input-default w-100 mt-8" name="delivery_id">
						</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default shipments-closemode closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">确定</button>
					</div>
				</form>
			</div>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script src="{__ADMIN_FRAME}/js/axios.js"></script>
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
                {name: '全部',   value: ''},
                {name: '待付款', value: 0,count:orderCount.wz},
                {name: '待发货', value: 1,count:orderCount.wf,class:true},
                {name: '待收货', value: 2,count:orderCount.ds},
                {name: '已完成', value: 4,count:orderCount.jy},
                {name: '已关闭', value: -4,count:orderCount.del},
                {name: '退款申请', value: -1,count:orderCount.tk,class:true},
                {name: '已退款', value: -2,count:orderCount.yt},
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
	            location.href=layList.U({c:'crm.crm_order',a:'order_list',q:this.where});
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
					status    :this.where.status,
					type:{$type},
				};
				axios.post('{:Url('order_list')}', data).then((e) => {
					this.items = e.data.data;
					this.total   = e.data.count;
				});
			},
			shipments(e){
				var url="{:Url('updateDeliveryGoods')}"+'?id='+e;
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
	$('.shipments-closemode').click(function () {
		$('.shipments-modal').hide();
	});
	$('.shipments').click(function () {

		$('.shipments-modal').show();
	});
	// function shipments(e){
	// 	var url="{:Url('update_delivery')}"+'?id='+e;

	// 	$(".shipments-model").find('form').attr('data-id',e);
	// 	$('.shipments-modal').show();
	// }
	//报关
	$('.failed-closemode').click(function () {
		$('.failed-modal').hide();
	});

	$('.failed').click(function () {
		$('.failed-modal').show();
	});


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
