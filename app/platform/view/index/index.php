{include file="public/header" /}
    <div class="ht-home">
        {include file="public/header_navigate" /}
           <!--头部-->
        <div class="w-1200 mt-80   text-666 size-14">
            <span>首页</span>
        </div>
        <!--内容区-->
        <div class="w-1200  i-conten">
            <div class="i-c-conten  h-100">

                <div class="i-c-top w-100 d-flex align-items-start justify-content-between">
                    <div class="top-item   d-flex align-items-start justify-content-start flex-column text-fff relative" style=" background-image: linear-gradient(to right, #fc3583, #fb9d9e);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start  w-100">本月订单总金额</div>
                        <a href="#" class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start text-fff fw">
                            {$list['order_total']}
                            <span class="size-14 staff">元</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('{__ADMIN_FRAME}/images/img-1.png') "></div>
                    </div>
                    <div class="top-item  d-flex align-items-start justify-content-start flex-column text-fff relative" style="background-image: linear-gradient(to right, #814bf7, #b19afe);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start text-fff  w-100">本月订单新增</div>
                        <a class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start fw text-fff">
                            {$list['order_count']}
                            <span class="size-14 staff">单</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('{__ADMIN_FRAME}/images/img-2.png') "></div>
                    </div>
                    <div class="top-item  d-flex align-items-start justify-content-start flex-column text-fff relative" style="background-image: linear-gradient(to right, rgba(255, 130, 70, 0.97), #ffbb78);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start  w-100">医生总数</div>
                        <a class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start fw text-fff">
                            {$list['doctor']}
                            <span class="size-14 staff">人</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('{__ADMIN_FRAME}/images/img-3.png') "></div>
                    </div>
                    <div class="top-item  d-flex align-items-start justify-content-start flex-column text-fff relative" style="  background-image: linear-gradient(to right, #3668fe, #85a4ff);">
                        <div style="height: 20px" class=" mt-14 ml-14  d-flex align-items-center justify-content-start  w-100">患者总数</div>
                        <a class="h-75 bitem pl-10 w-100  d-flex align-items-end justify-content-start fw text-fff">
                            {$list['patient']}
                            <span class="size-14 staff">人</span>
                        </a>
                        <div class="absolute icon" style="background-image: url('{__ADMIN_FRAME}/images/img-4.png') "></div>
                    </div>
                </div>
                <!-- 图表-->
                <div id="main" style="width: 1160px;height : 385px;" class="chart"></div>

                <!-- 统计 -->
                <div class="count ">
                    <div class="w-100 li title d-flex align-items-center justify-content-around size-14" style="">
                        <div class="item h-100"></div>
                        <div class="item h-100 d-flex align-items-center justify-content-start fw">数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start fw">本月新增</div>
                    </div>
                    <div class="w-100 li  d-flex align-items-center justify-content-around size-14">
                        <div class="item h-100 d-flex align-items-center justify-content-start">总医疗机构数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start ">{$info['institu']['num']}家</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start ">{$info['institu']['now_month_num']}家 <span class="text-7ed321">↑</span></div>
                    </div>
                    <div class="w-100 li  d-flex align-items-center justify-content-around size-14">
                        <div class="item h-100 d-flex align-items-center justify-content-start">医生总数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start ">{$info['doctor']['num']}人</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start ">{$info['doctor']['now_month_num']}人 <span class="text-7ed321">↑</span></div>
                    </div>

                    <div class="w-100 li  d-flex align-items-center justify-content-around size-14">
                        <div class="item h-100 d-flex align-items-center justify-content-start">患者总数量</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start ">{$info['patient']['num']}人</div>
                        <div class="item h-100 d-flex align-items-center justify-content-start ">{$info['patient']['now_month_num']}人<span class="text-7ed321">↑</span></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
{include file="public/footer" /}
<script src="{__ADMIN_FRAME}/js/less.js"></script>
<script src="{__ADMIN_FRAME}/plugins/layui/layui.js"></script>
<script src="{__ADMIN_FRAME}/plugins/echarts/echarts.min.js"></script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    // 指定图表的配置项和数据
    var option  = {
        title  : {
            text   : '图表名称',
            left   : 10,
            align  : 'right',
        },
        tooltip: {
            trigger    : 'axis',
            axisPointer: {
                type : 'cross',
                label: {
                    backgroundColor: '#6a7985',
                },
            },
        },
        legend : {
            data: ['患者人数', '医生人数', '医疗机构数量'],
        },
        toolbox: {
            feature: {
                saveAsImage: {},
            },
        },
        grid   : {
            left        : '3%',
            right       : '4%',
            bottom      : '3%',
            containLabel: true,
        },
        xAxis  : [
            {
                type       : 'category',
                boundaryGap: false,
                data       : ['2019-01', '2019-02', '2019-03', '2019-04', '2019-05', '2019-06', '2019-07'],
            },
        ],
        yAxis  : [
            {
                type: 'value',
            },
        ],
        series : [
            {
                name     : '患者人数',
                type     : 'line',
                stack    : '总量',
                areaStyle: {},
                data     : [100, 132, 101, 134, 90, 230, 210],
            },
            {
                name     : '医生人数',
                type     : 'line',
                stack    : '总量',
                areaStyle: {},
                data     : [200, 200, 191, 234, 290, 330, 310],
            },
            {
                name     : '医疗机构数量',
                type     : 'line',
                stack    : '总量',
                areaStyle: {},
                data     : [100, 100, 201, 154, 190, 330, 410],
            },
        ],
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
