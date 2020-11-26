<?php
/**
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/12/08
 */

namespace app\admin\model\crm;

use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use app\admin\model\label\Label as CategoryModel;
use app\admin\model\microchip\MicrochipProduct as ProductModel;
use app\admin\model\system\SystemPlatformConfig as SystemConfig;
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
        $model=$model->alias('pm')->join('CrmPlatform p','p.id=pm.platform_id','LEFT')->join("MicrochipProduct m",'m.id=pm.micro_id','LEFT')->field('m.*,pm.platform_price,pm.sell_price,p.currency,pm.platform_id,pm.status');
        if(!empty($where)){
            $model=$model->group('m.id');
            $model = $model->where(['pm.platform_id'=>$where['id']]);
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
            if(isset($where['micro_id']) && $where['micro_id']){
                $model = $model->where('pm.micro_id',$where['micro_id']);
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('pm.micro_id desc');
            }
        }print_R($model->find());die;
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
        if($where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as $k => &$va) {
            $va['dose_range']=$va['dose_min'].'-'.$va['dose_max'];
            $va['cate1_name']=CategoryModel::where('id','=',$va['cate_id'])->value('title');
            $va['LAY_CHECKED']=$va['status'] == 1 ? true:false;
        }unset($va);
        if($where['excel']==1){
            $export = [];
            foreach ($data as $index=>$item){
                $export[] = [
                    $item['crm_name'],
                    $item['crm_info'],
                    $item['cate_name'],
                    '￥'.$item['price'],
                    $item['stock'],
                    $item['sales'],
                    $item['like'],
                    $item['collect'],
                ];
            }
            PHPExcelService::setExcelHeader(['产品名称','产品简介','产品分类','价格','库存','销量','点赞人数','收藏人数'])
                ->setExcelTile('产品导出','产品信息'.time(),' 生成时间：'.date('Y-m-d H:i:s',time()))
                ->setExcelContent($export)
                ->ExcelSave();
        }
        $count=self::getModelObject($where)->count();
        return compact('count','data');
    }
    public static function getPlatformMicrochip($where){
        $list=ProductModel::ProductList($where);
        $data=$list['data'];
        $config = SystemConfig::getMore(['microchip_discount'],$where['id']);
        foreach($data as &$item){
            $item['currency']=$where['currency'];
            $platform_price=self::where(['platform_id'=>$where['id'],'micro_id'=>$item['id']])->value('platform_price');
            $item['platform_price'] =$platform_price > 0 ? $platform_price: sprintf("%.2f",$item['cost_rmb']/(1-$config['microchip_discount']/100));
            $item['LAY_CHECKED']=self::where(['platform_id'=>$where['id'],'micro_id'=>$item['id']])->value('status') == 1 ? true : false ;
        }unset($item);
        $count=$list['count'];
        return compact('count','data');
    }
    public static function getMicrochipInfo($where){
        $model=self::getModelObject($where);
        $data=($data=$model->find()) && count($data) ? $data->toArray():[];
        return $data;
    }
}