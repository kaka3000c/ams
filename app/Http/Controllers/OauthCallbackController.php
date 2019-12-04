<?php

namespace App\Http\Controllers;

use EasyWeChat\Kernel\Messages\Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Log;

//服务号授权回调
class OauthCallbackController extends Controller {

    //服务号授权回调
    public function index(Request $request) {
        
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
//
//        // 获取 OAuth 授权结果用户信息
         $user = $oauth->user();
          var_dump($user);
         // $_SESSION['wechat_user'] = $user->toArray();
// 
         $request->session()->put('wechat_user', $user->toArray());
         $targetUrl = $request->session()->get('target_url');
     
         $targetUrl = empty($targetUrl) ? '/' : $targetUrl;
         //echo $_SESSION['target_url'];
         
//
        header('location:' . $targetUrl); // 跳转到 user/profile 
    }

}
