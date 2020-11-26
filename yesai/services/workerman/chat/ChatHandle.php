<?php


namespace yesai\services\workerman\chat;


use app\models\store\StoreServiceLog;
use app\models\user\User;
use app\models\user\WechatUser;
use yesai\exceptions\AuthException;
use yesai\repositories\UserRepository;
use yesai\services\SystemConfigService;
use yesai\services\WechatService;
use yesai\services\workerman\ChannelService;
use yesai\services\workerman\Response;
use think\facade\Log;
use think\facade\Route as Url;
use think\facade\Session;
use Workerman\Connection\TcpConnection;

class ChatHandle
{
    protected $service;

    public function __construct(ChatService &$service)
    {
        $this->service = &$service;
    }

    public function login(TcpConnection &$connection, array $res, Response $response)
    {
        if (!isset($res['data']) || !$token = $res['data']) {
            return $response->close([
                'msg' => '授权失败!'
            ]);
        }

        try {
            $authInfo = UserRepository::parseToken($token);
        } catch (AuthException $e) {
            return $response->close([
                'msg' => $e->getMessage()
            ]);
        }

        $connection->user = $authInfo['user'];
        $connection->tokenData = $authInfo['tokenData'];
        $this->service->setUser($connection);

        return $response->success();
    }

    public function to_chat(TcpConnection &$connection, array $res)
    {
        $connection->chatToUid = $res['data']['id'] ?? 0;
    }

    public function chat(TcpConnection &$connection, array $res, Response $response)
    {
        $to_uid = $res['data']['to_uid'] ?? 0;
        $msn_type = $res['data']['type'] ?? 0;
        $msn = $res['data']['msn'] ?? '';
        $uid = $connection->user->uid;
        if (!$to_uid) return $response->send('err_tip', ['msg' => '用户不存在']);
        if ($to_uid == $uid) return $response->send('err_tip', ['msg' => '不能和自己聊天']);
        if (!in_array($msn_type, [1, 2, 3, 4])) return $response->send('err_tip', ['msg' => '格式错误']);
        $msn = trim(strip_tags(str_replace(["\n", "\t", "\r", " ", "&nbsp;"], '', htmlspecialchars_decode($msn))));
        $data = compact('to_uid', 'msn_type', 'msn', 'uid');
        $data['add_time'] = time();
        $connections = $this->service->user();
        $online = isset($connections[$to_uid]) && isset($connections[$to_uid]->chatToUid) && $connections[$to_uid]->chatToUid == $uid;
        $data['type'] = $online ? 1 : 0;
        StoreServiceLog::create($data);

        $_userInfo = User::getUserInfo($data['uid'], 'nickname,avatar');
        $data['nickname'] = $_userInfo['nickname'];
        $data['avatar'] = $_userInfo['avatar'];

        $response->send('chat', $data);

        if ($online) {
            $response->connection($this->service->user()[$to_uid])->send('reply', $data);
        } else {
            $userInfo = WechatUser::where('uid', $to_uid)->field('nickname,subscribe,openid,headimgurl')->find();
            if ($userInfo && $userInfo['subscribe'] && $userInfo['openid']) {
                $head = '客服提醒';
                $description = '您有新的消息，请注意查收！';
                $url = sysConfig('site_url') . '/customer/chat/' . $uid;
                $message = WechatService::newsMessage($head, $description, $url, $_userInfo['avatar']);
                $userInfo = $userInfo->toArray();
                try {
                    WechatService::staffService()->message($message)->to($userInfo['openid'])->send();
                } catch (\Exception $e) {
                    Log::error($userInfo['nickname'] . '发送失败' . $e->getMessage());
                }
            }
        }
    }
}