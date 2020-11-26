<?php
/**
 *
 * @author: Tom
 * @day: 2020/6/10
 */
namespace app\admin\model\label;

use yesai\traits\ModelTrait;
use app\admin\model\label\Label as labelModel;
use yesai\basic\BaseModel;
use yesai\services\UtilService as Util;

/**
 * 标签分类model
 * Class LabelCategory
 * @package app\admin\model\wechat
 */
class LabelCategory extends BaseModel
{
    use ModelTrait;

    protected $pk = 'id';

    protected $name = 'label_category';

    /**
     * 获取系统分页数据   分类
     * @param array $where
     * @return array
     */
    public static function systemPage($where = array()){
        $model = new self;
        if($where['title'] !== '') $model = $model->where('title','LIKE',"%$where[title]%");
        if($where['status'] !== '') $model = $model->where('status',$where['status']);
        $model = $model->where('is_del',0);
        $model = $model->where('hidden',0);
        return self::page($model);
    }

    /**
     * 删除分类
     * @param $id
     * @return bool
     */
    public static function delLabelCategory($id)
    {
        if(count(self::getLabel($id,'*'))>0)
            return self::setErrorInfo('请先删除改分类下的标签!');
        return self::edit(['is_del'=>1],$id,'id');
    }

    /**
     * 获取分类名称和id
     * @return array
     */
    public  static function getField(){
          return self::where('is_del',0)->where('status',1)->where('hidden',0)->column('title','id');
    }
    /**
     * 分级排序列表
     * @param null $model
     * @return array
     */
    public static function getTierList($model = null)
    {
        if($model === null) $model = new self();
        return Util::sortListTier($model->where('is_del',0)->where('status',1)->select()->toArray());
    }

    /**
     * 获取分类底下的标签
     * id  分类表中的分类id
     * return array
     * */
    public static function getLabel($id,$field){
        $res = LabelModel::where('status',1)->where('hidden',0)->column($field,'id');
        $new_res = array();
        foreach ($res as $k=>$v){
            $cid_arr = explode(',',$v['cid']);
            if(in_array($id,$cid_arr)){
                $new_res[$k] = $res[$k];
            }
        }
        return $new_res;
    }

    /**
     * TODO 获取分类
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getLabelCategoryList(){
       $list = self::where('is_del',0)->where('status',1)->select();
       if($list) return $list->toArray();
       return [];
    }

    /**
     * TODO 获取标签分类信息
     * @param $id
     * @param string $field
     * @return mixed
     */
    public static function getLabelCategoryInfo($id, $field = 'title')
    {
        $model = new self;
        if($id) $model = $model->where('id',$id);
        $model = $model->where('is_del',0);
        $model = $model->where('status',1);
        return $model->value($field);
    }

}