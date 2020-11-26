{include file="public/header"}
<title>{if condition="$product['id']"}编辑{else /}添加{/if}成分</title>
	<div id="app" class="wp-editingredient">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200  mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="javascript:;">微片 /</a> <a class="text-57" href="{:Url('index')}">成分管理 </a> <span class="text-c01f5e">/ {if condition="$product['id']"}编辑{else /}添加{/if}成分 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">{if condition="$product['id']"}编辑{else /}添加{/if}成分</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" onsubmit="return toVaild()" action="{if condition="$product['id']"}{:Url('update',array('id'=>$product['id']))}{else /}{:Url('save')}{/if}" method="post">
				<div class="wp-edit-body  h-100 pt-20">
					<div class="items w-100">
						<div class="item w-100 ">
							<div class=" size-14 item-text">成分编码<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input style="width: 400px;" name="code" type="text" placeholder="请输入" class="ivu-input classvaild ml0" value="{$product.code}">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class=" size-14 item-text">中文名称<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="zn_name" placeholder="由英文/数字/符号组成" class="ivu-input classvaild ml0" value="{$product.zn_name}">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">英文名称</div>
								<div class="w-100">
									<input style="width: 400px;" type="text" name="en_name" placeholder="由英文/数字/符号组成" class="ivu-input ml0" value="{$product.en_name}">
								</div>
							</div>
						</div>


						<div class="item w-100 d-flex align-items-center justify-content-start  ">
							<div>
								<div class=" size-14 item-text">成分类型</div>
								<div class="w-100">
									<div class="ivu-select  ivu-select-single ivu-select-default relative w-400px">
										<select name="cate_id" lay-verify="required">
											<option value="">请选择</option>
											{volist name="cate" id="vo"}
											<option value="{$vo.cate_id}" {eq name="vo.cate_id" value="product.cate_id"}selected="selected"{/eq}>{$vo.cate_name}</option>
											{/volist}
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
							<div style="width: 230px;">
								<div class="size-14 item-text">原料进价(RMB/KG)<span class="text-ff4d4f">*</span></div>
								<div class="w-100 mt-8">
									<input type="text" id="material" name="price" class="ivu-input classvaild" placeholder="请输入" value="{$product.price}">
								</div>
							</div>
							<div style="margin-left: 20px;width: 150px;">
								<div class=" size-14 item-text">汇率</div>
								<div class="w-100 mt-8">
									<input type="text" id="exchange" name="scale" class="ivu-input w-150px" placeholder="请输入" value="{$product.scale}">
								</div>
							</div>
						</div>
						<div class="hr w-100 mt-20"></div>

						<div class="item w-100 mt-20 fw ">
							计算结果：
						</div>

						<div class="item w-100 mt-20 d-flex align-items-center justify-content-start  ">
							<span>每mg成本价</span>
							<span class="ml-20">￥<span class="price1">0</span>XXXX</span>
							<span class="ml-20">$<span class="price2">0</span>XXXX</span>
						</div>
						<div class="item w-100 mt-10 d-flex align-items-center justify-content-start  ">
							<!--<div class="d-flex align-items-start justify-content-around flex-column bg-f4 size-12 code text-57 ">-->
							<!--	<div>此处成本价为系统计算所得，公式如下：</div>-->
							<!--	<div>原料进价÷1000</div>-->
							<!--	<div>原料进价÷1000÷汇率</div>-->
							<!--</div>-->
						</div>
						<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
							<button class="ivu-btn-primary ivu-btn mr-20" type="submit">确定</button>
							<a class="ivu-btn-default ivu-btn" type="submit" href="{:Url('index')}">取消</a>
						</div>

					</div>
				</div>
			</form>
		</div>


	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
<script type="text/javascript">
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
	$('#exchange').blur(function () {
		price();
	});
	$('#price').blur(function () {
		price();
	});
	function price() {
		var material = $('#material').val();
		var exchange = $('#exchange').val();
		if (material <= 0 || exchange <= 0) {
			return false;
		}
		var pricermb = (material / 1000).toFixed(3);
		var pricemy  = ((material / 1000) / exchange).toFixed(3);
		$('.price1').html(pricermb);
		$('.price2').html(pricemy);
	}
	/* 点击删除辅料*/
	$(".fllist").on('click', '.rmflitem', function () {
		$(this).parent().remove();
	});

</script>
