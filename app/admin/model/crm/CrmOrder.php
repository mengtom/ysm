<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/11/11
 */
namespace app\admin\model\crm;
use app\admin\model\crm\CrmPlatformMicrochip as MicrochipModel;
use app\admin\model\crm\CrmOrderMicrochip as OrderMicrochip;
use app\admin\model\wechat\WechatUser;
use app\admin\model\ump\StorePink;
use app\admin\model\store\StoreProduct;
use app\models\routine\RoutineTemplate;
use app\models\store\StoreCart;
use yesai\services\PHPExcelService;
use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
use yesai\services\WechatTemplateService;
use think\facade\Route as Url;
use think\facade\Db;
use app\admin\model\crm\CrmUsers;
use app\admin\model\user\UserBill;
/**
 * 订单管理Model
 * Class StoreOrder
 * @package app\admin\model\store
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

    public static function orderCount($order_type = 0,$model = null)
    {
        if ($model == null) $model = new self;
        $data['wz'] = self::statusByWhere(0, $model)->where(['is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['wf'] = self::statusByWhere(1, $model)->where(['is_system_del' => 0, 'shipping_type' => 1,'order_type'=>$order_type])->count();
        $data['ds'] = self::statusByWhere(2, $model)->where(['is_system_del' => 0, 'shipping_type' => 1,'order_type'=>$order_type])->count();
        $data['jy'] = self::statusByWhere(4, $model)->where(['is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['tk'] = self::statusByWhere(-1, $model)->where(['is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['yt'] = self::statusByWhere(-2, $model)->where(['is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['del'] = self::statusByWhere(-4, $model)->where(['is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['write_off'] = self::statusByWhere(5, $model)->where(['is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['general'] = self::where(['pink_id' => 0, 'combination_id' => 0, 'seckill_id' => 0, 'bargain_id' => 0, 'is_system_del' => 0,'order_type'=>$order_type])->count();
        $data['pink'] = self::where('pink_id|combination_id', '>', 0)->where(['is_system_del'=> 0,'order_type'=>$order_type])->count();
        $data['seckill'] = self::where('seckill_id', '>', 0)->where(['is_system_del'=> 0,'order_type'=>$order_type])->count();
        $data['bargain'] = self::where('bargain_id', '>', 0)->where(['is_system_del'=> 0,'order_type'=>$order_type])->count();
        return $data;
    }

    public static function OrderList($where)
    {
        $model = self::getOrderWhere($where, self::alias('a')->join('CrmUsers r', 'r.user_id=a.user_id', 'LEFT'), 'a.', 'r')->field('a.*,r.account');
        if (isset($where['order']) && $where['order'] != '') {
            $model = $model->order(self::setOrder($where['order']));
        } else {
            $model = $model->order('a.id desc');
        }
        if (isset($where['excel']) && $where['excel'] == 1) {
            $data = ($data = $model->select()) && count($data) ? $data->toArray() : [];
        } else {
            $data = ($data = $model->page((int)$where['page'], (int)$where['limit'])->select()) && count($data) ? $data->toArray() : [];
        }
        foreach ($data as &$item) {
            $_info = Db::name('crm_order_microchip')->where('order_id', $item['id'])->select();
            $_info = count($_info) ? $_info->toArray() : [];
            $item['micro_cate_count']=count($_info);
            $item['micro_num']=0;
            foreach ($_info as $k => $v) {
                //$micro_info = json_decode($v['micro_info'], true);
                //$_info[$k] = array_merge($v,$micro_info);
                $item['micro_num']+=$v['num'];
                unset($cart_info);
            }unset($v);
            $item['_info'] = $_info;
            $item['add_time'] = date('Y-m-d H:i:s', $item['add_time']);
            if ($item['paid'] == 1) {
                switch ($item['pay_type']) {
                    case 'weixin':
                        $item['pay_type_name'] = '微信支付';
                        break;
                    case 'yue':
                        $item['pay_type_name'] = '余额支付';
                        break;
                    case 'offline':
                        $item['pay_type_name'] = '线下支付';
                        break;
                    case 'alipay':
                        $item['pay_type_name'] = '支付宝支付';
                        break;
                    default:
                        $item['pay_type_name'] = '其他支付';
                        break;
                }
            } else {
                switch ($item['pay_type']) {
                    default:
                        $item['pay_type_name'] = '未支付';
                        break;
                    case 'offline':
                        $item['pay_type_name'] = '线下支付';
                        $item['pay_type_info'] = 1;
                        break;
                }
            }
            if ($item['paid'] == 0 && $item['status'] == 0) {
                $item['status_name'] = '未支付';
            } else if ($item['paid'] == 1 && $item['status'] == 0 && $item['shipping_type'] == 1 && $item['refund_status'] == 0) {
                $item['status_name'] = '未发货';
            } else if ($item['paid'] == 1 && $item['status'] == 0 && $item['shipping_type'] == 2 && $item['refund_status'] == 0) {
                $item['status_name'] = '未核销';
            } else if ($item['paid'] == 1 && $item['status'] == 1 && $item['shipping_type'] == 1 && $item['refund_status'] == 0) {
                $item['status_name'] = '待收货';
            } else if ($item['paid'] == 1 && $item['status'] == 1 && $item['shipping_type'] == 2 && $item['refund_status'] == 0) {
                $item['status_name'] = '未核销';
            } else if ($item['paid'] == 1 && $item['status'] == 2 && $item['refund_status'] == 0) {
                $item['status_name'] = '待评价';
            } else if ($item['paid'] == 1 && $item['status'] == 3 && $item['refund_status'] == 0) {
                $item['status_name'] = '已完成';
            } else if ($item['paid'] == 1 && $item['refund_status'] == 1) {
                $refundReasonTime = date('Y-m-d H:i', $item['refund_reason_time']);
                $refundReasonWapImg = json_decode($item['refund_reason_wap_img'], true);
                $refundReasonWapImg = $refundReasonWapImg ? $refundReasonWapImg : [];
                $img = '';
                if (count($refundReasonWapImg)) {
                    foreach ($refundReasonWapImg as $itemImg) {
                        if (strlen(trim($itemImg)))
                            $img .= '<img style="height:50px;" src="' . $itemImg . '" />';
                    }
                }
                if (!strlen(trim($img))) $img = '无';
                if (isset($where['excel']) && $where['excel'] == 1) {
                    $refundImageStr = implode(',', $refundReasonWapImg);
                    $item['status_name'] = <<<TEXT
退款原因:{$item['refund_reason_wap']}
备注说明：{$item['refund_reason_wap_explain']}
退款时间：{$refundReasonTime}
凭证连接：{$refundImageStr}
TEXT;
                    unset($refundImageStr);
                } else {
                    $item['status_name'] = <<<HTML
<b style="color:#f124c7">申请退款</b><br/>
<span>退款原因：{$item['refund_reason_wap']}</span><br/>
<span>备注说明：{$item['refund_reason_wap_explain']}</span><br/>
<span>退款时间：{$refundReasonTime}</span><br/>
<span>退款凭证：{$img}</span>
HTML;
                }
            } else if ($item['paid'] == 1 && $item['refund_status'] == 2) {
                $item['status_name'] = '已退款';
            }
            if ($item['paid'] == 0 && $item['status'] == 0 && $item['refund_status'] == 0) {
                $item['_status'] = 1;
            } else if ($item['paid'] == 1 && $item['status'] == 0 && $item['refund_status'] == 0) {
                $item['_status'] = 2;
            } else if ($item['paid'] == 1 && $item['refund_status'] == 1) {
                $item['_status'] = 3;
            } else if ($item['paid'] == 1 && $item['status'] == 1 && $item['refund_status'] == 0) {
                $item['_status'] = 4;
            } else if ($item['paid'] == 1 && $item['status'] == 2 && $item['refund_status'] == 0) {
                $item['_status'] = 5;
            } else if ($item['paid'] == 1 && $item['status'] == 3 && $item['refund_status'] == 0) {
                $item['_status'] = 6;
            } else if ($item['paid'] == 1 && $item['refund_status'] == 2) {
                $item['_status'] = 7;
            }
        }
        if (isset($where['excel']) && $where['excel'] == 1) {
            self::SaveExcel($data);
        }
        $count = self::getOrderWhere($where, self::alias('a')->join('CrmUsers r', 'r.user_id=a.user_id', 'LEFT'), 'a.', 'r')->count();
        return compact('count', 'data');
    }

    /*
     * 保存并下载excel
     * $list array
     * return
     */
    public static function SaveExcel($list)
    {
        $export = [];
        foreach ($list as $index => $item) {
            $_info = Db::name('store_order_cart_info')->where('oid', $item['id'])->column('cart_info');
            $goodsName = [];
            foreach ($_info as $k => $v) {
                $v = json_decode($v, true);
                $goodsName[] = implode(
                    [$v['productInfo']['store_name'],
                        isset($v['productInfo']['attrInfo']) ? '(' . $v['productInfo']['attrInfo']['suk'] . ')' : '',
                        "[{$v['cart_num']} * {$v['truePrice']}]"
                    ], ' ');
            }
            $item['cartInfo'] = $_info;
            $sex = Db::name('wechat_user')->where('uid', $item['uid'])->value('sex');
            if ($sex == 1) $sex_name = '男';
            else if ($sex == 2) $sex_name = '女';
            else $sex_name = '未知';
            $export[] = [
                $item['order_id'],
                $sex_name,
                $item['phone'],
                $item['real_name'],
                $item['user_phone'],
                $item['user_address'],
                $goodsName,
                $item['total_price'],
                $item['pay_price'],
                $item['pay_postage'],
                $item['coupon_price'],
                $item['pay_type_name'],
                $item['pay_time'] > 0 ? date('Y/m-d H:i', $item['pay_time']) : '暂无',
                $item['status_name'],
                $item['add_time'],
                $item['mark']
            ];
        }
        PHPExcelService::setExcelHeader(['订单号', '性别', '电话', '收货人姓名', '收货人电话', '收货地址', '商品信息',
            '总价格', '实际支付', '邮费', '优惠金额', '支付状态', '支付时间', '订单状态', '下单时间', '用户备注'])
            ->setExcelTile('订单导出' . date('YmdHis', time()), '订单信息' . time(), ' 生成时间：' . date('Y-m-d H:i:s', time()))
            ->setExcelContent($export)
            ->ExcelSave();
    }

    /**
     * @param $where
     * @return array
     */
    public static function systemPage($where, $userid = false)
    {
        $model = self::getOrderWhere($where, self::alias('a')->join('user r', 'r.uid=a.uid', 'LEFT'), 'a.', 'r')->field('a.*,r.nickname');
        if ($where['order']) {
            $model = $model->order('a.' . $where['order']);
        } else {
            $model = $model->order('a.id desc');
        }
        if ($where['export'] == 1) {
            $list = $model->select()->toArray();
            $export = [];
            foreach ($list as $index => $item) {

                if ($item['pay_type'] == 'weixin') {
                    $payType = '微信支付';
                } elseif ($item['pay_type'] == 'yue') {
                    $payType = '余额支付';
                } elseif ($item['pay_type'] == 'offline') {
                    $payType = '线下支付';
                } else {
                    $payType = '其他支付';
                }

                $_info = Db::name('store_order_cart_info')->where('oid', $item['id'])->column('cart_info', 'oid');
                $goodsName = [];
                foreach ($_info as $k => $v) {
                    $v = json_decode($v, true);
                    $goodsName[] = implode(
                        [$v['productInfo']['store_name'],
                            isset($v['productInfo']['attrInfo']) ? '(' . $v['productInfo']['attrInfo']['suk'] . ')' : '',
                            "[{$v['cart_num']} * {$v['truePrice']}]"
                        ], ' ');
                }
                $item['cartInfo'] = $_info;
                $export[] = [
                    $item['order_id'], $payType,
                    $item['total_num'], $item['total_price'], $item['total_postage'], $item['pay_price'], $item['refund_price'],
                    $item['mark'], $item['remark'],
                    [$item['real_name'], $item['user_phone'], $item['user_address']],
                    $goodsName,
                    [$item['paid'] == 1 ? '已支付' : '未支付', '支付时间: ' . ($item['pay_time'] > 0 ? date('Y/md H:i', $item['pay_time']) : '暂无')]

                ];
                $list[$index] = $item;
            }
            PHPExcelService::setExcelHeader(['订单号', '支付方式', '商品总数', '商品总价', '邮费', '支付金额', '退款金额', '用户备注', '管理员备注', '收货人信息', '商品信息', '支付状态'])
                ->setExcelTile('订单导出', '订单信息' . time(), ' 生成时间：' . date('Y-m-d H:i:s', time()))
                ->setExcelContent($export)
                ->ExcelSave();
        }
        return self::page($model, function ($item) {
            $_info = Db::name('store_order_cart_info')->where('oid', $item['id'])->field('cart_info')->select();
            foreach ($_info as $k => $v) {
                $_info[$k]['cart_info'] = json_decode($v['cart_info'], true);
            }
            $item['_info'] = $_info;
            if ($item['pink_id'] && $item['combination_id']) {
                $pinkStatus = StorePink::where('order_id_key', $item['id'])->value('status');
                switch ($pinkStatus) {
                    case 1:
                        $item['pink_name'] = '[拼团订单]正在进行中';
                        $item['color'] = '#f00';
                        break;
                    case 2:
                        $item['pink_name'] = '[拼团订单]已完成';
                        $item['color'] = '#00f';
                        break;
                    case 3:
                        $item['pink_name'] = '[拼团订单]未完成';
                        $item['color'] = '#f0f';
                        break;
                    default:
                        $item['pink_name'] = '[拼团订单]历史订单';
                        $item['color'] = '#457856';
                        break;
                }
            } else {
                if ($item['seckill_id']) {
                    $item['pink_name'] = '[秒杀订单]';
                    $item['color'] = '#32c5e9';
                } elseif ($item['bargain_id']) {
                    $item['pink_name'] = '[砍价订单]';
                    $item['color'] = '#12c5e9';
                } else {
                    $item['pink_name'] = '[普通订单]';
                    $item['color'] = '#895612';
                }
            }
        }, $where);
    }

    public static function statusByWhere($status, $model = null, $alert = '')
    {
        if ($model == null) $model = new self;
        if ('' === $status)
            return $model;
        else if ($status == 8)
            return $model;
        else if ($status == 0)//未支付
            return $model->where($alert . 'paid', 0)->where($alert . 'status', 0)->where($alert . 'refund_status', 0)->where($alert . 'is_del', 0);
        else if ($status == 1)//已支付 未发货
            return $model->where($alert . 'paid', 1)->where($alert . 'status', 0)->where($alert . 'shipping_type', 1)->where($alert . 'refund_status', 0)->where($alert . 'is_del', 0);
        else if ($status == 2)//已支付  待收货
            return $model->where($alert . 'paid', 1)->where($alert . 'status', 1)->where($alert . 'shipping_type', 1)->where($alert . 'refund_status', 0)->where($alert . 'is_del', 0);
        else if ($status == 5)//已支付  待核销
            return $model->where($alert . 'paid', 1)->where($alert . 'status', 0)->where($alert . 'shipping_type', 2)->where($alert . 'refund_status', 0)->where($alert . 'is_del', 0);
        else if ($status == 3)// 已支付  已收货  待评价
            return $model->where($alert . 'paid', 1)->where($alert . 'status', 2)->where($alert . 'refund_status', 0)->where($alert . 'is_del', 0);
        else if ($status == 4)// 交易完成
            return $model->where($alert . 'paid', 1)->where($alert . 'status', 3)->where($alert . 'refund_status', 0)->where($alert . 'is_del', 0);
        else if ($status == -1)//退款中
            return $model->where($alert . 'paid', 1)->where($alert . 'refund_status', 1)->where($alert . 'is_del', 0);
        else if ($status == -2)//已退款
            return $model->where($alert . 'paid', 1)->where($alert . 'refund_status', 2)->where($alert . 'is_del', 0);
        else if ($status == -3)//退款
            return $model->where($alert . 'paid', 1)->where($alert . 'refund_status', 'in', '1,2')->where($alert . 'is_del', 0);
        else if ($status == -4)//已删除
            return $model->where($alert . 'is_del', 1);
        else if ($status == 9)
            return $model->where($alert . 'status', 9)->where($alert . 'is_del', 0);
        else if ($status == 10)
            return $model->where($alert . 'status', 10)->where($alert . 'is_del', 0);
        else
            return $model;
    }

    public static function timeQuantumWhere($startTime = null, $endTime = null, $model = null)
    {
        if ($model === null) $model = new self;
        if ($startTime != null && $endTime != null)
            $model = $model->where('add_time', '>', strtotime($startTime))->where('add_time', '<', strtotime($endTime));
        return $model;
    }
    public static function changeOrderId($orderId)
    {
        $ymd = substr($orderId, 2, 8);
        $key = substr($orderId, 16);
        return 'wx' . $ymd . date('His') . $key;
    }

    /**
     * 线下付款
     * @param $id
     * @return $this
     */
    public static function updateOffline($id)
    {
        $count = self::where('id', $id)->count();
        if (!$count) return self::setErrorInfo('订单不存在');
        $count = self::where('id', $id)->where('paid', 0)->count();
        if (!$count) return self::setErrorInfo('订单已支付');
        $res = self::where('id', $id)->update(['paid' => 1, 'pay_time' => time()]);
        return $res;
    }

    /**
     * TODO 公众号退款发送模板消息
     * @param $oid
     * $oid 订单id  key
     */
    public static function refundTemplate($data, $oid)
    {
        $order = self::where('id', $oid)->find();
        WechatTemplateService::sendTemplate(WechatUser::where('uid', $order['uid'])->value('openid'), WechatTemplateService::ORDER_REFUND_STATUS, [
            'first' => '亲，您购买的商品已退款,本次退款' . $data['refund_price'] . '金额',
            'keyword1' => $order['order_id'],
            'keyword2' => $order['pay_price'],
            'keyword3' => date('Y-m-d H:i:s', $order['add_time']),
            'remark' => '点击查看订单详情'
        ], Url::buildUrl('/order/detail/' . $order['order_id'])->suffix('')->domain(true)->build());
    }

    /**
     * TODO 小程序余额退款模板消息
     * @param $oid
     * @return bool|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function refundRoutineTemplate($oid)
    {
        $order = self::where('id', $oid)->find();
        return RoutineTemplate::sendOrderRefundSuccess($order);
    }

    /**
     * 处理where条件
     * @param $where
     * @param $model
     * @return mixed
     */
    public static function getOrderWhere($where, $model, $aler = '', $join = '')
    {
        //   $model = $model->where('combination_id',0);
        $model = $model->where('is_system_del', 0);
        if (isset($where['status']) && is_numeric($where['status'])) {
            $model = self::statusByWhere($where['status'], $model, $aler);
        }
        if (isset($where['is_del']) && $where['is_del'] != '' && $where['is_del'] != -1) $model = $model->where($aler . 'is_del', $where['is_del']);
        if (isset($where['combination_id'])) {
            if ($where['combination_id'] == '普通订单') {
                $model = $model->where($aler . 'combination_id', 0)->where($aler . 'seckill_id', 0)->where($aler . 'bargain_id', 0);
            }
            if ($where['combination_id'] == '拼团订单') {
                $model = $model->where($aler . 'combination_id', ">", 0)->where($aler . 'pink_id', ">", 0);
            }
            if ($where['combination_id'] == '秒杀订单') {
                $model = $model->where($aler . 'seckill_id', ">", 0);
            }
            if ($where['combination_id'] == '砍价订单') {
                $model = $model->where($aler . 'bargain_id', ">", 0);
            }
        }
        if (isset($where['pay_type'])) {
            switch ($where['pay_type']) {
                case 1:
                    $model = $model->where($aler . 'pay_type', 'weixin');
                    break;
                case 2:
                    $model = $model->where($aler . 'pay_type', 'yue');
                    break;
                case 3:
                    $model = $model->where($aler . 'pay_type', 'offline');
                    break;
            }
        }
        // if (isset($where['type'])) {
        //     switch ($where['type']) {
        //         case 1:
        //             $model = $model->where($aler . 'combination_id', 0)->where($aler . 'seckill_id', 0)->where($aler . 'bargain_id', 0);
        //             break;
        //         case 2:
        //     //   $model = $model->where($aler.'combination_id',">",0)->where($aler.'pink_id',">",0);
        //             $model = $model->where($aler . 'combination_id', ">", 0);
        //             break;
        //         case 3:
        //             $model = $model->where($aler . 'seckill_id', ">", 0);
        //             break;
        //         case 4:
        //             $model = $model->where($aler . 'bargain_id', ">", 0);
        //             break;
        //     }
        // }
        if(isset($where['platform_id']) && $where['platform_id'] !=''){
            $model=$model->where($aler.'platform_leader',$where['platform_id']);
        }
        if(isset($where['doctor_id']) && $where['doctor_id'] !=''){
            $model=$model->where($aler.'doctor_leader',$where['doctor_id']);
        }
        if(isset($where['institu_id']) && $where['institu_id'] !=''){
            $model=$model->where($aler.'institu_leader',$where['institu_id']);
        }
        if(isset($where['ordersn']) && $where['ordersn'] !=''){
            $model=$model->where($aler.'order_sn','LiKE',"%$where[ordersn]%");
        }
        if(isset($where['nickname']) && $where['nickname'] !=''){
            $model=$model->where($aler.'real_name','LiKE',"%$where[nickname]%");
        }
        if (isset($where['keyword']) && $where['keyword'] != '') {
            $model = $model->where($aler . 'order_sn|' . $aler . 'real_name|' . $aler . 'user_phone' . ($join ? '|' . $join . '.nickname|' . $join . '.user_id' : ''), 'LIKE', "%$where[real_name]%");
        }
        if(isset($where['time']) && $where['time'] !='') {
            list($startTime,$endTime)=explode(' - ',$where['time']);
            $model=$model->whereBetween($aler.'add_time',[strtotime($startTime),strtotime($endTime)]);
        }

        if(isset($where['type']) && ($where['type'] !='' || $where['type'] === 0)){
            $model=$model->where($aler.'order_type',$where['type']);
        }
        if(isset($where['platform']) && $where['platform'] !=''){
            $model=$model->where($join.'.'.'platform_name','LiKE',"%$where[platform]%");
        }
        if(isset($where['institu']) && $where['institu'] !=''){
            $model=$model->where($join.'.'.'institu_name','LiKE',"%$where[institu]%");
        }
        // if (isset($where['data']) && $where['data'] !== '') {
        //     switch ($where['data']) {
        //         case 'today':
        //         case 'week':
        //         case 'month':
        //         case 'year':
        //         case 'yesterday':
        //             $model = $model->whereTime($aler . 'add_time', $where['data']);
        //             break;
        //         case 'quarter':
        //             list($startTime, $endTime) = self::getMonth();
        //             $model = $model->where($aler . 'add_time', '>', strtotime($startTime));
        //             $model = $model->where($aler . 'add_time', '<', strtotime($endTime));
        //             break;
        //         case 'lately7':
        //             $model = $model->where($aler . 'add_time', 'between', [strtotime("-7 day"), time()]);
        //             break;
        //         case 'lately30':
        //             $model = $model->where($aler . 'add_time', 'between', [strtotime("-30 day"), time()]);
        //             break;
        //         default:
        //             if (strstr($where['data'], ' - ') !== false) {
        //                 list($startTime, $endTime) = explode(' - ', $where['data']);
        //                 $model = $model->where($aler . 'add_time', '>', strtotime($startTime));
        //                 $model = $model->where($aler . 'add_time', '<', (int)bcadd(strtotime($endTime), 86400, 0));
        //             }
        //             break;
        //     }

        // }
        return $model;
    }

    public static function getBadge($where)
    {
        $price = self::getOrderPrice($where);
        return [
            [
                'name' => '订单数量',
                'field' => '件',
                'count' => $price['count_sum'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '售出商品',
                'field' => '件',
                'count' => $price['total_num'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '订单金额',
                'field' => '元',
                'count' => $price['pay_price'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '退款金额',
                'field' => '元',
                'count' => $price['refund_price'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '微信支付金额',
                'field' => '元',
                'count' => $price['pay_price_wx'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '余额支付金额',
                'field' => '元',
                'count' => $price['pay_price_yue'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '运费金额',
                'field' => '元',
                'count' => $price['pay_postage'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '分佣金额',
                'field' => '元',
                'count' => $price['brokerage'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '线下支付金额',
                'field' => '元',
                'count' => $price['pay_price_offline'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '积分抵扣',
                'field' => '分',
                'count' => $price['use_integral'] . '(抵扣金额:￥' . $price['deduction_price'] . ')',
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ],
            [
                'name' => '退回积分',
                'field' => '元',
                'count' => $price['back_integral'],
                'background_color' => 'layui-bg-blue',
                'col' => 2
            ]
        ];
    }

    /**
     * 处理订单金额
     * @param $where
     * @return array
     */
    public static function getOrderPrice($where)
    {
        $where['is_del'] = 0;//删除订单不统计
        $model = new self;
        $price = array();
        $price['pay_price'] = 0;//支付金额
        $price['refund_price'] = 0;//退款金额
        $price['pay_price_wx'] = 0;//微信支付金额
        $price['pay_price_yue'] = 0;//余额支付金额
        $price['pay_price_offline'] = 0;//线下支付金额
        $price['pay_price_other'] = 0;//其他支付金额
        $price['use_integral'] = 0;//用户使用积分
        $price['back_integral'] = 0;//退积分总数
        $price['deduction_price'] = 0;//抵扣金额
        $price['total_num'] = 0; //商品总数
        $price['count_sum'] = 0; //商品总数
        $price['brokerage'] = 0;
        $price['pay_postage'] = 0;
        $whereData = ['is_del' => 0];
        if ($where['status'] == '') {
            $whereData['paid'] = 1;
            $whereData['refund_status'] = 0;
        }
        $ids = self::getOrderWhere($where, $model)->where($whereData)->column('id');
        if (count($ids)) {
            $price['brokerage'] = UserBill::where(['category' => 'now_money', 'type' => 'brokerage'])->where('link_id', 'in', $ids)->sum('number');
        }
        $price['refund_price'] = self::getOrderWhere($where, $model)->where(['is_del' => 0, 'paid' => 1, 'refund_status' => 2])->sum('refund_price');
        $sumNumber = self::getOrderWhere($where, $model)->where($whereData)->field([
            'sum(total_num) as sum_total_num',
            'count(id) as count_sum',
            'sum(pay_price) as sum_pay_price',
            'sum(pay_postage) as sum_pay_postage',
            'sum(use_integral) as sum_use_integral',
            'sum(back_integral) as sum_back_integral',
            'sum(deduction_price) as sum_deduction_price'
        ])->find();
        if ($sumNumber) {
            $price['count_sum'] = $sumNumber['count_sum'];
            $price['total_num'] = $sumNumber['sum_total_num'];
            $price['pay_price'] = $sumNumber['sum_pay_price'];
            $price['pay_postage'] = $sumNumber['sum_pay_postage'];
            $price['use_integral'] = $sumNumber['sum_use_integral'];
            $price['back_integral'] = $sumNumber['sum_back_integral'];
            $price['deduction_price'] = $sumNumber['sum_deduction_price'];
        }
        $list = self::getOrderWhere($where, $model)->where($whereData)->group('pay_type')->column('sum(pay_price) as sum_pay_price,pay_type', 'id');
        foreach ($list as $v) {
            if ($v['pay_type'] == 'weixin') {
                $price['pay_price_wx'] = $v['sum_pay_price'];
            } elseif ($v['pay_type'] == 'yue') {
                $price['pay_price_yue'] = $v['sum_pay_price'];
            } elseif ($v['pay_type'] == 'offline') {
                $price['pay_price_offline'] = $v['sum_pay_price'];
            } else {
                $price['pay_price_other'] = $v['sum_pay_price'];
            }
        }
        return $price;
    }

    public static function systemPagePink($where)
    {
        $model = new self;
        $model = self::getOrderWherePink($where, $model);
        $model = $model->order('id desc');

        if ($where['export'] == 1) {
            $list = $model->select()->toArray();
            $export = [];
            foreach ($list as $index => $item) {

                if ($item['pay_type'] == 'weixin') {
                    $payType = '微信支付';
                } elseif ($item['pay_type'] == 'yue') {
                    $payType = '余额支付';
                } elseif ($item['pay_type'] == 'offline') {
                    $payType = '线下支付';
                } else {
                    $payType = '其他支付';
                }

                $_info = Db::name('store_order_cart_info')->where('oid', $item['id'])->column('cart_info', 'oid');
                $goodsName = [];
                foreach ($_info as $k => $v) {
                    $v = json_decode($v, true);
                    $goodsName[] = implode(
                        [$v['productInfo']['store_name'],
                            isset($v['productInfo']['attrInfo']) ? '(' . $v['productInfo']['attrInfo']['suk'] . ')' : '',
                            "[{$v['cart_num']} * {$v['truePrice']}]"
                        ], ' ');
                }
                $item['cartInfo'] = $_info;
                $export[] = [
                    $item['order_id'], $payType,
                    $item['total_num'], $item['total_price'], $item['total_postage'], $item['pay_price'], $item['refund_price'],
                    $item['mark'], $item['remark'],
                    [$item['real_name'], $item['user_phone'], $item['user_address']],
                    $goodsName,
                    [$item['paid'] == 1 ? '已支付' : '未支付', '支付时间: ' . ($item['pay_time'] > 0 ? date('Y/md H:i', $item['pay_time']) : '暂无')]

                ];
                $list[$index] = $item;
            }
            ExportService::exportCsv($export, '订单导出' . time(), ['订单号', '支付方式', '商品总数', '商品总价', '邮费', '支付金额', '退款金额', '用户备注', '管理员备注', '收货人信息', '商品信息', '支付状态']);
        }

        return self::page($model, function ($item) {
            $item['nickname'] = WechatUser::where('uid', $item['uid'])->value('nickname');
            $_info = Db::name('store_order_cart_info')->where('oid', $item['id'])->field('cart_info')->select();
            foreach ($_info as $k => $v) {
                $_info[$k]['cart_info'] = json_decode($v['cart_info'], true);
            }
            $item['_info'] = $_info;
        }, $where);
    }

    /**
     * 处理where条件
     * @param $where
     * @param $model
     * @return mixed
     */
    public static function getOrderWherePink($where, $model)
    {
        $model = $model->where('combination_id', '>', 0);
        if ($where['status'] != '') $model = $model::statusByWhere($where['status']);
//        if($where['is_del'] != '' && $where['is_del'] != -1) $model = $model->where('is_del',$where['is_del']);
        if ($where['real_name'] != '') {
            $model = $model->where('order_id|real_name|user_phone', 'LIKE', "%$where[real_name]%");
        }
        if ($where['data'] !== '') {
            list($startTime, $endTime) = explode(' - ', $where['data']);
            $model = $model->where('add_time', '>', strtotime($startTime));
            $model = $model->where('add_time', '<', strtotime($endTime));
        }
        return $model;
    }

    /**
     * 处理订单金额
     * @param $where
     * @return array
     */
    public static function getOrderPricePink($where)
    {
        $model = new self;
        $price = array();
        $price['pay_price'] = 0;//支付金额
        $price['refund_price'] = 0;//退款金额
        $price['pay_price_wx'] = 0;//微信支付金额
        $price['pay_price_yue'] = 0;//余额支付金额
        $price['pay_price_offline'] = 0;//线下支付金额
        $price['pay_price_other'] = 0;//其他支付金额
        $price['use_integral'] = 0;//用户使用积分
        $price['back_integral'] = 0;//退积分总数
        $price['deduction_price'] = 0;//抵扣金额
        $price['total_num'] = 0; //商品总数
        $model = self::getOrderWherePink($where, $model);
        $list = $model->select()->toArray();
        foreach ($list as $v) {
            $price['total_num'] = bcadd($price['total_num'], $v['total_num'], 0);
            $price['pay_price'] = bcadd($price['pay_price'], $v['pay_price'], 2);
            $price['refund_price'] = bcadd($price['refund_price'], $v['refund_price'], 2);
            $price['use_integral'] = bcadd($price['use_integral'], $v['use_integral'], 2);
            $price['back_integral'] = bcadd($price['back_integral'], $v['back_integral'], 2);
            $price['deduction_price'] = bcadd($price['deduction_price'], $v['deduction_price'], 2);
            if ($v['pay_type'] == 'weixin') {
                $price['pay_price_wx'] = bcadd($price['pay_price_wx'], $v['pay_price'], 2);
            } elseif ($v['pay_type'] == 'yue') {
                $price['pay_price_yue'] = bcadd($price['pay_price_yue'], $v['pay_price'], 2);
            } elseif ($v['pay_type'] == 'offline') {
                $price['pay_price_offline'] = bcadd($price['pay_price_offline'], $v['pay_price'], 2);
            } else {
                $price['pay_price_other'] = bcadd($price['pay_price_other'], $v['pay_price'], 2);
            }
        }
        return $price;
    }

    /**
     * 获取昨天的订单   首页在使用
     * @param int $preDay
     * @param int $day
     * @return $this|StoreOrder
     */
    public static function isMainYesterdayCount($preDay = 0, $day = 0)
    {
        $model = new self();
        $model = $model->where('add_time', '>', $preDay);
        $model = $model->where('add_time', '<', $day);
        return $model;
    }

    /**
     * 获取用户购买次数
     * @param int $uid
     * @return int|string
     */
    public static function getUserCountPay($uid = 0)
    {
        if (!$uid) return 0;
        return self::where('uid', $uid)->where('paid', 1)->count();
    }

    /**
     * 获取单个用户购买列表
     * @param array $where
     * @return array
     */
    public static function getOneorderList($where)
    {
        return self::where('uid', $where['uid'])
            ->order('add_time desc')
            ->page((int)$where['page'], (int)$where['limit'])
            ->field(['order_id,real_name,total_num,total_price,pay_price,FROM_UNIXTIME(pay_time,"%Y-%m-%d") as pay_time,paid,pay_type,pink_id,seckill_id,bargain_id'
            ])->select()
            ->toArray();
    }

    /**
     * 设置订单统计图搜索
     * @param array $where 条件
     * @param null $status
     * @param null $time
     * @return array
     */
    public static function setEchatWhere($where, $status = null, $time = null)
    {
        $model = self::statusByWhere($where['status'])->where('is_system_del',0);
        if ($status !== null) $where['type'] = $status;
        if ($time === true) $where['data'] = '';
        switch ($where['type']) {
            case 1:
                //普通商品
                $model = $model->where('combination_id', 0)->where('seckill_id', 0)->where('bargain_id', 0);
                break;
            case 2:
                //拼团商品
                $model = $model->where('combination_id', ">", 0)->where('pink_id', ">", 0);
                break;
            case 3:
                //秒杀商品
                $model = $model->where('seckill_id', ">", 0);
                break;
            case 4:
                //砍价商品
                $model = $model->where('bargain_id', '>', 0);
                break;
        }
        return self::getModelTime($where, $model);
    }

    /*
     * 获取订单数据统计图
     * $where array
     * $limit int
     * return array
     */
    public static function getEchartsOrder($where, $limit = 20)
    {
        $orderlist = self::setEchatWhere($where)->field(
            'FROM_UNIXTIME(add_time,"%Y-%m-%d") as _add_time,sum(total_num) total_num,count(*) count,sum(total_price) total_price,sum(refund_price) refund_price,group_concat(cart_id SEPARATOR "|") cart_ids'
        )->group('_add_time')->order('_add_time asc')->select();
        count($orderlist) && $orderlist = $orderlist->toArray();
        $legend = ['商品数量', '订单数量', '订单金额', '退款金额'];
        $seriesdata = [
            [
                'name' => $legend[0],
                'type' => 'line',
                'data' => [],
            ],
            [
                'name' => $legend[1],
                'type' => 'line',
                'data' => []
            ],
            [
                'name' => $legend[2],
                'type' => 'line',
                'data' => []
            ],
            [
                'name' => $legend[3],
                'type' => 'line',
                'data' => []
            ]
        ];
        $xdata = [];
        $zoom = '';
        foreach ($orderlist as $item) {
            $xdata[] = $item['_add_time'];
            $seriesdata[0]['data'][] = $item['total_num'];
            $seriesdata[1]['data'][] = $item['count'];
            $seriesdata[2]['data'][] = $item['total_price'];
            $seriesdata[3]['data'][] = $item['refund_price'];
        }
        count($xdata) > $limit && $zoom = $xdata[$limit - 5];
        $badge = self::getOrderBadge($where);
        $bingpaytype = self::setEchatWhere($where)->group('pay_type')->field('count(*) as count,pay_type')->select();
        count($bingpaytype) && $bingpaytype = $bingpaytype->toArray();
        $bing_xdata = ['微信支付', '余额支付', '其他支付'];
        $color = ['#ffcccc', '#99cc00', '#fd99cc', '#669966'];
        $bing_data = [];
        foreach ($bingpaytype as $key => $item) {
            if ($item['pay_type'] == 'weixin') {
                $value['name'] = $bing_xdata[0];
            } else if ($item['pay_type'] == 'yue') {
                $value['name'] = $bing_xdata[1];
            } else {
                $value['name'] = $bing_xdata[2];
            }
            $value['value'] = $item['count'];
            $value['itemStyle']['color'] = isset($color[$key]) ? $color[$key] : $color[0];
            $bing_data[] = $value;
        }
        return compact('zoom', 'xdata', 'seriesdata', 'badge', 'legend', 'bing_data', 'bing_xdata');
    }

    public static function getOrderBadge($where)
    {
        return [
            [
                'name' => '拼团订单数量',
                'field' => '个',
                'count' => self::setEchatWhere($where, 2)->count(),
                'content' => '拼团总订单数量',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, 2, true)->count(),
                'class' => 'fa fa-line-chart',
                'col' => 2
            ],
            [
                'name' => '砍价订单数量',
                'field' => '个',
                'count' => self::setEchatWhere($where, 4)->count(),
                'content' => '砍价总订单数量',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, 4, true)->count(),
                'class' => 'fa fa-line-chart',
                'col' => 2
            ],
            [
                'name' => '秒杀订单数量',
                'field' => '个',
                'count' => self::setEchatWhere($where, 3)->count(),
                'content' => '秒杀总订单数量',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, 3, true)->count(),
                'class' => 'fa fa-line-chart',
                'col' => 2
            ],
            [
                'name' => '普通订单数量',
                'field' => '个',
                'count' => self::setEchatWhere($where, 1)->count(),
                'content' => '普通总订单数量',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, 1, true)->count(),
                'class' => 'fa fa-line-chart',
                'col' => 2,
            ],
            [
                'name' => '使用优惠卷金额',
                'field' => '元',
                'count' => self::setEchatWhere($where)->sum('coupon_price'),
                'content' => '普通总订单数量',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->sum('coupon_price'),
                'class' => 'fa fa-line-chart',
                'col' => 2
            ],
            [
                'name' => '积分消耗数',
                'field' => '个',
                'count' => self::setEchatWhere($where)->sum('use_integral'),
                'content' => '积分消耗总数',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->sum('use_integral'),
                'class' => 'fa fa-line-chart',
                'col' => 2
            ],
            [
                'name' => '积分抵扣金额',
                'field' => '个',
                'count' => self::setEchatWhere($where)->sum('deduction_price'),
                'content' => '积分抵扣总金额',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->sum('deduction_price'),
                'class' => 'fa fa-money',
                'col' => 2
            ],
            [
                'name' => '在线支付金额',
                'field' => '元',
                'count' => self::setEchatWhere($where)->where(['paid'=>1,'refund_status'=>0])->where('pay_type', 'weixin')->sum('pay_price'),
                'content' => '在线支付总金额',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->where(['paid'=>1,'refund_status'=>0])->where('pay_type', 'weixin')->sum('pay_price'),
                'class' => 'fa fa-weixin',
                'col' => 2
            ],
            [
                'name' => '余额支付金额',
                'field' => '元',
                'count' => self::setEchatWhere($where)->where('pay_type', 'yue')->where(['paid'=>1,'refund_status'=>0])->sum('pay_price'),
                'content' => '余额支付总金额',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->where(['paid'=>1,'refund_status'=>0])->where('pay_type', 'yue')->sum('pay_price'),
                'class' => 'fa  fa-balance-scale',
                'col' => 2
            ],
            [
                'name' => '赚取积分',
                'field' => '分',
                'count' => self::setEchatWhere($where)->sum('gain_integral'),
                'content' => '赚取总积分',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->sum('gain_integral'),
                'class' => 'fa fa-gg-circle',
                'col' => 2
            ],
            [
                'name' => '交易额',
                'field' => '元',
                'count' => self::setEchatWhere($where)->where(['paid'=>1,'refund_status'=>0])->sum('pay_price'),
                'content' => '总交易额',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->where(['paid'=>1,'refund_status'=>0])->sum('pay_price'),
                'class' => 'fa fa-jpy',
                'col' => 2
            ],
            [
                'name' => '订单商品数量',
                'field' => '元',
                'count' => self::setEchatWhere($where)->sum('total_num'),
                'content' => '订单商品总数量',
                'background_color' => 'layui-bg-cyan',
                'sum' => self::setEchatWhere($where, null, true)->sum('total_num'),
                'class' => 'fa fa-cube',
                'col' => 2
            ]
        ];
    }

    /**
     * 微信 订单发货
     * @param $oid
     * @param array $postageData
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function orderPostageAfter($order_id, $postageData = [])
    {

        $order = self::where('id', $order_id)->find();
        $url = Url::buildUrl('/crm/order_detail/' . $order['order_id'])->suffix('')->domain(true)->build();
        $group = [
            'first' => '亲,您的订单已发货,请注意查收',
            'remark' => '点击查看订单详情'
        ];
        if ($postageData['delivery_type'] == 'send') {//送货
            $goodsName = StoreOrderCartInfo::getProductNameList($order['id']);
            if ($order['is_channel'] == 1) {
                //小程序送货模版消息
                RoutineTemplate::sendOrderPostage($order);
            } else {//公众号
                $openid = WechatUser::where('uid', $order['uid'])->value('openid');
                $group = array_merge($group, [
                    'keyword1' => $goodsName,
                    'keyword2' => $order['pay_type'] == 'offline' ? '线下支付' : date('Y/m/d H:i', $order['pay_time']),
                    'keyword3' => $order['user_address'],
                    'keyword4' => $postageData['delivery_name'],
                    'keyword5' => $postageData['delivery_id']
                ]);
                WechatTemplateService::sendTemplate($openid, WechatTemplateService::ORDER_DELIVER_SUCCESS, $group, $url);
            }
        } else if ($postageData['delivery_type'] == 'express') {//发货
            if ($order['is_channel'] == 1) {
                //小程序发货模版消息
                RoutineTemplate::sendOrderPostage($order, 1);
            } else {//公众号
                $openid = WechatUser::where('uid', $order['uid'])->value('openid');
                $group = array_merge($group, [
                    'keyword1' => $order['order_id'],
                    'keyword2' => $postageData['delivery_name'],
                    'keyword3' => $postageData['delivery_id']
                ]);
                WechatTemplateService::sendTemplate($openid, WechatTemplateService::ORDER_POSTAGE_SUCCESS, $group, $url);
            }
        }

    }

    /** 收货后发送模版消息
     * @param $order
     */
    public static function orderTakeAfter($order)
    {
        $title = '';
        $cartInfo = StoreOrderCartInfo::where('oid', $order['id'])->column('cart_info', 'oid');

        if (count($cartInfo)) {
            foreach ($cartInfo as $key => &$cart) {
                $cart = json_decode($cart, true);
                $title .= $cart['productInfo']['store_name'] . ',';
            }
        }
        if (strlen(trim($title)))
            $title = substr($title, 0, bcsub(strlen($title), 1, 0));
        else {
            $cartInfo = StoreCart::alias('a')->where('a.id', 'in', implode(',', json_decode($order['cart_id'], true)))->find();
            $title = StoreProduct::where('id', $cartInfo['product_id'])->value('store_name');
        }

        if ($order['is_channel'] == 1) {//小程序
            RoutineTemplate::sendOrderTakeOver($order, $title);
        } else {
            $openid = WechatUser::where('uid', $order['uid'])->value('openid');
            WechatTemplateService::sendTemplate($openid, WechatTemplateService::ORDER_TAKE_SUCCESS, [
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
     * 不退款发送模板消息
     * @param int $id 订单id
     * @param array $data 退款详情
     * */
    public static function refundNoPrieTemplate($id, $data)
    {
        $order = self::get($id);
        if ($order) return false;
        //小程序模板消息
        $cartInfo = StoreOrderCartInfo::where('oid', $order['id'])->column('product_id', 'oid') ?: [];
        $title = '';
        foreach ($cartInfo as $k => $productId) {
            $store_name = StoreProduct::where('id', $productId)->value('store_name');
            $title .= $store_name . ',';
        }
        if ($order->is_channel == 1) {
            RoutineTemplate::sendOrderRefundFail($order, $title);
        } else {
            WechatTemplateService::sendTemplate(WechatUser::where('uid', $order->uid)->value('openid'), WechatTemplateService::ORDER_REFUND_STATUS, [
                'first' => '很抱歉您的订单退款失败，失败原因：' . $data,
                'keyword1' => $order->order_id,
                'keyword2' => $order->pay_price,
                'keyword3' => date('Y-m-d H:i:s', time()),
                'remark' => '给您带来的不便，请谅解！'
            ], Url::buildUrl('/order/detail/' . $order['order_id'])->suffix('')->domain(true)->build());
        }
    }

    /**
     * 获取订单总数
     * @param int $uid
     * @return int|string
     */
    public static function getOrderCount($uid = 0)
    {
        if (!$uid) return 0;
        return self::where('uid', $uid)->where('paid', 1)->where('refund_status', 0)->where('status', 2)->count();
    }

    /**
     * 获取已支付的订单
     * @param int $is_promoter
     * @return int|string
     */
    public static function getOrderPayCount($is_promoter = 0)
    {
        return self::where('o.paid', 1)->alias('o')->join('User u', 'u.uid=o.uid')->where('u.is_promoter', $is_promoter)->count();
    }

    /**
     * 获取最后一个月已支付的订单
     * @param int $is_promoter
     * @return int|string
     */
    public static function getOrderPayMonthCount($is_promoter = 0)
    {
        return self::where('o.paid', 1)->alias('o')->whereTime('o.pay_time', 'last month')->join('User u', 'u.uid=o.uid')->where('u.is_promoter', $is_promoter)->count();
    }

    /** 订单收货处理积分
     * @param $order
     * @return bool
     */
    public static function gainUserIntegral($order, bool $open = true)
    {
        if ($order['gain_integral'] > 0) {
            $userInfo = User::get($order['uid']);
            $open && BaseModel::beginTrans();
            $integral = bcadd($userInfo['integral'], $order['gain_integral'], 2);
            $res1 = false != User::where('uid', $userInfo['uid'])->update(['integral' => $integral]);
            $res2 = false != UserBill::income('购买商品赠送积分', $order['uid'], 'integral', 'gain', $order['gain_integral'], $order['id'], bcadd($userInfo['integral'], $order['gain_integral'], 2), '购买商品赠送' . floatval($order['gain_integral']) . '积分');
            $res = $res1 && $res2;
            $open && BaseModel::checkTrans($res);
            RoutineTemplate::sendUserIntegral($order['uid'], $order, $order['gain_integral'], $integral);
            return $res;
        }
        return true;
    }

    public static function integralBack($id)
    {
        $order = self::get($id)->toArray();
        if (!(float)bcsub($order['use_integral'], 0, 2) && !$order['back_integral']) return true;
        if ($order['back_integral'] && !(int)$order['use_integral']) return true;
        BaseModel::beginTrans();
        $data['back_integral'] = bcsub($order['use_integral'], $order['use_integral'], 0);
        if (!$data['back_integral']) return true;
        $data['use_integral'] = 0;
        $data['deduction_price'] = 0.00;
        $data['pay_price'] = 0.00;
        $data['coupon_id'] = 0.00;
        $data['coupon_price'] = 0.00;
        $res4 = true;
        $integral = User::where('uid', $order['uid'])->value('integral');
        $res1 = User::bcInc($order['uid'], 'integral', $data['back_integral'], 'uid');
        $res2 = UserBill::income('商品退积分', $order['uid'], 'integral', 'pay_product_integral_back', $data['back_integral'], $order['id'], bcadd($integral, $data['back_integral'], 2), '订单退积分' . floatval($data['back_integral']) . '积分到用户积分');
        $res3 = self::edit($data, $id);
        if ($order['coupon_id']) $res4 = StoreCouponUser::recoverCoupon($order['coupon_id']);
        StoreOrderStatus::setStatus($id, 'integral_back', '商品退积分：' . $data['back_integral']);
        $res = $res1 && $res2 && $res3 && $res4;
        BaseModel::checkTrans($res);
        return $res;
    }

    /**
     * 订单数量 支付方式
     * @return array
     */
    public static function payTypeCount()
    {
        $where['status'] = 8;
        $where['is_del'] = 0;
        $where['real_name'] = '';
        $where['data'] = '';
        $where['order_type'] = 1;
        $where['order'] = '';
        $where['pay_type'] = 1;
        $weixin = self::getOrderWhere($where, new self)->count();
        $where['pay_type'] = 2;
        $yue = self::getOrderWhere($where, new self)->count();
        $where['pay_type'] = 3;
        $offline = self::getOrderWhere($where, new self)->count();
        return compact('weixin', 'yue', 'offline');
    }
    //创建单号
    public static function createOrderKey($str='cf',$user_id='',$key=''){
        return md5($str.$user_id.$key);
    }
    /**
     * 生成处方单
     * @param $uid
     * @param $key
     * @param array $micro
     * @param $platform_id
     * @param bool $real_name
     * @param int $user_phone
     * @param string $order_name
     * @param string $symptom
     * @param int $taking_quency
     * @param int $taking_cycle
     * @param string $taking_time
     * @param string $taking_suggest
     * @param string $taking_remark
     * @param int $institu_id
     * @param bool $test
     * @return StoreOrder|bool|\think\Model
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function cacheKeyCreatePrescripOrder($uid,$key, $micro,$platform_id,$real_name,$user_phone,$order_name,$symptom,$taking_quency,$taking_cycle,$taking_time=0,$taking_suggest='',$taking_remark = '', $institu_id = 0,$doctor_id=0,$test=false)
    {
        self::beginTrans();
        try {
            if (self::be(['unique' => $key, 'user_id' => $uid])) return self::setErrorInfo('请勿重复提交处方单', true);
            $userInfo = CrmUsers::getUserInfo($uid);
            if (!$userInfo) return self::setErrorInfo('用户不存在!', true);

            $micro_ids=implode(',',array_keys($micro));
            $microchipInfo=MicrochipModel::getSelectMicrochip(['micro_ids'=>$micro_ids,'platform'=>$platform_id]);
            $micro_price=MicrochipModel::getMicrochipPrice(['micro_ids'=>$micro_ids,'platform'=>$platform_id]);
            $total_price=$micro_price['rmb_price'];
            $total_num=round($taking_quency*$taking_cycle);
            $real_name=filterEmoji($real_name);
            $order_name=htmlspecialchars($order_name);
            $symptom=htmlspecialchars($symptom);
            $taking_suggest=htmlspecialchars($taking_suggest);
            $taking_remark=htmlspecialchars($taking_remark);
            if ($test) {
                self::rollbackTrans();
                return [
                    'total_price' => $total_price,
                ];
            }
            $orderInfo = [
                'user_id' => $uid,
                'order_sn' => $test ? 0 : self::createOrderSn('cf'),
                'real_name' => $real_name,
                'user_phone' => $user_phone,
                'total_num' => $total_num,
                'total_price' => $total_price,
                'order_name' => $order_name,
                'symptom' => $symptom,
                'taking_quency' => $taking_quency,
                'taking_cycle' => $taking_cycle,
                'taking_time' => $taking_time,
                'taking_suggest' => $taking_suggest,
                'taking_remark' => $taking_remark,
                'order_type' => 1,
                'status' => 1,
                'platform_leader' => $platform_id,
                'institu_leader' => $institu_id,
                'doctor_leader' => $doctor_id,
                'add_time' => time(),
                'unique' => $key,
                'combination_id'=>'处方单',
            ];
            $order['id']=1;
            $order = self::create($orderInfo);
            if (!$order) return self::setErrorInfo('订单生成失败!', true);
            //保存商品信息
            $res4 = false !== OrderMicrochip::setOrderMicrochipInfo($order['id'], $microchipInfo['data'],$micro);

            if (!$res4 ) return self::setErrorInfo('订单生成失败!', true); //|| !$res5 || !$res6
            //自动设置默认地址
            // UserRepository::storeProductOrderCreateEbApi($order, compact('cartInfo', 'addressId'));
            // self::clearCacheOrderInfo($uid, $key);
            self::commitTrans();
            // StoreOrderStatus::status($order['id'], 'cache_key_create_order', '订单生成');
            return $order;
        } catch (\PDOException $e) {
            self::rollbackTrans();
            return self::setErrorInfo('生成订单时SQL执行错误错误原因：' . $e->getMessage());
        } catch (\Exception $e) {
            self::rollbackTrans();
            return self::setErrorInfo('生成订单时系统错误错误原因：' . $e->getMessage());
        }
    }
    /**
     * 生成处方单
     * @param $uid
     * @param $key
     * @param array $micro
     * @param $platform_id
     * @param bool $real_name
     * @param int $user_phone
     * @param string $order_name
     * @param string $symptom
     * @param int $taking_quency
     * @param int $taking_cycle
     * @param string $taking_time
     * @param string $taking_suggest
     * @param string $taking_remark
     * @param int $institu_id
     * @param bool $test
     * @return StoreOrder|bool|\think\Model
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function cacheKeyCreatePurcharseOrder($uid,$key, $micro,$platform_id,$real_name,$user_phone,$order_name,$idcard,$taking_quency,$taking_cycle,$taking_time=0,$taking_suggest='',$taking_remark = '', $user_phone2,$institu_id = 0,$doctor_id=0,$test=false)
    {
        self::beginTrans();
        try {
            if (self::be(['unique' => $key, 'user_id' => $uid])) return self::setErrorInfo('请勿重复提交处方单', true);
            $userInfo = CrmUsers::getUserInfo($uid);
            if (!$userInfo) return self::setErrorInfo('用户不存在!', true);
            $micro_ids=implode(',',array_keys($micro));
            $microchipInfo=MicrochipModel::getSelectMicrochip(['micro_ids'=>$micro_ids,'platform'=>$platform_id]);
            $micro_price=MicrochipModel::getMicrochipPrice(['micro_ids'=>$micro_ids,'platform'=>$platform_id]);
            $total_price=$micro_price['rmb_price'];
            $total_num=array_sum($micro);
            $real_name=filterEmoji($real_name);
            $order_name=htmlspecialchars($order_name);
            $symptom=htmlspecialchars($symptom);
            $taking_suggest=htmlspecialchars($taking_suggest);
            $taking_remark=htmlspecialchars($taking_remark);
            $idcard=$idcard;
            $user_phone2=$user_phone2;
            if ($test) {
                self::rollbackTrans();
                return [
                    'total_price' => $total_price,
                ];
            }
            $orderInfo = [
                'user_id' => $uid,
                'order_sn' => $test ? 0 : self::createOrderSn('cf'),
                'real_name' => $real_name,
                'user_phone' => $user_phone,
                'total_num' => $total_num,
                'total_price' => $total_price,
                'order_name' => $order_name,
                'symptom' => $symptom,
                'taking_quency' => $taking_quency,
                'taking_cycle' => $taking_cycle,
                'taking_time' => $taking_time,
                'taking_suggest' => $taking_suggest,
                'taking_remark' => $taking_remark,
                'order_type' => 1,
                'status' => 1,
                'platform_leader' => $platform_id,
                'institu_leader' => $institu_id,
                'doctor_leader' => $doctor_id,
                'add_time' => time(),
                'unique' => $key,
                'combination_id'=>'处方单',
            ];
            $order['id']=1;
            $order = self::create($orderInfo);
            if (!$order) return self::setErrorInfo('订单生成失败!', true);
            //保存商品信息
            $res4 = false !== OrderMicrochip::setOrderMicrochipInfo($order['id'], $microchipInfo['data'],$micro);

            if (!$res4 ) return self::setErrorInfo('订单生成失败!', true); //|| !$res5 || !$res6
            //自动设置默认地址
            // UserRepository::storeProductOrderCreateEbApi($order, compact('cartInfo', 'addressId'));
            // self::clearCacheOrderInfo($uid, $key);
            self::commitTrans();
            // StoreOrderStatus::status($order['id'], 'cache_key_create_order', '订单生成');
            return $order;
        } catch (\PDOException $e) {
            self::rollbackTrans();
            return self::setErrorInfo('生成订单时SQL执行错误错误原因：' . $e->getMessage());
        } catch (\Exception $e) {
            self::rollbackTrans();
            return self::setErrorInfo('生成订单时系统错误错误原因：' . $e->getMessage());
        }
    }
     /**
     * 生成订单唯一id
     * @param $uid 用户uid
     * @return string
     */
    public static function createOrderSn($str='cf')
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = number_format((floatval($msec) + floatval($sec)) * 1000, 0, '', '');
        $orderSn = $str . $msectime . mt_rand(10000, 99999);
        if (self::be(['order_sn' => $orderSn])) $orderSn = $str . $msectime . mt_rand(10000, 99999);
        return $orderSn;
    }
    /**
     * 获取订单详情
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public static function getOrderDetails(int $id){
        $order = self::get($id);
        if(!$order)  return self::setErrorInfo('数据不存在' . $e->getMessage());
        if ($order['paid'] == 1) {
            switch ($order['pay_type']) {
                case 'weixin':
                    $order['pay_type_name'] = '微信支付';
                    break;
                case 'yue':
                    $order['pay_type_name'] = '余额支付';
                    break;
                case 'offline':
                    $order['pay_type_name'] = '线下支付';
                    break;
                default:
                    $order['pay_type_name'] = '其他支付';
                    break;
            }
        } else {
            switch ($order['pay_type']) {
                default:
                    $order['pay_type_name'] = '未支付';
                    break;
                case 'offline':
                    $order['pay_type_name'] = '线下支付';
                    $order['pay_type_info'] = 1;
                    break;
            }
        }
        if ($order['paid'] == 0 && $order['status'] == 0) {
            $order['status_name'] = '未支付';
        } else if ($order['paid'] == 1 && $order['status'] == 0 && $order['shipping_type'] == 1 && $order['refund_status'] == 0) {
            $order['status_name'] = '未发货';
        } else if ($order['paid'] == 1 && $order['status'] == 0 && $order['shipping_type'] == 2 && $order['refund_status'] == 0) {
            $order['status_name'] = '未核销';
        } else if ($order['paid'] == 1 && $order['status'] == 1 && $order['shipping_type'] == 1 && $order['refund_status'] == 0) {
            $order['status_name'] = '待收货';
        } else if ($order['paid'] == 1 && $order['status'] == 1 && $order['shipping_type'] == 2 && $order['refund_status'] == 0) {
            $order['status_name'] = '未核销';
        } else if ($order['paid'] == 1 && $order['status'] == 2 && $order['refund_status'] == 0) {
            $order['status_name'] = '待评价';
        } else if ($order['paid'] == 1 && $order['status'] == 3 && $order['refund_status'] == 0) {
            $order['status_name'] = '已完成';
        } else if ($order['paid'] == 1 && $order['refund_status'] == 1) {
            $refundReasonTime = date('Y-m-d H:i', $order['refund_reason_time']);
            $refundReasonWapImg = json_decode($order['refund_reason_wap_img'], true);
            $refundReasonWapImg = $refundReasonWapImg ? $refundReasonWapImg : [];
            $img = '';
            if (count($refundReasonWapImg)) {
                foreach ($refundReasonWapImg as $orderImg) {
                    if (strlen(trim($orderImg)))
                        $img .= '<img style="height:50px;" src="' . $orderImg . '" />';
                }
            }
            if (!strlen(trim($img))) $img = '无';
            if (isset($where['excel']) && $where['excel'] == 1) {
                $refundImageStr = implode(',', $refundReasonWapImg);
                $order['status_name'] = <<<TEXT
退款原因:{$order['refund_reason_wap']}
备注说明：{$order['refund_reason_wap_explain']}
退款时间：{$refundReasonTime}
凭证连接：{$refundImageStr}
TEXT;
                    unset($refundImageStr);
                } else {
                    $order['status_name'] = <<<HTML
<b style="color:#f124c7">申请退款</b><br/>
<span>退款原因：{$order['refund_reason_wap']}</span><br/>
<span>备注说明：{$order['refund_reason_wap_explain']}</span><br/>
<span>退款时间：{$refundReasonTime}</span><br/>
<span>退款凭证：{$img}</span>
HTML;
            }
        } else if ($order['paid'] == 1 && $order['refund_status'] == 2) {
            $order['status_name'] = '已退款';
        }
        if ($order['paid'] == 0 && $order['status'] == 0 && $order['refund_status'] == 0) {
            $order['_status'] = 1;
        } else if ($order['paid'] == 1 && $order['status'] == 0 && $order['refund_status'] == 0) {
            $order['_status'] = 2;
        } else if ($order['paid'] == 1 && $order['refund_status'] == 1) {
            $order['_status'] = 3;
        } else if ($order['paid'] == 1 && $order['status'] == 1 && $order['refund_status'] == 0) {
            $order['_status'] = 4;
        } else if ($order['paid'] == 1 && $order['status'] == 2 && $order['refund_status'] == 0) {
            $order['_status'] = 5;
        } else if ($order['paid'] == 1 && $order['status'] == 3 && $order['refund_status'] == 0) {
            $order['_status'] = 6;
        } else if ($order['paid'] == 1 && $order['refund_status'] == 2) {
            $order['_status'] = 7;
        }
        $_info = Db::name('crm_order_microchip')->where('order_id', $order['id'])->select();
        $_info = count($_info) ? $_info->toArray() : [];
        $order['micro_cate_count']=count($_info);
        $micro_count=0;
        $facts=$ingredient=[];
        foreach ($_info as $k => $v) {
            $micro_info = json_decode($v['micro_info'], true);
            // if (!isset($cart_info['productInfo'])) $cart_info['productInfo'] = [];
            $_info[$k] = array_merge($v,$micro_info);
            $micro_count+=$v['num'];
            $ingre=Db::name('microchip_product_ingredient')->alias('mi')->where(['mi.microchip_id'=>$v['micro_id'],'mi.type'=>2])->join('MicrochipIngredient i','i.id = mi.ingredient_id')->field('i.en_name as name')->select()->toArray();
            foreach ($ingre as $ke => $va) {
                $ingredient[]=$va['name'];
            }unset($va);
            $product=Db::name('microchip_product')->where(['id'=>$v['micro_id']])->field('facts_name,amount,facts_daily,facts_unit')->find();
            $product['amount']=$product['amount']*$v['num'];
            $product['facts_daily']=$product['facts_daily']*$v['num'];
            $facts[]=$product;
            unset($micro_info,$product);
        }unset($v);
        $order['_info']=$_info;
        $order['micro_count']=$micro_count;
        $order['add_time']=date("Y-m-d H:i",$order['add_time']);
        $order['facts']=$facts;
        $order['ingredient']=implode(',',array_unique($ingredient));
        return $order;
    }
    /**
     * 某个类型用户的订单总数
     * @param  array  $type  [description]
     * @param  [type] $model [1 doctor 2 institu 3 platform]
     * @return [type]        [description]
     */
    public static function userOrderCount($order_type,$type=0,$id=''){
        $model=new self;
         $where=['is_system_del'=>0,'order_type'=>$order_type];
        if($type == 1 ){
            $where['doctor_leader']=$id;
        }else if($type == 2){
            $where['institu_leader']=$id;
        }else if ($type == 3){
            $where['platform_leader']=$id;
        }
        $data['wz'] = self::statusByWhere(0, $model)->where($where)->count();
        $data['wf'] = self::statusByWhere(1, $model)->where($where)->where([ 'shipping_type' => 1])->count();
        $data['ds'] = self::statusByWhere(2, $model)->where($where)->where([ 'shipping_type' => 1])->count();
        $data['dp'] = self::statusByWhere(3, $model)->where($where)->count();
        $data['jy'] = self::statusByWhere(4, $model)->where($where)->count();
        $data['tk'] = self::statusByWhere(-1, $model)->where($where)->count();
        $data['yt'] = self::statusByWhere(-2, $model)->where($where)->count();
        $data['del'] = self::statusByWhere(-4, $model)->where($where)->count();
        $data['write_off'] = self::statusByWhere(5, $model)->where($where)->count();
        return $data;
    }
}