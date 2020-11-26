<?php

namespace app\doctor\controller;

use app\doctor\model\crm\CrmUsers;
use app\doctor\model\crm\SystemMenus;
use app\doctor\model\crm\SystemRole;
use think\facade\Route as Url;
use app\doctor\model\crm\SystemConfig;// +
use think\facade\Config;// +
/**
 * 基类 所有控制器继承的类
 * Class AuthController
 * @package app\doctor\controller
 */
class AuthController extends SystemBasic
{
    /**
     * 当前登陆管理员信息
     * @var
     */
    protected $doctorInfo;

    /**
     * 当前登陆管理员ID
     * @var
     */
    protected $doctorId;

    /**
     * 当前管理员权限
     * @var array
     */
    protected $auth = [];

    protected $skipLogController = ['index','common'];

    protected function initialize()
    {
        parent::initialize();
        if(!CrmUsers::hasActiveDoctor()) return $this->redirect(Url::buildUrl('login/index')->suffix(false)->build());
        try{
            $doctorInfo = CrmUsers::activeDoctorInfoOrFail();
        }catch (\Exception $e){
            return $this->failed(CrmUsers::getErrorInfo($e->getMessage()),Url::buildUrl('login/index')->suffix(false)->build());
        }
        $this->doctorInfo = $doctorInfo;
        $this->doctorInfo['currency']=$this->doctorInfo['currency'] === '人民币' ? false:true;
        $this->doctorId = $doctorInfo['user_id'];
        $this->doctorDId = $doctorInfo['d_id'];
        $this->getActiveAdminInfo();
        // $this->auth = CrmUsers::activeDoctorAuthOrFail();   权限

        $this->doctorInfo->type === 1 || $this->checkAuth();
        $this->assign('_doctor',$this->doctorInfo);
        //$doctorInfo = $this->doctorInfo->toArray();
        $roles = explode(',', $doctorInfo['type']);
        $roles[0] == 1 ? $roles[0] =5:'' ;
        $site_logo = SystemConfig::getOneConfig('menu_name', 'site_logo')->toArray();
        $this->assign([
            'menuList' => SystemMenus::menuList(),
            'site_logo' => json_decode($site_logo['value'], true),
            'new_order_audio_link' => sys_config('new_order_audio_link'),
            'role_name' => SystemRole::where('id', $roles[0])->field('role_name')->find(),
            'workermanPort' => Config::get('workerman.doctor.port'),
            'controller'=>$this->request->controller(),
        ]);
        $type = 'd_system';
        event('DoctorVisit',[$this->doctorInfo,$type]);
    }


    protected function checkAuth($action = null,$controller = null,$module = null,array $route = [])
    {
        static $allAuth = null;
        if($allAuth === null) $allAuth = SystemRole::getAllAuth();
        if($module === null) $module = app('http')->getName();
        if($controller === null) $controller = $this->request->controller();
        if($action === null) $action = $this->request->action();
        if(!count($route)) $route = $this->request->route();
        if(in_array(strtolower($controller),$this->skipLogController,true)) return true;

        $nowAuthName = SystemMenus::getAuthName($action,$controller,$module,$route);
        $baseNowAuthName =  SystemMenus::getAuthName($action,$controller,$module,[]);
        if((in_array($nowAuthName,$allAuth) && !in_array($nowAuthName,$this->auth)) || (in_array($baseNowAuthName,$allAuth) && !in_array($baseNowAuthName,$this->auth)))
            exit($this->failed('没有权限访问!'));
        return true;
    }


    /**
     * 获得当前用户最新信息
     * @return CrmUsers
     */
    protected function getActiveAdminInfo()
    {
        $doctorId = $this->doctorId;
        $doctorInfo = CrmUsers::getValidDoctorInfoOrFail($doctorId);
        if(!$doctorInfo) $this->failed(CrmUsers::getErrorInfo('请登陆!'));
        $this->doctorInfo = $doctorInfo;
        CrmUsers::setLoginInfo($doctorInfo);
        return $doctorInfo;
    }
}