<?php
/**
 * @author:tom
 * @day: 2020/08/14
 */
namespace app\institu\model\crm;
use yesai\services\PHPExcelService;
use think\facade\Db;
use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
use app\institu\model\crm\CrmOrder;
use app\institu\model\crm\CrmUsers;
use app\institu\model\system\SystemConfig;
/**
 * 医生管理 model
 * Class CrmPlatform
 * @package app\institu\model\crm
 */
class CrmDoctor extends BaseModel
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
    protected $name = 'crm_doctor';
    use ModelTrait;
    /**
     * 获取连表查询条件
     * @param $type
     * @return array
     */
    public static function setData($type){
        switch ((int)$type){
            case 1:
                $data = ['p.is_show'=>1,'p.is_del'=>0];
                break;
            case 2:
                $data = ['p.is_show'=>0,'p.is_del'=>0];
                break;
            case 3:
                $data = ['p.is_del'=>0];
                break;
            case 4:
                $data = ['p.is_show'=>1,'p.is_del'=>0,'pav.stock|p.stock'=>0];
                break;
            case 5:
                $data = ['p.is_show'=>1,'p.is_del'=>0];
                break;
            case 6:
                $data = ['p.is_del'=>1];
                break;
        };
        return isset($data) ? $data: [];
    }
    /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelObject($where=[]){
        $model=new self();
        $model=$model->alias('p')->join('CrmUsers u','u.user_id=p.user_id and u.type =1','LEFT')->Field('p.createtime,p.id,p.name,p.currency,p.total_price,p.total_order,p.referrer,p.refer_mobile,p.now_money as money,u.account,p.refer_email,p.re_payment,u.platform_name,p.platform_leader,p.total_doctor,p.total_patient,p.institu_leader,p.total_ts,p.ca,p.business_license,p.group,u.group_name,u.group_commission,u.group_discount,u.user_id as uid');
        if(!empty($where)){
            $model=$model->group('p.id');
            $model = $model->where(['p.status'=>1,'category'=>1]);
            if(isset($where['id']) && $where['id']){
                $model = $model->where('p.id',$where['id']);
            }
            if(isset($where['group']) && $where['group'] !=''){//类型
                $model = $model->where('p.group_id',$where['group']);
            }
            if(isset($where['time']) && !empty($where['time'])){//时间
                list($startTime,$endTime)=explode(' - ',$where['time']);
                $model=$model->whereBetween('p.createtime',[strtotime($startTime),strtotime($endTime)]);
            }
            if(isset($where['keyword']) && $where['keyword']!=''){//名称
                $model = $model->where('p.name','LIKE',"%{$where['keyword']}%");
            }
            if(isset($where['platform']) && (int)$where['platform']){//平台
                $model = $model->where('p.platform_leader',$where['platform']);
            }
            if(isset($where['institu']) && (int)$where['institu']){//机构
                $model = $model->where('p.institu_leader',$where['institu']);
            }
            if(isset($where['category']) && (int)$where['category']){
                $model = $model->where('p.category',$where['category']);
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('p.id desc');
            }
        }
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
    /** 如果有子分类查询子分类获取拼接查询sql
     * @param $cateid
     * @return string
     */
    protected static function getPidSql($cateid){

        $sql = self::getCateSql($cateid);
        $ids = CategoryModel::where('pid', $cateid)->column('id','id');
        //查询如果有子分类获取子分类查询sql语句
        if($ids) foreach ($ids as $v) $sql .= " OR ".self::getcatesql($v);
        return $sql;
    }
    /*
     * 获取醫生列表
     * @param $where array
     * @return array
     *
     */
    public static function DoctorList($where,$fieldout=[]){
        $model=self::getModelObject($where);
        if(is_array($fieldout)){
            $model=$model->field($fieldout,true);
        }
        if(isset($where['excel']) && $where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as &$item){
             $item['createtime']=date("Y-m-d H:i",$item['createtime']);
             // $item['plat_name'] =self::where(['id'=>$item['platform_leader'],'category'=>4])->value('name');
             $item['num'] =Db::name('crm_users')->where(["doctor_leader"=>$item['id'],'type'=>0])->count();
             // $item['institu_name'] =self::where(['id'=>$item['institu_leader'],'category'=>3])->value('name');
        }
        unset($item);
        if(isset($where['excel']) && $where['excel']==1){
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

    public static function getChatrdata($type,$data){
        $legdata=['销量','数量','点赞','收藏'];
        $model=self::setWhereType(self::order('id desc'),$type);
        $list=self::getModelTime(compact('data'),$model)
            ->field('FROM_UNIXTIME(add_time,"%Y-%c-%d") as un_time,count(id) as count,sum(sales) as sales')
            ->group('un_time')
            ->distinct(true)
            ->select()
            ->each(function($item) use($data){
                $item['collect']=self::getModelTime(compact('data'),new CrmProductRelation)->where('type','collect')->count();
                $item['like']=self::getModelTime(compact('data'),new CrmProductRelation)->where('type','like')->count();
            })->toArray();
        $chatrList=[];
        $datetime=[];
        $data_item=[];
        $itemList=[0=>[],1=>[],2=>[],3=>[]];
        foreach ($list as $item){
            $itemList[0][]=$item['sales'];
            $itemList[1][]=$item['count'];
            $itemList[2][]=$item['like'];
            $itemList[3][]=$item['collect'];
            array_push($datetime,$item['un_time']);
        }
        foreach ($legdata as $key=>$leg){
            $data_item['name']=$leg;
            $data_item['type']='line';
            $data_item['data']=$itemList[$key];
            $chatrList[]=$data_item;
            unset($data_item);
        }
        unset($leg);
        $badge=self::getbadge(compact('data'),$type);
        $count=self::setWhereType(self::getModelTime(compact('data'),new self()),$type)->count();
        return compact('datetime','chatrList','legdata','badge','count');

    }


    /*
     * 获取活动产品总和
     * @param array $where 查询条件
     * */
    public static function getActivityProductSum($where=false)
    {
        if($where){
            $bargain=self::getModelTime($where,new CrmBargain())->sum('stock');
            $pink=self::getModelTime($where,new CrmCombination())->sum('stock');
            $seckill=self::getModelTime($where,new CrmSeckill())->sum('stock');
        }else{
            $bargain=CrmBargain::sum('stock');
            $pink=CrmCombination::sum('stock');
            $seckill=CrmSeckill::sum('stock');
        }
        return bcadd(bcadd($bargain,$pink,0),$seckill,0);
    }

    public static function setWhereType($model,$type){
        switch ($type){
            case 1:
                $data = ['category'=>1,'status'=>1];
                break;
            case 2:
                $data = ['category'=>2,'status'=>1];
                break;
            case 3:
                $data = ['category'=>3,'status'=>1];
                break;
            case 4:
                $data = ['category'=>4,'status'=>1];
                break;
            case 5:
                $data = ['category'=>5,'status'=>1];
                break;
            case 6:
                $data = ['category'=>6,'status'=>1];
                break;
        }
        if(isset($data)) $model = $model->where($data);
        return $model;
    }
    /*
     * layui-bg-red 红 layui-bg-orange 黄 layui-bg-green 绿 layui-bg-blue 蓝 layui-bg-cyan 黑
     * 销量排行 top 10
     */
    public static function getMaxList($where){
        $classs=['layui-bg-red','layui-bg-orange','layui-bg-green','layui-bg-blue','layui-bg-cyan'];
        $model=CrmOrder::alias('a')->join('CrmOrderCartInfo c','a.id=c.oid')->join('crm_product b','b.id=c.product_id');
        $list=self::getModelTime($where,$model,'a.add_time')->group('c.product_id')->order('p_count desc')->limit(10)
            ->field(['count(c.product_id) as p_count','b.crm_name','sum(b.price) as sum_price'])->select();
        if(count($list)) $list=$list->toArray();
        $maxList=[];
        $sum_count=0;
        $sum_price=0;
        foreach ($list as $item){
            $sum_count+=$item['p_count'];
            $sum_price=bcadd($sum_price,$item['sum_price'],2);
        }
        unset($item);
        foreach ($list as $key=>&$item){
            $item['w']=bcdiv($item['p_count'],$sum_count,2)*100;
            $item['class']=isset($classs[$key]) ?$classs[$key]:( isset($classs[$key-count($classs)]) ? $classs[$key-count($classs)]:'');
            $item['crm_name']=self::getSubstrUTf8($item['crm_name']);
        }
        $maxList['sum_count']=$sum_count;
        $maxList['sum_price']=$sum_price;
        $maxList['list']=$list;
        return $maxList;
    }
    //获取利润
    public static function ProfityTop10($where){
        $classs=['layui-bg-red','layui-bg-orange','layui-bg-green','layui-bg-blue','layui-bg-cyan'];
        $model=CrmOrder::alias('a')
            ->join('CrmOrderCartInfo c','a.id=c.oid')
            ->join('crm_product b','b.id=c.product_id')
            ->where('b.is_show',1)
            ->where('b.is_del',0);
        $list=self::getModelTime($where,$model,'a.add_time')->group('c.product_id')->order('profity desc')->limit(10)
            ->field(['count(c.product_id) as p_count','b.crm_name','sum(b.price) as sum_price','(b.price-b.cost) as profity'])
            ->select();
        if(count($list)) $list=$list->toArray();
        $maxList=[];
        $sum_count=0;
        $sum_price=0;
        foreach ($list as $item){
            $sum_count+=$item['p_count'];
            $sum_price=bcadd($sum_price,$item['sum_price'],2);
        }
        foreach ($list as $key=>&$item){
            $item['w']=bcdiv($item['sum_price'],$sum_price,2)*100;
            $item['class']=isset($classs[$key]) ?$classs[$key]:( isset($classs[$key-count($classs)]) ? $classs[$key-count($classs)]:'');
            $item['crm_name']=self::getSubstrUTf8($item['crm_name'],30);
        }
        $maxList['sum_count']=$sum_count;
        $maxList['sum_price']=$sum_price;
        $maxList['list']=$list;
        return $maxList;
    }

    public static function TuiProductList(){
        $perd=CrmOrder::alias('s')->join('CrmOrderCartInfo c','s.id=c.oid')
            ->field('count(c.product_id) as count,c.product_id as id')
            ->group('c.product_id')
            ->where('s.status',-1)
            ->order('count desc')
            ->limit(10)
            ->select();
        if(count($perd)) $perd=$perd->toArray();
        foreach ($perd as &$item){
            $item['crm_name']=self::where(['id'=>$item['id']])->value('crm_name');
            $item['price']=self::where(['id'=>$item['id']])->value('price');
        }
        return $perd;
    }

    //获取总销量
    public static function getSales($productId)
    {
        return CrmProductAttrValue::where(['product_id'=>$productId])->sum('sales');
    }

    public static function getTierList($model = null)
    {
        if($model === null) $model = new self();
        return $model->field('id,crm_name')->where('is_del',0)->select()->toArray();
    }
    /**
     * 设置查询条件
     * @param array $where
     * @return array
     */
    public static function setWhere($where){
        $time['data']='';
        if(isset($where['start_time']) && $where['start_time']!='' && isset($where['end_time']) && $where['end_time']!=''){
            $time['data']=$where['start_time'].' - '.$where['end_time'];
        }else{
            $time['data']=isset($where['data'])? $where['data']:'';
        }
        $model=self::getModelTime($time, Db::name('crm_cart')->alias('a')->join('crm_product b','a.product_id=b.id'),'a.add_time');
        if(isset($where['title']) && $where['title']!=''){
            $model=$model->where('b.crm_name|b.id','like',"%$where[title]%");
        }
        return $model;
    }
    /**
     * 获取真实销量排行
     * @param array $where
     * @return array
     */
    public static function getSaleslists($where){
        $data=self::setWhere($where)->where('a.is_pay',1)
            ->group('a.product_id')
            ->field(['sum(a.cart_num) as num_product','b.crm_name','b.image','b.price','b.id'])
            ->order('num_product desc')
            ->page((int)$where['page'],(int)$where['limit'])
            ->select();
        $count=self::setWhere($where)->where('a.is_pay',1)->group('a.product_id')->count();
        foreach ($data as &$item){
            $item['sum_price']=bcmul($item['num_product'],$item['price'],2);
        }
        return compact('data','count');
    }
    public static function SaveProductExport($where){
        $list=self::setWhere($where)
            ->where('a.is_pay',1)
            ->field(['sum(a.cart_num) as num_product','b.crm_name','b.image','b.price','b.id'])
            ->order('num_product desc')
            ->group('a.product_id')
            ->select();
        $export=[];
        foreach ($list as $item){
            $export[]=[
                $item['id'],
                $item['crm_name'],
                $item['price'],
                bcmul($item['num_product'],$item['price'],2),
                $item['num_product'],
            ];
        }
        PHPExcelService::setExcelHeader(['商品编号','商品名称','商品售价','销售额','销量'])
            ->setExcelTile('产品销量排行','产品销量排行',' 生成时间：'.date('Y-m-d H:i:s',time()))
            ->setExcelContent($export)
            ->ExcelSave();
    }
    /*
     *  单个商品详情的头部查询
     *  $id 商品id
     *  $where 条件
     */
    public static function getProductBadgeList($id,$where){
        $data['data']=$where;
        $list=self::setWhere($data)
            ->field(['sum(a.cart_num) as num_product','b.id','b.price'])
            ->where('a.is_pay',1)
            ->group('a.product_id')
            ->order('num_product desc')
            ->select();
        //排名
        $ranking=0;
        //销量
        $xiaoliang=0;
        //销售额 数组
        $list_price=[];
        foreach ($list as $key=>$item){
            if($item['id']==$id){
                $ranking=$key+1;
                $xiaoliang=$item['num_product'];
            }
            $value['sum_price']=$item['price']*$item['num_product'];
            $value['id']=$item['id'];
            $list_price[]=$value;
        }
        //排序
        $list_price=self::my_sort($list_price,'sum_price',SORT_DESC);
        //销售额排名
        $rank_price=0;
        //当前销售额
        $num_price=0;
        if($list_price!==false && is_array($list_price)){
            foreach ($list_price as $key=>$item){
                if($item['id']==$id){
                    $num_price=$item['sum_price'];
                    $rank_price=$key+1;
                    continue;
                }
            }
        }
        return [
            [
                'name'=>'销售额排名',
                'field'=>'名',
                'count'=>$rank_price,
                'background_color'=>'layui-bg-blue',
            ],
            [
                'name'=>'销量排名',
                'field'=>'名',
                'count'=>$ranking,
                'background_color'=>'layui-bg-blue',
            ],
            [
                'name'=>'商品销量',
                'field'=>'名',
                'count'=>$xiaoliang,
                'background_color'=>'layui-bg-blue',
            ],
            [
                'name'=>'点赞次数',
                'field'=>'个',
                'count'=>Db::name('crm_product_relation')->where('product_id',$id)->where('type','like')->count(),
                'background_color'=>'layui-bg-blue',
            ],
            [
                'name'=>'销售总额',
                'field'=>'元',
                'count'=>$num_price,
                'background_color'=>'layui-bg-blue',
                'col'=>12,
            ],
        ];
    }
    /*
     * 处理二维数组排序
     * $arrays 需要处理的数组
     * $sort_key 需要处理的key名
     * $sort_order 排序方式
     * $sort_type 类型 可不填写
     */
    public static function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
        if(is_array($arrays)){
            foreach ($arrays as $array){
                if(is_array($array)){
                    $key_arrays[] = $array[$sort_key];
                }else{
                    return false;
                }
            }
        }
        if(isset($key_arrays)){
            array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
            return $arrays;
        }
        return false;
    }
    /*
     * 查询单个商品的销量曲线图
     *
     */
    public static function getProductCurve($where){
        $list=self::setWhere($where)
            ->where('a.product_id',$where['id'])
            ->where('a.is_pay',1)
            ->field(['FROM_UNIXTIME(a.add_time,"%Y-%m-%d") as _add_time','sum(a.cart_num) as num'])
            ->group('_add_time')
            ->order('_add_time asc')
            ->select();
        $seriesdata=[];
        $date=[];
        $zoom='';
        foreach ($list as $item){
            $date[]=$item['_add_time'];
            $seriesdata[]=$item['num'];
        }
        if(count($date)>$where['limit']) $zoom=$date[$where['limit']-5];
        return compact('seriesdata','date','zoom');
    }
    /*
     * 查询单个商品的销售列表
     *
     */
    public static function getSalelList($where){
        return self::setWhere($where)
            ->where('a.product_id', $where['id'])
            ->where('a.is_pay', 1)
            ->join('user c','c.uid=a.uid')
            ->field(['FROM_UNIXTIME(a.add_time,"%Y-%m-%d") as _add_time','c.nickname','b.price','a.id','a.cart_num as num'])
            ->page((int)$where['page'],(int)$where['limit'])
            ->select();
    }

    /**
     * TODO 获取某个字段值
     * @param $id
     * @param string $field
     * @return mixed
     */
    public static function getProductField($id,$field = 'crm_name'){
        return self::where('id',$id)->value($field);
    }
    /**
     * 添加医生
     * @param [type] $data [description]
     */
    public static function addDoctor($data){
        $data['createtime'] = time();
        $data['add_ip']=app('request')->ip();
        $data['plat_type'] = 'institution';
        $data['category']= 1;
        $res = self::field('name,user_id,referrer,refer_mobile,refer_email,now_money,currency,createtime,add_ip,plat_type,group,platform_leader,institu_leader,category')->insert($data);
        return $res;
    }
    /**
     * 获取单个平台信息
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public static function getDoctorInfo($where){
        $model=self::getModelObject($where);
        $data=($data=$model->find()) && count($data) ? $data->toArray():[];
        $data?  $data['createtime']=date("Y-m-d H:i",$data['createtime']): '';
        return $data;
    }
    public static function deleteDoctor(int $id,int $uid){
        $order=CrmOrder::where(['doctor_leader'=>$id,'is_del'=>0])->value('order_sn');
        $user=CrmUsers::where(['doctor_leader'=>$id,'is_del'=>0])->value('user_id');
        if($order || $user)
            return false;
        $data['status'] = 0;
        $data['updatetime']= time();
        $data['id']=$id;
        $default=CrmUsers::update(['is_del'=>1,'user_id'=>$uid]);
        if($default)
            return self::update($data);
        else
            return self::setErrorInfo('删除失败');


    }
}