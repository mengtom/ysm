<?php
/**
 *
 * @author: tom
 * @day: 2020/09/28
 */

namespace app\models\crm;

use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;

/**
 * TODO 订单记录Model
 * Class CrmOrderMicrochip
 * @package app\models\crm
 */
class CrmOrderMicrochip extends BaseModel
{
    /**
     * 模型名称
     * @var string
     */
    protected $name = 'crm_order_microchip';

    use ModelTrait;
    public static function setOrderMicrochipInfo($order_id,array $micros)
    {
        $group = [];
        foreach ($micros as $micro){
            $group[] = [
                'order_id'=>$order_id,
                'micro_id'=>$micro['id'],
                'num'=>$micro['num'],
                'micro_name'=>$micro['micro_name'],
                'micro_code'=>$micro['code'],
                'micro_price'=>$micro['micro_price'],
                'micro_info'=>$micro['micro_info'],
                'unique'=>$micro['unique'],
                'total_dose'=>$micro['total_dose'],
                'total_price'=>$micro['total_price'],
            ];
        }
        return self::setAll($group);
    }

    public static function getProductNameList($oid)
    {
        $cartInfo = self::where('oid',$oid)->select();
        $goodsName = [];
        foreach ($cartInfo as $cart){
            $suk = isset($cart['cart_info']['productInfo']['attrInfo']) ? '('.$cart['cart_info']['productInfo']['attrInfo']['suk'].')' : '';
            $goodsName[] = $cart['cart_info']['productInfo']['store_name'].$suk;
        }
        return $goodsName;
    }

}