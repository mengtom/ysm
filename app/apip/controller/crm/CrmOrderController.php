<?php
namespace app\apip\controller\crm;

use app\platform\model\system\SystemAttachment;
use app\models\routine\RoutineFormId;
use yesai\repositories\OrderRepository;
use app\models\crm\{
    // StoreBargainUser,
    // StoreCouponUser,
    CrmOrder,
    //StoreOrderCartInfo,
    CrmOrderStatus
    //StorePink,
    //StoreProductReply
    };
use app\models\microchip\microchip;
use app\models\system\SystemStore;
// use app\models\user\UserAddress;
// use app\models\user\UserLevel;
use app\Request;
use yesai\services\{
    CacheService,
    ExpressService,
    SystemConfigService,
    UtilService
};

/**
 * Crm订单类
 * Class StoreOrderController
 * @package app\apip\controller\crm
 */
class CrmOrderController
{

    /**
     * 订单创建
     * @param Request $request
     * @param $key
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function create(Request $request,$order_sn)
    {
        $key= htmlspecialchars($order_sn);
        if (!$key) return app('json')->fail('参数错误!');
        $pid = $request->pid();
        $uid = $request->platform()->user_id;
        if (CrmOrder::be(['order_sn|unique' => $order_sn,'user_id'=>$uid, 'platform_leader' => $pid, 'is_del' => 0]))
            return app('json')->fail('请勿重复提交订单', ['order_sn' => $key]);
        list($user_phone, $user_address,$idcard,$real_name, $total_num,$symptom,$user_phone2, $taking_quency, $taking_time, $taking_cycle, $taking_suggest,$taking_remark, $price, $total_price, $pay_price,$freight_price,$pay_postage,$paid,$pay_time,$status,$refund_status,$refund_reason_wap_explain,$refund_reason_time,$refund_price,$refund_reason,$delivery_name,$delivery_id,$order_type,$microchip_json,$pay_type,$trade_no,$order_name) = UtilService::postMore([
            'user_phone', 'user_address',['idcard',''],'real_name',['total_num',0], ['symptom',0],['user_phone2',''], ['taking_quency',0], ['taking_time', ''], ['taking_cycle', 0], ['taking_suggest', ''],['taking_remark',''], ['price', 0], ['total_price', 0], ['pay_price',0],
            ['freight_price',0],['pay_postage',0],['paid',false],'pay_time',['status',''],['refund_status',''],['refund_reason_wap_explain',''],['refund_reason_time',0],['refund_price',0],['refund_reason',''],['delivery_name',''],['delivery_id',''],['order_type',false],['microchip_json',''],'pay_type','trade_no','order_name'
        ], $request, true);
        $paid = $paid ? 1: 0;
        $pay_type = strtolower($pay_type);  //订单类型转换小写
        $status   = strtoupper($status); // 订单状态转换大写
        $pay_time = $pay_time ? strtotime($pay_time) : 0;
        // $add_time = $add_time ? strtotime($add_time) : time();
        $microchip = json_decode($microchip_json,true);
        //定义公共数组
        $order_data=['user_phone'=>$user_phone,'real_name'=>$real_name,'total_num'=>$total_num,'taking_quency'=>$taking_quency,'taking_time'=>$taking_time,'taking_cycle'=>$taking_cycle,'taking_suggest'=>$taking_suggest,'taking_remark'=>$taking_remark,'price'=>$price,'total_price'=>$total_price,'status'=>$status,'order_name'=>$order_name];
        $OrderValidate=new \app\http\validates\crm\OrderValidate;
        if($order_type){ // 采购单
            $order_type = 0;
            $order_data=array_merge($order_data,['idcard'=>$idcard,'user_phone2'=>$user_phone2,'user_address'=>$user_address,'delivery_name'=>$delivery_name,'delivery_id'=>$delivery_id,'pay_type'=>$pay_type,'pay_time'=>$pay_time,'pay_price'=>$pay_price,'trade_no'=>$trade_no,'freight_price'=>$freight_price,'pay_postage'=>$pay_postage,'paid'=>$paid,'refund_status'=>$refund_status,'refund_reason_wap_explain'=>$refund_reason_wap_explain,'refund_reason_time'=>$refund_reason_time,'refund_price'=>$refund_price,'refund_reason'=>$refund_reason]);
            $doVa=$OrderValidate->scene('purchase')->check($order_data);  //验证参数
            if(!$doVa){
                return app('json')->fail($OrderValidate->getError());            }
        }else{ // 处方单
            $order_type = 1;
            array_push($order_data,['symptom'=>$symptom]);
            $doVa=$OrderValidate->scene('prescription')->check($order_data);
            if(!$doVa){
                return app('json')->fail($OrderValidate->getError());
            }
        }
        $order_data['order_type']= $order_type;
        $order_data['platform_leader']=$pid;
        foreach($microchip as &$item){
            $microchipInfo=microchip::checkPlatformMicrochip(['code'=>$item['code'],'platform_id'=>$pid]);
            if(!$microchipInfo)
                return app('json')->status('400', '微片不存在', ['code' => $item['code']]);
            if(!is_numeric($item['num']) && !isset($item['num']))
                return app('json')->status('400', '微片数量格式错误', ['code' => $item['code']]);
            if(!is_numeric($item['total_dose']) && !isset($item['total_dose']))
                return app('json')->status('400', '微片剂量格式错误', ['code' => $item['code']]);
            if(!is_numeric($item['micro_price']) && !isset($item['micro_price']))
                return app('json')->status('400', '微片单价格式错误', ['code' => $item['code']]);
            if(!is_numeric($item['total_price']) && !isset($item['total_price']))
                return app('json')->status('400', '单剂价格格式错误', ['code' => $item['code']]);
            $item['micro_id'] = $microchipInfo['id'];
            $item['micro_name'] = $microchipInfo['zn_name'];
            $item['micro_info'] = json_encode($microchipInfo);
            $item['unique'] = $key;
            $item['id'] = $microchipInfo['id'];
        }unset($item);
        $order = CrmOrder::cacheKeyCreatePurcharseOrder($order_type,$uid, $key, $order_data,$microchip);
         event('OrderCreated', [$order]);
        if($order === false) return app('json')->fail(CrmOrder::getErrorInfo('订单生成失败'));
        $orderId = $order['id'];
        $info = compact('order_sn');

        if ($orderId) {
            event('OrderCreated', [$order]); //订单创建成功事件
            event('ShortMssageSend',[$orderId,'AdminPlaceAnOrder']);//发送管理员通知
            return app('json')->status('success', '订单创建成功', ['order_sn' => $key]);
        } else return app('json')->fail(CrmOrder::getErrorInfo('订单生成失败!'));
    }
        /**
     * 订单收货
     * @param Request $request
     * @return mixed
     */
    public function take(Request $request)
    {

        list($order_sn) = UtilService::postMore([
            ['order_sn',''],
        ],$request,true);
        $uid = $request->platform()->user_id;
        if(!$order_sn || !($order = CrmOrder::getUserOrderDetail($uid,$order_sn)))  return app('json')->fail('订单不存在!',['order_sn' => $key]);
        $res = CrmOrder::takeOrder($order_sn, $uid);
        if($res)
            return app('json')->successful();
        else
            return app('json')->fail(CrmOrder::getErrorInfo());
    }

}