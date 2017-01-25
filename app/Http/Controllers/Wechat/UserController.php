<?php
/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2017/1/25
 * Time: 14:57
 */

namespace App\Http\Controllers\Wechat;

use Log;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.wechat', ['only' => ['profile']]);
    }

    public function profile()
    {
        return 'ok';
    }
}