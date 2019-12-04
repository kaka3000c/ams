<?php

namespace App\Http\Controllers\jiaju_mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Shop;
use App\Banner;
use App\User;
use App\ServiceUser;
use App\Coupon;

use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;

// 茂名家居网登录类
class LoginController extends Controller
{
    
    //服务号授权登录值得买
    public function index(Request $request)
    {
        
        $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/jiaju_mobile/oauth_callback', 
            ],
        ];
         
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;
        
        //读取公众号用户信息
        $wechat_user = $request->session()->get('wechat_user');
        
        // 未登录就跳转申请授权
        if (empty($wechat_user)) {
            
            $request->session()->put('target_url', '/jiaju_mobile/login');
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
        
       
        
        //新增会员或更新会员，更新时间
        if(empty($service_user)){
            
            DB::transaction(function () use($openid,$nickname,$sex,$province,$city,$headimgurl){
                    $id = DB::table('service_users')->insertGetId(
    ['openid' => $openid, 'nickname' => $nickname
        , 'sex' => $sex
        , 'province' => $province
        , 'city' => $city
        , 'from' => 1
        , 'headimgurl' =>$headimgurl
                    ]
);
            $card_num = $id+12335678;
            DB::table('service_users')->where('id',  $id)
                 ->update(['card_num' => $card_num]);
           });
            
            
             
        }else{
            DB::table('service_users')->where('openid',  $user['openid'])
                 ->update(['updated_at' => date("Y-m-d h:i:s")]);
        }
        
        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
        $service_user = (array)$service_user;
         
        $request->session()->put('service_user_id', $service_user['id']);
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        
        
        //读取优惠劵
        $coupon_list = DB::table('coupons')->where('coupon_status', 1)
                ->whereColumn('coupon_number', '>','coupon_amount')
                ->where('coupon_start_period', '<=' ,date('Y-m-d'))
                ->where('coupon_end_period', '>=' ,date('Y-m-d'))
                ->select('coupon_id','coupon_name','coupon_money','full_money'
                        ,'coupon_start_period','coupon_end_period'
                        )->limit(3)->get()->toArray();
        
        
         foreach ($coupon_list as $key => $value) {
             $coupon_list[$key] = (array)$value;
             //判断优惠劵用户是否已经领取
             $rec = DB::table('coupon_receives')->where(
                     [
    ['coupon_id', '=', $coupon_list[$key]['coupon_id']],
    ['service_user_id', '=', $service_user['id']],
                     ]
                      )->get()->toArray();
             if(empty($rec)){
                 $coupon_list[$key]['rec'] = 0;
             }else{
                  $coupon_list[$key]['rec'] = 1;
             }
         }
        
        $Banner = new Banner;
        $banner_list = $Banner::where([['position_id', '=', '2'],['enabled', '=', '1'],
])->orderBy('banner_id', 'desc')->get();
        
        return view('/jiaju_mobile/user_center',['headimgurl' => $user['headimgurl'],
            'nickname' => $user['nickname'],'coupon_list'=> $coupon_list,'banner_list' => $banner_list,
                ]);
    }
    
    
    //服务号授权回调
    public function oauth_callback(Request $request) {
    
        $code = $request->input('code');
       if (empty($code))   //不用说 通过empty函数判断code是否设置值，没有从小跳转微信code获取页面或逻辑页面
        {
         return  redirect("/jiaju_mobile/index");  //我这里跳转的是逻辑页面，视为code不存在视为不合法访问，因为正常访问不会出现没有code。
           
       }
        $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
             'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/jiaju_mobile/oauth_callback', 
            ],
        ];

        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

//        // 获取 OAuth 授权结果用户信息
         $user = $oauth->user();
          //var_dump($user);
         

         $request->session()->put('wechat_user', $user->toArray());
         $targetUrl = $request->session()->get('target_url');
     
         $targetUrl = empty($targetUrl) ? '/' : $targetUrl;
        
          header('location:' . $targetUrl); // 跳转到 user/profile 
          
          
    }
//     public function login(Request $request)
//    {
//        
//        
//            $mobile = $request->input('mobile');
//            $password = $request->input('password');
//            $password = md5($password);
//         $user = DB::table('users')->where('mobile_phone',$mobile)->where('password',$password)->first();
//         $user = (array)$user;
//        
//           if(empty($user)){
//               return redirect('/mobile/login')
//               ->withErrors(['登录失败，请重新登录！']);
//           }else{
//                $request->session()->put('mobile', $mobile);
//               return redirect('/mobile/user_center');
//           }
//         
//         
//         
//         
//    }
    
     //登出行为
    public function  logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/mobile/index');
    }
    
    public function weixing_login(Request $request){
        
        return view('/mobile/weixing_login');
    }
    
}
