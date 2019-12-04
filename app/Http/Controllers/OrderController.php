<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
class OrderController extends Controller
{
    public function  insert(Request $request){
        
        $session_id = $request->input('session_id');
        
        
       
        $userName = $request->input('username');
        $mobile = $request->input('mobile');
        $productId = $request->input('pro_id');
        $remarks = $request->input('remarks');
        
        
        $Order = new Order;
         
            $Order->username = $userName;
            $Order->pro_id = $productId;
            $Order->phone = $mobile;
            $Order->remarks = $remarks;
            $Order->save();
       echo "提交成功，等待客服处理";
    }
}
