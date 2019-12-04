<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use EasyWeChat\Factory;


class IndexController extends Controller
{
    public function index(Request $request)
    {
        
         
        
//        //读取公众号用户信息
//        $wechat_user = $request->session()->get('wechat_user');
//        
//        // 未登录就跳转申请授权
//        if (empty($wechat_user)) {
//            $config = [
//            'app_id' => 'wx8c55f8bae39de381',
//            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
//            'token' => 'Bkv9UeSnUjOqWM0',
//            'response_type' => 'array',
//            'oauth' => [
//                'scopes' => ['snsapi_userinfo'],
//                'callback' => '/mobile/oauth_callback', 
//            ],
//        ];
//         
//        $app = Factory::officialAccount($config);
//        $oauth = $app->oauth;
//        
//            $request->session()->put('target_url', '/mobile/login');
//            return $oauth->redirect();
//            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
//            // $oauth->redirect()->send();
//        }
//
//       
//        $user = $wechat_user['original'];
//        $openid = $user['openid'];
//        $nickname = $user['nickname'];
//        $sex = $user['sex'];
//        $province = $user['province'];
//        $city = $user['city'];
//        $headimgurl = $user['headimgurl'];
//        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
//        $service_user = (array)$service_user;
//        
//       
//        
//        //新增会员或更新会员，更新时间
//        if(empty($service_user)){
//            
//            DB::transaction(function () use($openid,$nickname,$sex,$province,$city,$headimgurl){
//                    $id = DB::table('service_users')->insertGetId(
//    ['openid' => $openid, 'nickname' => $nickname
//        , 'sex' => $sex
//        , 'province' => $province
//        , 'city' => $city
//        , 'from' => 1
//        , 'headimgurl' =>$headimgurl
//                    ]
//);
//            //$card_num = $id+12335678;
//           // DB::table('service_users')->where('id',  $id)
//             //    ->update(['card_num' => $card_num]);
//           });
//            
//            
//             
//        }else{
//            DB::table('service_users')->where('openid',  $user['openid'])
//                 ->update(['updated_at' => date("Y-m-d h:i:s")]);
//        }
        
//        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
//        $service_user = (array)$service_user;
//         
//        $request->session()->put('service_user_id', $service_user['id']);
//        //读取service_users表的id，存为service_user_id
//        $service_user_id = $request->session()->get('service_user_id');
         
         $Banner = new Banner;
         $banner_list = $Banner::where([
    ['position_id', '=', '1'],
    ['enabled', '=', '1'],
])->orderBy('banner_id', 'desc')->get();
         
         //文章列表
        $article_list = DB::table('articles')->where('is_delete', 0)->select('title', 'article_id','image')->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
        
        return view('/mobile/index',['banner_list' => $banner_list,'article_list' => $article_list]);
    }
    
    
    
}
