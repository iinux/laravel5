<?php
/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2017/1/25
 * Time: 19:58
 */

namespace App\Listeners;

use Auth;
use App\User;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use Overtrue\LaravelWechat\Events\WeChatUserAuthorized as WeChatUserAuthorizedEvent;

class WeChatUserAuthorized
{
    public function handle(WeChatUserAuthorizedEvent $event)
    {
        $app = app(Application::class);
        $userService = $app->user;
        $openid = $event->user->getId();
        $user = User::where('openid', $openid)->first();
        if (empty($user)) {
            $userData = $userService->get($openid)->toArray();
            $userData = array_merge($userData, [
                'register_from' => 'wechat',
                'register_at' => date('Y-m-d H:i:s'),
                'last_login_at' => date('Y-m-d H:i:s'),
            ]);
            User::create($userData);
        } else {
            $user->last_login_at = date('Y-m-d H:i:s');
            $user->save();
        }
        Auth::login($user);
    }

}