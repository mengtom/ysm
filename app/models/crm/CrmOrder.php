<?php
/**
 *
 * @author: tom
 * @day: 2020/09/27
 */

namespace app\models\crm;

use app\models\crm\CrmOrderMicrochip as OrderMicrochip;
use app\models\system\SystemStore;
use app\models\routine\RoutineTemplate;
use yesai\repositories\GoodsRepository;
use yesai\repositories\PaymentRepositories;
use app\models\user\User;
use app\models\user\UserAddress;
use app\models\user\UserBill;
use app\models\user\WechatUser;
use yesai\basic\BaseModel;
use yesai\repositories\OrderRepository;
use yesai\repositories\UserRepository;
use yesai\services\MiniProgramService;
use yesai\services\SystemConfigService;
use yesai\services\WechatService;
use yesai\services\WechatTemplateService;
use yesai\services\workerman\ChannelService;
use think\facade\Cache;
use yesai\traits\ModelTrait;
use think\facade\Log;
use think\facade\Route;

/**
 * TODO 订单Model
 * Class StoreOrder
 * @package app\models\store
 */
class CrmOrder extends BaseModel
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
    protected $name = 'crm_order';

    use ModelTrait;

    protected $insert = ['add_time'];

    protected static $payType = ['weixin' => '微信支付', 'bank' => '银行卡', 'offline' => '线下支付','alipay'=>'支付宝'];

    protected static $deliveryType = ['send' => '商家配送', 'express' => '快递配送'];
    protected static $payStatus = ['REQUEST_REFUND'=> -1,'REFUNDED'=> -2,'WAIT_PAY'=>0,'WAIT_DELIVERED'=>0,'WAIT_RECEIVED'=>1,'SUCCESS'=>2,'CLOSE'=>-4];
    protected static $refundStatus = ['未退款'=>0,'申请中'=>1,'已退款'=>2];

    /**
     * 生成采购单
     * @param int $order_type
     * @param $uid
     * @param $key
     * @param $data
     * @param array $micro

     * @return CrmOrder|bool|\think\Model
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function cacheKeyCreatePurcharseOrder($order_type,$uid,$key,$data, $micro)
    {
        self::beginTrans();
        try {
            if (self::be(['unique' => $key, 'user_id' => $uid])) return self::setErrorInfo('请勿重复提交订单', true);
            if($data['paid']){
                if(!is_numeric($data['pay_price'])) return self::setErrorInfo('支付金额错误', true);
                if(!is_numeric($data['pay_postage'])) return self::setErrorInfo('支付运费金额错误', true);
                $data['pay_type'] = self::$payType[$data['pay_type']];
            }
            if($data['refund_status']){
                switch ($data['refund_status']) {
                    case '未退款':
                        $refund_status=0;
                        break;
                    case '申请中':
                        $refund_status=1;
                        break;
                    case '已退款':
                        $refund_status=2;
                        break;
                    default:
                        $refund_status=0;
                        break;
                }
            }
            $data['status'] = self::$payStatus[$data['status']];
            $data['api_type'] = 1;
            $data['add_time'] = time();
            $data['user_id'] = $uid;
            $data['unique'] = $key;
            $data['order_sn'] = $key;
            $order_type_name = $data['order_type'] ? '处方单':'采购单';
            $order = self::create($data);
            if (!$order) return self::setErrorInfo($order_type_name.'生成失败!', true);
            //保存商品信息
            $res4 = false !== OrderMicrochip::setOrderMicrochipInfo($order['id'],$micro);
            if (!$res4 ) return self::setErrorInfo($order_type_name.'生成失败!', true); //|| !$res5 || !$res6
            //自动设置默认地址
            // UserRepository::storeProductOrderCreateEbApi($order, compact('cartInfo', 'addressId'));
            // self::clearCacheOrderInfo($uid, $key);
            self::commitTrans();
            // StoreOrderStatus::status($order['id'], 'cache_key_create_order', '$order_type_name."生成');
            return $order;
        } catch (\PDOException $e) {
            self::rollbackTrans();
            return self::setErrorInfo('生成'.$order_type_name.'时SQL执行错误错误原因：' . $e->getMessage());
        } catch (\Exception $e) {
            self::rollbackTrans();
            return self::setErrorInfo('生成'.$order_type_name.'时系统错误错误原因：' . $e->getMessage());
        }
    }
    /**
     * 获取订单详情
     * @param $uid
     * @param $key
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getUserOrderDetail($uid, $key)
    {
        return self::where('order_sn|unique', $key)->where('user_id', $uid)->where('is_del', 0)->find();
    }
    /**
     * //TODO 用户确认收货
     * @param $uni
     * @param $uid
     */
    public static function takeOrder($order_sn, $uid)
    {
        $order = self::getUserOrderDetail($uid, $order_sn);
        if (!$order) return self::setErrorInfo('订单不存在!');
        $order = self::tidyOrder($order);
        if ($order['_status']['_type'] != 2) return self::setErrorInfo('订单状态错误!');
        self::beginTrans();
        if (false !== self::edit(['status' => 2], $order['id'], 'id') &&
            false !== CrmOrderStatus::status($order['id'], 'user_take_delivery', '用户已收货')) {
            try {
                //OrderRepository::storeProductOrderUserTakeDelivery($order, $uid);//订单后置操作
            } catch (\Exception $e) {
                self::rollbackTrans();
                return self::setErrorInfo($e->getMessage());
            }
            self::commitTrans();
            // event('UserLevelAfter', [User::get($order_sn)]);
            // event('UserOrderTake', $order_sn);
            // //短信通知
            // event('ShortMssageSend', [$order['order_id'], ['Receiving', 'AdminConfirmTakeOver']]);
            return true;
        } else {
            self::rollbackTrans();
            return false;
        }
    }
    /**
     * 获取订单状态购物车等信息
     * @param $order
     * @param bool $detail 是否获取订单购物车详情
     * @param bool $isPic 是否获取订单状态图片
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function tidyOrder($order, $detail = false, $isPic = false)
    {
        if ($detail == true && isset($order['id'])) {
            $cartInfo = StoreOrderCartInfo::where('oid', $order['id'])->column('cart_info', 'unique') ?: [];
            $info = [];
            foreach ($cartInfo as $k => $cart) {
                $cart = json_decode($cart, true);
                $cart['unique'] = $k;
                //新增是否评价字段
                $cart['is_reply'] = StoreProductReply::where('unique', $k)->count();
                array_push($info, $cart);
                unset($cart);
            }
            $order['cartInfo'] = $info;
        }
        $status = [];
        if (!$order['paid'] && $order['pay_type'] == 'offline' && !$order['status'] >= 2) {
            $status['_type'] = 9;
            $status['_title'] = '线下付款';
            $status['_msg'] = '等待商家处理,请耐心等待';
            $status['_class'] = 'nobuy';
        } else if (!$order['paid']) {
            $status['_type'] = 0;
            $status['_title'] = '未支付';
            //系统预设取消订单时间段
            /*$keyValue = ['order_cancel_time', 'order_activity_time', 'order_bargain_time', 'order_seckill_time', 'order_pink_time'];
            //获取配置
            $systemValue = SystemConfigService::more($keyValue);
            //格式化数据
            $systemValue = self::setValeTime($keyValue, is_array($systemValue) ? $systemValue : []);
            if ($order['pink_id'] || $order['combination_id']) {
                $order_pink_time = $systemValue['order_pink_time'] ? $systemValue['order_pink_time'] : $systemValue['order_activity_time'];
                $time = bcadd($order['add_time'], $order_pink_time * 3600, 0);
                $status['_msg'] = '请在' . date('m-d H:i:s', $time) . '前完成支付!';
            } else if ($order['seckill_id']) {
                $order_seckill_time = $systemValue['order_seckill_time'] ? $systemValue['order_seckill_time'] : $systemValue['order_activity_time'];
                $time = bcadd($order['add_time'], $order_seckill_time * 3600, 0);
                $status['_msg'] = '请在' . date('m-d H:i:s', $time) . '前完成支付!';
            } else if ($order['bargain_id']) {
                $order_bargain_time = $systemValue['order_bargain_time'] ? $systemValue['order_bargain_time'] : $systemValue['order_activity_time'];
                $time = bcadd($order['add_time'], $order_bargain_time * 3600, 0);
                $status['_msg'] = '请在' . date('m-d H:i:s', $time) . '前完成支付!';
            } else {
                $time = bcadd($order['add_time'], $systemValue['order_cancel_time'] * 3600, 0);
                $status['_msg'] = '请在' . date('m-d H:i:s', $time) . '前完成支付!';
            }
            $status['_class'] = 'nobuy';*/
        } else if ($order['refund_status'] == 1) {
            $status['_type'] = -1;
            $status['_title'] = '申请退款中';
            $status['_msg'] = '商家审核中,请耐心等待';
            $status['_class'] = 'state-sqtk';
        } else if ($order['refund_status'] == 2) {
            $status['_type'] = -2;
            $status['_title'] = '已退款';
            $status['_msg'] = '已为您退款,感谢您的支持';
            $status['_class'] = 'state-sqtk';
        } else if (!$order['status']) {
            // if ($order['pink_id']) {
            //     if (StorePink::where('id', $order['pink_id'])->where('status', 1)->count()) {
            //         $status['_type'] = 1;
            //         $status['_title'] = '拼团中';
            //         $status['_msg'] = '等待其他人参加拼团';
            //         $status['_class'] = 'state-nfh';
            //     } else {
            //         $status['_type'] = 1;
            //         $status['_title'] = '未发货';
            //         $status['_msg'] = '商家未发货,请耐心等待';
            //         $status['_class'] = 'state-nfh';
            //     }
            // } else {
                if ($order['shipping_type'] === 1) {
                    $status['_type'] = 1;
                    $status['_title'] = '未发货';
                    $status['_msg'] = '商家未发货,请耐心等待';
                    $status['_class'] = 'state-nfh';
                }
                // else {
                //     $status['_type'] = 1;
                //     $status['_title'] = '待核销';
                //     $status['_msg'] = '待核销,请到核销点进行核销';
                //     $status['_class'] = 'state-nfh';
                // }
            // }
        } else if ($order['status'] == 1) {
            if ($order['delivery_type'] == 'send') {//TODO 送货
                $status['_type'] = 2;
                $status['_title'] = '待收货';
                $status['_msg'] = date('m月d日H时i分', CrmOrderStatus::getTime($order['id'], 'delivery')) . '服务商已送货';
                $status['_class'] = 'state-ysh';
            } else {//TODO  发货
                $status['_type'] = 2;
                $status['_title'] = '待收货';
                if($order['delivery_type'] == 'fictitious')
                    $_time = CrmOrderStatus::getTime($order['id'], 'delivery_fictitious');
                else
                    $_time = CrmOrderStatus::getTime($order['id'], 'delivery_goods');
                $status['_msg'] = date('m月d日H时i分', $_time) . '服务商已发货';
                $status['_class'] = 'state-ysh';
            }
        } else if ($order['status'] == 2) {
            $status['_type'] = 3;
            $status['_title'] = '待评价';
            $status['_msg'] = '已收货,快去评价一下吧';
            $status['_class'] = 'state-ypj';
        } else if ($order['status'] == 3) {
            $status['_type'] = 4;
            $status['_title'] = '交易完成';
            $status['_msg'] = '交易完成,感谢您的支持';
            $status['_class'] = 'state-ytk';
        }
        if (isset($order['pay_type']))
            $status['_payType'] = isset(self::$payType[$order['pay_type']]) ? self::$payType[$order['pay_type']] : '其他方式';
        if (isset($order['delivery_type']))
            $status['_deliveryType'] = isset(self::$deliveryType[$order['delivery_type']]) ? self::$deliveryType[$order['delivery_type']] : '其他方式';
        $order['_status'] = $status;
        $order['_pay_time'] = isset($order['pay_time']) && $order['pay_time'] != null ? date('Y-m-d H:i:s', $order['pay_time']) : date('Y-m-d H:i:s', $order['add_time']);
        $order['_add_time'] = isset($order['add_time']) ? (strstr($order['add_time'], '-') === false ? date('Y-m-d H:i:s', $order['add_time']) : $order['add_time']) : '';
        $order['status_pic'] = '';
        //获取产品状态图片
        if ($isPic) {
            $order_details_images = \yesai\services\GroupDataService::getData('order_details_images') ?: [];
            foreach ($order_details_images as $image) {
                if (isset($image['order_status']) && $image['order_status'] == $order['_status']['_type']) {
                    $order['status_pic'] = $image['pic'];
                    break;
                }
            }
        }
        $order['offlinePayStatus'] = (int)sys_config('offline_pay_status') ?? (int)2;
        return $order;
    }
    /** 收货后发送模版消息
     * @param $order
     */
    public static function orderTakeAfter($order)
    {
        $title = self::getProductTitle($order['cart_id']);
        if ($order['is_channel'] == 1) {//小程序
            RoutineTemplate::sendOrderTakeOver($order, $title);
        } else {
            $openid = WechatUser::where('uid', $order['uid'])->value('openid');
            \yesai\services\WechatTemplateService::sendTemplate($openid, \yesai\services\WechatTemplateService::ORDER_TAKE_SUCCESS, [
                'first' => '亲，您的订单已收货',
                'keyword1' => $order['order_id'],
                'keyword2' => '已收货',
                'keyword3' => date('Y-m-d H:i:s', time()),
                'keyword4' => $title,
                'remark' => '感谢您的光临！'
            ]);
        }
    }
    /**
     * 查找购物车里的所有产品标题
     * @param $cartId 购物车id
     * @return bool|string
     */
    public static function getProductTitle($cartId)
    {
        $title = '';
        try {
            $orderCart = StoreOrderCartInfo::where('cart_id', 'in', $cartId)->field('cart_info')->select();
            foreach ($orderCart as $item) {
                if (isset($item['cart_info']['productInfo']['store_name'])) {
                    $title .= $item['cart_info']['productInfo']['store_name'] . '|';
                }
            }
            unset($item);
            if (!$title) {
                $productIds = StoreCart::where('id', 'in', $cartId)->column('product_id');
                $productlist = ($productlist = StoreProduct::getProductField($productIds, 'store_name')) ? $productlist->toArray() : [];
                foreach ($productlist as $item) {
                    if (isset($item['store_name'])) $title .= $item['store_name'] . '|';
                }
            }
            if ($title) $title = substr($title, 0, strlen($title) - 1);
            unset($item);
        } catch (\Exception $e) {
        }
        return $title;
    }
}