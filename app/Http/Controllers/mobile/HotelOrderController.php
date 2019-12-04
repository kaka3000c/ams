<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\HotelOrder;
use App\CouponReceives;
use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

//饭店-饭店订单中心//饭店-饭店订单中心

class HotelOrderController extends Controller {

    //用户订单列表
    public function index(Request $request, $id) {
        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');

        if ($id == 10) {
            $hotel_order_list = DB::table('hotel_orders')->where('service_user_id', $service_user_id)->get()->toArray();
        } else {

            $hotel_order_list = DB::table('hotel_orders')
                            ->where('service_user_id', $service_user_id)->where('order_status', $id)->get()->toArray();
        }



        foreach ($hotel_order_list as $key => $value) {
            $hotel_order_list[$key] = (array) $value;
        }

        return view('/mobile/MyHotelOrder', ['hotel_order_list' => $hotel_order_list]);
    }

    //生成订单
    public function ConfirmHotelOrder(Request $request) {

        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');


        $pro_id = $request->input('pro_id');
        $goods_name = $request->input('goods_name');
        $shop_price = $request->input('shop_price');
        $image = $request->input('image');

        //读取领取到的优惠劵
        $coupon_receives_list = DB::table('coupon_receives')->where('service_user_id', $service_user_id)
                        ->where('receive_status', 0)
                        ->get()->toArray();

        foreach ($coupon_receives_list as $key => $value) {

            $coupon_receives_list[$key] = (array) $value;
        }

        return view('/mobile/ConfirmHotelOrder', ['pro_id' => $pro_id
            , 'goods_name' => $goods_name, 'shop_price' => $shop_price, 'image' => $image
            , 'coupon_receives_list' => $coupon_receives_list]);
    }

    //提交订单
    public function insert(Request $request) {


        //读取service_users表的id，存为service_user_id
        $service_user_id = $request->session()->get('service_user_id');

        $receive_id = $request->input('receive_id');
        $pro_id = $request->input('pro_id');
        $goods_name = $request->input('goods_name');
        $shop_price = $request->input('shop_price');
        $image = $request->input('image');
        $buynum = $request->input('buynum');
        if (empty($buynum)) {
            $buynum = 1;
        }
        //计算总价
        $total_price = $shop_price * $buynum;
        $order_sn = $this->create_order_no();
        //无优惠支付
        if (empty($receive_id)) {

            $pay_price = $total_price;

            $HotelOrder = new HotelOrder;
            $HotelOrder->service_user_id = $service_user_id;
            $HotelOrder->pro_id = $pro_id;
            $HotelOrder->goods_name = $goods_name;
            $HotelOrder->image = $image;
            $HotelOrder->buynum = $buynum;
            $HotelOrder->shop_price = $shop_price;
            $HotelOrder->total_price = $total_price;
            $HotelOrder->discount_price = 0;
            $HotelOrder->pay_price = $pay_price;
            $HotelOrder->order_sn = $order_sn;
            $result = $HotelOrder->save();
            $config = [
                // 必要配置
                'app_id' => 'wx8c55f8bae39de381',
                'mch_id' => '1522618281',
                'key' => 'SUYIeonvls138968763ABOkglaybvnck', // API 密钥
                // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
                'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
                'key_path' => 'path/to/your/key', // XXX: 绝对路径！！！！
                'notify_url' => 'http://www.0668zdm.com/mobile/hotelorder/wechat_notify', // 你也可以在下单时单独设置来想覆盖它
            ];
            $app = Factory::payment($config);
            $result = $app->order->unify([
                'body' => '腾讯充值中心-QQ会员充值',
                'out_trade_no' => $order_sn,
                'total_fee' => 1,
                'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
                'notify_url' => 'http://www.0668zdm.com/mobile/hotelorder/wechat_notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
                'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
                'openid' => 'oJRax59Y5hcN5C7DcRr5exUNP--c',
            ]);

            $prepayId = $result['prepay_id'];
            $payment = Factory::payment($config);

            $jssdk = $payment->jssdk;
            $json = $jssdk->bridgeConfig($prepayId);
            return view('/mobile/HotelPay', ['json' => $json, 'goods_name' => $goods_name
                , 'image' => $image
                , 'buynum' => $buynum
                , 'shop_price' => $shop_price
                , 'pro_id' => $pro_id
                , 'pay_price' => $pay_price
            ]);

            echo "订单提交成功";
        } else {
            //有优惠支付 
            $coupon_receive = DB::table('coupon_receives')->where('receive_id', $receive_id)->first();
            $coupon_receive = (array) $coupon_receive;


            //获得优惠价格
            $discount_price = $coupon_receive['coupon_money'];

            $pay_price = $total_price - $discount_price;

            //开启事务


            $HotelOrder = new HotelOrder;
            $HotelOrder->service_user_id = $service_user_id;
            $HotelOrder->pro_id = $pro_id;
            $HotelOrder->goods_name = $goods_name;
            $HotelOrder->image = $image;
            $HotelOrder->buynum = $buynum;
            $HotelOrder->coupon_receive_id = $receive_id;
            $HotelOrder->shop_price = $shop_price;
            $HotelOrder->total_price = $total_price;
            $HotelOrder->discount_price = $discount_price;
            $HotelOrder->pay_price = $pay_price;
            $HotelOrder->order_sn = $order_sn;
            $HotelOrder->save();
            $config = [
                // 必要配置
                'app_id' => 'wx8c55f8bae39de381',
                'mch_id' => '1522618281',
                'key' => 'SUYIeonvls138968763ABOkglaybvnck', // API 密钥
                // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
                'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
                'key_path' => 'path/to/your/key', // XXX: 绝对路径！！！！
                'notify_url' => 'http://www.0668zdm.com/mobile/hotelorder/wechat_notify', // 你也可以在下单时单独设置来想覆盖它
            ];
            $app = Factory::payment($config);
            $result = $app->order->unify([
                'body' => '腾讯充值中心-QQ会员充值',
                'out_trade_no' => $order_sn,
                'total_fee' => 1,
                'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
                'notify_url' => 'http://www.0668zdm.com/mobile/hotelorder/wechat_notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
                'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
                'openid' => 'oJRax59Y5hcN5C7DcRr5exUNP--c',
            ]);

            $prepayId = $result['prepay_id'];
            $payment = Factory::payment($config);

            $jssdk = $payment->jssdk;
            $json = $jssdk->bridgeConfig($prepayId);
            return view('/mobile/HotelPay', ['json' => $json, 'goods_name' => $goods_name
                , 'image' => $image
                , 'buynum' => $buynum
                , 'shop_price' => $shop_price
                , 'pro_id' => $pro_id
                , 'pay_price' => $pay_price
            ]);

            echo "订单提交成功";
        }
    }

    //提交支付
    public function pay(Request $request) {
        
    }

    //微信支付回调成功
    public function wechat_notify(Request $request) {
        $config = config('wechat_pay');

        $app = Factory::payment($config);
        $response = $app->handlePaidNotify(function ($message, $fail) {

            Log::info($message);

            //修改订单状态为待发货
            //开启事务
            DB::beginTransaction();
            $s = DB::table('hotel_orders')->where('order_sn', $message['out_trade_no'])->update(['order_status' => 1]);

            $hotel_orders = DB::table('hotel_orders')->where('order_sn', $message['out_trade_no'])->first();
            $hotel_orders = (array) $hotel_orders;
            
            //如果该订单存在优惠支付
            if (empty($hotel_orders['coupon_receive_id'])) {
                if ($s) {

                    DB::commit();
                    return true;
                } else {
                    DB::rollBack();
                }
            } else {

                //Log::info($hotel_orders);
                $s = $s && DB::table('coupon_receives')->where('receive_id', $hotel_orders['coupon_receive_id'])
                                ->update(['receive_status' => 1]);
                if ($s) {

                    DB::commit();
                    return true;
                } else {
                    DB::rollBack();
                }
            }
        });


        return $response;
    }

    public function create_order_no() {
        $order_no = date('Ymd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(1000, 9999));
        return $order_no;
    }

}
