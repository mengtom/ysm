<?php
/**
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/12/08
 */

namespace app\doctor\model\crm;

use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use app\doctor\model\label\Label as CategoryModel;
class CrmPlatformMicrochip extends BaseModel
{

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'crm_platform_microchip';

    use ModelTrait;

    /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelObject($where=[]){
        $model=new self();
        $model=$model->alias('pm')->join('CrmPlatform p','p.id=pm.platform_id','LEFT')->join("MicrochipProduct m",'m.id=pm.micro_id','LEFT')->field('m.is_show as status,pm.micro_id,m.dose_min,m.dose_max,m.cate_id,m.code,m.zn_name,m.en_name,m.cate2_name,m.cate1_name,m.cate3_name,m.dose,m.unit,pm.sell_price,pm.platform_price,m.id');
        if(!empty($where)){
            $model=$model->group('m.id');
            if(isset($where['platform']) && $where['platform'] !=''){
                $model = $model->where(['pm.platform_id'=>$where['platform']]);
            }
            if(isset($where['is_show']) && $where['is_show'] !=''){
                $model = $model->where(['m.is_show'=>$where['is_show']]);
            }
            if(isset($where['micro_id']) && $where['micro_id'] !=''){
                $model = $model->where(['pm.micro_id'=>$where['micro_id']]);
            }
            if(isset($where['micro_ids']) && $where['micro_ids'] !=''){
                $model = $model->where('pm.micro_id','IN',$where['micro_ids']);
            }
            if(isset($where['currency']) && $where['currency']!=''){
                $model = $model->where('p.currency',$where['currency']);
            }
            if(isset($where['cate1']) && trim($where['cate1'])!=''){
                $model=$model->where(self::getPidSql($where['cate1'],'m.cate_id'));
            }
            if(isset($where['cate2']) && trim($where['cate2'])!=''){
                $model=$model->where(self::getPidSql($where['cate2'],'m.cate2'));
            }
            if(isset($where['cate3']) && trim($where['cate3'])!=''){
                $model=$model->where(self::getPidSql($where['cate3'],'m.cate3'));
            }
            if(isset($where['keyword']) && $where['keyword']!=''){
                $model = $model->where('m.code|m.zn_name|m.en_name','LIKE',"%{$where['keyword']}%");
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('pm.micro_id desc');
            }
        }
        return $model;
    }

    /**根据cateid查询产品 拼sql语句
     * @param $cateid
     * @return string
     */
    protected static function getCateSql($cateid){
        $lcateid = $cateid.',%';//匹配最前面的cateid
        $ccatid = '%,'.$cateid.',%';//匹配中间的cateid
        $ratidid = '%,'.$cateid;//匹配后面的cateid
        return  " `cate_id` LIKE '$lcateid' OR `cate_id` LIKE '$ccatid' OR `cate_id` LIKE '$ratidid' OR `cate_id`=$cateid";
    }
    /**
     * 获取可用微片
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function getSelectMicrochip($where)
    {
        $model=self::getModelObject($where);
        if(isset($where['page']) && isset($where['limit'])) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as $k => &$va) {
            $va['dose_range']=$va['dose_min'].'-'.$va['dose_max'];
            // $va['cate1_name']=CategoryModel::where('id','=',$va['cate_id'])->value('title');
        }unset($va);
        $count=self::getModelObject($where)->count();
        return compact('count','data');
    }
    /**
     * 获取可用微片
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function getFindMicrochip($where)
    {
        $model=self::getMicrochipObject($where);
        // if(isset($where['page']) && isset($where['limit']) && $where['page'] !='' && $where['limit'] !='') $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->find()) && count($data) ? $data->toArray():[];
        return $data;
    }
       /**
     * 获取微片信息连表MOdel
     * @param $model
     * @return object
     */
    public static function getMicrochipObject($where=[]){
        $model=new self();
        $model=$model->alias('pm')->join("MicrochipProduct m",'m.id=pm.micro_id','LEFT')->field('m.*,pm.sell_price as plat_price,pm.platform_price');
        if(!empty($where)){
            $model=$model->group('m.id');
            if(isset($where['platform_id']) && $where['platform_id'] !=''){
                $model = $model->where(['pm.platform_id'=>$where['platform_id']]);
            }
            if(isset($where['micro_id']) && $where['micro_id'] !=''){
                $model = $model->where(['pm.micro_id'=>$where['micro_id']]);
            }
            if(isset($where['currency']) && $where['currency']!=''){
                $model = $model->where('p.currency',$where['currency']);
            }
            if(isset($where['cate1']) && trim($where['cate1'])!=''){
                $model=$model->where(self::getPidSql($where['cate1'],'m.cate_id'));
            }
            if(isset($where['cate2']) && trim($where['cate2'])!=''){
                $model=$model->where(self::getPidSql($where['cate2'],'m.cate2'));
            }
            if(isset($where['cate3']) && trim($where['cate3'])!=''){
                $model=$model->where(self::getPidSql($where['cate3'],'m.cate3'));
            }
            if(isset($where['keyword']) && $where['keyword']!=''){
                $model = $model->where('m.code|m.zn_name|m.en_name','LIKE',"%{$where['keyword']}%");
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('pm.micro_id desc');
            }
        }
        return $model;
    }
    public static function getMicrochipPrice($where){
        $model=self::getModelObject($where);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        $rmb_price=$usd_price=0;
        foreach ($data as $k => &$va) {
            $rmb_price+=$va['sell_price'];
            $usd_price+=$va['sell_price'];

            // $va['cate1_name']=CategoryModel::where('id','=',$va['cate_id'])->value('title');
        }unset($va);
        return compact('rmb_price','usd_price');
    }
}