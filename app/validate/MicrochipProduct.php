<?php
/**
 * @author: Tom
 * @day: 2020/6/24
 */

namespace app\validate;
use think\Validate;
class MicrochipProduct extends Validate
{

    protected $regex = ['en' =>'/^[0-9a-zA-Z\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\%\?]+$/',//
    					'zn' =>'/^[\x7f-\xff\0-9a-zA-Z\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\%\?]+$/',
    ];
	protected $rule = [
		'cate_id'=>'require|number',
		'code'=>'require|alphaDash',
		'zn_name'=>'require|regex:zn', //检测中文、英文、数字、下划线符合
		'en_name'=>'regex:en',   //验证字段的值是否为字母和数字，下划线_及破折号-
		'price'=>'require|float',
		'usd'=>'float',
		'scientific_zn_name'=>'regex:zn',
		'scientific_en_name'=>'regex:en',
        'microchip_info_zn'=>'regex:zn',
        'microchip_info_en'=>'regex:en',
        'effects_zn'=>'regex:zn',
        'effects_en'=>'regex:en',
        'image'=>'url|max:256',
        'unit'=>'require|alpha',
        'day_max'=>'float',
        'dose_min'=>'require|float|lt:dose_max',
        'dose_max'=>'require|float|gt:dose_min',
        'dose'=>'require|float',
        'cate2'=>'require',
        // 'cate3'=>'',
        'facts_name'=>'require|regex:zn',
        'facts_daily'=>'require|float',
        'amount'=>'require|float',
        'facts_unit'=>'require|alpha',
        'facts_sort'=>'number',
        // 'references'=>'chsDash',
        'files'=>'array',
	];
	protected $message=[
	    'cate_id.number'=>'分类错误',
	    'code.require'=>'微片编码不能为空',
	    'zn_name.require'=>'微片名称不能为空',
	    'zn_name.regex'=>'微片名称不正确',
	    'en_name.regex'=>'英文名称不正确',
	    'price.require'=>'基础售价不能为空',
	    'price.float'=>'基础售价不正确',
	    'usd.float'=>'usd售价不正确',
	    'scientific_zn_name.regex'=>'微片学名格式不正确',
	    'scientific_en_name.regex'=>'Scientific name格式不正确',
	    'microchip_info_zn.regex'=>'微片详细描述格式不正确',
	    'microchip_info_en.regex'=>'Product description格式不正确',
	    'effects_zn.regex'=>'副作用格式不正确',
	    'effects_en.regex'=>'Side effects格式不正确',
	    'zn_name.require'=>'中文名称不能为空',
	    'en_name.regex'=>'英文名称不正确',
	    'image.url'=>'图片格式错误',
	    'image.max'=>'图片格式错误',
	    'unit.require'=>'剂量单位不能为空',
	    'unit.alpha'=>'剂量单位不正确',
	    'day_max.float'=>'最大摄入量错误',
	    'dose_min.require'=>'剂量范围不能为空',
	    'dose_max.require'=>'剂量范围不能为空',
	    'dose_min.float'=>'剂量范围错误',
	    'dose_max.float'=>'剂量范围错误',
	    'dose_min.lt'=>'剂量范围最小值不能大于最大值',
	    'dose_max.gt'=>'剂量范围最小值不能小于最小值',
	    'dose.require'=>'单次增量不能为空',
	    'dose.float'=>'单次增量错误',
	    'cate2.require'=>'适应症不能为空',
	    'facts_name.require'=>'成分名展示不能为空',
	    'facts_name.regex'=>'成分名展示格式不正确',
	    'facts_daily.require'=>'Daily Value不能为空',
	    'facts_daily.float'=>'Daily Value格式不正确',
	    'amount.require'=>'Amout Per Serving不能为空',
	    'amount.float'=>'Amout Per Serving格式不正确',
	    'facts_unit.require'=>'Supplement Facts单位不能为空',
	    'facts_unit.alpha'=>'Supplement Facts单位格式不正确',
	    // 'references.chsDash'=>'参考文献 References不正确',
	    'files.array'=>'文件错误',
	    // 'facts_sort.require'=>'成分排序不能为空',
	    'facts_sort.number'=>'成分排序必须是数字',
    ];
}