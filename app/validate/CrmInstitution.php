<?php
/**
 * @author: Tom
 * @day: 2020/6/24
 */

namespace app\validate;
use think\Validate;
use think\exception\ValidateException;
class CrmInstitution extends Validate
{
    protected $regex = ['en' =>'/^[0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',//
                        'zn' =>'/^[\x7f-\xff\0-9a-zA-Z_\s\!\%\(\)\_\[\]{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/',
                        'account'=>'/^[0-9a-zA-Z\_\?]+$/',
                        'phone' => '/^1[3456789]\d{9}$/',
    ];
	protected $rule = [
		'name'=>'require|chsDash|max:50',
		'account'=>'require|alphaDash|length:8,16',
		'password'=>'require|regex:account|length:6,32',   //验证字段的值是否为字母和数字，下划线_及破折号-
        're_password'=>'require|regex:account|confirm:password',
        'referrer'=>'require|chsDash',//检测中文、英文、数字、下划线符合
        'refer_mobile'=>'require|mobile',
        'refer_email'=>'email',
        'ecp'=>'chsDash',
        'ecm'=>'mobile',
        'ece'=>'email',
        'group'=>'number',
        'business_license'=>'infileExt:jpg,png,jpeg,pdf',
        'ca'=>'infileExt:jpg,png,jpeg,pdf',
        'repassword'=>'alphaDash|length:6,32',
        'recommend'=>'require|alphaNum|length:12',  //邀请码
        'mobile'  =>  'require|regex:phone',
        'captcha'  =>  'require|length:4,6',

	];
	protected $message=[
	    'name.require'=>'机构名称不能为空',
	    'name.chsDash'=>'机构名称输入格式错误',
	    'name.max'=>'机构名称字数超过上限',
	    'account.require'=>'登录账号不能为空',
	    'account.regex'=>'登录账号输入格式错误',
	    'account.length'=>'登录账号长度不正确',
	    'password.require'=>'密码不能为空',
	    'password.alphaDash'=>'密码输入格式错误',
	    'password.length'=>'密码长度不正确',
        're_password.require'=>'确认密码不能为空',
        're_password.regex'=>'确认密码输入格式错误',
        're_password.confirm'=>'两次密码不正确',
	    'referrer.require'=>'对接人不能为空',
        'referrer.chsDash'=>'对接人输入格式错误',//检测中文、英文、数字、下划线符合
        'refer_mobile.require'=>'联系方式不能为空',
        'refer_mobile.mobile'=>'联系方式格式不正确',
        'refer_email.email'=>'邮箱格式不正确',
        'ecp.chsDash'=>'紧急联系人名称格式错误',
        'ecm.mobile'=>'紧急联系方式格式错误',
        'ece.email'=>'紧急联系邮箱格式错误',
        'group.number'=>'分组格式错误',
        // 'business_license.file'=>'营业执照文件错误',
        'business_license.infileExt'=>'营业执照格式错误',
        // 'ca.file'=>'合作协议文件错误',
        'ca.infileExt'=>'合作协议格式错误',
        'repassword.alphaDash'=>'密码输入格式错误',
        'repassword.length'=>'密码长度不正确',
        'recommend.require'=>'邀请码不能为空',
        'recommend.alphaNum'=>'邀请码输入格式错误',
        'recommend.length'=>'邀请码长度不正确',

        'mobile.require'   =>  '手机号必须填写',
        'mobile.regex'     =>  '手机号格式错误',
        'captcha.require'   =>  '验证码必须填写',
        'captcha.length'    =>  '验证码不能超过6个字符',
    ];
    public function sceneBasic()
    {
        return $this->only(['name','referrer','refer_mobile','refer_email','repassword']);
    }
    public function sceneRegister()
    {
        return $this->only(['name','account','password','ecp','ecm','ece','business_license','ca','referrer','refer_mobile','refer_email','re_password','recommend']);
    }
    public function sceneRepwd(){
        return $this->only(['mobile','password','re_password','captcha']);
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
                if(!$f) continue;
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



