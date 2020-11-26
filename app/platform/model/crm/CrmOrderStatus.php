<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/11/11
 */

namespace app\platform\model\crm;

use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;

/**
 * 订单操作纪律model
 * Class StoreOrderStatus
 * @package app\platform\model\store
 */
class CrmOrderStatus extends BaseModel
{

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'crm_order_status';

    use ModelTrait;

    /**
     * @param $order_id
     * @param $type
     * @param $message
     */
   public static function setStatus($order_id,$type,$message){
       $data['order_id'] = (int)$order_id;
       $data['change_type'] = $type;
       $data['change_message'] = $message;
       $data['change_time'] = time();
       self::create($data);
   }

    /**
     * @param $where
     * @return array
     */
    public static function systemPage($order_id){
        $model = new self;
        $model = $model->where('order_id',$order_id);
        $model = $model->order('change_time asc');
        return self::page($model);
    }
    /**
     * @param $where
     * @return array
     */
    public static function systemPageMer($order_id){
        $model = new self;
        $model = $model->where('order_id',$order_id);
//        $model = $model->where('change_type','LIKE','mer_%');
        $model = $model->order('change_time asc');
        return self::page($model);
    }
}