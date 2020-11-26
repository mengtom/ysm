document.write("<script src='/plugins/layui/layui.js'></script>");
$(function () {
	layui.use(['laydate', 'laypage', 'layer', 'table', 'carousel', 'upload', 'element', 'form'], function () {
		var laydate    = layui.laydate //日期
			, laypage  = layui.laypage //分页
			, layer    = layui.layer //弹层
			, table    = layui.table //表格
			, form     = layui.form //表格
			, carousel = layui.carousel //轮播
			, upload   = layui.upload //上传
			, element  = layui.element; //元素操作 等等...
		//验证规则
		form.verify({
			a: [/[\S]+/, "必填项不能为空"],
		});
	});


	// 菜单下拉
	$('.ivu-menu-submenu').hover(function (e) {
		$(this).children('.ivu-select-dropdown').stop().slideToggle();
	});

	// 选择下拉框
	// $('.ivu-select-selection').click(function (e) {
	// 	$(this).next('.ivu-select-dropdown').stop().slideToggle();
	// });

	// $('.ivu-select-item').click(function (e) {
	// 	$value = $(this).val();
	// 	$text  = $(this).text();
	// 	$(this).parents('.ivu-select-dropdown').prev('.ivu-select-selection').find('.inputval').val($value);
	// 	$(this).parents('.ivu-select-dropdown').prev('.ivu-select-selection').find('.text').html($text);
	// 	$(this).parents('.ivu-select-dropdown').stop().slideToggle();
	// });
	// 选择下拉框
});

