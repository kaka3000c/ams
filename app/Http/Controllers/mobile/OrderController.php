<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

            return redirect("mobile/weixing_login");
        }

        return view('/mobile/order', ['mobile' => $mobile, 'id' => $id]);
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

        return view('/mobile/order_success');
    }

    public function success() {

        echo 3;
        return view('/mobile/order_success');
    }

    //生成订单号
    public function create_order_no() {
        $order_no = date('Ymd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));
        return $order_no;
    }

}
