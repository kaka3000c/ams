<?php

namespace App\Http\Controllers\xcx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Addre;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function  index()
   {  
        
   }
   
   
   public function  insert(Request $request)
    {
       
    }
    
    //我的收货地址
       public function  address(Request $request)
   {  
          $session_id = request('session_id');
          $user_arr = DB::table('users')->where('session_id', $session_id)->first();
          $user_arr = (array)$user_arr;
         
          
          $user_address  = DB::table('addres')->where('user_id', $user_arr['id'])->first();
          $user_address =  (array)$user_address;
       
          $result = array('status' => 0, 'message'=> '成功' ,'address'=> $user_address['address']);
          
          return json_encode($result);
   }
   
  //添加收货地址
   public function  address_insert(Request $request)
    {
          $session_id = request('session_id');
          $address = request('address');
         
          $user_arr = DB::table('users')->where('session_id', $session_id)->first();
          $user_arr = (array)$user_arr;
          
          if(!empty($user_arr)){
           
           DB::table('addres')->where('user_id', $user_arr['id']) ->update(['address' => $address]);
           
           }
           
           
          $result = array('status' => 0, 'message'=> '成功' ,'session_id'=> $session_id );
          
          return json_encode($result);
    }
}
