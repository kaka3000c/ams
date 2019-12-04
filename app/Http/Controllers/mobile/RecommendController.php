<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\Category;
use App\ServiceUser;
use QrCode;
use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;
//推荐给好友
class RecommendController extends Controller
{
    public function index(Request $request)
    {
         //读取公众号用户信息
        $wechat_user = $request->session()->get('wechat_user');
        
        $user = $wechat_user['original'];
        
        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
        $service_user = (array)$service_user;
        
        $id = $service_user['id'];
        $url = "http://www.0668jjw.cn/mobile/recommend/invite/".$id;
        
        //$url = "http://www.baidu.com";
        return view('/mobile/recommend',['url' => $url]);
        
    }
    
    public function qrcode(Request $request){
        
        $url = "http://www.0668jjw.cn/mobile/index/";
        $data = QrCode::size(200)->generate($url);
        $url = base64_encode($data);
        echo base64_decode($url);
    }
   
    //邀请到的好友注册
    public function invite(Request $request,$id){
        
       
         $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/mobile/recommend/oauth_callback', 
            ],
        ];
         
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;
        
        //读取公众号用户信息
        $wechat_user = $request->session()->get('wechat_user');
        
        // 未登录就跳转申请授权
        if (empty($wechat_user)) {
            
            $request->session()->put('target_url', '/mobile/recommend/invite'.$id);
            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            // $oauth->redirect()->send();
        }
         $user = $wechat_user['original'];
         $openid = $user['openid'];
        $nickname = $user['nickname'];
        $sex = $user['sex'];
        $province = $user['province'];
        $city = $user['city'];
        $headimgurl = $user['headimgurl'];
        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
        $service_user = (array)$service_user;
        
        
        if(empty($service_user)){
            //新增会员
            DB::transaction(function () use($openid,$nickname,$sex,$province,$city,$headimgurl){
                    $id = DB::table('service_users')->insertGetId(
    ['openid' => $openid, 'nickname' => $nickname
        , 'sex' => $sex
        , 'province' => $province
        , 'city' => $city
        , 'from' => 1
        , 'headimgurl' =>$headimgurl
        , 'pid' =>$id
                    ]
);
            $card_num = $id+12335678;
            DB::table('service_users')->where('id',  $id)
                 ->update(['card_num' => $card_num]);
           });
            
           echo "新增会员成功";
             
        }else{
           echo "会员已存在";
        }
        
    }
    //邀请到的好友注册回调
    //服务号授权回调
    public function oauth_callback(Request $request) {
    
        $code = $request->input('code');
       
        $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
             'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/mobile/recommend/oauth_callback', 
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
