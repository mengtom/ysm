<?php
/**
 * @author: Tom
 * @day: 2020/6/18
 */

namespace app\validate;
use think\Validate;
use think\exception\ValidateException;
class MicrochipIngredient extends Validate
{
	protected $regex = ['en' =>'/^[0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',//
    					'zn' =>'/^[\x7f-\xff\0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',
    ];
	protected $rule = [
		'cate_id'=>'number',
		'code'=>'require|chsDash',
		'zn_name'=>'require|regex:zn',
		'en_name'=>'regex:en',
		'price'=>'require|float',
		'scale'=>'float'
	];
	protected $message=[
	    'cate_id.number'=>'分类错误',
	    'code.require'=>'成分编码不能为空',
	    'zn_name.require'=>'中文名称不能为空',
	    'zn_name.regex'=>'格式错误',
	    'en_name.regex'=>'英文名称不正确',
	    'price.require'=>'原料进价不能为空',
	    'code.require'=>'成分编码不能为空'
    ];
}