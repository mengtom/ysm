<?php
namespace app\http\middleware;
use app\models\user\User;
use app\models\user\UserToken;
use app\Request;
use yesai\exceptions\AuthException;
use yesai\interfaces\MiddlewareInterface;
use yesai\repositories\PlatformRepository;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;

/**
 * token验证中间件
 * Class AuthpTokenMiddleware
 * @package app\http\middleware
 */
class AuthPTokenMiddleware implements MiddlewareInterface
{
    public function handle(Request $request, \Closure $next, bool $force = true)
    {
        $authInfo = null;
        $token = substr(trim($request->header('Authori-zation')), strlen('Connection'));
        //if(!$token)  $token = trim(ltrim($request->header('Authorization'), 'Connection'));//正式版，删除此行，某些服务器无法获取到token调整为 Authori-zation
        try {
            $authInfo = PlatformRepository::parseToken($token);
        } catch (AuthException $e) {
            if ($force)
                return app('json')->make($e->getCode(), $e->getMessage());
        }
        if (!is_null($authInfo)) {
            Request::macro('platform', function () use (&$authInfo) {
                return $authInfo['platform'];
            });
            Request::macro('tokenData', function () use (&$authInfo) {
                return $authInfo['tokenData'];
            });
        }
        Request::macro('isLogin', function () use (&$authInfo) {
            return !is_null($authInfo);
        });
        Request::macro('pid', function () use (&$authInfo) {
            return is_null($authInfo) ? 0 : $authInfo['platform']->id;
        });

        return $next($request);
    }
}