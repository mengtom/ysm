<?php

namespace app\admin\controller\microchip;

use app\admin\controller\AuthController;
// use app\admin\model\microchip\MicrochipProductAttrValue;
use yesai\services\FormBuilder as Form;
use app\admin\model\microchip\MicrochipProductIngredient as IngreModel;
// use app\admin\model\microchip\MicrochipProductAttrResult;
// use app\admin\model\microchip\MicrochipProductRelation;
use yesai\services\JsonService;
use think\facade\Db;
use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use app\admin\model\microchip\MicrochipIngredient as ProductModel;
use think\facade\Route as Url;
use app\admin\model\system\SystemAttachment;
use app\validate\MicrochipIngredient as IngredientValidate;
use think\exception\ValidateException;
/**
 * 成分管理
 * Class MicrochipProduct
 * @package app\admin\controller\microchip
 */
class MicrochipIngredient extends AuthController
{
    use CurdControllerTrait;
    protected $bindModel = ProductModel::class;
    protected static $category_list=[['cate_id'=>0,'cate_name'=>'活性成分'],['cate_id'=>'1','cate_name'=>'辅料成分']];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // $where=Util::getMore([
        //     ['page',1],
        //     ['limit',20],
        //     ['keyword',''],
        //     ['cate_id',''],
        //     // ['order',''],
        // ],$this->request);
        // $this->assign(ProductModel::ProductList($where));
        // $this->assign('where',$where);
        // //获取分类
        $this->assign('cate',self::$category_list);
        return $this->fetch();
    }
    /**
     * 异步查找成分
     *
     * @return json
     */
    public function product_ist(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['cate_id',''],
            // ['excel',0],
            // ['type',$this->request->param('type')]
        ],$this->request);
        return JsonService::successlayui(ProductModel::ProductList($where));
    }
    /**
     * 设置单个成分上架|下架
     *
     * @return json
     */
    public function set_show($is_show='',$id=''){
        ($is_show=='' || $id=='') && JsonService::fail('缺少参数');
        $res=ProductModel::where(['id'=>$id])->update(['is_show'=>(int)$is_show]);
        if($res){
            return JsonService::successful($is_show==1 ? '上架成功':'下架成功');
        }else{
            return JsonService::fail($is_show==1 ? '上架失败':'下架失败');
        }
    }
    /**
     * 快速编辑
     *
     * @return json
     */
    public function set_product($field='',$id='',$value=''){
        $field=='' || $id=='' || $value=='' && JsonService::fail('缺少参数');
        if(ProductModel::where(['id'=>$id])->update([$field=>$value]))
            return JsonService::successful('保存成功');
        else
            return JsonService::fail('保存失败');
    }
    /**
     * 设置批量成分上架
     *
     * @return json
     */
    public function product_show(){
        $post=Util::postMore([
            ['ids',[]]
        ]);
        if(empty($post['ids'])){
            return JsonService::fail('请选择需要上架的成分');
        }else{
            $res=ProductModel::where('id','in',$post['ids'])->update(['is_show'=>1]);
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
        $this->assign('cate',self::$category_list);
        $this->assign('product',['code'=>'','zn_name'=>'','en_name'=>'','price'=>'','scale'=>'','id'=>'','cate_id'=>'']);
        return $this->fetch();
    }

    /**
     * 上传图片
     * @return \think\response\Json
     */
    public function upload()
    {
        $res = Upload::instance()->setUploadPath('microchip/product/'.date('Ymd'))->image('file');
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
            ['code',''],
            ['zn_name',''],
            ['en_name',''],
            ['price',0.00],
            ['scale',0.00],
        ],$this->request);
        try{
            validate(IngredientValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        if(ProductModel::checkIngredientExist('code',$data['code'])) return $this->failed('成分编码不唯一,请重新输入',$_SERVER['HTTP_REFERER']);
        $cate_name=ProductModel::getCateName($data['cate_id']);
        if(is_array($cate_name)) return $this->failed('请选择成分类型');
        $data['cate_name']=$cate_name;
        // if($data['cate_id'] == '') return Json::fail('请选择成分类型');
        // $cate_name=ProductModel::getCateName($data['cate_id']);
        // if(is_array($cate_name)) return Json::fail('请选择成分类型');
        // $data['cate_name']=$cate_name;
        // if(!$data['zn_name']) return Json::fail('请输入中文名称');
        // if($data['price'] == '' || $data['price'] < 0) return Json::fail('请输入原料进价');
        // if($data['code'] == '') return Json::fail('请输入成分编码');
        // $data['add_time'] = time();
        $res = ProductModel::create($data);
        return $this->successful('添加成分成功!');
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $product = ProductModel::get($id);
        if(!$product) return Json::fail('数据不存在!');
        $this->assign(compact('product'));
        $this->assign('cate',self::$category_list);
        return $this->fetch('create');
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
            ['code',''],
            ['zn_name',''],
            ['en_name',''],
            ['price',0.00],
            ['scale',0.00],
        ],$this->request);
        try{
            validate(IngredientValidate::class)->check($data);
        }catch(ValidateException $e){
            $this->failed($e->getError());
        }
        if($data['cate_id'] == '') return $this->failed('请选择成分类型');
        $cate_name=ProductModel::getCateName($data['cate_id']);
        if(is_array($cate_name)) return $this->failed('请选择成分类型');
        $data['cate_name']=$cate_name;
        if(!$data['zn_name']) return $this->failed('请输入中文名称');
        if($data['price'] == '' || $data['price'] < 0) return $this->failed('请输入原料进价');
        if($data['code'] == '') return $this->failed('请输入成分编码');
        $check=ProductModel::checkIngredientExist('code',$data['code']);
        if($check && $check['id'] !=$info->id) return $this->failed('成分编码不唯一,请重新输入',$_SERVER['HTTP_REFERER']);
        ProductModel::edit($data,$id);
        // Db::name('microchip_product_cate')->where('id',$id)->delete();
        // foreach ($cate_id as $cid){
        //     Db::name('microchip_product_cate')->insert(['id'=>$id,'cate_id'=>$cid,'add_time'=>time()]);
        // }
        return $this->successful('成分修改成功!');
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
        if(!ProductModel::be(['id'=>$id])) return $this->failed('成分数据不存在');
        if(ProductModel::be(['id'=>$id,'is_del'=>1])){
            $data['is_del'] = 0;
            if(!ProductModel::edit($data,$id))
                return $this->failed(ProductModel::getErrorInfo('恢复失败,请稍候再试!'));
            else
                return $this->successful('成功恢复成分!');
        }else{
            $data['is_del'] = 1;
            if(!ProductModel::edit($data,$id))
                return $this->failed(ProductModel::getErrorInfo('删除失败,请稍候再试!'));
            else
                return $this->successful('成功移到回收站!');
        }

    }

    /**
     * 点赞
     * @param $id
     * @return mixed|\think\response\Json|void
     */
    public function collect($id){
        if(!$id) return $this->failed('数据不存在');
        $product = ProductModel::get($id);
        if(!$product) return Json::fail('数据不存在!');
        $this->assign(MicrochipProductRelation::getCollect($id));
        return $this->fetch();
    }

    /**
     * 收藏
     * @param $id
     * @return mixed|\think\response\Json|void
     */
    public function like($id){
        if(!$id) return $this->failed('数据不存在');
        $product = ProductModel::get($id);
        if(!$product) return Json::fail('数据不存在!');
        $this->assign(MicrochipProductRelation::getLike($id));
        return $this->fetch();
    }

    /**
     * 修改成分价格
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
     * 修改成分库存
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
     * 成分使用情况
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function useage($id){
        $this->assign(compact('id'));
        return $this->fetch();
    }
    public function ingredientUseage($id){
         $where=Util::getMore([
            ['page',1],
            ['limit',10],
            // ['keyword',''],
            // ['cate1',''],
            // ['cate2',''],
            // ['cate3',''],
            ['excel',0],
            ['order',''],
            // ['is_show',''],
            // ['type',$this->request->param('type')]
        ],$this->request);
         $where['ingredient_id'] =(int) $id;
        return Json::successlayui(IngreModel::MicrochopList($where));
    }
}
