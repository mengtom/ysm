<?php
namespace app\institu\model\crm;
use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
use app\institu\model\crm\CrmUsers;
/**
 * 用户管理 model
 * Class User
 * @package app\institu\model\user
 */
class CrmUsersGroup extends BaseModel
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
    protected $name = 'crm_users_group';
    use ModelTrait;
    /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelObject($where=[]){
        $model=new self;
        if(!empty($where)){
            $model=$model->where('is_del',0);
            if(isset($where['platform_id']) && trim($where['platform_id'])!=''){
                $model=$model->where('platform_id',$where['platform_id']);
            }
            if(isset($where['type']) && $where['type'] !=''){
                $model=$model->where('type',$where['type']);
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('id desc');
            }
        }
        return $model;
    }
    /*
     * 查询用户vip列表
     * @param array $where
     * */
    public static function groupList($where)
    {
        $model=self::getModelObject($where)->withoutField('is_del,platform_id');
        if(isset($where['page']) && isset($where['limit'])) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as &$item) {
            $item['num']=CrmUsers::where(['group'=>$item['id']])->count();
        }unset($item);
        $count=self::getModelObject($where)->count();
        return compact('data','count');
    }

    /*
     * 清除会员等级
     * @paran int $uid
     * @paran boolean
     * */
    public static function cleanUpLevel($uid)
    {
        self::rollbackTrans();
        $res=false !== self::where('uid', $uid)->update(['is_del'=>1]);
        $res= $res && UserTaskFinish::where('uid', $uid)->delete();
        if($res){
            User::where('uid', $uid)->update(['clean_time'=>time()]);
            self::commitTrans();
            return true;
        }else{
            self::rollbackTrans();
            return self::setErrorInfo('清除失败');
        }
    }

}