<?php
namespace app\platform\controller\ts;
use app\platform\controller\AuthController;
use yesai\services\FormBuilder as Form;
use yesai\services\JsonService;
use think\facade\Db;
use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use app\platform\model\label\Label as CategoryModel;
use app\platform\model\ts\Ts as TsModel;
use app\platform\model\ts\TsMicrochip as MicrochipModel;
use think\facade\Route as Url;
use app\validate\Ts as TsValidate;
use app\platform\model\system\SystemAttachment;
use app\platform\model\microchip\MicrochipProduct as ProductModel;
use app\platform\model\ts\TsMicrochip as tsMicrochipModel;
use think\exception\ValidateException;
/**
 * 产品管理
 * Class StoreProduct
 * @package app\platform\controller\ts
 */
class Ts extends AuthController
{
    use CurdControllerTrait;
    protected $bindModel = TsModel::class;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $type = $this->request->param('type','');
        $cate2=CategoryModel::getChildList(2,1);
        $cate3=CategoryModel::getChildList(3,1);
        $this->assign(compact('cate2','cate3','type'));
        return $this->fetch();
    }
    /**
     * 异步查找产品
     *
     * @return json
     */
    public function ts_list(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['cate_id',''],
            ['excel',0],
            ['order',''],
            ['type',''],
            ['is_status',''],
            ['platform_id',$this->platformPId],
        ]);
        $where['currency']=$this->platformInfo['currency'];
        return JsonService::successlayui(TsModel::TsMicorchipList($where));
    }
    /**
     * 设置单个配方可用状态
     *
     * @return json
     */
    public function set_show($is_status='',$id=''){
        ($is_status=='' || $id=='') && JsonService::fail('缺少参数');
        $res=TsModel::where(['id'=>$id])->update(['is_status'=>(int)$is_status]);
        if($res){
            return JsonService::successful($is_status==1 ? '可用修改成功':'不可用修改成功');
        }else{
            return JsonService::fail($is_status==1 ? '可用修改失败':'不可用修改失败');
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

        $cate2=CategoryModel::getCateList(2,1);
        $this->assign(compact('cate2'));
        return $this->fetch();
    }

    /**
     * 上传图片
     * @return \think\response\Json
     */
    public function upload()
    {
        $res = Upload::instance()->setUploadPath('ts/product/'.date('Ymd'))->image('file');
        SystemAttachment::attachmentAdd($res['name'],$res['size'],$res['type'],$res['dir'],$res['thumb_path'],1,$res['image_type'],$res['time']);
        if(is_array($res))
            return Json::successful('图片上传成功!',['name'=>$res['name'],'url'=>Upload::pathToUrl($res['thumb_path'])]);
        else
            return Json::fail($res);
    }

    /**
     * 保存新建的资源
     */
    public function save()
    {
        $id=$this->request->param('id','');
        $new_add=true;
        if((int) $id){
            $info = TsModel::get($id);
            if(!$info || $info['platform_id'] !=$this->platformPId) return Json::fail('数据不存在!');
            $new_add=false;
            $this->assign(compact('info'));
        }
        $data = Util::postMore([
            'code',
            ['name_zn',''],
            ['name_en',''],
            ['cate_id',''],
            ['taking_quency',0],
            ['taking_time',''],
            ['taking_cycle',0],
            ['taking_suggest',''],
            ['description',''],
            ['reference',''],
            ['mid',[]],
            // ['m_num',[]],
        ],$this->request);
        try{
            validate(TsValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        if(TsModel::checkTsExist('code',$data['code'],$id)) return $this->failed('配方编码不唯一,请重新输入',$_SERVER['HTTP_REFERER']);
        $data['cate2_name']=CategoryModel::getInField(CategoryModel::where("id",'IN',$data['cate_id']),'title',true);
        $data['add_time'] = time();
        $data['reference']= htmlspecialchars($data['reference']);
        $data['platform_id']=$this->platformPId;
        $data['type'] = 4;
        $data['user_id']=$this->platformId;
        $taking_time=$data['taking_cycle']*$data['taking_quency'];
        $ts_microchip=[];
        $price=$usd=0;
        TsModel::beginTrans();
        if($new_add){
            $tid=TsModel::create($data);
            $tid=$tid->id;
        }else{
            $tid=TsModel::edit($data,$id);
        }
        TsModel::checkTrans($tid);
        try{
            $id= $id ? $id:$tid;
            tsMicrochipModel::beginTrans();
            $ts_micro=tsMicrochipModel::where('ts_id',$id)->delete();
            foreach($data['mid'] as $k => $v){
                if(!intval($id)) continue;
                $microchip = ProductModel::get($k);
                $platformMicrochip= Db::name('crm_platform_microchip')->where('micro_id',$k)->where('platform_id',$this->platformPId)->value('sell_price');
                if(!$microchip) continue;
                if(!is_numeric($v)) continue;
                $ts_microchip=array(
                    'ts_id'=>$id,
                    'micro_id'=>$k,
                    'num'=>$v,
                    'add_time'=>time(),
                    'name_zn'=>$microchip['zn_name'],
                    'dose_range'=>$microchip['dose_min'].'-'.$microchip['dose_max'],
                    'day_max'=>$microchip['dose_max'],
                    'dose'=>$microchip['dose'],
                    'price'=>$platformMicrochip ? $platformMicrochip:0.00,
                    'usd'=>$microchip['usd'],
                    'unit'=>$microchip['unit']);
                $price+=$ts_microchip['price']*$v;
                $usd+=$ts_microchip['price']*$v;
                if(is_array($ts_microchip) && count($ts_microchip) > 0){
                    $ts_micro=tsMicrochipModel::insert($ts_microchip);
                        // tsMicrochipModel::where(['ts_id'=>$id,'micro_id'=>$k])->save($ts_microchip);
                }
            }unset($v);
            tsMicrochipModel::checkTrans($ts_micro);
        }catch(\Exception $e){
            tsMicrochipModel::rollbackTrans();
            return $this->failed($e->getMessage());
        }
        $data['price']= sprintf('%.2f',$price);
        $data['usd']= sprintf('%.2f',$usd);
        $data['total_price']=sprintf('%.2f',$price*$taking_time);
        $data['total_usd']= sprintf('%.2f',$usd*$taking_time);
        TsModel::edit($data,$id);
        return $this->successful($new_add ? '添加成功':'编辑'.'配方成功!');
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
        $info = TsModel::get($id);
        if(!$info || $info['platform_id'] !=$this->platformPId) return $this->failed('数据不存在!');
        $cate2=CategoryModel::getCateList(2,1);
        $type=1;
        $microchip=tsMicrochipModel::getAll($id);
        $info['taking_suggest']=explode(',',$info['taking_suggest']);
        $this->assign(compact('cate2','info','type','microchip'));
        return $this->fetch();
    }


    /**
     * 保存更新的资源
     *
     * @param $id
     */
    // public function update($id)
    // {
    //     if(!$id) return $this->failed('数据不存在');
    //     $info = TsModel::get($id);
    //     if(!$info) return $this->failed('数据不存在!');
    //     $data = Util::postMore([
    //         ['cate_id',[]],
    //         'ts_name',
    //         'ts_info',
    //         'keyword',
    //         'bar_code',
    //         ['unit_name','件'],
    //         ['image',[]],
    //         ['slider_image',[]],
    //         ['postage',0],
    //         ['ot_price',0],
    //         ['price',0],
    //         ['sort',0],
    //         ['stock',0],
    //         ['ficti',100],
    //         ['give_integral',0],
    //         ['is_show',0],
    //         ['cost',0],
    //         ['is_hot',0],
    //         ['is_benefit',0],
    //         ['is_best',0],
    //         ['is_new',0],
    //         ['mer_use',0],
    //         ['is_postage',0],
    //         ['is_good',0],
    //     ]);
    //     $check=TsModel::checkTsExist('code',$data['code']);
    //     if($check && $info->id !=$check['id']) return $this->failed('配方编码不唯一,请重新输入',$_SERVER['HTTP_REFERER']);
    //     if(count($data['cate_id']) < 1) return Json::fail('请选择产品分类');
    //     $cate_id=$data['cate_id'];
    //     $data['cate_id'] = implode(',',$data['cate_id']);
    //     if(!$data['ts_name']) return Json::fail('请输入产品名称');
    //     if(count($data['image'])<1) return Json::fail('请上传产品图片');
    //     if(count($data['slider_image'])<1) return Json::fail('请上传产品轮播图');
    //    // if(count($data['slider_image'])>8) return Json::fail('轮播图最多5张图');
    //     if($data['price'] == '' || $data['price'] < 0) return Json::fail('请输入产品售价');
    //     if($data['ot_price'] == '' || $data['ot_price'] < 0) return Json::fail('请输入产品市场价');
    //     if($data['stock'] == '' || $data['stock'] < 0) return Json::fail('请输入库存');
    //     $data['image'] = $data['image'][0];
    //     $data['slider_image'] = json_encode($data['slider_image']);
    //     TsModel::edit($data,$id);
    //     Db::name('ts_product_cate')->where('product_id',$id)->delete();
    //     foreach ($cate_id as $cid){
    //         Db::name('ts_product_cate')->insert(['product_id'=>$id,'cate_id'=>$cid,'add_time'=>time()]);
    //     }
    //     return Json::successful('修改成功!');
    // }
    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        if(!$id) return Json::fail('数据不存在');
        if(!TsModel::be(['id'=>$id,'platform_id'=>$this->platformPId])) return Json::fail('配方不存在');
        if(TsModel::be(['id'=>$id,'is_del'=>1,'platform_id'=>$this->platformPId])){
            $data['is_del'] = 0;
            // if(!TsModel::where('id',$id)->edit($data))
            //     return Json::fail(TsModel::getErrorInfo('恢复失败,请稍候再试!'));
            // else
            //     return Json::successful('成功恢复配方!');
        }else{
            $data['is_del'] = 1;
            if(!TsModel::where('id',$id)->save($data))
                return Json::fail(TsModel::getErrorInfo('删除失败,请稍候再试!'));
            else
                return Json::successful('成功删除配方!');
        }
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
        $res = TsModel::edit(['price'=>$data['price']],$data['id']);
        if($res) return Json::successful('修改成功');
        else return Json::fail('修改失败');
    }


    public function microchip_selected(){
        $type=$this->request->param('type',1);

        $cate1=CategoryModel::getCateList(1);
        $cate2=CategoryModel::getCateList(2);
        $cate3=CategoryModel::getCateList(3);
        $this->assign(compact('info','cate1','cate2','cate3','type'));
        return $this->fetch();
    }
     /**
     * 异步查找产品
     *
     * @return json
     */
    public function ts_selected(){
        $where=Util::getMore([
            ['keyword',''],
            ['cate2',''],
            ['status',''],
            ['platform_id',$this->platformPId],
        ]);
        return JsonService::successlayui(TsModel::TsMicorchipList($where));
    }
    /**
     * 获取微片成分列表
     * @return [type] [description]
     */
    public function getIngredient(){
        $where=Util::getMore([
            ['data',''],
        ]);
        if(!is_array($where['data'])) return JsonService::fail('参数错误');
        $ingre1=$ingre2=0;
        $ingredient=[];
        foreach ($where['data'] as $k => $v) {
            $ingre1+=Db::name('microchip_product_ingredient')->where(['microchip_id'=>$v['id'],'type'=>1])->count();
            $ingre2+=Db::name('microchip_product_ingredient')->where(['microchip_id'=>$v['id'],'type'=>2])->count();
            $ingredient[]=Db::name('microchip_product_ingredient')->where('microchip_id',$v['id'])->field('dose,unit,name,ingredient_id as id')->select()->toArray();
        }unset($v);
        $ingre=[];
        foreach ($ingredient as $kk => $vv) {
            for($i=0;$i< count($vv);$i++){
                in_array($vv[$i]['id'],$ingre) ? $ingre[$vv[$i]['id']]['dose']+=$vv[$i]['dose']:$ingre[$vv[$i]['id']]=$vv[$i];
            }
        }unset($vv);
        sort($ingre);
        // }unset($v);
        // $ingre=[];
        // foreach ($ingredient as $kk => $vv) {
        //     for($i=0;$i< count($vv);$i++){
        //         in_array($vv[$i]['id'],$ingre) ? $ingre[$vv[$i]['id']]['dose']+=$vv[$i]['dose']:$ingre[$vv[$i]['id']]=$vv[$i];
        //     }
        // }unset($vv);
        // sort($ingre);
        $data=['ingre1'=>$ingre1,'ingre2'=>$ingre2,'ingre'=>$ingre];
        return JsonService::successful('获取成功',$data);
    }
}
