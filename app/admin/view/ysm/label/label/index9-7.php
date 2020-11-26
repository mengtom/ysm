{include file="public/header"}
<div id="app" class="bq-index">
{include file="public/header_navigate"}
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
                                    {volist name="tree" id="vo"}
                                        <option value="{$vo.id}" {eq name="$where.cid" value="$vo.id"}>{$vo.title}</option>
                                    {/volist}
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
                     {volist name="list" id="vo"}

                        <div class="w-100 item d-flex align-items-center justify-content-end">
                            <div class="h-100  d-flex item-1">
                                <div class="w-50px d-flex align-items-center justify-content-center">
                                    {notempty name="vo.child"}
                                    <i data-collapse="false" class="icon iconfont icon2you cursor nesitem"></i>
                                    {/notempty}
                                </div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-100px ">
                                    一级
                                </div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-350px ">{$vo.title}</div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-250px ">{$vo.en_title}</div>
                                <div class="h-100 d-flex align-items-center justify-content-start  w-150px ">{$vo.catename}</div>
                                <div class="h-100 d-flex align-items-center justify-content-start " style="width: 190px;">{$vo.add_time|date="Y-m-d H:i"}</div>
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
                                                    <a href="{:Url('delete',array('id'=>$vo['id']))}" class="ivu-btn ivu-btn-primary ivu-btn-small mr-20" value="{$vo.id}" formaction="{:Url('delete',array('id'=>$vo['id']))}"><span>确定</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <ol class="table-li-handle" style="display: none">
                            <li  class="items">
                                {volist name="vo.child" id="v"}
                                <div class="w-100 item d-flex align-items-center justify-content-end">
                                    <div class="h-100  d-flex item-2">
                                        <div class="w-50px d-flex align-items-center justify-content-center">
                                            <!-- <i data-collapse="false" class="icon iconfont icon2you cursor nesitem"></i> -->
                                        </div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-100px ">
                                            二级
                                        </div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-350px ">{$v.title}</div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-250px ">{$v.en_title}</div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  w-150px ">{$v.catename}</div>
                                        <div class="h-100 d-flex align-items-center justify-content-start  " style="width: 190px;">{$v.add_time|date="Y-m-d H:i"}</div>
                                    </div>
                                    <div class="h-100 d-flex align-items-center justify-content-start  " style="width: 110px;">
                                        <a class="text-27 add-mode" href="{:Url('edit',array('id'=>$v['id']))}">
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
                                                            <a href="{:Url('delete',array('id'=>$v['id']))}"  class="ivu-btn ivu-btn-primary ivu-btn-small mr-20" value="{$v.id}" formaction="{:Url('delete',array('id'=>$v['id']))}"><span>确定</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {/volist}
                            </li>
                        </ol>

                    {/volist}
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
                <form class="layui-form" action="{:Url('save')}">

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
                                     {volist name="tree" id="vo"}
                                        <option value="{$vo.id}">{$vo.title}</option>
                                    {/volist}
                                </select>
                            </div>
                        </div>
                        <div class="item  w-100 mt-20">
                            <div class="item-text size-14">上一级标签<span class="text-ff4d4f">*</span></div>
                            <div class="ivu-select mt-8 ivu-select-single ivu-select-default relative">
                                <select name="pid">
                                    <option value="0">顶级标签</option>
                                    {volist name='label_list' id = "vo"}
                                    <option value="{$vo.id}">{$vo.title}</option>
                                    {/volist}
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

{include file="public/footer"}
{include file="public/inner_footer"}
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

 <script src="{__PLUG_PATH}layui/layui.all.js"></script>
<script src="{__ADMIN_PATH}js/layuiList.js"></script>
<script>
    setTimeout(function () {
        $('.alert-info').hide();
    },3000);
    //实例化form
    layList.form.render();
    //加载列表
    // layList.tableList('List',"{:Url('label_list')}",function (){
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