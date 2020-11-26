{include file="public/header"}
	<title>微片定价</title>
	<div id="app" class="wp-pricing">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-20   text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html">微片 </a> <span class="text-c01f5e">/ 微片定价 </span>
		</div>
		<div class="w-1200 tip mt-20 mb-10  text-666 size-14">
			<span class="fw size-20 text-333">微片定价</span>
		</div>
		<!--列表-->
		<div class="w-1200  wp-edit pb-10" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="{:url('select_platform_microchip',array('id'=>$info.id))}" method="post">
				<div class="wp-edit-body  h-100 pt-20">
					<div class="items w-100 size-16">
						<div class="fw">微片名称：{$info.zn_name}</div>
						<div class="fw">Name：{$info.en_name}</div>
					</div>
					<div class="hr w-100 "></div>
					<div class="size-16 fw text-c01f5e" style="margin-top: 18px;">基础价格</div>
					<div class="items w-100 ">
						<div class="item w-100 d-flex align-items-center justify-content-start  ">
							<div class="w-400px">
								<div class=" size-14 item-text">成本价</div>
								<!--
								根据下方微片构成中的值进行计算。
								例如，微片构成中，选择了活性成分a，单位为mg，选定批次的每mg人民币单价为2元，美元单价为0.33，每微片中使用剂量为3mg；
								辅料成分b，单位为iu，选定批次的每iu人民币价格为5元，美元单价为0.9，每微片使用剂量为6iu；
								则该处人民币成本为：32+65=36，显示为36.00；
								美元成本为：30.33+60.9=6.39，显示为6.39
								-->
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
										<span>￥</span>
										{$info.cost_rmb}
									</div>
									<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text text-27 w-190px">
										<span>$</span>
										{$info.cost_usd}
									</div>
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">基础售价</div>
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
										<input autocomplete="off" spellcheck="false" type="text" placeholder="price" name="price" value="{$info.price}" class="ivu-input ivu-input-default ivu-input-with-prefix">
										<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-yen" style="font-size: 14px;color: #272727"></i></span>
									</div>
									<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text w-190px">
										<input autocomplete="off" spellcheck="false" type="text" placeholder="usd" name="usd" value="{$info.usd}" class="ivu-input ivu-input-default ivu-input-with-prefix">
										<span class="ivu-input-prefix"><i class="ivu-icon ivu-icon-logo-usd" style="font-size: 14px;color: #272727"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="items w-100 ">
						<div class="mt-10 w-100 d-flex align-items-start justify-content-start  ">
							<div class="w-400px">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<!--<div class="size-12 text-center" style="width: 240px;height: 26px;border-radius: 2px;line-height: 26px;  border: solid 1px #d9d9d9;  background-color: #f4f4f4;">-->
									<!--	此处成本价，由成分中的成本价合计而来-->
									<!--</div>-->
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<span class="text-ff4d4f size-12">*人民币价格必填</span>
								</div>
							</div>
						</div>
					</div>
					<div class="hr w-100 "></div>
					<div class="size-16 fw text-c01f5e ">合作平台价格</div>
					<div class="items w-100">
						<div class="w-100 mt-10 d-flex align-items-center justify-content-around" style="height: 40px;background: #f6f6f6">
							<div class=" d-flex align-items-center justify-content-center w-300px">平台名称</div>
							<div class=" d-flex align-items-center justify-content-center w-300px">结算货币类型</div>
							<div class=" d-flex align-items-center justify-content-center w-300px">金额</div>
							<!-- <div class=" d-flex align-items-center justify-content-center w-150px">删除</div> -->
						</div>

						<div class="w-100 d-flex align-items-center justify-content-start flex-column hzptlist">
							{volist name="platform" id="pp" key="k"}
							{if condition="$pp.micro_id"}
							<div class="w-100 mt-10 d-flex align-items-center justify-content-around hxcfitem" style="height: 40px;">
								<div class="ivu-select  ivu-select-single ivu-select-default relative w-300px ">
									<select class="flname">
										<option value="">点此选择平台</option>
										{volist name="platform" id="p"}
										<option value="{$p.id}" {if condition="$pp.micro_id && $p.id eq $pp.id"}selected='selected'{/if}>{$p.p_name}</option>
										{/volist}
									</select>
								</div>
								<div class="ivu-select  ivu-select-single ivu-select-default relative w-300px ml-20">
									<select class="flcode">
										<option value="">点此选择货币类型</option>
										{volist name="platform" id="p"}
										<option value="{$p.id}" {if condition="$pp.micro_id && $p.id eq $pp.id"}selected='selected'{/if}>{$p.currency}</option>
										{/volist}
									</select>
								</div>
								<div class="d-flex align-items-center justify-content-center w-300px ml-20">
										<input type="text" name="pid[{$pp.id}]" class="ivu-input" placeholder="请输入" value="{$pp.sell_price}">
								</div>
								<!-- <div class="d-flex align-items-center justify-content-center rmhzptitem w-150px">
									<i class="icon iconfont iconcha text-c01f5e cursor "></i>
								</div> -->
							</div>
							{/if}
							{/volist}
						</div>


						<!-- <div class="w-100 d-flex align-items-center justify-content-center mt-10 cursor addhzpt" style="height: 32px;  border-radius: 2px;  border: dashed 1px #d9d9d9;">
							<i class="icon iconfont iconicon-test"></i> 增加平台合作价格
						</div> -->
					</div>

					<div class="hr w-100 "></div>

					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">

						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">保存定价</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="button">取消</a>

					</div>
				</div>
			</form>
		</div>
	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<script>
	/* 添加活性成分*/
	$('.addhzpt').click(function () {
		var html = `
			<div class="w-100 mt-10 d-flex align-items-center justify-content-around hxcfitem" style="height: 40px;">
			<div class="ivu-select  ivu-select-single ivu-select-default relative w-300px">
				<select class="flname" name="platform" lay-verify="required" lay-filter="test1" lay-search="">
					<option value="">点此选择平台</option>
							{volist name="platform" id="p"}
							<option value="{$p.id}">{$p.p_name}</option>
							{/volist}
				</select>
			</div>
			<div class="ivu-select  ivu-select-single ivu-select-default relative w-300px ml-20" >
				<select class="flcode" lay-verify="required" lay-filter="test2">
					{volist name="platform" id="p"}
						<option value="{$p.id}">{$p.currency}</option>
					{/volist}
				</select>
			</div>
			<div class="d-flex align-items-center justify-content-center w-300px ml-20" >
				<input type="text" class="ivu-input price" placeholder="请输入">
			</div>
			<div class="d-flex align-items-center justify-content-center rmhzptitem" style="width: 150px;">
				<i class="icon iconfont iconcha text-c01f5e cursor "></i>
			</div>
		</div>`;
		$('.hzptlist').append(html);
		//重新渲染下拉框
		layui.use(['form'], function () {
			var form = layui.form; //表单
			form.render('select'); //更新全部
		});


	});
	layui.use(['form'], function () {
		var form = layui.form;
		form.on('select(test1)', function (data) {
			var value  = data.value;
			var option = $('.flcode').find('option');
			var apphtml='<option value=""></option>'
			for(var i =0;i < option.length;i++){
				if(value === option[i].value){
					option[i].selected = 'selected';
					$(this).parents('.hxcfitem').find('input').attr('name',option[i].value ?' pid['+option[i].value+']' :'');
				}
				apphtml += option[i];
			}
			$('.flcode').append(apphtml);

			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});
		// form.on('select(test2)', function (data) {
		// 	var value  = data.value;
		// 	var option = $('.flname').find('option');
		// 	var apphtml='<option value=""></option>'
		// 	for(var i =0;i < option.length;i++){
		// 		if(value === option[i].value){
		// 			option[i].selected = 'selected';
		// 		}
		// 		apphtml += option[i];
		// 	}
		// 	$('.flname').append(apphtml);
		// 	form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		// });
	});
	/* 点击删除活性成分*/
	$(".hzplist").on('click', '.rmhzptitem', function () {
		$(this).parent().remove();
	});
	/* 点击删除活性成分*/
	$(".hzptlist").on('click', '.rmhzptitem', function () {
		$(this).parent().remove();
	});

	// 点击获取价格
	// $(".hzptlist").on('blur', '.price', function () {
	// 	console.log($(this).val());
	// });


</script>
