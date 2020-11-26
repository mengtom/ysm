{include file="public/header"}
	<title>平台管理-基本信息</title>
	<div id="app" class="crm-basic-p">
		<!--头部-->
		{include file="public/header_navigate"}
		<!--头部-->
		<div class="w-1200 tip mt-80  text-666 size-14">
			<span>首页 /</span> <a class="text-57" href="index.html">平台管理 </a> <span class="text-c01f5e">/ 基本信息 </span>
		</div>

		<div class="w-1200 mt-10 mb-10 tip  text-666 size-14">
			<span class="fw size-20 text-333">基本信息</span>
		</div>

		<!--列表-->
		<div class="w-1200  wp-edit pb-10 mb-30" style="border-radius: 1px;  background-color: #ffffff;">
			<form class="layui-form" action="{:Url('update',array('id'=>$institu.id))}" method="post">
				<div class="wp-edit-body  h-100 pt-20">

					<div class="size-16 fw text-c01f5e ">基础信息</div>

					<div class="items w-100">
						<div class="item w-100 ">
							<div class=" size-14 item-text">平台名称<span class="text-ff4d4f">*</span></div>
							<div class=" w-100">
								<input style="width: 400px;" type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0" name="name" value="{$institu.name}">
							</div>
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">登录账号<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" value="{$institu.account}">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class=" size-14 item-text">重置密码<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="repassword">
									<i-input class="w-400px" v-model="value5" name="repassword" type="password" password placeholder="由英文/数字/符号组成" />
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">对接人<span class="text-ff4d4f">*</span></div>
								<div class="w-100">
									<input style="width: 400px;" type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0" name="referrer" value="{$institu.referrer}">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">联系方式<span class="text-ff4d4f">*</span></div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="refer_mobile" value="{$institu.refer_mobile}">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">邮箱</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="refer_email" value="{$institu.refer_email}">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="item w-100 d-flex align-items-center justify-content-start">
							<div>
								<div class=" size-14 item-text">紧急联系人</div>
								<div class="w-100">
									<input  type="text" placeholder="由中文/英文/数字/符号组成" class="ivu-input ml0 w-400px" name="ecp" value="{$institu.ecp}">
								</div>
							</div>
							<div style="margin-left: 50px;">
								<div class="w-100 d-flex align-items-center justify-content-start">
									<div>
										<div class=" size-14 item-text">紧急联系方式</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="ecm" value="{$institu.ecm}">
										</div>
									</div>
									<div>
										<div class=" size-14 item-text">邮箱</div>
										<div class="ivu-input-wrapper ivu-input-wrapper-default ivu-input-type-text mr-20 w-190px">
											<input style="width: 190px;" type="text" placeholder="由英文/数字/符号组成" class="ivu-input ml0" name="ece" value="{$institu.ece}">
										</div>
									</div>
								</div>
						</div>
					</div>
					</div>
					<div class="hr w-100" style="margin: 30px auto"></div>
					<div style="margin-top: 18px;"><span class="size-16 fw text-c01f5e">文件上传</span> <span class="ml-20">jpg、png、jepg、 JPG、PNG、JEPG、pdf、PDF</span></div>
					<div class="item mt-20 w-100 d-flex align-items-start justify-content-start">
						<div>
							<div class="size-14 item-text fw">营业执照</div>
							<div class="w-400px mt-10">
								<div class="mt-8 basic-updata-items1" style="">
								{if condition="$institu.business_license"}

										<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span><?=pathinfo($institu['business_license'],PATHINFO_BASENAME)?></span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi  size-12"></i>
											</span>
											<input type="hidden" name="business_license" value="{$institu['business_license']}">
										</div>
									</div>

								{else /}
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaochu"></i>
										上传文件
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" type="file" class="hide upfile">
								</label>
								{/if}
								</div>
							</div>
						</div>

						<div style="margin-left: 50px;">
							<div class="size-14 item-text fw">合作协议</div>
							<div class="w-400px mt-10">
								<label>
									<div type="button" class="ivu-btn ivu-btn-default">
										<i class="icon iconfont icondaochu"></i>
										上传文件
									</div>
									<input accept="*.jpg,*.png,*.jepg,*.JPG,*.PNG,*.JEPG,*.pdf,*.PDF" multiple name="" type="file" class="hide upfile2">
								</label>
								<div class="mt-8 basic-updata-items2" style="">
									{volist name="filename" id="f"}
									<div class="basic-updata-item">
										<div class="relative w-100">
											<i class="icon iconfont iconshiyongqingkuang ml-8"></i>
											<span>{$f.filename}</span>
											<span class="close absolute">
												<i class="icon iconfont cursor iconguanbi absolute size-12"></i>
											</span>
											<input type="hidden" name="ca[]" value="{$f.path}">
										</div>
									</div>
									{/volist}
								</div>
							</div>
						</div>
					</div>
					<div class="hr w-100"></div>
					<div class="size-16 fw text-c01f5e mt-10 ">交易信息</div>
					<div class="items w-100">
						<div class="item w-100">
							<div class="size-14 item-text">所属分组</div>
							<div class="w-400px">
								<select name="group">
									<option value="">全部</option>
									{volist name="group" id="g"}
									<option value="{$g.id}" {eq name="$institu.group" value="$g.id"}selected="selected"{/eq}>{$g.name}</option>
									{/volist}
								</select>
							</div>
						</div>
						<div class="item w-100 text-27">
							<span>返佣比例：{$institu.group_commission}%</span> <span class="ml-20">拿货折扣：{$institu.group_discount}折</span>
						</div>
						<div class="item w-100 d-flex align-items-start justify-content-start">
							<div class="d-flex align-items-start justify-content-start useroder">
								<div class="w-100 h-100">
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-50 h-100 bg-f6 pl-20 d-flex align-items-center fw">开具处方数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">目前成单数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">拿货订单数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">总佣金金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">已提现佣金金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">未提现佣金金额</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
									<div class="w-100 d-flex align-items-center justify-content-start useroder-item">
										<div class="w-150px h-100 bg-f6 pl-20 d-flex align-items-center fw">患者数量</div>
										<div class="w-150px h-100 d-flex align-items-center justify-content-end pr-20">100000</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hr w-100 "></div>
					<div class="item w-100 mt-20 d-flex align-items-center justify-content-start " style="margin-bottom: 30px;">
						<button class="ivu-btn-primary ivu-btn mr-20" type="submit">保存</button>
						<a href="index.html" class="ivu-btn-default ivu-btn" type="reset">取消</a>
					</div>
				</div>

			</form>
		</div>

		<!--充值-->
		<div style="display: none" class="modal-root label-modal">
			<div class="ant-modal-wrap"></div>
			<div class="ant-modal fixed" style="height: 460px;">
				<div class="w-100 top d-flex align-items-center justify-content-start size-16  relative mb-20">
					<span class="fw size-16">充值</span>
					<span style="right: 20px;" class="absolute cursor closemode">
						<i class="icon iconfont iconguanbi text-bf"></i>
					</span>
				</div>
				<form class="layui-form" action="{:Url('update_recharge',array('pid'=>$institu.id))}" method="post">

					<div class="items d-flex align-items-center justify-content-start flex-column   ">
						<div class="item  w-100 d-flex align-items-center justify-content-start">
							<!--结算货币不可更改，添加平台时已指定-->
							<span style="width: 90px;">结算货币：</span>{$institu.currency}
						</div>
						<div class="item w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">充值金额：</span><input type="number" placeholder="请输入" name="money" value="0" class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">收款方式：</span><input type="text" placeholder="请输入" name="payment"  class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<span style="width: 90px;">流水单号：</span><input type="text" placeholder="请输入" name="code" class="ivu-input ivu-input-default ">
						</div>

						<div class="item  w-100 d-flex align-items-center justify-content-start mt-20">
							<div style="width: 90px;">备  注：</div>
							<div>
								<textarea placeholder="请输入" style="width: 327px;height: 68px;" name="mark" class="ivu-input ivu-input-default"></textarea>
							</div>
						</div>

					</div>
					<div class="w-100 d-flex align-items-center justify-content-end foot ">
						<button type="reset" class="ivu-btn ivu-btn-default closemode">取消</button>
						<button type="submit" class="ivu-btn ivu-btn-primary ml-20">提交</button>
					</div>
				</form>
			</div>
		</div>

	</div>
{include file="public/footer"}
{include file="public/inner_footer"}
{include file="public/layui_page"}
<!-- <script type="text/javascript">
	var app = new Vue({
		el     : '#app',
		data   : {
			message: 'Hello Vue.js!',
			ismodel: false,
			cf     : '',
			value5: '',
		},
		methods: {
			// model         : function () {
			//     this.ismodel = !this.ismodel;
			// },
			// reverseMessage: function () {
			//     this.message = this.message.split('').reverse().join('');
			// },
		},
	});
</script> -->
<script>
 //实例化form
    layList.form.render();
	//excel下载
    layList.search('export',function(where){
    	var time=$("#test13").val();
    	if(!time){
    		layList.msg('请选择年月');
    		return false;
    	}
        location.href=layList.U({m:'terrace',c:'crm.institution',a:'recharge_list',p:{excel:1,time:time,id:{$institu.id}}});
    })
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//年选择器
		laydate.render({
			elem: '#test13'
			,type: 'month'
		});
	})



	//弹窗
	$('.closemode').click(function () {
		$('.modal-root').hide();
	});

	$('.add-mode').click(function () {
		$('.modal-root').show();
	});
	// 上传文件先清空
	$('.upfile').click(function () {
		$('.upfile').val('');
	});
	$('.upfile').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile")[0].files;
		data.append('file', files[0]);
		$.ajax({
			url        : "{:Url('upload')}",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code == 200){
					var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
					res.data.filename+
					'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
					'<input type="hidden" value="'+res.data.path+'" name="business_license">' +
					'</div></div>';
					$('.basic-updata-items1').append(html);
					$('.upfile').parent().hide();
				}
			}, error   : function (er) {
				console.log(er);
			},
		});
	});

	// 上传文件先清空
	$('.upfile2').click(function () {
		$('.upfile2').val('');
	});
	$('.upfile2').change(function (e) {
		var data  = new FormData();
		var files = $(".upfile2")[0].files;
		for (var i = 0; i < files.length; i++) {
			data.append('file[]', files[i]);
		}
		// console.log(data.getAll('files'))
		$.ajax({
			url        : "{:Url('file_upload')}",
			type       : 'post',
			data       : data,
			processData: false,// 重要,确认为false
			contentType: false,
			success    : function (data) {
				var res = JSON.parse(data);
				if(res.code == 200){
					for (var i = 0; i < res.data.length; i++) {
						var html = '<div class="basic-updata-item"><div class="relative w-100 d-flex"><i class="icon iconfont iconshiyongqingkuang ml-8"></i> <span  class="ellipsis-1">' +
							res.data[i].filename+
							'</span><span class="close absolute"><i class="icon iconfont cursor iconguanbi absolute updata-item-del size-12"></i></span>' +
							'<input type="hidden" value="'+res.data[i].path+'" name="ca[]">' +
							'</div></div>';
						$('.basic-updata-items2').append(html);
					}
				}

			}, error   : function (er) {
				console.log(er);
			},
		});
	});

</script>
