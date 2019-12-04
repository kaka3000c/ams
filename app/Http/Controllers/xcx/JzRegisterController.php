<?php
//家政小程序 登录接口
namespace App\Http\Controllers\xcx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\wxBizDataCrypt;
use Illuminate\Support\Facades\DB;
//小程序注册接口

class JzRegisterController extends Controller
{
    //注册页面
    public function  index()
    {
       echo  phpinfo();
        die();
       //include_once "wxaaaCrypt.php";
      // $pc = new wxBizDataCrypt($appid, $session_key);
       //$errCode = $pc->decryptData($encryptedData, $iv, $data );

      // if ($errCode == 0) {
          // print($data . "\n");
       //} else {
          // print($errCode . "\n");
      // }
       
       
    }
    
    //注册行为
    public function  register(Request $request)
    {
       
       
       $appid = 'wx3bfabc9067d19645';
       $secret = '3b869ac0bfb9f3a6da9edfa8d1d0794b';
       
       $code = request('code');
       $encryptedData = request('encryptedData');
       $iv = request('iv');
       
       $url = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$secret.'&js_code='.$code.'&grant_type=authorization_code';
        //逻辑
       $info = file_get_contents($url);
       $json = json_decode($info);//对json数据解码

       $arr = get_object_vars($json);//返回一个数组。获取$json对象中的属性，组成一个数组
      
       $openid = $arr['openid'];
       $session_key = $arr['session_key']; 
       
       //解密数据包得到微信用户数据
       $pc = new wxBizDataCrypt($appid, $session_key);
       $errCode = $pc->decryptData($encryptedData, $iv, $data );

       if ($errCode == 0) {
          //打印出用户数据解密包
          // print($data . "\n");
          //$data['nickName']; 
           //$data['gender']; 
           //$data['city']; 
           //$data['province']; 
           //$data['country']; 
           //$data['avatarUrl']; 
           
       } else {
          // print($errCode . "\n");
       }
       $data = json_decode($data,true);
            
       //查找users表是否已存在openid
       $user_arr =  User::where('openid',$openid)->get();
       
       //服务器端增加session
       $session_id = 'session_'.time();
       
       if(empty($user_arr->toarray())){
           //如果openid不存在，则插进openid
           $User = new User;
           $User->openid = $openid;
           $User->session_key = $session_key;
           $User->session_id = $session_id;
           $User->nickName = $data['nickName']; 
           $User->gender = $data['gender']; 
           $User->city = $data['city']; 
           $User->province = $data['province']; 
           $User->country = $data['country']; 
           $User->avatarUrl = $data['avatarUrl']; 
           $User->save();
           
       }else{
           //更新时间
           User::where('openid', $openid)
           ->update(['updated_at' => date("Y-m-d h:i:s",time()),'session_id' => $session_id ]);
           
       }
       
       $result = array('openid' => $openid, 'session_key'=> $session_key ,'message'=> '成功' ,'encryptedData'=>$encryptedData ,'iv'=>$iv,
               'errCode'=>$errCode ,'data'=>$data ,'session_id'=> $session_id  ,'session_key'=> $session_key 
               );
       return json_encode($result);
        
        
         
    }
}
