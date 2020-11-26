<?php

namespace app\platform\controller\crm;

use app\platform\controller\AuthController;
use yesai\services\UtilService;
use yesai\basic\BaseModel;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use app\platform\model\crm\CrmInstitution as InstituModel;
use app\platform\model\crm\CrmPlatform as PlatformModel;
use app\platform\model\crm\CrmUsersGroup as GroupModel;
use yesai\services\FormBuilder as Form;
use think\facade\Route as Url;
use app\validate\CrmInstitution as InstitutionValidate;
use app\platform\model\crm\CrmUsers;
use app\platform\model\crm\CrmDoctor;
/**
 * 机构管理 控制器
 * Class StoreProductReply
 * @package app\platform\controller\store
 */
class Institution extends AuthController
{

    // use CurdControllerTrait;

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $group=GroupModel::where(['platform_id'=>$this->platformPId,'is_del'=>0,'type'=>3])->withoutField('is_del,platform_id')->select()->toArray();
        $this->assign(compact('group'));
        return $this->fetch();
    }

    public function institu_list()
    {
        $where=UtilService::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['time',''],
            ['excel',0],
            ['group',''],
        ]);
        return Json::successful(InstituModel::InstituList($where));
    }

    public function create(){
        $group=GroupModel::where(['platform_id'=>$this->platformPId,'is_del'=>0])->withoutField('is_del,platform_id')->select()->toArray();
        $this->assign(compact('group'));
        return $this->fetch();
    }

    /**
     * 上传图片
     * @return \think\response\Json
     */
    public function upload()
    {
       $res = Upload::instance()->setImageValidateArray(['filesize'=>104857600,'fileExt'=>'jpg,png,jpeg,JPG,PNG,JPEG,pdf,PDF,pdf','fileMime'=>['image/jpeg', 'image/gif', 'image/png','application/pdf']])->setUploadPath('crm/platform')->setAutoValidate(true)->file($this->request->param('file','file'));
       if(is_object($res) && !$res->status) return Json::fail($res->error);
       return Json::successful('上传成功!',['path'=>$res->filePath,'filename'=>pathinfo($res->filePath,PATHINFO_BASENAME)]);
    }
     /**
    * 文件上传
    * */
    public function file_upload(){
       $res = Upload::instance()->setImageValidateArray(['filesize'=>104857600,'fileExt'=>'jpg,png,jpeg,JPG,PNG,JPEG,pdf,PDF,pdf','fileMime'=>['image/jpeg', 'image/gif', 'image/png','application/pdf']])->setUploadPath('crm/platform')->setAutoValidate(true)->file($this->request->param('file','file'));
       if(is_object($res) && !$res->status) return Json::fail($res->error);
       return Json::successful('上传成功!',$res->filePath);
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
            'referrer',
            'refer_mobile',
            ['refer_email',''],
            ['ecp',''],
            ['ecm',''],
            ['ece',''],
            ['group',0],
            ['business_license',''],
            ['ca',[]],
        ],$this->request->param);
        try{
            validate(InstitutionValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError(),$_SERVER['HTTP_REFERER']);
        }
        $name=InstituModel::be(['name'=>$data['name']]);
        if($name) return $this->failed('机构已存在');
        $account=CrmUsers::be(['account'=>$data['account']]);
        if($account) return $this->failed('机构已存在');
        if($data['account'] == 'admin' || preg_match('/admin/i',$data['account'])) return $this->failed('账号格式错误，请重新输入');
        if($data['password'] == '123456' || $data['password'] == '') return $this->failed('密码过于简单，请重新输入');
        $group=GroupModel::get($data['group']);
        BaseModel::beginTrans();
        $data['platform_leader'] =$this->platformPId;
        try {
            $default=CrmUsers::addUsers(['account'=>$data['account'],'password'=>$data['password'],'type'=>3,'platform_leader'=>$data['platform_leader'],'platform_name'=>$this->platformInfo['p_name'],'last_ip'=>app('request')->ip(),'last_login'=>time(),'group'=>$data['group'],'group_discount'=>$group['discount'],'group_commission'=>$group['commission'],'group_name'=>$group['name']]);
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
        // $data['ca']=serialize($data['ca']);
        $res = InstituModel::addInstitution($data);
        BaseModel::checkTrans($res);
        if($res) return $this->successful('添加机构成功');
        BaseModel::rollbackTrans();
        return $this->failed(InstituModel::getErrorInfo('添加机构失败'));
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
        $institu = InstituModel::getInstituInfo(['id'=>$id]);
        if(!$institu) return $this->failed('数据不存在!');
        // $config = ConfigModel::getMore(['microchip_discount','single_dose','barrel_price','out_pack']);
        // $platform['default_discount'] >0 ? '':$platform['default_discount']=$config['microchip_discount'];
        // $platform['single_dose']    >0   ? '':$platform['single_dose']=$config['single_dose'];
        // $platform['barrel_price']    >0  ? '':$platform['barrel_price']=$config['barrel_price'];
        // $platform['out_pack']      >0    ? '':$platform['out_pack']=$config['out_pack'];
        $filename=$file=[];
        $file =unserialize($institu['ca']);
        if($file){
            foreach ($file as $f) {
                if(!file_exists(app()->getRootPath().'public'.DS.$f)) continue;
                $filename[]=['path'=>$f,'filename'=>pathinfo($f,PATHINFO_BASENAME)];
            }unset($f);
        }
        $group=GroupModel::groupList(['platform_id'=>$this->platformPId]);
        $group=$group['data'];
        $this->assign(compact('institu','filename','group'));
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
            ['ecp',''],
            ['ecm',''],
            ['ece',''],
            ['business_license',''],
            ['ca',[]],
            ['group',0]
        ]);

        try{
            validate(InstitutionValidate::class)->scene('basic')->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        if (!$id) return $this->failed('数据不存在');
        $institu = InstituModel::getInstituInfo(['id'=>$id]);
        if (!$institu) return Json::fail('数据不存在!');
        if($data['name'] !=$institu['name']){
            $name=InstituModel::be(['name'=>$data['name']]);
            if($name) return $this->failed('机构已存在');
        }
        if($data['repassword'] == '123456') return $this->failed('密码过于简单，请重新输入');
        $group=GroupModel::get($data['group']);
        if($data['repassword']){
            $res=CrmUsers::reset($institu['account'],$data['repassword']);
            if(!$res) return $this->failed(CrmUsers::getErrorInfo('修改失败'));
        }
        if($data['group'] <= 0){
             $res=CrmUsers::edit(['group'=>0,'group_name'=>'','group_commission'=>$institu['institu_commission'],'group_discount'=>$institu['institu_discount']],$institu['uid']);
             if(!$res) return $this->failed(CrmUsers::getErrorInfo('修改失败'));
        }else{
             $res=CrmUsers::edit(['group'=>$group['id'],'group_name'=>$group['name'],'group_commission'=>$group['commission'],'group_discount'=>$group['discount']],$institu['uid']);
             if(!$res) return $this->failed(CrmUsers::getErrorInfo('修改失败'));
        }
        $data['ca']=serialize($data['ca']);
        $data['updatetime']=time();
        $res=InstituModel::edit($data,$id);
        if($res) return $this->successful('机构修改成功');
        return $this->failed(InstituModel::getErrorInfo('修改失败'));
    }
    /**
     * 选择微片
     * @return [type] [description]
     */
    public function select_show(){
        $data=Util::getMore([
            ['ids',[]],
            ['pid',0],
        ]);
        // if(empty($data['ids'])){
        //     return Json::fail('请选择需要提交的');
        // }
        if(empty($data['pid'])){
            return Json::fail('请选择需要提交的机构');
        }else{
            CrmPlatformMicrochip::where('platform_id',$data['pid'])->update(['status'=>0,'update_time'=>time()]);
            $res=CrmPlatformMicrochip::where('micro_id','in',$data['ids'])->where('platform_id',$data['pid'])->update(['status'=>1,'update_time'=>time()]);
            if($res)
                return Json::successful('选择成功');
            else
                return Json::fail('选择失败');
        }
    }
    /**
     * 配方
     *
     * @return \think\Response
     */
    public function pfindex(int $id)
    {
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformInstituModelModel::getInstituInfo(['id'=>$id,'min_price'=>'']);
        if(!$platform) return $this->failed('数据不存在!');
        $cate2=CategoryModel::getCateList(2);
        $cate3=CategoryModel::getCateList(3);
        $this->assign(compact('cate2','cate3','platform'));
        return $this->fetch();//public/form-builder
    }
    /**
     * 配方列表
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function platform_ingredient(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = InstituModel::getInstituInfo(['id'=>$id,'min_price'=>'']);
        if(!$platform) return $this->failed('数据不存在!');
        $data=Util::postMore([
            ['page',0],
            ['limit',10],
            ['order',''],
            ['keyword',''],
            ['cate2',''],
            ['cate3',''],
            ['id',$id],
            ['excel',0],
            ['status','']
        ]);
        return Json::successlayui(CrmPlatformTs::getSelectIngredient($data));
    }
     /**
     * 选择配方
     * @return [type] [description]
     */
    public function select_ts(){
        $data=Util::getMore([
            ['ids',[]],
            ['pid',0],
        ]);
        // if(empty($data['ids'])){
        //     return Json::fail('请选择需要提交的');
        // }
        $res=true;
        if(empty($data['pid'])){
            return Json::fail('请选择需要提交的机构');
        }else{
            CrmPlatformTs::where('platform_id',$data['pid'])->update(['status'=>0,'update_time'=>time()]);
            foreach ($data['ids'] as $key => $v) {
                $plat=CrmPlatformTs::where(['ts_id'=>$v,'platform_id'=>$data['pid']])->value('platform_id');
                if($plat){
                    $res=CrmPlatformTs::where('ts_id','in',$data['ids'])->where('platform_id',$data['pid'])->update(['status'=>1,'update_time'=>time()]);
                }else{
                    $res=CrmPlatformTs::insert(['status'=>1,'update_time'=>time(),'platform_id'=>$data['pid'],'ts_id'=>$v,'add_time'=>time(),'admin_id'=>$this->adminId]);
                }
            }unset($v);
            if($res)
                return Json::successful('操作成功');
            else
                return Json::fail('操作失败');
        }
    }
    /**
     * 机构设置
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
            $res=PlatformModel::edit(['institu_commission'=>$data['commission'],'institu_discount'=>$data['discount']],$pid);
            if($res) return $this->successful('机构设置成功');
            return $this->failed(PlatformModel::getErrorInfo('设置失败'));
        }
        $scale=['commission'=>$this->platformInfo['inistitu_commission'],'discount'=>$this->platformInfo['inistitu_discount']];
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
            ['type',3],
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
        $data['add_time']=time();
        $data['type'] =3;
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
        if (!$id) return $this->failed('数据不存在');
        $group = GroupModel::get($id);
        if (!$group) return Json::fail('数据不存在!');
        $res=GroupModel::edit($data,$id);
        if($res) return $this->successful('分组编辑成功');
        return $this->failed(GroupModel::getErrorInfo('分组编辑失败'));
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
     * 机构下属医生
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function doctor($id){
        if (!$id) return $this->failed('数据不存在');
        $institu = InstituModel::getInstituInfo(['id'=>$id]);
        if (!$institu) return $this->failed('数据不存在!');
        $name=$institu['name'];
        $this->assign('name',$name);
        $this->assign('id',$id);
        return $this->fetch();
    }
    /**
     * 机构下属医生列表
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get_doctor_list($id){
        if (!$id) return $this->failed('数据不存在');
        $institu = InstituModel::getInstituInfo(['id'=>$id]);
        if (!$institu) return $this->failed('数据不存在!');
        $data=Util::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['time',''],
            ['institu',$id],
        ]);
        return Json::successlayui(CrmDoctor::DoctorList($data));
    }
    /**
     * 机构下属患者
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function paitent($id){
        if (!$id) return $this->failed('数据不存在');
        $institu = InstituModel::getInstituInfo(['id'=>$id]);
        if (!$institu) return $this->failed('数据不存在!');
        $name=$institu['name'];
        $this->assign('name',$name);
        $this->assign('id',$id);
        return $this->fetch();
    }
    /**
     * 机构下属患者列表
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get_paitent_list($id){
        if (!$id) return Json::fail('数据不存在');
        $institu = InstituModel::getInstituInfo(['id'=>$id]);
        if (!$institu) return Json::fail('数据不存在!');
        $data=Util::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['time',''],
            ['institu',$id],
            ['doctor',''],
        ]);
        return Json::successlayui(CrmUsers::paitentList($data,'type,is_del,status,password,adminid'));
    }
}
