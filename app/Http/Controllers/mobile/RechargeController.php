<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Banner;
use App\ServiceUser;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\DB;

//饭店-在线充值
class RechargeController extends Controller {

    //充值页面
    public function index(Request $request) {
        $service_user_id = $request->session()->get('service_user_id');

        $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
        $service_user = (array) $service_user;


        return view('/mobile/recharge', ['service_user' => $service_user]);
    }

    //充值
    public function recharge(Request $request) {
        
        $config = [
            // 前面的appid什么的也得保留哦
            'app_id' => 'wx8c55f8bae39de381',
            'mch_id' => '1522618281',
            'key' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
            'key_path' => 'path/to/your/key', // XXX: 绝对路径！！！！
            'notify_url' => '默认的订单回调地址', // 你也可以在下单时单独设置来想覆盖它
                // 'device_info'     => '013467007045764',
                // 'sub_app_id'      => '',
                // 'sub_merchant_id' => '',
                // ...
        ];

        $app = Factory::payment($config);

        $result = $app->order->unify([
    'body' => '腾讯充值中心-QQ会员充值',
    'out_trade_no' => '20150806125346',
    'total_fee' => 88,
    'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
    'notify_url' => 'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
    'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
    'openid' => 'oUpF8uMuAJO_M2pxb1Q9zNjWeS6o',
]);
        
//        $result = array('status' => 1, 'msg' => "充值成功");
//        $result = json_encode($result);
//
//        return $result;
    }

}
