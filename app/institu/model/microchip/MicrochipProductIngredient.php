<?php
/**
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/12/08
 */

namespace app\institu\model\microchip;

use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use think\facade\Db;
use app\institu\model\label\Label as CategoryModel;
class MicrochipProductIngredient extends BaseModel
{

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'microchip_product_ingredient';

    use ModelTrait;

    protected function setAttrValuesAttr($value)
    {
        return is_array($value) ? implode(',',$value) : $value;
    }

    protected function getAttrValuesAttr($value)
    {
        return explode(',',$value);
    }
    /**
     * 新增微片成分
     * @param  [type]  $result       [description]
     * @param  [type]  $microchip_id [description]
     * @param  integer $type         [description]
     * @return [type]                [description]
     */
    public static function createIngredient($result,$microchip_id,$type=0)
    {

        foreach ($result as $index=>$value){
            if(!isset($index) || intval($index) !== $index) return self::setErrorInfo('请填写正确的成分信息');
            if(!isset($value['name']) || empty($value['name']) || !isset($value['code']) || empty($value['code'])) return self::setErrorInfo('请选择正确的成分信息');
            if(!$product=Db::name('microchip_ingredient')->where('id',$index)->find()) return self::setErrorInfo('请填写正确的成分信息');

            if(!isset($value['dose']) || !(float)$value['dose'] || (float)$value['dose'] != $value['dose'])
                return self::setErrorInfo('请填写正确的成分剂量');
            if(!isset($value['unit']) || empty($value['unit']))
                return self::setErrorInfo('请填写正确的成分单位');

            $value['add_time']=time();
            $value['ingredient_id']=$index;
            $value['microchip_id']=$microchip_id;
            $value['cate_id']=$product['cate_id'];
            $value['type']=$type;
            $result[$index] = $value;
        }unset($value);
        if(!self::clearIngredient($microchip_id,$type)) return false;
        $Model = new self;
        $res = false !== $Model->insertAll($result);
        if($res)
            return true;
        else
            return self::setErrorInfo('编辑成分属性失败!');
    }

    public static function clearIngredient($microchip_id,$type=0)
    {
        if (empty($microchip_id) && $microchip_id != 0) return self::setErrorInfo('成分不存在!');
        $res = false !== self::where('microchip_id',$microchip_id)->where('type',$type)->delete();
        if(!$res)
            return self::setErrorInfo('清除旧微片构成失败!');
        else
            return true;
    }

    /**
     * 获取微片成分
     * @param $productId
     * @return array|bool|null|\think\Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getIngredient($microchip_id,$type='')
    {
        if (empty($microchip_id) && $microchip_id != 0) return self::setErrorInfo('成分不存在!');
        $count = self::where('microchip_id',$microchip_id)->count();
        if(!$count) return self::setErrorInfo('成分不存在!');
        $model=self::where('microchip_id',$microchip_id);
        if($type !== '' && $type >=0 ) $model=$model->where('cate_id',$type);
        return $model->select()->toArray();
    }
     /*
     * 获取使用成分的微片列表
     * @param $where array
     * @return array
     *
     */
    public static function MicrochopList($where){
        $model=self::getModelObject($where)->field('m.code,m.zn_name,m.en_name,m.cate_id,m.is_show as status,m.cate2_name,m.cate3_name,m.dose_min,m.dose_max,m.dose,m.unit');
        if($where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as &$item){
            $cate1Name = CategoryModel::where('id', '=', $item['cate_id'])->value('title');
            $item['cate1_name']=$cate1Name;
            $item['dose_range']=$item['dose_min']." - ".$item['dose_max'];
        }
        unset($item);
        if($where['excel']==1){
            $export = [];
            foreach ($data as $index=>$item){
                $export[] = [
                    $item['store_name'],
                    $item['store_info'],
                    $item['cate_name'],
                    '￥'.$item['price'],
                    $item['stock'],
                    $item['sales'],
                    $item['like'],
                    $item['collect']
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
     /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelObject($where=[]){
        $model=new self();
        $model=$model->alias('i')->join('MicrochipProduct m','i.microchip_id=m.id','LEFT');
        if(!empty($where)){
            $model=$model->group('m.id');
            if(isset($where['ingredient_id']) && $where['ingredient_id'] !=''){
                $model = $model->where('ingredient_id',$where['ingredient_id']);
            }
            // if(isset($where['store_name']) && $where['store_name']!=''){
            //     $model = $model->where('i.store_name|i.keyword|i.id','LIKE',"%$where[store_name]%");
            // }
//             if(isset($where['cate_id']) && trim($where['cate_id'])!=''){
//                 $catid1 = $where['cate_id'].',';//匹配最前面的cateid
//                 $catid2 = ','.$where['cate_id'].',';//匹配中间的cateid
//                 $catid3 = ','.$where['cate_id'];//匹配后面的cateid
//                 $catid4 = $where['cate_id'];//匹配全等的cateid
// //                $model = $model->whereOr('i.cate_id','LIKE',["%$catid%",$catidab]);
//                 $sql = " LIKE '$catid1%' OR `cate_id` LIKE '%$catid2%' OR `cate_id` LIKE '%$catid3' OR `cate_id`=$catid4";
//                 $model->where(self::getPidSql($where['cate_id']));
//             }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('m.sort desc,m.id desc');
            }
        }
        return $model;
    }
}