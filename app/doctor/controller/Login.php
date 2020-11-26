<?php
namespace app\doctor\controller;
use app\doctor\model\crm\CrmUsers;
use yesai\services\UtilService;
use think\facade\Session;
use think\facade\Route as Url;
use app\validate\CrmDoctor as DoctorValidate;
use yesai\services\UploadService as Upload;
use app\institu\model\crm\CrmPlatform;
use app\institu\model\crm\CrmDoctor as DoctorModel;
use yesai\basic\BaseModel;
/**
 * 登录验证控制器
 * Class Login
 * @package app\doctor\controller
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
     * 密码修改
     * @param Request $request
     * @return mixed
     */
    public function repwd()
    {
        $request = app('request');
        if($request->isPost()){
            list($mobile,$re_password, $captcha, $password)= UtilService::postMore([['mobile',''],['re_password',''], ['captcha',''], ['password','']],$request->param,true);
            $DoctorValidate=new \app\validate\CrmDoctor;
            $doctor=$DoctorValidate->scene('Repwd')->check(['mobile'=>$mobile,'repassword'=>$re_password,'password'=>$password,'captcha'=>$captcha]);

            if(!$doctor){
                $this->failed($DoctorValidate->getError(),$_SERVER['HTTP_REFERER']);
            }
            if($password == '123456') return $this->failed('密码太过简单，请输入较为复杂的密码');
            $user_id=DoctorModel::where(['refer_mobile'=>$mobile])->value('user_id');
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
}