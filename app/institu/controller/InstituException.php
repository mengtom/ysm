<?php
/**
 *
 * @author: xaboy<365615158@qq.com>
 * @day: 2018/01/10
 */

namespace app\institu\controller;

use think\exception\Handle;
use think\exception\ValidateException;
use think\Response;
use Throwable;

/**
 * 后台异常处理
 *
 * Class AdminException
 * @package app\institu\controller
 */
class InstituException extends Handle
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