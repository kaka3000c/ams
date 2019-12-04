<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
use \App\OrderInfo;
use App\Cart;
class ProorderController extends Controller
{
    
    public function  insert(Request $request){
        
        $name = $request->session()->get('name');
        $user_id = $request->session()->get('user_id');
        
        $cart_product = Cart::where('user_id', $user_id)->get();
        $cart_product = $cart_product->toArray();
        
        
        
        //插入订单数据
        $Order = new Order;
        $Order->user_id = $user_id;
        $Order->save();
        
        //返回自增id
        $Order->id;
        
        //插入订单详情数据
        foreach ($cart_product as $k=>$v){
            
            $OrderInfo = new OrderInfo;
            $OrderInfo->order_id = $Order->id; 
            $OrderInfo->pro_id = $v['pro_id'];
            $OrderInfo->num = $v['num'];
            $OrderInfo->save(); 
            
        }
       
        
        //清空购物车
        Cart::where('user_id', $user_id)->delete();
        
       // $result = array('code' => 0,'message'=> '成功');
        //return json_encode($result);
    }
    
}
