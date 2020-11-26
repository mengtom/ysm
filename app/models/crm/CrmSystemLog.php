<?php
/**
 * @author: meng@oneapptech.cn
 * @day: 2020/09/29
 */
namespace app\models\crm;
use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;

/**
 * 平台操作记录
 * Class SystemLog
 * @package app\models\crm\CrmsystemLog
 */
class CrmSystemLog extends BaseModel
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
    protected $name = 'crm_system_log';

    use ModelTrait;

    protected $insert = ['add_time'];

    protected function setAddTimeAttr()
    {
        return time();
    }

    /**
     * 平台接口访问记录
     *
     * @param $platformId
     * @param $platformName
     * @param $type
     * @return SystemLog|\think\Model
     */
    public static function ApipVisit($user_Id,$platformName,$type,$token)
    {
        $request = app('request');
        $module = app('http')->getName();
        $controller = $request->controller();
        $action = $request->action();
        $route = $request->route();
        self::startTrans();
        try{
            $data = [
                'method'=>app('http')->getName(),
                'user_id'=>$user_Id,
                'add_time'=>time(),
                'p_name'=>$platformName,
                'path'=>SystemMenus::getAuthName($action,$controller,$module,$route),
                'page'=>SystemMenus::getVisitName($action,$controller,$module,$route)?:'未知',
                'ip'=>$request->ip(),
                'type'=>$type,
                'token'=>$token,
            ];
            $res = self::create($data);
            if($res){
                self::commit();
                return true;
            }else{
                self::rollback();
                return false;
            }
        }catch (\Exception $e){
            self::rollback();
            return self::setErrorInfo($e->getMessage());
        }

    }


    // /**
    //  * 手动添加平台当前页面访问记录
    //  * @param array $platformInfo
    //  * @param string $page 页面名称
    //  * @return object
    //  */
    // public static function setCurrentVisit($platformInfo, $page)
    // {
    //     $request = app('request');
    //     $module = app('http')->getName();
    //     $controller = $request->controller();
    //     $action = $request->action();
    //     $route = $request->route();
    //     $data = [
    //         'method'=>$request->method(),
    //         'platform_id'=>$platformInfo['id'],
    //         'path'=>SystemMenus::getAuthName($action,$controller,$module,$route),
    //         'page'=>$page,
    //         'ip'=>$request->ip()
    //     ];
    //     return self::create($data);
    // }

    // /**
    //  * 获取平台访问记录
    //  * @param array $where
    //  * @return array
    //  */
    // public static function systemPage($where = array()){
    //     $model = new self;
    //     $model = $model->alias('l');
    //     if($where['pages'] !== '') $model = $model->where('l.page','LIKE',"%$where[pages]%");
    //     if($where['path'] !== '') $model = $model->where('l.path','LIKE',"%$where[path]%");
    //     if($where['ip'] !== '') $model = $model->where('l.ip','LIKE',"%$where[ip]%");
    //     if($where['platform_id'] != '')
    //         $platformIds = $where['platform_id'];
    //     else
    //         $platformIds = SystemAdmin::where('level','>=',$where['level'])->column('id','id');
    //     $model = $model->where('l.platform_id','IN',$platformIds);
    //     if($where['data'] !== ''){
    //         list($startTime,$endTime) = explode(' - ',$where['data']);
    //         $model = $model->where('l.add_time','>',strtotime($startTime));
    //         $model = $model->where('l.add_time','<',strtotime($endTime));
    //     }
    //     $model->where('l.type','system');
    //     $model = $model->order('l.id desc');
    //     return self::page($model,$where);
    // }

    // /**
    //  * 删除超过90天的日志
    //  * @throws \Exception
    //  */
    // public static function deleteLog(){
    //     $model = new self;
    //     $model->where('add_time','<',time()-7776000);
    //     $model->delete();
    // }
}