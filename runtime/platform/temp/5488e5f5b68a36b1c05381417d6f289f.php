<?php /*a:6:{s:47:"F:\WWW\yeshai\app\platform\view\ts\ts\index.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\header.php";i:1596013767;s:58:"F:\WWW\yeshai\app\platform\view\public\header_navigate.php";i:1602238877;s:49:"F:\WWW\yeshai\app\platform\view\public\footer.php";i:1592563283;s:55:"F:\WWW\yeshai\app\platform\view\public\inner_footer.php";i:1595304974;s:53:"F:\WWW\yeshai\app\platform\view\public\layui_page.php";i:1595310927;}*/ ?>
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

	<title>配方管理</title>

	<div class="h-100 w-100 ts-index-p" id="app">
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
		<div class="w-1200 mt-80 mb-10  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">配方管理 </span>
		</div>

		<div style="height: 34px;" class="w-1200">
			<div class="w-100 h-100 d-flex align-items-center justify-content-start tab relative">
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative <?php if($type == ''): ?>tab-item-active<?php endif; ?>"><a href="index">全部配方</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative <?php if($type == '1'): ?>tab-item-active<?php endif; ?>"><a href="<?php if($type == '1'): ?>javascript:;<?php else: ?><?php echo Url('index',['type'=>1]); ?><?php endif; ?>">TS配方查看</a></div>
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative <?php if($type == '2'): ?>tab-item-active<?php endif; ?>""><a href="<?php echo Url('index',array('type'=>2)); ?>">自有配方查看</a></div>
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
									<span>关键字:</span>
									<input class="ivu-input w-300px ml-8" name="keyword" placeholder="请输入" type="text">
								</div>
								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span>适应症:</span>
									<div class="w-150px ml-8">
										<select name="cate_id">
											<option value="">全部</option>
											<?php if(is_array($cate2) || $cate2 instanceof \think\Collection || $cate2 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c2): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo htmlentities($c2['id']); ?>"><?php echo htmlentities($c2['title']); ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
<!--
								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span >其它标签:</span>
									<div class="w-150px ml-8">
										<select name="cate3">
											<option value="">全部</option>
											<?php if(is_array($cate3) || $cate3 instanceof \think\Collection || $cate3 instanceof \think\Paginator): $i = 0; $__LIST__ = $cate3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c3): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo htmlentities($c3['id']); ?>"><?php echo htmlentities($c3['title']); ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div> -->
								<div class="h-100 d-flex align-items-center justify-content-start ml-20">
									<span>来源:</span>
									<div class="w-150px ml-8">
										<select name="type">
											<option value="">全部</option>
											<option value="1">TS配方</option>
											<option value="2">平台配方</option>

										</select>
									</div>
								</div>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start mt-20">
								<div class="h-100 d-flex align-items-center justify-content-start">
									<span>状态:</span>
									<div class="w-150px ml-8">
										<select name="status">
											<option value="">全部</option>
											<option value="1">可用</option>
											<option value="2">不可用</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="w-25 h-100 mt-20  d-flex align-items-start justify-content-end ">
							<button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
							<button type="submit" class="ivu-btn ivu-btn-primary mr-10" lay-submit="search" lay-filter="search">搜索</button>
						</div>
					</form>
				</div>
			</div>
			<!--列表-->
			<div class="w-100 label-list bg-fff">
				<div class="w-100 list-title d-flex align-items-center justify-content-between mb-20 pt-20">
					<span class="size-16  ml-20 fw">全部配方列表</span>
					<div>
						<a href="<?php echo Url('create'); ?>" class="ivu-btn ivu-btn-primary mr-20">
							<i class="ivu-icon ivu-icon-md-add"></i>
							添加自有配方
						</a>
					</div>
				</div>
				<!--表格-->
				<div class="w-100 table ">
					<table class="ivu-table  ivu-table-default" style="overflow: initial" id="list" lay-filter="list">

					</table>
					<script type="text/html" id="type">{{d.type_name}}</script>
					<script type="text/html" id="is_status">{{d.is_status == 1 ? '可用':'不可用'}}</script>
					<script type="text/html" id="act">
						{{# if(d.platform_id){ }}
						<span class="ckitem">
							<a href="<?php echo Url('edit'); ?>?id={{d.id}}" class="text-27">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="text-c01f5e" href="javascript:void(0)" lay-event='delstor'>
								<i class="icon iconfont iconguanbi size-12"></i>
								删除
							</a>
							</span>
						{{# }else{ }}
						<span class="ckedit">
							<a class="text-27">
								<i class="icon iconfont iconbian-ji"></i>
								编辑
							</a>
							<a class="text-c01f5e" >
								<i class="icon iconfont iconguanbi size-12"></i>
								删除
							</a>
						</span>
						{{# } }}
					</script>
				</div>
				<!--page 分页-->
				<div class="w-100 d-flex align-items-center justify-content-end">
					<Page class="mt-20 mb-20 mr-20" @on-change="pagechange" @on-page-size-change="pagesizechange" show-sizer show-elevator show-total :total="100"/>
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



<!-- <link href="/static/plug/layui/css/layui.css" rel="stylesheet"> -->
<link href="/system/css/layui-admin.css" rel="stylesheet">
<link href="/system/plugins/layui/css/layui.css" rel="stylesheet">
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/js/layuiList.js"></script>

<script src="https://cdn.bootcdn.net/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
	var type='<?=$type?>';
    //实例化form
    layList.form.render();
    //加载列表
    layList.tableInfo('list',"<?php echo Url('ts_list',['type'=>$type]); ?>",function (){
        var join=new Array();
        join=[
            {field: 'code', title: '编码',templet:'#code',align:'left',event:'code',width:'15%'},
            {field: 'name_zn', title: 'TS配方名称',templet:'#zn_name',align:'left',event:'name_zn',width:'15%'},
            {field: 'name_en', title: '英文名称',templet:'#en_name',align:'left',event:'name_en',width:'15%'},
            {field: 'type', title: '来源',templet:'#type',align:'left',event:'type',width:'8%'},
            {field: 'cate2_name', title: '适应症',templet:'#cate2_name',align:'left',event:'cate2_name',width:'15%'},
            // {field: 'cate3_name', title: '其他标签',templet:'#cate3_name',align:'left',event:'cate3_name',width:'10%'},
            {field: 'price', title: '每组价格',templet:'#price',align:'left',width:'8%'},
            {field: 'is_status', title: '状态',templet:'#is_status',align:'left',width:'6%'},
            {field: 'right', title: '操作',align:'left',toolbar:'#act'}
        ];
        return join;
    },true,10,false,false,false,function(res,curr,count){
        $('.layui-border-box').css('border','none');
        $('.layui-table-header').css('border','none');
        $('th').css({'background-color': '#f8f8f9'});
        $('th').find('span').css({'color': '#333','font-weight':'bold'});
        $('tr').css({'border-bottom':'1px solid #e8eaec'});
    });
    //下拉框
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })
    //点击事件绑定
    layList.tool(function (event,data,obj) {

        switch (event) {
            case 'delstor':
                var url=layList.Url({m:'terrace',c:'ts.ts',a:'delete',q:{id:data.id}});
                var code = {title:"操作提示",text:"确定将该配方移入回收站吗？",type:'info',confirm:'是的，移入回收站'};
				layList.layer.confirm('配方删除后，医生的TS配方列表中，将不会再次出现该配方，是否确定删除？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
					axios.get(url).then(function(res){
						console.log(res)
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
    //查询
    layList.search('search',function(where){
        layList.reload(where);
    });
    //自定义方法
    var action={
        set_ts:function(field,id,value){
            layList.baseGet(layList.Url({c:'ts.ts_ts',a:'set_ts',q:{field:field,id:id,value:value}}),function (res) {
                layList.msg(res.msg);
            });
        },
        show:function(){
            var ids=layList.getCheckData().getIds('id');
            if(ids.length){
                layList.basePost(layList.Url({c:'ts.ts_ts',a:'ts_show'}),{ids:ids},function (res) {
                    layList.msg(res.msg);
                    layList.reload();
                });
            }else{
                layList.msg('请选择要可用的配方');
            }
        }
    };
    //多选事件绑定
    $('.layui-btn-container').find('button').each(function () {
        var type=$(this).data('type');
        $(this).on('click',function(){
            action[type] && action[type]();
        })
    });
</script>