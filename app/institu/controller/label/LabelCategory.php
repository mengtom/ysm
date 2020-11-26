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
 * 标签分类管理  控制器
 * */
class LabelCategory extends AuthController

{

    /**
     * 分类管理
     * */
     public function index(){
         $where = Util::getMore([
             ['status',''],
             ['title',''],
         ],$this->request);
         $this->assign('where',$where);
         $this->assign(LabelCategoryModel::systemPage($where));
         return $this->fetch();
     }

    /**

     * 添加分类管理

     * */

    public function create(){
        $f = array();
        $f[] = Form::select('pid','父级id')->setOptions(function(){
            $list = LabelCategoryModel::getTierList();
            $menus[] = ['value'=>0,'label'=>'顶级分类'];
            foreach ($list as $menu){
                $menus[] = ['value'=>$menu['id'],'label'=>$menu['html'].$menu['title']];
            }
            return $menus;
        })->filterable(1);
        $f[] = Form::input('title','分类名称');
        $f[] = Form::input('intr','分类简介')->type('textarea');
//        $f[] = Form::select('new_id','图文列表')->setOptions(function(){
//            $list = LabelModel::getNews();
//            $options = [];
//            foreach ($list as $id=>$roleName){
//                $options[] = ['label'=>$roleName,'value'=>$id];
//            }
//            return $options;
//        })->multiple(1)->filterable(1);
        $f[] = Form::frameImageOne('image','分类图片',Url::buildUrl('admin/widget.images/index',array('fodder'=>'image')))->icon('image')->width('100%')->height('500px');
        $f[] = Form::number('sort','排序',0);
        $f[] = Form::radio('status','状态',1)->options([['value'=>1,'label'=>'显示'],['value'=>0,'label'=>'隐藏']]);
        $form = Form::make_post_form('添加分类',$f,Url::buildUrl('save'));
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');

    }

    /**
     * s上传图片
     * */
    public function upload(){
        $res = Upload::instance()->setUploadPath('article')->image('file');
        if(!is_array($res)) return Json::fail($res);
        SystemAttachment::attachmentAdd($res['name'],$res['size'],$res['type'],$res['dir'],$res['thumb_path'],5,$res['image_type'],$res['time']);
        return Json::successful('图片上传成功!',['name'=>$res['name'],'url'=>Upload::pathToUrl($res['thumb_path'])]);
    }

    /**

     * 保存分类管理

     * */

    public function save(){
        $data = Util::postMore([
            'title',
            'pid',
            'intr',
            ['new_id',[]],
            ['image',[]],
            ['sort',0],
            'status',]);
        if(!$data['title']) return Json::fail('请输入分类名称');
        if(count($data['image']) != 1) return Json::fail('请选择分类图片，并且只能上传一张');
        if($data['sort'] < 0) return Json::fail('排序不能是负数');
        $data['add_time'] = time();
        $data['image'] = $data['image'][0];
        $new_id = $data['new_id'];
        unset($data['new_id']);
        $res = LabelCategoryModel::create($data);
        if(!LabelModel::saveBatchCid($res['id'],implode(',',$new_id))) return Json::fail('标签列表添加失败');
        return Json::successful('添加分类成功!');
    }

    /**

     * 修改分类

     * */

    public function edit($id){
        if(!$id) return $this->failed('参数错误');
        $article = LabelCategoryModel::get($id)->getData();
        if(!$article) return Json::fail('数据不存在!');
        $f = array();
        $f[] = Form::select('pid','父级id',(string)$article['pid'])->setOptions(function(){
            $list = LabelCategoryModel::getTierList();
            $menus[] = ['value'=>0,'label'=>'顶级分类'];
            foreach ($list as $menu){
                $menus[] = ['value'=>$menu['id'],'label'=>$menu['html'].$menu['title']];
            }
            return $menus;
        })->filterable(1);
        $f[] = Form::input('title','分类名称',$article['title']);
        $f[] = Form::input('intr','分类简介',$article['intr'])->type('textarea');
//        $f[] = Form::select('new_id','图文列表',explode(',',$article->getData('new_id')))->setOptions(function(){
//            $list = LabelModel::getNews();
//            $options = [];
//            foreach ($list as $id=>$roleName){
//                $options[] = ['label'=>$roleName,'value'=>$id];
//            }
//            return $options;
//        })->multiple(1)->filterable(1);
        $f[] = Form::frameImageOne('image','分类图片',Url::buildUrl('admin/widget.images/index',array('fodder'=>'image')),$article['image'])->icon('image')->width('100%')->height('500px');
        $f[] = Form::number('sort','排序',0);
        $f[] = Form::radio('status','状态',$article['status'])->options([['value'=>1,'label'=>'显示'],['value'=>0,'label'=>'隐藏']]);
        $form = Form::make_post_form('编辑分类',$f,Url::buildUrl('update',array('id'=>$id)));
        $this->assign(compact('form'));
        return $this->fetch('public/form-builder');

    }



    public function update($id)
    {
        $data = Util::postMore([
            'pid',
            'title',
            'intr',
//            ['new_id',[]],
            ['image',[]],
            ['sort',0],
            'status',]);
        if(!$data['title']) return Json::fail('请输入分类名称');
        if(count($data['image']) != 1) return Json::fail('请选择分类图片，并且只能上传一张');
        if($data['sort'] < 0) return Json::fail('排序不能是负数');
        $data['image'] = $data['image'][0];
        if(!LabelCategoryModel::get($id)) return Json::fail('编辑的记录不存在!');
//        if(!LabelModel::saveBatchCid($id,implode(',',$data['new_id']))) return Json::fail('标签列表添加失败');
//        unset($data['new_id']);
        LabelCategoryModel::edit($data,$id);
        return Json::successful('修改成功!');
    }

    /**
     * 删除分类
     * */
    public function delete($id)
    {
        $res = LabelCategoryModel::delArticleCategory($id);
        if(!$res)
            return Json::fail(LabelCategoryModel::getErrorInfo('删除失败,请稍候再试!'));
        else
            return Json::successful('删除成功!');
    }


}

