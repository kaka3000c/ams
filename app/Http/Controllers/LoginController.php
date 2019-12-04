<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use EasyWeChat\Factory;

class LoginController extends Controller
{
     //登录页面
    public function  index(Request $request)
    {
        
        
         return view('login.index');
      
    }
    
    //登录行为
    public function  login(Request $request)
    {
         $name = request('username');
         $password = request('password');
         $posts =  User::where('name', $name)->where('password', $password)->get();
      
      if(!empty($posts->toArray())){
          
          $user_array = $posts->toArray();
          print_r($user_array);
          echo $user_array[0]['id'];
          $request->session()->put('name', $name);
          
          $request->session()->put('user_id',$user_array[0]['id']);
          return redirect('/index');
          
      }else{
          return redirect('/login');
      }
         
    }
    
    public function  weixing_login(Request $request){
//        $redirect_url="http://www.0668zdm.com/Callback";
//        $redirect_url=urlencode($redirect_url);//该回调需要url编码
//        $appID="wx8c55f8bae39de381";
//        $scope="snsapi_login";//写死，微信暂时只支持这个值
//        //准备向微信发请求
//        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appID."&redirect_uri=".$redirect_url
//."&response_type=code&scope=".$scope."&state=STATE#wechat_redirect";
//        //$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appID.'&redirect_url='.$redirect_url.'&response_type=code&scope=snsapi_login&state=YQJ#wechat_redirect';
////请求返回的结果(实际上是个html的字符串)
//        $result = file_get_contents($url);
//        //替换图片的src才能显示二维码
//        $result = str_replace("/connect/qrcode/", "https://open.weixin.qq.com/connect/qrcode/", $result);
//        print_r($result);
       // return $result; //返回页面
        
        return view('login');
    }

    public function Callback(Request $request){
        
    }

    //登出行为
    public function  logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/index');
    }
    
}
