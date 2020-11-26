<?php
namespace app\institu\controller;
use app\institu\model\crm\CrmUsers;
use yesai\services\UtilService;
use think\facade\Session;
use think\facade\Route as Url;
use app\validate\CrmInstitution as InstitutionValidate;
use yesai\services\UploadService as Upload;
use app\institu\model\crm\CrmPlatform;
use app\institu\model\crm\CrmInstitution as InstituModel;
use yesai\basic\BaseModel;
/**
 * 登录验证控制器
 * Class Login
 * @package app\institu\controller
 */
class Login extends SystemBasic
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 登录验证 + 验证码验证
     */
    public function verify()
    {
        if (!request()->isPost()) return $this->failed('请登陆!');
        list($account, $pwd, $verify) = UtilService::postMore([
            'account', 'pwd', 'verify'
        ], null, true);
        //检验验证码
        //if (!captcha_check($verify)) return $this->failed('验证码错误，请重新输入');
        $error = Session::get('login_error') ?: ['num' => 0, 'time' => time()];
        $error['num'] = 0;
        if ($error['num'] >= 5 && $error['time'] > strtotime('- 5 minutes'))
            return $this->failed('错误次数过多,请稍候再试!');
        //检验帐号密码
        $res = CrmUsers::login($account, $pwd);
        if ($res) {
            Session::set('login_error', null);
            Session::save();
            return $this->successful(['url' => Url::buildUrl('Index/index')->build()]);
        } else {
            $error['num'] += 1;
            $error['time'] = time();
            Session::set('login_error', $error);
            Session::save();
            return $this->failed(CrmUsers::getErrorInfo('用户名错误，请重新输入'));
        }
    }

    public function captcha()
    {
        ob_clean();
        return captcha();
    }

    /**
     * 退出登陆
     */
    public function logout()
    {
        CrmUsers::clearLoginInfo();
        $this->redirect(Url::buildUrl('index')->build());
    }
    /**
     * 注册新机构
     * @param Request $request
     * @return mixed
     */
    public function register()
    {
        $request = app('request');
        if($request->isPost()){
            $data = UtilService::postMore([
            'name',
            'account',
            'password',
            're_password',
            'referrer',
            'refer_mobile',
            ['refer_email',''],
            ['recommend',''],
            ['ecp',''],
            ['ecm',''],
            ['ece',''],
            ['group',0],
            ['business_license',''],
            ['ca',[]],
            ['is_read',''],
            ],$request->param);
            if($data['is_read'] !=1) return $this->failed('未阅读相关条款');
            $InstitutionValidate=new \app\validate\CrmInstitution;
            $institu=$InstitutionValidate->scene('Register')->check($data);
            if(!$institu){
                $this->failed($InstitutionValidate->getError(),$_SERVER['HTTP_REFERER']);
            }
            $platform=CrmPlatform::where(['referral_code'=>$data['recommend']])->find();
            if(!$platform) return $this->failed('邀请码错误');
            $data['platform_leader']=$platform['id'];
            $data['institu_discount']=$platform['institu_discount'];
            $data['institu_commission']=$platform['institu_commission'];
            $name=InstituModel::be(['name'=>$data['name']]);
            if($name) return $this->failed('机构已存在');
            $account=CrmUsers::be(['account'=>$data['account']]);
            if($account) return $this->failed('机构已存在');
            if($data['account'] == 'admin' || preg_match('/admin/i',$data['account'])) return $this->failed('账号格式错误，请重新输入');
            if($data['password'] == '123456' || $data['password'] == '') return $this->failed('密码过于简单，请重新输入');
            if($data['re_password'] != $data['password'] ) return $this->failed('两次密码不正确');
            BaseModel::beginTrans();
            try {
                $default=CrmUsers::addUsers(['account'=>$data['account'],'password'=>$data['password'],'type'=>3,'platform_leader'=>$data['platform_leader'],'platform_name'=>$platform['p_name'],'platform_time'=>time(),'last_ip'=>app('request')->ip(),'last_login'=>time()]);
            } catch (\Exception $e) {
                BaseModel::rollbackTrans();
                return $this->failed($e->getMessage());
            }
            unset($data['account'],$data['password'],$data['re_password'],$data['is_read'],$data['recommend']);
            if(!$default){
                BaseModel::rollbackTrans();
                return $this->failed(CrmUsers::getErrorInfo());
            }
            $data['user_id']= $default;
            $data['plat_type']='institu_register';
            $res = InstituModel::addInstitution($data);
            BaseModel::checkTrans($res);
            if($res) return $this->successful('添加医疗机构成功');
            BaseModel::rollbackTrans();
            return $this->failed(InstituModel::getErrorInfo('添加医疗机构失败'));

            // list($account, $captcha, $password, $spread) = UtilService::postMore([['account',''], ['captcha',''], ['password',''], ['spread',0]],$request, true);
            // try {
            //     validate(RegisterValidates::class)->scene('register')->check(['account'=>$account, 'captcha'=>$captcha, 'password'=>$password]);
            // } catch (ValidateException $e) {
            //     return app('json')->fail($e->getError());
            // }
            // $verifyCode = CacheService::get('code_'.$account);
            // if(!$verifyCode)
            //     return app('json')->fail('请先获取验证码');
            // $verifyCode = substr($verifyCode, 0, 6);
            // if($verifyCode != $captcha)
            //     return app('json')->fail('验证码错误');
            // if(strlen(trim($password)) < 6 || strlen(trim($password)) > 16)
            //     return app('json')->fail('密码必须是在6到16位之间');
            // if($password == '123456') return app('json')->fail('密码太过简单，请输入较为复杂的密码');
            // $registerStatus = User::register($account, $password, $spread);
            // if($registerStatus) return app('json')->success('注册成功');
            // return app('json')->fail(User::getErrorInfo('注册失败'));
        }
        return $this->fetch();
    }

    /**
     * 密码修改
     * @param Request $request
     * @return mixed
     */
    public function repwd()
    {
        $request = app('request');
        if($request->isPost()){
            list($mobile,$re_password, $captcha, $password)= UtilService::postMore([['mobile',''],['re_password',''], ['captcha',''], ['password','']],$request->param,true);
            $InstitutionValidate=new \app\validate\CrmInstitution;
            $institu=$InstitutionValidate->scene('Repwd')->check(['mobile'=>$mobile,'re_password'=>$re_password,'password'=>$password,'captcha'=>$captcha]);
            if(!$institu){
                $this->failed($InstitutionValidate->getError(),$_SERVER['HTTP_REFERER']);
            }
            if($password == '123456') return $this->failed('密码太过简单，请输入较为复杂的密码');
            $user_id=InstituModel::where(['refer_mobile'=>$mobile])->value('user_id');
            if(!$user_id) return $this->failed('不存在账号');
            $account=CrmUsers::where(['user_id'=>$user_id])->value('account');
            if(!$account) return $this->failed('不存在账号');
            $res=CrmUsers::reset($account,$password);
            if(!$res) return $this->failed(CrmUsers::getErrorInfo('修改失败'));
            return $this->successful('修改成功');
        }
        return $this->fetch();


        // list($account, $captcha, $password) = UtilService::postMore([['account',''], ['captcha',''], ['password','']],$request, true);
        // try {
        //     validate(RegisterValidates::class)->scene('register')->check(['account'=>$account, 'captcha'=>$captcha, 'password'=>$password]);
        // } catch (ValidateException $e) {
        //     return app('json')->fail($e->getError());
        // }
        // $verifyCode = CacheService::get('code_'.$account);
        // if(!$verifyCode)
        //     return app('json')->fail('请先获取验证码');
        // $verifyCode = substr($verifyCode, 0, 6);
        // if($verifyCode != $captcha)
        //     return app('json')->fail('验证码错误');
        // if(strlen(trim($password)) < 6 || strlen(trim($password)) > 16)
        //     return app('json')->fail('密码必须是在6到16位之间');
        // if($password == '123456') return app('json')->fail('密码太过简单，请输入较为复杂的密码');
        // $resetStatus = User::reset($account, $password);
        // if($resetStatus) return app('json')->success('修改成功');
        // return app('json')->fail(User::getErrorInfo('修改失败'));
    }
     /**
    * 文件上传
    * */
    public function file_upload(){
       $res = Upload::instance()->setImageValidateArray(['filesize'=>104857600,'fileExt'=>'jpg,png,jpeg,JPG,PNG,JPEG,pdf,PDF,pdf','fileMime'=>['image/jpeg', 'image/gif', 'image/png','application/pdf']])->setUploadPath('institu')->setAutoValidate(true)->file($this->request->param('file','file'));
       if(is_object($res) && !$res->status) return app('json')->fail($res->error);
       return app('json')->successful('上传成功!',$res->filePath);
    }
}