<?php
/**
 * @author: xaboy<365615158@qq.com>
 * @day: 2017/11/11
 */

namespace app\doctor\model\microchip;

use app\doctor\model\ump\StoreBargain;
use app\doctor\model\ump\StoreCombination;
use app\doctor\model\ump\StoreSeckill;
use yesai\services\PHPExcelService;
use think\facade\Db;
use yesai\traits\ModelTrait;
use yesai\basic\BaseModel;
// use app\doctor\model\microchip\StoreCategory as CategoryModel;
use app\doctor\model\order\StoreOrder;
use app\doctor\model\system\SystemConfig;

/**
 * 产品管理 model
 * Class MicrochipIngredient
 * @package app\doctor\model\microchip
 */
class MicrochipIngredient extends BaseModel
{
    use ModelTrait;
    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'microchip_ingredient';


    protected static $category_list=['0'=>'活性成分','1'=>'辅料成分'];
    /**删除产品
     * @param $id
     */
    public static function proDelete($id){
//        //删除产品
//        //删除属性
//        //删除秒杀
//        //删除拼团
//        //删除砍价
//        //删除拼团
//        $model=new self();
//        self::beginTrans();
//        $res0 = $model::del($id);
//        $res1 = StoreSeckillModel::where(['id'=>$id])->delete();
//        $res2 = StoreCombinationModel::where(['id'=>$id])->delete();
//        $res3 = StoreBargainModel::where(['id'=>$id])->delete();
//        //。。。。
//        $res = $res0 && $res1 && $res2 && $res3;
//        self::checkTrans($res);
//        return $res;
    }
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
        $model=$model->where('is_del',0);
        if($where['cate_id'] !== '') $model = $model->where('cate_id',$where['cate_id']);
        if($where['keyword'] !== '') $model = $model->where('id|code|zn_name|en_name','like',"%{$where['keyword']}%");
        if($where['page'] >0 && $where['limit'] >0) $model=$model->page((int)$where['page'],(int)$where['limit']);
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
     * 获取产品列表
     * @param $where array
     * @return array
     *
     */
    public static function ProductList($where){
        $model =self::getModelObject($where);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        $count=self::getModelObject($where)->count();
        return compact('count','data');
        // return self::page($model,function($item){},$where);
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
                $item['collect']=self::getModelTime(compact('data'),new MicrochipIngredientRelation)->where('type','collect')->count();
                $item['like']=self::getModelTime(compact('data'),new MicrochipIngredientRelation)->where('type','like')->count();
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
    //获取 badge 内容
    public static function getbadge($where,$type){
        $replenishment_num = SystemConfig::getConfigValue('replenishment_num');
        $replenishment_num = $replenishment_num > 0 ? $replenishment_num : 20;
        $sum = [];
        $lack = 0;

        //获取普通产品缺货
        $stock1 = self::getModelTime($where,new self())->where('stock','<',$replenishment_num)->column('stock','id');
        $sum_stock = self::where('stock','<',$replenishment_num)->column('stock','id');
        $stk = [];
        foreach ($stock1 as $item){
            $stk[] = $replenishment_num-$item;
        }
        $lack = bcadd($lack,array_sum($stk),0);
        foreach ($sum_stock as $val){
            $sum[] = $replenishment_num-$val;
        }
        unset($stk,$sum_stock,$stock1);

        //获取砍价缺货产品
        $stock1 = self::getModelTime($where,new StoreBargain())->where('stock','<',$replenishment_num)->column('stock','id');
        $sum_stock = StoreBargain::where('stock','<',$replenishment_num)->column('stock','id');
        $stk = [];
        foreach ($stock1 as $item){
            $stk[] = $replenishment_num-$item;
        }
        $lack = bcadd($lack,array_sum($stk),0);
        foreach ($sum_stock as $val){
            $sum[] = $replenishment_num-$val;
        }
        unset($stk,$sum_stock,$stock1);

        //获取拼团缺货产品
        $stock1 = self::getModelTime($where,new StoreCombination())->where('stock','<',$replenishment_num)->column('stock','id');
        $sum_stock = StoreCombination::where('stock','<',$replenishment_num)->column('stock','id');
        $stk = [];
        foreach ($stock1 as $item){
            $stk[] = $replenishment_num - $item;
        }
        $lack = bcadd($lack,array_sum($stk),0);
        foreach ($sum_stock as $val){
            $sum[] = $replenishment_num - $val;
        }
        unset($stk,$sum_stock,$stock1);

        return [
            [
                'name'=>'商品种类',
                'field'=>'件',
                'count'=>self::setWhereType(new self(),$type)->where('add_time','<',mktime(0,0,0,date('m'),date('d'),date('Y')))->count(),
                'content'=>'商品数量总数',
                'background_color'=>'layui-bg-blue',
                'sum'=>self::count(),
                'class'=>'fa fa fa-ioxhost',
            ],
            [
                'name'=>'商品总数',
                'field'=>'件',
                'count'=>self::setWhereType(self::getModelTime($where,new self),$type)->sum('stock'),
                'content'=>'增商品总数',
                'background_color'=>'layui-bg-cyan',
                'sum'=>self::where('is_new',1)->sum('stock'),
                'class'=>'fa fa-line-chart',
            ],
            [
                'name'=>'活动商品',
                'field'=>'件',
                'count'=>self::getActivityProductSum($where),
                'content'=>'活动商品总数',
                'background_color'=>'layui-bg-green',
                'sum'=>self::getActivityProductSum(),
                'class'=>'fa fa-bar-chart',
            ],
            [
                'name'=>'缺货商品',
                'field'=>'件',
                'count'=>$lack,
                'content'=>'总商品数量',
                'background_color'=>'layui-bg-orange',
                'sum'=>array_sum($sum),
                'class'=>'fa fa-cube',
            ],
        ];
    }

    /*
     * 获取活动产品总和
     * @param array $where 查询条件
     * */
    public static function getActivityProductSum($where=false)
    {
        if($where){
            $bargain=self::getModelTime($where,new StoreBargain())->sum('stock');
            $pink=self::getModelTime($where,new StoreCombination())->sum('stock');
            $seckill=self::getModelTime($where,new StoreSeckill())->sum('stock');
        }else{
            $bargain=StoreBargain::sum('stock');
            $pink=StoreCombination::sum('stock');
            $seckill=StoreSeckill::sum('stock');
        }
        return bcadd(bcadd($bargain,$pink,0),$seckill,0);
    }

    public static function setWhereType($model,$type){
        switch ($type){
            case 1:
                $data = ['is_show'=>1,'is_del'=>0];
                break;
            case 2:
                $data = ['is_show'=>0,'is_del'=>0];
                break;
            case 3:
                $data = ['is_del'=>0];
                break;
            case 4:
                $data = ['is_show'=>1,'is_del'=>0,'stock'=>0];
                break;
            case 5:
                $data = ['is_show'=>1,'is_del'=>0,'stock'=>['elt',1]];
                break;
            case 6:
                $data = ['is_del'=>1];
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
        $model=StoreOrder::alias('a')->join('StoreOrderCartInfo c','a.id=c.oid')->join('microchip_product b','b.id=c.id');
        $list=self::getModelTime($where,$model,'a.add_time')->group('c.id')->order('p_count desc')->limit(10)
            ->field(['count(c.id) as p_count','b.microchip_name','sum(b.price) as sum_price'])->select();
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
            $item['microchip_name']=self::getSubstrUTf8($item['microchip_name']);
        }
        $maxList['sum_count']=$sum_count;
        $maxList['sum_price']=$sum_price;
        $maxList['list']=$list;
        return $maxList;
    }
    //获取利润
    public static function ProfityTop10($where){
        $classs=['layui-bg-red','layui-bg-orange','layui-bg-green','layui-bg-blue','layui-bg-cyan'];
        $model=StoreOrder::alias('a')
            ->join('StoreOrderCartInfo c','a.id=c.oid')
            ->join('microchip_product b','b.id=c.id')
            ->where('b.is_show',1)
            ->where('b.is_del',0);
        $list=self::getModelTime($where,$model,'a.add_time')->group('c.id')->order('profity desc')->limit(10)
            ->field(['count(c.id) as p_count','b.microchip_name','sum(b.price) as sum_price','(b.price-b.cost) as profity'])
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
            $item['microchip_name']=self::getSubstrUTf8($item['microchip_name'],30);
        }
        $maxList['sum_count']=$sum_count;
        $maxList['sum_price']=$sum_price;
        $maxList['list']=$list;
        return $maxList;
    }
    //获取缺货
    public static function getLackList($where){
        $replenishment_num = SystemConfig::getConfigValue('replenishment_num');
        $replenishment_num = $replenishment_num > 0 ? $replenishment_num : 20;
        $list=self::where('stock','<',$replenishment_num)->field(['id','microchip_name','stock','price'])->page((int)$where['page'],(int)$where['limit'])->order('stock asc')->select();
        if(count($list)) $list=$list->toArray();
        $count=self::where('stock','<',$replenishment_num)->count();
        return ['count'=>$count,'data'=>$list];
    }
    //获取差评
    public static function getnegativelist($where){
        $list=self::alias('s')->join('MicrochipIngredientReply r','s.id=r.id')
            ->field('s.id,s.microchip_name,s.price,count(r.id) as count')
            ->page((int)$where['page'],(int)$where['limit'])
            ->where('r.product_score',1)
            ->order('count desc')
            ->group('r.id')
            ->select();
        if(count($list)) $list=$list->toArray();
        $count=self::alias('s')->join('MicrochipIngredientReply r','s.id=r.id')->group('r.id')->where('r.product_score',1)->count();
        return ['count'=>$count,'data'=>$list];
    }
    public static function TuiProductList(){
        $perd=StoreOrder::alias('s')->join('StoreOrderCartInfo c','s.id=c.oid')
            ->field('count(c.id) as count,c.id as id')
            ->group('c.id')
            ->where('s.status',-1)
            ->order('count desc')
            ->limit(10)
            ->select();
        if(count($perd)) $perd=$perd->toArray();
        foreach ($perd as &$item){
            $item['microchip_name']=self::where(['id'=>$item['id']])->value('microchip_name');
            $item['price']=self::where(['id'=>$item['id']])->value('price');
        }
        return $perd;
    }
    //编辑库存
    public static function changeStock($stock,$productId)
    {
        return self::edit(compact('stock'),$productId);
    }
    //获取库存数量
    public static function getStock($productId)
    {
        return MicrochipIngredientAttrValue::where(['id'=>$productId])->sum('stock');
    }
    //获取总销量
    public static function getSales($productId)
    {
        return MicrochipIngredientAttrValue::where(['id'=>$productId])->sum('sales');
    }

    public static function getTierList($model = null)
    {
        if($model === null) $model = new self();
        return $model->field('id,microchip_name')->where('is_del',0)->select()->toArray();
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
        $model=self::getModelTime($time, Db::name('microchip_cart')->alias('a')->join('microchip_product b','a.id=b.id'),'a.add_time');
        if(isset($where['title']) && $where['title']!=''){
            $model=$model->where('b.microchip_name|b.id','like',"%$where[title]%");
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
            ->group('a.id')
            ->field(['sum(a.cart_num) as num_product','b.microchip_name','b.image','b.price','b.id'])
            ->order('num_product desc')
            ->page((int)$where['page'],(int)$where['limit'])
            ->select();
        $count=self::setWhere($where)->where('a.is_pay',1)->group('a.id')->count();
        foreach ($data as &$item){
            $item['sum_price']=bcmul($item['num_product'],$item['price'],2);
        }
        return compact('data','count');
    }
    public static function SaveProductExport($where){
        $list=self::setWhere($where)
            ->where('a.is_pay',1)
            ->field(['sum(a.cart_num) as num_product','b.microchip_name','b.image','b.price','b.id'])
            ->order('num_product desc')
            ->group('a.id')
            ->select();
        $export=[];
        foreach ($list as $item){
            $export[]=[
                $item['id'],
                $item['microchip_name'],
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
            ->group('a.id')
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
                'count'=>Db::name('microchip_product_relation')->where('id',$id)->where('type','like')->count(),
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
            ->where('a.id',$where['id'])
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
            ->where('a.id', $where['id'])
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
    public static function getProductField($id,$field = 'microchip_name'){
        return self::where('id',$id)->value($field);
    }
    /**
     * 获取成分类型
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public static function getCateName(int $id){
        $cate=self::$category_list;
        if($cate[$id]){
            return $cate[$id];
        }else{
            return $cate;
        }
    }
    /**
     * TODO 获取某个字段值
     * @param $id
     * @param string $field
     * @return mixed
     */
    public static function checkIngredientExist($field,$value){
        if($info=self::where($field,$value)->find())
            return $info;
        else
            return false;
    }
}