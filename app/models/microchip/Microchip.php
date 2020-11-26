<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2020/09/28
 */

namespace app\models\microchip;

use yesai\basic\BaseModel;
use yesai\services\UtilService;
use yesai\traits\ModelTrait;

/**
 * TODO 微片Model
 * Class StoreCart
 * @package app\models\store
 */
class Microchip extends BaseModel
{
	/**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';
    use ModelTrait;
    /**
     * 模型名称
     * @var string
     */
    protected $name = 'microchip_product';
    public static function checkPlatformMicrochip($where){
    	$model = self::alias('m')->join('crm_platform_microchip pm','pm.micro_id = m.id')->field('m.id,pm.sell_price,m.zn_name,m.code');
    	$model = $model->where('m.is_show',1);
    	if(isset($where['platform_id']) && $where['platform_id']){
    		$model = $model->where('pm.platform_id',$where['platform_id']);
    	}
    	if(isset($where['code']) && $where['code']){
    		$model = $model->where('m.code',$where['code']);
    	}
    	$data = ($data = $model->find()) && count($data) ? $data->toArray() : [];
    	return $data;
    }
}