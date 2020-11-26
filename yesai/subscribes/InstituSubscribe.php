<?php

namespace yesai\subscribes;
use app\institu\model\system\SystemInsittu;
use app\institu\model\crm\CrmUsers;
use app\institu\model\crm\CrmSystemLog as SystemLog;

/**
 * 后台系统事件
 * Class SystemSubscribe
 * @package yesai\subscribes
 */
class InstituSubscribe
{

    public function handle()
    {

    }

    /**
     * 添加平台访问记录
     * @param $event
     */
    public function onInstituVisit($event)
    {
        list($instituInfo, $type) = $event;

        if (strtolower(app('request')->controller()) != 'index') SystemLog::instituVisit($instituInfo->user_id, $instituInfo->account, $type);
    }

    /**
     * 添加平台最后登录时间和ip
     * @param $event
     */
    public function onInstituLoginAfter($event)
    {
        list($instituInfo) = $event;
        SystemInsittu::edit(['last_ip' => app('request')->ip(), 'last_login' => time()], $instituInfo['user_id']);
    }

    /**
     * 平台注册成功之后
     * @param $event
     */
    public function onMerchantpRegisterAfter($event)
    {
        list($instituInfo) = $event;
    }

}