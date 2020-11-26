<?php /*a:5:{s:54:"F:\WWW\yeshai\app\institu\view\doctor\doctor\index.php";i:1602578727;s:48:"F:\WWW\yeshai\app\institu\view\public\header.php";i:1597219200;s:57:"F:\WWW\yeshai\app\institu\view\public\header_navigate.php";i:1603187334;s:48:"F:\WWW\yeshai\app\institu\view\public\footer.php";i:1592563283;s:54:"F:\WWW\yeshai\app\institu\view\public\inner_footer.php";i:1597309734;}*/ ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>医疗机构后台-首页</title>
    <link rel="stylesheet" href="/ysm/static/css/font/iconfont.css">
    <link rel="stylesheet" href="/ysm/static/plugins/layui/css/layui.css">
    <link rel="stylesheet" href="/ysm/static/css/iview.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/mi.css">
    <link rel="stylesheet" href="/ysm/static/css/pages/mi-menu.css">
    <link rel="stylesheet" href="/ysm/static/css/mi-common.css">
</head>
<body class="bg-f2f3f5">

<!-- <script>
 $eb = parent._mpApi;
</script> -->
	<title>医生管理</title>

	<div class="h-100 w-100 mi-doctor" id="app">
		<!--头部-->
		<!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start">
                    <div class="top-logo d-flex align-items-center justify-content-start h-100">
                        <img src="/ysm/static/images/mi/logo-2.png" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item <?php if($controller == 'Index'): ?>ivu-menu-item-active <?php endif; ?>"><!-- ivu-menu-item-active -->
                                <a href="<?php echo Url('index/index'); ?>">首页</a>
                            </li>
                            <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if(isset($menu['child']) && count($menu['child'])  >0){ ?>
                                    <li class="ivu-menu-submenu <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                        <div class="ivu-menu-submenu-title ">
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
                                <?php }else{ ?>
                                     <li class="ivu-menu-item <?php if($controller == $menu['controller']): ?>ivu-menu-item-active <?php endif; ?>">
                                        <a href="<?php echo htmlentities($menu['url']); ?>">
                                            <?php echo htmlentities($menu['menu_name']); ?>
                                        </a>
                                    </li>


                                <?php } ?>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="top_right w-200px h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="w-75 text-right d-flex align-items-center justify-content-start">
                        <a class="text-27 w-100px ellipsis-1" href="" title="<?php echo htmlentities($_institu['i_name']); ?>(<?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?>)"><?php echo htmlentities($_institu['i_name']); ?>(<?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '平台'; ?>)</a>
                        <a class="text-c01f5e ml-10 w-50px" href="<?php echo Url('login/logout'); ?>">注销</a>
                    </div>
                    <div class="headimg w-50px">
                        <img src="/ysm/static/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>


                 <!--    <div class="top-nav  h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">

                            <li class="ivu-menu-item ivu-menu-item-active ">
                                <a href="/mi/index.html">首页</a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/wp/index.html">
                                    微片查看
                                </a>
                            </li>
                            <li class="ivu-menu-submenu ">
                                <div class="ivu-menu-submenu-title">
                                    <span href="/mi/ts/index.html">配方查看<i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                </div>
                                <div class="ivu-select-dropdown bg-c01f5e">
                                    <ul class="ivu-menu-drop-list">
                                        <li class="ivu-menu-item-group ">
                                            <ul>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/ts/index.html" class="w-100 h-100 text-fff"> 配方查看</a>
                                                </li>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/wp/ingredient.html" class="w-100 h-100 text-fff"> 成分管理</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/ts/index.html">
                                    医生管理
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/patient/index.html">
                                    患者管理
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/recipe/index.html">
                                    处方查看
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="/mi/order/order.html">
                                    订单查看
                                </a>
                            </li>
                            <li class="ivu-menu-item">
                                <a href="">
                                    佣金管理
                                </a>
                            </li>
                            <li class="ivu-menu-submenu ">
                                <div class="ivu-menu-submenu-title">
                                    <span href="">设置<i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                </div>
                                <div class="ivu-select-dropdown bg-c01f5e" >
                                    <ul class="ivu-menu-drop-list">
                                        <li class="ivu-menu-item-group ">
                                            <ul>
                                                <li class="ivu-menu-item ">
                                                    <a href="/mi/setting/basics.html" class="w-100 h-100 text-fff">系统设置</a>
                                                </li>
                                                <li class="ivu-menu-item ">
                                                    <a href="" class="w-100 h-100 text-fff">分权系统</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="top_right h-100 d-flex align-items-center justify-content-end cursor w-200px">
                    <div class="ellipsis-1 w-75 text-right">
                        <a class="text-27" href="">用户名称..</a>
                        <a class="text-c01f5e ml-10" href="">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div> -->
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">医生管理 </span>
		</div>
		<!--搜索区-->
		<div class="w-1200 com-search">
			<div class="keyword bg-fff w-100  h-auto">
				<form class="w-100 h-100 layui-form  d-flex align-items-start justify-content-between" action="">
					<div class="h-100  pl-20 d-flex align-items-center justify-content-start flex-column mt-20 mb-20">
						<div class="w-100 d-flex align-items-center justify-content-start">
							<div class="h-100 d-flex align-items-center justify-content-start">
								<span class="" style="width: 70px;">医生信息:</span>
								<input class="ivu-input" style="width: 292px;" placeholder="请输入" type="text" v-model="keyword">
							</div>
							<!-- <div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span >所属分组:</span>
								<div class="w-150px ml-8">
									<select v-model="group">
										<option value="">全部</option>
										<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo htmlentities($g['id']); ?>"><?php echo htmlentities($g['name']); ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div> -->
							<div class="h-100 d-flex align-items-center justify-content-start ml-20">
								<span style="width: 125px;" >账号开通时间:</span>
								<div class="ivu-select  ivu-select-single ivu-select-default relative">
									<input class="ivu-input" type="text" placeholder="开始时间->结束时间" style="width: 240px;" id="test13" v-model="time">
								</div>
							</div>
						</div>
					</div>

					<div class="h-100 mt-20  d-flex align-items-start justify-content-end">
						<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
						<button type="button" class="ivu-btn ivu-btn-primary mr-10" @click="getitems">筛选</button>
					</div>
				</form>
			</div>
		</div>

		<!--列表-->
		<div class="w-1200 label-list mt-20 mb-30 bg-fff">
			<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
				<span class="size-16  ml-20"><span class="fw">医生列表</span></span>
				<div>
					<a href="" class="ivu-btn ivu-btn-default mr-20">
						<i class="icon iconfont icondaochu"></i>
						导出Excel
					</a>
					<a href="<?php echo Url('create'); ?>" class="ivu-btn ivu-btn-primary mr-20">
						<i class="icon iconfont iconicon-test"></i>
						添加新医生
					</a>
				</div>
			</div>
			<!--表格-->
			<div class="w-100 table">

				<table class="ivu-table  ivu-table-default" style="overflow: initial">
					<tbody class="ivu-table-tbody">
					<tr class="ivu-table-header cursor">
						<th class="pl-30 bg-f6 w-80px">编码</th>
						<th class="bg-f6 w-80px">医生姓名</th>
						<th class="bg-f6 w-100px">联系电话</th>
						<th class="bg-f6 w-100px">开通时间</th>
						<th class="bg-f6 w-200px">所属平台</th>
						<th class="bg-f6 w-80px">开具处方</th>
						<th class="bg-f6 w-80px">成交订单</th>
						<th class="bg-f6 w-80px">成交金额</th>
						<th class="bg-f6 w-80px">患者人数</th>
						<th class="bg-f6 w-160px">操作</th>
					</tr>

					<tr v-for="(i,k) in data" class="cursor text-57">
						<td class="text-center ckitem">{{i.id}}</td>
						<td class="ckitem">
							<div class="w-200px ellipsis" title="1111">
								{{i.name}}
							</div>
						</td>
						<td class="ckitem">{{i.refer_mobile}}</td>
						<td class="ckitem">{{i.createtime}}</td>
						<td class="ckitem">{{i.platform_name}}</td>
						<td class="ckitem">{{i.total_ts}}</td>
						<td class="ckitem">{{i.total_order}}</td>
						<td class="ckitem">{{i.total_price}}</td>
						<td class="ckitem">{{i.total_patient}}</td>
						<td class="relative">
							<!-- <div class="edittext text-27 fw">
								更多操作
								<i class="icon iconfont iconxiangxia2"></i>
							</div>
							<div class="absolute cj-edit-list mt-8">
								<div class="w-100 h-100 d-flex align-items-start justify-content-start flex-column">
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`<?php echo Url('basic'); ?>?id=${i.id}`>基本信息</a></div>
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`<?php echo Url('paitent'); ?>?id=${i.id}`>查看下属患者</a></div>
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`<?php echo Url('order'); ?>?id=${i.id}`>查看订单</a></div>
									<div class="w-100 edit-list-item"><a class="w-100 h-100 d-flex align-items-center justify-content-start ml-10" :href=`<?php echo Url('prescription'); ?>?id=${i.id}`>查看处方</a></div>
								</div>
							</div> -->
							<a class="ml-10 itemsinfo" data-id="1" @click="info(i)" >
								<i class="icon size-12 iconfont iconxianshiyincang"></i>
								详情
							</a>
							<a class="ml-10" :href=`<?php echo Url('basic'); ?>?id=${i.id}`>
								<i class="icon size-14 iconfont iconbian-ji"></i>
								修改
							</a>
							<span class="text-c01f5e ml-10 delete" @click="delmode(i,k,$event)" :data-id="i.id" :data-href=`<?php echo Url('delete'); ?>?id=${i.id}`>
								<i class="icon size-14 iconfont iconcha"></i>
								删除
							</span>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<!--page 分页-->
			<div class="w-100 d-flex align-items-center justify-content-end ">
				<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="total" />
			</div>

		</div>
		<!--删除弹窗-->
		<!--删除后，该医生将无法登陆，是否确定删除-->
		<div style="display: none" v-show="failedmodalshow" class="modal-root label-modal failed-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed delinfo" style="z-index: 999999999999">
				<div class="w-100 top d-flex align-items-center justify-content-between size-16 ">
					<span class="fw size-16 ml-20">提示</span>
					<span class="cursor failed-closemode icon iconfont iconguanbi text-bf mr-20">	</span>
				</div>
				<div style="height: 85px;" class="d-flex align-items-center justify-content-center flex-column">
					删除后，该医生将无法登陆，是否确定删除
				</div>
				<div class="w-100 d-flex align-items-center justify-content-end foot">
					<button @click="delitem()" data-id="0" type="button" class="ivu-btn ivu-btn-primary mr-10 failed-btn">确定</button>
					<button @click="closemode()" type="button" class="ivu-btn ivu-btn-default failed-closemode  mr-20">取消</button>
				</div>
			</div>
		</div>

		<!--该医生名下有订单及患者，不可删除-->
		<div v-show="failedmodal1show" style="display: none" class="modal-root label-modal failed-modal1">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed delinfo" style="z-index: 999999999999">
				<div class="w-100 top d-flex align-items-center justify-content-between size-16 ">
					<span class="fw size-16 ml-20">提示</span>
					<span class="cursor failed-closemode1 icon iconfont iconguanbi text-bf mr-20">	</span>
				</div>
				<div style="height: 85px;" class="d-flex align-items-center justify-content-center flex-column">
					该医生名下有订单及患者，不可删除
				</div>
				<div class="w-100 d-flex align-items-center justify-content-end foot">
					<button @click="closemode()" type="button" class="ivu-btn ivu-btn-primary failed-closemode1 mr-10">确定</button>
					<button @click="closemode()" type="button" class="ivu-btn ivu-btn-default failed-closemode1 hide  mr-20">取消</button>
				</div>
			</div>
		</div>
		<!-- 详情 -->
		<div style="display: none" class="modal-root label-modal info-modal">
			<div class="ant-modal-wrap"></div>
			<div class="bg-fff info  h-100 fixed d-flex flex-column align-items-start justify-content-between">
				<div class="w-100 top d-flex align-items-center justify-content-between">
					<span class="ml-20 size-16 fw text-c01f5e">查看信息</span>
					<a class="mr-20 text-bf icon iconfont iconcha size-18 info-closemode"></a>
				</div>
				<div class="w-100 center d-flex flex-column pl-30">
					<div class="mt-30 w-100">
						<span>医生姓名:</span>
						<span>{{infodata.name}}</span>
					</div>
					<div class="mt-10 w-100">
						<span>登陆账号:</span>
						<span>{{infodata.account}}</span>
					</div>
					<div class="mt-10 w-100">
						<span>联系方式:</span>
						<span>{{infodata.refer_mobile}}</span>
					</div>
					<div class="mt-10 w-100">
						<span>邮箱:</span>
						<span>{{infodata.refer_email}}</span>
					</div>
				</div>
				<div class="w-100 foot d-flex align-items-center justify-content-end">
					<button type="button" class="ivu-btn-default ivu-btn mr-20 info-closemode">关闭</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="/ysm/static/js/jquery.js"></script>
<script src="/ysm/static/js/public.js"></script>
<script src="/ysm/static/js/vue.js"></script>
<script src="/ysm/static/js/iview.min.js"></script>
<script src="/ysm/static/js/bootstrap.js"></script>
<script src="/ysm/static/plugins/layui/layui.js"></script>



<script src="/ysm/static/js/axios.js"></script>
<script type="text/javascript">
	var heght = window.innerHeight;
	var app   = new Vue({
		el     : '#app',
		data   : {
            date1           : '',
            message         : 'Hello Vue.js!',
            ismodel         : false,
            cf              : '',
            data            : [],
            total           : 0,
            pagenum         : 1,//页码数
            pagesize        : 10,//每页条数
            keyword         : '',
            group           : '',
            time            : '',
            infodata        : '',
            failedmodalshow : false,
            failedmodal1show: false,
            delurl:'',
            delkey:''
		},
		methods: {
			//详情
			info(e){
				this.infodata=e;
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
			getitems() {
				var data = {
					page : this.pagenum,
					limit: this.pagesize,
					keyword : this.keyword,
					time : this.time,
					group : this.group,
				};
				axios.post("<?php echo Url('get_doctor_list'); ?>", data).then((e) => {
					e=e.data;
					this.data = e.data;
					this.total   = e.count;
				});
			},

            delitem(){
                axios.get(this.delurl).then(e=>{
                    if(e.data.code==200){
                        this.$Message.success(e.data.msg);
                        this.data.splice(this.delkey, 1);
                        this.closemode();
                    }else {
                        //有订单
                        this.failedmodal1show = true;
                    }
                });
            },
            //删除弹窗
            delmode(e,k,event){
                this.failedmodalshow = true;
                var url = event.target.dataset.href;
                this.delurl = url;
                this.delkey = k;
            },
            //取消
            closemode(){
                this.failedmodalshow = false;
                this.failedmodal1show = false;
                this.delurl = '';
            }
		},
		created() {
			this.getitems();
		},
	});

		//删除确认框
	// $('.ivu-table-tbody').on('click', '.delete', function () {
	// 	var id = $(this).data('id');
	// 	$('.failed-btn').attr('data-id', id);
	// 	$('.failed-modal').show();
	// });
	//取消
	$('.failed-closemode').click(function () {
		$('.failed-modal').hide();
	});
	//确定
	// $('.failed-btn').click(function () {
	// 	var id     = $(this).data('id');
	// 	var id_del = false; //是否患者和订单
	// 	if (id_del) {
	// 		$('.failed-modal').hide();
	// 		$('.failed-modal1').hide();
	// 	} else {
	// 		$('.failed-modal').hide();
	// 		//后台删除返回有患者 接着弹出
	// 		$('.failed-modal1').show();
	// 	}
	// });

	// $('.ivu-table-tbody').on('click', '.delete', function () {
	// 	var id = $(this).data('id');
	// 	$('.failed-modal1').show();
	// });
	//
	$('.failed-closemode1').click(function () {
		$('.failed-modal1').hide();
		$('.failed-modal').hide();
	});


	//查看详情
	$('.ivu-table-tbody').on('click', '.itemsinfo', function () {
		var id = $(this).data('id');
		// console.log(id);
		$('.info-modal').show();
	});

	//关闭详情
	$('.info-closemode').click(function () {
		$('.info-modal').hide();
	});

	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'datetime'
			,range: true
		});
	})


</script>
