<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use EasyWeChat\Factory;
class ArticleController extends Controller
{
    
    
    
    //文章列表
   public function list(Request $request)
    {   
        //文章列表
        $articel_list = DB::table('articles')->where('is_delete', 0)->select('title', 'article_id','image')->get()->toArray();
        foreach ($articel_list as $key => $value) {
            $articel_list[$key] = (array) $value;
        }
       
         return view('/mobile/article_list', [
             'articel_list' => $articel_list]);
         
    }
    
    //优惠频道
    public function promo(Request $request){
       
        //优惠文章列表
        $article_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '5'],
])->select('title', 'article_id','image')->orderBy('article_id', 'desc')->take(20)->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
      
        //用户发布的优惠信息
        $promo_list = DB::table('promo_infos')->where([['status', '=', '1'],['is_show', '=', '1'],
])->select('id','title','images','service_user_id')->orderBy('id', 'desc')->get()->toArray();
        foreach ($promo_list as $key => $value) {
            $promo_list[$key] = (array) $value;
            //根据service_user_id获取发布优惠信息的用户信息
            $service_user = DB::table('service_users')->where('id', $promo_list[$key]['service_user_id'])->first();
            $service_user = (array)$service_user;
            
            $promo_list[$key]['headimgurl'] = $service_user['headimgurl'];
        }
        
        
        
        
         return view('/mobile/promo_list', [
             'article_list' => $article_list,'promo_list' => $promo_list]);
         
    }
    
    
    public function detail(Request $request,$id){
        
       
        //  读取公众号用户信息
        $wechat_user = $request->session()->get('wechat_user');
        
        // 未登录就跳转申请授权
        if (empty($wechat_user)) {
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
        
            $request->session()->put('target_url', '/mobile/login');
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
        , 'created_at' =>date("Y-m-d H:i:s",time()+8*60*60)
                    ]
);
            //$card_num = $id+12335678;
           // DB::table('service_users')->where('id',  $id)
             //    ->update(['card_num' => $card_num]);
           });
            
            
           
        }else{
            DB::table('service_users')->where('openid',  $user['openid'])
                 ->update(['updated_at' => date("Y-m-d H:i:s",time()+8*60*60)]);
        }
        
        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
        $service_user = (array)$service_user;
         
        $request->session()->put('service_user_id', $service_user['id']);
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        
        //以上是调用微信openid，第一次登录会注册信息到数据库
        
         DB::table('articles')->where('article_id', $id)->increment('read_volume');
         
         $article = DB::table('articles')->where('article_id', $id)->first();
         
         $article = (array)$article;
         
         
        
         // 步骤1.设置appid和appsecret
        $appid = 'wx8c55f8bae39de381'; //此处填写绑定的微信公众号的appid
        $appsecret = '2f154e5f7925dffc1d6b449a9d7ae07e'; //此处填写绑定的微信公众号的密钥id

       

        // 步骤3.获取access_token
        $result = $this->http_get('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret);
        $json = json_decode($result,true);
        
        $access_token = $json['access_token'];


        // 步骤4.获取ticket
       $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$access_token";
        $res = json_decode ( $this->http_get ( $url ) );
        $ticket = $res->ticket;


        // 步骤5.生成wx.config需要的参数
        $surl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $ws = $this->getWxConfig( $ticket,$surl,time(),$this->nonceStr(16) );

       
         //头条文章列表
        $article_list = DB::table('articles')->where('is_delete', 0)->select('title', 'article_id','image')
                ->where([['article_id', '<>', $id],['cat_id','=','6'],])
                ->take(4)->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
         
        //优惠活动
         $promo_list = DB::table('articles')->where('is_delete', 0)->select('title', 'article_id','image')
                ->where([['article_id', '<>', $id],['cat_id','=','5'],])
                ->take(4)->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($promo_list as $key => $value) {
            $promo_list[$key] = (array) $value;
        }
        
        //本地店铺爆款
       
        $product_list = DB::table('products')->where([['is_on_sale', '=', '1'],
    ['is_popular', '=', '1'],
])->select('goods_name', 'pro_id','image')->take(4)->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
        //招聘信息
        $employ_list = DB::table('employs')->where('is_show', 1)->select('title', 'id')->where('id', '<>', $id)->take(4)->orderBy('id', 'desc')->get()->toArray();
        foreach ($employ_list as $key => $value) {
            $employ_list[$key] = (array) $value;
        }
       
         
          return view('/mobile/article_detail',['article_list' => $article_list,
              'promo_list' => $promo_list,'product_list' => $product_list,'employ_list' => $employ_list,
              'article' => $article,'ws' => $ws,'surl'=>$surl]);
    }
    
    
    public   function http_get($url){
                $oCurl = curl_init();
                if(stripos($url,"https://")!==FALSE){
                        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
                        curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
                }
                curl_setopt($oCurl, CURLOPT_URL, $url);
                curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
                $sContent = curl_exec($oCurl);
                $aStatus = curl_getinfo($oCurl);
                curl_close($oCurl);
                if(intval($aStatus["http_code"])==200){
                        return $sContent;
                }else{
                        return false;
                }
        }
    
        
    public     function getWxConfig($jsapiTicket,$url,$timestamp,$nonceStr) {
                $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
                $signature = sha1 ( $string );
                 $appid = 'wx8c55f8bae39de381'; //此处填写绑定的微信公众号的appid
                $WxConfig["appId"] = $appid;
                $WxConfig["nonceStr"] = $nonceStr;
                $WxConfig["timestamp"] = $timestamp;
                $WxConfig["url"] = $url;
                $WxConfig["signature"] = $signature;
                $WxConfig["rawString"] = $string;
                return $WxConfig;
        }
        
        public function nonceStr($length){
            
            
             $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJK1NGJBQRSTUVWXYZ';//随即串，62个字符
                $strlen = 62;
                while($length > $strlen){
                $str .= $str;
                $strlen += 62;
                }
                $str = str_shuffle($str);
                return substr($str,0,$length);
        }
}
