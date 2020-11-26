<?php
namespace app\admin\controller\microchip;
use app\admin\controller\AuthController;
use yesai\services\FormBuilder as Form;
use app\admin\model\microchip\MicrochipProductIngredient as ingreModel;
use think\facade\Db;
use yesai\basic\BaseModel;
// use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use app\admin\model\label\Label as CategoryModel;
use app\admin\model\microchip\MicrochipProduct as ProductModel;
use think\facade\Route as Url;
use app\admin\model\system\SystemAttachment;
use app\validate\MicrochipProduct as ProductValidate;
use app\admin\model\microchip\MicrochipIngredient as IngredientModel;
use yesai\services\UploadService as Upload;
use think\exception\ValidateException;

/**
 * 产品管理
 * Class MicrochipProduct
 * @package app\admin\controller\microchip
 */
class MicrochipProduct extends AuthController
{

    // use CurdControllerTrait;

    protected $bindModel = ProductModel::class;

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $type = $this->request->param('type');
        $cate1=CategoryModel::getCateList(1);
        $cate2=CategoryModel::getCateList(2,true);
        $cate3=CategoryModel::getCateList(3,true);
        $this->assign(compact('cate1','cate2','cate3'));
        //获取分类

        //出售中产品
        // $onsale =  ProductModel::where('is_del',0)->where('is_show',1)->count();
        // //待上架产品
        // $forsale =  ProductModel::where('is_del',0)->where('is_show',0)->count();
        // //仓库中产品
        // $warehouse =  ProductModel::where('is_del',0)->count();
        // //已经售馨产品
        // $outofstock = ProductModel::getModelObject()->where(ProductModel::setData(4))->count();
        // //警戒库存
        // $microchip_stock = sysConfig('microchip_stock');
        // if($microchip_stock < 0) $microchip_stock = 2;
        // $policeforce =ProductModel::getModelObject()->where(ProductModel::setData(5))->where('p.stock','<=',$microchip_stock)->count();
        //回收站
        $recycle =  ProductModel::where('is_del',1)->count();
        if($type == null) $type = 1;
        $this->assign(compact('type','onsale','forsale','warehouse','outofstock','policeforce','recycle'));
        return $this->fetch();
    }
    /**
     * 异步查找产品
     *
     * @return json
     */
    public function product_ist(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['cate1',''],
            ['cate2',''],
            ['cate3',''],
            ['excel',0],
            ['order',''],
            ['is_show',''],
            // ['type',$this->request->param('type')]
        ],$this->request);
        return json::successlayui(ProductModel::ProductList($where));
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $cate1=CategoryModel::getCateList(1);
        $cate2=CategoryModel::getCateList(2,1);
        $cate3=CategoryModel::getCateList(3,1);
        $huo_micro=IngredientModel::ProductList(['cate_id'=>0,'page'=>0,'limit'=>0,'keyword'=>'']);
        $huo_micro=$huo_micro['data'];
        $fu_micro=IngredientModel::ProductList(['cate_id'=>1,'page'=>0,'limit'=>0,'keyword'=>'']);
        $fu_micro=$fu_micro['data'];
        $img_url=Url::buildUrl('admin/widget.images/index',array('fodder'=>'image'));
        $config=\app\admin\model\system\SystemConfig::getMore(['microchip_processing_rmb','microchip_processing_usd','tariff']);
        $this->assign(compact('cate1','cate2','cate3','img_url','huo_micro','fu_micro','config'));
        return $this->fetch();
    }
    /**
     * 上传图片
     * @return \think\response\Json
     */
    public function upload()
    {
        $res = Upload::instance()->setUploadPath('microchip/microchip/'.date('Ymd'))->image('file');
        SystemAttachment::attachmentAdd($res['name'],$res['size'],$res['type'],$res['dir'],$res['thumb_path'],1,$res['image_type'],$res['time']);
        if(is_array($res))
            return Json::successful('图片上传成功!',['name'=>$res['name'],'url'=>Upload::pathToUrl($res['thumb_path'])]);
        else
            return Json::fail($res);
    }
    /**
     * 保存新建的资源
     *
     *
     */
    public function save()
    {
        $data = Util::postMore([
            ['cate_id',''],
            'code',
            'zn_name',
            ['en_name',''],
            'scientific_zn_name',
            ['scientific_en_name',''],
            ['microchip_info_zn',''],
            ['microchip_info_en',''],
            ['effects_zn',''],
            ['effects_en',''],
            ['price',0],
            ['usd',''],
            ['image',''],
            ['unit',''],
            ['day_max',0],
            ['dose_min',''],
            ['dose_max',''],
            ['dose',0],
            ['cate2',''],
            ['cate3',''],
            ['facts_name',''],
            ['facts_daily',''],
            ['amount',''],
            ['facts_unit',''],
            ['references',''],
            ['files',[]],
            ['weight',0],
            ['cost_usd',0],
            ['cost_rmb',0],
            ['pricing_usd',0],
            ['pricing_rmb',0],
            ['facts_sort',0],
        ],$this->request);
         try{
            validate(ProductValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        $ingre1=$this->request->param('ingre1',[]);
        $ingre2=$this->request->param('ingre2',[]);
        $ingre=$ingre1+$ingre2;

        $cost_price_rmb=IngredientModel::getTotalCost($ingre); //查询获取成分成本价
        $cost_price_usd=IngredientModel::getTotalCost($ingre,true); //查询获取成分成本价
        $data['cate_id'] = $data['cate_id'];//implode(',',$data['cate_id']);
        $data['code'] = $data['code'];
        $data['cate2'] = implode(',',$data['cate2']);
        $cate1_name=CategoryModel::where("id",'IN',$data['cate_id'])->column('title','id');
        $cate2_name=CategoryModel::where("id",'IN',$data['cate2'])->column('title','id');
        $data['cate1_name']=array_values($cate1_name);
        $data['cate2_name']=implode(',',array_values($cate2_name));
        $data['cate3'] = implode(',',$data['cate3']);
        $cate3_name=CategoryModel::where("id",'IN',$data['cate3'])->column('title','id');
        $data['cate3_name']=implode(',',array_values($cate3_name));
        $data['zn_name'] = $data['zn_name'];
        $data['en_name'] = $data['en_name'];
        $data['image'] = $data['image'];
        $data['scientific_zn_name'] = $data['scientific_zn_name'];
        $data['scientific_en_name'] = $data['scientific_en_name'];
        $data['microchip_info_zn'] = $data['microchip_info_zn'];
        $data['microchip_info_en'] = $data['microchip_info_en'];
        $data['effects_zn'] = $data['effects_zn'];
        $data['effects_en'] = $data['effects_en'];
        $data['price'] = $data['price'];
        $data['usd'] = $data['usd'];
        // $data['cost_rmb']=$cost_price_rmb; // 成本价
        // $data['cost_usd']=$cost_price_usd;
        $data['unit'] = $data['unit'];
        $data['day_max'] = $data['day_max'];
        $data['dose_min'] = $data['dose_min'];
        $data['dose_max'] = $data['dose_max'];
        $data['dose'] = $data['dose'];
        $data['cate2'] = $data['cate2'];
        $data['cate3'] = $data['cate3'];
        $data['facts_name'] = $data['facts_name'];
        $data['facts_daily'] = $data['facts_daily'];
        $data['amount'] = $data['amount'];
        $data['facts_unit'] = $data['facts_unit'];
        $data['facts_sort'] = $data['facts_sort'];
        $data['references'] = $data['references'];
        // $data['image'] = $data['image'][0];
        $data['files'] = json_encode($data['files']);
        $data['add_time'] = time();
        $data['weight'] = is_numeric($data['weight'])? $data['weight']:0.00;
        // 获取微片交易设置
        $config=\app\admin\model\system\SystemConfig::getMore(['microchip_processing_rmb','microchip_processing_usd','tariff']);
        if(ProductModel::checkIngredientExist('code',$data['code'])) return $this->failed('微片编码不唯一,请重新输入',$_SERVER['HTTP_REFERER']);
        BaseModel::beginTrans();
        try {
            $res=ProductModel::create($data);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return $this->failed($e->getMessage());
        }

        try {
            $default=ingreModel::createIngredient($ingre1,$res->id,1);
            $default=ingreModel::createIngredient($ingre2,$res->id,2);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return $this->failed($e->getMessage());
        }
        BaseModel::checkTrans($res);
        if($default)
            return $this->successful('添加微片成功!');
        else
            return $this->failed(ingreModel::getErrorInfo());

        return $this->successful('添加微片成功!');
    }
    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        if(!$id) return $this->failed('数据不存在');
        $info = ProductModel::get($id);
        if(!$info) return $this->failed('数据不存在!');
        $ingre0=ingreModel::getIngredient($id,0);
        $ingre1=ingreModel::getIngredient($id,1);
        $info['ingredient']=['0'=>$ingre0,'1'=>$ingre1];
        $filename=$files=[];
        $info['files'] ? $files=json_decode($info['files']):'';
        foreach ($files as $k=>$f) {
            $filename[]=['path'=>$f,'filename'=>pathinfo($f,PATHINFO_BASENAME)];
        }unset($f);
        $cate1=CategoryModel::getCateList(1);
        $cate2=CategoryModel::getCateList(2,1);
        $cate3=CategoryModel::getCateList(3,1);
        $huo_micro=IngredientModel::ProductList(['cate_id'=>0,'page'=>0,'limit'=>0,'keyword'=>'']);
        $huo_micro=$huo_micro['data'];
        $fu_micro=IngredientModel::ProductList(['cate_id'=>1,'page'=>0,'limit'=>0,'keyword'=>'']);
        $fu_micro=$fu_micro['data'];
        $config=\app\admin\model\system\SystemConfig::getMore(['microchip_processing_rmb','microchip_processing_usd','tariff']);
        $this->assign(compact('cate1','cate2','cate3','info','id','huo_micro','fu_micro','filename','config'));
        return $this->fetch();
    }
    /**
     * 保存更新的资源
     *
     * @param $id
     */
    public function update($id)
    {
        $info = ProductModel::get($id);
        if(!$info) return $this->fail('数据不存在!');
        $data = Util::postMore([
            ['cate_id',''],
            'code',
            'zn_name',
            ['en_name',''],
            'scientific_zn_name',
            ['scientific_en_name',''],
            ['microchip_info_zn',''],
            ['microchip_info_en',''],
            ['effects_zn',''],
            ['effects_en',''],
            ['price',0],
            ['usd',0],
            ['image',''],
            ['unit',''],
            ['day_max',0],
            ['dose_min',0],
            ['dose_max',0],
            ['dose',0],
            ['cate2',''],
            ['cate3',],
            ['facts_name',''],
            ['facts_daily',''],
            ['amount',''],
            ['facts_unit',''],
            ['references',''],
            ['files',[]],
            ['weight',0],
            ['pricing_usd',0],
            ['pricing_rmb',0],
            ['cost_usd',0],
            ['cost_rmb',0],
            ['facts_sort',0],
            ['coginput',0],
            ['pricinginput',0],
        ],$this->request);
         try{
            validate(ProductValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        $ingre1=$this->request->param('ingre1',[]);
        $ingre2=$this->request->param('ingre2',[]);
        $ingre=$ingre1+$ingre2;
        $cost_price_rmb=IngredientModel::getTotalCost($ingre); //查询获取成分成本价
        $cost_price_usd=IngredientModel::getTotalCost($ingre,true); //查询获取成分成本价
        $data['cate_id'] = $data['cate_id'];//implode(',',$data['cate_id']);
        $data['code'] = $data['code'];
        $data['cate2'] = implode(',',$data['cate2']);
        $cate2_name=CategoryModel::where("id",'IN',$data['cate2'])->column('title','id');
        $cate1_name=CategoryModel::getFieldById($data['cate_id'],'title');
        $data['cate1_name']=$cate1_name;
        $data['cate2_name']=implode(',',array_values($cate2_name));
        $data['cate3'] = implode(',',$data['cate3']);
        $cate3_name=CategoryModel::where("id",'IN',$data['cate3'])->column('title','id');
        $data['cate3_name']=implode(',',array_values($cate3_name));
        $data['zn_name'] = $data['zn_name'];
        $data['en_name'] = $data['en_name'];
        $data['image'] = $data['image'];
        $data['scientific_zn_name'] = $data['scientific_zn_name'];
        $data['scientific_en_name'] = $data['scientific_en_name'];
        $data['microchip_info_zn'] = $data['microchip_info_zn'];
        $data['microchip_info_en'] = $data['microchip_info_en'];
        $data['effects_zn'] = $data['effects_zn'];
        $data['effects_en'] = $data['effects_en'];
        $data['price'] = $data['price'];
        $data['usd'] = $data['usd'];
        // $data['cost_rmb']=$cost_price_rmb;
        // $data['cost_usd']=$cost_price_usd;
        $data['unit'] = $data['unit'];
        $data['day_max'] = $data['day_max'];
        $data['dose_min'] = $data['dose_min'];
        $data['dose_max'] = $data['dose_max'];
        $data['dose'] = $data['dose'];
        $data['cate2'] = $data['cate2'];
        $data['cate3'] = $data['cate3'];
        $data['facts_name'] = $data['facts_name'];
        $data['facts_daily'] = $data['facts_daily'];
        $data['amount'] = $data['amount'];
        $data['facts_unit'] = $data['facts_unit'];
        $data['references'] = $data['references'];
        // $data['image'] = $data['image'][0];
        $data['files'] = json_encode($data['files']);
        $data['add_time'] = time();
        $data['weight'] = is_numeric($data['weight'])? $data['weight']:0.00;
        $data['coginput'] = $data['coginput'] > 0 ? 1:0;
        $data['pricinginput'] = $data['coginput']>0 ? 1:0;
        // 获取微片交易设置
        $config=\app\admin\model\system\SystemConfig::getMore(['microchip_processing_rmb','microchip_processing_usd','tariff']);
        $check=ProductModel::checkIngredientExist('code',$data['code']);
        if($check['id'] != $info->id && $check) return $this->failed('微片编码不唯一,请重新输入',$_SERVER['HTTP_REFERER']);
        BaseModel::beginTrans();
        try {
            $res=ProductModel::edit($data,$id);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return $this->failed($e->getMessage());
        }
        try {
            $default=ingreModel::createIngredient($ingre1,$id,1);
            $default=ingreModel::createIngredient($ingre2,$id,2);
        } catch (\Exception $e) {
            BaseModel::rollbackTrans();
            return $this->failed($e->getMessage());
        }
        BaseModel::checkTrans($res);
        if($default)
            return $this->successful('修改成功!');
        else
            return $this->failed(ingreModel::getErrorInfo());
    }
    /**
     * 修改产品价格
     */
    public function edit_product_price(){
        $data = Util::postMore([
            ['id',0],
            ['price',0],
        ]);
        if(!$data['id']) return Json::fail('参数错误');
        $res = ProductModel::edit(['price'=>$data['price']],$data['id']);
        if($res) return Json::successful('修改成功');
        else return Json::fail('修改失败');
    }

    /**
     * 修改产品库存
     *
     */
    public function edit_product_stock(){
        $data = Util::postMore([
            ['id',0],
            ['stock',0],
        ]);
        if(!$data['id']) return Json::fail('参数错误');
        $res = ProductModel::edit(['stock'=>$data['stock']],$data['id']);
        if($res) return Json::successful('修改成功');
        else return Json::fail('修改失败');
    }
     /**
    * 文件上传
    * */
    public function file_upload(){
       $res = Upload::instance()->setImageValidateArray(['filesize'=>104857600])->setUploadPath('microchip/file')->setAutoValidate(true)->file($this->request->param('file','file'));
       if(is_object($res) && !$res->status) return Json::fail($res->error);
       return Json::successful('上传成功!',$res->filePath);
    }
    /**
     * 微片定价
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function pricing(int $id){
        if(!$id) return $this->failed('数据不存在!');
        $info = ProductModel::get($id);
        if(!$info) return $this->failed('数据不存在!');
        $platformModel=new \app\admin\model\crm\CrmPlatform;
        $platform=$platformModel::alias('p')->join('CrmPlatformMicrochip m','p.id = m.platform_id and m.micro_id='.$id,'left')->field('p.*,m.micro_id,m.sell_price')->select()->toArray();
        //$microchip=Db::name('crm_platform_microchip')->where('micro_id',$id)->withoutField('admin_id,status,platform_price')->select()->toArray();
        $this->assign(compact('info','platform'));
        return $this->fetch();
    }
    public function select_platform_microchip(int $id){
        if(!$id) return $this->failed('数据不存在!');
        $info = ProductModel::get($id);
        if(!$info) return $this->failed('数据不存在!');
        $platformModel=new \app\admin\model\crm\CrmPlatform;
        $data= Util::postMore(['pid',['price',''],['usd','']],$this->request);
        $insert=$up=array();
        if($data['price'] !=$info['price']) $up['price']=$data['price'];
        if($data['usd'] !=$info['usd']) $up['usd']=$data['usd'];
        ProductModel::where('id',$id)->update($up);
        $platformModel::commitTrans();
        try {
            Db::name('crm_platform_microchip')->where(['micro_id'=>$id])->update(['status'=>-1,'update_time'=>time()]);
            foreach($data['pid'] as $k =>$v){
                if(!is_numeric($v) || !$platform=$platformModel::get($k)) continue;
                if($plat_micro=Db::name('crm_platform_microchip')->where(['micro_id'=>$id,'platform_id'=>$k])->find()){
                    $res=Db::name('crm_platform_microchip')->where(['micro_id'=>$id])->update(['sell_price'=>$v,'update_time'=>time(),'admin_id'=>$this->adminId,'status'=>0]);
                }else{
                    $insert[]=['platform_id'=>$platform['id'],'micro_id'=>$id,'admin_id'=>$this->adminId,'sell_price'=>$v,'add_time'=>time(),'update_time'=>time()];
                }
            }unset($v);
            $defult=Db::name('crm_platform_microchip')->insertAll($insert);
            if ($defult || $res) {
                $platformModel::commitTrans();
                return $this->successful('微片定价成功');
            } else {
                $platformModel::rollbackTrans();
                return $this->successful('微片定价失败');
            }
        } catch (\Exception $e) {
            $platformModel::rollbackTrans();
            return $this->failed('微片定价失败'.$e->getMessage());
        }
    }
     /**
     * 设置单个产品上架|下架
     *
     * @return json
     */
    public function set_show($is_show='',$id=''){
        ($is_show=='' || $id=='') && json::fail('缺少参数');
        $res=ProductModel::where(['id'=>$id])->update(['is_show'=>(int)$is_show]);
        if($res){
            return json::successful($is_show==1 ? '修改成功':'修改成功');
        }else{
            return json::fail($is_show==1 ? '修改失败':'修改失败');
        }
    }
}
