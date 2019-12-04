<?php

namespace App\Http\Controllers\mobile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\User;
use App\ServiceUser;
use App\Coupon;
use App\CouponReceives;
use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;

//饭店优惠劵
// 优惠劵领取控制器
class HotelCouponRecController extends Controller
{
    
    
    public function index(Request $request)
    {
        
        //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
        
        //读取优惠劵
        $coupon_list = DB::table('coupons')->where('coupon_status', 1)
                ->whereColumn('coupon_number', '>','coupon_amount')
                ->where('coupon_start_period', '<=' ,date('Y-m-d'))
                ->where('coupon_end_period', '>=' ,date('Y-m-d'))
                ->select('coupon_id','coupon_name','coupon_money','full_money'
                        ,'coupon_start_period','coupon_end_period'
                        )->limit(3)->get()->toArray();
        
        
         foreach ($coupon_list as $key => $value) {
             $coupon_list[$key] = (array)$value;
             //判断优惠劵用户是否已经领取
             $rec = DB::table('coupon_receives')->where(
                     [
    ['coupon_id', '=', $coupon_list[$key]['coupon_id']],
    ['service_user_id', '=', $service_user_id],
                     ]
                      )->get()->toArray();
             if(empty($rec)){
                 $coupon_list[$key]['rec'] = 0;
             }else{
                  $coupon_list[$key]['rec'] = 1;
             }
         }
        
        
         return view('/mobile/HotelCouponRec',['coupon_list'=> $coupon_list]);
    }
    
    //用户领取优惠劵
    public function receive(Request $request,$id)
    {
        
        
        
        //读取公众号用户信息
//        $wechat_user = $request->session()->get('wechat_user');
//        $user = $wechat_user['original'];
//        
//        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
//        $service_user = (array)$service_user;
        
        $service_user_id = $request->session()->get('service_user_id');
        
        $coupon = DB::table('coupons')->where('coupon_id', $id)->first();
        $coupon = (array)$coupon;
        if ($coupon['coupon_number']>$coupon['coupon_amount']){
            
              //开启事务
//            DB::transaction(function ()use($id,$service_user_id) {
//               //用户领取优惠劵
//               DB::table('coupon_receives')->insert([   
//                  ['coupon_id' => $id, 'service_user_id' => $service_user_id]
//               ]);
//            
//               //优惠劵已领取数+1
//               DB::table('coupons')->where('coupon_id',$id)->increment('coupon_amount');
//            }); 
                //开启事务
            DB::beginTransaction();
             $s =  DB::table('coupon_receives')->insert([   
                  ['coupon_id' => $id, 'service_user_id' => $service_user_id
                     , 'coupon_money' => $coupon['coupon_money']
                     , 'full_money' => $coupon['full_money']
                     , 'coupon_name' => $coupon['coupon_name']
                     , 'coupon_start_time' => $coupon['coupon_start_time']
                     , 'coupon_end_time' => $coupon['coupon_end_time']
                     , 'coupon_start_period' => $coupon['coupon_start_period']
                     , 'coupon_end_period' => $coupon['coupon_end_period']
                     ]
               ]);
             $s = $s && DB::table('coupons')->where('coupon_id',$id)->increment('coupon_amount');
             
             if($s){
                 DB::commit();
                  $result = array('status' => 1, 'msg' => "领取成功");
	          $result = json_encode($result);
                  return $result;
                 
             }else{
                 DB::rollBack();
                 $result = array('status' => 0, 'msg' => "领取失败");
	          $result = json_encode($result);
                  return $result;
             }
               
               
             
             
        }else{
            $result = array('status' => 0, 'msg' => "你来晚了，已派发完毕。");
	    $result = json_encode($result);
            return $result;
            
        }
        
        
        
      
        
    }
    
    //我的优惠劵
    public function MyCoupon(Request $request)
    {
        
         //读取service_users表的id，存为service_user_id
         $service_user_id = $request->session()->get('service_user_id');
        
        //读取优惠劵
        $coupon_list = DB::table('coupons')->where('coupon_status', 1)
                ->whereColumn('coupon_number', '>=','coupon_amount')
                ->where('coupon_start_period', '<=' ,date('Y-m-d'))
                ->where('coupon_end_period', '>=' ,date('Y-m-d'))
                ->select('coupon_id','coupon_name','coupon_money','full_money'
                        ,'coupon_start_period','coupon_end_period'
                        )->get()->toArray();
        
        
         foreach ($coupon_list as $key => $value) {
             $coupon_list[$key] = (array)$value;
             //判断优惠劵用户是否已经领取
             $rec = DB::table('coupon_receives')->where(
                     [
    ['coupon_id', '=', $coupon_list[$key]['coupon_id']],
    ['service_user_id', '=', $service_user_id]
                     ]
                      )->first();
             $rec= (array)$rec;
             
             if(empty($rec)){
                 $coupon_list[$key]['rec'] = 0;
                 
             }else{
                  $coupon_list[$key]['rec'] = 1;
                  $coupon_list[$key]['receive_status'] = $rec['receive_status'];
             }
             
           
         }
       
         return view('/mobile/mycoupon',['coupon_list'=> $coupon_list]);
    }
    
}
