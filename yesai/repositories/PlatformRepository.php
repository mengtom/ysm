<?php

namespace yesai\repositories;

use app\admin\model\system\SystemAttachment;
use app\models\crm\Platform;
// use app\models\crm\platformAddress;
use app\models\crm\PlatformToken;
use yesai\exceptions\AuthException;
use think\db\exception\ModelNotFoundException;
use think\db\exception\DataNotFoundException;
use think\exception\DbException;

/**
 * Class platformRepository
 * @package yesai\repositories
 */
class PlatformRepository
{
    /**
     * 管理员后台给用户添加金额
     * @param $platform
     * $platform 用户信息
     * @param $money
     * $money 添加的金额
     */
    public static function adminAddMoney($platform, $money)
    {

    }

    /**
     * 管理员后台给用户减少金额
     * @param $platform
     * $platform 用户信息
     * @param $money
     * $money 减少的金额
     */
    public static function adminSubMoney($platform, $money)
    {

    }

    /**
     * 管理员后台给用户增加的积分
     * @param $platform
     * $platform 用户信息
     * @param $integral
     * $integral 增加的积分
     */
    public static function adminAddIntegral($platform, $integral)
    {

    }

    /**
     * 管理员后台给用户减少的积分
     * @param $platform
     * $platform 用户信息
     * @param $integral
     * $integral 减少的积分
     */
    public static function adminSubIntegral($platform, $integral)
    {

    }

    /**
     * 获取授权信息
     * @param string $token
     * @return array
     * @throws AuthException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function parseToken($token): array
    {
        if (!$token || !$tokenData = platformToken::where('token', $token)->find())
            throw new AuthException('请登录', 410000);
        try {
            [$platform, $type] = platform::parseToken($token);
        } catch (\Throwable $e) {
            //$tokenData->delete();
            throw new AuthException('登录已过期,请重新登录', 410001);
        }
        if (!$platform || $platform->id != $tokenData->platform_id) {
            //$tokenData->delete();
            throw new AuthException('登录状态有误,请重新登录', 410002);
        }
        $tokenData->type = $type;
        event('PlatformLogin', [$platform, $token,'apip']);
        return compact('platform', 'tokenData');
    }
    /**
     * 订单创建成功后
     * @param $order
     * @param $group
     */
    public static function storeProductOrderCreateEbApi($order,$group)
    {
        if(!platformAddress::be(['is_default'=>1,'uid'=>$order['uid']])) platformAddress::setDefaultAddress($group['addressId'],$order['uid']);
    }
}