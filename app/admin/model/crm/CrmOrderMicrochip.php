<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/12/26
 */

namespace app\admin\model\crm;

use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;

/**
 * TODO 订单记录Model
 * Class StoreOrderCartInfo
 * @package app\models\store
 */
class CrmOrderMicrochip extends BaseModel
{
    /**
     * 模型名称
     * @var string
     */
    protected $name = 'crm_order_microchip';

    use ModelTrait;
    public static function setOrderMicrochipInfo($oid,array $microchipInfo,array $micros)
    {
        $group = [];
        foreach ($microchipInfo as $micro){
            $group[] = [
                'order_id'=>$oid,
                'micro_id'=>$micro['id'],
                'num'=>$micros[$micro['id']],
                'micro_name'=>$micro['zn_name'],
                'micro_code'=>$micro['code'],
                'micro_price'=>$micro['price'],
                'micro_info'=>json_encode($micro),
                'unique'=>md5($micro['id'].''.$oid)
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