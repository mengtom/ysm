{include file="public/header"}
<body>
    <div class="public-top-left h-100">
        <div class="public-top-nav w-100 d-flex align-items-center justify-content-between">
            <div class="h-100 d-flex align-items-center justify-content-start">
                <img class="logo ml-20" src="{__ADMIN_FRAME}/images/doctor/logo-3@3x.png" alt="">
            </div>
            <div class="d-flex align-items-center justify-content-start">
                <div>
                    <a href=""><i class="icon iconfont iconyishenghoutai-gouwuche1 text-fff size-24"></i></a>
                </div>
                <div class="ml-20">
                    <img class="picture" src="{__ADMIN_FRAME}/images/doctor/portrait@3x.png" alt="">
                </div>
                <div class="mr-20 ml-10  cursor relative usertext">
                    <span class="text-fff">{$_doctor['name']}</span>
                    <i class="icon iconfont iconxiangxia2 text-fff size-24"></i>
                    <div class="absolute bg-fff userlist">
                        <div class="d-flex align-items-center justify-content-center flex-column w-100 h-100">
                            <div class="w-100 d-flex align-items-center justify-content-center text-0081a7" style="height: 50px;"><a href="{:Url('login/logout')}" class="text-0081a7" >注销</a ></div>
                            <div class="w-100 d-flex align-items-center justify-content-center text-0081a7" style="height: 50px;">列表一</div>
                            <div class="w-100 d-flex align-items-center justify-content-center text-0081a7" style="height: 50px;">列表一</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="public-button d-flex align-items-start justify-content-start">
            <div class="public-button-left h-100">
                <ul class="ivu-menu ivu-menu-light ivu-menu-vertical" style="width: 206px;">
                    <li class="ivu-menu-submenu ">
                        <div class="ivu-menu-submenu-title ivu-menu-item-active">
                            <a class="w-100 h-100 d-block text-57" href="{:Url('main')}" target="myFrameRight">
                                <i class="icon iconfont iconyishenghoutai-shouye text-bf mr-10"></i>
                                首页
                            </a>
                        </div>
                    </li>
                    <li class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title">
                            <a class="w-100 h-100 d-block text-57" target="myFrameRight" href="{:Url('microchip.microchip_product/index')}">
                                <i class="icon iconfont iconyishenghoutai-shouyeyingyangsu text-bf mr-10"></i>
                                微片查看
                            </a>
                        </div>
                    </li>
                    <li class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title text-57">
                            <i class="icon iconfont iconyishenghoutai-peifangchakan text-bf"></i>
                            配方查看
                            <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i>
                        </div>
                        <ul class="ivu-menu" style="display: none;">
                            <li class="ivu-menu-item pl-63">
                                <a target="myFrameRight" class="w-100 h-100 d-block" href="{:Url('ts.ts/index')}">
                                    全部配方
                                </a>
                            </li>
                            <li class="ivu-menu-item pl-63">
                                <a target="myFrameRight" class="w-100 h-100 d-block" href="{:Url('ts.ts/index',array('type'=>1))}">
                                    参考配方
                                </a>
                            </li>
                            <li class="ivu-menu-item pl-63">
                                <a target="myFrameRight" class="w-100 h-100 d-block" href="{:Url('ts.ts/index',array('type'=>2))}">
                                    我的配方
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title text-57">
                            <i class="icon iconfont iconyishenghoutai-chakandingdan text-bf"></i>
                            查看订单
                            <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i>
                        </div>
                        <ul class="ivu-menu">
                            <li class="ivu-menu-item pl-63">
                                <a class="w-100 h-100 d-block" href="{:Url('crm.crm_order/index',array('type'=>1))}" target="myFrameRight">患者处方</a>
                            </li>
                            <li class="ivu-menu-item pl-63">
                                <a class="w-100 h-100 d-block" href="{:Url('crm.crm_order/order',array('type'=>0))}" target="myFrameRight">患者订单</a>
                            </li>
                            <li class="ivu-menu-item pl-63">
                                <a class="w-100 h-100 d-block" href="{:Url('crm.crm_order/order',array('type'=>1))}" target="myFrameRight">采购订单</a>
                            </li>
                        </ul>
                    </li>
                    <li class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title text-57">
                            <a class="w-100 h-100 d-block" href="">
                                <i class="icon iconfont iconyishenghoutai-huanzheliebiao text-bf"></i>
                                患者列表
                            </a>
                        </div>
                    </li>
                    <li class="ivu-menu-submenu">
                        <div class="ivu-menu-submenu-title text-57">
                            <a class="w-100 h-100 d-block" href="">
                                <i class="icon iconfont iconyishenghoutai-gerenzhongxin text-bf"></i>
                                个人中心
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="public-button-right h-100">
                <iframe class="w-100 h-100 iframe" src="{:Url('main')}" name="myFrameRight" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
{include file="public/footer"}
<script>
    $('.ivu-menu-submenu-title').click(function (e) {
        $('.ivu-menu-item').removeClass('ivu-menu-item-active');
        $('.ivu-menu-submenu-title').removeClass('ivu-menu-item-active');
        $(this).addClass('ivu-menu-item-active');
        $(this).next('.ivu-menu').stop().slideToggle();
    });
    $('.ivu-menu-item').click(function (e) {
        $('.ivu-menu-submenu-title').removeClass('ivu-menu-item-active');
        $('.ivu-menu-item').removeClass('ivu-menu-item-active');
        $(this).addClass('ivu-menu-item-active');
    });

</script>



