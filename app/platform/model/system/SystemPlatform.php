<?php
/**
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/11/11
 */

namespace app\platform\model\system;

use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
use think\facade\Session;

/**
 * Class SystemAdmin
 * @package app\platform\model\system
 */
class SystemPlatform extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_platform';

    use ModelTrait;

    protected $insert = ['add_time'];

    public static function setAddTimeAttr($value)
    {
        return time();
    }

    public static function setRolesAttr($value)
    {
        return is_array($value) ? implode(',', $value) : $value;
    }


    /**
     * 用户登陆
     * @param $account
     * @param $pwd
     * @return bool
     */
    public static function login($account,$pwd)
    {
        $platformInfo = self::get(compact('account'));

        if(!$platformInfo) return self::setErrorInfo('登陆的账号不存在!');
        if($platformInfo['pwd'] != md5($pwd)) return self::setErrorInfo('账号或密码错误，请重新输入');
        if(!$platformInfo['status']) return self::setErrorInfo('该账号已被关闭!');
        self::setLoginInfo($platformInfo);
        event('SystemAdminLoginAfter',[$platformInfo]);
        return true;
    }

    /**
     *  保存当前登陆用户信息
     */
    public static function setLoginInfo($platformInfo)
    {
        Session::set('platformId',$platformInfo['id']);
        Session::set('platformInfo',$platformInfo->toArray());
        Session::save();
    }

    /**
     * 清空当前登陆用户信息
     */
    public static function clearLoginInfo()
    {
        Session::delete('platformInfo');
        Session::delete('platformId');
        Session::save();
    }

    /**
     * 检查用户登陆状态
     * @return bool
     */
    public static function hasActiveAdmin()
    {
        return Session::has('platformId') && Session::has('platformInfo');
    }

    /**
     * 获得登陆用户信息
     * @return mixed
     * @throws \Exception
     */
    public static function activeAdminInfoOrFail()
    {
        $platformInfo = Session::get('platformInfo');
        if(!$platformInfo)  exception('请登陆');
        if(!$platformInfo['status']) exception('该账号已被关闭!');
        return $platformInfo;
    }

    /**
     * 获得登陆用户Id 如果没有直接抛出错误
     * @return mixed
     * @throws \Exception
     */
    public static function activeAdminIdOrFail()
    {
        $platformId = Session::get('platformId');
        if(!$platformId) exception('访问用户为登陆登陆!');
        return $platformId;
    }

    /**
     * @return array|null
     * @throws \Exception
     */
    public static function activeAdminAuthOrFail()
    {
        $platformInfo = self::activeAdminInfoOrFail();
        if(is_object($platformInfo)) $platformInfo = $platformInfo->toArray();
        return $platformInfo['level'] === 0 ? SystemRole::getAllAuth() : SystemRole::rolesByAuth($platformInfo['roles']);
    }

    /**
     * 获得有效管理员信息
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getValidAdminInfoOrFail($id)
    {
        $platformInfo = self::get($id);
        if(!$platformInfo) exception('用户不能存在!');
        if(!$platformInfo['status']) exception('该账号已被关闭!');
        return $platformInfo;
    }

    /**
     * @param string $field
     * @param int $level
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getOrdAdmin($field = 'real_name,id',$level = 0){
        return self::where('level','>=',$level)->field($field)->select();
    }

    public static function getTopAdmin($field = 'real_name,id')
    {
        return self::where('level',0)->field($field)->select();
    }

    /**
     * @param $where
     * @return array
     */
    public static function systemPage($where){
        $model = new self;
        if($where['name'] != '') $model = $model->where('account|real_name','LIKE',"%$where[name]%");
        if($where['roles'] != '') $model = $model->where("CONCAT(',',roles,',')  LIKE '%,$where[roles],%'");
        $model = $model->where('level',$where['level'])->where('is_del',0);
        return self::page($model,function($platform){
            $platform->roles = SystemRole::where('id','IN',$platform->roles)->column('role_name','id');
        },$where);
    }
}