{include file="public/header"}
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
				<form class="layui-form" action="{:url('save_basics')}" method="post">
					<div class="h-100 pt-20 ">
						<div class="items w-100 ">
							{if condition="$tab_id eq 22"}
							<div class="w-100">

								<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<div>
										<div class="size-14 item-text">{$list.0.info}</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="text" value="{$list.0.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.0.menu_name}" >
										</div>
										<div class="size-12 text-center text-57 mt-8 remark">{$list.0.desc}</div>
									</div>
								</div>
								<input hidden type="text" name="config_tab_id" value="{$tab_id}">

								<!--<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">
									<div>
										<div class=" size-14 item-text">单剂包装成本</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.1.input_type}" value="{$list.1.value|json_decode}" class="ivu-input w-400px ml0" name="{$list.1.menu_name}">
										</div>
									</div>
									<div class="ml-50">
										<div class=" size-14 item-text">平台初始结算价格</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.2.input_type}" value="{$list.2.value|json_decode}" class="ivu-input w-400px ml0 orderinp" name="{$list.2.menu_name}">
										</div>
									</div>
								</div>
								<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<div>
										<div class=" size-14 item-text">长筒包装成本</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.3.input_type}" value="{$list.3.value|json_decode}" class="ivu-input w-400px ml0 orderinp" name="{$list.3.menu_name}">
										</div>
									</div>
									<div class="ml-50">
										<div class=" size-14 item-text">平台初始结算价格</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.4.input_type}" value="{$list.4.value|json_decode}" class="ivu-input w-400px ml0 orderinp" name="{$list.4.menu_name}">
										</div>
									</div>
								</div>
								<div class="item ml-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">
									<div>
										<div class=" size-14 item-text">外包装成本</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.5.input_type}" value="{$list.5.value|json_decode}" class="ivu-input w-400px ml0 orderinp" name="{$list.5.menu_name}">
										</div>
									</div>
									<div class="ml-50">
										<div class=" size-14 item-text">平台初始结算价格</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input type="{$list.6.input_type}" value="{$list.6.value|json_decode}" class="ivu-input w-400px ml0 orderinp" name="{$list.6.menu_name}">
										</div>
									</div>
								</div>-->

								<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>

								<div class="w-100 mb-20  ml-30 item">
									<div class="w-100 fw">{$list.1.info}</div>
									<div class="w-100 d-flex mt-10">
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="RMB" class="ivu-input ivu-input-default ivu-input-with-prefix" name="{$list.1.menu_name}" value="{$list.1.value|json_decode}">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-yen" style="font-size: 14px;color: #272727"></i></span>
										</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="USD" class="ivu-input ivu-input-default ivu-input-with-prefix" name="{$list.2.menu_name}" value="{$list.2.value|json_decode}">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-usd" style="font-size: 14px;color: #272727"></i></span>
										</div>
									</div>
									<div class="size-12 w-100 mt-10" style="color: #f5222d">*人民币价格必填</div>
								</div>

								<div class="w-100 mb-20  ml-30 item">
									<div class="w-100 fw">包装人工费/盒</div>
									<div class="w-100 d-flex mt-10">
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="RMB" class="ivu-input ivu-input-default ivu-input-with-prefix" name="{$list.3.menu_name}" value="{$list.3.value|json_decode}">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-yen" style="font-size: 14px;color: #272727"></i></span>
										</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
											<input autocomplete="off" spellcheck="false" type="text" placeholder="USD" class="ivu-input ivu-input-default ivu-input-with-prefix" name="{$list.4.menu_name}" value="{$list.4.value|json_decode}">
											<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-usd" style="font-size: 14px;color: #272727"></i></span>
										</div>
									</div>
									<div class="size-12 w-100 mt-10" style="color: #f5222d">*人民币价格必填</div>
								</div>

								<div class="w-100 mb-20 ml-30 item">
									<div class="w-100 fw">{$list.5.info}</div>
									<div class="w-100 d-flex mt-10">
										<div class="w-190px d-flex align-items-center justify-content-between text-57 pr-10">
											<input type="text" value="{$list.5.value|json_decode}" name="{$list.5.menu_name}" placeholder="请输入数字" class="ivu-input w-150px ivu-input-default">%
											<!--<input type="{$list.5.input_type}" value="{$list.5.value|json_decode}" name="{$list.5.menu_name}" placeholder="请输入数字" class="ivu-input w-150px ivu-input-default">%-->
										</div>
									</div>
								</div>

								<div class="w-100 mb-20 pl-30 pr-30 item">

									<div class="w-100 table">
										<table class="ivu-table  ivu-table-default">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header cursor">
												<th class="bg-f6 w-190px"></th>
												<th class="bg-f6 w-190px">成本(￥)</th>
												<th class="bg-f6 w-190px">成本($)</th>
												<th class="bg-f6 w-190px">平台结算价(￥)</th>
												<th class="bg-f6 w-190px">平台结算价($)</th>
												<!--<th class="bg-f6 w-190px">重量(克)</th>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">铝杯+封口膜</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.6.menu_name}" value="{$list.6.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.7.menu_name}" value="{$list.7.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.8.menu_name}" value="{$list.8.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.9.menu_name}" value="{$list.9.value|json_decode}"></td>
												<!--<td class="ckitem text-57"><input type = "text" class="ivu-input w-100 text-center" placeholder="请输入"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">纸筒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.10.menu_name}" value="{$list.10.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.11.menu_name}" value="{$list.11.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.12.menu_name}" value="{$list.12.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.13.menu_name}" value="{$list.13.value|json_decode}"></td>
												<!--<td class="ckitem text-57"><input type = "{$list.9.input_type}" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.9.menu_name}" value="{$list.9.value|json_decode}"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">彩盒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.14.menu_name}" value="{$list.14.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.15.menu_name}" value="{$list.15.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.16.menu_name}" value="{$list.16.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.17.menu_name}" value="{$list.17.value|json_decode}"></td>
												<!--<td class="ckitem text-57"><input type = "{$list.9.input_type}" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.9.menu_name}" value="{$list.9.value|json_decode}"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">包装运输箱/盒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.18.menu_name}" value="{$list.18.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.19.menu_name}" value="{$list.19.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.20.menu_name}" value="{$list.20.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.21.menu_name}" value="{$list.21.value|json_decode}"></td>
												<!--<td class="ckitem text-57"><input type = "{$list.9.input_type}" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.9.menu_name}" value="{$list.9.value|json_decode}"></td>-->
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">Brochure/盒</td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.22.menu_name}" value="{$list.22.value|json_decode}" ></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.23.menu_name}" value="{$list.23.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.24.menu_name}" value="{$list.24.value|json_decode}"></td>
												<td class="ckitem text-57"><input type="text" class="ivu-input w-100 text-center" placeholder="请输入" name="{$list.25.menu_name}" value="{$list.25.value|json_decode}"></td>
												<!--<td class="ckitem text-57"><input type = "text" class="ivu-input w-100 text-center" placeholder="请输入"></td>-->
											</tr>
											</tbody>
										</table>
									</div>

								</div>

							</div>

							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>

							<div class="w-100 pl-30 pr-30">
								<div class="mt-20 mb-20 fw size-16 text-c01f5e">运费设置</div>
								<div class="w-100 table">
									<table class="ivu-table  ivu-table-default">
										<tbody class="ivu-table-tbody">
										<tr class="ivu-table-header cursor">
											<th class="bg-f6 w-190px">首重(克)</th>
											<th class="bg-f6 w-190px">首费成本(￥)</th>
											<th class="bg-f6 w-190px">首费成本($)</th>
											<th class="bg-f6 w-190px">首费结算价(￥)</th>
											<th class="bg-f6 w-190px">首费结算价($)</th>
										</tr>
										<tr class="cursor text-57">
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.26.menu_name}" value="{$list.26.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.27.menu_name}" value="{$list.27.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.28.menu_name}" value="{$list.28.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.29.menu_name}" value="{$list.29.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.30.menu_name}" value="{$list.30.value|json_decode}"></td>
										</tr>
										<tr class="ivu-table-header cursor">
											<th class="bg-f6 w-190px">续重(克)</th>
											<th class="bg-f6 w-190px">续重成本(￥)</th>
											<th class="bg-f6 w-190px">续重成本($)</th>
											<th class="bg-f6 w-190px">续重结算价(￥)</th>
											<th class="bg-f6 w-190px">续重结算价($)</th>
										</tr>
										<tr class="cursor text-57">
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.31.menu_name}" value="{$list.31.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.32.menu_name}" value="{$list.32.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.33.menu_name}" value="{$list.33.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.34.menu_name}" value="{$list.34.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.35.menu_name}" value="{$list.35.value|json_decode}"></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>


							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>
							<div class="w-100 pl-30 pr-30">
								<div class="mt-20 mb-20 fw size-16 text-c01f5e">物流方式及价格</div>
								<div class="w-100 d-flex mt-10 justify-content-between align-items-start">
									<div class="border table" style="width: 750px;border: solid 1px #d9d9d9;">
										<table class="ivu-table  ivu-table-default w-100">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header cursor">
												<th class="bg-f6 w-100px"></th>
												<th class="bg-f6 w-100px">B-C(￥)</th>
												<th class="bg-f6 w-100px">B-C($)</th>
												<th class="bg-f6 w-100px">Air(￥)</th>
												<th class="bg-f6 w-100px">Air($)</th>
												<th class="bg-f6 w-100px">Sea(￥)</th>
												<th class="bg-f6 w-100px">Sea($)</th>
												<th class="bg-f6 w-100px">B-HK-C(￥)</th>
												<th class="bg-f6 w-100px">B-HK-C($)</th>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">1kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[bc_rmb]" value="{$logisgics.0.bc_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[bc_usd]" value="{$logisgics.0.bc_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[air_rmb]" value="{$logisgics.0.air_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[air_usd]" value="{$logisgics.0.air_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[sea_rmb]" value="{$logisgics.0.sea_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[sea_usd]" value="{$logisgics.0.sea_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[bhkc_rmb]" value="{$logisgics.0.bhkc_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[bhkc_usd]" value="{$logisgics.0.bhkc_usd}"></td>
											</tr>

											<tr class="cursor text-57">
												<td class="ckitem text-57">2kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[bc_rmb]" value="{$logisgics.1.bc_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[bc_usd]" value="{$logisgics.1.bc_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[air_rmb]" value="{$logisgics.1.air_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[air_usd]" value="{$logisgics.1.air_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[sea_rmb]" value="{$logisgics.1.sea_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[sea_usd]" value="{$logisgics.1.sea_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[bhkc_rmb]" value="{$logisgics.1.bhkc_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[bhkc_usd]" value="{$logisgics.1.bhkc_usd}"></td>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">3kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[bc_rmb]" value="{$logisgics.2.bc_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[bc_usd]" value="{$logisgics.2.bc_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[air_rmb]" value="{$logisgics.2.air_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[air_usd]" value="{$logisgics.2.air_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[sea_rmb]" value="{$logisgics.2.sea_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[sea_usd]" value="{$logisgics.2.sea_usd}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[bhkc_rmb]" value="{$logisgics.2.bhkc_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[bhkc_usd]" value="{$logisgics.2.bhkc_usd}"></td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="w-300px border table" style="border: solid 1px #d9d9d9;">
										<table class="ivu-table  ivu-table-default w-100">
											<tbody class="ivu-table-tbody">
											<tr class="ivu-table-header cursor">
												<th class="bg-f6 w-150px">国外当地物流</th>
												<th class="bg-f6 w-150px">价格(￥)</th>
												<th class="bg-f6 w-150px">价格($)</th>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">1kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[local_logistics_abroad_rmb]" value="{$logisgics.0.local_logistics_abroad_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.0.weight}[local_logistics_abroad_usd]" value="{$logisgics.0.local_logistics_abroad_usd}"></td>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">2kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[local_logistics_abroad_rmb]" value="{$logisgics.1.local_logistics_abroad_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.1.weight}[local_logistics_abroad_usd]" value="{$logisgics.1.local_logistics_abroad_usd}"></td>
											</tr>
											<tr class="cursor text-57">
												<td class="ckitem text-57">3kg</td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[local_logistics_abroad_rmb]" value="{$logisgics.2.local_logistics_abroad_rmb}"></td>
												<td class="ckitem text-57"><input type = "text" min="0" class="ivu-input w-100 text-center" placeholder="请输入" name="{$logisgics.2.weight}[local_logistics_abroad_usd]" value="{$logisgics.2.local_logistics_abroad_usd}"></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>

							<div class="w-100 pl-30 pr-30">
								<div class="mt-20 mb-20 fw size-16 text-c01f5e">包材重量</div>
								<div class="w-100 table">
									<table class="ivu-table  ivu-table-default">
										<tbody class="ivu-table-tbody">
										<tr class="ivu-table-header cursor">
											<th class="bg-f6 w-190px"></th>
											<th class="bg-f6 w-190px">铝杯+封口膜</th>
											<th class="bg-f6 w-190px">纸筒</th>
											<th class="bg-f6 w-190px">彩盒</th>
											<th class="bg-f6 w-190px">包装运输箱/盒</th>
											<th class="bg-f6 w-190px">Brochure/盒</th>
										</tr>
										<tr class="cursor text-57">
											<td class = "ckitem text-57">重量(克)</td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.36.menu_name}" value="{$list.36.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.37.menu_name}" value="{$list.37.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.38.menu_name}" value="{$list.38.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.39.menu_name}" value="{$list.39.value|json_decode}"></td>
											<td class = "ckitem text-57"><input type = "text" class = "ivu-input w-100 text-center" placeholder = "请输入" name="{$list.40.menu_name}" value="{$list.40.value|json_decode}"></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>


				<!--			<div class="w-100">
								<div class="ml-30 mt-20 fw text-27 size-14">运费设置</div>
								<div class="ml-30 mt-10 test2bg">
									<div class="item w-100 d-flex align-items-center justify-content-start size-14 flex-column">
										<div class="w-100 d-flex align-items-center justify-content-start bg-f4 bb lh30">
											<div class="h-100 w-100px text-center fw lh30">首重(克)</div>
											<div class="h-100 w-100px text-center fw lh30">首费成本(元)</div>
											<div class="h-100 w-100px text-center fw lh30">首重结算价(元)</div>
											<div class="h-100 w-100px text-center fw lh30">续重(克)</div>
											<div class="h-100 w-100px text-center fw lh30">续重成本(元)</div>
											<div class="h-100 w-100px text-center fw lh30">续重结算价(元)</div>
										</div>
										<div class="w-100 lh38 d-flex align-items-center justify-content-start">
											<div class="h-100 text-center w-100px"><input type="{$list.7.input_type}" value="{$list.7.value|json_decode}" class="ivu-input  ml0" name="{$list.7.menu_name}"></div>
											<div class="h-100 text-center w-100px"><input type="{$list.8.input_type}" value="{$list.8.value|json_decode}" class="ivu-input  ml0" name="{$list.8.menu_name}"></div>
											<div class="h-100 text-center w-100px"><input type="{$list.9.input_type}" value="{$list.9.value|json_decode}" class="ivu-input  ml0" name="{$list.9.menu_name}"></div>
											<div class="h-100 text-center w-100px"><input type="{$list.10.input_type}" value="{$list.10.value|json_decode}" class="ivu-input  ml0" name="{$list.10.menu_name}"></div>
											<div class="h-100 text-center w-100px"><input type="{$list.11.input_type}" value="{$list.11.value|json_decode}" class="ivu-input  ml0" name="{$list.11.menu_name}"></div>
											<div class="h-100 text-center w-100px"><input type="{$list.12.input_type}" value="{$list.12.value|json_decode}" class="ivu-input  ml0" name="{$list.12.menu_name}"></div>
										</div>
									</div>
								</div>
							</div>-->

							{elseif condition="$tab_id eq 23" /}
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14 fw">
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
								</div>
							{elseif condition="$tab_id eq 24" /}
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">自动收货天数</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.0.input_type}" placeholder="请输入" value="{$list.0.value|json_decode}" class="ivu-input w-400px ml0 " name="{$list.0.menu_name}">
											<div class="text-57 size-12 bg-f4 ml-8 remark w-auto pl-10 pr-10" >订单发货后，用户收货的天数，如果在期间未确认收货，系统自动完成收货，默认为15天</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">单笔订单金额上限</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.1.input_type}" placeholder="请输入" value="{$list.1.value|json_decode}" class="ivu-input w-400px ml0 " name="{$list.1.menu_name}">
											<div class="text-57 size-12 bg-f4 ml-8 remark w-auto pl-10 pr-10" >默认为2500元，根据国家政策，海外购订单，单笔有金额上限限制</div>
										</div>
									</div>
								</div>
								<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20">
									<div>
										<div class=" size-14 item-text">年度订单金额限制</div>
										<div class="w-100 d-flex align-items-center justify-content-start mt-8">
											<input  type="{$list.2.input_type}" placeholder="请输入"  value="{$list.2.value|json_decode}" class="ivu-input w-400px ml0 " name="{$list.2.menu_name}">
											<div class="text-57 size-12 bg-f4 ml-8 remark w-auto pl-10 pr-10" >默认为26000元</div>
										</div>
									</div>
								</div>
							{else /}
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-20 size-14">-->
								<!--	<span class="text-27">平台信息：</span><span class="">XXXXX科技有限公司</span>-->
								<!--</div>-->
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">-->
								<!--	<span class="text-27">平台推荐码：</span>-->
								<!--	<input type="text" class="copyval" style="border: none;width: auto;min-width: 100px" id="input" value="AA44444444444AA">-->
								<!--	<span class="ml-8 text-c01f5e cursor copy" onclick="copyText()">复制</span>-->
								<!--</div>-->
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">-->
								<!--	<span class="text-27">APPID：</span><span class="">XXXXXXXXXXX</span>-->
								<!--</div>-->
								<!--<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-10 size-14">-->
								<!--	<span class="text-27">APP Secret：</span><span class="">XXXXXXXXXXX</span>-->
								<!--</div>-->
							{/if}

							<div class="hr" style="height : 1px;background : #c01f5e;margin: 30px auto;width: 1140px;"></div>
							<div class="item pl-30  w-100 d-flex align-items-center justify-content-start mt-30 pb-30">
								<button type="submit" class="ivu-btn ivu-btn-primary">保存设置</button>
								<button type="reset" class="ivu-btn ivu-btn-default ml-20">取消</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>



	</div>
{include file="public/footer"}
{include file="public/inner_footer"}

<script type="text/javascript">

	function copyText() {
		var input   = document.getElementById("input");
		input.select(); // 选中文本
		document.execCommand("copy"); // 执行浏览器复制命令
	}

</script>
