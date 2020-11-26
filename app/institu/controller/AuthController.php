<?php

namespace app\institu\controller;

use app\institu\model\crm\CrmUsers;
use app\institu\model\crm\SystemMenus;
use app\institu\model\crm\SystemRole;
use think\facade\Route as Url;
use app\institu\model\crm\SystemConfig;// +
use think\facade\Config;// +
/**
 * 基类 所有控制器继承的类
 * Class AuthController
 * @package app\institu\controller
 */
class AuthController extends SystemBasic
{
    /**
     * 当前登陆管理员信息
     * @var
     */
    protected $instituInfo;

    /**
     * 当前登陆管理员ID
     * @var
     */
    protected $instituId;

    /**
     * 当前管理员权限
     * @var array
     */
    protected $auth = [];

    protected $skipLogController = ['index','common'];

    protected function initialize()
    {
        parent::initialize();
        if(!CrmUsers::hasActiveInstitu()) return $this->redirect(Url::buildUrl('login/index')->suffix(false)->build());
        try{
            $instituInfo = CrmUsers::activeInstituInfoOrFail();
        }catch (\Exception $e){
            return $this->failed(CrmUsers::getErrorInfo($e->getMessage()),Url::buildUrl('login/index')->suffix(false)->build());
        }
        $this->instituInfo = $instituInfo;
        $this->instituInfo['currency']=$this->instituInfo['currency'] === '人民币' ? false:true;
        $this->instituId = $instituInfo['user_id'];
        $this->instituPId = $instituInfo['i_id'];
        $this->getActiveInstituInfo();
        $this->auth = CrmUsers::activeInstituAuthOrFail();
        in_array($this->instituInfo->type,[2,3]) || $this->checkAuth();
        $this->assign('_institu',$this->instituInfo);
        //$instituInfo = $this->instituInfo->toArray();
        $roles = explode(',', $instituInfo['type']);
        $site_logo = SystemConfig::getOneConfig('menu_name', 'site_logo')->toArray();
        $this->assign([
            'menuList' => SystemMenus::menuList(),
            'site_logo' => json_decode($site_logo['value'], true),
            'new_order_audio_link' => sys_config('new_order_audio_link'),
            'role_name' => SystemRole::where('id', $roles[0])->field('role_name')->find(),
            'workermanPort' => Config::get('workerman.institu.port'),
            'controller'=>$this->request->controller(),
        ]);
        $type = 'i_system';
        event('InstituVisit',[$this->instituInfo,$type]);
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
    protected function getActiveInstituInfo()
    {
        $instituId = $this->instituId;
        $instituInfo = CrmUsers::getValidInstituInfoOrFail($instituId);
        if(!$instituInfo) $this->failed(CrmUsers::getErrorInfo('请登陆!'));
        $this->instituInfo = $instituInfo;
        CrmUsers::setLoginInfo($instituInfo);
        return $instituInfo;
    }
}