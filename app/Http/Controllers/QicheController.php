<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Banner;
class QicheController extends Controller
{
    //汽车频道
    
    
   public function index(Request $request)
    {   
        //文章列表
        $article_list = DB::table('articles')->where([['is_delete', '=', '0'],
    ['cat_id', '=', '8'],
])->select('title', 'article_id','image')->get()->toArray();
        foreach ($article_list as $key => $value) {
            $article_list[$key] = (array) $value;
        }
       
         //用户发布的汽车信息
        $car_list = DB::table('cars')->where([['status', '=', '1'],['is_show', '=', '1'],
])->select('id','title','images','service_user_id')->orderBy('id', 'desc')->get()->toArray();
        foreach ($car_list as $key => $value) {
            $car_list[$key] = (array) $value;
            //根据service_user_id获取发布优惠信息的用户信息
            $service_user = DB::table('service_users')->where('id', $car_list[$key]['service_user_id'])->first();
            $service_user = (array)$service_user;
            
            $car_list[$key]['headimgurl'] = $service_user['headimgurl'];
        }
        
         return view('/car_list', [
             'article_list' =>  $article_list,'car_list' => $car_list]);
         
    }
    
   
    
}
