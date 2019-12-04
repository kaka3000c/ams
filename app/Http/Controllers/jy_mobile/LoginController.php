<?php

namespace App\Http\Controllers\jy_mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\User;
use App\ServiceUser;
use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;

// 结婚网手机登录类
class LoginController extends Controller
{
    //服务号授权登录结婚网
    public function index(Request $request)
    {
        
        $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/mobile/oauth_callback', 
            ],
        ];
         
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;
        
        $wechat_user = $request->session()->get('wechat_user');
       // 未登录
        if (empty($wechat_user)) {

           
           $request->session()->put('target_url', '/mobile/login');
            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            // $oauth->redirect()->send();
        }

           $user = $wechat_user['original'];
       
        
        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
        $service_user = (array)$service_user;
        
        //新增会员或更新会员，更新时间
        if(empty($service_user)){
             $ServiceUser = new ServiceUser;
             $ServiceUser->openid = $user['openid'];
             $ServiceUser->nickname = $user['nickname'];
             $ServiceUser->sex = $user['sex'];
             $ServiceUser->province = $user['province'];
             $ServiceUser->city = $user['city'];
             $ServiceUser->from = 2;
             $ServiceUser->headimgurl = $user['headimgurl'];
             
             $ServiceUser->save();
        }else{
            DB::table('service_users')->where('openid',  $user['openid'])
                 ->update(['updated_at' => date("Y-m-d h:i:s")]);
        }
           $request->session()->put('user_id',$service_user['id'] );
          $user_id = $request->session()->get('user_id');
        echo 333;
        echo "</br>";
        echo $user_id;
        return view('/jy_mobile/user_center',['headimgurl' => $user['headimgurl'],'nickname' => $user['nickname']]);
       
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
                'callback' => '/jy_mobile/oauth_callback', 
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
    
    
     public function login(Request $request)
    {
        
        
            $mobile = $request->input('mobile');
            $password = $request->input('password');
            $password = md5($password);
         $user = DB::table('users')->where('mobile_phone',$mobile)->where('password',$password)->first();
         $user = (array)$user;
        
           if(empty($user)){
               return redirect('/jy_mobile/login')
               ->withErrors(['登录失败，请重新登录！']);
           }else{
                $request->session()->put('mobile', $mobile);
               return redirect('/jy_mobile/user_center');
           }
         
         
         
         
    }
    
     //登出行为
    public function  logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/jy_mobile/index');
    }
    
}
