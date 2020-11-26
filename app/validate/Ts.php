<?php
/**
 * @author: Tom
 * @day: 2020/6/24
 */

namespace app\validate;
use think\Validate;
use think\exception\ValidateException;
class Ts extends Validate
{
	protected $regex = ['en' =>'/^[0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',//
    					'zn' =>'/^[\x7f-\xff\0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',
    ];
	protected $rule = [
		'code'=>'require|alphaDash',
		'name_zn'=>'regex:zn', //检测中文、英文、数字、下划线符合
		'name_en'=>'regex:en',   //验证字段的值是否为字母和数字，下划线_及破折号-
        // 'cate2'=>'number',
        'taking_quency'=>'require|chsAlphaNum',
        'taking_time'=>'chs', //检测中文
        'taking_cycle'=>'require|chsAlphaNum',
        'taking_suggest'=>'regex:zn',
        'description'=>'regex:zn',
        'reference'=>'regex:zn',
	];
	protected $message=[
	    'code.alphaDash'=>'配方编码输入格式错误',
	    'code.require'=>'配方编码不能为空',
	    'name_zn.regex'=>'配方名称输入格式不正确',
	    'name_en.regex'=>'配方英文名称输入格式不正确',
	    // 'cate2.number'=>'适应症选择错误',
	    'taking_quency.require'=>'服用频次不能为空',
	    'taking_quency.chsAlphaNum'=>'服用频次格式错误',
	    'taking_time.chs'=>'服用时间格式错误',
	    'taking_cycle.require'=>'服用周期不能为空',
	    'taking_cycle.chsAlphaNum'=>'服用周期格式错误',
	    'taking_suggest.regex'=>'服用建议格式错误',
	    'description.regex'=>'描述输入格式错误',
	    'reference.regex'=>'参考输入格式错误',
    ];
}