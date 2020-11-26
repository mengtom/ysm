<?php

namespace yesai\subscribes;

use app\doctor\model\crm\CrmUsers;
use app\doctor\model\crm\CrmSystemLog as SystemLog;

/**
 * 后台系统事件
 * Class SystemSubscribe
 * @package yesai\subscribes
 */
class DoctorSubscribe
{

    public function handle()
    {

    }

    /**
     * 添加平台访问记录
     * @param $event
     */
    public function onDoctorVisit($event)
    {
        list($doctorInfo, $type) = $event;

        if (strtolower(app('request')->controller()) != 'index') SystemLog::doctorVisit($doctorInfo->d_id, $doctorInfo->account, $type);
    }

    /**
     * 添加平台最后登录时间和ip
     * @param $event
     */
    public function onDoctorLoginAfter($event)
    {
        list($doctorInfo) = $event;
        CrmUsers::edit(['last_ip' => app('request')->ip(), 'last_login' => time()], $doctorInfo['user_id']);
    }

    /**
     * 平台注册成功之后
     * @param $event
     */
    public function onMerchantpRegisterAfter($event)
    {
        list($doctorInfo) = $event;
    }

}