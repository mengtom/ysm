<?php
/**
 * @author: Tom
 * @day: 2020/6/24
 */

namespace app\validate;
use think\Validate;
use think\exception\ValidateException;
class CrmPlatform extends Validate
{
    protected $regex = ['en' =>'/^[0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',//
                        'zn' =>'/^[\x7f-\xff\0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',
                        'account'=>'/^[0-9a-zA-Z\_\?]+$/',
    ];
	protected $rule = [
		'p_name'=>'require|chsDash|max:50',
		'account'=>'require|alphaDash|length:8,16',
		'password'=>'require|regex:account|length:6,32',   //验证字段的值是否为字母和数字，下划线_及破折号-
        'referrer'=>'require|chsDash',//检测中文、英文、数字、下划线符合
        'refer_mobile'=>'require|mobile',
        'refer_email'=>'email',
        'ecp'=>'chsDash',
        'ecm'=>'mobile',
        'ece'=>'email',
        'currency'=>'require|chs|max:3',
        'place'=>'chsDash',
        'business_license'=>'infileExt:jpg,png,jpeg,pdf',
        'ca'=>'infileExt:jpg,png,jpeg,pdf',
        'repassword'=>'alphaDash|length:6,32',
        'default_discount'=>'float',
        'single_dose'=>'float',
        'barrel_price'=>'float',
        'out_pack'=>'float',
	];
	protected $message=[
	    'p_name.require'=>'平台名称不能为空',
	    'p_name.chsDash'=>'平台名称输入格式错误',
	    'p_name.max'=>'平台名称字数超过上限',
	    'account.require'=>'登录账号不能为空',
	    'account.regex'=>'登录账号输入格式错误',
	    'account.length'=>'登录账号长度不正确',
	    'password.require'=>'密码不能为空',
	    'password.alphaDash'=>'密码输入格式错误',
	    'password.length'=>'密码长度不正确',
	    'referrer.require'=>'对接人不能为空',
        'referrer.chsDash'=>'对接人输入格式错误',//检测中文、英文、数字、下划线符合
        'refer_mobile.require'=>'对接人联系方式不能为空',
        'refer_mobile.mobile'=>'对接人联系方式格式不正确',
        'refer_email.email'=>'对接人邮箱格式不正确',
        'ecp.chsDash'=>'紧急联系人名称格式错误',
        'ecm.mobile'=>'紧急联系方式格式错误',
        'ece.email'=>'紧急联系邮箱格式错误',
        'currency.require'=>'结束货币不能为空',
        'currency.chs'=>'结束货币格式错误',
        'currency.max'=>'结束货币错误',
        'place.chsDash'=>'业务区域错误',
        // 'business_license.file'=>'营业执照文件错误',
        'business_license.infileExt'=>'营业执照格式错误',
        // 'ca.file'=>'合作协议文件错误',
        'ca.infileExt'=>'合作协议格式错误',
        'repassword.alphaDash'=>'密码输入格式错误',
        'repassword.length'=>'密码长度不正确',
        'default_discount.float'=>'原始折扣格式错误',
        'single_dose.float'=>'单剂结算价格式错误',
        'barrel_price.float'=>'筒形结算价格式错误',
        'out_pack.float'=>'外包装结算价格式错误',
    ];
    public function sceneBasic()
    {
        return $this->only(['p_name','referrer','refer_mobile','refer_email','ecp','ecm','ece','business_license','ca','repassword','default_discount','single_dose','barrel_price','out_pack']);
    }
    /**
     * 验证上传的文件字符串数组的文件类型
     * @param  [type] $file [description]
     * @param  [type] $ext  [类型]
     * @return [type]       [description]
     */
    public function infileExt($file, $ext): bool
    {
        if (is_string($ext)) {
            $ext = explode(',', $ext);
        }
        if(is_array($file)){
            foreach ($file as $f) {
                $exten=pathinfo($f,PATHINFO_EXTENSION);
                if(!in_array(strtolower($exten), $ext))
                    return false;
            }
        }else{
            $exten=pathinfo($file,PATHINFO_EXTENSION);
            if(!in_array(strtolower($exten), $ext))
                return false;
        }
        return true;
    }
}