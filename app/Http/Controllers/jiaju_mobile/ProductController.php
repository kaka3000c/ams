<?php

namespace App\Http\Controllers\jiaju_mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
class ProductController extends Controller
{
     public function detail(Request $request,$id)
    {
         echo $value = $request->session()->get('key');
        
         DB::table('products')->where('pro_id', $id)->increment('read_volume');
         $product_detail = DB::table('products')->where('pro_id', $id)->first();
         
         $product_detail = (array)$product_detail;
        
         
            $goods_name = $product_detail['goods_name'];
            $content =  $product_detail['content'];
            $shop_id = $product_detail['shop_id'];
            $image = $product_detail['image'];
            $is_sale = $product_detail['is_sale'];
         
        $shop_detail = Shop::where('shop_id', $shop_id)->get();
        
         // 步骤1.设置appid和appsecret
        $appid = 'wx8c55f8bae39de381'; //此处填写绑定的微信公众号的appid
        $appsecret = '2f154e5f7925dffc1d6b449a9d7ae07e'; //此处填写绑定的微信公众号的密钥id

        // 步骤2.生成签名的随机串
        function nonceStr($length){
                $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJK1NGJBQRSTUVWXYZ';//随即串，62个字符
                $strlen = 62;
                while($length > $strlen){
                $str .= $str;
                $strlen += 62;
                }
                $str = str_shuffle($str);
                return substr($str,0,$length);
        }

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
        $ws = $this->getWxConfig( $ticket,$surl,time(),nonceStr(16) );
        
        //爆款产品
        $product_list = DB::table('products')->where([['is_on_sale', '=', '1'],
    ['is_popular', '=', '1'],['pro_id', '<>', $id],
]
                )->whereIn('cat_id', [
    136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,
    161,162,163,164,165,166,167,168,169,170,171,172,173,174,175
    
])->select('goods_name', 'pro_id','image')
                
                ->take(8)->orderBy('pro_id', 'desc')->get()->toArray();
        
        foreach ($product_list as $key => $value) {
            $product_list[$key] = (array) $value;
        }
        
        
        
         //家居生活文章列表
        $article_list = DB::table('articles')->where('is_delete', 0)->select('title', 'article_id','image')
                ->where([['article_id', '<>', $id],['cat_id','=','18'],])
                ->take(4)->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
        
         return view('/jiaju_mobile/product_detail', 
                 ['product_detail' => $product_detail,
                     'product_list' => $product_list,
                     'shop_detail' => $shop_detail,
                    
                      'image'   =>  $image,
                     'goods_name'  =>  $goods_name,
                 'is_sale' => $is_sale,
                     'id' => $id
                ,'ws' => $ws,'surl'=>$surl
                 
              , 'article_list' => $article_list
                
                 ]);
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
        
    
    public function add(Request $request)
    {
             
         return view('/mobile/product_add');
    }
    
    
    public function insert(Request $request){
        
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');

        $goods_name = $request->input('goods_name');
        $content = $request->input('content');
       
        
        //上传图片
         $file = $request->file('photo');//获取图片
         $allowed_extensions = ["png", "jpg", "gif","jpeg","PNG", "JPG", "GIF","JPEG"];
         if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return response()->json([
                'status' => false,
                'message' => '只能上传 png | jpg | gif | jpeg 格式的图片'
            ]);
         }
         
        $destinationPath = '../storage/app/public/images/product';
        $extension = $file->getClientOriginalExtension();
        $fileName = date("Ymd").str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        
        
        
        $Product = new Product;
        
        $Product->goods_name = $goods_name;
        $Product->content = $content;
        $Product->is_popular = 1;
        $Product->is_on_sale = 0;
        $Product->read_volume = 0;
        if ($request->hasFile('photo')) {
            $Product->image = "/storage/images/product/" . $fileName;
        }
        
        $Product->save();
        
        
        $msg['text']="发布成功,请等待管理员审核";
        $msg['url_link'] ="/mobile/index";
             
        return view('/mobile/msg', ['msg' => $msg]);
    }
}
