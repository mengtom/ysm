<!--头部-->
        <div class="topmenu fixed w-100">
            <div class="topmenu_conten h-100 d-flex align-items-center justify-content-between">
                <div class="top_left h-100 d-flex align-items-center justify-content-start w-75 ">
                    <div class="top-logo d-flex align-items-center justify-content-center h-100 ">
                        <img src="{$site_logo}" onerror="javascript:this.src='{__ADMIN_FRAME}/images/zimg-logo.png';" alt="">
                    </div>
                    <div class="top-nav h-100 d-flex align-items-center justify-content-start ">
                        <ul class="ivu-menu ivu-menu-light ivu-menu-horizontal">
                            <li class="ivu-menu-item "><!-- ivu-menu-item-active -->
                                <a href="{:Url('index/index')}">首页</a>
                            </li>
                            {volist name="menuList" id="menu"}
                                <li class="ivu-menu-submenu {eq name='controller' value='$menu.controller'}ivu-menu-item-active {/eq}">
                                    <div class="ivu-menu-submenu-title">
                                        <?php if(isset($menu['child']) && count($menu['child']) > 0){ ?>
                                            <span href="#">{$menu.menu_name} <i class="ivu-icon ivu-icon-ios-arrow-down ivu-menu-submenu-title-icon"></i></span>
                                        <?php }else{ ?>
                                            <a href="{$menu.url}">{$menu.menu_name}</a>
                                        <?php } ?>

                                    </div>
                                    <div class="ivu-select-dropdown bg-c01f5e">
                                        <ul class="ivu-menu-drop-list">
                                            <li class="ivu-menu-item-group ">
                                                <ul>
                                                    {volist name="menu.child" id="child"}
                                                    <li class="ivu-menu-item ">
                                                        <a href="{$child.url}" class="w-100 h-100 text-fff"> {$child.menu_name}</a>
                                                    </li>
                                                    {/volist}
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            {/volist}
                        </ul>
                    </div>
                </div>
                <div class="top_right w-25 h-100 d-flex align-items-center justify-content-end cursor">
                    <div class="ellipsis-1 w-50 text-right">
                        <a class="text-27" href="">{$_admin['real_name']}{$role_name.role_name ? $role_name.role_name : '管理员'}</a>
                        <a class="text-c01f5e" href="{:Url('login/logout')}">注销</a>
                    </div>
                    <div class="headimg">
                        <img src="{__ADMIN_FRAME}/images/touxiang.png" style="width: 32px;height: 32px;" alt="">
                    </div>
                </div>
            </div>
        </div>
