<?php

namespace App\Http\Controllers\mobile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Address;
use App\ServiceUser;
use Illuminate\Support\Facades\DB;

//收货地址
class AddressController extends Controller
{
    public function index(Request $request)
    {
         //读取公众号用户信息
       $wechat_user = $request->session()->get('wechat_user');
       
        
        $user = $wechat_user['original'];
         
        
       $service_user = DB::table('service_users')->where('openid', $user['openid'])->first();
       $service_user = (array)$service_user;
       
        $service_user_id = $service_user['id'];
      
        $address = DB::table('addres')->where('service_user_id', $service_user_id)->get()->toArray();
         foreach ($address as $key => $value) {
             $address[$key] = (array)$value;
         }
        
        
        
        return view('/mobile/address', ['address_list' => $address]);
    }
    
    public function detail(Request $request,$id)
    {
         //读取公众号用户信息
        $wechat_user = $request->session()->get('wechat_user');
        
        $user = $wechat_user['original'];
        
         return view('/mobile/address_detail');
    }
    
    //添加地址
    public function add(Request $request)
    {
         
         return view('/mobile/address_add');
    }
    
}
