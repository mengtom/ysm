<?php

namespace app;

use yesai\services\SystemConfigService;
use yesai\services\GroupDataService;
use yesai\utils\Json;
use think\facade\Db;
use think\Service;

class AppService extends Service
{

    public $bind = [
        'json' => Json::class,
        'sysConfig' => SystemConfigService::class,
        'sysGroupData' => GroupDataService::class
    ];

    public function boot()
    {

    }
}
