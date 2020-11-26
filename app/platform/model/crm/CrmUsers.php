<?php
/**
 * @author: tom
 * @day: 2020/07/29
 */
namespace app\platform\model\crm;
use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use think\facade\Session;
use app\platform\model\label\Label as CategoryModel;
use app\platform\model\ts\Ts as TsModel;
use app\platform\model\crm\CrmPlatform as PlatformModel;
class CrmUsers extends BaseModel
{
    protected $pk = 'user_id';
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
        $data['platform_leader'] >0? $data['platform_time']=time():'';
        $res = self::field('account,password,createtime,add_ip,last_login,last_ip,type,platform_leader,platform_name,platform_time,group,group_discount,group_commission,group_name')->insertGetId($data);
        return $res;
    }
    /**
     * 患者列表
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public static function getPatientList($where){
        $model=self::getModelPlatform($where);
        if(isset($where['excel']) &&$where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
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
        $model=$model->alias('u')->join("CrmPlatform i",'u.user_id=u.institu_leader and i.category=3 and i.status =1 ','left')->field('u.*,i.p_name as institu_name');
        if(!empty($where)){
            $model=$model->group('u.user_id');
            $model=$model->where(['u.is_del'=>0,'u.type'=>0]);
            if(isset($where['keyword']) && $where['keyword']){
                $model=$model->where('u.nickname','like',"%{$where['keyword']}%");
            }
            if(isset($where['institu']) && $where['institu']){
                $model=$model->where('i.p_name','like',"%{$where['institu']}%");
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
     ######   平台登录操作开始
    /**
     * 用户登陆
     * @param $account
     * @param $pwd
     * @return bool
     */
    public static function login($account,$pwd)
    {
        $platformInfo = self::get(['account'=>$account,'type'=>4]);
        if(!$platformInfo) return self::setErrorInfo('登陆的账号不存在!');
        if($platformInfo['is_del'] == 1) return self::setErrorInfo('登陆的账号不存在!');
        if($platformInfo['password'] != md5($pwd)) return self::setErrorInfo('账号或密码错误，请重新输入');
        if($platformInfo['status'] !=1) return self::setErrorInfo('该账号已被关闭!');
        $platform=PlatformModel::where(['user_id'=>$platformInfo['user_id'],'category'=>4])->field('p_name,currency,now_money')->find();
        $platformInfo->p_name=$platform['p_name'];
        $platformInfo->currency=$platform['currency'];
        $platformInfo->now_money=$platform['now_money'];
        self::setLoginInfo($platformInfo);
        event('onPlatformLoginAfter',[$platformInfo]);
        return true;
    }

    /**
     *  保存当前登陆用户信息
     */
    public static function setLoginInfo($platformInfo)
    {
        Session::set('platformId',$platformInfo['user_id']);
        Session::set('platformInfo',$platformInfo->toArray());
        Session::save();
    }

    /**
     * 清空当前登陆用户信息
     */
    public static function clearLoginInfo()
    {
        Session::delete('platformInfo');
        Session::delete('platformId');
        Session::save();
    }

    /**
     * 检查用户登陆状态
     * @return bool
     */
    public static function hasActivePlatform()
    {
        return Session::has('platformId') && Session::has('platformInfo');
    }

    /**
     * 获得登陆用户信息
     * @return mixed
     * @throws \Exception
     */
    public static function activePlatformInfoOrFail()
    {
        $platformInfo = Session::get('platformInfo');
        if(!$platformInfo)  exception('请登陆');
        if($platformInfo['is_del']) exception('该账号已被关闭!');
        if(!$platformInfo['status']) exception('该账号已被关闭!');
        $platformInfo=self::getPlatformInfo($platformInfo);
        return $platformInfo;
    }

    /**
     * 获得登陆用户Id 如果没有直接抛出错误
     * @return mixed
     * @throws \Exception
     */
    public static function activePlatformIdOrFail()
    {
        $platformId = Session::get('platformId');
        if(!$platformId) exception('访问用户为登陆登陆!');
        return $platformId;
    }

    /**
     * @return array|null
     * @throws \Exception
     */
    public static function activePlatformAuthOrFail()
    {
        $platformInfo = self::activePlatformInfoOrFail();
        if(is_object($platformInfo)) $platformInfo = $platformInfo->toArray();
        return $platformInfo['type'] === 0 ? SystemRole::getAllAuth() : SystemRole::rolesByAuth((int)$platformInfo['type']);
    }

    /**
     * 获得有效登录信息
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getValidPlatformInfoOrFail($user_id)
    {
        $platformInfo = self::get(['user_id'=>$user_id]);
        if(!$platformInfo) exception('用户不能存在!');
        if($platformInfo['is_del']) exception('该账号已被关闭!');
        if(!$platformInfo['status']) exception('该账号已被关闭!');
        $platformInfo=self::getPlatformInfo($platformInfo);
        return $platformInfo;
    }

    /**
     * @param string $field
     * @param int $level
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getOrdPlatform($field = 'real_name,id',$level = 0){
        return self::where('level','>=',$level)->field($field)->select();
    }

    public static function getTopPlatform($field = 'real_name,id')
    {
        return self::where('level',0)->field($field)->select();
    }

    /**
     * @param $where
     * @return array
     */
    public static function systemPage($where){
        $model = new self;
        if($where['name'] != '') $model = $model->where('account|real_name','LIKE',"%$where[name]%");
        if($where['roles'] != '') $model = $model->where("CONCAT(',',roles,',')  LIKE '%,$where[roles],%'");
        $model = $model->where('level',$where['level'])->where('is_del',0);
        return self::page($model,function($platform){
            $platform->roles = SystemRole::where('id','IN',$platform->roles)->column('role_name','id');
        },$where);
    }
    /**
     * 获取用户的平台信息
     * @param  [type] $info [登录信息]
     * @return [type]       [description]
     */
    public static function getPlatformInfo($info){
        $platform=PlatformModel::get(['user_id'=>$info['user_id'],'category'=>4]);
        if(!$platform) exception('账号不存在!');
        $info['p_name']=$platform['p_name'];
        $info['currency']=$platform['currency'];
        $info['now_money']=$platform['now_money'];
        $info['p_id']=$platform['id'];
        $info['institu_commission']=$platform['institu_commission'];
        $info['institu_discount']=$platform['institu_discount'];
        $info['doctor_commission']=$platform['doctor_commission'];
        $info['doctor_discount']=$platform['doctor_discount'];
        $info['referral_code']=$platform['referral_code'];
        $info['platform_appid']=$platform['platform_appid'];
        $info['platform_app_secret']=$platform['platform_app_secret'];
        return $info;
    }
    public static function paitentList($where,$withoutField='type,is_del,status'){
        $model=self::getPaitentModelObject($where);
        if($withoutField){
            $model=$model->withoutField($withoutField);
        }else{

        }
        if(isset($where['page']) && isset($where['limit'])) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as $k => &$va) {
            // $va['plat_name']=PlatformModel::where(['user_id'=>$va['platform_leader'],'category'=>4])->value('p_name');
            $va['createtime']=date('Y-m-d H:i',$va['createtime']);
        }unset($va);
        $count=self::getPaitentModelObject($where)->count();
        return compact('count','data');
    }
     /**
     * 获取患者连表MOdel
     * @param $model
     * @return object
     */
    public static function getPaitentModelObject($where=[]){
        $model=new self;
        $model=$model->where(['type'=>0,'is_del'=>0,'status'=>1])->field('user_id as uid,nickname,mobile,createtime,institu_name,doctor_name,platform_name,total_ts,total_order,total_price');//,FROM_UNIXTIME(createtime,"%Y-%c-%d") as add_time
        if(!empty($where)){
            if(isset($where['platform_id']) && $where['platform_id'] !=''){
                $model=$model->where('platform_leader',$where['platform_id']);
            }
            if(isset($where['platform']) && $where['platform']!=''){
                $model = $model->where('platform_name','LIKE',"%{$where['platform']}%");
            }
            if(isset($where['institu_id']) && $where['institu_id'] !=''){
                $model=$model->where('institu_leader',$where['institu_id']);
            }
            if(isset($where['institu']) && $where['institu']!=''){
                $model = $model->where('institu_name','LIKE',"%{$where['institu']}%");
            }
            if(isset($where['doctor_id']) && $where['doctor_id'] !=''){
                $model=$model->where('doctor_leader',$where['doctor_id']);
            }
            if(isset($where['time']) && !empty($where['time'])){//时间
                list($startTime,$endTime)=explode(' - ',$where['time']);
                $model=$model->whereBetween('createtime',[strtotime($startTime),strtotime($endTime)]);
            }
            if(isset($where['keyword']) && $where['keyword']!=''){
                $model = $model->where('nickname|account','LIKE',"%{$where['keyword']}%");
            }
            if(isset($where['order']) && $where['order']!=''){
                $model = $model->order(self::setOrder($where['order']));
            }else{
                $model = $model->order('user_id desc');
            }
        }
        return $model;
    }
}