<?php

namespace app\admin\controller\crm;

use app\admin\controller\AuthController;
use yesai\services\JsonService;
use yesai\services\UtilService;
// use yesai\traits\CurdControllerTrait;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use app\admin\model\crm\CrmDoctor as DoctorModel;
use app\admin\model\crm\CrmPlatform as PlatformModel;
/**
 * 独立医生管理 控制器
 * Class
 * @package app\admin\controller\crm
 */
class CrmDoctor extends AuthController
{

    // use CurdControllerTrait;

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $type = $this->request->param('type',0);
        $platform=PlatformModel::PlatformList(['page'=>'','limit'=>'','category'=>4]);
        $this->assign('type',(int)$type);
        $this->assign('platform',$platform['data']);
        // $this->assign('institu',$institu['data']);
        return $this->fetch();
    }
    /**
     * 医生列表
     * @return [type] [description]
     */
    public function get_doctor_list()
    {
        $type=UtilService::getMore([['type',0]]);
        switch ($type) {
            case '1':
                $category=1;
                break;
            case '2':
                $category=2;
                break;
            default :
                $category=1;
            break;
        }
        $where=UtilService::getMore([
            ['page',1],
            ['limit',10],
            ['keyword',''],
            ['platform',''],
            ['time',''],
            ['excel',0],
            ['type',2],
        ]);
        return JsonService::successlayui(DoctorModel::DoctorList($where));
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
