<?php namespace App\Http\Controllers\Auth;

use Log;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Registrar;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('wechat.oauth', ['only' => ['wechatAuth']]);
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    public function wechatAuth(Request $request)
    {
        return redirect()->intended('/');
    }

    public function wechatVerify(Request $request)
    {

        $signature = $request->query('signature');

        $token      = config('wechat.token');
        $timestamp  = $request->query('timestamp');
        $nonce      = $request->query('nonce');

        $array = [$token, $timestamp, $nonce];
        sort($array, SORT_STRING);
        $str        = implode($array);
        $suppose    = sha1($str);

        if($signature == $suppose){
            return $request->query('echostr');
        }

        $array['suppose'] = $suppose;
        Log::info($request->query(), $array);
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }
}
