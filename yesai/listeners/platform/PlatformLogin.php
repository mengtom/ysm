<?php


namespace yesai\listeners\platform;

use app\models\crm\CrmSystemLog as SystemLog;
use yesai\interfaces\ListenerInterface;

class PlatformLogin implements ListenerInterface
{
    /**
     * 用户成功登录后
     * @param $event
     */
    public function handle($event): void
    {
        [$platform, $token,$type] = $event;

        if (strtolower(app('request')->controller()) != 'index') SystemLog::ApipVisit($platform->user_id, $platform->p_name, $type,$token);
    }
}