<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\HotelOrder;
use App\HotelScoreOrder;
use Illuminate\Support\Facades\DB;

//饭店-积分兑换纪录

class HotelScoreOrderController extends Controller
{
    public function index(Request $request)
    {
       
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
       
    
        $hotel_score_order_list = DB::table('hotel_score_orders')->where('service_user_id',$service_user_id)->get()->toArray();
        
        
        
        
        foreach ($hotel_score_order_list as $key => $value) {
            $hotel_score_order_list[$key] = (array)$value;
        }
       
        return view('/mobile/HotelScoreOrder', ['hotel_score_order_list' => $hotel_score_order_list]);
    }
    
   
    
}
