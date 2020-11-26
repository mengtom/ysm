<?php
/**
 *
 * @author: tom
 * @day: 2020/08/11
 */

namespace app\doctor\controller;

use think\exception\Handle;
use think\exception\ValidateException;
use think\Response;
use Throwable;

/**
 * 后台异常处理
 *
 * Class AdminException
 * @package app\doctor\controller
 */
class DoctorException extends Handle
{

    public function render($request, Throwable $e): Response
    {
        // 参数验证错误
        if ($e instanceof ValidateException) {
            return app('json')->make(422, $e->getError());
        }
        if ($e instanceof \Exception && request()->isAjax()) {
            return app('json')->fail(['code' => $e->getCode(), 'message' => $e->getMessage(), 'file' => $e->getFile()]);
        }

        return parent::render($request, $e);
    }
}