<?php
/**
 * @author: Tom
 * @day: 2020/10/19
 */

namespace app\admin\model\system;

use yesai\basic\BaseModel;
use yesai\services\FormBuilder as Form;
use yesai\traits\ModelTrait;

class SystemConfigLogistics extends BaseModel
{
	 /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_config_logistics';

    use ModelTrait;
     /**
     * 获取配置分类
     * @param $id
     * @return \think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getAll($id,int $status = 1){
        $where['config_tab_id'] = $id;
        if($status == 1) $where['status'] = $status;
        return self::where($where)->order('weight asc,id asc')->select();
    }

}