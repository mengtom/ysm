<?php

namespace yesai\subscribes;

use app\platform\model\crm\CrmUsers;
use app\platform\model\crm\CrmSystemLog as SystemLog;

/**
 * 后台系统事件
 * Class SystemSubscribe
 * @package yesai\subscribes
 */
class PlatformSubscribe
{

    public function handle()
    {

    }

    /**
     * 添加平台访问记录
     * @param $event
     */
    public function onPlatformVisit($event)
    {
        list($platformInfo, $type) = $event;
        if (strtolower(app('request')->controller()) != 'index') SystemLog::platformVisit($platformInfo->user_id, $platformInfo->account, $type);
    }

    /**
     * 添加平台最后登录时间和ip
     * @param $event
     */
    public function onPlatformLoginAfter($event)
    {
        list($platformInfo) = $event;
        CrmUsers::edit(['last_ip' => app('request')->ip(), 'last_login' => time()], $platformInfo['user_id']);
    }

    /**
     * 平台注册成功之后
     * @param $event
     */
    public function onMerchantpRegisterAfter($event)
    {
        list($merchantInfo) = $event;
    }

}