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
//饭店-卡劵中心
class CardCouponController extends Controller
{
    public function index(Request $request)
    {
         $config = [
            'app_id' => 'wx8c55f8bae39de381',
            'secret' => '2f154e5f7925dffc1d6b449a9d7ae07e',
            'token' => 'Bkv9UeSnUjOqWM0',
            'response_type' => 'array',
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => '/mobile/oauth_callback', 
            ],
        ];
        
        $app = Factory::officialAccount($config);
        $card = $app->card;
        
        $openid  = 'odkJ9uDUz26RY-7DN1mxkznfo9xU';
        $cardId = ''; // 卡券ID。不填写时默认查询当前 appid 下的卡券。
        
         $service_user_id = $request->session()->get('service_user_id');
         echo $service_user_id;
         $service_user = DB::table('service_users')->where('id', $service_user_id)->first();
        $service_user = (array)$service_user;
        $openid = $service_user['openid'];
       
        $list = $card->getUserCards($openid, $cardId); 
       // $list = $card->list($offset = 0, $count = 10, $statusList = 'CARD_STATUS_DISPATCH');
        print_r($list);
        
        }
    
    
    
}
