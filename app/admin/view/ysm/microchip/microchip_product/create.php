{include file="public/header"}
<div id="app" class="wp-edit">
	<!--头部-->
	{include file="public/header_navigate"}
	<!--头部-->
	<div class="w-1200 tip mt-80  text-666 size-14">
		<span>首页 /</span> <a class="text-57" href="index.html">微片 </a> <span class="text-c01f5e">/ 添加微片 </span>
	</div>

	<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
		<span class="fw size-20 text-333">添加微片</span>
	</div>

	<!--列表-->
	<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
		<form class="layui-form" action="{:url('save')}"  method="post">
			<div class="wp-edit-body  h-100 pt-20">
				<div class="size-16 fw text-c01f5e mt-10 ">基础信息</div>
				<div class="items w-100">
					<div class="item w-100 ">
						<div class=" size-14 item-text">分类<span class="text-ff4d4f">*</span></div>
						<div class=" w-100">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-200px">
								<select name="cate_id" class="w-200px" lay-verify="required">
									<option value="">请选择</option>
									{volist name="cate1" id="vo"}
									<option value="{$vo.id}">{$vo.html}{$vo.title}</option>
									{/volist}
								</select>
							</div>
						</div>
					</div>
					<div class="item w-100 ">
						<div class=" size-14 item-text">微片编码<span class="text-ff4d4f">*</span></div>
						<div class=" w-100">
							<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" lay-verify="required" class="ivu-input ml0 classvaild" name="code">
						</div>
					</div>

					<div class="item  w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">微片名称<span class="text-ff4d4f">*</span></div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" lay-verify="required" class="ivu-input ml0 classvaild" name="zn_name">
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Name</div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="en_name">
							</div>
						</div>
					</div>

					<div class="item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">微片学名</div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="scientific_zn_name">
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Scientific name</div>
							<div class="w-100">
								<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="scientific_en_name">
							</div>
						</div>
					</div>

					<div class="item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">微片详细描述</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="microchip_info_zn"></textarea>
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Product description</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="microchip_info_en"></textarea>
							</div>
						</div>
					</div>

					<div class="item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class=" size-14 item-text">副作用</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="effects_zn"></textarea>
							</div>
						</div>
						<div style="margin-left: 50px;">
							<div class=" size-14 item-text">Side effects</div>
							<div class="w-100">
								<textarea style="width: 400px;height: 67px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="effects_en"></textarea>
							</div>
						</div>
					</div>


				</div>
				<div class="hr w-100" style="margin: 30px auto"></div>


				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">基础价格</div>
				
				<div class = "items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div style = "width: 400px;">
							<div class = " size-14 item-text">微片重量</div>
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "w-190px">
									<input type = "text" name="weight" class = "ivu-input w-100 weight" placeholder = "请输入数字">
								</div>
								<div class = "ml-8">mg</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class = "items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div >
							<div class = " size-14 item-text">COG成本价(千粒成本)</div>
							<!--
								成本价（系统自动生成）：显示至小数点后两位。根据下方微片构成中的值进行计算。
								例如，微片构成中，选择了活性成分a，单位为mg，选定批次的每mg人民币单价为2元，美元单价为0.33，每微片中使用剂量为3mg；
								辅料成分b，单位为iu，选定批次的每iu人民币价格为5元，美元单价为0.9，每微片使用剂量为6iu；
								则该处人民币成本为：3*2+6*5=36，显示为36.00；
								美元成本为：3*0.33+6*0.9=6.39，显示为6.39
							-->
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">
										<!--<span v-show="!cogeditshow">-->
										<!--	<span>￥</span>-->
										<!--	<span class = "cogtotalrmbprice">0</span>-->
										<!--</span>-->
										<!--<span v-show="cogeditshow">-->
										<!--	 <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">-->
										<!--        <input autocomplete = "off"  spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input ivu-input-default ivu-input-with-prefix cogtotalrmbpriceinput" name="cost_rmb">-->
										<!--        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>-->
										<!--    </div>-->
										<!--</span>-->
									<span>
										 <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">
									        <input autocomplete = "off"  spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input ivu-input-default ivu-input-with-prefix cogtotalrmbpriceinput" name="cost_rmb">
									        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>
									    </div>
									</span>
								</div>
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text text-27 w-150px">
									<!--<span v-show="!cogeditshow">-->
									<!--	<span>$</span>-->
									<!--	<span class = "cogtotalusdprice">0</span>-->
									<!--</span>-->
									<!--<span v-show="cogeditshow">-->
									<!--	 <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">-->
									<!--        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix cogtotalusdpriceinput" name="cost_usd">-->
									<!--        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>-->
									<!--	 </div>-->
									<!--</span>-->
									
									<span>
										 <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">
									        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix cogtotalusdpriceinput" name="cost_usd">
									        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>
										 </div>
									</span>
									
									
								</div>
								<label class="ivu-btn ivu-btn-default d-flex align-items-center justify-content-center mr-20 ml-20 coginput-btn" >成分成本价计算</label >
								<input id="coginput" name="coginput" class="hide" type="radio" lay-ignore value="1" >
								<!--<label  @click="cogedit()" for="coginput"   class = "ml-10 text-c01f5e cursor">编辑</label>-->
							</div>
						</div>
					</div>
				</div>
				
				<div class = "items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div >
							<div class = " size-14 item-text">Pricing成本价(千粒成本)</div>
							<!--增加【Pricing成本价】，计算逻辑为：（COG成本价+（A*微片重量mg）/1000）*（1+B），A为微片加工费，B为关税（A和B均在系统设置-交易设置中获取）。可以手动修改。-->
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-150px">
									<!--<span v-show="!pricingshow">-->
									<!--	<span>￥</span>-->
									<!--	<span class = "pricingpricermb">0</span>-->
									<!--</span>-->
									<!--<span v-show="pricingshow">-->
	                                <!--        <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">-->
		                            <!--            <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix pricingpricermbinput"  name="pricing_rmb">-->
		                            <!--            <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>-->
									<!--		 </div>										-->
									<!--</span>-->
									<span>
								        <div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px" >
								            <input autocomplete="off" spellcheck="false" type="text" placeholder="USD" class="ivu-input ivu-input-default ivu-input-with-prefix pricingpricermbinput" name="pricing_rmb" >
								            <span class="ivu-input-prefix" ><i class="ivu-icon ivu-icon-logo-yen" style="color: #272727;font-size: 14px;" ></i ></span >
										 </div >
									</span >
								</div>
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text text-27 w-150px">
										<!--<span v-show="!pricingshow">-->
										<!--	<span>$</span>-->
										<!--	<span class="pricingpriceusd" >0</span >-->
										<!--</span>-->
										<!--<span v-show="pricingshow" >-->
										<!--     <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">-->
										<!--        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix pricingpriceusdinput" name="pricing_usd">-->
										<!--        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>-->
										<!--	 </div>										-->
										<!--</span>-->
									<span>
									     <div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-150px">
									        <input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix pricingpriceusdinput" name="pricing_usd">
									        <span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>
										 </div>
									</span>
								</div>
								<label class="ivu-btn ivu-btn-default d-flex align-items-center justify-content-center ml-20 mr-20 pricinginput-btn"  >COG成本价计算</label >
								<input id="pricinginput" name="pricinginput" class="hide" type="radio" lay-ignore value="1"   >
								<!--<label for="pricinginput" @click="pricingedit()"   class = "ml-10 text-c01f5e cursor">编辑</label>-->
							</div>
						</div>
					</div>
				</div>
				
				<div class="items w-100">
					<div class = "item w-100 d-flex align-items-center justify-content-start  ">
						<div>
							<div class = " size-14 item-text">基础售价</div>
							<div class = "w-100 d-flex align-items-center justify-content-start">
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
									<input lay-verify="required" autocomplete = "off" spellcheck = "false" type = "text" placeholder = "RMB" class = "ivu-input classvaild ivu-input-default ivu-input-with-prefix" name="price">
									<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-yen" style = "color: #272727;font-size: 14px;"></i></span>
								</div>
								<div class = "ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
									<input autocomplete = "off" spellcheck = "false" type = "text" placeholder = "USD" class = "ivu-input ivu-input-default ivu-input-with-prefix" name="usd">
									<span class = "ivu-input-prefix"><i class = "ivu-icon ivu-icon-logo-usd" style = "color: #272727;font-size: 14px;"></i></span>
								</div>
							</div>
							<div><span class = "text-ff4d4f size-12">*人民币价格必填</span></div>
						</div>
					</div>
				</div>
				
				


				<div class="hr w-100 mt20"></div>
				<div class="size-16 fw text-c01f5e ">微片构成</div>
				<div class="items w-100">
					<div class="w-100 mt-20 fw">活性成分</div>
					<div class="w-100 mt-10 d-flex align-items-center justify-content-around" style="height: 40px;background: #f6f6f6">
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分名称 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分编码 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">剂量<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">单位<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-20 w-150px">操作</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-start flex-column  hxcflist">
						<div class="w-100 mt-10 hxcflistitems">
							<div class="hxcfitem w-100 d-flex align-items-center justify-content-around hide">
								<div class="w-200px d-flex align-items-center justify-content-start  border">
									<input type="hidden">
									成分
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start border">
									<input type="hidden">
									编码
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start border">
									<input type="hidden">
									剂量
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start border">
									<input type="hidden">
									单位
								</div>
								<div class="d-flex align-items-center justify-content-start " style="width: 150px;">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>
								</div>
							</div>
						</div>
						<div class="w-100 mt-10 d-flex align-items-center justify-content-around hxcfitem" style="height: 40px;">
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px cfname" lay-filter="test3"  lay-search="">
									<option selected="" value="">点此选择成分</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									{volist name="huo_micro" id="h"}
									<option data-rmbprice="{$h.price_rmb}" data-usdprice="{$h.price_usd}" value="{$h.id}">{$h.zn_name}</option>
									{/volist}
								</select>
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px cfcode" lay-filter="test4"  lay-search="">
									<option selected="" value="">点此选择编码</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									{volist name="huo_micro" id="h"}
									<option data-rmbprice="{$h.price_rmb}" data-usdprice="{$h.price_usd}" value="{$h.id}">{$h.code}</option>
									{/volist}
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-center ml-10 mr-10" style="width: 200px;">
								<input type="text" oninput = "value=value.replace(/[^\d.]/g,'')" class="ivu-input" placeholder="请输入">
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-200px ml-10 mr-10">
								<select class="w-200px" >
									<option value="">请选择</option>
									<option value="mg">mg</option>
									<option value="iu">iu</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">
								<i class="icon iconfont iconicon-test cursor  add-hxcf" style="color: #1fc054"></i>
							</div>
						</div>


					</div>
					<div class="w-100 hide d-flex align-items-center justify-content-center mt-10 cursor addhxcf" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
						<i class="icon iconfont iconicon-test"></i> 添加更多活性成分
					</div>
				</div>

				<div class="items w-100">
					<div class="w-100 mt-20 fw">辅料</div>
					<div class="w-100 mt-10 d-flex align-items-center justify-content-around" style="height: 40px;background: #f6f6f6">
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分名称 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">成分编码 <span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">剂量<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-10 mr-10 w-200px">单位<span class="text-ff4d4f">*</span></div>
						<div class=" d-flex align-items-center justify-content-start ml-20 w-150px">操作</div>
					</div>
					<div class="w-100 d-flex align-items-center justify-content-start flex-column  fllist">

						<div class="w-100 mt-10 fllistitems">
							<div class="hxcfitem w-100 d-flex align-items-center justify-content-around hide">
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									成分
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									编码
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									剂量
								</div>
								<div class="w-200px d-flex align-items-center justify-content-start ml-20 border">
									<input type="hidden">
									单位
								</div>
								<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">
									<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>
								</div>
							</div>
						</div>


						<div class="w-100 mt-10 d-flex align-items-center justify-content-around flitem" style="height: 40px;">
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px flname" lay-filter="test1"  lay-search="">
									<option value="">点此选择成分</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									{volist name="fu_micro" id="f"}
									<option data-rmbprice="{$f.price_rmb}" data-usdprice="{$f.price_usd}" value="{$f.id}">{$f.zn_name}</option>
									{/volist}
								</select>
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative ml-10 mr-10 w-200px">
								<select class="w-200px flcode" lay-filter="test2"  lay-search="">
									<option  value="">点此选择编码</option>
									<!--data-rmbprice="1" 代表该批次的人民币价格 data-usdprice="0.7" 代表该批次的美元价格 -->
									{volist name="fu_micro" id="f"}
									<option data-rmbprice="{$f.price_rmb}" data-usdprice="{$f.price_usd}" value="{$f.id}">{$f.code}</option>
									{/volist}

								</select>
							</div>
							<div class="d-flex align-items-center justify-content-center ml-10 mr-10" style="width: 200px;">
								<input type="text" oninput = " value=value.replace(/[^\d.]/g,'')" class="ivu-input" placeholder="请输入">
							</div>
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-200px ml-10 mr-10">
								<select class="w-200px" >
									<option value="">请选择</option>
									<option value="mg">mg</option>
									<option value="iu">iu</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
							<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">
								<i class="icon iconfont iconicon-test cursor  add-fl" style="color: #1fc054"></i>
							</div>
						</div>


					</div>
					<div class="w-100 hide d-flex align-items-center justify-content-center mt-10 cursor addfl" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
						<i class="icon iconfont iconicon-test"></i> 添加更多辅料
					</div>
				</div>

				<div class="hr w-100" style=""></div>

				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">剂量显示</div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">计量单位<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
								<select name="unit" lay-verify="required">
									<option value="">请选择</option>
									<option value="iu">iu</option>
									<option value="mg">mg</option>
									<option value="ml">ml</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">单日建议最大摄入量</div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" lay-verify="number" placeholder="请输入数字" class="ivu-input ml0" name="day_max">
						</div>
					</div>
				</div>

				<div class="item mt-20 w-100 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">剂量范围<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8 d-flex align-items-center justify-content-center">
							<input type="text" placeholder="请输入最小值" class="ivu-input mr-20 w-190px classvaild" lay-verify="required" name="dose_min">
							<input type="text" placeholder="请输入最大值" class="ivu-input w-190px classvaild" lay-verify="required" name="dose_max">
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">剂量显示/单次增量<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" placeholder="请输入数字" lay-verify="required" class="ivu-input ml0" name="dose">
						</div>
					</div>
				</div>
				<!--<div class="item mt-20 w-100 text-ff4d4f size-12">-->
				<!--	*注：此处涉及到配方时的逻辑，如确定了单次增量及剂量范围后，用户进行增减时受到相应限制-->
				<!--</div>-->

				<div class="hr w-100 "></div>
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">标签选择</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">适应症<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
								<i-select v-model="model18" filterable multiple allow-create name="cate2[]">

									<i-option v-for="(item,key) in cate2" :key="key" :value="item.value">{{ item.label }}</i-option>

								</i-select>
								<!--<select name="city" class="w-200px" lay-verify="required">-->
								<!--	<option value="">请选择</option>-->
								<!--	<option value="0">分类</option>-->
								<!--</select>-->
							</div>
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">其他标签</div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
								<i-select v-model="model19" filterable multiple allow-create name="cate3[]">
									<i-option v-for="item in cate3" :value="item.value">{{ item.label }}</i-option>
								</i-select>
								<!--<select name="city" class="w-200px" lay-verify="required">-->
								<!--	<option value="">请选择</option>-->
								<!--	<option value="0">其他标签</option>-->
								<!--</select>-->
							</div>
						</div>
					</div>
				</div>

				<div class="hr w-100 "></div>

				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">Supplement Facts 展示</div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div>
						<div class="size-14 item-text">成分名展示<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" class="ivu-input classvaild" lay-verify="required" placeholder="由中文/英文/数字/符号组成" name="facts_name">
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">%Daily Value<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="text" class="ivu-input classvaild" lay-verify="required" placeholder="请输入数字"  name="facts_daily">
						</div>
					</div>
				</div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<div style="width: 230px;">
						<div class="size-14 item-text">Amout Per Serving<span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<input type="text" class="ivu-input classvaild" lay-verify="required" placeholder="请输入数字"  name="amount">
						</div>
					</div>
					<div style="margin-left: 20px;width: 150px;">
						<div class=" size-14 item-text">单位 <span class="text-ff4d4f">*</span></div>
						<div class="w-100 mt-8">
							<div class="ivu-select  ivu-select-single ivu-select-default relative " style="width: 150px;">
								<select name="facts_unit" class="w-200px" lay-verify="required">
									<option value="">点此选择单位</option>
									<option value="iu">iu</option>
									<option value="mg">mg</option>
									<option value="ml">ml</option>
									<option value="mcg">mcg</option>
								</select>
							</div>
						</div>
					</div>
					<div style="margin-left: 50px;">
						<div class=" size-14 item-text">排序</div>
						<div class="w-100 mt-8">
							<input style="width: 400px;" type="number" class="ivu-input" placeholder="请输入数字"  name="facts_sort">
						</div>
					</div>
				</div>

				<div class="hr w-100 "></div>
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">参考文献 References</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
					<textarea rows="7" style="width: 850px;" placeholder="请输入" class="ivu-input" name="references"></textarea>
				</div>

				<div class="hr w-100 "></div>
				<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">文件上传</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start ">
					<div class="cursor d-flex align-items-center justify-content-center flex-column filesft">
						<input id="image_input" type="text" value="" class="hide" name="image" maxlength="1">
						<!--上传前-->
						<span class="w-100 h-100 cursor hide">
								<label for="male" class="w-100 h-100 d-flex align-items-center justify-content-center flex-column cursor">
									<div><i class="icon iconfont iconicon-test size-24"></i></div>
									<div class="">上传缩略图</div>
								</label>
							</span>
						<!--上传后-->
						<span class="w-100 h-100 imgupdata">
								<span class="relative w-100 h-100 d-flex align-items-center justify-content-center">
									<img class="absolute w-100 image_img"  src="/images/zimg-logo.png" alt="">
									<div class="w-100 h-100 absolute imgupdatadel" style="background: #000;top: 0;left: 0;opacity:0.6"></div>
									<span class="text-center mt-30 imgupdatadel">
										<div class="relative" style="z-index: 3">
										  <label for="male">
											  <div class="ivu-btn ivu-btn-default ivu-btn-small" id="male">上传缩略图</div>
										  </label>
										</div>
										<span class="text-fff relative text-center pt-10 w-100  cursor imgdelete">删除</span>
									</span>
								</span>
							</span>

					</div>
					<div class="ml-20">仅限格式为 jpg、jepg、png的图片上传，仅限一张</div>
				</div>
				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start flex-column">
					<div class="w-100 d-flex align-items-center justify-content-start">
						<label class="ivu-btn ivu-btn-default d-flex align-items-center justify-content-center">
							<i class="icon iconfont iconicon-test"></i>
							上传文件
							<input type="file" class="hide upfile" multiple>
						</label>
						<div class="ml-20"> 格式不限，数量不限、大小不限</div>
					</div>

					<div class="mt-8 w-100 basic-updata-items" style="">

					</div>
				</div>


				<div class="hr w-100 "></div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">

					<button class="ivu-btn-primary ivu-btn mr-20" lay-submit type="submit">添加微片</button>
					<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">取消</a>
				</div>
			</div>
		</form>
	</div>


</div>

{include file="public/footer"}
{include file="public/inner_footer"}
<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message  : 'Hello Vue.js!',
			ismodel  : false,
			cf       : '',
			model18  : [],
			model19  : [],
			model20  : [],
			model21  : [],
			model25  : [],
			model26  : [],
			cate2: [
				{volist name="cate2" id="ca2"}
				{
					value: '{$ca2.id}',
					label: '{$ca2.title}',
				},
				{/volist}
			],
			cate3: [
				{volist name="cate3" id="ca3"}
				{
					value: '{$ca3.id}',
					label: '{$ca3.title}',
				},
				{/volist}
			],
			cogeditshow: false,
			pricingshow: false,
		},
		methods: {
			cogedit() {
				this.cogeditshow = !this.cogeditshow;
			},
			pricingedit() {
				this.pricingshow = !this.pricingshow
			},
			changemodel20: function (e) {

				this.cityList5 = [
					{
						value: e + 'New 点此选择编码',
						label: e + 'New Yo点此选择编码rk',
					},
					{
						value: '点此选择编码',
						label: '点此选择编码',
					},
					{
						value: 'Sydney',
						label: 'Sydney',
					},
					{
						value: 'Ottawa',
						label: 'Ottawa',
					},
					{
						value: 'Paris',
						label: 'Paris',
					},
					{
						value: 'Canberra',
						label: 'Canberra',
					},
				];
			},
		},
	});
</script>
{include file="public/layui_page"}
<script>
	
		function toVaild() {
			var isvai = true;
			$('.classvaild').each(function (key) {
				var val = $(this).val();
				var trim = val.trim();
				if (trim == '') {
					isvai = false;
					layer.msg('该项为必须填！');
					$(this).focus();
					return false;
				}
			});
			if(!isvai){
				return false
			}
		}

	layui.use(['form','upload'], function () {
		var form = layui.form;
		var upload=layui.upload;
		form.on('select(test1)', function (data) {
			var value  = data.value;
			var option = $('.flcode').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flcode').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});
		form.on('select(test2)', function (data) {
			var value  = data.value;
			var option = $('.flname').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flname').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});
		form.on('select(test3)', function (data) {

			// $('.cfcode').empty();
			// $('.cfcode').append(
			// 	'<option value=""></option>' +
			// 	'<option value="0">编码</option>' +
			// 	'<option value="1">编码</option>' +
			// 	'<option value="2">编码</option>',
			// );

			var value  = data.value;
			var option = $('.cfcode').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.cfcode').append(apphtml);
			form.render('select');
		});

		form.on('select(test4)', function (data) {
			// console.log(data)
			// $('.cfname').empty();
			// $('.cfname').append(
			// 	'<option value=""></option>' +
			// 	'<option value="0">成分1</option>' +
			// 	'<option value="1">成分1</option>' +
			// 	'<option value="2">成分1</option>',
			// );

			var value  = data.value;
			var option = $('.cfname').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.cfname').append(apphtml);
			form.render('select');
		});
		// form.render(null, 'test1'); //更新 lay-filter="test1" 所在容器内的全部表单状态
		// form.render('select', 'test2'); //更新 lay-filter="test2" 所在容器内的全部 select 状态

	});
	$('.upfile').click(function () {
		$('.upfile').val('');
	});
	$('.upfile').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('file[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        :'{:Url('file_upload')}',
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code ==200){
					for (var i = 0; i < res.data.length; i++) {
						var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
							res.data[i].filename+
							'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
							'<input type="hidden" name="files[]" value="'+res.data[i].path+'">' +
							'</div></div>';
						$('.basic-updata-items').append(html);
					}
					layui.msg(res.msg);
				}else{
					var res = JSON.parse(data);
					layui.msg(res.msg);
				}

			}, error   : function (er) {
				console.log(er);
			},
		});
	});

	//图片类型验证
	function verificationPicFile(file) {
		var fileTypes = [".jpg", ".png",".jpeg"];
		var filePath = file;
		//当括号里面的值为0、空字符、false 、null 、undefined的时候就相当于false
		if(filePath){
			var isNext = false;
			var fileEnd = filePath.substring(filePath.indexOf(".",20));
			for (var i = 0; i < fileTypes.length; i++) {
				if (fileTypes[i] == fileEnd) {
					isNext = true;
					break;
				}
			}
			if (!isNext){
				layList.msg('不接受此文件类型');
				file = "";
				return false;
			}
			return true;
		}else {
			return false;
		}
	}
	//选择图片
	function changeIMG(index,pic){
		if(!verificationPicFile(pic)){
			return false;
		};
		$(".image_img").attr('src',pic);
		// $(".active").css('background-image',"url("+pic+")");
		$('#image_input').attr('value',pic);
	}
	function createFrame(title,src,opt){
		opt === undefined && (opt = {});
		return layer.open({
			type: 2,
			title:title,
			area: [(opt.w || 800)+'px', (opt.h || 550)+'px'],
			fixed: false, //不固定
			maxmin: true,
			moveOut:false,//true  可以拖出窗外  false 只能在窗内拖
			anim:5,//出场动画 isOutAnim bool 关闭动画
			offset:'auto',//['100px','100px'],//'auto',//初始位置  ['100px','100px'] t[ 上 左]
			shade:0,//遮罩
			resize:true,//是否允许拉伸
			content: src,//内容
			move:'.layui-layer-title'
		});
	}

	/**
	 * 上传图片
	 * */
	$('#male').on('click',function (e) {

		// $('.upload').trigger('click');
		createFrame('选择图片','{:Url('widget.images/index')}?fodder=image');
	})
	//   /**
	//    * 上传文件
	//    * */
	//   $('#upload').on('click',function (e) {
	//   	console.log(e)
	// fileUpload('upload');

	//   })
	/*删除上传图片*/
	$('.imgdelete').click(function () {
		$('#male').val('');
	});

	/*删除文件*/
	$(".basic-updata-items").on('click', '.updata-item-del', function () {
		$(this).parent().parent().parent().remove();
	});

	/* 添加活性成分*/
	$('.add-hxcf').click(function (e) {
		//价钱
		var rmbprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('rmbprice');
		var usdprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('usdprice');

		//成分
		var cf     = $(this).parent().prev().prev().prev().prev().children('select').val();
		var cftext = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").text();
		if (cf == '') {
			alert('成分为空');
			return false;
		}
		//编码
		var bm     = $(this).parent().prev().prev().prev().children('select').val();
		var bmtext = $(this).parent().prev().prev().prev().children('select').find("option:selected").text();
		if (bm == '') {
			alert('成分为空');
			return false;
		}
		// 剂量
		var jl = $(this).parent().prev().prev().children('input').val();
		if (jl == '') {
			alert('剂量为空');
			return false;
		}
		//单位
		var mg     = $(this).parent().prev().children('select').val();
		var mgtext = $(this).parent().prev().children('select').find("option:selected").text();
		if (mg == '') {
			alert('单位为空');
			return false;
		}
		var html = '<div class="hxcfitem w-100 d-flex align-items-center justify-content-around" style="height: 40px;">' +
			'<span class="hide cfsingledata" data-name='+cftext+' data-code='+bmtext+' data-dose='+jl+' data-unit='+mg+' data-rmbprice='+rmbprice+' data-usdprice='+usdprice+'></span>'+
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cftext + '"  name="ingre1['+cf+'][name]" type="hidden">' + cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bmtext + '" name="ingre1['+cf+'][code]" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" name="ingre1['+cf+'][dose]" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" name="ingre1['+cf+'][unit]" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>' +
			'</div>' +
			'</div>';
		$('.hxcflistitems').append(html);
		total();
		pricing();
	});
	/* 点击删除活性成分*/
	$(".hxcflist").on('click', '.rmhxcfitem', function () {
		$(this).parent().parent().remove();
		total();
		pricing();
	});


	/*添加辅料*/
	$('.add-fl').click(function (e) {
		//价钱
		var rmbprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('rmbprice');
		var usdprice = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").data('usdprice');

		//成分
		var cf     = $(this).parent().prev().prev().prev().prev().children('select').val();
		var cftext = $(this).parent().prev().prev().prev().prev().children('select').find("option:selected").text();
		if (cf == '') {
			alert('成分为空');
			return false;
		}
		//编码
		var bm     = $(this).parent().prev().prev().prev().children('select').val();
		var bmtext = $(this).parent().prev().prev().prev().children('select').find("option:selected").text();
		if (bm == '') {
			alert('成分为空');
			return false;
		}
		// 剂量
		var jl = $(this).parent().prev().prev().children('input').val();
		if (jl == '') {
			alert('剂量为空');
			return false;
		}
		//单位
		var mg     = $(this).parent().prev().children('select').val();
		var mgtext = $(this).parent().prev().children('select').find("option:selected").text();
		if (mg == '') {
			alert('单位为空');
			return false;
		}

		var html = '<div class="hxcfitem w-100 d-flex align-items-center justify-content-around" style="height: 40px;">' +
			'<span class="hide flsingledata" data-name='+cftext+' data-code='+bmtext+' data-dose='+jl+' data-unit='+mg+' data-rmbprice='+rmbprice+' data-usdprice='+usdprice+'></span>'+
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cftext + '" name="ingre2['+cf+'][name]" type="hidden">' +
			cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bmtext + '" name="ingre2['+cf+'][code]" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" name="ingre2['+cf+'][dose]" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" name="ingre2['+cf+'][unit]" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmflitem"></i>' +
			'</div>' +
			'</div>';
		$('.fllistitems').append(html);
		total();
		pricing();
	});
	/* 点击删除辅料*/
	$(".fllistitems").on('click', '.rmflitem', function () {
		$(this).parent().parent().remove();
		total();
		pricing();
	});
	//点击-成分成本价计算
	$('.coginput-btn').click(function () {
		$('.cogtotalrmbpriceinput').val('');
		$('.cogtotalusdpriceinput').val('');
		$('#coginput:checked').prop('checked', false);
		total();
		pricing();
	});
	$('.pricinginput-btn').click(function () {
		$('.pricingpricermbinput').val('');
		$('.pricingpriceusdinput').val('');
		$('#pricinginput:checked').prop('checked', false);
		// $('#pricinginput:checked').attr('checked', false);
		pricing();
	});



	//cog 成本价
	function total() {
		//是否已经编辑
		if($('#coginput:checked').val() == 1){
			return false
		}
		var singledataitemsrmbprice = 0;
		var singledataitemusdprice  = 0;
		// data-name='+cftext+' data-code='+bmtext+' data-dose='+jl+' data-unit='+mg+' data-rmbprice='+rmbprice+' data-usdprice='+usdprice+'
		//活性成分
		var cfsingledataitems =$('.cfsingledata');
		for (var i = 0; i < cfsingledataitems.length; i++) {
			singledataitemsrmbprice += parseFloat(cfsingledataitems[i].getAttribute('data-dose')) * parseFloat(cfsingledataitems[i].getAttribute('data-rmbprice'));
			singledataitemusdprice += parseFloat(cfsingledataitems[i].getAttribute('data-dose')) * parseFloat(cfsingledataitems[i].getAttribute('data-usdprice'));
		}
		//辅料成分
		var flsingledataitems = $('.flsingledata');
		for (var i = 0; i < flsingledataitems.length; i++) {
			singledataitemsrmbprice += parseFloat(flsingledataitems[i].getAttribute('data-dose')) * parseFloat(flsingledataitems[i].getAttribute('data-rmbprice'));
			singledataitemusdprice += parseFloat(flsingledataitems[i].getAttribute('data-dose')) * parseFloat(flsingledataitems[i].getAttribute('data-usdprice'));
		}
		singledataitemsrmbprice = singledataitemsrmbprice > 0 ? singledataitemsrmbprice.toFixed(4) : 0;
		singledataitemusdprice = singledataitemusdprice > 0 ? singledataitemusdprice.toFixed(4) : 0;
		$('.cogtotalrmbprice').html(singledataitemsrmbprice);
		$('.cogtotalusdprice').html(singledataitemusdprice);
		
		$('.cogtotalrmbpriceinput').val(singledataitemsrmbprice);
		$('.cogtotalusdpriceinput').val(singledataitemusdprice);
		
	}
	//Pricing 价格计算
	function pricing() {
		if($('#pricinginput:checked').val() == 1){
			return false
		}
		var machiningrmb     = "{$config.microchip_processing_rmb}";//微片加工费-交易设置中获取
		var machiningusd     = "{$config.microchip_processing_usd}";//微片加工费-交易设置中获取
		var tariff           = "{$config.tariff}";//关税
		tariff =tariff >0 ? tariff /100 :0;
		
		var cogtotalrmbprice = parseFloat($('.cogtotalrmbpriceinput').val()) > 0 ? parseFloat($('.cogtotalrmbpriceinput').val()) : 0;
		var cogtotalusdprice = parseFloat($('.cogtotalusdpriceinput').val()) > 0 ? parseFloat($('.cogtotalusdpriceinput').val()) : 0;
		
		// var cogtotalrmbprice = parseFloat($('.cogtotalrmbprice').html()) > 0 ? parseFloat($('.cogtotalrmbprice').html()) : 0;
		// var cogtotalusdprice = parseFloat($('.cogtotalusdprice').html()) > 0 ? parseFloat($('.cogtotalusdprice').html()) : 0;
		var weight           = parseFloat($('.weight').val()) > 0 ? parseFloat($('.weight').val()) : 0;
		
		var pricingpricermb  = ((parseFloat(cogtotalrmbprice) + ((machiningrmb * weight) / 1000))) * (1 + parseFloat(tariff));
		var pricingpriceusd  = ((parseFloat(cogtotalusdprice) + ((machiningusd * weight) / 1000))) * (1 + parseFloat(tariff));
		pricingpricermb =pricingpricermb >0 ? pricingpricermb.toFixed(4) : 0;
		pricingpriceusd =pricingpriceusd >0 ? pricingpriceusd.toFixed(4) : 0;
		$('.pricingpricermb').html(pricingpricermb);
		$('.pricingpriceusd').html(pricingpriceusd);
		
		$('.pricingpricermbinput').val(pricingpricermb);
		$('.pricingpriceusdinput').val(pricingpriceusd);
		
		// （COG成本价+（A*微片重量mg）/1000）*（1+B），A为微片加工费，B为关税（A和B均在系统设置-交易设置中获取）。可以手动修改
	}

	$('.weight').blur(function () {
		pricing();
	})
	
	$('.cogtotalrmbpriceinput').blur(function () {
	
		var singledataitemsrmbprice = $(this).val();
		if(singledataitemsrmbprice > 0){
			$('#coginput').prop('checked', true);
		}
		$('.cogtotalrmbprice').html(singledataitemsrmbprice);
		pricing();
	});
	$('.cogtotalusdpriceinput').blur(function () {
	
		var singledataitemusdprice = $(this).val();
		if(singledataitemusdprice >0 ){
			$('#coginput:checked').attr('checked', true);
			$('#coginput').prop('checked', true);
		}
		$('.cogtotalusdprice').html(singledataitemusdprice);
		pricing();
	});

	$('.pricingpricermbinput').blur(function () {
		var singledataitemsrmbprice = $(this).val();
		if(singledataitemsrmbprice > 0){
			$('#pricinginput').prop('checked', true);
		}
		$('.pricingpricermb').html(singledataitemsrmbprice);
	});
	$('.pricingpriceusdinput').blur(function () {
		var singledataitemusdprice = $(this).val();
		if(parseFloat(singledataitemusdprice) > 0){
			// $('#pricinginput:checked').attr('checked', true);
			$('#pricinginput').prop('checked', true);
		}
		$('.pricingpriceusd').html(singledataitemusdprice);
	});


	total();
	pricing();


</script>
