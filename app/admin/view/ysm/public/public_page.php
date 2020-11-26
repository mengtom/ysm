     <!--page 分页-->
            <div class="w-100 d-flex align-items-center justify-content-end ">
                <ul class="ivu-page mt-20 mb-20 mr-20">
                    <span class="ivu-page-total">共 {$total} 条</span>
                    <li title="上一页" class="ivu-page-prev ivu-page-disabled"><a><i class="ivu-icon ivu-icon-ios-arrow-back"></i></a></li>
                    <li title="1" class="ivu-page-item ivu-page-item-active"><a>1</a></li>
                    <li title="2" class="ivu-page-item"><a>2</a></li>
                    <li title="3" class="ivu-page-item"><a>3</a></li>
                    <li title="向后 5 页" class="ivu-page-item-jump-next"><a><i class="ivu-icon ivu-icon-ios-arrow-forward"></i></a></li>
                    <li title="10" class="ivu-page-item"><a>10</a></li>
                    <li title="下一页" class="ivu-page-next"><a><i class="ivu-icon ivu-icon-ios-arrow-forward"></i></a></li>

                    <div class="ivu-page-options hide">
                        <div class="ivu-page-options-sizer">
                            <div class="ivu-select ivu-select-single ivu-select-default">
                                <div tabindex="0" class="ivu-select-selection"><input type="hidden" value="10">
                                    <div class="">
                                        <span class="ivu-select-selected-value">10 条/页</span>
                                        <i class="ivu-icon ivu-icon-ios-arrow-down ivu-select-arrow"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ivu-select ivu-select-single ivu-select-default relative" style="width: 85px;">
                        <div tabindex="0" class="ivu-select-selection">
                            <input class="inputval" value="" type="hidden">
                            <div class="">
                                <span class="ivu-select-selected-value text">10 条/页</span>
                                <i class="ivu-icon ivu-icon-ios-arrow-down ivu-select-arrow"></i>
                            </div>
                        </div>
                        <div class="ivu-select-dropdown ivu-se" style="min-width: 85px;display: none; position: absolute; will-change: top, left; transform-origin: center top; top: 28px; left: 0px;" x-placement="bottom-start">
                            <ul class="ivu-select-dropdown-list">
                                <li class="ivu-select-item" value="0" data-value="1" data-id="1" name="limit">10 条/页</li>
                                <li class="ivu-select-item" value="1" data-value="1" data-id="1" name="limit">20 条/页</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ivu-page-options">
                        <div class="ivu-page-options-elevator">
                            跳至
                            <input type="text" autocomplete="off" spellcheck="false" name="page">
                            页
                        </div>
                    </div>
                </ul>
            </div>