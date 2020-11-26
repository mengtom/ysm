<?php

namespace app\admin\controller\label;

use app\admin\controller\AuthController;
use app\admin\model\system\SystemAttachment;
use yesai\services\FormBuilder as Form;
use yesai\services\UtilService as Util;
use yesai\services\JsonService as Json;
use yesai\services\UploadService as Upload;
use think\facade\Route as Url;
use app\admin\model\label\LabelCategory as LabelCategoryModel;
use app\admin\model\label\Label as LabelModel;


/**
 * 文章标签管理  控制器
 * */
class Label extends AuthController

{

    /**
     * 标签管理
     * */
     public function index(){
         $where = Util::getMore([
            ['cid',''],
            ['title',''],
            ['page',1],
            ['limit',10],
            ['pid',0]
         ],$this->request);
        $tree = LabelCategoryModel::getLabelCategoryList();
        $label_list = LabelModel::getFirstLabel();
        $this->assign(compact('tree','label_list'));
        $this->assign('where',$where);
        $this->assign(LabelModel::getAll($where));
        return $this->fetch();
     }
     /*
     *  异步获取分类列表
     *  @return json
     */
    public function label_list(){
        $where = Util::getMore([
            // ['is_show',''],
            ['pid',$this->request->param('pid','')],
            // ['cate_name',''],
            ['page',1],
            ['limit',20],
            // ['order','']
        ]);
        return JsonService::successlayui(LabelModel::LabelList($where));
    }
    /**

     * 添加标签管理

     * */

    public function create(){
        $f = array();
        $f[] = Form::select('pid','父级id')->setOptions(function(){
            $list = LabelCategoryModel::getTierList();
            $menus[] = ['value'=>0,'label'=>'顶级标签'];
            foreach ($list as $menu){
                $menus[] = ['value'=>$menu['id'],'label'=>$menu['html'].$menu['title']];
            }
            return $menus;
        })->filterable(1);
        $f[] = Form::input('title','标签名称');
        $f[] = Form::input('intr','标签简介')->type('textarea');
//        $f[] = Form::select('new_id','图文列表')->setOptions(function(){
//            $list = LabelModel::getNews();
//            $options = [];
//            foreach ($list as $id=>$roleName){
//                $options[] = ['label'=>$roleName,'value'=>$id];
//            }
//            return $options;
//        })->multiple(1)->filterable(1);
        $f[] = Form::frameImageOne('image','标签图片',Url::buildUrl('admin/widget.images/index',array('fodder'=>'image')))->icon('image')->width('100%')->height('500px');
        $f[] = Form::number('sort','排序',0);
        $f[] = Form::radio('status','状态',1)->options([['value'=>1,'label'=>'显示'],['value'=>0,'label'=>'隐藏']]);
        $form = Form::make_post_form('添加标签',$f,Url::buildUrl('save'));
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');

    }

    /**
     * s上传图片
     * */
    public function upload(){
        $res = Upload::instance()->setUploadPath('label')->image('file');
        if(!is_array($res)) return Json::fail($res);
        SystemAttachment::attachmentAdd($res['name'],$res['size'],$res['type'],$res['dir'],$res['thumb_path'],5,$res['image_type'],$res['time']);
        return Json::successful('图片上传成功!',['name'=>$res['name'],'url'=>Upload::pathToUrl($res['thumb_path'])]);
    }

    /**

     * 保存标签管理

     * */

    public function save(){
        $data = Util::postMore([
            'title',
            'pid',
            'cid',
            'en_title',// ['sort',0],'status',
            ['status',1],
            ]);
        if(!$data['title']) return $this->failed('请输入标签名称');
        if(!preg_match("/^[0-9a-zA-Z_\s\!\%\(\)\_\[\]\{\}\\\|\;\'\'\:\"\"\,\.\/\<\>\-\?]+$/",$data['en_title'])) return $this->failed('请输入英文名称');
        if($data['pid'] < 0) return $this->failed('请输入标签级别');
        if(!$data['cid']) return $this->failed('请输入标签类别');
        //if($data['sort'] < 0) return Json::fail('排序不能是负数');
        $data['add_time'] = time();
        $data['catename'] = LabelCategoryModel::getLabelCategoryInfo($data['cid']);
        $res = LabelModel::create($data);
        //if(!LabelModel::saveBatchCid($res['id'],implode(',',$new_id))) return Json::fail('标签添加失败');
        return $this->successful('添加标签成功!');
    }

    /**

     * 修改标签

     * */

    public function edit($id){
        if(!$id) return $this->failed('参数错误');
        $label = LabelModel::get($id)->getData();
        if(!$label) return Json::fail('数据不存在!');
        $f = array();
        $f[] = Form::select('pid','父级id',(string)$label['pid'])->setOptions(function(){
            $list = LabelCategoryModel::getTierList();
            $menus[] = ['value'=>0,'label'=>'顶级标签'];
            foreach ($list as $menu){
                $menus[] = ['value'=>$menu['id'],'label'=>$menu['html'].$menu['title']];
            }
            return $menus;
        })->filterable(1);
        $f[] = Form::input('title','标签名称',$label['title']);
        $f[] = Form::input('en_title','标签英文名称',$label['en_title'])->type('textarea');
        // $f[] = Form::select('new_id','图文列表',explode(',',$label->getData('new_id')))->setOptions(function(){
        //    $list = LabelModel::getNews();
        //    $options = [];
        //    foreach ($list as $id=>$roleName){
        //        $options[] = ['label'=>$roleName,'value'=>$id];
        //    }
        //    return $options;
        // })->multiple(1)->filterable(1);
        // $f[] = Form::frameImageOne('image','标签图片',Url::buildUrl('admin/widget.images/index',array('fodder'=>'image')),$label['image'])->icon('image')->width('100%')->height('500px');
        $f[] = Form::number('sort','排序',0);
        $f[] = Form::radio('status','状态',$label['status'])->options([['value'=>1,'label'=>'显示'],['value'=>0,'label'=>'隐藏']]);
        $form = Form::make_post_form('编辑标签',$f,Url::buildUrl('update',array('id'=>$id)));
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');

    }



    public function update($id)
    {
        $data = Util::postMore([
            'pid',
            'title',
            'en_title',
//            ['new_id',[]],
            'cid',

            'status',1]);
        if(!$data['title']) return Json::fail('请输入标签名称');
        if(preg_match("/[^A-Za-z]/",$data['en_title'])) return Json::fail('请输入英文名称');
        if($data['pid'] < 0) return Json::fail('请输入标签级别');
        if(!$data['cid']) return Json::fail('请输入标签类别');
        if(!LabelModel::get($id)) return Json::fail('编辑的标签不存在!');
//        if(!LabelModel::saveBatchCid($id,implode(',',$data['new_id']))) return Json::fail('文章列表添加失败');
//        unset($data['new_id']);
        LabelModel::edit($data,$id);
        return Json::successful('修改成功!');
    }

    /**
     * 删除标签
     * */
    public function delete($id)
    {
        $res = LabelModel::delLabel($id);
        if(!$res)
            return $this->failed(LabelModel::getErrorInfo('删除失败,请稍候再试!'));
        else
            return $this->successful('删除成功!');
    }
    public function getCategory(){
        $cate1=LabelModel::getCateList(1);
        $cate2=LabelModel::getCateList(2);
        $cate3=LabelModel::getCateList(3);
        return Json::successful('获取成功',['cate1'=>$cate1,'cate2'=>$cate2,'cate3'=>$cate3]);
    }

}

