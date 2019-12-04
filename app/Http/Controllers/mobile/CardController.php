<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\ServiceUser;

use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;
//饭店-会员卡
class CardController extends Controller
{
    public function index(Request $request)
    {
         $service_user_id = $request->session()->get('service_user_id');
         
        //
         
         //echo "领取成功";
        
         return view('/mobile/card');
        
    }
    
    //领取会员卡
    public function receive(Request $request){
     
        $service_user_id = $request->session()->get('service_user_id');
         
         $realname = $request->input('realname');
         $mobile = $request->input('mobile');
          
         DB::table('service_users')->where('id', $service_user_id)
                 ->update(['auto_status' => 1,'realname' => $realname,'mobile' => $mobile]);
                 echo "领取成功";
    }
    
    
}
