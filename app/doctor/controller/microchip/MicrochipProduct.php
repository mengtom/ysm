<?php
namespace app\doctor\controller\microchip;
use app\doctor\controller\AuthController;
use yesai\services\FormBuilder as Form;
use app\doctor\model\microchip\MicrochipProductIngredient as ingreModel;
use think\facade\Db;
// use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use app\doctor\model\label\Label as CategoryModel;
use app\doctor\model\microchip\MicrochipProductIngredient;
use app\doctor\model\microchip\MicrochipProduct as ProductModel;
use app\doctor\model\crm\CrmPlatformMicrochip as PlatformMicrochipModel;
use think\facade\Route as Url;
use app\doctor\model\system\SystemAttachment;
use app\validate\MicrochipProduct as ProductValidate;
use app\doctor\model\microchip\MicrochipIngredient as IngredientModel;
use yesai\services\UploadService as Upload;
use think\exception\ValidateException;
/**
 * 产品管理
 * Class MicrochipProduct
 * @package app\doctor\controller\microchip
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
        $cate1=CategoryModel::getCateList(1,1);
        $cate2=CategoryModel::getCateList(2,1);
        $cate3=CategoryModel::getCateList(3,1);
        $this->assign(compact('cate1','cate2','cate3'));
        // if($type == null) $type = 1;
        // $this->assign(compact('type','onsale','forsale','warehouse','outofstock','policeforce','recycle'));
        return $this->fetch();
    }
    /**
     * 异步查找产品
     *
     * @return json
     */
    public function product_list(){
        $where=Util::getMore([
            ['page',1],
            ['limit',20],
            ['keyword',''],
            ['cate1',''],
            ['cate2',''],
            ['cate3',''],
            ['excel',0],
            ['is_show',''],
            ['platform',$this->doctorInfo['platform_leader']],
        ],$this->request);
        return json::successlayui(PlatformMicrochipModel::getSelectMicrochip($where));
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function details($micro_id)
    {
        if(!$micro_id) return $this->failed('数据不存在');
        $info = ProductModel::get($micro_id);
        if(!$info) return $this->failed('数据不存在!');
        $ingre0=ingreModel::getIngredient($micro_id,0);
        $ingre1=ingreModel::getIngredient($micro_id,1);
        $info['ingredient']=['0'=>$ingre0,'1'=>$ingre1];
        $filename=$files=[];
        $info['files'] ? $files=json_decode($info['files']):'';
        foreach ($files as $k=>$f) {
            $filename[]=['path'=>$f,'filename'=>pathinfo($f,PATHINFO_BASENAME)];
        }unset($f);

        // $cate1=CategoryModel::getCateList(1);
        // $cate2=CategoryModel::getCateList(2);
        // $cate3=CategoryModel::getCateList(3);
        // $huo_micro=IngredientModel::ProductList(['cate_id'=>0,'page'=>0,'limit'=>0,'keyword'=>'']);
        // $huo_micro=$huo_micro['data'];
        // $fu_micro=IngredientModel::ProductList(['cate_id'=>1,'page'=>0,'limit'=>0,'keyword'=>'']);
        // $fu_micro=$fu_micro['data'];
        $this->assign(compact('info','micro_id','filename'));
        return $this->fetch();
        return $this->fetch();
    }

    /**
     * 修改产品价格
     */
    public function set_price(){
        $data = Util::postMore([
            ['id',0],
            ['value',0],
        ]);
        if(!(int)$data['id']) return Json::fail('参数错误');
        if($data['value'] == '' || $data['value'] < 0) return Json::fail('请输入微片定价');
        $res = PlatformMicrochipModel::where(["platform_id"=>$this->platformPId,'micro_id'=>$data['id']])->save(['sell_price'=>$data['value']]);
        if($res) return Json::successful('修改成功');
        else return Json::fail('修改失败');
    }

     /**
     * 设置单个产品上架|下架
     *
     * @return json
     */
    public function set_show($is_show='',$id=''){
        ($is_show=='' || $id=='') && json::fail('缺少参数');
        $res=ProductModel::where(['micro_id'=>$id])->update(['status'=>(int)$is_show]);
        if($res){
            return json::successful($is_show==1 ? '修改成功':'修改成功');
        }else{
            return json::fail($is_show==1 ? '修改失败':'修改失败');
        }
    }
}
