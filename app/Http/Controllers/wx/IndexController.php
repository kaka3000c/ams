<?php

namespace App\Http\Controllers\wx;

use EasyWeChat\Kernel\Messages\Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller {

    //公众号验证
    public function veri(Request $request) {
        $config = [
             'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
                //...
        ];

        $app = Factory::officialAccount($config);

        $response = $app->server->serve();

// 将响应输出
        return $response;
    }

    //服务号授权登录
    public function index(Request $request) {
        // Log::info('Showing user profile for user:1111111111111111 ');

        $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
            //...
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/wx/oauth_callback',
            ],
        ];

        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

        $wechat_user = $request->session()->get('wechat_user');

        // 未登录
        if (empty($wechat_user)) {


            $request->session()->put('target_url', '/wx/index');
            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            // $oauth->redirect()->send();
        }


        $user = $wechat_user;
        print_r($user);
    }

    //服务号授权回调
    public function oauth_callback(Request $request) {

        $code = $request->input('code');
        echo $code;
        $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/oauth_callback',
            ],
        ];

        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

//        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        var_dump($user);


        $request->session()->put('wechat_user', $user->toArray());
        $targetUrl = $request->session()->get('target_url');

        $targetUrl = empty($targetUrl) ? '/' : $targetUrl;



        header('location:' . $targetUrl); // 跳转到 user/profile 
    }

}
