<?php
/**
 * @author: tom
 * @day: 2020/7/08
 */
namespace app\admin\model\crm;
use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use app\admin\model\label\Label as CategoryModel;
use app\admin\model\ts\Ts as TsModel;
use app\admin\model\crm\CrmPlatform as PlatformModel;
class CrmUsers extends BaseModel
{

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'crm_users';

    use ModelTrait;

    /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelObject($where=[]){
        $model=new TsModel;
        $model=$model->alias('pi')->join("CrmPlatformTs i",'i.ts_id=pi.id and i.platform_id= '.$where['id'],'left')->field('pi.*,i.platform_id,i.status');
        if(!empty($where)){
            $model=$model->group('pi.id');
            if(isset($where['cate2']) && trim($where['cate2'])!=''){
                $model=$model->where(self::getPidSql($where['cate2'],'i.cate_id'));
            }
            if(isset($where['keyword']) && $where['keyword']!=''){
                $model = $model->where('i.code|i.zn_name|i.en_name','LIKE',"%{$where['keyword']}%");
            }
            if(isset($where['status']) && trim($where['status'])!=''){
                $model=$model->where('i.status',$where['status']);
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('pi.id desc');
            }
        }
        return $model;
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
    /**
     * 获取可用微片
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function getSelectIngredient($where)
    {
        $model=self::getModelObject($where);
        if($where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as $k => &$va) {
            // $va['dose_range']=$va['dose_min'].'-'.$va['dose_max'];
            // $va['cate1_name']=CategoryModel::where('id','=',$va['cate_id'])->value('title');
            $va['LAY_CHECKED']=$va['status'] == 1 ? true:false;
        }unset($va);
        if($where['excel']==1){
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
    /**
     * 密码修改
     * @param $account
     * @param $password
     * @return User|bool
     */
    public static function reset($account, $password)
    {
        if (!self::be(['account' => $account])) return self::setErrorInfo('账号不存在');
        $count = self::where('account', $account)->where('password', md5($password))->count();
        if ($count) return true;
        return self::where('account', $account)->update(['password' => md5($password)]);
    }
     /**
     * 添加平台
     * @param [type] $data [description]
     */
    public static function addUsers($data){
        if (self::be(['account' => $data['account']])) return self::setErrorInfo('账号已存在');
        $data['account']=htmlspecialchars(trim($data['account']));
        $data['password']=MD5($data['password']);
        $data['createtime'] = time();
        $data['add_ip']=app('request')->ip();
        $data['last_login'] = time();
        $data['last_ip'] = app('request')->ip();
        $res = self::field('account,password,createtime,add_ip,last_login,last_ip,type,adminid')->insertGetId($data);
        return $res;
    }
    public static function getPatientList($where,$withoutField='password,platform_leader,institu_leader,doctor_leader,is_del,add_ip'){
        $model=self::getModelPlatform($where);
        if(isset($where['excel']) &&$where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        if($withoutField)
            $model=$model->withoutField($withoutField);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as $k => &$va) {
            $va['plat_name']=PlatformModel::where(['user_id'=>$va['platform_leader'],'category'=>4])->value('p_name');
            $va['createtime']=date('Y-m-d H:i',$va['createtime']);
        }unset($va);
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
        $count=self::getModelPlatform($where)->count();
        return compact('count','data');
    }
     /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelPlatform($where=[]){
        $model=new self();
        $model=$model->alias('u')->field('u.*');
        if(!empty($where)){
            $model=$model->group('u.user_id');
            $model=$model->where(['u.is_del'=>0,'u.type'=>0]);
            if(isset($where['keyword']) && $where['keyword']){
                $model=$model->where('u.nickname','like',"%{$where['keyword']}%");
            }
            if(isset($where['institu']) && $where['institu']){
                $model=$model->where('u.institu_name','like',"%{$where['institu']}%");
            }
            if(isset($where['platform']) && $where['platform']){
                $model=$model->where('u.platform_leader',$where['platform']);
            }
            if(isset($where['time']) && !empty($where['time'])){
                list($startTime,$endTime)=explode(' - ',$where['time']);
                $model=$model->whereBetween('u.createtime',[strtotime($startTime),strtotime($endTime)]);
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('u.user_id desc');
            }
        }
        return $model;
    }
}