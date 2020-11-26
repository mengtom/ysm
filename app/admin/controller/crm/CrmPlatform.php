<?php
namespace app\admin\controller\crm;
use app\admin\controller\AuthController;
use yesai\basic\BaseModel;
use yesai\services\JsonService;
use think\facade\Db;
use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use app\admin\model\crm\CrmPlatform as PlatformModel;
use app\admin\model\crm\CrmPlatformBill as PlatformBillModel;
use think\facade\Route as Url;
use app\admin\model\microchip\MicrochipProduct;
use app\validate\CrmPlatform as PlatformValidate;
use yesai\repositories\PlatformRepository;
use yesai\services\FormBuilder as Form;
use app\admin\model\label\Label as CategoryModel;
use app\admin\model\crm\CrmPlatformMicrochip as MicrochipModel;
use app\admin\model\crm\CrmPlatformTs;
use app\admin\model\system\SystemConfig as ConfigModel;
use app\admin\model\system\SystemPlatformConfig as PlatformConfigModel;
use app\admin\model\crm\CrmUsers;
use think\exception\ValidateException;
use app\admin\model\crm\CrmInstitution as InstituModel;
/**
 * 平台管理
 * Class
 * @package app\admin\controller\crm
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
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $cate1=CategoryModel::getCateList(1,1);
        $cate2=CategoryModel::getCateList(2,1);
        $cate3=CategoryModel::getCateList(3,1);
        $platform['currency']=$platform['currency'] == '人民币' ? 1:2;
        $this->assign(compact('cate1','cate2','cate3','platform'));
        return $this->fetch();//public/form-builder
    }
    public function platform_microList(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
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
            ['currency',$platform['currency']],
            ['excel',0],
        ]);
        return JsonService::successlayui(MicrochipModel::getPlatformMicrochip($data));
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
            ['ca',[]],
        ],$this->request->param);
        try{
            validate(PlatformValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError(),$_SERVER['HTTP_REFERER']);
        }
        $p_name=PlatformModel::be(['p_name'=>$data['p_name']]);
        if($p_name) return $this->failed('平台已存在');
        $account=CrmUsers::be(['account'=>$data['account']]);
        if($account) return $this->failed('机构已存在');
        if($data['account'] == 'admin' || preg_match('/admin/i',$data['account'])) return $this->failed('账号格式错误，请重新输入');
        if($data['password'] == '123456' || $data['password'] == '') return $this->failed('密码过于简单，请重新输入');
        BaseModel::beginTrans();
        $data['adminid'] =$this->adminId;
        try {
            $default=CrmUsers::addUsers(['account'=>$data['account'],'password'=>$data['password'],'type'=>4,'adminid'=>$data['adminid'],'last_ip'=>app('request')->ip(),'last_login'=>time()]);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return Json::fail($e->getMessage());
        }
        unset($data['account'],$data['password']);
        if(!$default){
            BaseModel::rollbackTrans();
            return $this->failed(CrmUsers::getErrorInfo());
        }
        $data['user_id']= $default;
        $config = ConfigModel::getMore(['microchip_discount','single_dose_ymb','barrel_price_ymb','out_pack_ymb']);
        $data['default_discount']=$config['microchip_discount'];
        $data['single_dose']=$config['single_dose_ymb'];
        $data['barrel_price']=$config['barrel_price_ymb'];
        $data['out_pack']=$config['out_pack_ymb'];
        $res = PlatformModel::addPlatform($data);
        $list = ConfigModel::getTabAll('22,23,24,2,4')->toArray();
        foreach($list as $li){
            $li['platform_id']=$res;
            if($li['menu_name'] == 'api')
                $li['value'] = json_encode(json_decode($li['value'])."?id=".$default);
            if($li['menu_name'] == 'wechat_token')
                $li['value']=json_encode(random(32));
            if($li['menu_name'] == 'wechat_encodingaeskey')
                $li['value']=json_encode(random(43));
            PlatformConfigModel::insert($li);
        }unset($li);
        BaseModel::checkTrans($res);
        if($res) return $this->successful('添加平台成功');
        BaseModel::rollbackTrans();
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
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $config = ConfigModel::getMore(['microchip_discount','single_dose_ymb','barrel_price_ymb','out_pack_ymb']);
        $platform['default_discount'] >0 ? '':$platform['default_discount']=$config['microchip_discount'];
        $platform['single_dose']    >0   ? '':$platform['single_dose']=$config['single_dose_ymb'];
        $platform['barrel_price']    >0  ? '':$platform['barrel_price']=$config['barrel_price_ymb'];
        $platform['out_pack']      >0    ? '':$platform['out_pack']=$config['out_pack_ymb'];
        $filename=$file=[];
        $file =unserialize($platform['ca']);
        if($file){
            foreach ($file as $f) {
                if(!file_exists(app()->getRootPath().'public'.DS.$f)) continue;
                $filename[]=['path'=>$f,'filename'=>pathinfo($f,PATHINFO_BASENAME)];
            }unset($f);
        }
        $institu_c=                     Db::name('crm_users')->where(['type'=>3,'platform_leader'=>$id,'is_del'=>0])->count();
        $institu_doc_c=                 Db::name('crm_users')->where(['type'=>2,'platform_leader'=>$id,'is_del'=>0])->count();
        $doctor_c=                      Db::name('crm_users')->where(['type'=>1,'platform_leader'=>$id,'is_del'=>0])->count();
        $platform['institu_c']=$institu_c+$institu_doc_c;
        $platform['doctor'] = $doctor_c;
        $platform['doctor_c'] = $doctor_c+$institu_doc_c;
        $platform['patient_c']=         Db::name('crm_users')->where(['type'=>0,'platform_leader'=>$id,'is_del'=>0])->count();
        $platform['order_prescript_c']= Db::name('crm_order')->where(['platform_leader'=>$id,'order_type'=>1,'is_del'=>0,'is_system_del'=>0])->count();
        $platform['order_c']=           Db::name('crm_order')->where(['platform_leader'=>$id,'is_del'=>0,'is_system_del'=>0])->where('order_type','IN',[0,2])->count();
        $platform['order_price_c']=     Db::name('crm_order')->where(['platform_leader'=>$id,'is_del'=>0,'is_system_del'=>0])->where('order_type','IN',[0,2])->where('status','>=','1')->sum('pay_price');

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
        $platform = PlatformModel::getPlatformInfo(['id'=>$pid]);
        if (!$platform) return Json::fail('数据不存在!');
        if($data['p_name'] !=$platform['p_name']){
            $p_name=PlatformModel::be(['p_name'=>$data['p_name']]);
            if($p_name) return $this->failed('平台已存在');
        }
        if($data['repassword'] == '123456') return $this->failed('密码过于简单，请重新输入');
        if($data['repassword']){
            $res=CrmUsers::reset($platform['account'],$data['repassword']);
            if(!$res) return $this->failed(CrmUsers::getErrorInfo('修改失败'));
        }
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
        if ($res) return $this->successful('充值成功!');
        else return $this->failed('充值失败');
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
        if(empty(intval($data['pid']))) return JsonService::fail('请选择需要提交的平台');
        $platform = PlatformModel::get($data['pid']);
        if(!$platform) return Json::fail('数据不存在!');
        $currency=$platform['currency'] == '人民币' ? true:false;
        $insert=$res=[];
        $config = PlatformConfigModel::getMore(['microchip_discount'],$data['pid']);
        MicrochipModel::beginTrans();
        try {
            // MicrochipModel::where('platform_id',$data['pid'])->update(['status'=>0,'update_time'=>time()]);
            foreach($data['ids'] as $ids){
                if(!intval($ids['id'])) continue;
                $status=$ids['status']? 1 : 0;
                $microchip=MicrochipProduct::get($ids['id']);
                $cost_price = $currency? $microchip['cost_rmb']:$microchip['cost_usd'];
                $platform_price = sprintf("%.2f",$cost_price/(1-$config['microchip_discount']/100));
                $micro=MicrochipModel::where(['micro_id'=>$ids['id'],'platform_id'=>$data['pid']])->find();
                if($micro){
                    $res=MicrochipModel::where(['micro_id'=>$ids['id'],'platform_id'=>$data['pid']])->update(['update_time'=>time(),'status'=>$status,'platform_price'=>$micro['platform_price'] >0 ? $micro['platform_price']: $platform_price]);
                }else{
                    $insert[]=['platform_id'=>$data['pid'],'micro_id'=>$ids['id'],'admin_id'=>$this->adminId,'add_time'=>time(),'update_time'=>time(),'status'=>$status,'platform_price'=>$platform_price];
                }
            }unset($ids);
            $defult=MicrochipModel::insertAll($insert);
            if ($defult || $res) {
                MicrochipModel::commitTrans();
                return JsonService::successful('微片选择成功');
            } else {
                MicrochipModel::rollbackTrans();
                return JsonService::fail('微片选择失败');
            }
        } catch (\Exception $e) {
            MicrochipModel::rollbackTrans();
            return JsonService::fail('微片选择失败'.$e->getMessage());
        }
        // $res=MicrochipModel::where('micro_id','in',$data['ids'])->where('platform_id',$data['pid'])->update(['status'=>1,'update_time'=>time()]);
        if($res)
            return JsonService::successful('选择成功');
        else
            return JsonService::fail('选择失败');

    }
    /**
     * 配方
     *
     * @return \think\Response
     */
    public function pfindex(int $id)
    {
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $cate2=CategoryModel::getCateList(2,1);
        $cate3=CategoryModel::getCateList(3,1);
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
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
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
        $ts=new \app\admin\model\ts\Ts;
        $data=Util::getMore([
            ['ids',[]],
            ['pid',0],
        ]);
        $res=true;
        if(empty($data['pid'])){
            return JsonService::fail('请选择需要提交的平台');
        }else{
            $platform = PlatformModel::getPlatformInfo(['id'=>$data['pid']]);
            if(!$platform) return JsonService::fail('数据不存在!');
            foreach ($data['ids'] as $key => $v) {
                if(!intval($v['id'])) continue;
                $info=$ts::get($v['id']);
                if(!$info) continue;
                if($platform['currency'] == '人民币'){
                    $single_price=$info['price'];
                    $price=$info['total_price'];
                }else{
                    $single_price=$info['usd'];
                    $price=$info['total_usd'];
                }
                $status = $v['status']? 1:0;
                $plat=CrmPlatformTs::where(['ts_id'=>$v['id'],'platform_id'=>$data['pid']])->value('platform_id');
                if($plat){
                    $res=CrmPlatformTs::where('ts_id',$v['id'])->where('platform_id',$data['pid'])->update(['status'=>$status,'update_time'=>time(),'single_price'=>$single_price,'price'=>$price]);
                }else{
                    $res=CrmPlatformTs::insert(['status'=>$status,'update_time'=>time(),'platform_id'=>$data['pid'],'ts_id'=>$v['id'],'add_time'=>time(),'admin_id'=>$this->adminId,'single_price'=>$single_price,'price'=>$price]);
                }
                $micro_id=Db::name('ts_microchip')->where(['ts_id'=>$v['id']])->column('micro_id','micro_id');
                foreach($micro_id as $m){
                    if(MicrochipModel::where(["micro_id"=>$m,'platform_id'=>$data['pid']])->find()){
                        MicrochipModel::where(["micro_id"=>$m,'platform_id'=>$data['pid']])->update(['status'=>1,'update_time'=>time()]);
                    }else{
                        MicrochipModel::insert(['status'=>1,'update_time'=>time(),'platform_id'=>$data['pid'],'micro_id'=>$m,'status'=>1,'add_time'=>time()]);
                    }
                }unset($m);
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
    /**
     * 修改平台结算价
     */
    public function edit_platform_price(){
        $data = Util::postMore([
            ['id',0],
            ['pid',0],
            ['value',0],
        ]);
        if(empty($data['pid'])) return JsonService::fail('请选择需要提交的平台');
        $platform = PlatformModel::getPlatformInfo(['id'=>$data['pid']]);
        if(!$platform) return Json::fail('数据不存在!');
        if(!$data['id']) return Json::fail('参数错误');
        $microchip=MicrochipProduct::get($data['id']);
        if(!$microchip) return Json::fail('数据不存在!');
        $res = MicrochipModel::where(['platform_id'=>$platform['id'],'micro_id'=>$microchip['id']])->save(['platform_price'=>$data['value'],'update_time'=>time()]);
        if($res) return Json::successful('修改成功');
        else return Json::fail('修改失败');
    }
    /**
     * 查看下属机构
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function institution(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $this->assign(compact('id','platform'));
        return $this->fetch();
    }
    public function institution_list(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['time',''],
            ['excel',0],
            ['platform',0],
            ['category',3],
            // ['order',''],
            // ['currency',''],
            // ['min_price',''],
            // ['max_price',''],
        ]);
        return JsonService::successlayui(InstituModel::InstituList($where));
    }
    /**
     * 查看下属医生
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function doctor(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $institu=InstituModel::InstituList([['platform',$id],
            ['category',3]]);
        $institu=$institu['data'];
        $this->assign(compact('id','platform','institu'));
        return $this->fetch();
    }
    public function doctor_list(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['time',''],
            ['excel',0],
            ['platform',0],
            ['type',1],
            ['institu',0],
        ]);
        return JsonService::successlayui(\app\admin\model\crm\CrmDoctor::DoctorList($where));
    }
    /**
     * 查看下属患者
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function patient(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $this->assign(compact('id','platform'));
        return $this->fetch();
    }
    public function patient_list(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['time',''],
            ['excel',0],
            ['platform',0],
            ['institu',''],
        ]);
        return JsonService::successlayui(CrmUsers::getPatientList($where));
    }
    /**
     * 查看平台订单
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function order(int $id){
        if(!$id) return $this->failed('数据不存在');
        $platform = PlatformModel::getPlatformInfo(['id'=>$id]);
        if(!$platform) return $this->failed('数据不存在!');
        $order=new \app\admin\model\crm\CrmOrder;
        $this->assign([
            'year'=>getMonth(),
            'real_name'=>$this->request->get('real_name',''),
            'status'=>$this->request->param('status',''),
            'orderCount'=>$order::userOrderCount(1,3,$id),
            // 'payTypeCount'=>\app\admin\model\crm\CrmOrder::payTypeCount(),
        ]);
        $this->assign(compact('id','platform'));
        return $this->fetch();
    }
    public function order_list(){
         $where = Util::getMore([
            ['status',''],
            ['nickname',$this->request->param('nickname','')],
            ['is_del',0],
            ['ordersn',''],
            ['platform',0],
            ['institu',''],
            ['pay_type',''],
            ['page',1],
            ['time',''],
            ['limit',20],
            ['excel',0],
        ]);
        $where['platform_id']= $this->request->param('id',0);
        return JsonService::successlayui(\app\admin\model\crm\CrmOrder::OrderList($where));
    }
    public function order_details(int $id){
        if(!$id) return $this->failed('数据不存在');
        $p_id=$this->request->param('p_id',0);
        $platform = PlatformModel::getPlatformInfo(['id'=>$p_id]);
        if(!$platform) return $this->failed('数据不存在!');
        $CrmOrder=new \app\admin\model\crm\CrmOrder;
        $order = $CrmOrder::getOrderDetails($id);
        $this->assign(compact('id','p_id','order'));
        return $this->fetch();
    }
}