<?php /*a:5:{s:54:"F:\WWW\yeshai\app\admin\view/ysm\label\label\index.php";i:1596103312;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\header.php";i:1594957768;s:59:"F:\WWW\yeshai\app\admin\view/ysm\public\header_navigate.php";i:1594196211;s:50:"F:\WWW\yeshai\app\admin\view/ysm\public\footer.php";i:1592563283;s:56:"F:\WWW\yeshai\app\admin\view/ysm\public\inner_footer.php";i:1603854727;}*/ ?>
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

<div id="app" class="bq-index">
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
        <div class="w-1200 tip mt-80 mb-10  text-666 size-14">
            <span>首页 /</span> <span class="text-c01f5e">标签设置 </span>
        </div>
        <!--内容区-->
        <div class="w-1200 com-search">
            <div class="keyword w-100">
                <form class="w-100 h-100 layui-form d-flex align-items-center justify-content-between" id="cate_form" action="" method="post">
                    <div class="w-75 h-100  pl20 d-flex align-items-center justify-content-start">
                        <div class="h-100 d-flex align-items-center justify-content-start ml-20 ">
                            标签类别:
                            <div class="ivu-select   ivu-select-single ivu-select-default relative ml-8 w-200px">
                            		<!--<select class="ivu-input ivu-select h-100 w-150px ivu-select-single ivu-select-default" name="city" lay-filter="test" lay-verify="required">-->
                                <select class="ivu-input ivu-select h-100 w-200px ivu-select-single ivu-select-default" name="cid" lay-filter="test" lay-verify="required" id="cate_select">
                                    <option value=""></option>
                                    <?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo['id']); ?>" {eq name="$where.cid" value="$vo.id"}><?php echo htmlentities($vo['title']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 h-100  d-flex align-items-center justify-content-end hide">
                        <button type="reset" class="ivu-btn ivu-btn-default mr-20">重置</button>
                        <button class="ivu-btn ivu-btn-primary mr-20" lay-submit="search" lay-filter="search">筛选</button>
                    </div>
                </form>
            </div>
        </div>

        <!--列表-->
        <div class="w-1200 label-list mb-30">
            <div class="w-100 list-title d-flex align-items-center justify-content-between">
                <span class="size-16 fw ml-20">标签列表
                </span>
                <div>
                    <button class="ivu-btn ivu-btn-primary mr-20 add-mode"><i class="ivu-icon ivu-icon-md-add"></i> 添加新标签</button>
                </div>
            </div>
            <div class="w-100 nestable ">
                <!--title-->
                <div class="w-100 item bg-f6 d-flex align-items-center justify-content-center">
                    <div style="width: 1090px;" class="h-100  d-flex">
                        <div class="w-50px d-flex align-items-center justify-content-center">
                            <i data-collapse="false" class="icon fw iconfont icon2you  cursor nesall"></i>
                        </div>
                        <div class="h-100 d-flex align-items-center justify-content-start fw  w-100px ">
                            编码
                        </div>
                        <div class="h-100 d-flex align-items-center justify-content-start fw w-350px ">标签名称</div>
                        <div class="h-100 d-flex align-items-center justify-content-start fw w-250px ">英文名称</div>
                        <div class="h-100 d-flex align-items-center justify-content-start fw w-150px ">标签类别</div>
                        <div class="h-100 d-flex align-items-center justify-content-start fw" style="width: 190px;">创建日期</div>
                    </div>
                    <div class="h-100 d-flex align-items-center justify-content-start fw " style="width: 110px;">操作</div>
                </div>
                <ol>
                    <li v-for="(i,k) in items" class="items">
                    <!--带二级-->
                     <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                        <div class="w-100 item d-flex align-items-center justify-content-end">
                            <div class="h-100  d-flex item-1">
                                <div class="w-50px d-flex align-items-center justify-content-center">
                                    <?php if(!(empty($vo['child']) || (($vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator ) && $vo['child']->isEmpty()))): ?>
                                    <i data-collapse="false" class="icon iconfont icon2you cursor nesitem"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-100px ">
                                    一级
                                </div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-350px "><?php echo htmlentities($vo['title']); ?></div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-250px "><?php echo htmlentities($vo['en_title']); ?></div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-150px "><?php echo htmlentities($vo['catename']); ?></div>
                                <div class="h-100 d-flex align-items-center justify-content-start " style="width: 190px;"><?php echo htmlentities(date("Y-m-d H:i",!is_numeric($vo['add_time'])? strtotime($vo['add_time']) : $vo['add_time'])); ?></div>
                            </div>
                            <div class="h-100 d-flex align-items-center justify-content-start  " style="width: 110px;">
                                <a class="text-27 add-mode">
                                    <i class="icon iconfont iconbian-ji "></i>
                                    编辑
                                </a>
                                <div class="ml-10 text-c01f5e relative dele-poptip cursor" href="#">
                                    <i class="iconguanbi icon iconfont size-10"></i>
                                    删除

                                    <div class="ivu-poptip-popper" style="position: absolute; will-change: top, left; top:-118px; left: -294px;width: 344px; display: none" x-placement="top-end">
                                        <div class="ivu-poptip-content ">
                                            <div class="ivu-poptip-arrow"></div>
                                            <div class="ivu-poptip-inner ">
                                                <div class="ivu-poptip-body d-flex">
                                                    <i class="ivu-icon ivu-icon-ios-help-circle mr-10 mt-8 size-18"></i>
                                                    <div class="ivu-poptip-body-message text-27" style="white-space:pre-wrap">删除该标签后，已经添加该标签的微片、配方内的标签将会丢失，是否确定删除？</div>
                                                </div>
                                                <div class="ivu-poptip-footer  pb-10 d-flex justify-content-end ">
                                                    <span type="button" class="ivu-btn ivu-btn-text ivu-btn-small close-poptip mr-10" style=" width: 44px;  height: 24px;  border-radius: 2px;  border: solid 1px #d9d9d9;">
                                                        <span>取消</span>
                                                    </span>
                                                    <a href="<?php echo Url('delete',array('id'=>$vo['id'])); ?>" class="ivu-btn ivu-btn-primary ivu-btn-small mr-20" value="<?php echo htmlentities($vo['id']); ?>" formaction="<?php echo Url('delete',array('id'=>$vo['id'])); ?>"><span>确定</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <ol class="table-li-handle" style="display: none">
                            <li  class="items">
                                <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <div class="w-100 item d-flex align-items-center justify-content-end">
                                    <div class="h-100  d-flex item-2">
                                        <div class="w-50px d-flex align-items-center justify-content-center">
                                            <!-- <i data-collapse="false" class="icon iconfont icon2you cursor nesitem"></i> -->
                                        </div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-100px ">
                                            二级
                                        </div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-350px "><?php echo htmlentities($v['title']); ?></div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-250px "><?php echo htmlentities($v['en_title']); ?></div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-150px "><?php echo htmlentities($v['catename']); ?></div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  " style="width: 190px;"><?php echo htmlentities(date("Y-m-d H:i",!is_numeric($v['add_time'])? strtotime($v['add_time']) : $v['add_time'])); ?></div>
                                    </div>
                                    <div class="h-100 d-flex align-items-center justify-content-start  " style="width: 110px;">
                                        <a class="text-27 add-mode" href="<?php echo Url('edit',array('id'=>$v['id'])); ?>">
                                            <i class="icon iconfont iconbian-ji "></i>
                                            编辑
                                        </a>
                                        <div class="ml-10 text-c01f5e relative dele-poptip cursor" >
                                            <i class="iconguanbi icon iconfont size-10"></i>
                                            删除

                                            <div class="ivu-poptip-popper" style="position: absolute; will-change: top, left; top:-118px; left: -294px;width: 344px; display: none" x-placement="top-end">
                                                <div class="ivu-poptip-content ">
                                                    <div class="ivu-poptip-arrow"></div>
                                                    <div class="ivu-poptip-inner ">
                                                        <div class="ivu-poptip-body d-flex">
                                                            <i class="ivu-icon ivu-icon-ios-help-circle mr-10 mt-8 size-18"></i>
                                                            <div class="ivu-poptip-body-message text-27" style="white-space:pre-wrap">删除该标签后，已经添加该标签的微片、配方内的标签将会丢失，是否确定删除？</div>
                                                        </div>
                                                        <div class="ivu-poptip-footer  pb-10 d-flex justify-content-end ">
                                                    <span type="button" class="ivu-btn ivu-btn-text ivu-btn-small close-poptip mr-10" style=" width: 44px;  height: 24px;  border-radius: 2px;  border: solid 1px #d9d9d9;">
                                                        <span>取消</span>
                                                    </span>
                                                            <a href="<?php echo Url('delete',array('id'=>$v['id'])); ?>"  class="ivu-btn ivu-btn-primary ivu-btn-small mr-20" value="<?php echo htmlentities($v['id']); ?>" formaction="<?php echo Url('delete',array('id'=>$v['id'])); ?>"><span>确定</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </li>
                        </ol>

                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </li>
                </ol>

            </div>
            <!--page 分页-->
    
        </div>


        <!--添加新成分-->
        <div style="display: none" class="modal-root label-modal">
            <div class="ant-modal-wrap "></div>
            <div class="ant-modal fixed" style="height: 460px;">
                <div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
                    <span class="fw size-16">创建新标签</span>
                    <span style="right: 20px;" class="absolute cursor closemode">
                        <i class="icon iconfont iconguanbi text-bf"></i>
                    </span>
                </div>
                <form class="layui-form" action="<?php echo Url('save'); ?>">

                    <div class="items  d-flex align-items-center justify-content-start flex-column   ">
                        <div class="item  w-100">
                            <div class="item-text size-14">标签名称<span class="text-ff4d4f h-100">*</span></div>
                            <div class="mt-8">
                                <input type="text" placeholder="请输入" name="title" class="ivu-input w-100 ">
                            </div>
                        </div>
                        <div class="item  w-100 mt-20">
                            <div class="item-text size-14">英文名称<span class="text-ff4d4f">*</span></div>
                            <div class="mt-8"><input type="text" name="en_title" placeholder="请输入" class="ivu-input w-100 "></div>
                        </div>
                        <div class="item  w-100 mt-20">
                            <div class="item-text size-14">标签类别<span class="text-ff4d4f">*</span></div>
                            <div class="ivu-select mt-8 ivu-select-single ivu-select-default relative">
                                <select name="cid" >
                                    <option value="">请选择</option>
                                     <?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="item  w-100 mt-20">
                            <div class="item-text size-14">上一级标签<span class="text-ff4d4f">*</span></div>
                            <div class="ivu-select mt-8 ivu-select-single ivu-select-default relative">
                                <select name="pid">
                                    <option value="0">顶级标签</option>
                                    <?php if(is_array($label_list) || $label_list instanceof \think\Collection || $label_list instanceof \think\Paginator): $i = 0; $__LIST__ = $label_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="w-100 d-flex align-items-center justify-content-end foot ">
                        <button type="button" class="ivu-btn ivu-btn-default closemode">取消</button>
                        <button type="submit" class="ivu-btn ivu-btn-primary ml-20">创建</button>
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



<script>





    $(document).ready(function () {
    	layui.use(['form'], function () {
			var form = layui.form; //表单
			//提交表单
			form.on('select(test)', function (data) {
				console.log(data)
				$('#cate_form').submit();
			});
})
    	
    	
        $('.nesitem').click(function (e) {
            $val = $(this).hasClass('icon2you');
            if ($val == true) {
                $(this).removeClass('icon2you');
                $(this).addClass('iconxiangxia2');
            } else {
                $(this).removeClass('iconxiangxia2');
                $(this).addClass('icon2you');
            }
            $(this).parent().parent().parent().next('.table-li-handle').stop().slideToggle();
        });


        //点击展开和关闭
        $('.nesall').click(function (e) {
            $val = $(this).data('collapse');
            // $('.table-li-handle').stop().slideToggle();
            if ($val == false) {
                $(this).data('collapse', true);
                $(this).removeClass('icon2you');
                $(this).addClass('iconxiangxia2');
                $('.table-li-handle').show();
                $('.nesitem').removeClass('icon2you');
                $('.nesitem').addClass('iconxiangxia2');
            } else {
                $(this).data('collapse', false);
                $(this).removeClass('iconxiangxia2');
                $(this).addClass('icon2you');
                $('.table-li-handle').hide();
                $('.nesitem').removeClass('iconxiangxia2');
                $('.nesitem').addClass('icon2you');
            }
        });

        //弹窗
        $('.closemode').click(function () {
            $('.modal-root').hide();
        });

        $('.add-mode').click(function () {
            $('.modal-root').show();
        });

        // 气泡
        $('.dele-poptip').click(function (e) {
            $(this).children('.ivu-poptip-popper').show();
        });

        $('.close-poptip').click(function (e) {
            console.log($(this).parent().parent().parent().parent('.ivu-poptip-popper'))
            $(this).parent().parent().parent().parent('.ivu-poptip-popper').stop().slideToggle();
        });
        // $("#cate_select").onchange(function (e){
        //     var form=document.getElementById('cate_form');
        //     form.submit();
        // });
    });
</script>

 <script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/js/layuiList.js"></script>
<script>
    setTimeout(function () {
        $('.alert-info').hide();
    },3000);
    //实例化form
    layList.form.render();
    //加载列表
    // layList.tableList('List',"<?php echo Url('label_list'); ?>",function (){
    //     return [
    //         {field: 'id', title: 'ID', sort: true,event:'id',width:'4%',align:'center'},
    //         {field: 'pid_name', title: '父级',align:'center'},
    //         {field: 'cate_name', title: '分类名称',edit:'cate_name',align:'center'},
    //         {field: 'pid', title: '查看子分类',templet:'#pid',align:'center',width:'8%'},
    //         {field: 'pic', title: '分类图标',templet:'#pic',align:'center'},
    //         {field: 'sort', title: '排序',sort: true,event:'sort',edit:'sort',width:'8%',align:'center'},
    //         {field: 'is_show', title: '状态',templet:'#is_show',width:'10%',align:'center'},
    //         {field: 'right', title: '操作',align:'center',toolbar:'#act',width:'10%',align:'center'},
    //     ];
    // });
    //自定义方法
    // var action= {
    //     set_category: function (field, id, value) {
    //         layList.baseGet(layList.Url({
    //             c: 'store.store_category',
    //             a: 'set_category',
    //             q: {field: field, id: id, value: value}
    //         }), function (res) {
    //             layList.msg(res.msg);
    //         });
    //     },
    // }
    //查询
    // layList.search('search',function(where){
    //     layList.reload(where);
    // });
    // layList.switch('is_show',function (odj,value) {
    //     if(odj.elem.checked==true){
    //         layList.baseGet(layList.Url({c:'store.store_category',a:'set_show',p:{is_show:1,id:value}}),function (res) {
    //             layList.msg(res.msg);
    //         });
    //     }else{
    //         layList.baseGet(layList.Url({c:'store.store_category',a:'set_show',p:{is_show:0,id:value}}),function (res) {
    //             layList.msg(res.msg);
    //         });
    //     }
    // });
    //快速编辑
    layList.edit(function (obj) {
        var id=obj.data.id,value=obj.value;
        switch (obj.field) {
            case 'cate_name':
                action.set_category('cate_name',id,value);
                break;
            case 'sort':
                action.set_category('sort',id,value);
                break;
        }
    });
    //监听并执行排序
    layList.sort(['id','sort'],true);
    //点击事件绑定
    layList.tool(function (event,data,obj) {
        switch (event) {
            case 'delstor':
                var url=layList.U({c:'label.label',a:'delete',q:{id:data.id}});
                $eb.$swal('delete',function(){
                    $eb.axios.get(url).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success',res.data.msg);
                            obj.del();
                        }else
                            return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                        $eb.$swal('error',err);
                    });
                })
                break;
            case 'open_image':
                $eb.openImage(data.pic);
                break;
        }
    })
</script>