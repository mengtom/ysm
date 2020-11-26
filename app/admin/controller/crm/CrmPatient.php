<?php

namespace app\admin\controller\crm;

use app\admin\controller\AuthController;
use yesai\services\JsonService;
use yesai\services\UtilService;
// use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use app\admin\model\crm\CrmPlatform as PlatformModel;
use app\admin\model\crm\CrmUsers as UsersModel;
/**
 * 患者管理 控制器
 * Class StoreProductReply
 * @package app\admin\controller\store
 */
class CrmPatient extends AuthController
{

    // use CurdControllerTrait;

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        // $platform=PlatformModel::PlatformList(['page'=>'','limit'=>'','category'=>4]);
        // $institu=PlatformModel::PlatformList(['page'=>'','limit'=>'','category'=>3]);
        // $this->assign('platform',$platform['data']);
        // $this->assign('institu',$institu['data']);
        return $this->fetch();
    }
    public function get_patient_list()
    {
        $where=UtilService::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['institu',''],
            ['time',''],
        ]);
        return JsonService::successlayui(UsersModel::getPatientList($where));
    }

    // public function get_product_reply_list()
    // {
    //     $where=UtilService::getMore([
    //         ['limit',10],
    //         ['title',''],
    //         ['is_reply',''],
    //         ['message_page',1],
    //         ['producr_id',0],
    //     ]);
    //     return JsonService::successful(ProductReplyModel::getProductReplyList($where));
    // }

    // /**
    //  * @param $id
    //  * @return \think\response\Json|void
    //  */
    // public function delete($id){
    //     if(!$id) return $this->failed('数据不存在');
    //     $data['is_del'] = 1;
    //     if(!ProductReplyModel::edit($data,$id))
    //         return Json::fail(ProductReplyModel::getErrorInfo('删除失败,请稍候再试!'));
    //     else
    //         return Json::successful('删除成功!');
    // }

    // public function set_reply(){
    //     $data = Util::postMore([
    //         'id',
    //         'content',
    //     ]);
    //     if(!$data['id']) return Json::fail('参数错误');
    //     if($data['content'] == '') return Json::fail('请输入回复内容');
    //     $save['merchant_reply_content'] = $data['content'];
    //     $save['merchant_reply_time'] = time();
    //     $save['is_reply'] = 2;
    //     $res = ProductReplyModel::edit($save,$data['id']);
    //     if(!$res)
    //         return Json::fail(ProductReplyModel::getErrorInfo('回复失败,请稍候再试!'));
    //     else
    //         return Json::successful('回复成功!');
    // }

    // public function edit_reply(){
    //     $data = Util::postMore([
    //         'id',
    //         'content',
    //     ]);
    //     if(!$data['id']) return Json::fail('参数错误');
    //     if($data['content'] == '') return Json::fail('请输入回复内容');
    //     $save['merchant_reply_content'] = $data['content'];
    //     $save['merchant_reply_time'] = time();
    //     $save['is_reply'] = 2;
    //     $res = ProductReplyModel::edit($save,$data['id']);
    //     if(!$res)
    //         return Json::fail(ProductReplyModel::getErrorInfo('回复失败,请稍候再试!'));
    //     else
    //         return Json::successful('回复成功!');
    // }

}
