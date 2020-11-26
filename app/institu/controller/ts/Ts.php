<?php
namespace app\institu\controller\ts;
use app\institu\controller\AuthController;
use yesai\services\FormBuilder as Form;
use yesai\services\JsonService;
use think\facade\Db;
use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use app\institu\model\label\Label as CategoryModel;
use app\institu\model\ts\Ts as TsModel;
use app\institu\model\ts\TsMicrochip as MicrochipModel;
use think\facade\Route as Url;
use app\validate\Ts as TsValidate;
use app\institu\model\system\SystemAttachment;
use app\institu\model\microchip\MicrochipProduct as ProductModel;
use app\institu\model\ts\TsMicrochip as tsMicrochipModel;
use think\exception\ValidateException;
/**
 * 产品管理
 * Class StoreProduct
 * @package app\institu\controller\ts
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
        $type = $this->request->param('type','0');
        $cate2=CategoryModel::getCateList(2,1);
        // $cate3=CategoryModel::getCateList(3,1);
        $this->assign(compact('cate2','type'));
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
            ['type',0],
            ['is_status',''],
            ['platform_id',$this->instituInfo['platform_leader']],
        ]);
        if($where['type'] == 0){
            $where['type'] = 1;
        }else{
            $where['type'] = 2;
        }
        $where['currency']=$this->instituInfo['currency'];
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
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function details($id)
    {
        if(!$id) return $this->failed('数据不存在');
        $info = TsModel::get($id);
        if(!$info) return Json::fail('数据不存在!');
        // $info['total_price']=$this->instituInfo['currency']? $info['total_usd']:$info['total_price'];
        $cate2=CategoryModel::getCateList(2);
        $type=1;
        $microchip=tsMicrochipModel::getAll($id);
        $ingre1=$ingre2=$single_price=$single_usd=0;
        $ingre=$ingredient=[];
        foreach ($microchip as $k => $v) {
            $ingre1+=Db::name('microchip_product_ingredient')->where(['microchip_id'=>$v['micro_id'],'type'=>1])->count();//活性成分
            $ingre2+=Db::name('microchip_product_ingredient')->where(['microchip_id'=>$v['micro_id'],'type'=>2])->count();//辅料成分
            $ingredient[]=Db::name('microchip_product_ingredient')->where('microchip_id',$v['micro_id'])->field('dose,unit,name,ingredient_id as id')->select()->toArray();
            // $v['price']=$this->instituInfo['currency']? $v['price']*$v['num']:$v['price']*$v['num'];
            $single_price+=$v['price']*$v['num'];//单剂RMB
        }unset($v);
        foreach ($ingredient as $kk => $vv) {
            for($i=0;$i< count($vv);$i++){
                in_array($vv[$i]['id'],$ingre) ? $ingre[$vv[$i]['id']]['dose']+=$vv[$i]['dose']:$ingre[$vv[$i]['id']]=$vv[$i];
            }
        }unset($vv);
        sort($ingre);
        $this->assign(compact('cate2','info','type','microchip','ingre','ingre1','ingre2','single_price'));
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
        if(!$id) return Json::fail('数据不存在');
        if(!TsModel::be(['id'=>$id,'institu_id'=>$this->instituPId])) return Json::fail('配方不存在');
        if(TsModel::be(['id'=>$id,'is_del'=>1,'institu_id'=>$this->instituPId])){
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
            ['institu_id',$this->instituPId],
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
