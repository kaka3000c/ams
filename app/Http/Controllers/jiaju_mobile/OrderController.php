<?php

namespace App\Http\Controllers\jiaju_mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use App\Shop;
use EasyWeChat\Factory;

class OrderController extends Controller {

    public function index(Request $request, $id) {
        $mobile = $request->session()->get('mobile');

        //读取公众号用户id
        $service_user_id = $request->session()->get('service_user_id');
        
        if (empty($service_user_id)) {

            return redirect("/jiaju_mobile/weixing_login");
        }
        
        $service_user = DB::table('service_users')->where('id',$service_user_id)->first();
        $service_user = (array)$service_user;
        
         if (empty($service_user['realname'])){
                 $msg= '请填写真实姓名';
                  return redirect("/jiaju_mobile/user/$msg");
            
         }
          if (empty($service_user['mobile'])){
                  $msg= '请填写让手机号码';
                  return redirect("/jiaju_mobile/user/$msg");
            
         }
         
         return view('/jiaju_mobile/order', ['mobile' => $mobile, 'id' => $id , 'service_user' => $service_user]);
    }

    public function insert(Request $request, $id) {

        //读取公众号用户id
        $service_user_id = $request->session()->get('service_user_id');

        
        $username = $request->input('username');
        $phone = $request->input('mobile');
        $address = $request->input('address');
        $remarks = $request->input('remarks');
        $buynum = $request->input('buynum');
        
        
        $order_id = $this->create_order_no();
       
        $product_detail = DB::table('products')->where('pro_id', $id)->first();
        $product_detail = (array)$product_detail;
        
        if($buynum > $product_detail['goods_number']){
            
          
            
            if($product_detail['goods_number'] <= 0 ){
               $msg['text'] = "已经卖光了，欢迎下次再来!";
               $msg['url_link'] = "http://www.0668jjw.cn/jiaju_mobile/product/detail/".$id;
               return view('/jiaju_mobile/msg', ['msg' => $msg]); 
            }
            
              
               $msg['text'] = "仅剩下".$product_detail['goods_number']."件，请修改购买数理重新提交！";
               $msg['url_link'] = "http://www.0668jjw.cn/jiaju_mobile/product/detail/".$id;

               return view('/jiaju_mobile/msg', ['msg' => $msg]); 
            
        }
       
        
        $Order = new Order;
        $Order->username = $username;
        $Order->pro_id = $id;
        $Order->phone = $phone;
        $Order->order_status = 0;
        $Order->address = $address;
        $Order->remarks = $remarks;
        $Order->order_sn = $order_id;
        $Order->service_user_id = $service_user_id;
        $Order->goods_name = $product_detail['goods_name'];
        $Order->goods_img = $product_detail['image'];
        $Order->buynum = $buynum;
        $Order->price = $product_detail['shop_price'];
        $Order->total_price = $product_detail['shop_price'];
        $Order->created_at = date("Y-m-d H:i:s",time()+28800);
        $Order->save();
        
        //修改库存
        $leftover =  $product_detail['goods_number'] - $buynum;
        DB::table('products')->where('pro_id', $id)->update(['goods_number' => $leftover ]);
        
        return view('/jiaju_mobile/order_success');
    }

     
    public function success() {

        echo 3;
        return view('/jiaju_mobile/order_success');
    }
    
     public function myorder(Request $request) {
      
         //读取公众号用户id
        $service_user_id = $request->session()->get('service_user_id');
        
        //我的订单列表
        $order_list = DB::table('orders')->where('service_user_id',$service_user_id)->select('order_id', 'order_sn','pro_id','goods_img','goods_name','price','buynum','total_price')->orderBy('order_id', 'desc')->get()->toArray();
        foreach ($order_list as $key => $value) {
            $order_list[$key] = (array) $value;
        }
        
        
        return view('/jiaju_mobile/myorder', ['order_list' => $order_list]);
    }
    
    //订单详情
      public function detail(Request $request,$id) {
          
      }
    //生成订单号
    public function create_order_no() {
        $order_no = date('Ymd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));
        return $order_no;
    }

}
