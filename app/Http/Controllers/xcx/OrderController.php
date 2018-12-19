<?php

namespace App\Http\Controllers\xcx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Order;
class OrderController extends Controller
{
    public function  insert(Request $request){
        
        $session_id = $request->input('session_id');
        
        $user_arr = DB::table('users')->where('session_id', $session_id)->first();
        $user_arr = (array)$user_arr;
        
        
       
        $userName = $request->input('userName');
        $phone = $request->input('phone');
        $productId = $request->input('productId');
        $buynum = $request->input('buynum');
        $openid = $request->input('openid');
        
        $Order = new Order;
         
            $Order->username = $userName;
            $Order->pro_id = $productId;
            $Order->phone = $phone;
            $Order->user_id = $user_arr['id'] ;
            $Order->save();
            
       $result = array('code' => 0,'message'=> '成功', 'user'=> '666' );
        return json_encode($result);
    }
}
