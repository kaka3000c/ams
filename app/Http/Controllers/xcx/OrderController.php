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
        
        $product_arr = DB::table('products')->where('pro_id', $productId)->first();
        $product_arr = (array)$product_arr;
        
        $Order = new Order;
         
            $Order->username = $userName;
            $Order->pro_id = $productId;
            $Order->phone = $phone;
            $Order->user_id = $user_arr['id'] ;
            $Order->shop_id = $product_arr['shop_id'] ;
            $Order->goods_name = $product_arr['goods_name'] ;
            $Order->save();
            
       $result = array('code' => 0,'message'=> '成功', 'user'=> '666' );
        return json_encode($result);
    }
    
    //用户订单列表
     public function  index_json(Request $request){
         
        $session_id = $request->input('session_id');
        
        $user_arr = DB::table('users')->where('session_id', $session_id)->first();
        $user_arr = (array)$user_arr;
        
        $order_list = DB::table('orders')->where('user_id', $user_arr['id'])->get()->toArray();
        foreach ($order_list as $key => $value){
            $order_list[$key] = (array)$value;
        }
        $result = array('status' => 0,'message'=> '成功', 'order_list'=> $order_list );
        return json_encode($result);
        
         
     }
}
