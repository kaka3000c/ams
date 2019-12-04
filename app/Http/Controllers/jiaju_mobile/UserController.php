<?php

namespace App\Http\Controllers\jiaju_mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use App\Shop;
use EasyWeChat\Factory;

class UserController extends Controller {

    public function index(Request $request,$msg) {
       

        //读取公众号用户id
        $service_user_id = $request->session()->get('service_user_id');
        
        if (empty($service_user_id)) {

            return redirect("/jiaju_mobile/weixing_login");
        }
        
        $service_user = DB::table('service_users')->where('id',$service_user_id)->first();
        $service_user = (array)$service_user;
        
         
         return view('/jiaju_mobile/user', ['service_user' => $service_user , 'msg' => $msg , 'id' => $service_user['id'] ]);
    }

    public function insert(Request $request, $id) {

        //读取公众号用户id
        $service_user_id = $request->session()->get('service_user_id');

        
        
                
        

        $username = $request->input('username');
        $phone = $request->input('mobile');
        $address = $request->input('address');
        $remarks = $request->input('remarks');

        $order_id = $this->create_order_no();

        $Order = new Order;

        $Order->username = $username;
        $Order->pro_id = $id;
        $Order->phone = $phone;
        $Order->order_status = 0;
        $Order->address = $address;
        $Order->remarks = $remarks;
        $Order->order_sn = $order_id;
        $Order->service_user_id = $service_user_id;
        $Order->save();

        return view('/jiaju_mobile/order_success');
    }

    public function update(Request $request, $id) {

       
        $realname = $request->input('realname');
        $mobile = $request->input('mobile');
        $address = $request->input('address'); 
       
         DB::table('service_users')->where('id',  $id)
                 ->update(['realname' => $realname,'mobile' => $mobile,
                     'address' => $address,'updated_at' => date("Y-m-d h:i:s")]);
         
        echo "修改成功";
        
        return view('/jiaju_mobile/order_success');
    }
    
    public function success() {

        echo 3;
        return view('/jiaju_mobile/order_success');
    }

    //生成订单号
    public function create_order_no() {
        $order_no = date('Ymd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));
        return $order_no;
    }

}
