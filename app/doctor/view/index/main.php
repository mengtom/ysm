{include file="public/header"}
    <div class="home w-100 h-100">
        <div class="w-100 h-100 pl-20 pr-20">
            <div class="mt-14 mb-10 w-100">首页</div>
            <div class="top-name" style='background-image: url("{__ADMIN_FRAME}/images/doctor/home-bg.png");'>
                <div class="ml-30 fw size-24 text-fff doctor-name">{$topData['name']}医生，欢迎回来！</div>
                <div class="ml-30 mt-8 text-fff">便捷管理 轻松查看</div>
            </div>
            <div class="w-100 together d-flex align-items-center justify-content-start mt-20 bg-fff">
                <div class="date h-100 d-flex align-items-start justify-content-start">
                    <div class="h-100 ml-8">
                        <img class="together_img mt-25 ml-14" src="{__ADMIN_FRAME}/images/doctor/date.svg" alt="">
                    </div>
                    <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                        <div class="text-57 mt-25">今天是</div>
                        <div class="size-30">{$topData['now_day']}</div>
                    </div>
                </div>
                <div class="long mr-20"></div>
                <div class="right h-100 d-flex align-items-start justify-content-start">
                    <div class="w-33 h-100 d-flex align-items-start justify-content-start">
                        <div class="h-100">
                            <img class="together_img mt-25 ml-14" src="{__ADMIN_FRAME}/images/doctor/patient.svg" alt="">
                        </div>
                        <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                            <div class="text-57 mt-25">已服务患者</div>
                            <div class="size-30"><span class="fw">{$topData['patientCount']}</span>人</div>
                        </div>
                    </div>
                    <div class="w-33 h-100 d-flex align-items-start justify-content-start">
                        <div class="h-100">
                            <img class="together_img mt-25 ml-14" src="{__ADMIN_FRAME}/images/doctor/recipel.svg" alt="">
                        </div>
                        <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                            <div class="text-57 mt-25">开具处方</div>
                            <div class="size-30"><span class="fw">{$topData['prescriptCount']}</span>单</div>
                        </div>
                    </div>
                    <div class="w-33 h-100 d-flex align-items-start justify-content-start">
                        <div class="h-100">
                            <img class="together_img mt-25 ml-14" src="{__ADMIN_FRAME}/images/doctor/nutrition.svg" alt="">
                        </div>
                        <div class="h-100 d-flex align-items-start justify-content-start flex-column ml-14">
                            <div class="text-57 mt-25">预定营养素患者</div>
                            <div class="size-30"><span class="fw">{$topData['orderCount']}</span>人</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-100 d-flex align-items-start justify-content-between flex-wrap items">

                <div class="mt-20 mr-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">微片</div>
                    <div class="w-100 pl-20 pr-20 content">
                        {volist name="$list.microchip.data" id="m"}
                        <div class="w-100 d-flex align-items-center justify-content-between li">
                            <div class="w-50 ml-8">{$m.zn_name}</div>
                            <div class="w-40">{$m.cate2_name}</div>
                            <div><a href="{:Url('microchip.microchipProduct/details',array('micro_id'=>$m.id))}" data-url="{:Url('microchip.microchipProduct/details',array('micro_id'=>$m.id))}" class="text-0081a7">详情</a></div>
                        </div>
                        {/volist}
                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="{:Url('microchip.microchipProduct/index')}" data-url="{:Url('microchip.microchipProduct/index')}" class="text-0081a7">查看全部</a>
                    </div>
                </div>

                <div class="mt-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">参考配方</div>
                    <div class="w-100 pl-20 pr-20 content">
                        {volist name="$list.ts_ts.data" id="t"}
                        <div class="w-100 d-flex align-items-center justify-content-between li bg-f6">
                            <div class="text-57 w-50 ml-8">{$t.name_zn}</div>
                            <div class="text-57 w-40">{$t.cate2_name}</div>
                            <div><a href="{:Url('ts.ts/details',array('id'=>$t.id))}" data-url="{:Url('ts.ts/details',array('id'=>$t.id))}" class="text-0081a7">详情</a></div>
                        </div>
                        {/volist}
                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="{:Url('ts.ts/index',array('type'=>'0,2,3,4'))}" data-url="{:Url('ts.ts/index',array('type'=>1))}" class="text-0081a7">查看全部</a>
                    </div>
                </div>

                <div class="mt-20 mr-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">我的配方</div>
                    <div class="w-100 pl-20 pr-20 content">
                        {volist name="$list.ts.data" id="t"}
                        <div class="w-100 d-flex align-items-center justify-content-between li">
                            <div class="w-50 ml-8">{$t.name_zn}</div>
                            <div class="w-40">{$t.cate2_name}</div>
                            <div><a href="{:Url('ts.ts/details',array('id'=>$t.id))}" data-url="{:Url('ts.ts/details',array('id'=>$t.id))}" class="text-0081a7">详情</a></div>
                        </div>
                        {/volist}

                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="{:Url('ts.ts/index',array('type'=>'1'))}" data-url="{:Url('ts.ts/index',array('type'=>'2'))}" class="text-0081a7">查看全部</a>
                    </div>
                </div>

                <div class="mt-20 item d-flex flex-column align-items-start justify-content-start">
                    <div class="w-100 top mt-10 size-16 fw pl-20 pr-20">处方查看</div>
                    <div class="w-100 pl-20 pr-20 content">
                        <!-- <div class="w-100 d-flex align-items-center justify-content-between li bg-f6">
                            <div class="ml-8 text-57 w-40">处方名称</div>
                            <div class="w-10 text-57">患者姓名</div>
                            <div class="w-20 text-57">金额</div>
                            <div class="w-10 text-57">状态</div>
                            <div><a href="" style="color: #F6F6F6">详情</a></div>
                        </div> -->
                        {volist name="$list.order.data" id="o"}
                        <div class="w-100 d-flex align-items-center justify-content-between li">
                            <div class="ml-8 w-40">{$o.order_name}</div>
                            <div class="w-10">{$o.real_name}</div>
                            <div class="w-20">{$o.total_price}</div>
                            <div class="w-10">待查看</div>
                            <div><a href="{:Url('crm.CrmOrder/details',array('id'=>$o.id))}" data-url="{:Url('crm.CrmOrder/details',array('id'=>$o.id))}" class="text-0081a7">详情</a></div>
                        </div>
                        {/volist}


                    </div>
                    <div class="w-100  button text-right pl-20 pr-20">
                        <a href="{:Url('crm.CrmOrder/index',array('type'=>0))}" data-url="{:Url('crm.CrmOrder/index',array('type'=>0))}" class="text-0081a7">查看全部</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
{include file="public/footer"}
<script>
    $('.route').click(function (e) {
        var url = $(this).data('url');
        window.open(url, '_blank');
    });
</script>


