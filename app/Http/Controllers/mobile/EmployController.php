<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
use App\Employ;

class EmployController extends Controller
{
    
    
    
    //招聘信息
   public function index(Request $request)
    {   
        //文章列表
        $employ_list = DB::table('employs')->orderBy('id', 'desc')->get()->toArray();
        foreach ($employ_list as $key => $value) {
            $employ_list[$key] = (array) $value;
        }
       
         return view('/mobile/employ_list', [
             'employ_list' => $employ_list]);
         
    }
    
      public function detail (Request $request,$id){
        
         DB::table('employs')->where('id', $id)->increment('read_volume');
         
         $Employ = new Employ;
         $employ_detail = $Employ::find($id);
        
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
         
         
         //招聘列表
        $employ_list = DB::table('employs')->where('is_show', 1)->select('title', 'id')->where('id', '<>', $id)->take(6)->orderBy('id', 'desc')->get()->toArray();
        foreach ($employ_list as $key => $value) {
            $employ_list[$key] = (array) $value;
        }
        
         //二手房列表
        $second_house_list = DB::table('products')->where([['cat_id', '=', '36'],
  
])->take(4)->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($second_house_list as $key => $value) {
            $second_house_list[$key] = (array) $value;
        } 
            
        //新房列表
        $new_house_list = DB::table('products')->where([['cat_id', '=', '35'],
  
])->take(4)->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($new_house_list as $key => $value) {
            $new_house_list[$key] = (array) $value;
        }
        
          //租房列表
        $rent_house_list = DB::table('products')->where([['cat_id', '=', '37'],
  
])->take(4)->select('goods_name', 'pro_id','image')->orderBy('pro_id', 'desc')->get()->toArray();
        foreach ($rent_house_list as $key => $value) {
            $rent_house_list[$key] = (array) $value;
        }
        
         //头条文章列表
        $article_list = DB::table('articles')->where('is_delete', 0)->select('title', 'article_id','image')
                ->where([['article_id', '<>', $id],['cat_id','=','6'],])
                ->take(4)->orderBy('article_id', 'desc')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
         
         return view('/mobile/employ_detail',[
             'employ_list'=> $employ_list ,'employ_detail' => $employ_detail,'ws' => $ws,'surl'=>$surl
                  , 'new_house_list' => $new_house_list
                  , 'second_house_list' => $second_house_list
                , 'rent_house_list' => $rent_house_list
              , 'article_list' => $article_list]);
    }
    
    //发布招聘信息
     public function add(Request $request)
    {   
          return view('/mobile/employ_add');
         
    }
    
     //插入招聘信息
     public function insert(Request $request)
    {   
         
         //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');

        $title = $request->input('title');
        $content = $request->input('content');
        $contacts = $request->input('contacts');
        $mobile = $request->input('mobile');
        
        //上传图片
//         $file = $request->file('photo');//获取图片
//         $allowed_extensions = ["png", "jpg", "gif","jpeg","PNG", "JPG", "GIF","JPEG"];
//         if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
//            return response()->json([
//                'status' => false,
//                'message' => '只能上传 png | jpg | gif | jpeg 格式的图片'
//            ]);
//         }
//         
//        $destinationPath = '../storage/app/public/images/employ';
//        $extension = $file->getClientOriginalExtension();
//        $fileName = date("Ymd").str_random(10).'.'.$extension;
//        $file->move($destinationPath, $fileName);
        
        
        
        $Employ = new Employ;
        
        $Employ->title = $title;
        $Employ->content = $content;
        $Employ->contacts = $contacts;
        $Employ->mobile = $mobile;
        $Employ->is_show = 0;
        $Employ->type = 2;  //国企单位1,民营私企2
        $Employ->service_user_id = $service_user_id;
//        if ($request->hasFile('photo')) {
//            $Employ->images = "/storage/images/employ/" . $fileName;
//        }
        
        $Employ->save();
        
        
             $msg['text']="发布成功，管理员审核通过即显示!";
             $msg['url_link'] ="/mobile/index";
             
             return view('/mobile/msg', ['msg' => $msg]);
       
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
}
