<?php
/**
 * @author: tom
 * @day: 2020/07/29
 */
namespace app\institu\model\crm;
use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use think\facade\Session;
use app\institu\model\label\Label as CategoryModel;
use app\institu\model\ts\Ts as TsModel;
use app\institu\model\crm\CrmInstitution as InstituModel;
use app\institu\model\crm\CrmDoctor as DoctorModel;
use app\institu\model\crm\SystemMenus;
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
        $model=$model->alias('pi')->join("CrmPlatformTs i",'i.ts_id=pi.id and i.institu_id= '.$where['id'],'left')->field('pi.*,i.institu_id,i.status');
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
        $count = self::where('account', $account)->where('password', $password)->count();
        if ($count) return true;
        return self::where('account', $account)->update(['password' => $password]);
    }
     /**
     * 添加医生
     * @param [type] $data [description]
     */
    public static function addUsers($data){
        if (self::be(['account' => $data['account']])) return self::setErrorInfo('账号已存在');
        $data['account']=htmlspecialchars(trim($data['account']));
        $data['password']=$data['password'];
        $data['createtime'] = time();
        $data['add_ip']=app('request')->ip();
        $data['last_login'] = time();
        $data['last_ip'] = app('request')->ip();
        isset($data['institu_leader']) && $data['institu_leader'] >0? $data['institu_time']=time():'';
        $res = self::field('account,password,createtime,add_ip,last_login,last_ip,type,platform_leader,platform_name,platform_time,institu_leader,institu_name,institu_time,group,group_discount,group_commission,group_name')->insertGetId($data);
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
        $instituInfo = self::get(['account'=>$account]);
        if(!$instituInfo) return self::setErrorInfo('登陆的账号不存在!');
        if($instituInfo['is_del'] == 1) return self::setErrorInfo('登陆的账号不存在!');
        if(!in_array($instituInfo['type'],[2,3])) return self::setErrorInfo('登陆的账号不存在!');
        if($instituInfo['password'] != md5($pwd)) return self::setErrorInfo('账号或密码错误，请重新输入');
        if($instituInfo['status'] !=1) return self::setErrorInfo('该账号已被关闭!');
        switch ($instituInfo['type']) {
            case '2':
                $doctor=DoctorModel::where(['user_id'=>$instituInfo['user_id'],'category'=>2])->field('name,currency,now_money')->find();
                $instituInfo->i_name=$doctor['name'];
                $instituInfo->currency=$doctor['currency'];
                $instituInfo->now_money=$doctor['now_money'];
                break;
            case '3':
                $institu=InstituModel::where(['user_id'=>$instituInfo['user_id'],'category'=>3])->field('name,currency,now_money')->find();
                $instituInfo->i_name=$institu['name'];
                $instituInfo->currency=$institu['currency'];
                $instituInfo->now_money=$institu['now_money'];
                break;
        }
        self::setLoginInfo($instituInfo);
        event('onInstituLoginAfter',[$instituInfo]);
        return true;
    }

    /**
     *  保存当前登陆用户信息
     */
    public static function setLoginInfo($instituInfo)
    {
        Session::set('instituId',$instituInfo['user_id']);
        Session::set('instituInfo',$instituInfo->toArray());
        Session::save();
    }

    /**
     * 清空当前登陆用户信息
     */
    public static function clearLoginInfo()
    {
        Session::delete('instituInfo');
        Session::delete('instituId');
        Session::save();
    }

    /**
     * 检查用户登陆状态
     * @return bool
     */
    public static function hasActiveInstitu()
    {
        return Session::has('instituId') && Session::has('instituInfo');
    }

    /**
     * 获得登陆用户信息
     * @return mixed
     * @throws \Exception
     */
    public static function activeInstituInfoOrFail()
    {
        $instituInfo = Session::get('instituInfo');
        if(!$instituInfo)  exception('请登陆');
        if($instituInfo['is_del']) exception('该账号已被关闭!');
        if(!$instituInfo['status']) exception('该账号已被关闭!');
        $instituInfo=self::getInstituInfo($instituInfo);
        return $instituInfo;
    }

    /**
     * 获得登陆用户Id 如果没有直接抛出错误
     * @return mixed
     * @throws \Exception
     */
    public static function activeInstituIdOrFail()
    {
        $instituId = Session::get('instituId');
        if(!$instituId) exception('访问用户为登陆登陆!');
        return $instituId;
    }

    /**
     * @return array|null
     * @throws \Exception
     */
    public static function activeInstituAuthOrFail()
    {
        $instituInfo = self::activeInstituInfoOrFail();
        if(is_object($instituInfo)) $instituInfo = $instituInfo->toArray();
        return $instituInfo['type'] === 0 ? [] : SystemRole::rolesByAuth((int)$instituInfo['type']);
    }

    /**
     * 获得有效登录信息
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getValidInstituInfoOrFail($user_id)
    {
        $instituInfo = self::get(['user_id'=>$user_id]);
        if(!$instituInfo) exception('用户不能存在!');
        if($instituInfo['is_del']) exception('该账号已被关闭!');
        if(!$instituInfo['status']) exception('该账号已被关闭!');
        $instituInfo=self::getInstituInfo($instituInfo);
        return $instituInfo;
    }

    /**
     * @param string $field
     * @param int $level
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getOrdInstitu($field = 'real_name,id',$level = 0){
        return self::where('level','>=',$level)->field($field)->select();
    }

    public static function getTopInstitu($field = 'real_name,id')
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
        return self::page($model,function($institu){
            $institu->roles = SystemRole::where('id','IN',$institu->roles)->column('role_name','id');
        },$where);
    }
    /**
     * 获取用户的平台信息
     * @param  [type] $info [登录信息]
     * @return [type]       [description]
     */
    public static function getInstituInfo($info){
        if($info['type'] == 3){
            $institu=InstituModel::where(['user_id'=>$info['user_id'],'category'=>3])->find();
        }
        if($info['type'] ==2){
            $institu=DoctorModel::where(['user_id'=>$info['user_id'],'category'=>2])->find();
        }
        $institu=count($institu)? $institu->toArray():[];
        $info['i_name']=$institu ? $institu['name']:'';
        $info['currency']=$institu ?$institu['currency']:'';
        $info['now_money']=$institu ?$institu['now_money']:'';
        $info['i_id']=$institu ?$institu['id']:'';
        $info['institu_commission']=$institu ?$institu['institu_commission']:'';
        $info['institu_discount']=$institu ?$institu['institu_discount']:'';
        $info['doctor_commission']=$institu ?$institu['doctor_commission']:'';
        $info['doctor_discount']=$institu ?$institu['doctor_discount']:'';
        // $info['referral_code']=$institu['referral_code'];
        // $info['institu_appid']=$institu['institu_appid'];
        // $info['institu_app_secret']=$institu['institu_app_secret'];
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
            // $va['plat_name']=InstituModel::where(['user_id'=>$va['institu_leader'],'category'=>4])->value('p_name');
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
        $model=$model->where(['type'=>0,'is_del'=>0,'status'=>1])->field('user_id as uid,nickname,mobile,createtime,institu_name,doctor_name,institu_name,total_ts,total_order,total_price');//,FROM_UNIXTIME(createtime,"%Y-%c-%d") as add_time
        if(!empty($where)){
            if(isset($where['institu_id']) && $where['institu_id'] !=''){
                $model=$model->where('institu_leader',$where['institu_id']);
            }
            if(isset($where['institu']) && $where['institu']!=''){
                $model = $model->where('institu_name','LIKE',"%{$where['institu']}%");
            }
            // if(isset($where['institu_id']) && $where['institu_id'] !=''){
            //     $model=$model->where('institu_leader',$where['institu_id']);
            // }
            // if(isset($where['institu']) && $where['institu']!=''){
            //     $model = $model->where('institu_name','LIKE',"%{$where['institu']}%");
            // }
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