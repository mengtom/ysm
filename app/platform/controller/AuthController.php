<?php

namespace app\platform\controller;

use app\platform\model\crm\CrmUsers;
use app\platform\model\crm\SystemMenus;
use app\platform\model\crm\SystemRole;
use think\facade\Route as Url;
use app\platform\model\system\SystemConfig;// +
use think\facade\Config;// +
/**
 * 基类 所有控制器继承的类
 * Class AuthController
 * @package app\platform\controller
 */
class AuthController extends SystemBasic
{
    /**
     * 当前登陆管理员信息
     * @var
     */
    protected $platformInfo;

    /**
     * 当前登陆管理员ID
     * @var
     */
    protected $platformId;

    /**
     * 当前管理员权限
     * @var array
     */
    protected $auth = [];

    protected $skipLogController = ['index','common'];

    protected function initialize()
    {
        parent::initialize();
        if(!CrmUsers::hasActivePlatform()) return $this->redirect(Url::buildUrl('login/index')->suffix(false)->build());
        try{
            $platformInfo = CrmUsers::activePlatformInfoOrFail();
        }catch (\Exception $e){
            return $this->failed(CrmUsers::getErrorInfo($e->getMessage()),Url::buildUrl('login/index')->suffix(false)->build());
        }
        $platformInfo['currency'] = $platformInfo['currency'] === '人民币' ? 0:1;
        $this->platformInfo = $platformInfo;
        $this->platformId = $platformInfo['user_id'];
        $this->platformPId = $platformInfo['p_id'];
        $this->getActiveAdminInfo();
        $this->auth = CrmUsers::activePlatformAuthOrFail();
        $this->platformInfo->type === 4 || $this->checkAuth();
        $this->assign('_platform',$this->platformInfo);
        //$platformInfo = $this->platformInfo->toArray();
        $roles = explode(',', $platformInfo['type']);
        $site_logo = SystemConfig::getOneConfig('menu_name', 'site_logo')->toArray();
        $this->assign([
            'menuList' => SystemMenus::menuList(),
            'site_logo' => json_decode($site_logo['value'], true),
            'new_order_audio_link' => sys_config('new_order_audio_link'),
            'role_name' => SystemRole::where('id', $roles[0])->field('role_name')->find(),
            'workermanPort' => Config::get('workerman.platform.port'),
            'controller'=>$this->request->controller(),
        ]);
        $type = 'p_system';
        event('PlatformVisit',[$this->platformInfo,$type]);
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
        $platformId = $this->platformId;
        $platformInfo = CrmUsers::getValidPlatformInfoOrFail($platformId);
        if(!$platformInfo) $this->failed(CrmUsers::getErrorInfo('请登陆!'));
        $this->platformInfo = $platformInfo;
        CrmUsers::setLoginInfo($platformInfo);
        return $platformInfo;
    }
}