<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
class OrderController extends Controller
{
    public function  insert(Request $request){
        
        $session_id = $request->input('session_id');
        
        
       
        $userName = $request->input('userName');
        $phone = $request->input('phone');
        $productId = $request->input('productId');
        $buynum = $request->input('buynum');
        $openid = $request->input('openid');
        
        $Order = new Order;
         
            $Order->username = $userName;
            $Order->pro_id = $productId;
            $Order->phone = $phone;
            $Order->save();
       $result = array('code' => 0,'message'=> '成功');
        return json_encode($result);
    }
}
