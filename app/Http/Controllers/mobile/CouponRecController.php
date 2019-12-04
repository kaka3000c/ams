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


// 优惠劵领取控制器
class CouponRecController extends Controller
{
    
    
    public function index(Request $request)
    {
        
    }
    
    //用户领取优惠劵
    public function receive(Request $request,$id)
    {
        //读取公众号用户信息
        $wechat_user = $request->session()->get('wechat_user');
        $user = $wechat_user['original'];
        
        $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
        $service_user = (array)$service_user;
        
        $coupon = DB::table('coupons')->where('coupon_id', $id)->first();
        $coupon = (array)$coupon;
        if ($coupon['coupon_number']>$coupon['coupon_amount']){
             $service_user_id = $service_user['id'];
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
                     ]
               ]);
             $s = $s && DB::table('coupons')->where('coupon_id',$id)->increment('coupon_amount');
             
             if($s){
                 DB::commit();
                 
             }else{
                 DB::rollBack();
                 
             }
               
               
             
              return view('/mobile/coupon_rec_success');
        }else{
              return view('/mobile/coupon_rec_fail');
            
        }
        
        die();
        
        
        
        
      
        
    }
    
}
