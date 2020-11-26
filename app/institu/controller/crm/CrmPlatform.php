<?php
namespace app\platform\controller\crm;
use app\platform\controller\AuthController;
use yesai\basic\BaseModel;
use yesai\services\JsonService;
use think\facade\Db;
use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use app\platform\model\crm\CrmPlatform as PlatformModel;
use app\platform\model\crm\CrmPlatformBill as PlatformBillModel;
use think\facade\Route as Url;
use app\platform\model\system\SystemAttachment;
use app\validate\CrmPlatform as PlatformValidate;
use yesai\repositories\PlatformRepository;
use yesai\services\FormBuilder as Form;
use app\platform\model\label\Label as CategoryModel;
use app\platform\model\crm\CrmPlatformMicrochip;
use app\platform\model\crm\CrmPlatformTs;
use app\platform\model\system\SystemConfig as ConfigModel;
use app\platform\model\crm\CrmUsers;
use think\exception\ValidateException;
/**
 * 平台管理
 * Class
 * @package app\platform\controller\crm
 */
class CrmPlatform extends AuthController
{

    use CurdControllerTrait;

    protected $bindModel = PlatformModel::class;
    protected static $de_field=[];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $type = $this->request->param('type');
        if($type == null) $type = 1;
        return $this->fetch();
    }
    /**
     * 异步查找产品
     *
     * @return json
     */
    public function platform_ist(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['p_name',''],
            ['time',''],
            ['excel',0],
            ['order',''],
            ['currency',''],
            ['min_price',''],
            ['max_price',''],
        ]);
        return JsonService::successlayui(PlatformModel::PlatformList($where));
    }
    public function create(){
        return $this->fetch();
    }
    /**
     * 快速编辑
     *
     * @return json
     */
    public function set_product($field='',$id='',$value=''){
        $field=='' || $id=='' || $value=='' && JsonService::fail('缺少参数');
        if(PlatformModel::where(['id'=>$id])->update([$field=>$value]))
            return JsonService::successful('保存成功');
        else
            return JsonService::fail('保存失败');
    }

    /**
     * 选择可用微片.
     *
     * @return \think\Response
     */
    public function wpindex(int $id)
    {
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id,'min_price'=>'']);
        if(!$platform) return $this->failed('数据不存在!');
        $cate1=CategoryModel::getCateList(1);
        $cate2=CategoryModel::getCateList(2);
        $cate3=CategoryModel::getCateList(3);
        $this->assign(compact('cate1','cate2','cate3','platform'));
        return $this->fetch();//public/form-builder
    }
    public function platform_microList(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id,'min_price'=>'']);
        if(!$platform) return $this->failed('数据不存在!');
        $data=Util::postMore([
            ['page',0],
            ['limit',10],
            ['order',''],
            ['keyword',''],
            ['cate1',''],
            ['cate2',''],
            ['cate3',''],
            ['id',$id],
            ['excel',0],
        ]);
        return JsonService::successlayui(CrmPlatformMicrochip::getSelectMicrochip($data));
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
            'p_name',
            'account',
            'password',
            'referrer',
            'refer_mobile',
            ['refer_email',''],
            ['ecp',''],
            ['ecm',''],
            ['ece',''],
            ['currency',''],
            ['place',''],
            ['business_license',''],
            ['ca',''],
        ],$this->request->param);
        try{
            validate(PlatformValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        BaseModel::beginTrans();
        if($data['password'] == '123456') return $this->failed('密码过于简单，请重新输入');
        $data['adminid'] =$this->adminId;
        try {
             $default=CrmUsers::addUsers(['account'=>$data['account'],'password'=>$data['password'],'type'=>4,'adminid'=>$data['adminid'],'last_ip'=>app('request')->ip(),'last_login'=>time()]);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return Json::fail($e->getMessage());
        }
        unset($data['account'],$data['password']);
        if(!$default) return $this->failed(CrmUsers::getErrorInfo());
        $data['user_id']= $default;
        $data['ca']=json_encode($data['ca']);
        $config = ConfigModel::getMore(['microchip_discount','single_dose','barrel_price','out_pack']);
        $data['default_discount']=$config['microchip_discount'];
        $data['single_dose']=$config['single_dose'];
        $data['barrel_price']=$config['barrel_price'];
        $data['out_pack']=$config['out_pack'];
        $res = PlatformModel::addPlatform($data);
        BaseModel::checkTrans($res);
        if($res) return $this->successful('添加平台成功');
        return $this->failed(PlatformModel::getErrorInfo('注册失败'));
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
        $platform = PlatformModel::getPlatformInfo(['id'=>$id,'min_price'=>'']);
        if(!$platform) return $this->failed('数据不存在!');
        $config = ConfigModel::getMore(['microchip_discount','single_dose','barrel_price','out_pack']);
        $platform['default_discount'] >0 ? '':$platform['default_discount']=$config['microchip_discount'];
        $platform['single_dose']    >0   ? '':$platform['single_dose']=$config['single_dose'];
        $platform['barrel_price']    >0  ? '':$platform['barrel_price']=$config['barrel_price'];
        $platform['out_pack']      >0    ? '':$platform['out_pack']=$config['out_pack'];
        $filename=$file=[];
        $file =unserialize($platform['ca']);
        if($file){
            foreach ($file as $f) {
                if(!file_exists(app()->getRootPath().'public'.DS.$f)) continue;
                $filename[]=['path'=>$f,'filename'=>pathinfo($f,PATHINFO_BASENAME)];
            }unset($f);
        }
        $this->assign(compact('platform','config','filename'));
        return $this->fetch();
    }


    /**
     * 保存更新的资源
     *
     * @param $id
     */
    public function update($pid)
    {
        $data = Util::postMore([
            'p_name',
            'repassword',
            'referrer',
            'refer_mobile',
            ['refer_email',''],
            ['ecp',''],
            ['ecm',''],
            ['ece',''],
            ['business_license',''],
            ['ca',[]],
            ['default_discount',0],
            ['single_dose',0],
            ['barrel_price',0],
            ['out_pack',0],
        ]);

        try{
            validate(PlatformValidate::class)->scene('basic')->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        if (!$pid) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$pid,'min_price'=>'']);
        if (!$platform) return Json::fail('数据不存在!');
        if($data['repassword'] == '123456') return $this->failed('密码过于简单，请重新输入');
        if($data['repassword']){
            $res=CrmUsers::reset($platform['account'],$data['repassword']);
            if(!$res) return $this->failed(CrmUsers::getErrorInfo('修改失败'));
        }
        $data['adminid'] =$this->adminId;
        $data['ca']=serialize($data['ca']);
        $res=PlatformModel::edit($data,$pid);
        if($res) return $this->successful('平台修改成功');
        return $this->failed(PlatformModel::getErrorInfo('修改失败'));
    }
    /**
     * 充值
     * @return [type] [description]
     */
    public function update_recharge($pid){
        $data = Util::postMore([
            ['money',0],
            ['payment',''],
            ['code',''],
            ['mark',''],
        ],$this->request);
        if (!$pid) return $this->failed('数据不存在');
        $platform = PlatformModel::get($pid);
        if (!$platform) return Json::fail('数据不存在!');
        BaseModel::beginTrans();
        $res1 = false;
        $edit = array();
        $money=$data['money'];
        $money_status = is_numeric($money) ? $money >=0 ? 1: 2: 0;
        if ($money_status && $data['money']) {//余额增加或者减少
            if ($money_status == 1) {//增加

                $edit['now_money'] = bcadd($platform['now_money'], $data['money'], 2);
                $res1 = PlatformBillModel::income('系统增加余额', $platform['id'], 'now_money', 'system_add', $data['money'], $this->adminId, $edit['now_money'], $data['mark'],$data['payment'],$data['code'],$this->adminInfo['real_name']);
                try {
                    PlatformRepository::adminAddMoney($platform, $data['money']);
                } catch (\Exception $e) {
                    BaseModel::rollbackTrans();
                    return Json::fail($e->getMessage());
                }
            } else if ($money_status == 2) {//减少

                $edit['now_money'] = bcsub($platform['now_money'], abs($data['money']), 2);
                $res1 = PlatformBillModel::expend('系统减少余额', $platform['id'], 'now_money', 'system_sub',abs($data['money']), $this->adminId, $edit['now_money'], $data['mark'],$data['payment'],$data['code'],$this->adminInfo['real_name']);
                try {
                    PlatformRepository::adminSubMoney($platform, $data['money']);
                } catch (\Exception $e) {
                    BaseModel::rollbackTrans();
                    return Json::fail($e->getMessage());
                }
            }
        } else {
            $res1 = true;
        }
        if ($edit) $res3 = PlatformModel::edit($edit, $pid);
        else $res3 = true;
        if ($res1 && $res3) $res = true;
        else $res = false;
        BaseModel::checkTrans($res);
        if ($res) return $this->successful('修改成功!');
        else return $this->failed('修改失败');
    }
    /**
     * 充值
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function recharge($id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::get($id);
        if(!$platform) return Json::fail('数据不存在!');
        $f = array();
        $f[] = Form::input('currency','结算货币',$platform->getData('currency'))->disabled(1);
        $f[] = Form::number('money','充值金额','0')->col(8);
        $f[] = Form::input('payment','收款方式');
        $f[] = Form::input('code','流水单号');
        $f[] = Form::textarea('mark','备注');
        $form = Form::make_post_form('充值',$f,Url::buildUrl('update_recharge',array('pid'=>$id)));
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');

    }
    /**
     * 充值记录
     * @return [type] [description]
     */
    public function rechargeList($id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::get($id);
        if(!$platform) return Json::fail('数据不存在!');
        $this->assign(compact('id'));
        return $this->fetch();
    }
    /**
     * 获取充值记录列表
     * @return [type] [description]
     */
    public function recharge_list(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['excel',0],
            ['time',''],
            ['id',0],
        ]);
        if(!$where['id']) return $this->failed('数据不存在');
        $platform = PlatformModel::get($where['id']);
        if(!$platform) return Json::fail('数据不存在!');
        return JsonService::successlayui(PlatformBillModel::rechargeList($where));
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
        //     return JsonService::fail('请选择需要提交的产品');
        // }
        if(empty($data['pid'])){
            return JsonService::fail('请选择需要提交的平台');
        }else{
            CrmPlatformMicrochip::where('platform_id',$data['pid'])->update(['status'=>0,'update_time'=>time()]);
            $res=CrmPlatformMicrochip::where('micro_id','in',$data['ids'])->where('platform_id',$data['pid'])->update(['status'=>1,'update_time'=>time()]);
            if($res)
                return JsonService::successful('选择成功');
            else
                return JsonService::fail('选择失败');
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
        $platform = PlatformModel::getPlatformInfo(['id'=>$id,'min_price'=>'']);
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
        $platform = PlatformModel::getPlatformInfo(['id'=>$id,'min_price'=>'']);
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
        return JsonService::successlayui(CrmPlatformTs::getSelectIngredient($data));
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
        //     return JsonService::fail('请选择需要提交的产品');
        // }
        $res=true;
        if(empty($data['pid'])){
            return JsonService::fail('请选择需要提交的平台');
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
                return JsonService::successful('操作成功');
            else
                return JsonService::fail('操作失败');
        }
    }
    /**
     * ajax 提交删除
     */
    public function delete(){
        $request = app('request');
        $post = $request->post();
        if(empty($post['imageid'] ))
        Json::fail('还没选择要删除的图片呢？');
        foreach ($post['imageid'] as $v){
            if(!$v) continue;
            self::deleteimganddata($v);
        }
        Json::successful('删除成功');
    }
}