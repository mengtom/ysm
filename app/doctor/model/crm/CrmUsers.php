<?php
/**
 * @author: tom
 * @day: 2020/07/29
 */
namespace app\doctor\model\crm;
use yesai\basic\BaseModel;
use yesai\traits\ModelTrait;
use think\facade\Session;
use app\doctor\model\label\Label as CategoryModel;
use app\doctor\model\ts\Ts as TsModel;
use app\doctor\model\crm\CrmDoctor as DoctorModel;
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
        $model=$model->alias('pi')->join("CrmPlatformTs i",'i.ts_id=pi.id and i.doctor_id= '.$where['id'],'left')->field('pi.*,i.doctor_id,i.status');
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
        $data['password']=MD5($data['password']);
        $data['createtime'] = time();
        $data['add_ip']=app('request')->ip();
        $data['last_login'] = time();
        $data['last_ip'] = app('request')->ip();
        $data['doctor_leader'] >0? $data['doctor_time']=time():'';
        $res = self::field('account,password,createtime,add_ip,last_login,last_ip,type,doctor_leader,doctor_name,doctor_time,group,group_discount,group_commission,group_name')->insertGetId($data);
        return $res;
    }
    /**
     * 患者列表
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public static function getPatientList($where){
        $model=self::getModelDoctor($where);
        if(isset($where['excel']) &&$where['excel']==0) $model=$model->page((int)$where['page'],(int)$where['limit']);
        $data=($data=$model->select()) && count($data) ? $data->toArray():[];
        foreach ($data as $k => &$va) {
            $va['plat_name']=DoctorModel::where(['user_id'=>$va['doctor_leader'],'category'=>4])->value('p_name');
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
        $count=self::getModelDoctor($where)->count();
        return compact('count','data');
    }
     /**
     * 获取连表MOdel
     * @param $model
     * @return object
     */
    public static function getModelDoctor($where=[]){
        $model=new self();
        $model=$model->alias('u')->join("CrmDoctor i",'u.user_id=u.institu_leader and i.category=3 and i.status =1 ','left')->field('u.*,i.p_name as institu_name');
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
     ######   医生登录操作开始
    /**
     * 用户登陆
     * @param $account
     * @param $pwd
     * @return bool
     */
    public static function login($account,$pwd)
    {
        $doctorInfo = self::get(['account'=>$account,'type'=>1]);
        if($doctorInfo['is_del'] == 1) return self::setErrorInfo('登陆的账号不存在!');
        if(!$doctorInfo) return self::setErrorInfo('登陆的账号不存在!');
        if($doctorInfo['password'] != $pwd) return self::setErrorInfo('账号或密码错误，请重新输入');
        if($doctorInfo['status'] !=1) return self::setErrorInfo('该账号已被关闭!');

        $doctor=DoctorModel::where(['user_id'=>$doctorInfo['user_id'],'category'=>1])->field('id,name,currency,now_money')->find();
        $doctorInfo->d_id=$doctor['id'];
        $doctorInfo->p_name=$doctor['name'];
        $doctorInfo->currency=$doctor['currency'];
        $doctorInfo->now_money=$doctor['now_money'];
        self::setLoginInfo($doctorInfo);
        event('onDoctorLoginAfter',[$doctorInfo]);
        return true;
    }

    /**
     *  保存当前登陆用户信息
     */
    public static function setLoginInfo($doctorInfo)
    {
        Session::set('doctorId',$doctorInfo['user_id']);
        Session::set('doctorInfo',$doctorInfo->toArray());
        Session::save();
    }

    /**
     * 清空当前登陆用户信息
     */
    public static function clearLoginInfo()
    {
        Session::delete('doctorInfo');
        Session::delete('doctorId');
        Session::save();
    }

    /**
     * 检查用户登陆状态
     * @return bool
     */
    public static function hasActiveDoctor()
    {
        return Session::has('doctorId') && Session::has('doctorInfo');
    }

    /**
     * 获得登陆用户信息
     * @return mixed
     * @throws \Exception
     */
    public static function activeDoctorInfoOrFail()
    {
        $doctorInfo = Session::get('doctorInfo');
        if(!$doctorInfo)  exception('请登陆');
        if($doctorInfo['is_del']) exception('该账号已被关闭!');
        if(!$doctorInfo['status']) exception('该账号已被关闭!');
        $doctorInfo=self::getDoctorInfo($doctorInfo);
        return $doctorInfo;
    }

    /**
     * 获得登陆用户Id 如果没有直接抛出错误
     * @return mixed
     * @throws \Exception
     */
    public static function activeDoctorIdOrFail()
    {
        $doctorId = Session::get('doctorId');
        if(!$doctorId) exception('访问用户为登陆登陆!');
        return $doctorId;
    }

    /**
     * @return array|null
     * @throws \Exception
     */
    public static function activeDoctorAuthOrFail()
    {
        $doctorInfo = self::activeDoctorInfoOrFail();
        if(is_object($doctorInfo)) $doctorInfo = $doctorInfo->toArray();
        return $doctorInfo['type'] === 0 ? SystemRole::getAllAuth() : SystemRole::rolesByAuth((int)$doctorInfo['type']);
    }

    /**
     * 获得有效登录信息
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getValidDoctorInfoOrFail($user_id)
    {
        $doctorInfo = self::get(['user_id'=>$user_id]);
        if(!$doctorInfo) exception('用户不能存在!');
        if($doctorInfo['is_del']) exception('该账号已被关闭!');
        if(!$doctorInfo['status']) exception('该账号已被关闭!');
        $doctorInfo=self::getDoctorInfo($doctorInfo);
        return $doctorInfo;
    }

    /**
     * @param string $field
     * @param int $level
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getOrdDoctor($field = 'real_name,id',$level = 0){
        return self::where('level','>=',$level)->field($field)->select();
    }

    public static function getTopDoctor($field = 'real_name,id')
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
        return self::page($model,function($doctor){
            $doctor->roles = SystemRole::where('id','IN',$doctor->roles)->column('role_name','id');
        },$where);
    }
    /**
     * 获取用户的医生信息
     * @param  [type] $info [登录信息]
     * @return [type]       [description]
     */
    public static function getDoctorInfo($info){
        $doctor=DoctorModel::where(['user_id'=>$info['user_id'],'category'=>1])->find()->toArray();
        $info['name']=$doctor['name'];
        $info['currency']=$doctor['currency'];
        $info['now_money']=$doctor['now_money'];
        $info['d_id']=$doctor['id'];
        $info['platform_leader']=$doctor['platform_leader'];
        $info['institu_leader']=$doctor['institu_leader'];
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
            // $va['plat_name']=DoctorModel::where(['user_id'=>$va['doctor_leader'],'category'=>4])->value('p_name');
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
        $model=$model->where(['type'=>0,'is_del'=>0,'status'=>1])->field('user_id as uid,nickname,mobile,createtime,institu_name,doctor_name,doctor_name,total_ts,total_order,total_price');//,FROM_UNIXTIME(createtime,"%Y-%c-%d") as add_time
        if(!empty($where)){
            if(isset($where['doctor_id']) && $where['doctor_id'] !=''){
                $model=$model->where('doctor_leader',$where['doctor_id']);
            }
            if(isset($where['doctor']) && $where['doctor']!=''){
                $model = $model->where('doctor_name','LIKE',"%{$where['doctor']}%");
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
    /**
     * TODO 查询当前用户信息
     * @param $uid $uid 用户编号
     * @param string $field $field 查询的字段
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getUserInfo($uid, $field = '')
    {
        if (strlen(trim($field))) $userInfo = self::where('user_id', $uid)->field($field)->find();
        else  $userInfo = self::where('user_id', $uid)->find();
        if (!$userInfo) return [];
        return $userInfo->toArray();
    }
}