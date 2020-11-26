{include file="public/header"}
	<title>查看详情</title>

	<div id="app" class="wp-details ml-20 mr-20">

		<div class="w-100 tip mt-14 pl-30 pr-30  text-999 size-14">
			<span>首页 /</span> <a class="text-999" href="index.html"> 微片查看 /</a> <span class="text-0081a7"> 查看详情 </span>
		</div>

		<div class="w-100 pl-30 pr-30 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">查看详情</span>
		</div>
		<!--列表-->
		<div class="w-100 pl-30 pr-30  wp-edit pb-10 mb-30 bg-fff" style="border-radius: 1px;">

			<div class="wp-edit-body  h-100 pt-20">

				<div class="size-16 fw text-0081a7 mt-10 ">基础信息</div>

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
					<div class="size-16 fw text-0081a7 mt-10 mb-20">参考文献 References</div>
					<div class="w-100">
						<div class="w-100 ellipsis-3">{$info.references}</div>

					</div>
				</div>
				<div class="hr w-100" style="margin: 30px auto"></div>



				<div class="items w-100">
					<div class="w-100 size-16 mt-20 fw text-0081a7">微片构成</div>
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
						<!-- 	<div class="w-100 d-flex align-items-center justify-content-start fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;">
								<div class="pl-10" style="width: 280px;">Vitamin D</div>
								<div style="width: 130px;" class="text-right">220 iu</div>
								<div style="width: 90px;" class="ml-20 text-right">55 %</div>
							</div> -->
							<!--内容-->
							<div class="w-100 fw" style="height: 32px;border-bottom: 1px solid #d9d9d9;line-height: 28px; border-top: 4px solid #d9d9d9;">
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
							<div class="text-0081a7 fw size-16">缩略图</div>
							<div class="mt-10">
								<img src="{$info.image}" class="w-100px" height="100" alt="">
							</div>
						</div>
						<div class="size-14 item-text w-400px d-flex align-items-start justify-content-start flex-column ml-50">
							<div class="text-0081a7 fw size-16" style="height: 24px;line-height: 24px;">
								<span class="text-0081a7 fw size-16">支持文件</span>
								<a style="line-height: 24px;" href="下载地址" class="ivu-btn-default ivu-btn ivu-input-small ml-8"> 全部下载</a>
							</div>
							<div class="mt-10 d-flex align-items-start justify-content-start flex-column">
								<!-- <div><span>文件名.jpg</span> <a href="下载地址" class="icon iconfont icondaochu ml-8"></a></div>
								<div><span>文件名.jpg</span> <a href="下载地址" class="icon iconfont icondaochu ml-8"></a></div>
								<div><span>文件名.jpg</span> <a href="下载地址" class="icon iconfont icondaochu ml-8"></a></div> -->
								{volist name="filename" id="file"}
								<div><span>{$file.filename}</span> <a class="icon iconfont icondaochu ml-8" href="{$file.path}"></a></div>
								{/volist}
							</div>
						</div>
					</div>
				</div>

				<div class="hr w-100" style="margin: 30px auto"></div>

				<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
					<a href="index.html" class="ivu-btn-default ivu-btn" >返回</a>
				</div>
			</div>

		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}


