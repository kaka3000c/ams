<?php

namespace App\Http\Controllers\xcx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class CardController extends Controller
{

    public function  index()
    {
          $session_id = request('session_id');
          $user_arr =  User::where('session_id',$session_id)->get();
          $user_arr = $user_arr->toarray();
          
          $result = array('status' => 0, 'message'=> '成功' ,'realname'=> $user_arr[0]['realname'],'mobile_phone'=> $user_arr[0]['mobile_phone']);
          
          return json_encode($result);
          
    }
    
    public function  insert(Request $request)
    {
          $session_id = request('session_id');
          $realname = request('realname');
          $mobile_phone = request('mobile_phone');
          
          $user_arr =  User::where('session_id',$session_id)->get();
          if(!empty($user_arr->toarray())){
           
           //更新姓名和手机号码
           User::where('session_id', $session_id)
           ->update(['realname' => $realname , 'mobile_phone' => $mobile_phone]);
          
           }
           
          $result = array('status' => 0, 'message'=> '成功' ,'session_id'=> $session_id );
          
          return json_encode($result);
          
    }


}

