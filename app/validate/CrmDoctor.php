<?php
/**
 * @author: Tom
 * @day: 2020/6/24
 */

namespace app\validate;
use think\Validate;
use think\exception\ValidateException;
class CrmDoctor extends Validate
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
        'refer_mobile'=>'require|mobile',
        'refer_email'=>'email',
        'group'=>'number',
        'repassword'=>'alphaDash|length:6,32',
        'recommend'=>'require|alphaNum|length:12',  //邀请码
        'mobile'  =>  'require|regex:phone',
        'captcha'  =>  'require|length:4,6',
	];
	protected $message=[
	    'name.require'=>'医生名称不能为空',
	    'name.chsDash'=>'医生名称输入格式错误',
	    'name.max'=>'医生名称字数超过上限',
	    'account.require'=>'登录账号不能为空',
	    'account.regex'=>'登录账号输入格式错误',
	    'account.length'=>'登录账号长度不正确',
	    'password.require'=>'密码不能为空',
	    'password.alphaDash'=>'密码输入格式错误',
	    'password.length'=>'密码长度不正确',
        'refer_mobile.require'=>'对接人联系方式不能为空',
        'refer_mobile.mobile'=>'对接人联系方式格式不正确',
        'refer_email.email'=>'对接人邮箱格式不正确',
        'group.number'=>'分组格式错误',
        // 'business_license.file'=>'营业执照文件错误',
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
    public function sceneRepwd(){
        return $this->only(['mobile','password','repassword','captcha']);
    }
    public function sceneABsic(){
        return $this->only(['name','referrer','refer_mobile','refer_email','repassword','group']);
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