<?php
/**
 *
 * @author: Tom
 * @day: 2020/6/10
 */
namespace app\doctor\model\label;

use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
use yesai\services\UtilService as Util;
// use think\facade\Db;
/**
 * 标签标签model
 * Class LabelCategory
 * @package app\doctor\model\wechat
 */
class Label extends BaseModel
{
    use ModelTrait;

    protected $pk = 'id';

    protected $name = 'label';

    /**
     * 获取系统分页数据   标签
     * @param array $where
     * @return array
     */
    public static function systemPage($where = array(),$isAjax=false){
        $model = new self;
        // if($where['title'] !== '') $model = $model->where('title','LIKE',"%$where[title]%");
        if($where['cid'] !== '') $model = $model->where('cid',$where['cid']);
        if($where['pid'] !== '') $model = $model->where('pid',$where['pid']);
        $model = $model->where('is_del',0);
        $model = $model->where('hidden',0);
        if($isAjax===true){
            if(isset($where['order']) && $where['order']!=''){
                $model=$model->order(self::setOrder($where['order']));
            }else{
                $model=$model->order('sort desc,id desc');
            }
            return $model;
        }
        return self::page($model,function($item){
            $item['child'] = self::where('is_del',0)->where('pid',$item['id'])->where('status',1)->select()->toArray();
        },$where);
    }

    /**
     * 删除标签
     * @param $id
     * @return bool
     */
    public static function delLabel($id)
    {
        if(count(self::getLabel($id,'*'))>0)
            return self::setErrorInfo('请先删除改标签下的标签!');
        return self::edit(['is_del'=>1],$id,'id');
    }

    /**
     * 获取标签名称和id
     * @return array
     */
    public static function getField(){
          return self::where('is_del',0)->where('status',1)->where('hidden',0)->column('title','id');
    }
    /**
     * 分级排序列表
     * @param null $model
     * @return array
     */
    public static function getTierList($model = null,$type='0')
    {
        if($model === null) $model = new self();
        if(!$type) return Util::sortListTier($model->order('sort desc,id desc')->where('pid', 0)->select()->toArray());
        return Util::sortListTier($model->where('is_del',0)->where('status',1)->select()->toArray());
    }

    /**
     * 获取标签底下的标签
     * id  标签表中的标签id
     * return array
     * */
    public static function getLabel($id,$field){
        $res = self::where('status',1)->where('hidden',0)->column($field,'id');
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
     * TODO 获取标签
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getLabelList(){
       $list = self::where('is_del',0)->where('status',1)->select();
       if($list) return $list->toArray();
       return [];
    }

    /**
     * TODO 获取标签标签信息
     * @param $id
     * @param string $field
     * @return mixed
     */
    public static function getLabelInfo($id, $field = 'title')
    {
        $model = new self;
        if($id) $model = $model->where('id',$id);
        $model = $model->where('is_del',0);
        $model = $model->where('status',1);
        return $model->column($field,'id');
    }
    /**
     * TODO 获取顶级标签
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getFirstLabel(){
       $list = self::where('is_del',0)->where('pid',0)->select();
       if($list) return $list->toArray();
       return [];
    }
    /**
     * 获取所有标签
     * @param array $where
     * @return array
     */
    public static function getAll($where = array()){
        $model = new self;
        // if($where['status'] !== '') $model = $model->where('status',$where['status']);
        if($where['title'] !== '') $model = $model->where('title','LIKE',"%$where[title]%");
        if($where['cid'] !== '') $model = $model->where('cid','in',$where['cid']);
        $model = $model->where('is_del',0)->where('pid',0)->where('status',1)->order('id desc');//where('hidden',0)->
        return self::page($model,function($item){
            // if(!$item['mer_id']) $item['doctor_name'] = '总后台管理员---》'.SystemAdmin::where('id',$item['doctor_id'])->value('real_name');
            // else $item['doctor_name'] = Merchant::where('id',$item['mer_id'])->value('mer_name').'---》'.MerchantAdmin::where('id',$item['doctor_id'])->value('real_name');
            // $item['catename'] = Db::name('LabelCategory')->where('id',$item['cid'])->value('title');
            $child=self::where('is_del',0)->where('pid',$item['id'])->where('status',1)->select()->toArray();
            $child?  $item['child'] =$child:'';
        },$where);
    }
    /*
     * 异步获取分类列表
     * @param $where
     * @return array
     */
    public static function LabelList($where){
        $list=($list=self::systemPage($where,true)->page((int)$where['page'],(int)$where['limit'])->select()) && count($list) ? $list->toArray() :[];
        foreach ($list as &$item){
            $item['child'] = self::where('is_del',0)->where('pid',$item['id'])->where('status',1)->select()->toArray();
            // if($item['pid']){
            //     $item['pid_name'] = self::where('id',$item['pid'])->value('cate_name');
            // }else{
            //     $item['pid_name'] = '顶级';
            // }
        }
        $total=self::systemPage($where,true)->count();
        return compact('total','list');
    }
    /*
     * 获取分类标签
     * @param $where
     * @return array
     */
    public static function getCateList($cid,$type='0'){
        $model=new self;
        $model=$model->where('cid',$cid)->where('is_del',0);
        return self::getTierList($model,$type);
    }
    /**
     * 筛选某个id下的标签
     * @param $model
     * @param $field 字段
     * @param $res  转换字符串
     * @return array
     * 2020-6-29
     */
    public static function getInField($model=null,$field='title',$res=false){
        if($model === null) $model = new self();
        $info=$model->where('is_del',0)->where('status',1)->where('hidden',0)->column($field,'id');
        if(!$res) return $info;
        return implode(',',$info);
    }
     /**
     * 分级排序上下级列表
     * @param null $model
     * @return array
     */
    public static function getChildList($cid = 1)
    {
        $model = new self();
        if($cid!== '') $model = $model->where('cid',$cid);
        $list = $model->where('is_del',0)->where('pid',0)->where('status',1)->order('id desc')->select()->toArray();
        foreach ($list as $key => $v) {
            $child=self::where('is_del',0)->where('pid',$v['id'])->where('status',1)->select()->toArray();
            $child? $list[$key]['child'] =$child:$list[$key]['child']=[];
        }unset($v);
        return $list;


    }
}