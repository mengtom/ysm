<?php
/**
 *
 * @author: Tom
 * @day: 2020/09/25
 */

namespace app\models\crm;

use app\admin\model\store\StoreProductAttrValue as StoreProductAttrValueModel;
use app\models\system\SystemUserLevel;
use app\models\user\UserLevel;
use yesai\basic\BaseModel;
use yesai\services\SystemConfigService;
use yesai\services\workerman\ChannelService;
use yesai\traits\ModelTrait;
use think\facade\Db;

/**
 * TODO 微片Model
 * Class CrmPlatformMicrochip
 * @package app\models\crm
 */
class CrmPlatformMicrochip extends BaseModel
{
    /**
     * 数据表主键
     * @var string
     */
    // protected $pk = 'id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'crm_platform_microchip';

    use  ModelTrait;
    public static function getMicrochipList($data, $pid)
    {
        // $sId = $data['sid'];
        // $cId = $data['cid'];
        // $keyword = $data['keyword'];
        // $priceOrder = $data['priceOrder'];
        // $salesOrder = $data['salesOrder'];
        // $news = $data['news'];
        $page = 0;
        $limit = 0;
        // $type = $data['type']; // 某些模板需要购物车数量 1 = 需要查询，0 = 不需要
        $model = self::alias('pm')->join('microchip_product m','m.id=pm.micro_id');
        $model= $model ->where('pm.platform_id',$pid)->where('pm.status', 1);
        if (!empty($keyword)) $model->where('keyword|store_name', 'LIKE', htmlspecialchars("%$keyword%"));
        $baseOrder = '';
        // if ($priceOrder) $baseOrder = $priceOrder == 'desc' ? 'price DESC' : 'price ASC';
        // //if($salesOrder) $baseOrder = $salesOrder == 'desc' ? 'sales DESC' : 'sales ASC';//真实销量
        // if ($salesOrder) $baseOrder = $salesOrder == 'desc' ? 'sales DESC' : 'sales ASC';//虚拟销量
        if ($baseOrder) $baseOrder .= ', ';
        $model->order($baseOrder . 'pm.micro_id DESC, pm.add_time DESC');
        $list = $model->page((int)$page, (int)$limit)->field('m.zn_name,m.en_name,m.microchip_info,m.references,m.code,pm.sell_price as price,m.scientific_zn_name,m.scientific_en_name,m.microchip_info_en,m.microchip_info_zn,m.effects_zn,m.effects_en,m.unit,m.day_max,m.dose_min,m.dose_max,m.dose,m.facts_name,m.amount,m.facts_daily,m.facts_unit,m.cate1_name,m.cate2_name,m.cate3_name,m.id')->select()->each(function ($item) use ($pid) {
            $item['ingredient']=Db::name('microchip_product_ingredient')->alias('mi')->join('microchip_ingredient i','i.id = mi.ingredient_id')
            ->where('mi.microchip_id',$item['id'])
            ->where('i.is_del',0)
            ->field('i.zn_name,i.en_name,mi.code,i.cate_name')
            ->select()->toArray();
            unset($item['id']);
        });
        $list = count($list) ? $list->toArray() : [];
        return self::setPlatformPrice($list, $pid);
    }

    /**
     * 设置会员价格
     * @param object | array $list 产品列表
     * @param int $pid 用户pid
     * @return array
     * */
    public static function setPlatformPrice($list, $pid, $isSingle = false)
    {
        // if (is_object($list)) $list = count($list) ? $list->toArray() : [];
        // if (!sys_config('vip_open')) {
        //     if (is_array($list)) return $list;
        //     return $isSingle ? $list : 0;
        // }
        // $levelId = UserLevel::getUserLevel($pid);
        // if ($levelId) {
        //     $discount = UserLevel::getUserLevelInfo($levelId, 'discount');
        //     $discount = bcsub(1, bcdiv($discount, 100, 2), 2);
        // } else {
        //     $discount = SystemUserLevel::getLevelDiscount();
        //     $discount = bcsub(1, bcdiv($discount, 100, 2), 2);
        // }
        // //如果不是数组直接执行减去会员优惠金额
        // if (!is_array($list))
        //     //不是会员原价返回
        //     if ($levelId)
        //         //如果$isSingle==true 返回优惠后的总金额，否则返回优惠的金额
        //         return $isSingle ? bcsub($list, bcmul($discount, $list, 2), 2) : bcmul($discount, $list, 2);
        //     else
        //         return $isSingle ? $list : 0;
        // //当$list为数组时$isSingle==true为一维数组 ，否则为二维
        // if ($isSingle)
        //     $list['vip_price'] = isset($list['price']) ? bcsub($list['price'], bcmul($discount, $list['price'], 2), 2) : 0;
        // else
        //     foreach ($list as &$item) {
        //         $item['vip_price'] = isset($item['price']) ? bcsub($item['price'], bcmul($discount, $item['price'], 2), 2) : 0;
        //     }
        return $list;
    }




    /**
     * 加销量减销量
     * @param $num
     * @param $productId
     * @param string $unique
     * @return bool
     */
    public static function decProductStock($num, $productId, $unique = '')
    {
        if ($unique) {
            $res = false !== StoreProductAttrValueModel::decProductAttrStock($productId, $unique, $num);
            $res = $res && self::where('id', $productId)->inc('sales', $num)->update();
        } else {
            $res = false !== self::where('id', $productId)->dec('stock', $num)->inc('sales', $num)->update();
        }
        if ($res) {
            $stock = self::where('id', $productId)->value('stock');
            $replenishment_num = sys_config('store_stock') ?? 0;//库存预警界限
            if ($replenishment_num >= $stock) {
                try {
                    ChannelService::instance()->send('STORE_STOCK', ['id' => $productId]);
                } catch (\Exception $e) {
                }
            }
        }
        return $res;
    }

    /**
     * 减少销量,增加库存
     * @param int $num 增加库存数量
     * @param int $productId 产品id
     * @param string $unique 属性唯一值
     * @return boolean
     */
    public static function incProductStock($num, $productId, $unique = '')
    {
        $product = self::where('id', $productId)->field(['sales', 'stock'])->find();
        if (!$product) return true;
        if ($product->sales > 0) $product->sales = bcsub($product->sales, $num, 0);
        if ($product->sales < 0) $product->sales = 0;
        if ($unique) {
            $res = false !== StoreProductAttrValueModel::incProductAttrStock($productId, $unique, $num);
            //没有修改销量则直接返回
            if ($product->sales == 0) return true;
            $res = $res && $product->save();
        } else {
            $product->stock = bcadd($product->stock, $num, 0);
            $res = false !== $product->save();
        }
        return $res;
    }

    /**
     * 获取产品分销佣金最低和最高
     * @param $storeInfo
     * @param $productValue
     * @return int|string
     */
    public static function getPacketPrice($storeInfo, $productValue)
    {
        $store_brokerage_ratio = sys_config('store_brokerage_ratio');
        $store_brokerage_ratio = bcdiv($store_brokerage_ratio, 100, 2);
        if (count($productValue)) {
            $Maxkey = self::getArrayMax($productValue, 'price');
            $Minkey = self::getArrayMin($productValue, 'price');

            if (isset($productValue[$Maxkey])) {
                $value = $productValue[$Maxkey];
                if ($value['cost'] > $value['price'])
                    $maxPrice = 0;
                else
                    $maxPrice = bcmul($store_brokerage_ratio, bcsub($value['price'], $value['cost']), 0);
                unset($value);
            } else $maxPrice = 0;

            if (isset($productValue[$Minkey])) {
                $value = $productValue[$Minkey];
                if ($value['cost'] > $value['price'])
                    $minPrice = 0;
                else
                    $minPrice = bcmul($store_brokerage_ratio, bcsub($value['price'], $value['cost']), 0);
                unset($value);
            } else $minPrice = 0;
            if ($minPrice == 0 && $maxPrice == 0)
                return 0;
            else if ($minPrice == 0 && $maxPrice)
                return $maxPrice;
            else if ($maxPrice == 0 && $minPrice)
                return $minPrice;
            else
                return $minPrice . '~' . $maxPrice;
        } else {
            if ($storeInfo['cost'] < $storeInfo['price'])
                return bcmul($store_brokerage_ratio, bcsub($storeInfo['price'], $storeInfo['cost']), 2);
            else
                return 0;
        }
    }

    /**
     * 获取二维数组中最大的值
     * @param $arr
     * @param $field
     * @return int|string
     */
    public static function getArrayMax($arr, $field)
    {
        $temp = [];
        foreach ($arr as $k => $v) {
            $temp[] = $v[$field];
        }
        $maxNumber = max($temp);
        foreach ($arr as $k => $v) {
            if ($maxNumber == $v[$field]) return $k;
        }
        return 0;
    }

    /**
     * 获取二维数组中最小的值
     * @param $arr
     * @param $field
     * @return int|string
     */
    public static function getArrayMin($arr, $field)
    {
        $temp = [];
        foreach ($arr as $k => $v) {
            $temp[] = $v[$field];
        }
        $minNumber = min($temp);
        foreach ($arr as $k => $v) {
            if ($minNumber == $v[$field]) return $k;
        }
        return 0;
    }

    /**
     * TODO 获取某个字段值
     * @param $id
     * @param string $field
     * @return mixed
     */
    public static function getProductField($id, $field = 'store_name')
    {
        if (is_array($id))
            return self::where('id', 'in', $id)->field($field)->select();
        else
            return self::where('id', $id)->value($field);
    }

}