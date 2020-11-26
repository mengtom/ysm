<?php
namespace app\admin\model\crm;

use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
use think\facade\Db;
use yesai\services\PHPExcelService;

/**
 * 用户消费新增金额明细 model
 * Class Platform
 * @package app\admin\model\user
 */
class CrmPlatformBill extends BaseModel
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
    protected $name = 'crm_platform_bill';

    use ModelTrait;

    /*
     * 获取总佣金
     * */
    public static function getBrokerage($pid,$category = 'now_money',$type='brokerage',$where)
    {
        return self::getModelTime($where,self::where('pid','in',$pid)->where('category',$category)
            ->where('type',$type)->where('pm',1)->where('status',1))->sum('number');
    }

    //修改积分减少积分记录
    public static function expend($title,$pid,$category,$type,$number,$link_id = 0,$balance = 0,$mark = '',$payment,$code,$sys_name,$status = 1)
    {
        $pm = 0;
        $add_time = time();
        return self::create(compact('title','pid','link_id','category','type','number','balance','mark','status','pm','add_time','payment','code','sys_name'));
    }
    //修改积分增加积分记录
    public static function income($title,$pid,$category,$type,$number,$link_id = 0,$balance = 0,$mark = '',$payment,$code,$sys_name,$status = 1){
        $pm = 1;
        $add_time = time();
        return self::create(compact('title','pid','link_id','category','type','number','balance','mark','status','pm','add_time','payment','code','sys_name'));
    }
    //获取柱状图和饼状图数据
    public static function getPlatformBillChart($where,$category='now_money',$type='brokerage',$pm=1,$zoom=15){
        $model=self::getModelTime($where,new self());
        $list=$model->field('FROM_UNIXTIME(add_time,"%Y-%c-%d") as un_time,sum(number) as sum_number')
            ->order('un_time asc')
            ->where('category', $category)
            ->where('type', $type)
            ->where('pm', $pm)
            ->group('un_time')
            ->select();
        if(count($list)) $list=$list->toArray();
        $legdata = [];
        $listdata = [];
        $dataZoom = '';
        foreach ($list as $item){
            $legdata[]=$item['un_time'];
            $listdata[]=$item['sum_number'];
        }
        if(count($legdata)>=$zoom) $dataZoom=$legdata[$zoom-1];
        //获取用户分布钱数
        $fenbulist=self::getModelTime($where,new self(),'a.add_time')
            ->alias('a')
            ->join('user r','a.pid=r.pid')
            ->field('a.pid,sum(a.number) as sum_number,r.nickname')
            ->where('a.category',$category)
            ->where('a.type', $type)
            ->where('a.pm', $pm)
            ->order('sum_number desc')
            ->group('a.pid')
            ->limit(8)
            ->select();
        //获取用户当前时间段总钱数
        $sum_number=self::getModelTime($where,new self())
            ->alias('a')
            ->where('a.category',$category)
            ->where('a.type', $type)
            ->where('a.pm', $pm)
            ->sum('number');
        if(count($fenbulist)) $fenbulist=$fenbulist->toArray();
        $fenbudate=[];
        $fenbu_legend=[];
        $color=['#ffcccc','#99cc00','#fd99cc','#669966','#66CDAA','#ADFF2F','#00BFFF','#00CED1','#66cccc','#ff9900','#ffcc00','#336699','#cccc00','#99ccff','#990066'];
        foreach ($fenbulist as $key=>$value){
            $fenbu_legend[]=$value['nickname'];
            $items['name']=$value['nickname'];
            $items['value']=bcdiv($value['sum_number'],$sum_number,2)*100;
            $items['itemStyle']['color']=$color[$key];
            $fenbudate[]=$items;
        }
        return compact('legdata','listdata','fenbudate','fenbu_legend','dataZoom');
    }
    //获取头部信息
    public static function getRebateBadge($where){
        $datawhere=['category'=>'now_money','type'=>'brokerage','pm'=>1];
        return [
            [
                'name'=>'返利数(笔)',
                'field'=>'个',
                'count'=>self::getModelTime($where,new self())->where($datawhere)->count(),
                'content'=>'返利总笔数',
                'background_color'=>'layui-bg-blue',
                'sum'=>self::where($datawhere)->count(),
                'class'=>'fa fa-bar-chart',
            ],
            [
                'name'=>'返利金额（元）',
                'field'=>'个',
                'count'=>self::getModelTime($where,new self())->where($datawhere)->sum('number'),
                'content'=>'返利总金额',
                'background_color'=>'layui-bg-cyan',
                'sum'=>self::where($datawhere)->sum('number'),
                'class'=>'fa fa-line-chart',
            ],
        ];
    }
    //获取返佣用户信息列表
    public static function getFanList($where){
        $list=self::alias('a')->join('user r','a.pid=r.pid')
            ->where('a.category','now_money')
            ->where('a.type', 'brokerage')
            ->where('a.pm', 1)
            ->order('a.number desc')
            ->join('store_order o','o.id=a.link_id')
            ->field('o.order_id,FROM_UNIXTIME(a.add_time,"%Y-%c-%d") as add_time,a.pid,o.pid as down_pid,r.nickname,r.avatar,r.spread_pid,r.level,a.number')
            ->page((int)$where['page'],(int)$where['limit'])
            ->select();
        if(count($list)) $list=$list->toArray();
        return $list;
    }
    //获取返佣用户总人数
    public static function getFanCount(){
        return self::alias('a')->join('user r','a.pid=r.pid')->join('store_order o','o.id=a.link_id')->where('a.category','now_money')->where('a.type', 'brokerage')->where('a.pm', 1)->count();
    }
    //获取用户充值数据
    public static function getEchartsRecharge($where,$limit=15){
        $datawhere=['category'=>'now_money','pm'=>1];
        $list=self::getModelTime($where,self::where($datawhere)->where('type','in',['recharge','system_add']))
            ->field('sum(number) as sum_money,FROM_UNIXTIME(add_time,"%Y-%c-%d") as un_time,count(id) as count')
            ->group('un_time')
            ->order('un_time asc')
            ->select();
        if(count($list)) $list=$list->toArray();
        $sum_count = self::getModelTime($where,self::where($datawhere)->where('type','in','recharge,system_add'))->count();
        $xdata = [];
        $seriesdata = [];
        $data = [];
        $zoom = '';
        foreach ($list as $value){
            $xdata[]=$value['un_time'];
            $seriesdata[]=$value['sum_money'];
            $data[]=$value['count'];
        }
        if(count($xdata)>$limit){
            $zoom=$xdata[$limit-5];
        }
        return compact('xdata','seriesdata','data','zoom');
    }
    //获取佣金提现列表
    public static function getExtrctOneList($where,$pid){
        $list=self::setOneWhere($where,$pid)
            ->field('number,link_id,mark,FROM_UNIXTIME(add_time,"%Y-%m-%d %H:%i:%s") as _add_time,status')
            ->select();
        count($list) && $list=$list->toArray();
        $count=self::setOneWhere($where,$pid)->count();
        foreach ($list as &$value){
            $value['order_id'] = Db::name('store_order')->where('order_id', $value['link_id'])->value('order_id');
        }
        return ['data'=>$list,'count'=>$count];
    }
    //设置单个用户查询
    public static function setOneWhere($where,$pid){
        $model=self::where('pid', $pid)->where('category', 'now_money')->where('type', 'brokerage');
        $time['data'] = '';
        if(strlen(trim($where['add_time'])) && strlen(trim($where['end_time']))){
            $time['data'] = $where['start_time'].' - '.$where['end_time'];
            $model = self::getModelTime($time,$model);
        }
        if(strlen(trim($where['nickname']))){
            $model = $model->where('link_id|mark','like',"%$where[nickname]%");
        }
        return $model;
    }
    //查询积分个人明细
    public static function getOneIntegralList($where){
        return self::setWhereList(
            $where,'',
//            ['deduction','system_add','sign'],
            ['title','number','balance','mark','FROM_UNIXTIME(add_time,"%Y-%m-%d") as add_time'],
            'integral'
        );
    }
    //查询个人签到明细
    public static function getOneSignList($where){
        return self::setWhereList(
            $where,'sign',
            ['title','number','mark','FROM_UNIXTIME(add_time,"%Y-%m-%d") as add_time']
            );
    }
    //查询个人余额变动记录
    public static function getOneBalanceChangList($where){
         $list=self::setWhereList(
            $where,'',
//            ['system_add','pay_product','extract','pay_product_refund','system_sub','brokerage','recharge','user_recharge_refund'],
            ['FROM_UNIXTIME(add_time,"%Y-%m-%d") as add_time','title','type','mark','number','balance','pm','status'],
            'now_money'
        );
         foreach ($list as &$item){
            switch ($item['type']){
                case 'system_add':
                    $item['_type']='系统添加';
                    break;
                case 'pay_product':
                    $item['_type']='商品购买';
                    break;
                case 'extract':
                    $item['_type']='提现';
                    break;
                case 'pay_product_refund':
                    $item['_type']='退款';
                    break;
                case 'system_sub':
                    $item['_type']='系统减少';
                    break;
                case 'brokerage':
                    $item['_type']='系统返佣';
                    break;
                case 'recharge':
                    $item['_type']='余额充值';
                    break;
                case 'user_recharge_refund':
                    $item['_type']='系统退款';
                    break;
            }
            $item['_pm']=$item['pm']==1 ? '获得': '支出';
         }
         return $list;
    }
    //设置where条件分页.返回数据
    public static function setWhereList($where,$type='',$field=[],$category='integral'){
        $models=self::where('pid',$where['pid'])
            ->where('category',$category)
            ->page((int)$where['page'],(int)$where['limit'])
            ->order('id','desc')
            ->field($field);
        if(is_array($type)){
            $models=$models->where('type','in',$type);
        }else{
            if(!empty($type))$models=$models->where('type',$type);
        }
        return ($list=$models->select()) && count($list) ? $list->toArray():[];
    }
    //获取积分统计头部信息
    public static function getScoreBadgeList($where){
        return [
            [
                'name'=>'历史总积分',
                'field'=>'个',
                'count'=>self::getModelTime($where,new self())->where('category','integral')->where('type','in','gain,system_sub,deduction,sign')->sum('number'),
                'background_color'=>'layui-bg-blue',
                'col'=>4,
            ],
            [
                'name'=>'已使用积分',
                'field'=>'个',
                'count'=>self::getModelTime($where,new self())->where('category','integral')->where('type','deduction')->sum('number'),
                'background_color'=>'layui-bg-cyan',
                'col'=>4,
            ],
            [
                'name'=>'未使用积分',
                'field'=>'个',
                'count'=>self::getModelTime($where,Db::name('user'))->sum('integral'),
                'background_color'=>'layui-bg-cyan',
                'col'=>4,
            ],
        ];
    }
    //获取积分统计曲线图和柱状图
    public static function getScoreCurve($where){
        //发放积分趋势图
         $list=self::getModelTime($where,self::where('category','integral')
            ->field('FROM_UNIXTIME(add_time,"%Y-%m-%d") as _add_time,sum(number) as sum_number')
            ->group('_add_time')->order('_add_time asc'))->select()->toArray();
         $date=[];
         $zoom='';
         $seriesdata=[];
         foreach ($list as $item){
             $date[]=$item['_add_time'];
             $seriesdata[]=$item['sum_number'];
         }
         unset($item);
         if(count($date)>$where['limit']){
             $zoom=$date[$where['limit']-5];
         }
        //使用积分趋势图
        $deductionlist=self::getModelTime($where,self::where('category','integral')->where('type','deduction')
            ->field('FROM_UNIXTIME(add_time,"%Y-%m-%d") as _add_time,sum(number) as sum_number')
            ->group('_add_time')->order('_add_time asc'))->select()->toArray();
         $deduction_date=[];
         $deduction_zoom='';
         $deduction_seriesdata=[];
         foreach ($deductionlist as $item){
             $deduction_date[]=$item['_add_time'];
             $deduction_seriesdata[]=$item['sum_number'];
         }
         if(count($deductionlist)>$where['limit']){
             $deduction_zoom=$deductionlist[$where['limit']-5];
         }
         return compact('date','seriesdata','zoom','deduction_date','deduction_zoom','deduction_seriesdata');
    }

    /**
     * 用户获得总佣金
     * @return float
     */
    public static function getBrokerageCount()
    {
        return self::where('type', 'brokerage')->where('category', 'now_money')->where('status', 1)->where('pm', 1)->sum('number');
    }
    /**
     * 平台充值记录
     */
    public static function rechargeList($where){

        $model=self::getModelObject($where);//->field(['p.*','sum(pav.stock) as vstock'])
        if($where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->Field('add_time,id,number,title,balance,mark,code,payment,sys_name as act_name,pm')->select()) && count($data) ? $data->toArray():[];
        foreach ($data as &$item){
             $item['add_time']=date("Y-m-d H:i",$item['add_time']);
            // $cateName = CategoryModel::where('id', 'IN', $item['cate_id'])->column('cate_name', 'id');
            // $item['cate_name']=is_array($cateName) ? implode(',',$cateName) : '';
            // $item['collect'] = CrmProductRelation::where('product_id',$item['id'])->where('type','collect')->count();//收藏
            // $item['like'] = CrmProductRelation::where('product_id',$item['id'])->where('type','like')->count();//点赞
            // $item['stock'] = self::getStock($item['id'])>0?self::getStock($item['id']):$item['stock'];//库存
            // $item['stock_attr'] = self::getStock($item['id'])>0 ? true : false;//库存
            // $item['sales_attr'] = self::getSales($item['id']);//属性销量
            // $item['visitor'] = CrmVisit::where('product_id',$item['id'])->where('product_type','product')->count();
        }
        unset($item);
        if($where['excel']==1){
            $export = [];
            foreach ($data as $index=>$item){
                $export[] = [
                    $item['add_time'],
                    $item['number'],
                    $item['title'],
                    $item['balance'], //'￥'.
                    $item['act_name'],
                    $item['payment'],
                    $item['code'],
                    $item['mark']
                ];
            }
            PHPExcelService::setExcelHeader(['充值时间','充值金额','充值操作','余额','操作人','收款方式','流水单号','备注'])
                ->setExcelTile($where['time'] ? $where['time'].'月度对账单':'充值记录','账单信息'.time(),' 生成时间：'.date('Y-m-d H:i:s',time()))
                ->setExcelContent($export)
                ->ExcelSave();
        }
        $count=self::getModelObject($where)->count();
        return compact('count','data');

    }
    public static function getModelObject($where=[]){
        $model=new self();
        // $model=$model->alias('p')->join('CrmProductAttrValue pav','p.id=pav.product_id','LEFT');
        if(!empty($where)){
            // $model=$model->group('p.id');
             $model = $model->where(['status'=>1]);
            $model = $model->where(['category'=>'now_money']);
            if(isset($where['id']) && $where['id']!=''){
                // if ($where['type'] == 5) {
                //     $crm_stock = sysConfig('crm_stock');
                //     if($crm_stock < 0) $crm_stock = 2;
                //     $model = $model->where($data)->where('p.stock','<=',$crm_stock);
                // } else {
                    $model = $model->where('pid',$where['id']);
                // }
            }
            if(isset($where['time']) && !empty($where['time'])){
                // list($startTime,$endTime)=explode(' - ',$where['time']);
                $firstday = date("Y-m-01",strtotime($where['time']));
                $lastday = date("Y-m-d",strtotime("$firstday +1 month -1 day"));
                $model=$model->whereBetween('add_time',[strtotime($firstday),strtotime($lastday)]);
            }
            // if(is_numeric($where['min_price']) && is_numeric($where['max_price']) && isset($where['min_price']) && isset($where['max_price'])){
            //     $model=$model->whereBetween('now_money',[$where['min_price'],$where['max_price']]);
            // }
            // if(isset($where['p_name']) && $where['p_name']!=''){
            //     $model = $model->where('p_name','LIKE',"%{$where['p_name']}%");
            // }
//             if(isset($where['cate_id']) && trim($where['cate_id'])!=''){
//                 $catid1 = $where['cate_id'].',';//匹配最前面的cateid
//                 $catid2 = ','.$where['cate_id'].',';//匹配中间的cateid
//                 $catid3 = ','.$where['cate_id'];//匹配后面的cateid
//                 $catid4 = $where['cate_id'];//匹配全等的cateid
// //                $model = $model->whereOr('p.cate_id','LIKE',["%$catid%",$catidab]);
//                 $sql = " LIKE '$catid1%' OR `cate_id` LIKE '%$catid2%' OR `cate_id` LIKE '%$catid3' OR `cate_id`=$catid4";
//                 $model->where(self::getPidSql($where['cate_id']));
//             }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('id desc');
            }
        }
        return $model;
    }

}