{include file="public/header"}
{if condition="$tab_id eq 4"}
 <!--   <link href="{__FRAME_PATH}/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="{__ADMIN_PATH}/css/layui-admin.css" rel="stylesheet">
    <link href="{__FRAME_PATH}/css/style.min.css?v=3.0.0" rel="stylesheet">
   <link href="{__FRAME_PATH}css/font-awesome.min.css?v=4.3.0" rel="stylesheet"> -->
     <script src="{__PLUG_PATH}vue/dist/vue.min.js"></script>
 <!--    <link href="{__PLUG_PATH}iview/dist/styles/iview.css" rel="stylesheet"> -->
    <script src="{__PLUG_PATH}iview/dist/iview.min.js"></script>
<!--     <script src="{__PLUG_PATH}jquery/jquery.min.js"></script>
    <script src="{__PLUG_PATH}form-create/province_city.js"></script> -->
    <script src="{__PLUG_PATH}form-create/form-create.min.js"></script>
<!--     <link href="{__PLUG_PATH}layui/css/layui.css" rel="stylesheet">
    <script src="{__PLUG_PATH}layui/layui.all.js"></script> -->
   	{/if}
	<title>系统设置</title>
	<div class="h-100 w-100 setting-deal" id="app">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 mt-80 mb-10 tip  text-666 size-14">
			<a class="text-57">首页 /</a> <span class="text-c01f5e">系统设置 </span>
		</div>
		<div style="height: 34px;" class="w-1200">
			<div class="w-100 h-100 d-flex align-items-center justify-content-start tab relative">
			{volist name="config_tab" id="vo"}
				{if condition="$vo['value'] eq $tab_id"}
				<div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative tab-item-active"><a href="{:Url('index',array('tab_id'=>$vo['value'],'type'=>$vo['type']))}">{$vo.label}</a></div>
	            {else/}
	            <div class="h-100 w-100px text-center ellipsis-1 cursor tab-item relative"><a href="{:Url('index',array('tab_id'=>$vo['value'],'type'=>$vo['type']))}">{$vo.label}</a></div>
	            {/if}
            {/volist}
			</div>
		</div>
		<!--搜索区-->
		<div class="w-1200 relative" style="border: 1px solid #d9d9d9;z-index: 1">
			<!--列表-->
			<div class="w-100 label-list bg-fff">
				<form class="layui-form" action="{:url('save_basics',array('tab_id'=>$tab_id))}" method="post">
					<div class="h-100 pt-20 ">
						<div class="items w-100 ">
							{if condition="$tab_id eq 22"}
							<div class="w-100">
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<input type="checkbox" lay-filter="test1" value="1" {if condition="$list[1]['is_use'] eq 1"} checked="checked"{/if} lay-skin="primary" name="is_pack"> <span>用户订单结算时，计算包材的价格</span>
								</div>
								<div class="ml-30 mt-10 orderitem bg-f4" style="width: 890px;  height: 288px;  border: solid 1px #d9d9d9;">
									<div class="pl-20 mt-10 text-27 fw size-14">包材设置</div>
									<div class="item pl-20  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
										<div>
											<div class=" size-14 item-text">单剂包装成本</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input   type="text" value="{$list.1.value|json_decode}" disabled  class="ivu-input w-400px ml0">
											</div>
										</div>
										<div class="ml-50">
											<div class=" size-14 item-text">价格</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="{$list.2.value|json_decode}" disabled class="ivu-input w-400px ml0 orderinp" name="{$list.2.menu_name}">
											</div>
										</div>
									</div>
									<div class="item pl-20  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
										<div>
											<div class=" size-14 item-text">长筒包装成本</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text" value="{$list.3.value|json_decode}" disabled class="ivu-input w-400px ml0">
											</div>
										</div>
										<div class="ml-50">
											<div class=" size-14 item-text">价格</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="{$list.4.value|json_decode}" disabled class="ivu-input w-400px ml0 orderinp" name="{$list.4.menu_name}">
											</div>
										</div>
									</div>
									<div class="item pl-20  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
										<div>
											<div class=" size-14 item-text">外包装成本</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="{$list.5.value|json_decode}" disabled class="ivu-input w-400px ml0">
											</div>
										</div>
										<div class="ml-50">
											<div class=" size-14 item-text">价格</div>
											<div class="w-100 d-flex align-items-center justify-content-start mt-8">
												<input  type="text"  value="{$list.6.value|json_decode}" disabled class="ivu-input w-400px ml0 orderinp" name="{$list.6.menu_name}">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="w-100">
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<input type="checkbox" lay-filter="test2" name="is_fare" value="1" lay-skin="primary"> <span>用户订单结算时，计算运费价格</span>
								</div>
								<div class="ml-30 mt-10 test2bg bg-f4" style="width: 890px;  height: 107px;  border: solid 1px #d9d9d9;">
									<div class="item w-100 d-flex align-items-center justify-content-start  size-14 flex-column">
										<div class="w-100 d-flex align-items-center justify-content-start bg-f4 bb lh30">
											<div class="h-100 w-128 lh30"></div>
											<div class="h-100 w-126 text-center fw lh30">首重(克)</div>
											<div class="h-100 w-126 text-center fw lh30">首费成本(元)</div>
											<div class="h-100 w-126 text-center fw lh30">首重结算价(元)</div>
											<div class="h-100 w-126 text-center fw lh30">续重(克)</div>
											<div class="h-100 w-126 text-center fw lh30">续重成本(元)</div>
											<div class="h-100 w-126 text-center fw lh30">续重结算价(元)</div>
										</div>
										<div class="w-100 lh38 d-flex align-items-center justify-content-start bg-f4 bb text-999">
											<div class="h-100 text-center w-128">成本(不可修改)</div>
											<div class="h-100 text-center w-126">{$list.7.value|json_decode}</div>
											<div class="h-100 text-center w-126">{$list.8.value|json_decode}</div>
											<div class="h-100 text-center w-126">{$list.9.value|json_decode}</div>
											<div class="h-100 text-center w-126">{$list.10.value|json_decode}</div>
											<div class="h-100 text-center w-126">{$list.11.value|json_decode}</div>
											<div class="h-100 text-center w-126">{$list.12.value|json_decode}</div>
										</div>
										<div class="w-100 lh38 d-flex align-items-center justify-content-start ">
											<div class="h-100 text-center w-128 text-57">设置价格</div>
											<div class="h-100 text-center w-126"><input type="{$list.7.input_type}" disabled value="{$list.7.value|json_decode}" class="ivu-input ml0 orderinp2" disabled name="{$list.7.menu_name}"></div>
											<div class="h-100 text-center w-126"><input type="{$list.8.input_type}" disabled value="{$list.8.value|json_decode}" class="ivu-input ml0 orderinp2" name="{$list.8.menu_name}"></div>
											<div class="h-100 text-center w-126"><input type="{$list.9.input_type}" disabled value="{$list.9.value|json_decode}" class="ivu-input ml0 orderinp2" name="{$list.9.menu_name}"></div>
											<div class="h-100 text-center w-126"><input type="{$list.10.input_type}" disabled value="{$list.10.value|json_decode}" class="ivu-input ml0 orderinp2" name="{$list.10.menu_name}"></div>
											<div class="h-100 text-center w-126"><input type="{$list.11.input_type}" disabled value="{$list.11.value|json_decode}" class="ivu-input ml0 orderinp2" name="{$list.11.menu_name}"></div>
											<div class="h-100 text-center w-126"><input type="{$list.12.input_type}" disabled value="{$list.12.value|json_decode}" class="ivu-input ml0 orderinp2" name="{$list.12.menu_name}"></div>
										</div>

									</div>
								</div>
							</div>
							{elseif condition="$tab_id eq 23" /}
								<!-- <div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14 fw">
								支付平台清关填写内容
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10">
									<div>
										<div class=" size-14 item-text">发送海关</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.0.input_type}" placeholder="请输入" value="{$list.0.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.0.menu_name}">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">海关备案号</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.1.input_type}" placeholder="请输入" value="{$list.1.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.1.menu_name}">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">海关备案名</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.2.input_type}" placeholder="请输入" value="{$list.2.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.2.menu_name}">
										</div>
									</div>
								</div> -->
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div class="text-57 size-12 bg-f4 remark" style="width: 680px;">以下内容为清关信息，请将如下信息复制粘贴至支付平台的指定位置。微信支付在清关设置内，支付宝在接口数据传输字段内</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<span class="text-27">发送海关：</span><span class="">{$list.0.value|json_decode}</span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">海关备案号：</span><span class="">{$list.1.value|json_decode}</span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">海关备案名：</span><span class="">{$list.2.value|json_decode}</span>
								</div>

							{elseif condition="$tab_id eq 24" /}
								<!-- <div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">自动收货天数</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.0.input_type}" placeholder="请输入" value="{$list.0.value|json_decode}" class="ivu-input w-400px ml0 " name="{$list.0.menu_name}">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为15天</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">单笔订单金额上限</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.1.input_type}" placeholder="请输入" value="{$list.1.value|json_decode}" class="ivu-input w-400px ml0 " name="{$list.1.menu_name}">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为2500元，根据国家政策，海外购订单，单笔有金额上限限制</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">年度订单金额限制</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.2.input_type}" placeholder="请输入"  value="{$list.2.value|json_decode}" class="ivu-input w-400px ml0 " name="{$list.2.menu_name}">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为26000元</div>
										</div>
									</div>
								</div> -->
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">自动收货天数</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="text" placeholder="请输入" class="ivu-input w-400px ml0" value="{$list.0.value|json_decode}">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为15天</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">单笔订单金额上限</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="text" placeholder="请输入" value="{$list.1.value|json_decode}" class="ivu-input w-400px ml0 ">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为2500元，根据国家政策，海外购订单，单笔有金额上限限制</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">年度订单金额限制</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="text" placeholder="请输入"  value="{$list.2.value|json_decode}" class="ivu-input w-400px ml0 ">
											<div class="text-57 size-12 bg-f4 ml-8 remark" >默认为26000元</div>
										</div>
									</div>
								</div>
							{elseif condition="$tab_id eq 2" /}
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10">
									<div>
										<div class=" size-14 item-text">{$list.0.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.0.type}" placeholder="{$list.0.desc}" value="{$list.0.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.0.menu_name}">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">{$list.1.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.1.type}" placeholder="{$list.1.desc}" value="{$list.1.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.1.menu_name}">
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">{$list.2.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.2.type}" placeholder="{$list.2.desc}" value="{$list.2.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.2.menu_name}">
											<span onclick="updateToken(32,this)">更新</span>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10">
									<div>
										<div class=" size-14 item-text">{$list.3.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.3.type}" placeholder="请输入" value="0" {eq name="$list.3.value|json_decode" value="0"} checked="checked"{/eq} class="ivu-input w-400px ml0" name="{$list.3.menu_name}">明文模式
											<input  type="{$list.3.type}" placeholder="请输入" value="1" class="ivu-input w-400px ml0" name="{$list.3.menu_name}" {eq name="$list.3.value|json_decode" value="1"} checked="checked"{/eq}>兼容模式
											<input  type="{$list.3.type}" placeholder="请输入" value="2" class="ivu-input w-400px ml0" name="{$list.3.menu_name}" {eq name="$list.3.value|json_decode" value="2"} checked="checked"{/eq}>安全模式
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">{$list.4.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.4.type}" placeholder="{$list.4.desc}" value="{$list.4.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.4.menu_name}">
											<span onclick="updateToken(43,this)">更新</span>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">{$list.7.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.7.type}" placeholder="请输入" value="0" class="ivu-input w-400px ml0" name="{$list.7.menu_name}" {eq name="$list.7.value|json_decode" value="0"} checked="checked"{/eq}>服务号
											<input  type="{$list.7.type}" placeholder="请输入" value="1" class="ivu-input w-400px ml0" name="{$list.7.menu_name}" {eq name="$list.7.value|json_decode" value="1"} checked="checked"{/eq}>订阅号
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">{$list.10.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.10.type}" placeholder="{$list.10.desc}" value="{$url}{$list.10.value|json_decode}" class="ivu-input w-400px ml0" readonly>
										</div>
									</div>
								</div>
							{elseif condition="$tab_id eq 4" /}
								<div class="p-m m-t-sm" id="configboay"></div>

							{else /}
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<span class="text-27">平台信息：</span><span class="">{$platform.name}</span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">平台推荐码：</span>
									<input type="text" class="copyval" style="border: none;width: auto;min-width: 100px" id="input" value="{$platform.referral_code}">
									<span class="ml-8 text-c01f5e cursor copy" onclick="copyText()">复制</span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">APPID：</span><span class="">{$platform.appid}</span>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<span class="text-27">APP Secret：</span><span class="">{$platform.secret}</span>
								</div>
							{/if}
							{if condition="$tab_id neq 4"}
							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>
							<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-30 pb-30">
								<button type="submit" class="ivu-btn ivu-btn-primary">保存设置</button>
								<button type="reset" class="ivu-btn ivu-btn-default ml-20">取消</button>
							</div>
							{/if}
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{if condition="$tab_id eq 4"}
<script type="text/javascript">
	 formCreate.formSuccess = function(form,$r){
        <?=$form->getSuccessScript()?>
        $r.btn.loading(false);
    };
	 (function () {
        var create = (function () {
            var getRule = function () {
                var rule = <?=json_encode($form->getRules())?>;
                rule.forEach(function (c) {
                    if ((c.type == 'cascader' || c.type == 'tree') && Object.prototype.toString.call(c.props.data) == '[object String]') {
                        if (c.props.data.indexOf('js.') === 0) {
                            c.props.data = window[c.props.data.replace('js.', '')];
                        }
                    }
                });
                return rule;
            }, vm = new Vue,name = 'formBuilderExec<?= !$form->getId() ? '' : '_'.$form->getId() ?>';
            var _b = false;
            window[name] =  function create(el, callback) {
                if(_b) return ;
                _b = true;
                if (!el) el = document.getElementById('configboay');
                var $f = formCreate.create(getRule(), {
                    el: el,
                    form:<?=json_encode($form->getConfig('form'))?>,
                    row:<?=json_encode($form->getConfig('row'))?>,
                    submitBtn:<?=$form->isSubmitBtn() ? '{}' : 'false'?>,
                    resetBtn:<?=$form->isResetBtn() ? 'true' : '{}'?>,
                    iframeHelper:false,
                    global:{
                        upload: {
                            props:{
                                onExceededSize: function (file) {
                                    vm.$Message.error(file.name + '超出指定大小限制');
                                },
                                onFormatError: function () {
                                    vm.$Message.error(file.name + '格式验证失败');
                                },
                                onError: function (error) {
                                    vm.$Message.error(file.name + '上传失败,(' + error + ')');
                                },
                                onSuccess: function (res, file) {
                                    if (res.code == 200) {
                                    	console.log(file)
                                    	vm.$Message.success(res.msg);
                                        file.url = res.data.filePath;
                                    } else {
                                        vm.$Message.error(res.msg);
                                    }
                                },
                            },
                        },
                    },
                    //表单提交事件
                    onSubmit: function (formData) {
                        $f.btn.loading(true);
                        $.ajax({
                            url: '<?=$form->getAction()?>',
                            type: '<?=$form->getMethod()?>',
                            dataType: 'json',
                            data: formData,
                            success: function (res) {
                                if (res.code == 200) {
                                    vm.$Message.success(res.msg);
                                    $f.btn.loading(false);
                                    //formCreate.formSuccess && formCreate.formSuccess(res, $f, formData);
                                    callback && callback(0, res, $f, formData);
                                    //TODO 表单提交成功!
                                } else {
                                    vm.$Message.error(res.msg || '表单提交失败');
                                    $f.btn.loading(false);
                                    callback && callback(1, res, $f, formData);
                                    //TODO 表单提交失败
                                }
                            },
                            error: function () {
                                vm.$Message.error('表单提交失败');
                                $f.btn.loading(false);
                            }
                        });
                    }
                });
                return $f;
            };
            return window[name];
        }());
        window.$f = create();
    })();
</script>
{/if}
<script type="text/javascript">
	function copyText() {
		var input   = document.getElementById("input");
		input.select(); // 选中文本
		document.execCommand("copy"); // 执行浏览器复制命令
		alert('复制成功');
	}
	layui.use('form', function () {
		var form = layui.form;
		form.on('checkbox(test2)', function (data) {
			var checked = data.elem.checked;
			if (checked != true) {
				$('.test2bg').addClass('bg-f4');
				$('.orderinp2').attr('disabled', true);
			}else {
				$('.test2bg').removeClass('bg-f4');
				$('.orderinp2').attr('disabled',false)
			}
		});
		form.on('checkbox(test1)', function (data) {
			var checked = data.elem.checked;
			if (checked != true) {
				$('.orderinp').attr('disabled', true);
				$('.orderinp').attr('placeholder','');
				$('.orderinp').addClass('bg-f4');
				$('.orderitem').addClass('bg-f4');
			} else {
				$('.orderinp').attr('placeholder','请输入');
				$('.orderinp').attr('disabled',false)
				$('.orderinp').removeClass('bg-f4');
				$('.orderitem').removeClass('bg-f4');
			}
		});
	});
	var length=0;
	function updateToken(length,obj){
		$.ajax({
			type:'post',
			async:true,
			dataType:'json',
			url:"{:url('setting.systemConfig/update_token')}"+'?length='+length,
			success:function(json){
				if(json.code == 200){
					$(obj).prev().val(json.data.token);
				}
			},
			error:function(){

			}
		})
	}

</script>