{include file="public/header"}
	<title>微片详情</title>

	<div id="app" class="wp-details">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-999 size-14">
			<span>首页 /</span> <a class="text-999" href="index.html"> 微片查看 /</a> <span class="text-c01f5e"> 查看详情 </span>
		</div>

		<div class="w-1200 tip mt-10 mb-10 text-666 size-14">
			<span class="fw size-20 text-333">基本信息</span>
		</div>
		<!--列表-->
		<div class="w-1200 pl-30 pr-30  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">

			<div class="wp-edit-body  h-100 pt-20">

				<div class="size-16 fw text-c01f5e mt-10 ">基础信息</div>

				<div class="items w-100">
					<div class="w-100 mt-20">
						<div class="size-14 item-text">微片分类：{$info.cate1_name}</div>
					</div>

					<div class="w-100 mt-20">
						<div class="size-14 item-text">微片编码：{$info.code}</div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class=" size-14 item-text w-400px">微片名称：{$info.zn_name}</div>
						<div class=" size-14 item-text w-400px ml-50">Name：{$info.en_name}</div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">微片学名：{$info.scientific_zn_name}</div>
						<div class="size-14 item-text w-400px ml-50">Scientific name：{$info.scientific_en_name}</div>
					</div>

					<div class="w-100 mt-20 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">剂量：{$info.dose}{$info.unit}</div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">剂量范围：{$info.dose_min}{$info.unit} — {$info.dose_max}{$info.unit}</div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">适应症标签：<?=implode('、',explode(',',$info['cate2_name']))?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-center justify-content-start">
						<div class="size-14 item-text w-400px">其它标签：<?=implode('、',explode(',',$info['cate3_name']))?></div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column">
							<div>微片详细描述：</div>
							<div class="mt-10">{$info.microchip_info_zn}</div>
						</div>
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column ml-50">
							<div>Product description：</div>
							<div class="mt-10">{$info.microchip_info_en}</div>
						</div>
					</div>

					<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column">
							<div>副作用：</div>
							<div class="mt-10">{$info.effects_zn}</div>
						</div>
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column ml-50">
							<div>Side effects：</div>
							<div class="mt-10">{$info.effects_en}</div>
						</div>
					</div>
				</div>


				<div class="hr w-100" style="margin: 30px auto"></div>



				<div class="items w-100 mt-20">
					<div class="size-16 fw text-c01f5e mt-10 mb-20">参考文献 References</div>
					<div class="w-100">
						{$info.references}
					</div>
				</div>
				<div class="hr w-100" style="margin: 30px auto"></div>
				<div class="items w-100">
					<div class="w-100 size-16 mt-20 fw text-c01f5e">微片构成</div>
					<div class="mt-20 ivu-table-wrapper ivu-table-wrapper-with-border" style="width: 540px;">
						<table class="ivu-table  ivu-table-default ivu-table-border" style="overflow: initial;">
							<tbody class="ivu-table-tbody">
							<tr class="ivu-table-header">
								<th class="bg-f4 w-100px text-center text-27 fw">成分属性</th>
								<th class="bg-f4 pl-20  text-27 fw" style="width: 320px;">成分名称</th>
								<th class="bg-f4 pl-20  text-27 fw" style="width: 120px;">剂量</th>
							</tr>
							{volist name="info.ingredient.0" id="huo"}
							<tr>
								<td class="text-center text-57 ">活性成分</td>
								<td class="text-57 pl-20">{$huo.name}</td>
								<td class="text-57 pl-20">{$huo.dose}{$huo.unit}</td>
							</tr>
							{/volist}
							{volist name="info.ingredient.1" id="fu"}
							<tr>
								<td class="text-center text-57 ">辅料</td>
								<td class="text-57 pl-20">{$fu.name}</td>
								<td class="text-57 pl-20">{$fu.dose}{$fu.unit}</td>
							</tr>
							{/volist}
							</tbody>
						</table>
					</div>
				</div>

				<div class="items w-100">
					<div class="w-100 mt-20">
						<div class="d-flex align-items-start justify-content-start flex-column" style="width: 540px;border: 1px solid #d9d9d9">
							<div class="w-100 bg-f4" style="border-bottom:6px solid #d9d9d9">
								<div class="fw size-20 text-27 ml-10" style="height: 24px;">Supplement Facts</div>
								<div class="text-57 ml-10">Serving Size 1 Package</div>
							</div>
							<div class="w-100 d-flex align-items-center justify-content-start" style="height: 32px;border-bottom: 4px solid #d9d9d9;">
								<div class="pl-10" style="width: 280px;"></div>
								<div style="width: 130px;" class="text-right">Amount Per Serving</div>
								<div style="width: 90px;" class="ml-20 text-right">% Daily Value</div>
							</div>
							<!--内容-->
							<div class="w-100 d-flex align-items-center justify-content-start fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;">
								<div class="pl-10" style="width: 280px;">{$info.facts_name}</div>
								<div style="width: 130px;" class="text-right">{$info.amount}{$info.facts_unit}</div>
								<div style="width: 90px;" class="ml-20 text-right">{$info.facts_daily} %</div>
							</div>
							<!--内容-->
							<div class="w-100 d-flex align-items-center justify-content-start fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;line-height: 28px; border-top: 4px solid #d9d9d9;">
								<span class="pl-10">** Daily Value not established.</span>
							</div>
							<div style="height: 32px;border-bottom: 1px solid #d9d9d9;"></div>
						</div>
						<div>
							<span class="fw">Other ingredients:</span>
							<span class="text-57">other ingredients……</span>
						</div>
					</div>
				</div>
				<div class="hr w-100" style="margin: 30px auto"></div>
				<div class="items w-100">
					<div class="w-100 mt-10 d-flex align-items-start justify-content-start">
						<div class="size-14 item-text w-150px d-flex align-items-start justify-content-start flex-column">
							<div class="text-c01f5e fw size-16">缩略图</div>
							<div class="mt-10">
								<img src="{$info.image}" class="w-100px" height="100" alt="">
							</div>
						</div>
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column ml-50">
							<div class="text-c01f5e fw size-16" style="height: 24px;line-height: 24px;">
								<span class="text-c01f5e fw size-16">支持文件</span>
								<button type="button" class="ivu-btn-default ivu-btn ivu-input-small ml-8"> 全部下载</button>
							</div>
							<div class="mt-10 d-flex align-items-start justify-content-start flex-column">
								{volist name="filename" id="file"}
								<div><span>{$file.filename}</span> <a class="icon iconfont icondaochu ml-8" href="{$file.path}"></a></div>
								{/volist}
							</div>
						</div>
					</div>
				</div>

				<div class="hr w-100" style="margin: 30px auto"></div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
					<a href="index.html" class="ivu-btn-default ivu-btn" type="submit">返回</a>
				</div>
			</div>

		</div>


	</div>
</body>
</html>
{include file="public/footer"}
{include file="public/inner_footer"}
<script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message  : 'Hello Vue.js!',
			ismodel  : false,
			cf       : '',
			model18  : ["valueLondon", "Ottawa", "Paris"],
			model19  : ["Ottawa", "Paris"],
			model20  : [],
			cityList4: [
				{
					value: 'valueNew York',
					label: 'New York',
				},
				{
					value: 'valueLondon',
					label: 'London',
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
			],
			cityList5: [
				{
					value: 'New York',
					label: 'New York',
				},
				{
					value: 'London',
					label: 'London',
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
			],
		},
		methods: {
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
			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});
</script>
<script>

	layui.use(['form'], function () {
		var form = layui.form;
		form.on('select(test1)', function (data) {
			var value   = data.value;
			var option  = $('.flcode').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
					option[i].selected = 'selected';
				}
				apphtml += option[i];
			}
			$('.flcode').append(apphtml);
			form.render('select'); //更新 lay-filter="test2" 所在容器内的全部 select 状态
		});

		form.on('select(test2)', function (data) {
			var value   = data.value;
			var option  = $('.flname').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
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

			var value   = data.value;
			var option  = $('.cfcode').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
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

			var value   = data.value;
			var option  = $('.cfname').find('option');
			var apphtml = '<option value=""></option>';
			for (var i = 0; i < option.length; i++) {
				if (value === option[i].value) {
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
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cf + '" type="hidden">' +
			cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bm + '" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmhxcfitem"></i>' +
			'</div>' +
			'</div>';
		$('.hxcflistitems').append(html);
	});
	/* 点击删除活性成分*/
	$(".hxcflist").on('click', '.rmhxcfitem', function () {
		$(this).parent().parent().remove();
	});

	/*添加辅料*/
	$('.add-fl').click(function (e) {
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
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + cf + '" type="hidden">' +
			cftext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + bm + '" type="hidden">' +
			bmtext +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + jl + '" type="hidden">' +
			jl +
			'</div>' +
			'<div class="w-200px d-flex align-items-center justify-content-start ml-10 mr-10 text-57">' +
			'<input value="' + mg + '" type="hidden">' +
			mgtext +
			'</div>' +
			'<div class="d-flex align-items-center justify-content-start ml-20" style="width: 150px;">' +
			'<i class="icon iconfont iconcha text-c01f5e cursor rmflitem"></i>' +
			'</div>' +
			'</div>';
		$('.fllistitems').append(html);
	});
	/* 点击删除辅料*/
	$(".fllistitems").on('click', '.rmflitem', function () {
		$(this).parent().parent().remove();
	});

</script>
