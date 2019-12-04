<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use Illuminate\Support\Facades\DB;



class ShopController extends Controller
{
    
    //商家详情
    public function index(Request $request,$id)
    {
        
         $Product = new Product;
         $product_list = $Product::where('is_delete', 0)->where('shop_id', $id)->orderBy('pro_id', 'desc')->get()->toArray();
         $product_list = (array)$product_list;
         
        //banner列表
        $shop_banner_list = DB::table('shop_banners')->where('enabled', 1)->where('shop_id', $id)->select('shop_banner_id', 'name','image')->orderBy('shop_banner_id', 'desc')->get()->toArray();
        foreach ($shop_banner_list as $key => $value) {
            $shop_banner_list[$key] = (array) $value;
        }
        
         
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
        // print_r($product_list);
        // foreach ($product_list as $key => $value) {
             //echo "</br>";
             //echo $product_list[$key]['shop_id'];
            //  echo "</br>";
             $shop_detail = Shop::where('shop_id', $id)->first()->toArray();
           //   print_r($shop_detail);
            //   echo "</br>";
              // $product_list[$key]['shop_name'] = $shop_detail['shop_name'];
             //  $product_list[$key]['address'] = $shop_detail['address'];
         //}
         
       
        return view('/mobile/shop',['product_list' => $product_list,
            'banner_list' => $shop_banner_list,
            'shop_detail' => $shop_detail,'ws' => $ws,'surl'=>$surl]);
    }
    
    //商家列表
   public function shop_list(Request $request)
    {   
       
          //商家列表
        $shop_list = DB::table('shops')->select('shop_id','shop_name', 'shop_logo','shop_brief')->where('shop_cat_id', 1)->get()->toArray();
        foreach ($shop_list as $key => $value) {
            $shop_list[$key] = (array) $value;
        }
        
         return view('/mobile/shop_list', ['shop_list' => $shop_list]);
         
    }
    
    //我的店铺
    public function myshop(Request $request)
    { 
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
         
         
         $service_user =  DB::table('service_users')->where('id',$service_user_id)->first();
         $service_user = (array)$service_user;
       
         
         $shop_id = $service_user['shop_id'];
         
         if(empty($shop_id)){
              
             $msg['text']="你的店铺还没开通";
             $msg['url_link'] ="/mobile/login/";
             return view('/mobile/msg', ['msg' => $msg]);
             
         }else{
             
             
              $product_list =  DB::table('products')->where('is_delete', 0)->where('shop_id', $shop_id)->orderBy('pro_id', 'desc')->get()->toArray();;
              
              
              $product_list = (array)$product_list;
              foreach ($product_list as $key => $value) {
                  $product_list[$key] = (array) $value;
               }
              
               $shop_detail = Shop::where('shop_id', $shop_id)->first()->toArray();
              
               
               return view('/mobile/myshop',['product_list' => $product_list,'shop_detail' => $shop_detail]);
        
         }
           
        
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
