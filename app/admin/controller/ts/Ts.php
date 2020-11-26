<?php
namespace app\admin\controller\ts;
use app\admin\controller\AuthController;
// use yesai\services\FormBuilder as Form;
use yesai\services\JsonService;
use think\facade\Db;
use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use app\admin\model\label\Label as CategoryModel;
use app\admin\model\ts\Ts as TsModel;
use app\admin\model\ts\TsMicrochip as MicrochipModel;
use think\facade\Route as Url;
use app\validate\Ts as TsValidate;
use app\admin\model\system\SystemAttachment;
use app\admin\model\microchip\MicrochipProduct as ProductModel;
use app\admin\model\ts\TsMicrochip as tsMicrochipModel;
use think\exception\ValidateException;
/**
 * 产品管理
 * Class StoreProduct
 * @package app\admin\controller\ts
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
        $type = $this->request->param('type');
        $cate2=CategoryModel::getChildList(2,1);
        $this->assign(compact('cate2'));
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
            ['cate2',''],
            ['excel',0],
            ['order',''],
            ['is_status','']
        ]);
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
     * 快速编辑
     *
     * @return json
     */
    public function set_product($field='',$id='',$value=''){
        $field=='' || $id=='' || $value=='' && JsonService::fail('缺少参数');
        if(TsModel::where(['id'=>$id])->update([$field=>$value]))
            return JsonService::successful('保存成功');
        else
            return JsonService::fail('保存失败');
    }
    /**
     * 设置批量产品上架
     *
     * @return json
     */
    public function product_show(){
        $post=Util::postMore([
            ['ids',[]]
        ]);
        if(empty($post['ids'])){
            return JsonService::fail('请选择需要上架的产品');
        }else{
            $res=TsModel::where('id','in',$post['ids'])->update(['is_show'=>1]);
            if($res)
                return JsonService::successful('上架成功');
            else
                return JsonService::fail('上架失败');
        }
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
//        $this->assign(['title'=>'添加产品','action'=>Url::buildUrl('save'),'rules'=>$this->rules()->getContent()]);
//        return $this->fetch('public/common_form');
        // $field = [
        //     Form::select('cate_id','产品分类')->setOptions(function(){
        //         // $list = CategoryModel::getTierList(null, 1);
        //         $menus=[];
        //         foreach ($list as $menu){
        //             $menus[] = ['value'=>$menu['id'],'label'=>$menu['html'].$menu['cate_name'],'disabled'=>$menu['pid']== 0];//,'disabled'=>$menu['pid']== 0];
        //         }
        //         return $menus;
        //     })->filterable(1)->multiple(1),
        //     Form::input('ts_name','产品名称')->col(Form::col(24)),
        //     Form::input('ts_info','产品简介')->type('textarea'),
        //     Form::input('keyword','产品关键字')->placeholder('多个用英文状态下的逗号隔开'),
        //     Form::input('unit_name','产品单位','件')->col(Form::col(12)),
        //     Form::input('bar_code','产品条码','')->placeholder('请输入商品条形码')->col(Form::col(12)),
        //     Form::frameImageOne('image','产品主图片(305*305px)',Url::buildUrl('admin/widget.images/index',array('fodder'=>'image')))->icon('image')->width('100%')->height('500px'),
        //     Form::frameImages('slider_image','产品轮播图(640*640px)',Url::buildUrl('admin/widget.images/index',array('fodder'=>'slider_image')))->maxLength(5)->icon('images')->width('100%')->height('500px')->spin(0),
        //     Form::number('price','产品售价')->min(0)->col(8),
        //     Form::number('ot_price','产品市场价')->min(0)->col(8),
        //     Form::number('give_integral','赠送积分')->min(0)->precision(0)->col(8),
        //     Form::number('postage','邮费')->min(0)->col(Form::col(8)),
        //     Form::number('sales','销量',0)->min(0)->precision(0)->col(8)->readonly(1),
        //     Form::number('ficti','虚拟销量')->min(0)->precision(0)->col(8),
        //     Form::number('stock','库存')->min(0)->precision(0)->col(8),
        //     Form::number('cost','产品成本价')->min(0)->col(8),
        //     Form::number('sort','排序')->col(8),
        //     Form::radio('is_show','产品状态',0)->options([['label'=>'上架','value'=>1],['label'=>'下架','value'=>0]])->col(8),
        //     Form::radio('is_hot','热卖单品',0)->options([['label'=>'是','value'=>1],['label'=>'否','value'=>0]])->col(8),
        //     Form::radio('is_benefit','促销单品',0)->options([['label'=>'是','value'=>1],['label'=>'否','value'=>0]])->col(8),
        //     Form::radio('is_best','精品推荐',0)->options([['label'=>'是','value'=>1],['label'=>'否','value'=>0]])->col(8),
        //     Form::radio('is_new','首发新品',0)->options([['label'=>'是','value'=>1],['label'=>'否','value'=>0]])->col(8),
        //     Form::radio('is_postage','是否包邮',0)->options([['label'=>'是','value'=>1],['label'=>'否','value'=>0]])->col(8),
        //     Form::radio('is_good','是否优品推荐',0)->options([['label'=>'是','value'=>1],['label'=>'否','value'=>0]])->col(8),
        // ];
        // $form = Form::make_post_form('添加产品',$field,Url::buildUrl('save'),2);
        // $this->assign(compact('form'));
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
            if(!$info) return Json::fail('数据不存在!');
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
        $data['mer_id'] = $this->adminId;
        $data['reference']= htmlspecialchars($data['reference']);
        $taking_time=$data['taking_cycle']*$data['taking_quency'];
        $ts_microchip=[];
        $weight=$price=$usd=0;
        TsModel::beginTrans();
        if($new_add){
            $data['add_time'] = time();
            $tid=TsModel::create($data);
            $tid=$tid->id;
            unset($data['add_time']);
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
                    'price'=>$microchip['price'],
                    'usd'=>$microchip['usd'],
                    'unit'=>$microchip['unit'],
                    'weight'=>$microchip['weight']*$v);
                $price+=$microchip['price']*$v;
                $usd+=$microchip['usd']*$v;
                $weight+=$microchip['weight']*$v;
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
        $data['microchip_weight'] = sprintf('%.4f',$weight);
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
        if(!$info) return Json::fail('数据不存在!');
        $cate2=CategoryModel::getCateList(2,1);
        $type=1;
        $microchip=tsMicrochipModel::getAll($id);
        $info['taking_suggest']=explode(',',$info['taking_suggest']);
        $this->assign(compact('cate2','info','type','microchip'));
        return $this->fetch();
    }
    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        if(!$id) return $this->failed('数据不存在');
        if(!TsModel::be(['id'=>$id])) return $this->failed('配方不存在');
        if(TsModel::be(['id'=>$id,'is_del'=>1])){
            $data['is_del'] = 0;
            if(!TsModel::where('id',$id)->edit($data))
                 return $this->failed(TsModel::getErrorInfo('恢复失败,请稍候再试!'));
            else
                 return $this->successful('成功恢复配方!');
        }else{
            $data['is_del'] = 1;
            if(!TsModel::where('id',$id)->save($data))
                 return $this->failed(TsModel::getErrorInfo('删除失败,请稍候再试!'));
            else
                 return $this->successful('成功移到回收站!');
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
            ['status','']
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
            if(!isset($v['id']) || !$v['id'] ) continue;
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
    /**
     * 获取微片Supplement Facts
     * @return [type] [description]
     */
    public function supplement(){
        $where=Util::getMore([
            ['data',''],
        ]);
        if(!is_array($where['data'])) return JsonService::fail('参数错误');
        $facts=$ingredient=[];
        foreach ($where['data'] as $k => $v) {
            if(!isset($v['id']) || !$v['id'] ) continue;
            $ingre=Db::name('microchip_product_ingredient')->alias('mi')->where(['mi.microchip_id'=>$v['id'],'mi.type'=>2])->join('MicrochipIngredient i','i.id = mi.ingredient_id')->field('i.en_name as name')->select()->toArray();
            foreach ($ingre as $ke => $va) {
                $ingredient[]=$va['name'];
            }unset($va);
            $product=Db::name('microchip_product')->where(['id'=>$v['id']])->field('facts_name,amount,facts_daily,facts_unit,facts_sort')->find();
            $product['amount']=$product['amount']*$v['val'];
            $product['facts_daily']=$product['facts_daily']*$v['val'];
            $facts[]=$product;
        }unset($v);
        $facts=array_sort($facts,'facts_sort','asc',true);
        $data=['facts'=>$facts,'ingredient'=>implode(',',array_unique($ingredient))];
        return JsonService::successful('获取成功',$data);
    }
    /**
     * 计算配方成本价
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function cost(int $id){
        if(!$id) return $this->failed('数据不存在');
        $info = TsModel::get($id);
        if(!$info) return $this->failed('数据不存在!');
        $microchip=tsMicrochipModel::getAll($id);
        foreach($microchip as &$v){
            $product=Db::name('microchip_product')->where(['id'=>$v['micro_id']])->field('pricing_rmb,pricing_usd,cost_rmb,cost_usd,weight')->find();
            $v['pricing_rmb']= $product['pricing_rmb'];
            $v['pricing_usd']= $product['pricing_usd'];
            $v['price']= $product['cost_rmb'];
            $v['usd']= $product['cost_usd'];
            $info['pricing_rmb'] += sprintf("%.3f",$product['pricing_rmb'] * $v['num']);
            $info['pricing_usd'] += sprintf("%.3f",$product['pricing_usd'] * $v['num']);
            $info['cost_rmb'] += sprintf("%.3f",$product['cost_rmb'] * $v['num']);
            $info['cost_usd'] += sprintf("%.3f",$product['cost_usd'] * $v['num']);
        }unset($v);
        $config=\app\admin\model\system\SystemConfig::getMore(['microchip_processing_rmb','microchip_processing_usd','packing_labor_rmb','packing_labor_usd','tariff','single_dose_weight','barrel_weight','out_pack_weight','packing_shipping_weight','brochure_weight','single_dose_ymb','single_dose_usd','barrel_price_ymb','barrel_price_usd','out_pack_ymb','out_pack_usd','packing_shipping_rmb','packing_shipping_usd','brochure_rmb','brochure_usd']);
        $config_logistics=\app\admin\model\system\SystemConfigLogistics::getAll(22);// 物流设置
        $this->assign(compact('info','config_logistics','config','microchip'));
        return $this->fetch();
    }
}
