<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\ServiceUser;
use App\HotelScoreProduct;
use App\HotelScoreOrder;
use Illuminate\Support\Facades\DB;
//饭店-积分商城

class HotelScoreProductController extends Controller
{
    
    //兑换商城首页
    public function index(Request $request)
    {
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');
        
        $Product = new HotelScoreProduct;
        
        $product_list = $Product::where('is_delete', 0)->orderBy('pro_id', 'desc')->get()->toArray();
         
        $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
        $service_user = (array)$service_user; 
       
         
         
        return view('/mobile/HotelScoreProduct',['product_list' => $product_list,'service_user'=>$service_user]);
    }
    
    //兑换商品详情
    public function detail(Request $request,$id){
        
        $product = DB::table('hotel_score_products')->where('pro_id',$id)->first();
        $product = (array)$product;
        
        return view('/mobile/HotelScoreProductDetail',['product' => $product]);
        
    }
    
    //兑换商品
    public function exchange(Request $request){
        
        
        
        $pro_id = $request->input('pro_id');
        
        
        //查询出该商品所需消耗多少积分
        $product = DB::table('hotel_score_products')->where('pro_id',$pro_id)->first();
        $product = (array)$product;
        
        $exchange_points = $product['exchange_points'];
        $image = $product['image'];
        $goods_name = $product['goods_name'];
         
        //session读取service_user_id
         //判断公众号是否登录
         $service_user_id = $request->session()->get('service_user_id');
         
         $service_users = DB::table('service_users')->where('id',$service_user_id)->first();
         $service_users = (array)$service_users;
         
         //如果账户剩余积分大于或等于要扣除的积分
         if($service_users['score'] >= $exchange_points)
         {
          
             DB::beginTransaction();
             
             //扣除用户账户相应的积分
             $s1 =  DB::table('service_users')->where('id',$service_user_id)->decrement('score',$exchange_points);
             
             //生成兑换商品的订单
             $s2 =  DB::table('hotel_score_orders')->insert(
                ['service_user_id' => $service_user_id, 'pro_id' => $pro_id ,'exchange_points' =>  $exchange_points
                     ,'image' =>  $image,'goods_name' =>  $goods_name]
             );
             //生成兑换商品积分纪录
//             $s3 =  DB::table('hotel_scorce_logs')->insert(
//                ['service_user_id' => $service_user_id, 'pro_id' => $pro_id ,'del_scorce' =>  $exchange_points]
//             );

             $s =  $s1 && $s2;
             if($s){
                 DB::commit();
                 $result = array('status' => 1, 'msg' => "兑换成功");
	         $result = json_encode($result);
                 return $result;
             }else{
                 DB::rollBack();
                 $result = array('status' => 2, 'msg' => "兑换失败");
	         $result = json_encode($result);
                 return $result;
             }
         }else{
                 $result = array('status' => 0, 'msg' => "积分不足，兑换失败");
	         $result = json_encode($result);
                 return $result;
         }
         
        $result = array('status' => 1, 'msg' => "兑换失败");
	$result = json_encode($result);

        return $result;
    }
    
}
