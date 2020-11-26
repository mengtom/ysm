<?php
namespace app\platform\controller\crm;
use app\platform\controller\AuthController;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use app\platform\model\crm\CrmPlatform as PlatformModel;
use app\platform\model\crm\CrmUsersGroup as GroupModel;
use app\platform\model\crm\CrmDoctor as DoctorModel;
use yesai\services\FormBuilder as Form;
use think\facade\Route as Url;
use app\validate\CrmDoctor as DoctorValidate;
use yesai\basic\BaseModel;
use app\platform\model\crm\CrmUsers;

/**
 * 独立医生管理 控制器
 * Class
 * @package app\platform\controller\crm
 */
class CrmDoctor extends AuthController
{
    // use CurdControllerTrait;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $group=GroupModel::groupList(['platform_id'=>$this->platformPId,'type'=>2]);
        $this->assign('group',$group['data']);
        return $this->fetch();
    }
    /**
     * 医生列表
     * @return [type] [description]
     */
    public function get_doctor_list()
    {
        $where=Util::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['group',''],
            ['time',''],
            ['platform',$this->platformPId],
        ]);
        return Json::successlayui(DoctorModel::DoctorList($where));
    }
      public function create(){
        $group=GroupModel::groupList(['platform_id'=>$this->platformPId,'type'=>2]);
        $this->assign('group',$group['data']);
        return $this->fetch();
    }
    /**
     * 保存新建的资源
     *
     *
     */
    public function save()
    {
        $data = Util::postMore([
            'name',
            'account',
            'password',
            'refer_mobile',
            ['refer_email',''],
            ['group',0],
        ],$this->request->param);
        // try{
        $DoctorValidate=new \app\validate\CrmDoctor;
        $docVa=$DoctorValidate->scene('basic')->check($data);
        if(!$docVa){
            $this->failed($DoctorValidate->getError(),$_SERVER['HTTP_REFERER']);
        }
        $name=DoctorModel::be(['name'=>$data['name']]);
        if($name) return $this->failed('机构已存在');
        $account=CrmUsers::be(['account'=>$data['account']]);
        if($account) return $this->failed('机构已存在');
        if($data['account'] == 'admin' || preg_match('/admin/i',$data['account'])) return $this->failed('账号格式错误，请重新输入');
        if($data['password'] == '123456' || $data['password'] == '') return $this->failed('密码过于简单，请重新输入');
        $group=GroupModel::get($data['group']);
        BaseModel::beginTrans();
        $data['platform_leader'] =$this->platformPId;
        try {
            $default=CrmUsers::addUsers(['account'=>$data['account'],'password'=>$data['password'],'type'=>2,'platform_leader'=>$data['platform_leader'],'platform_name'=>$this->platformInfo['p_name'],'last_ip'=>app('request')->ip(),'last_login'=>time(),'group'=>$data['group'],'group_discount'=>$group['discount'],'group_commission'=>$group['commission'],'group_name'=>$group['name']]);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return $this->failed($e->getMessage());
        }
        unset($data['account'],$data['password']);
        if(!$default){
            BaseModel::rollbackTrans();
            return $this->failed(CrmUsers::getErrorInfo());
        }
        $data['user_id']= $default;
        $data['currency']= $this->instituInfo['currency'] ?'美元':'人民币';
        // $data['ca']=serialize($data['ca']);
        $res = DoctorModel::addDoctor($data);
        BaseModel::checkTrans($res);
        if($res) return $this->successful('添加医生机构成功');
        BaseModel::rollbackTrans();
        return $this->failed(DoctorModel::getErrorInfo('添加医生机构失败'));
    }

    /**
     * 显示基本信息页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function basic($id)
    {
        if(!$id) return $this->failed('数据不存在');
        $doctor = DoctorModel::getDoctorInfo(['id'=>$id]);
        if(!$doctor) return $this->failed('数据不存在!');
        $group=GroupModel::groupList(['platform_id'=>$this->platformPId,'type'=>2]);
        $group=$group['data'];
        $this->assign(compact('doctor','group'));
        return $this->fetch();
    }
    /**
     * 保存更新的资源
     *
     * @param $id
     */
    public function update($id)
    {
        $data = Util::postMore([
            'name',
            'repassword',
            'referrer',
            'refer_mobile',
            ['refer_email',''],
            ['group',0]
        ]);
        $DoctorValidate=new \app\validate\CrmDoctor;
        $docVa=$DoctorValidate->scene('basic')->check($data);
        if(!$docVa){
            $this->failed($DoctorValidate->getError(),$_SERVER['HTTP_REFERER']);
        }
        if (!$id) return $this->failed('数据不存在');
        $doctor = DoctorModel::getDoctorInfo(['id'=>$id]);
        if (!$doctor) return Json::fail('数据不存在!');
        if($data['name'] !=$doctor['name']){
            $name=DoctorModel::be(['name'=>$data['name']]);
            if($name) return $this->failed('医生机构已存在');
        }
        if($data['repassword'] == '123456') return $this->failed('密码过于简单，请重新输入');
        $group=GroupModel::get($data['group']);
        if($data['repassword']){
            $res=CrmUsers::reset($doctor['account'],$data['repassword']);
            if(!$res) return $this->failed(CrmUsers::getErrorInfo('密码修改失败'));
        }
        if($data['group'] <=0){
            $res=CrmUsers::update(['group'=>0,'group_name'=>'','group_commission'=>$doctor['doctor_commission'],'group_discount'=>$doctor['doctor_discount']],['user_id'=>$doctor['uid']]);
             if(!$res) return $this->failed(CrmUsers::getErrorInfo('分组修改失败'));
        }else{
            $info=['group'=>$group['id'],'group_name'=>$group['name'],'group_commission'=>$group['commission'],'group_discount'=>$group['discount']];
            $res=CrmUsers::update($info,['user_id'=>$doctor['uid']]);
            if(!$res) return $this->failed(CrmUsers::getErrorInfo('分组修改失败'));
        }
        $data['updatetime']=time();
        $res=DoctorModel::edit($data,$id);
        if($res) return $this->successful('医生修改成功');
        return $this->failed(DoctorModel::getErrorInfo('修改失败'));
    }

     /**
     * 医生设置
     * @return [type] [description]
     */
    public function setting(){
        $request = app('request');
        if($request->isPost()){
            $data=Util::getMore([
                ['commission',0],
                ['discount',0],
            ]);
            if(!is_numeric($data['commission']) || !is_numeric($data['discount']) || $data['commission'] < 0 || $data['commission'] > 100 || $data['discount'] <0 || $data['discount'] > 10) $this->failed('编辑出错');
            $pid=$this->platformPId;
            $res=PlatformModel::edit(['doctor_commission'=>$data['commission'],'doctor_discount'=>$data['discount']],$pid);
            if($res) return $this->successful('设置成功');
            return $this->failed(PlatformModel::getErrorInfo('设置失败'));
        }
        $scale=['commission'=>$this->platformInfo['doctor_commission'],'discount'=>$this->platformInfo['doctor_discount']];
        $this->assign(compact('scale'));
        return $this->fetch();
    }
   /**
     * 获取分组列表
     * @return [type] [description]
     */
    public function groupList(){
        $data=Util::getMore([
            ['page',1],
            ['limit',10],
            ['order',''],
            ['type',2],
        ]);
        $data['platform_id']=$this->platformPId;
        return Json::successlayui(GroupModel::groupList($data));
    }
    /**
     * 新增分组
     * @return [type] [description]
     */
    public function save_group(){
        $data=Util::getMore([
            ['name',''],
            ['commission',0],
            ['discount',0],
        ]);
        if(!is_numeric($data['commission']) || !is_numeric($data['discount']) || $data['commission'] < 0 || $data['commission'] > 100 || $data['discount'] <0 || $data['discount'] > 10) $this->failed('编辑出错');
        if(empty($data['name'])) $this->failed('编辑出错');
        $data['type'] =2;
        $data['add_time']=time();
        $data['platform_id']=$this->platformPId;
        $res=GroupModel::create($data);
        if($res) return $this->successful('分组添加成功');
        return $this->failed(GroupModel::getErrorInfo('分组添加失败'));
    }
    /**
     * 编辑分组
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit_group($id){
        if(!$id) return $this->failed('数据不存在');
        $group = GroupModel::get($id);
        if(!$group) return Json::fail('数据不存在!');
        $f = array();
        $f[] = Form::input('name','分组名称',$group->getData('name'));
        $f[] = Form::number('commission','返佣比例',$group->getData('commission'))->min(0)->max(100)->precision(2);
        $f[] = Form::number('discount','拿货折扣',$group->getData('discount'))->min(0)->max(10)->precision(2);
        $form = Form::make_post_form('编辑分组',$f,Url::buildUrl('update_group',array('id'=>$id)));
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');
    }
    /**
     * 更新分组
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function update_group($id){
        $data=Util::getMore([
            ['name',''],
            ['commission',0],
            ['discount',0],
        ]);
        if (!$id) return Json::fail('数据不存在');
        $group = GroupModel::get($id);
        if (!$group) return Json::fail('数据不存在!');
        $res=GroupModel::edit($data,$id);
        if($res) return Json::successful('分组编辑成功');
        return Json::fail(GroupModel::getErrorInfo('分组编辑失败'));
    }
    /**
     * 删除分组
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete_group($id){
        if (!$id) return Json::fail('数据不存在');
        $group = GroupModel::get($id);
        if (!$group) return Json::fail('数据不存在!');
        $res=GroupModel::edit(['is_del'=>1],$id);
        if($res) return Json::successful('分组删除成功');
        return Json::fail(GroupModel::getErrorInfo('分组删除失败'));
    }
     /**
     * 医生下属患者
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function paitent($id){
        if (!$id) return $this->failed('数据不存在');
        $doctor = DoctorModel::getDoctorInfo(['id'=>$id]);
        if (!$doctor) return $this->failed('数据不存在!');
        $name=$doctor['name'];
        $this->assign('name',$name);
        $this->assign('id',$id);
        return $this->fetch();
    }
    /**
     * 医生下属患者列表
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get_paitent_list($id){
        if (!$id) return Json::fail('数据不存在');
        $doctor = DoctorModel::getDoctorInfo(['id'=>$id]);
        if (!$doctor) return Json::fail('数据不存在!');
        $data=Util::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['time',''],
            ['doctor_id',$doctor['id']],
            ['doctor',''],
        ]);
        return Json::successlayui(CrmUsers::paitentList($data,'type,is_del,status,password,adminid'));
    }
}
